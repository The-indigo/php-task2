<?php include_once('slib/header.php');  
require_once('functions/alert.php');
require_once('functions/redirect.php');
 if(!isset($_SESSION['pin'])){
    redirect_to("superadminverify.php");
    session_destroy();
  }

 if(isset($_SESSION['super'])&& !empty($_SESSION['super'])){
   redirect_to("superappindex.php");
 }
?>
<div class="container">
<div class="row col-6">
   Super Admin Login Here
</div>
<hr>
<div class="row col-6">
    <form method="POST" action="superadminloginprocess.php">

    <?php
             print_alert(); unset($_SESSION['error']);
          ?>
   
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

    <p>
    <label>Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    </p>

  
<hr>

<p>
<button  class="btn btn-success" type='submit'>Login</button>
</p>

    </form>

</div>
    <p>
<a href="superadminindex.php">Back to HomePage</a> <br>
<a href='superadminlogout.php'>Exit</a>
</p>
</div>