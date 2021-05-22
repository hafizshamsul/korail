<html>
    <head>
        <title>View Ticket</title>
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
                                    <a class="nav-link" href="../Home/userList.php">Users</a>
                                </li>
                                <li class="nav-item active" style="margin-left:12px; margin-right:12px; font-size:14px">
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
                    <form method="post" action="EditUserProfile.php">
                        <?php
                            session_start();
                            
                            if(isset($_GET['view'])){
                            $id=$_GET['view'];
                            include("include_secure/dbconnect.inc");
                            include("includes/dbcheck_connection.inc");
                            $sql = "SELECT TicketId,Name,StartPoint,EndPoint,Quantity,InitialPrice,Category,WayType,Quantity,InitialPrice,
                            TotalPrice,DateOfPurchase FROM tickets inner join users on
                            tickets.UserId=users.UserId where TicketId=$id";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo"<p>";
                                echo"Ticket ID : ";
                                echo"".$row['TicketId'];
                                echo"</p>";
                                echo"<p>";
                                echo"Name : ";
                                echo"".$row['Name'];
                                echo"</p>";
                                echo"<p>";
                                echo"Start Point : ";
                                echo"".$row['StartPoint'];
                                echo"</p>";
                                echo"<p>";
                                echo"End Point: ";
                                echo"".$row['EndPoint'];
                                echo"</p>";
                                echo"<p>";
                                echo"Category : ";
                                echo"".$row['Category'];
                                echo"</p>";
                                echo"<p>";
                                echo"Type : ";
                                echo"".$row['WayType'];
                                echo"</p>";
                                echo"<p>";
                                echo"Quantity : ";
                                echo"".$row['Quantity'];
                                echo"</p>";
                                echo"<p>";
                                echo"Total Price : ";
                                echo"".$row['TotalPrice'];
                                echo"</p>";
                                echo"<p>";
                                echo"Purchased Date : ";
                                echo"".$row['DateOfPurchase'];
                                echo"</p>";
                                }
                            } else {
                                echo "0 results";
                            }
                            }
                        ?>
                        <a href="ticketList.php">Back</a>
                    </form>
                </div>
            </div>
        </div>

        
    
    </body>
</html>