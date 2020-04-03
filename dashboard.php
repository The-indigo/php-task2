<?php
include_once('lib/header.php');  
if(!isset($_SESSION['loggedIn'])){
  header("Location:login.php");
}
?>

<h3>Welcome</h3> <?php echo $_SESSION['loggedIn'];?> 
<p>
You are logged in as a <?php echo $_SESSION['role'];?>
</p>

<p>
Date Of Registration:<?php echo $_SESSION['dateReg'];?>
</p>
<p>
 Last Logged in: <?php echo $_SESSION['lastLogin'] ?> 
</p>
<?php
  include_once('lib/footer.php');  

?>