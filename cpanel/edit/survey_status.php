<?php
include("../session.php");
$id=$_POST['status'];
$s=mysqli_query($host,"select * from survey_name where id='$id'");  
$d=mysqli_fetch_array($s);

$check=mysqli_query($host,"select * from survey_name where status='active' ");
$row=mysqli_num_rows($check);

if($d['status']=='active'){
    
    
    
mysqli_query($host,"update survey_name set status='inactive' where id='$id'");
}else{
    
if($row>0){
?>
<script>
    Swal.fire({
    position: "top-center",
    icon: "info",
    title: "please Inactive the live or current survey ",
    showConfirmButton: false,
    timer: 3000
}) 
</script>
<?php
}else{
mysqli_query($host,"update survey_name set status='active' where id='$id'");

}

}




?>
<?php include("../content/survey.php");?>