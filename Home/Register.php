<html>
    <head>
        <title>Register</title>
        <link href="../Content/Index.css" rel="stylesheet" />
        <link href="../Content/StyleSheet2.css" rel="stylesheet" />
        <link href="../Content/bootstrap.css" rel="stylesheet" />
        <meta charset="utf-8">
    </head>
    <body style="background-color:rgb(251,251,251)">
        <div class="row h-100" style="margin:0">
            <div class="col-4" style="background-color: rgb(241, 205, 215); margin:0">
                    <div style="padding:100px 30px 2px 40px; font-size:24px; font-weight:bold; color:rgba(0,0,0,0.25); font-style:italic">
                        KTMB
                    </div>
                    <div style="padding:2px 30px 30px 40px; font-size:24px; font-weight:bold; color:rgba(0,0,0,0.5)">
                        Book your train tickets with KTMB anywhere, anytime.
                    </div>
              </div>
            
            <div class="col-8">
                <?php
                    if(isset($_POST['Register'])){
                        include("include_secure/dbconnect.inc");
                        include("includes/dbcheck_connection.inc");
                        $namor=$conn->real_escape_string($_POST['Name']);
                        $email = $conn->real_escape_string($_POST['Email']);
                        $password = $conn->real_escape_string($_POST['Password']);
                        $icp=$conn->real_escape_string($_POST['ICpass']);
                        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                        $user = "User";
                        $date=date("Y-m-d");
                        $sql = "INSERT INTO users
                        (Name,ICpass,Email, Password, DateRegistered, Role) VALUES
                        ('$namor','$icp,'$email', '$passwordhash', '$date', '$user')";
                       
                        include("includes/dbclose_connection.inc");
                        $locc="Login.php";
                        header('Location : /Login.php');
                    }
                ?>
            
                    <div style="margin:0 auto; padding: 60px 120px 80px 80px">
                        <p style="float:right">
                            Already registered?
                            <a href="../Home/Login.php">Log in here</a>
                        </p>
                        <h2 style="text-align: left; font-weight: bolder; padding-top: 40px">Let's get started</h2>
                        
                        <form method="post" action="../Home/Login.php">
                            <label style="margin-top:14px"><b>Full Name</b></label>
                            <input type="text" name="Name" class="form-control" required/>
                           
                            <label style="margin-top:14px"><b>IC/Passport Number</b></label>
                            <input type="text" name="ICpass" class="form-control"  required/>
                           
                            <label style="margin-top:14px"><b>Email Address</b></label>
                            <input type="text" name="Email" class="form-control"  required/>
                        
                            <label style="margin-top:14px"><b>Password</b></label>
                            <input type="password" name="Password" class="form-control"  required/>
                            
                            <button type="submit" name="Register" class="btn btn-primary" style="width:200px; font-weight: 500; margin-top:30px; float:right">Create Account</button>
                        </form>
                    </div> 
            </div>
        </div>  
    </body>
</html>