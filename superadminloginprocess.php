<?php session_start();

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
   $_SESSION["error"]= $errorMessage;

  header("Location: superadminlogin.php");

}else{
  $allUsers=scandir("db/superadmin/");
  $countAllUsers=count($allUsers);

  for($i=0; $i<$countAllUsers; $i++) {
    $currentUser=$allUsers[$i];

    if($currentUser==$email.".JSON"){
     $userString=file_get_contents("db/superadmin/".$currentUser);
      $userObject=json_decode($userString);
      $passwordFromDb=$userObject->Password;
      $passwordFromUser=password_verify($password, $passwordFromDb);
      
      if($passwordFromDb==$passwordFromUser){
        $_SESSION['super']=$userObject->Email;
          header("Location:superappindex.php");
        die();
      }



    }
  }
  $_SESSION["error"]="Invalid Email/Password";
  header("Location: superadminlogin.php");
  die();
}
?>

