<?php
include_once('lib/header.php');
require_once('functions/email.php');
    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = "3000"; //Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-3fb4b8dd35ad8bb9219515197057bf6a-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
          if(isset($_SESSION['email'])){
          send_mail($subject = "Successful transaction", 
          $message= "A payment was made by you with reference $ref your lecturer will be notified", 
          $email= $_SESSION['email']);
          $userObject=[
            'Email'=>$email,
            'Amount'=>$amount
          ];
          $fileName="db/payments/".$email.".json";
          file_put_contents($fileName,json_encode($userObject));
        }
          header("Location:payredirect.php");
        } else {
          if(isset($_SESSION['email'])){
            send_mail($subject = "Transaction failed with reference.' '. $ref.' '. please try again",
             $message= "Your transaction was not succesful", 
             $email= $_SESSION['email']);
            //Dont Give Value and return to Failure page
             }   header("Location:dashboard.php");
        }
    }
        else {
      die('No reference supplied');
    }

?>