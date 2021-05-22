<html>
    <head>
        <title>Admin Page</title>
        <?php session_start();
        $role=$_SESSION['role'];
        
        if($role=='user'){
            header("Location: indexticket.php");
        }
        if($role==null)
            header("Location: Login.php");
        
        ?>
    </head>
    <body>
        YO
    </body>
</html>