<?php
include_once('slib/header.php');  
if(!isset($_SESSION['pin'])){
    header("Location:superadminverify.php");
    session_destroy();
  }
?>
<div class="container">
<div class="row col-6">
<h3>Student List!!</h3> 
</div>




<hr>
<P>
<?php
$files = array_diff(scandir("db/users/"), array('.', '..'));

                        
foreach ($files as $file) {
  
    $data = file_get_contents("db/users/".$file);  
      $user=json_decode($data);

      if($user->Designation=="Student"){
        echo 
        "<p>Student Name: $user->First_Name $user->Last_Name  Department: $user->Department </p>";
       }
    
   
}
?>
</p>
</div>