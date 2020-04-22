<?php session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

$errorCount=0;
$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;

$_SESSION['email']=$email;

if ($errorCount>0){
 $errorMessage= "You have" ." ". $errorCount." ". "error";

 if($errorCount>1){
  $errorMessage.="s";
 }
   $errorMessage.=  " in your form submission";
   set_alert("error",$errorMessage);
  redirect_to("superadminlogin.php");

}else{
  $currentSuperAdmin=find_superAdmin($email);
      if($currentSuperAdmin){
     $superAdminString=file_get_contents("db/superadmin/".$currentSuperAdmin->Email. ".JSON");
      $superAdminObject=json_decode($superAdminString);
      $passwordFromDb=$superAdminObject->Password;
      $passwordFromUser=password_verify($password, $passwordFromDb);
      
      if($passwordFromDb==$passwordFromUser){
        $_SESSION['super']=$superAdminObject->Email;
          redirect_to("superappindex.php");
        die();
      }

    }
  
  set_alert("error","Invalid Email/Password");
  redirect_to("superadminlogin.php");
  die();
}
?>

