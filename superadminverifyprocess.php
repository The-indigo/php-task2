<?php session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');

$errorCount=0;

$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;


if ($errorCount>0){
 $errorMessage= "You have" ." ". $errorCount." ". "error";

 if($errorCount>1){
  $errorMessage.="s";
 }
   $errorMessage.=  " in your form submission";
   set_alert('error', $errorMessage);
  redirect_to("superadminverify.php");

}else{

    if($password=='admin'){
       $_SESSION['pin']=$password;
        redirect_to("superadminindex.php");
        die();
    }
    set_alert('error',"Invalid Email/Password");
  redirect_to("superadminverify.php");
  die();
}

?>