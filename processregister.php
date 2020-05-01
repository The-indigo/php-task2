<?php  session_start();
require_once('functions/user.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');

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
    set_alert('error',$errorMessage);
    redirect_to("register.php");
 
 }
elseif (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
  set_alert('error',"Please Use a valid email");
  redirect_to("register.php");
}elseif(!preg_match("/^([a-zA-Z' ]+)$/",$_SESSION['firstname'].$_SESSION['lastname'])){
  set_alert('error',"Name should not have numbers");
  redirect_to("register.php");
}elseif(strlen($_SESSION['firstname'].$_SESSION['lastname'])<2){
  set_alert('error',"Name should not be less than two characters");
  redirect_to("register.php");
}
else{

      $newUserId=find_user($email);
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
$userExists= find_user($email);
  

    if($userExists){
      set_alert('error',"Registration Failed,User already exists");
      redirect_to("register.php");
      die();
    }
    save_user($userObject);
    set_alert('message',"Registration Success");
    redirect_to("login.php");
}

?>

