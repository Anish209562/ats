 <?php include("../session.php");
$id=$_POST['id'];
$s=mysqli_query($host,"select * from category where id='$id'");  
if(mysqli_num_rows($s)>0){
$d=mysqli_fetch_array($s);
 ?>
<script>
$(document).ready(function(e){ 
$("#updatess3").val("<?php echo $d['id']; ?>");
$("#emailsubject").val("<?php echo $d['subject']; ?>"); 

if(gameEditor2){
    gameEditor2.setData("<?php echo $d['remark']; ?>");
}
if(gameEditor){
    gameEditor.setData("<?php echo $d['descc']; ?>");
}


$("#typeemail").val("<?php echo $d['name'];?>");
 var myModal = new bootstrap.Modal(document.getElementById('modaldemo8'));
  myModal.show();
});  

</script>
<?php
}
?>