<?php
$URL = "http://mobicomm.dove-sms.com/mobicomm//submitsms.jsp?"; 

$data="user=SMARTECH&key=139e57ebc5XX&mobile=+91$mobile&message=$sms&senderid=$temp&accusage=1";

   $ch = curl_init($URL);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $output = curl_exec($ch);
   curl_close($ch);
?>