<?php
  include_once('lib/header.php');  
  require_once('functions/alert.php');
?>
<div class="container">
<div class="row col-6">
<h3>
Forgot Password
</h3>
</div>
<div class="row col-6">
  <p> Enter the emil address associated with your account</p> 
  </div>
  <div class="row col-6">
  <?php
   print_alert(); unset($_SESSION['error']);
    ?>
    </div>

    <hr>
  
  <div class="row col-6">
    <form action="processforgot.php" method="POST">
    <p>
    <label>Email</label>
    <input 
    <?php
              if(isset($_SESSION['email'])){
                  echo "value=".$_SESSION['email'];
              }
          ?>
    type="email"  class="form-control" name="email" id="email" placeholder="Email address" required>
    </p>

    <p>
<button class="btn btn-sm btn-primary" type='submit'>Send Reset Code</button>
</p>
    </form>
</div>
</div>