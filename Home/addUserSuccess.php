<html>
    
    <head>
        <?php session_start();
        $role=$_SESSION['role'];
        
        if($role=='user'){
            header("Location: indexticket.php");
        }
        if($role==null)
            header("Location: Login.php");
        
        ?>
        <title>Success</title>
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
                                    <li class="nav-item"><a class="nav-link" href="../Home/Login.php" style="margin-left:6px; margin-right:6px; font-size:14px">Log in</a></li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link" href="../Home/Register.php" style="margin-left:6px; margin-right:6px; font-size:14px">Sign up</a></li>
                                </ul>
                    </div>
            </div>
        </nav>

        <div class="container-fluid" style="height:100%">
            <div class="row h-100">
                <div class="col-12" style="margin:0; padding:25px 50px 50px 25px; overflow:hidden; z-index:8998">
                    <form action='userList.php' method='get'>
                        <?php
                            include("include_secure/dbconnect.inc");
                            include("includes/dbcheck_connection.inc");
                            $addname=$_POST['name'];
                            $addicpass=$_POST['icpass'];
                            $addemail=$_POST['email'];
                            $addpassword=$_POST['password'];
                            $addpasswordhash=password_hash($addpassword, PASSWORD_DEFAULT);
                            $addrole=$_POST['role'];
                            $adddate=date("Y-m-d");
                            $add="INSERT INTO users
                            (Name,Email,ICpass, Password, DateRegistered, Role) VALUES
                            ('$addname','$addemail', $addicpass,'$addpasswordhash', '" .$adddate. "', '$addrole')";
                            $adding = $conn->query($add);
                            
                        ?>
                        Record successfully added!
                        <input type='submit' value='Back to List'/>
                        </form>
                </div>
            </div>
        </div>
        
        
    </body>
</html>