<?php include("../db.php"); 
$id=$_POST['id'];
if($id){
   mysqli_query($host,"delete from survey_name where id='$id'");
   $m="successfully deleted";


}else{
$sname=ucwords($_POST['sname']);
$update=$_POST['hidden'];

$icon="";

if($update>0){
    
    $ss=mysqli_query($host,"select * from survey_name where sname='$sname' and id!='$update' ");
    if(mysqli_num_rows($ss)==0){
        mysqli_query($host,"update survey_name set sname='$sname' , status='inactive', date='$date', time='$time'  where id='$update' ");
        $m="successfully updated";
    }else{
        $m="this survey has already running";
        $icon="error";
    }
    
    
   
   
}else{
    
    $ss=mysqli_query($host,"select * from survey_name where sname='$sname' ");
    if(mysqli_num_rows($ss)==0){
       mysqli_query($host,"insert into survey_name set sname='$sname', status='inactive', date='$date', time='$time' ");
       $m="successfully inserted"; 
    }else{
        $m="This survey already have running";
        $icon="error";
    }
    
    
	
}



}
?>
<script>
<?php 
if($icon=="error"){
?>
 Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: '<?php echo $m;?>',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
});
<?php
}else{
?>
 Swal.fire({
        position: "top-center",
        icon: "success",
        title: "<?php echo $m;  ?>",
        showConfirmButton: false,
        timer: 2500
    });
<?php
}
?>
 
	 
    
    
     $("#formtemplate")[0].reset();
     $("#hidden").val("");
      
</script>
<?php include("../content/survey.php");?>
