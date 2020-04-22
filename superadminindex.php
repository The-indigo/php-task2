<?php 
include_once('slib/header.php'); 
require_once('functions/alert.php');
require_once('functions/redirect.php');
 if(!isset($_SESSION['pin'])){
  redirect_to("superadminverify.php");
}
?>
<div class="container">
<div class="row col-6">
<p>
Super Admin Welcome!!
</P>
</div>

<hr>
<P>
<?php
echo "<a href='superadminlogin.php'>Super Admin Login</a>". " "; 
echo "<a href='superadminregister.php'>Register Admin</a>"." "; 
echo "<a href='superadminlogout.php'>Exit</a>"; 
?>
</p>
</div>