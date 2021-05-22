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
        <title>
            Users
        </title>
        <link href="../Content/Index.css" rel="stylesheet" />
        <link href="../Content/StyleSheet2.css" rel="stylesheet" />
        <link href="../Content/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
    
    <body style="background-color:rgb(251,251,251); height:100vh">
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
                    </nav>
                  
                    <div class="container-fluid" style="font-size:13px; height:100%">
                        <div class="row" height="100%">
                              <div class="col-10" style="margin:0 auto; padding:19px 19px 19px 0; overflow:hidden; z-index:8998">
                                  <?php
                                        include("include_secure/dbconnect.inc");
                                        include("includes/dbcheck_connection.inc");
                                        
                                        $sql = "SELECT * FROM users WHERE role = 'user'";
                                        echo"<div style='width:100%; height:20px; text-align:right; float:right'><a href='addUser.php'>Add new user</a></div>";
                                        echo"<div style='clear:both; height:50px; width:100%'><form class='form-inline' action='userList.php' method='post' style='float:right'>
                                                <input class='form-control' name='searchtext' type='text' placeholder='Search' aria-label='Search' style='margin: 10px 6px 6px 0'>
                                                <button type='submit' class='btn' name='update' value='Search' style='margin-top: 6px;'><i class='fas fa-search' aria-hidden='true'></i></button>
                                            </form></div>";

                                        
                                        echo"<table id='table' border='0' class='table' style='font-size:13px; table-layout:fixed; word-wrap:break-word; background-color:white; margin-left:6px; padding:0; max-width:none; box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.05), 0 1px 6px 0 rgba(0, 0, 0, 0.05)'>";
                                            echo"<thead align='center'>";
                                            echo"<tr>";
                                            echo"<th onclick='sortTable(0)'>User ID</th>";
                                            echo"<th onclick='sortTable(1)'>Name</th>";
                                            echo"<th>IC/Passport</th>";
                                            echo"<th onclick='sortTable(3)'>Email</th>";
                                            echo"<th>Password</th>";
                                            echo"<th>Role</th>";
                                            echo"<th onclick='sortTable(6)'>Date Registered</th>";
                                            echo"<th>Option</th>";
                                            echo"</tr>";
                                            echo"</thead>";
                                            
                                         if(isset($_POST['update'])){
                                            $search=$_POST['searchtext'];
                                            include("include_secure/dbconnect.inc");
                                            include("includes/dbcheck_connection.inc");
                                            $sql = "Select * from users where Name like '%$search%' ";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                            echo"<tr style='height:70px'>";
                                            $userid=$row['UserId'];
                                            $name=$row['Name'];
                                            $icpass=$row['ICpass'];
                                            $email=$row['Email'];
                                            $password=$row['Password'];
                                            $role=$row['Role'];
                                            $dateregistered=$row['DateRegistered'];
                                            echo"<td align='center'>".$userid."</td>";
                                            echo"<td align='center'>".$name."</td>";
                                            echo"<td align='center'>".$icpass."</td>";
                                            echo"<td align='center'>".$email."</td>";
                                            echo"<td align='center' style='font-style:italic; color:rgb(120,120,120); font-size:8px'>".$password."</td>";
                                            echo"<td align='center'>".$role."</td>";
                                            echo"<td align='center'>".$dateregistered."</td>";
                                            echo"<td align='center'><a href='userList.php?delete=$userid'>Delete</a> | <a href='editUser.php?edit=$userid'>Edit</a> | <a href='viewUser.php?view=$userid'>View</a></td>";
                                            echo"</tr>";
                                        } } }elseif(isset($_GET['delete'])){
                                            $id=$_GET['delete'];
                                            include("include_secure/dbconnect.inc");
                                            include("includes/dbcheck_connection.inc");
                                            $sql = "Delete from users where UserId='$id'";
                                            $delete=$conn->query($sql);
                                            $sql1 = "SELECT * FROM users";
                                            $result = $conn->query($sql1);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                            echo"<tr style='height:70px'>";
                                            $userid=$row['UserId'];
                                            $name=$row['Name'];
                                            $icpass=$row['ICpass'];
                                            $email=$row['Email'];
                                            $password=$row['Password'];
                                            $role=$row['Role'];
                                            $dateregistered=$row['DateRegistered'];
                                            echo"<td align='center'>".$userid."</td>";
                                            echo"<td align='center'>".$name."</td>";
                                            echo"<td align='center'>".$icpass."</td>";
                                            echo"<td align='center'>".$email."</td>";
                                            echo"<td align='center' style='font-style:italic; color:rgb(120,120,120); font-size:8px'>".$password."</td>";
                                            echo"<td align='center'>".$role."</td>";
                                            echo"<td align='center'>".$dateregistered."</td>";
                                            echo"<td align='center'><a href='userList.php?delete=$userid'>Delete</a> | <a href='editUser.php?edit=$userid'>Edit</a> | <a href='viewUser.php?view=$userid'>View</a></td>";
                                            echo"</tr>";
                                        } } }else{
                                            
                                            
                                            
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo"<tr style='height:70px'>";
                                            $userid=$row['UserId'];
                                            $name=$row['Name'];
                                            $icpass=$row['ICpass'];
                                            $email=$row['Email'];
                                            $password=$row['Password'];
                                            $role=$row['Role'];
                                            $dateregistered=$row['DateRegistered'];
                                            echo"<td align='center'>".$userid."</td>";
                                            echo"<td align='center'>".$name."</td>";
                                            echo"<td align='center'>".$icpass."</td>";
                                            echo"<td align='center'>".$email."</td>";
                                            echo"<td align='center' style='font-style:italic; color:rgb(120,120,120); font-size:8px'>".$password."</td>";
                                            echo"<td align='center'>".$role."</td>";
                                            echo"<td align='center'>".$dateregistered."</td>";
                                            echo"<td align='center'><a href='userList.php?delete=$userid'>Delete</a> | <a href='editUser.php?edit=$userid'>Edit</a> | <a href='viewUser.php?view=$userid'>View</a></td>";                                        }
                                    }
                                        }
                                    
                                    echo"</table>";
                                    
                                    echo"</form>";
                                    

                                    ?>
                              </div>
                        </div>
                    </div>
              </div>
        </div>
        
    <script>
        function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
    </script>
    </body>
</html>