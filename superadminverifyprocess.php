<?php session_start();

$errorCount=0;

$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;


if ($errorCount>0){
 $errorMessage= "You have" ." ". $errorCount." ". "error";

 if($errorCount>1){
  $errorMessage.="s";
 }
   $errorMessage.=  " in your form submission";
   $_SESSION["error"]= $errorMessage;

  header("Location: superadminverify.php");

}else{

    if($password=='admin'){
       $_SESSION['pin']=$password;
        header("Location:superadminindex.php");
        die();
    }
   
  $_SESSION["error"]="Invalid Email/Password";
  header("Location: superadminverify.php");
  die();
}

?>