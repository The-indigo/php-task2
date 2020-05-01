<?php
  include_once('lib/header.php');  
  require_once('functions/alert.php');
  require_once('functions/user.php');
  require_once('functions/redirect.php');

  if(!is_user_logged_in() && !is_token_set()){
    redirect_to("login.php");
  }
?>
<div class="container">
<div class="row col-6">
<h3>
Reset Password
</h3>
</div>
<div class="row col-6">
  <p> Reset Password associated with your account: [email]</p> 
    <hr>
    <?php print_alert(); unset($_SESSION['error']); unset($_SESSION['message']); ?>
    </div>
    <div class="row col-6">
    <form action="processreset.php" method="POST">
      <p>
    <?php if(!is_user_logged_in()) {?>
    <input
        <?php
            if(is_token_set_in_session()){
                echo "value='". $_SESSION['token']. "'";
            }else{
                echo "value='". $_GET['token']. "'";
            }
        ?>
     type="hidden" name="token" />
     <?php }?>
    </p>
    <p>
    <label>Email</label>
    <input 
    <?php
            if(isset($_SESSION['email'])){
                echo "value=". $_SESSION['email'];
            }
        ?>
     type="email"  class="form-control" name="email" id="email" placeholder="Email address">
    </p>

    <p>
    <label>Enter New Password</label>
    <input type="password"  class="form-control" name="password" id="password" placeholder="Password" required>
    </p>

    <p>
<button class="btn btn-sm btn-primary" type='submit'>Reset Password</button>
</p>
    </form>
</div>
</div>