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
        <title>Edit User</title>
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
                                <li class="nav-item active" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/userList.php">Users</a>
                                </li>
                                <li class="nav-item" style="margin-left:12px; margin-right:12px; font-size:14px">
                                    <a class="nav-link" href="../Home/ticketList.php">Tickets</a>
                                </li>
                            </ul>
                        </div>
                        
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="../Home/Login.php" style="margin-left:6px; margin-right:6px; font-size:14px">Log out</a></li>
                            </ul>                        
                    </div>
            </div>
        </nav>

        <div class="container-fluid" style="height:100%">
            <div class="row h-100">
                <div class="col-12" style="margin:0; padding:25px 50px 50px 25px; overflow:hidden; z-index:8998">
                    
                    
                    <?php
                        include("include_secure/dbconnect.inc");
                        include("includes/dbcheck_connection.inc");
                        if(isset($_GET['edit'])){
                            
                            $_SESSION['idEdit']=$_GET['edit'];
                            $id=$_SESSION['idEdit'];
                            $sqlR = "SELECT * FROM users where UserId=$id";
                            $result = $conn->query($sqlR);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $name=$row['Name'];
                            $ic=$row['ICpass'];
                            $email=$row['Email'];
                            $role=$row['Role'];
                            
                            echo"<h3 style='margin:10px 0 20px 0'>$name's Profile</h3>";
                            echo"<hr style='margin-bottom:20px'>";
                            
                            echo"<form action='editUser.php' method='post'>";
                            echo"<p>Name : <input type='text' name='Name' value='$name'/></p>";
                            echo"<p>IC/Passport : <input type='text' name='ICpass' value='$ic'/></p>";
                            echo"<p>Email : <input type='text' name='Email' value='$email'/></p>";
                            echo"<p>Role : <select name='Role'>
                                            <option value='user'>user</option>
                                            <option value='admin'>admin</option>
                                            </select></p>";
                            echo"<input type='submit' name='update' value='Save'/>";
                            echo"</form>";
                        }}}
                        
                        if(isset($_POST['update'])){
                            $id=$_SESSION['idEdit'];
                            $nameUp=$_POST['Name'];
                            $icUp=$_POST['ICpass'];
                            $emailUp=$_POST['Email'];
                            $roleUp=$_POST['Role'];
                            include("include_secure/dbconnect.inc");
                            include("includes/dbcheck_connection.inc");
                            $sqlU = "Update users Set Name='$nameUp',ICpass='$icUp',Email='$emailUp',Role='$roleUp' where UserId=$id";
                            $resultUp = $conn->query($sqlU);
                            $sqlR = "SELECT * FROM users where UserId=$id";
                        $result = $conn->query($sqlR);
                         if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {
                            $name=$row['Name'];
                            $ic=$row['ICpass'];
                            $email=$row['Email'];
                            $role=$row['Role'];
                            echo"<form action='editUser.php' method='post'>";
                            echo"<p>Name : <input type='text' name='Name' value='$name'/></p>";
                            echo"<p>IC/Passport : <input type='text' name='ICpass' value='$ic'/></p>";
                            echo"<p>Email : <input type='text' name='Email' value='$email'/></p>";
                            echo"<p>Role : <select name='Role'>
                                            <option value='user'>user</option>
                                            <option value='admin'>admin</option>
                                            </select></p>";
                            echo"<input type='submit' name='update' value='Save'/>";
                            echo"</form>";
                        }
                    }
                        }
                    
                        echo"<a href='userList.php'>Back to List</a>";
                    ?>
                </div>
            </div>
        </div>
        
    </body>
</html>