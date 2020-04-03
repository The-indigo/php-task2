<?php include_once('lib/header.php');  
if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
  header("Location:dashboard.php");
}
?>

<?php
    if(isset($_SESSION['message'])&& !empty($_SESSION['message'])){
      echo "<span style='color:green'>".$_SESSION["message"]."</span>";
      session_destroy();
    }
    
?>

    Login Here
    <hr>
    <form method="POST" action="processlogin.php">

    <?php
              if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
                  echo "<span style='color:red'>".$_SESSION["error"]."</span>";
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


    <?php
  include_once('lib/footer.php');  

?>