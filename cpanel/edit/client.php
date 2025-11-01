 <?php include("../session.php");
$id=$_POST['id'];
$s=mysqli_query($host,"select * from itc_client where id='$id'");  
$d=mysqli_fetch_array($s);
 ?>
<script>
$(document).ready(function(e){ 
$("#update").val("<?php echo $d['id']; ?>");
$("#cname").val("<?php echo $d['cname']; ?>");
$("#mobile").val("<?php echo $d['mobile']; ?>");
$("#altmobile").val("<?php echo $d['altmobile']; ?>");
$("#email").val("<?php echo $d['email']; ?>");
$("#branch").val("<?php echo $d['branch']; ?>");  
$("#student").val("<?php echo $d['student']; ?>"); 
$("#subdomain").val(<?php echo $d['subdomain']; ?>); 
$("#publish-date").val("<?php echo $d['expire_date']; ?>");  


 
});  

</script>