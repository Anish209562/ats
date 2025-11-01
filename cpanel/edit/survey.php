 <?php include("../session.php");
$id=$_POST['id'];
$s=mysqli_query($host,"select * from survey_name where id='$id'");  
$d=mysqli_fetch_array($s);
 ?>
<script>
$(document).ready(function(e){
 
$("#hidden").val("<?php echo $d['id']; ?>");

$("#sname").val("<?php echo $d['sname']; ?>");  

 
});  

</script>