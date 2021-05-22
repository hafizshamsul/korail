<html>
    <head>
        <?php session_start();
        $role=$_SESSION['role'];
        $name=$_SESSION['Name'];
        $ic=$_SESSION['icpass'];
        $email=$_SESSION['Email'];
        
        if($role=='admin'){
            header("Location: userList.php");
        }
        if($role==null)
            header("Location: Login.php");
        
        ?>
        <title>
            Edit Profile
        </title>
        <link href="../Content/Index.css" rel="stylesheet" />
        <link href="../Content/StyleSheet2.css" rel="stylesheet" />
        <link href="../Content/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
    <body style="background-color:rgb(251,251,251)">
        <nav class="navbar navbar-expand-lg navbar-light fixed" style="background-color:white; margin:0; top:0; z-index:9000; position:sticky">
            <div class="container">
                <a href="../Home/indexticket.php">
                            <img src="../Images/logokorail.png" style="height:28px" />
                        </a>

                        <div class="collapse navbar-collapse" id="links" style="margin-left:100px">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/indexticket.php">Book Tickets</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/bookHistory.php">My Bookings</a>
                                </li>
                                <li class="nav-item active" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/UserProfile.php">Profile</a>
                                </li>
                            </ul>
                        </div>
                        
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="../Home/Login.php" style="margin-left:6px; margin-right:6px; font-size:14px">Log out</a></li>
                            </ul>
            </div>
        </nav>
        
        <div class="container-fluid" style="height:100%">
            <div class="row h-100">
                <div class="col-2" style="margin:0; padding:0; height:700px">
                            <div class="col-11" style="background-color:white; padding:6px 6px 6px 6px; z-index:8999; position:fixed; top:56px; bottom:0; width:15.8777777778%">
                                
                                <div style="text-align: center">
                                    <img src="../Images/avatar.png" style="height:100px; margin: 25px 0 25px 0" />
                                </div>
                                
                                <h6 style="text-align: center; margin-bottom: 30px"><?php echo"$name"; ?></h4>
                                <hr style="margin: 0">
                                <ul style="padding:0">
                                    <li id="sidebar" style="list-style:none; margin:2px 0">
                                        <a id="delete" href="../Home/UserProfile.php" style="display:block; padding:10px">
                                            <i class="fas fa-user-friends" style="margin:0 18px 0 12px"></i>
                                            <span>User Info</span>
                                        </a>
                                    </li>
                                    <hr style="margin: 0">
                                    <li id="sidebar" style="list-style:none; margin:2px 0">
                                        <a id="delete" href="../Home/EditUserProfile.php" style="display:block; padding:10px">
                                            <i class="fas fa-ticket-alt" style="margin:0 18px 0 12px; color:#dc3545"></i>
                                            <span style="color:#dc3545">Edit info</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr style="margin: 0">
                </div>
                
                <div class="col-10" style="margin:0; padding:25px 50px 50px 25px; overflow:hidden; z-index:8998">
                    <h3 style="margin:10px 0 20px 0"><?php echo"$name";?>'s Profile</h3>
                    <hr style="margin-bottom:20px">
                    <?php
                        include("include_secure/dbconnect.inc");
                        include("includes/dbcheck_connection.inc");
                        
                        $userid = $_SESSION['UserId'];
                        
                        if(isset($_POST['update'])){
                            $nameUp=$_POST['Name'];
                            $icUp=$_POST['ICpass'];
                            $emailUp=$_POST['Email'];
                            $passwordUp=$_POST['Password'];
                            $hashpasswordUp=password_hash($passwordUp,PASSWORD_DEFAULT);
                            include("include_secure/dbconnect.inc");
                            include("includes/dbcheck_connection.inc");
                            $sqlU = "Update users Set Name='$nameUp',ICpass='$icUp',Email='$emailUp',Password='$hashpasswordUp' where UserId=$userid";
                            $resultUp = $conn->query($sqlU);
                            
                        }
                    
                        $sqlR = "SELECT * FROM users where UserId=$userid";
                            $result = $conn->query($sqlR);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $name=$row['Name'];
                                $ic=$row['ICpass'];
                                $email=$row['Email'];
                                $password=$row['Password'];
                                echo"<form action='EditUserProfile.php' method='post'>";
                                
                                echo"<div class='form-group row'>";
                                    echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>Name</label>";
                                    echo"<div class='col-sm-10'>";
                                      echo"<input type='text' name='Name' class='form-control' style='width:400px' value='$name' required>";
                                    echo"</div>";
                                echo"</div>";
                                
                                echo"<div class='form-group row'>";
                                    echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>IC/Passport</label>";
                                    echo"<div class='col-sm-10'>";
                                      echo"<input type='text' name='ICpass' class='form-control' style='width:400px' value='$ic' required>";
                                    echo"</div>";
                                echo"</div>";
                                
                                echo"<div class='form-group row'>";
                                    echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>Email</label>";
                                    echo"<div class='col-sm-10'>";
                                      echo"<input type='text' name='Email' class='form-control' style='width:400px' value='$email' required>";
                                    echo"</div>";
                                echo"</div>";
                                
                                echo"<div class='form-group row'>";
                                    echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>Password</label>";
                                    echo"<div class='col-sm-10'>";
                                      echo"<input type='password' name='Password' class='form-control' style='width:400px' required>";
                                    echo"</div>";
                                echo"</div>";
                                
                                
                                /*echo"<p>Name : <input type='text' name='Name' value='$name'/></p>";
                                echo"<p>IC/Passport : <input type='text' name='ICpass' value='$ic'/></p>";
                                echo"<p>Email : <input type='text' name='Email' value='$email'/></p>";
                                echo"<p>Password : <input type='text' name='Password' value='$password'/></p>";*/
                                echo"<button type='submit' class='btn btn-primary' name='update' style='width:150px; margin-top:20px'>Save changes</button>";
                                echo"</form>";
                            }
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
            
            
        <div class="page-container">
            <div>
                <nav class="navbar navbar-expand-lg navbar-light fixed" style="background-color:white">
                    <div class="container">
                        <a href="../Home/indexticket.php">
                            <img src="../Images/logoktm.png" style="height:28px" />
                        </a>

                        <div class="collapse navbar-collapse" id="links" style="margin-left:100px">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/indexticket.php">Book Tickets</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/bookHistory.php">My Bookings</a>
                                </li>
                                <li class="nav-item active" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/UserProfile.php">Profile</a>
                                </li>
                            </ul>
                        </div>
                        
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="../Home/Login.php" style="margin-left:6px; margin-right:6px; font-size:14px">Log in</a></li>
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="../Home/Register.php" style="margin-left:6px; margin-right:6px; font-size:14px">Sign up</a></li>
                            </ul>
                        
                    </div>
                </nav>
            </div>

            
        
        
        
    </body>
</html>