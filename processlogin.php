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

  header("Location: login.php");

}else{
  $allUsers=scandir("db/users/");
  $countAllUsers=count($allUsers);

  for($i=0; $i<$countAllUsers; $i++) {
    $currentUser=$allUsers[$i];

    if($currentUser==$email.".JSON"){
     $userString=file_get_contents("db/users/".$currentUser);
      $userObject=json_decode($userString);
      $passwordFromDb=$userObject->Password;
      $passwordFromUser=password_verify($password, $passwordFromDb);
      
      if($passwordFromDb==$passwordFromUser){
        $_SESSION['loggedIn']=$userObject->First_Name." ". $userObject->Last_Name;
        $_SESSION['role']=$userObject->Designation;
        $_SESSION['dateReg']=$userObject->regDate; 
        date_default_timezone_set('Africa/Lagos');
        $_SESSION['time']=date("F j, Y, g:i a");
        //try to get the log in date and time saved into the log folder
        if(isset($_SESSION['time']) && !empty($_SESSION['time'])){
          $names="log/".$_SESSION['email']. ".txt";
          file_put_contents($names, $_SESSION['time']." ",FILE_APPEND);
          //look into the file and get the contents in the file 
          $s=file_get_contents($names);
          //read the contents and give me 22 cahracters starting at the 46 character from 
          //the end of the contents in the file
          if (strlen($S)==23){
            $_SESSION['lastLogin']=substr($s);
          }else{
            $_SESSION['lastLogin']=substr($s, -46,22);
          }
          //die();

        };
        if($userObject->Designation=='Student'){
          header("Location:student.php");
        }else{
          header("Location:staff.php");
          }
        die();
      }



    }
  }
  $_SESSION["error"]="Invalid Email/Password";
  header("Location: login.php");
  die();
}

?>