<?php
include_once('lib/header.php');  
require_once('functions/alert.php');
// if(!isset($_SESSION['loggedIn'])){
//   header("Location:login.php");
// }

if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $name=$_SESSION['loggedIn'];

$curl = curl_init();

$customer_email = $email;
$amount = 3000;  
$currency = "NGN";
$txref = "indsnh"; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK-c9a7d7ae20354fd4df2050ec735fa30f-X"; // get your public key from the dashboard.
$redirect_url = "http://localhost/start-php/task2/dashboard.php";
//$payment_plan = "pass the plan id"; // this is only required for recurring payments.


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
    //'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);
}

?>