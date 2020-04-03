<?php
include_once('lib/header.php');  
?>

<h3>Super Admin Welcome!!</h3> <?php echo $_SESSION['super'];?> 


<hr>
<P>
<?php
echo "<a href='register.php'>Add new user</a>". " "; 
echo "<a href='superadminregister.php'>Add newAdmin</a>". " "; 
echo "<a href='superadminlogout.php'>Log Out</a>"; 
?>
</p>