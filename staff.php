<?php session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location:login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>
        Welcome To Your Staff Page
    </h3>
    <p>
    <?php
        if(isset($_SESSION['time'] )&& !empty($_SESSION['time'] )){
            echo "<span style='color:green'>"."Log in time:"."".$_SESSION["time"]."</span>";
          }
          
    ?>
    </p>

    <p>
    <a href="dashboard.php">Go to your dashboard</a>
    <a href="logout.php">Logout</a>
    </p>
</body>
</html>

