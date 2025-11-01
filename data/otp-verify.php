<?php include("../cpanel/db.php");
$email=$_POST['email'];
$otp=$_POST['otp'];
echo $q="select * from otp_verification where email='$email' and eotp='$otp'";
$s=mysqli_query($host,$q);
$r=mysqli_num_rows($s);
if($r==1){
?>
<script>
document.getElementById("passdiv").style.display="block";	
document.getElementById("otpdiv").style.display="none";
page=3;	
</script>	
<?php
}else{
	?>
<script>
popup2("OTP Did Not match");
document.getElementById("otp").style.borderColor="#dc3545";
</script>	
<?php
}