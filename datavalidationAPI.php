<?php

$emailToCheck = $_GET['email'];
define("DATAVALIDATION_KEY","REPLACE_YOUR_API_KEY");

$ch = curl_init();
$url = "https://dv3.datavalidation.com/api/v2/realtime/?email=".$emailToCheck;
curl_setopt($ch,CURLOPT_URL, $url);
$headr[] = "Authorization:bearer ".DATAVALIDATION_KEY;
curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

curl_close($ch);

$email_verified_details = json_decode($result);
echo "<br>Datavalidation API Grade:".$email_verified_details->grade;
    
?>    
    
    