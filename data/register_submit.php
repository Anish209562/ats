<?php include("../cpanel/db.php");
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$name=$_POST['name'];
$gender=$_POST['gender'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$btype=$_POST['btype'];
$bcate=$_POST['bcate'];
$mobile=$_POST['mobile'];
$gst=$_POST['gst'];
$eotp=$_POST['eotp'];
$motp=$_POST['motp'];
$k=$username.time();
$key=md5($k);
$sql=mysqli_query($host,"select * from citystate where name='$city'");
$data=mysqli_fetch_array($sql);
$state=$data['type'];
$s=mysqli_query($host,"select * from otp_verification where email='$email' and eotp='$eotp' and mobile='$mobile' and motp='$motp' order by id desc");
$r=mysqli_num_rows($s);
if($r==1){
if(mysqli_query($host,"insert into register set email='$email',password='$password',username='$username',name='$name',gender='$gender',city='$city',state='$state',pincode='$pincode',business_type='$btype',business_name='$gst',mobile='$mobile',business_category='$bcate',date='$date',time='$time',project='SMS Portal',authkey='$key'")){
?>
<script> $(document).ready(function(e){

	$(".wizard-content .wizard .actions ul li a[href='#finish']").click();
});</script>
<?php
}else{
?>
<script>popup2("Something Went Wrong");</script>
<?php	
}
}else{
	?>
<script>popup2("OTP Did Not Match");</script>
	<?php
}
?>