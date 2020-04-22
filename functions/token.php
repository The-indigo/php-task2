<?php
function generate_token(){
    $token = "";
    $alphabets=['a','b','c','d','e','f','g','h','A','B','C','D','E','F','G','H'];
    for($i; $i<26; $i++){
        $index=mt_rand(0,count($alphabets)-1);
        $token.=$alphabets[$index];
    }
    return $token;
}

function verify_token($email=""){
    $allUserTokens=scandir("db/tokens/");
    $countAllUserTokens=count($allUserTokens);
    for($i=0; $i<$countAllUserTokens; $i++) {
         $currentTokenFile=$allUserTokens[$i];
    
        if($currentTokenFile==$email.".json"){
          
            $tokenContent=file_get_contents("db/tokens/".$currentTokenFile);
            $tokenObject=json_decode($tokenContent);
             $tokenFromDb=$tokenObject->token;
            return $tokenFromDb;
            
            die();

        }
    }
    return false;
}
 
function find_token(){

}
?>