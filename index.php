<?php include_once('lib/header.php');  
require_once('functions/alert.php');
?>
<p>
<?php
   print_alert();
    
?>
</p>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Welcome!!</h1>
  <p class="lead">This is your school portal</p>
  <p>
    <a class="btn btn-bg btn-outline-secondary" href="login.php">Login</a>
    <a class="btn btn-bg btn-outline-primary" href="register.php">Register</a>
  </p>
</div>


<hr>
<?php
  include_once('lib/footer.php');  

?>