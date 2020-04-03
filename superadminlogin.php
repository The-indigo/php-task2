<?php include_once('lib/header.php');  
 if(!isset($_SESSION['pin'])){
    header("Location:superadminverify.php");
    session_destroy();
  }

 if(isset($_SESSION['super'])&& !empty($_SESSION['super'])){
   header("Location:superappindex.php");
 }
?>

   Super Admin Login Here
    <hr>
    <form method="POST" action="superadminloginprocess.php">

    <?php
              if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
                  echo "<span style='color:red'>".$_SESSION["error"]."</span>";
                  session_destroy();
              }
          ?>
   
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

  
<hr>

<p>
<button type='submit'>Login</button>
</p>

    </form>


    <p>
<a href="superadminindex.php">Back to HomePage</a>
<a href='superadminlogout.php'>Exit</a>
</p>