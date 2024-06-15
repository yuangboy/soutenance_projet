<?php

function prx($arr){
    echo "<pre>"; print_r($arr); die();
}

function createAgoraProject($name){

$customerKey=env('customerKey');

$customerSecret=env('customerSecret');

$credentials=$customerKey.':'.$customerSecret;

$base64credentials=base64_encode($credentials);

// Create authorization header

$arr_header='Authorization: Basic '. $base64credentials;

$curl1=curl_init();

$curl1=curl_init();

curl_setopt_array($curl1,array(
CURLOPT_URL=>'https://api.agora.io/dev/v1/project',
CURLOPT_RETURNTRANSFER=>true,
CURLOPT_ENCODING=>'',
CURLOPT_MAXREDIRS=>10,
CURLOPT_TIMEOUT=>0,
CURLOPT_FOLLOWLOCATION=>true,
CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST=>'POST',
CURLOPT_POSTFIELDS=>'{"name": "' .$name . '",
"enable_sign_key":true
}',
CURLOPT_HTTPHEADER=>array(
$arr_header,
'Content-Type: application/json'
)

));
$response=curl_exec($curl1);
curl_close($curl1);
$result=json_decode($response);
        prx($result);
return $result;
}

function createToken($appId,$appCertificate, $channelName){

$curl=curl_init();

curl_setopt_array($curl,array(

    CURLOPT_URL=>'https://mehandrucompany.com/agoraToken/sample/RtcTokenBuilderSample.php',
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_ENCODING=>'',
    CURLOPT_MAXREDIRS=>10,
    CURLOPT_TIMEOUT=>0,
    CURLOPT_FOLLOWLOCATION=>true,
    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST=>'POST',
    CURLOPT_POSTFIELDS=>array('$appId'=>$appId, 'appCertificate'=>$appCertificate, 'channelName'=>$channelName)
));

$response=curl_exec($curl);
return $response;

}


function generateRandomString($length= 7){

    $characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ';
    $charactersLength=strlen($characters);
    $randomString='';

    for($i=0; $i< $length; $i++){
        $randomString=$characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;

}
