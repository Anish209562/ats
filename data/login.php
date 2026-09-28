<?php session_start();
include("../cpanel/db.php");
$username=$_POST['username'];
$password=md5($_POST['password']);
$s=mysqli_query($host,"select * from register where username='$username' and `password`='$password'");
$r=mysqli_num_rows($s);
if($r==1){
$token=uniqid().time();
mysqli_query($host,"insert into token set username='$username',token='$token',date='$date',time='$time'");
$_SESSION['token']=$token;
?>
<script>window.location="cpanel/";</script>
<?php 
}else{
?>
<script>popup2("Username & password Did Not Match"); document.getElementById("username").style.borderColor='#dc3545'; document.getElementById("password").style.borderColor='#dc3545'; </script>
<?php	
}
?>