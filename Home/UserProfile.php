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
        <title>User Profile</title>
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
                                            <i class="fas fa-user-friends" style="margin:0 18px 0 12px; color:#dc3545"></i>
                                            <span style="color:#dc3545">User Info</span>
                                        </a>
                                    </li>
                                    <hr style="margin: 0">
                                    <li id="sidebar" style="list-style:none; margin:2px 0">
                                        <a id="delete" href="../Home/EditUserProfile.php" style="display:block; padding:10px">
                                            <i class="fas fa-ticket-alt" style="margin:0 18px 0 12px"></i>
                                            <span>Edit info</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr style="margin: 0">
                        </div>
                        
                        <div class="col-10" style="margin:0; padding:25px 50px 50px 25px; overflow:hidden; z-index:8998">
                            <form method="post" action="EditUserProfile.php">
                                <h3 style="margin:10px 0 20px 0"><?php echo"$name";?>'s Profile</h3>
                                <hr style="margin-bottom:20px">
                                <?php
                                    
                                    $userid = $_SESSION['UserId'];
                                    
                                    include("include_secure/dbconnect.inc");
                                    include("includes/dbcheck_connection.inc");
                                    $sql = "SELECT * FROM users where UserId=$userid";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                       
                                        echo"<div class='form-group row'>";
                                            echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>Name</label>";
                                            echo"<div class='col-sm-10'>";
                                            echo"<input type='text' readonly class='form-control-plaintext' value='$name'>";
                                            echo"</div>";
                                        echo"</div>";
                                        
                                        echo"<div class='form-group row'>";
                                            echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>IC/Passport</label>";
                                            echo"<div class='col-sm-10'>";
                                            echo"<input type='text' readonly class='form-control-plaintext' value=$ic>";
                                            echo"</div>";
                                        echo"</div>";
                                        
                                        echo"<div class='form-group row'>";
                                            echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>Email Address</label>";
                                            echo"<div class='col-sm-10'>";
                                            echo"<input type='text' readonly class='form-control-plaintext' value=$email>";
                                            echo"</div>";
                                        echo"</div>";
                                        
                                        $registered = $row['DateRegistered'];
                                        echo"<div class='form-group row'>";
                                            echo"<label class='col-sm-2 col-form-label' style='font-weight:500'>Date Joined</label>";
                                            echo"<div class='col-sm-10'>";
                                            echo"<input type='text' readonly class='form-control-plaintext' value=$registered>";
                                            echo"</div>";
                                        echo"</div>";
                                        
                                        
                                        
                                        /*echo"<p>";
                                        echo"Name : ";
                                        echo"".$row['Name'];
                                        echo"</p>";
                                        echo"<p>";
                                        echo"IC/Passport No : ";
                                        echo"".$row['ICpass'];
                                        echo"</p>";
                                        echo"<p>";
                                        echo"Email : ";
                                        echo"".$row['Email'];
                                        echo"</p>";
                                        echo"<p>";
                                        echo"Password : ";
                                        echo"".$row['Password'];
                                        echo"</p>";
                                        echo"<p>";
                                        echo"Date Registered : ";
                                        echo"".$row['DateRegistered'];
                                        echo"</p>";*/
                                        echo"<button type='submit' class='btn btn-primary' style='width:150px; margin-top:20px'>Edit profile</button>";
                                        
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                ?>
    
                            </form>
                        </div>
                    </div>
                </div>
    </body>
</html>