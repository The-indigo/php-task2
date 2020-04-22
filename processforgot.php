<?php  session_start();
require_once('functions/alert.php');
require_once('functions/email.php');
require_once('functions/redirect.php');
require_once('functions/token.php');

$errorCount=0;

$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;

$_SESSION['email']=$email;

if ($errorCount>0){
    $errorMessage= "You have" ." ". $errorCount." ". "error"." in your form submission";
  
      set_alert('error', $errorMessage);
      redirect_to("forgot.php");
}else{

    $allUsers=scandir("db/users/");
    $countAllUsers=count($allUsers);
    for($i=0; $i<$countAllUsers; $i++) {
        $currentUser=$allUsers[$i];
    
        if($currentUser ==$email.".json"){
            $token = generate_token();
            $subject = "Password Reset Link";
            $message = "You Requested For A Password Reset If It Was'nt You Please Ignore. Other wise Visit 
            http://localhost/start-php/task2/reset.php?token=".$token;
            $headers = "From: no-reply" . "\r\n" .
            "CC: seyi@snh.org";
            file_put_contents("db/tokens/".$email. ".json",json_encode(['token'=>$token]));
            $try=send_mail($subject,$message,$email);
            if($try){
                 set_alert('message',"Password reset sent to your email". " ". $email);
                  redirect_to("login.php");                  
              }
          die();
        }
      }
      set_alert('error',"User doesn't exist");
      redirect_to("forgot.php");
     
}


?>