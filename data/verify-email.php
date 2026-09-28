<?php include("../cpanel/db.php");
$email=$_POST['email'];
$otp=$_POST['otp'];
$pass=$_POST['pass'];
if($pass){
$password=md5($_POST['pass']);
mysqli_query($host,"update register set `password`='$password' where email='$email'");
?>
<script>
document.getElementById("emaildiv").style.display="block";	
document.getElementById("passdiv").style.display="none";
document.getElementById("email").value="";
document.getElementById("password").value="";
document.getElementById("rpassword").value="";
document.getElementById("otp").value="";
page=1;	
popup("Successfully Reset Password");
</script>	
<?php
}else{
$s=mysqli_query($host,"select * from register where email='$email'");
$r=mysqli_num_rows($s);
if($r==1){
$d=mysqli_fetch_array($s);
$mobile=$d['mobile'];
$otp=mt_rand(100000, 999999);
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
<td>".$otp."</td>
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
$sms="Verify Yor Mobile Using Six Digit OTP : ".$otp." 
Regards : Smartech Software Solution";
include("../sms.php");
$q="insert into otp_verification set mobile='$mobile',email='$email',eotp='$otp',motp='$otp',date='$date',time='$time'";
mysqli_query($host,$q);
?>
<script>
document.getElementById("emaildiv").style.display="none";	
document.getElementById("otpdiv").style.display="block";
page=2;	
</script>	
<?php
}else{
?>
<script>
popup2("This E-mail Not Registered");
document.getElementById("email").style.borderColor="#dc3545";
</script>	
<?php
	
}

}
?>