<?php session_start();
require_once('functions/user.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');


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
   set_alert('error', $errorMessage);
   redirect_to("login.php");

}else{

    $currentUser=find_user($email);

    if($currentUser){
      $userString=file_get_contents("db/users/".$currentUser->Email. ".json");
      $userObject=json_decode($userString);
      $passwordFromDb=$userObject->Password;
      $passwordFromUser=password_verify($password, $passwordFromDb);
      
      if($passwordFromDb==$passwordFromUser){
        $_SESSION['loggedIn']=$userObject->First_Name." ". $userObject->Last_Name;
        $_SESSION['role']=$userObject->Designation;
        $_SESSION['email']=$userObject->Email;
        $_SESSION['dateReg']=$userObject->regDate; 
        $_SESSION['firstname']=$userObject->First_Name;
        $_SESSION['lastname']= $userObject->Last_Name;
        $_SESSION['department']= $userObject->Department;
        
       
        date_default_timezone_set('Africa/Lagos');
        $_SESSION['time']=date("m.d.y, h:i:s"); 
        //try to get the log in date and time saved into the log folder
        if(isset($_SESSION['time']) && !empty($_SESSION['time'])){
          $names="log/".$_SESSION['email']. ".txt";
          file_put_contents($names, $_SESSION['time']." ",FILE_APPEND);
          //look into the file and get the contents in the file 
          $timeString=file_get_contents($names);
          //read the contents and give me 22 characters starting at the 46 character from 
          //the end of the contents in the file
          if (strlen($timeString)==18){
            $_SESSION['lastLogin']=substr($timeString);
          }else{
            $_SESSION['lastLogin']=substr($timeString, -38,19);
          }
        
        };
        if($userObject->Designation=='Student'){
          redirect_to("student.php");
        }else{
          redirect_to("staff.php");
          }
        die();
      }



    
  }
  set_alert('error',"Invalid Email/Password");
  redirect_to("login.php");
  die();
}

?>