<?php session_start(); 
 if(!isset($_SESSION['pin'])){
  header("Location:superadminverify.php");
}
?>
<p>
<?php
    if(isset($_SESSION['message'])&& !empty($_SESSION['message'])){
      echo "<span style='color:green'>".$_SESSION["message"]."</span>";
      session_destroy();
    }
    
?>
</p>

<p>
Super Admin Welcome!!
</P>

<hr>
<P>
<?php
echo "<a href='superadminlogin.php'>Super Admin Login</a>". " "; 
echo "<a href='superadminregister.php'>Register Admin</a>"." "; 
echo "<a href='superadminlogout.php'>Exit</a>"; 
?>
</p>