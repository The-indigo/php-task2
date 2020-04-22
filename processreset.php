<?php session_start();
require_once('functions/user.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/email.php');

$errorCount=0;

if(!is_user_logged_in()){
    $token = $_POST['token']!="" ? $_POST['token'] : $errorCount++;
    $_SESSION['token']=$token;
}

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
      redirect_to("reset.php");
       
   }else{
    
     
           $checkToken=is_user_logged_in() ? true:verify_token($email) ; 
           
            if($checkToken){
                $userExists= find_user($email);
                  $currentUser=find_user($email);
                if($userExists){
                  $userObject=find_user($email);
            
                $userObject->Password=password_hash($password, PASSWORD_DEFAULT);
               // convert userobject to array so it can be saved succesfully  
               $newUserObject = json_decode(json_encode($userObject), true);
                unlink("db/users/".$currentUser->Email. ".json"); 
                unlink("db/tokens/".$currentUser->Email. ".json");
                save_user($newUserObject);
               $subject = "Password Reset Sucess";
               $message = "Your password has changed.if you did not initiate the password change 
               please visit snportal.org and reset your password immediately";
               $try=send_mail($subject,$message,$email);
               if($try){
                    set_alert('message',"Password reset successfull");
                     redirect_to("login.php");                  
                 }
              return;
                  } 
   }      
      set_alert('error', "Password reset failed, token/email invalid or expired");
      redirect_to("reset.php");  
   }
?>