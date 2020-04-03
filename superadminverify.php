<?php session_start();?>

   Enter Pin
    <hr>
    <form method="POST" action="superadminverifyprocess.php">

    <?php
              if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
                  echo "<span style='color:red'>"."wrong Pin"."</span>";
                  session_destroy();
              }
          ?>
   
    <p>

    <p>
    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password" required>
    </p>

  
<hr>

<p>
<button type='submit'>Enter</button>
</p>

    </form>


    <?php
 // include_once('lib/footer.php');  

?>