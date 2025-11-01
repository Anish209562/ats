 <?php include("../session.php");
$id=$_POST['id'];
$s=mysqli_query($host,"select * from feature where id='$id'");  
$d=mysqli_fetch_array($s);
 ?>
<script>
$(document).ready(function(e){ 
$("#update").val("<?php echo $d['id']; ?>");
$("#module").val("<?php echo $d['module']; ?>");
$("#title").val("<?php echo $d['title']; ?>");
$("#pagename").val("<?php echo $d['pagename']; ?>");
$("#icon").val('<?php echo $d['icon']; ?>');  


 
});  

</script>