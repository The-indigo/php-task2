<?php
require_once('functions/alert.php');

function is_user_logged_in(){
    if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
        return true;
    }else{
        return false;
    }
    
}

function is_token_set(){
    return is_token_set_in_get() || is_token_set_in_session();
}

function is_token_set_in_session(){
  return isset($_SESSION['token']);
}

function is_token_set_in_get(){
    return isset($_GET['token']);
}

function find_user($email=""){
    if(!$email){
        set_alert('error', 'User Email is not set');
        die();
    }
    $allUsers=scandir("db/users/");
    $countAllUsers=count($allUsers);
    $newUserId=$countAllUsers-1;
    for($i=0; $i<$countAllUsers; $i++) {
        $currentUser=$allUsers[$i];
    if($currentUser==$email.".json"){
        $userString=file_get_contents("db/users/".$currentUser);
        $userObject=json_decode($userString);
         return $userObject;
         //die(); 
        }
        
    }
    return false;
}

function save_user($userObject){
    $fileName="db/users/".$userObject['Email'].".json";
    file_put_contents($fileName,json_encode($userObject));
}

function find_superAdmin($email=""){
    if(!$email){
        set_alert('error', 'User Email is not set');
        die();
    }
    $allUsers=scandir("db/superadmin/");
    $countAllUsers=count($allUsers);
    $newUserId=$countAllUsers-1;
    for($i=0; $i<$countAllUsers; $i++) {
        $currentUser=$allUsers[$i];
    if($currentUser==$email.".JSON"){
        $userString=file_get_contents("db/superadmin/".$currentUser);
        $userObject=json_decode($userString);
         return $userObject;
         //die(); 
        }
        
    }
    return false;
}

?>