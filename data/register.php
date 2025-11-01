<?php include("../cpanel/db.php");
$mobile=$_REQUEST['mobile'];
$email=$_REQUEST['email'];
$motp=mt_rand(100000, 999999);
$eotp=mt_rand(100000, 999999);
$to = $email;
$subject = "OTP Verification";
$message = "
<html>
<head>
<title>Verify Your E-mail Via OTP</title>
</head>
<body>
<p>Please Use This OTP to verify Your E-mail Account.</p>
<table>
<tr>
<td>OTP</td>
<td>".$eotp."</td>
</tr>
<tr>
<td><b>Regards</b></td>
<td>Smartech Software Solution - SMS Service</td>
</tr>
</table>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <info@smartechindia.in>' . "\r\n";
mail($to,$subject,$message,$headers);

$temp="WSCHOL";
$sms="Verify Yor Mobile Using Six Digit OTP : ".$motp." 
Regards : Smartech Software Solution";
include("../sms.php");
mysqli_query($host,"insert into otp_verification set mobile='$mobile',email='$email',eotp='$eotp',motp='$motp',date='$date',time='$time'");
?>