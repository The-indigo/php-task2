<?php include_once('lib/header.php');  
require_once('functions/alert.php');
if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
    header("Location:dashboard.php");
  }

?>
<div class="container">
<div class="row col-6">
<h3>Register here</h3>
</div>
    <hr>
    <div class="row col-6">
    <p><strong> All fields are required</strong></p>
</div>
<div class="row col-6">
    <form method="POST" action="processregister.php">
    <p>
          <?php print_alert(); unset($_SESSION['error']); ?>
    </p>
    <p>
    <label>First Name</label>
    <input
    <?php
        if(isset($_SESSION['firstname'])){
                  echo "value=". $_SESSION['firstname'];
               }
          ?>
     type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
    </p>

    <p>
    <label>Last Name</label>
    <input 
    <?php
              if(isset($_SESSION['lastname'])){
                  echo "value=".$_SESSION['lastname'];
              }
          ?>
          type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required >
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

    <p>
    <label>Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    </p>

    <p>
    <label>Gender</label>
    <select class="form-control" name="gender" id="gender" >
    <?php
              if(isset($_SESSION['gender'])){
                  echo "value=".$_SESSION['gender'];
              }
          ?>
    <option value="">Select One</option>
        <option
        <?php
              if(isset($_SESSION['gender']) && $_SESSION['gender']=='Male'){
                  echo "selected";
              }
          ?>
        > Male</option>

        <option
        <?php
              if(isset($_SESSION['gender']) && $_SESSION['gender']=='Female'){
                  echo "selected";
              }
          ?>
        >Female</option>
    </select>
    </p>


    <p>
    <label>Designation</label>
    <select class="form-control" name="designation" id="designation" >
    <?php
              if(isset($_SESSION['designation'])){
                  echo "value=".$_SESSION['designation'];
              }
          ?>
    <option value="">Select One</option>
        <option
        <?php
              if(isset($_SESSION['designation'])&&$_SESSION['designation']=='Student'){
                  echo "selected";
              }
          ?>     
           >Student</option>
        <option
        <?php
              if(isset($_SESSION['designation'])&&$_SESSION['designation']=='Staff'){
                  echo "selected";
              }
          ?>
          >Staff</option>
    </select>
    </p>

    <p>
    <label>Department</label>
    <select class="form-control" name="department" id="department" >
    <?php
              if(isset($_SESSION['department'])){
                  echo "value=".$_SESSION['department'];
              }
          ?>
    <option value="">Select One</option>
        <option
        <?php
              if(isset($_SESSION['department']) && $_SESSION['department']=='Ict'){
                  echo "selected";
              }
          ?>
        > Ict</option>

        <option
        <?php
              if(isset($_SESSION['department']) && $_SESSION['department']=='Accounting'){
                  echo "selected";
              }
          ?>
        >Accounting</option>

        <option
        <?php
              if(isset($_SESSION['department']) && $_SESSION['department']=='Finance'){
                  echo "selected";
              }
          ?>
        >Finance</option>

        <option
        <?php
              if(isset($_SESSION['department']) && $_SESSION['department']=='Agriculture'){
                  echo "selected";
              }
          ?>
        >Agriculture</option>

        <option
        <?php
              if(isset($_SESSION['department']) && $_SESSION['department']=='Education'){
                  echo "selected";
              }
          ?>
        >Education</option>
    </select>
    </p>


<hr>

<p>
<button class="btn btn-success" type='submit'>Register</button>
</p>

<p>
<a href="forgot.php">Forgot Password</a><br>
<a href="Login.php">Already Have An Acccount? Login</a>
</p>
    </form>
</div>
   
</div>
    <?php
  include_once('lib/footer.php');  

?>