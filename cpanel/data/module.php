<?php include("../session.php");  
$id=$_POST['id'];
if($id){
mysqli_query($host,"delete from feature where id='$id'");
?>
<script> 
$m="Successfully deleted";
</script>
<?php
}else{ 

$module=$_POST['module'];
$title=$_POST['title'];
$pagename=$_POST['pagename'];	
$icon=$_POST['icon'];  
$update=$_POST['update'];
$date=date('Y-m-d');
$time=date('H:i:s'); 

 
 
if($update){

mysqli_query($host,"update feature set module='$module',title='$title',pagename='$pagename',icon='$icon',date='$date',time='$time' where id='$update'");

$m="Successfully Updated";

}else{
  mysqli_query($host,"insert into feature set module='$module',title='$title',pagename='$pagename',icon='$icon',date='$date',time='$time'"); 
$m="Successfully Inserted";
}
?>

<script> 

 Swal.fire({
        position: "top-center",
        icon: "success",
        title: "<?php echo $m;  ?>",
        showConfirmButton: false,
        timer: 2000
    }); 
 
$(document).ready(function(e){ 
$("#resetbtn").click(); 
$("#update").val("");   
 
}); 
 

</script>

<?php

}
 
?>
 
 <?php include("../content/module.php"); ?>  