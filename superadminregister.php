<?php include_once('slib/header.php');  
require_once('functions/alert.php');
require_once('functions/redirect.php');
 if(!isset($_SESSION['pin'])){
    redirect_to("superadminverify.php");
    session_destroy();
  }
?>
<div class="container">
    <h3>Register A Super Admin here</h3>
    <hr>
    <div class="row col-6">
    <p><strong> All fields are required</strong></p>
    </div>
    <div class="row col-6">
    <form method="POST" action="superadminregisterprocess.php">
    <p>
          <?php
              print_alert(); unset($_SESSION['error']); unset($_SESSION['message']);
          ?>
    </p>


    <p>
    <label>Email</label>
    <input 
    <?php
              if(isset($_SESSION['email'])){
                  echo "value=".$_SESSION['email'];
              }
          ?>
    type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
    </p>


<button class="btn btn-success" type='submit'>Add</button>
</p>

    </form>
</div>
    <p>
<a href="superadminindex.php">Back to HomePage</a><br>
<a href="superadminlogout.php">Exit</a>
</p>
</div>