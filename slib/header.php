<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
     crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/scripts.js"></script>
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="superappindex.php">StartNG School Super Admin</a> </h5>
  <nav class="my-2 my-md-0 mr-md-3">

   
    <?php if(!isset($_SESSION['pin'])){?>
      <a class="p-2 text-dark" href="superadminlogin.php">Login</a>
<?php }elseif(isset($_SESSION['super'])){?>
  <a class="p-2 text-dark" href="superappindex.php">Home</a>
    <a class="p-2 text-dark" href="stafflist.php">View all staff</a>
    <a class="p-2 text-dark" href="studentlist.php">View all students</a>
  <a class="p-2 text-dark" href="superadminlogout.php">Logout</a>
       
    
<?php } ?>
 
  </nav>
 
</div>
</body>

</html>