<?php include_once('lib/header.php');  
if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
    header("Location:dashboard.php");
  }

?>
    <h3>Register here</h3>
    <hr>
    <p><strong> All fields are required</strong></p>
    
    <form method="POST" action="processregister.php">
    <p>
          <?php
              if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
                  echo "<span style='color:red'>".$_SESSION["error"]."</span>";
                  session_destroy();
                }
              
          ?>
    </p>
    <p>
    <label>First Name</label>
    <input
    <?php
        if(isset($_SESSION['firstname'])){
                  echo "value=". $_SESSION['firstname'];
               }
          ?>
     type="text" name="firstname" id="firstname" placeholder="First Name" required>
    </p>

    <p>
    <label>Last Name</label>
    <input 
    <?php
              if(isset($_SESSION['lastname'])){
                  echo "value=".$_SESSION['lastname'];
              }
          ?>
          type="text" name="lastname" id="lastname" placeholder="Last Name" required >
    </p>

    <p>
    <label>Email</label>
    <input 
    <?php
              if(isset($_SESSION['email'])){
                  echo "value=".$_SESSION['email'];
              }
          ?>
    type="email" name="email" id="email" placeholder="Email address" required>
    </p>

    <p>
    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password" required>
    </p>

    <p>
    <label>Gender</label>
    <select name="gender" id="gender" >
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
    <select name="designation" id="designation" >
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
    <input 
    <?php
              if(isset($_SESSION['department'])){
                  echo "value=".$_SESSION['department'];
              }
          ?>
    type="text" name="department" id="department" placeholder="department" >
    </p>
<hr>

<p>
<button type='submit'>Register</button>
</p>

    </form>

    <?php
  include_once('lib/footer.php');  

?>