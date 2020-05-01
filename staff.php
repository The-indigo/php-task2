<?php include_once('lib/header.php'); 
require_once('functions/redirect.php');
if(!isset($_SESSION['loggedIn'])){
    redirect_to("Location:login.php");
  }

?>

<div class="container">
<div class="row col-8">
    <h3>
        Welcome To Your Staff Page
    </h3>
</div>
    <p>
    <?php
        if(isset($_SESSION['time'] )&& !empty($_SESSION['time'] )){
            echo "<span style='color:green'>"."Log in time:"." ".$_SESSION["time"]."</span>";
          }
          
    ?>
    </p>

    <p>
    <a href="dashboard.php">Go to your dashboard</a>
    <a href="logout.php">Logout</a>
    </p>
</body>
</html>
</div>
