<?php  session_start();

$errorCount=0;

$fName = $_POST['firstname']!="" ? $_POST['firstname'] :$errorCount++ ;
$lName = $_POST['lastname']!="" ? $_POST['lastname'] : $errorCount++;

$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;

$gender = $_POST['gender']!="" ? $_POST['gender'] : $errorCount++;

$designation =$_POST['designation']!="" ? $_POST['designation'] : $errorCount++;

$department = $_POST['department']!="" ? $_POST['department'] : $errorCount++;

$regDate=date("F j, Y");

$_SESSION['firstname']=$fName;
$_SESSION['lastname']=$lName;
$_SESSION['email']=$email;
$_SESSION['gender']=$gender;
$_SESSION['designation']=$designation;
$_SESSION['department']=$department;
$_SESSION['regDate']=$regDate;


if ($errorCount>0){
  $errorMessage= "You have" ." ". $errorCount." ". "error";
 
  if($errorCount>1){
   $errorMessage.="s";
  }
    $errorMessage.=  " in your form submission";
    $_SESSION["error"]= $errorMessage;
 
   header("Location: register.php");
 
 }
elseif (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
  $_SESSION["error"]= "Please Use a valid email";
  header("Location: register.php");
}elseif(!preg_match("/^([a-zA-Z' ]+)$/",$_SESSION['firstname'].$_SESSION['lastname'])){
  $_SESSION["error"]= "Name should not have numbers";
  header("Location: register.php");
}elseif(strlen($_SESSION['firstname'].$_SESSION['lastname'])<2){
  $_SESSION["error"]= "Name should not be less than two characters";
  header("Location: register.php");
}
else{

    $allUsers=scandir("db/users/");
    $countAllUsers=count($allUsers);
    $newUserId=$countAllUsers-1;

$fileName="db/users/".$email.".JSON";

  $userObject=[
      'id'=>$newUserId,
      'First_Name'=>$fName,
      'Last_Name'=>$lName,
      'Email'=> $email,
      'Password'=>password_hash($password, PASSWORD_DEFAULT),
      'Gender'=>$gender,
      'Designation'=>$designation,
      'Department'=>$department,
      'regDate'=>$regDate
  ];

  for($i=0; $i<$countAllUsers; $i++) {
    $currentUser=$allUsers[$i];

    if($currentUser==$email.".JSON"){
      $_SESSION["error"]="Registration Failed,User already exists";
      header("Location: register.php");
      die();
    }
  }

  file_put_contents($fileName,json_encode($userObject));
  $_SESSION["message"]= "Registration Success";
  header("Location: login.php");
}

?>

