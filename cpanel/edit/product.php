 <?php include("../session.php");
$id=$_POST['id'];
$s=mysqli_query($host,"select * from product where id='$id'");  
$d=mysqli_fetch_array($s);
 ?>
<script>
$(document).ready(function(e){ 
$("#update").val("<?php echo $d['id']; ?>");
$("#product").val("<?php echo $d['name']; ?>"); 
$("#category").val("<?php echo $d['category']; ?>"); 

 
});  

</script>