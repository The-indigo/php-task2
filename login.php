<?php include_once('lib/header.php');  
require_once('functions/alert.php');
require_once('functions/redirect.php');
if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
  header("Location:dashboard.php");
}
?>
<div class="container">
<div class="row col-6">
<h3>Login Here</h3>
</div>
<div class="row col-6">
<?php print_alert(); unset($_SESSION['message']); unset($_SESSION['error']); ?>
</div>
<hr>
<div class="row col-6">
    <form method="POST" action="processlogin.php">
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
<button class="btn btn-sm btn-primary" type='submit'>Login</button>
</p>

<p>
<a href="forgot.php">Forgot Password</a><br>
<a href="register.php">Dont' Have An Acccount? Register</a>
</p>

    </form>
    </div>

</div>
    
  

    <?php
  include_once('lib/footer.php');  

?>