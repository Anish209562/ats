<?php
include("../session.php");
$id=$_POST['id'];
$status=$_POST['status'];
$s=mysqli_query($host,"select * from wallet where id='$id'");
$d=mysqli_fetch_array($s);
if(strtolower($status)=='approve'){
mysqli_query($host,"update wallet set status='success' where id='$id'");
}else{
mysqli_query($host,"update wallet set status='rejected' where id='$id'");	
}


?>

<?php include("../content/withdraw_history.php");?>