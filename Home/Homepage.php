<html>
    <head>
        <title>Home</title>
        <link href="../Content/Index.css" rel="stylesheet" />
        <link href="../Content/StyleSheet2.css" rel="stylesheet" />
        <link href="../Content/bootstrap.css" rel="stylesheet" />
        <meta charset="utf-8">
    </head>
    <body style="background-color:rgb(251,251,251)">
        <?php
        session_start();
        $userid = $_SESSION['UserId'];
        $email = $_SESSION['Email'];
        echo "<p>$userid</p>";
        echo "<p>$email</p>";
        ?>
    
        <div class="page-container">
            <div>
                <nav class="navbar navbar-expand-lg navbar-light fixed" style="background-color:white">
                    <div class="container">
                        <a href="../Home/indexticket.php">
                            <img src="../Images/logokorail.png" style="height:28px" />
                        </a>

                        <div class="collapse navbar-collapse" id="links" style="margin-left:100px">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/indexticket.php">Book Tickets</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/bookHistory.php">My Bookings</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/UserProfile">Profile</a>
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
            
            <h2>lol</h2>
            
            
        </div>
        
        
        
    </body>
</html>