<?php session_start();

require_once('functions/user.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');

$errorCount=0;

 $fName = $_POST['firstname']!="" ? $_POST['firstname'] :$errorCount++ ;
 $lName= $_POST['lastname']!="" ? $_POST['lastname'] :$errorCount++ ;
 $email= $_POST['email']!="" ? $_POST['email'] :$errorCount++ ;
$date = $_POST['appointmentdate']!="" ? $_POST['appointmentdate'] : $errorCount++;
$time =$_POST['appointmenttime']!="" ? $_POST['appointmenttime'] : $errorCount++;
$nature =$_POST['nature']!="" ? $_POST['nature'] : $errorCount++;
$complaint =$_POST['complaint']!="" ? $_POST['complaint'] : $errorCount++;
$department = $_POST['dept']!="" ? $_POST['dept'] : $errorCount++;


$_SESSION['nature']=$nature;
$_SESSION['complaint']=$complaint;
$_SESSION['dept']=$department;



if ($errorCount>0){
  $errorMessage= "You have" ." ". $errorCount." ". "error";
 
  if($errorCount>1){
   $errorMessage.="s";
  }
    $errorMessage.=  " in your form submission";
    set_alert('error', $errorMessage);
   redirect_to("booklecturer.php");
   
 }
else{

$fileName="db/appointments/";
$allUsers=scandir("db/appointments/");

$userObject=[
    
    'First_Name'=>$fName,
    'Last_Name'=>$lName,
    'Email'=>$email,
    'Date'=>$date,
    'Time'=>$time,
    'Nature'=>$nature,
    'Complaint'=>$complaint,
    'Department'=>$department,
    
];
                
 
for($i=0;$i<=count($allUsers);$i++){
  file_put_contents($fileName.$email.".JSON",json_encode($userObject));
  set_alert('message',"Appointment booked Successfully");
  redirect_to("dashboard.php");
die();

} 


  set_alert("error","Failed to book an appointment at this time. Try again");
  redirect_to("booklecturer.php");
  
}
?>

