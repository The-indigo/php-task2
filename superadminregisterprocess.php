<?php  session_start();

$errorCount=0;

$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = 'admin';




$_SESSION['email']=$email;



if ($errorCount>0){
  $errorMessage= "You have" ." ". $errorCount." ". "error";
 
 }elseif (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
  $_SESSION["error"]= "Please Use a valid email";
  header("Location: superadminregister.php");
}
else{

    $allUsers=scandir("db/superadmin/");
    $countAllUsers=count($allUsers);
    $newUserId=$countAllUsers-1;

$fileName="db/superadmin/".$email.".JSON";

  $userObject=[
      'id'=>$newUserId,
      'Email'=> $email,
      'Password'=>password_hash($password, PASSWORD_DEFAULT),
  ];

  for($i=0; $i<$countAllUsers; $i++) {
    $currentUser=$allUsers[$i];

    if($currentUser==$email.".JSON"){
      $_SESSION["error"]="Registration Failed,Super Admin already exists";
      header("Location: superadminregister.php");
      die();
    }
  }

  file_put_contents($fileName,json_encode($userObject));
  $_SESSION["message"]= "Registration Success";
  header("Location: superadminregister.php");
}





/*$names=$_POST['fullName']. ".txt";
if (file_exists($names))  
{ 
    echo "The user" ." ". $_POST['fullName'] . " " . "already exists try another name"; 
}else{
    $file = fopen($names, 'w') or die('fopen failed');
    fwrite($file, $fName) or die('fwrite failed');
    fwrite($file, $adress) or die('fwrite failed');
    fwrite($file, $email) or die('fwrite failed');
    fwrite($file, $phone) or die('fwrite failed');
    fwrite($file, $message) or die('fwrite failed');
    fclose($file);
    echo "Succesfull";
} */
?>

