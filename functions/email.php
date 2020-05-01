<?php require_once('functions/alert.php');
function send_mail($subject = "", $message= "", $email= "") {
    $headers = "From: no-reply" . "\r\n" . "CC: seyi@snh.org";
    return mail($email,$subject,$message,$headers);
}
?>