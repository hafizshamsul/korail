<html>
    <head>
        <title>Korail Login Page</title>
        <link href="../Content/Index.css" rel="stylesheet" />
        <link href="../Content/StyleSheet2.css" rel="stylesheet" />
        <link href="../Content/bootstrap.css" rel="stylesheet" />
        <meta charset="utf-8">
    </head>
    <body style="background-color:rgb(251,251,251)">
        <div class="row h-100" style="margin:0">
            <div class="col-4" style="background-color: #9dd8c8; margin:0">
                    <div style="padding:100px 30px 2px 40px; font-size:24px; font-weight:bold; color:rgba(0,0,0,0.25); font-style:italic">
                        Korail
                    </div>
                    <div style="padding:2px 30px 30px 40px; font-size:24px; font-weight:bold; color:rgba(0,0,0,0.5)">
                        Book your train tickets with Korail anywhere, anytime.
                    </div>
              </div>
            
            
            
            <div class="col-8">
                <?php
                                        session_start();
                                        
                                        
                                        if(isset($_POST['Register'])){
                                        include("include_secure/dbconnect.inc");
                                        include("includes/dbcheck_connection.inc");
                                        $name = $conn->real_escape_string($_POST["Name"]);
                                        $icpass = $conn->real_escape_string($_POST["ICpass"]);
                                        $email = $conn->real_escape_string($_POST["Email"]);
                                        $password = $conn->real_escape_string($_POST["Password"]);
                                        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                                        $role = "user";
                                        $date=date("Y-m-d");
                                        $sql = "INSERT INTO users
                                        (Name,ICpass,Email, Password, Role, DateRegistered) VALUES
                                        ('$name','$icpass','$email', '$passwordhash', '$role', '" .$date. "')";
                                       
                                        include("includes/dbclose_connection.inc");
                                        }
            
                                        elseif(isset($_POST['Login'])){ //check if form was submitted
                                        include("include_secure/dbconnect.inc");
                                        include("includes/dbcheck_connection.inc");
                                        $email = $conn->real_escape_string($_POST['Email']);
                                        $password = $conn->real_escape_string($_POST['Password']);
                                        // Creating the sql command
                                        $sql = "SELECT * FROM users WHERE Email = '$email'";
                                        if ($result = $conn->query($sql)) {
                                         if ($result->num_rows > 0) {
                                         $row = $result->fetch_array();
                                         $userid = $row['UserId'];
                                         $emails=$row['Email'];
                                         $icpass=$row['ICpass'];
                                         $role = $row['Role'];
                                         $registered = $row['DateRegistered'];
                                         $passwordhash = $row['Password'];
                                         $namo=$row['Name'];
                                         //echo password_verify($password, $passwordhash);
                                         if (password_verify($password,$passwordhash)) {
                                         $_SESSION['UserId'] = $userid;
                                         $_SESSION['Email'] = $emails;
                                         $_SESSION['role'] = $role;
                                         $_SESSION['icpass']=$icpass;
                                         $_SESSION['Name']=$namo;
                                         $_SESSION['DateRegistered']=$registered;
                                         if ($role == "user") {
                                         $filename = "indexticket.php";
                                         } else if ($role == "admin") {
                                         $filename = "userList.php";
                                         } else {
                                         $filename = "Register.php";
                                         }
                                         header("Location: $filename"); // open a different page
                                         } else {
                                         $message = "Incorrect password.";
                                         }
                                         } else {
                                         $message = "User id not found.";
                                         }
                                        
                                         } else {
                                         $message = "Error.";
                                         }
                                         
                                        }
                                        
                                  ?>

                <div style="margin:0 auto; padding: 60px 120px 80px 80px">
                    <p style="float:right">
                            Not a member?
                            <a href="../Home/Register.php">Sign up now</a>
                    </p>
                    <h2 style="text-align: left; font-weight: bolder; padding-top: 40px">Hello,</h2>
                    <h2 style="text-align: left; font-weight: bolder">Welcome back</h2>
                    
                    <form method="post">

                     <label style="margin-top:20px"><b>Email</b></label>
                     <input type="text" name="Email" class="form-control"  required/>

                     <label style="margin-top:20px"><b>Password</b></label>
                     <input type="password" name="Password" class="form-control"  required/>
                     
                     <button type="submit" name="Login" class="btn btn-primary" style="width:200px; font-weight: 500; margin-top:34px; float:right">Log in</button>
                </form>
                </div>
                
            </div>
        </div>
        <?php
                                  if (isset($_POST['Login'])) {
                                  echo $message;
                                  include("includes/dbclose_connection.inc");
                                  }
                                  ?>                                       
    </body>
</html>