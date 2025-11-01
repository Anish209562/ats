<?php include("../cpanel/db.php");
$username=$_POST['user'];
$s=mysqli_query($host,"select * from register where username='$username'");
$r=mysqli_num_rows($s);
if($r==1){
?>
<script>verify=0; document.getElementById("username").style.borderColor='#dc3545';  </script>
<?php
}else{
?>
<script>verify=1; document.getElementById("username").style.borderColor='#28a745'; </script>
<?php	
}

?>