<?php
include_once('slib/header.php');  
require_once('functions/alert.php');
if(!isset($_SESSION['pin'])){
  header("Location:superadminverify.php");
}

  
$files = array_diff(scandir("db/payments/"), array('.', '..'));

                        
foreach ($files as $file) {
  
    $data = file_get_contents("db/payments/".$file);  
      $user=json_decode($data);
        echo 
        "<p>Email: $user->Email     Amount: $user->Amount </p>";
        
}

?>