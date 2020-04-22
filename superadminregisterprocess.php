<?php  session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

$errorCount=0;

$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = 'admin';

$_SESSION['email']=$email;

if ($errorCount>0){
  $errorMessage= "You have" ." ". $errorCount." ". "error";
 }elseif (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
  set_alert("error", "Please Use a valid email");
  redirect_to("superadminregister.php");
}
else{

  $newSuperAdminId=find_superAdmin($email);

$fileName="db/superadmin/".$email.".JSON";

  $userObject=[
      'id'=>$newSuperAdminId,
      'Email'=> $email,
      'Password'=>password_hash($password, PASSWORD_DEFAULT),
  ];
  $superAdminExists= find_superAdmin($email);

    if($superAdminExists){
      set_alert("error","Registration Failed,Super Admin already exists");
      redirect_to("superadminregister.php");
      die();
    }
  

  file_put_contents($fileName,json_encode($userObject));
  set_alert("message","Registration Success");
  redirect_to("superadminregister.php");
}
?>

