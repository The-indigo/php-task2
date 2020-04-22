<?php 
include_once('slib/header.php');
require_once('functions/alert.php');
?>
<div class="container">
   Enter Pin
    <hr>
    <div class="row col-6">
    <form method="POST" action="superadminverifyprocess.php">

    <?php
       print_alert(); unset($_SESSION['error']);
          ?>
   
    <p>

    <p>
    <label>Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    </p>

  </div>
<hr>

<p>
<button class="btn btn-primary" type='submit'>Enter</button>
</p>

    </form>
</div>