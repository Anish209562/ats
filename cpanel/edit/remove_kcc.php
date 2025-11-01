<?php
include("../session.php");
$id=$_POST['id'];
mysqli_query($host,"update user set kcc='rejected' where id='$id'");
?>

<?php include("../content/kcc_creators.php");?>