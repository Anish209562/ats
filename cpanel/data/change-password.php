<?php include("../session.php");
$pass=md5($_POST['pass']);
$npass=md5($_POST['npass']);
$nrpass=md5($_POST['nrpass']);
$s=mysqli_query($host,"select * from register where password='$pass'");
if(mysqli_num_rows($s)==1){
 if($npass==$nrpass){
  mysqli_query($host,"update register set password='$npass'"); 

  
 ?>
<script>
alert("Your Password SuccessFully Changed");   
window.location.href="index.php";
$("#pass").val("");
$("#npass").val("");
$("#nrpass").val(""); 
</script>
<?php
  
}else{
?>
<script>
alert("New Password & Confirm Password Did Not Match");    
$("#pass").val("");
$("#npass").val("");
$("#nrpass").val("");
</script>
<?php
}   
}else{
?>
<script>
alert("Old password Did Not match");    
$("#pass").val("");
$("#npass").val("");
$("#nrpass").val("");
</script>
<?php
}
?>