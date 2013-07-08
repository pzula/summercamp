<?php
function PostToNotice($fields){

$url = "https://bounceback.fathomtechservices.com/api/send/v1?token=xxx&account=x&format=json&mail=".$fields['email']."&cf_campflag=1"."&cf_campus=".$fields['campus']."&cf_campstart=".rawurlencode($fields['start_date'])."&cf_campend=".rawurlencode($fields['end_date'])."&firstname=".$fields['firstName']."&lastname=".$fields['lastName'];


//open connection


$ch = curl_init();
 
//echo $url."\n";

curl_setopt($ch,CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//execute post
$result = curl_exec($ch);

return $result;




//close connection
curl_close($ch);
}


?>