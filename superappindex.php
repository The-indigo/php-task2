<?php
include_once('slib/header.php');  
require_once('functions/redirect.php');
if(!isset($_SESSION['pin'])){
    redirect_to("superadminverify.php");
    session_destroy();
  }
?>
<div class="container">
<div class="row col-6">
<h3>Super Admin Welcome!!</h3> <?php echo $_SESSION['super'];?> 
</div>

<hr>
<P>
<?php
echo "<p> <a href='register.php'>Add new user</a> </p>"; 
echo "<p> <a href='superadminregister.php'>Add newAdmin</a> </p>"; 
echo '<a href=allpayment.php>View All Payments</a>';
?>
</p>
</div>