<?php
include("../session.php");
$id=$_POST['id'];
$status=$_POST['status'];
$s=mysqli_query($host,"select * from user where id='$id'");
if(strtolower($status)=='approved'){
mysqli_query($host,"update user set kcc='approved' where id='$id'");
}else{
mysqli_query($host,"update user set kcc='rejected' where id='$id'");	
}


?>

<?php include("../content/kcc_creators_request.php");?>