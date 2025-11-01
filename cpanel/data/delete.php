<?php include("../session.php"); 
if($_POST['del']!='' && $_POST['ac']=='1'){
$id=$_POST['del']; 
if(mysqli_query($host,"delete from appSetting where id='$id'")){
?>
<script>
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Deleted",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php
}
}

if($_POST['del']!='' && $_POST['ac']=='2'){
$id=$_POST['del']; 
if(mysqli_query($host,"delete from salary where id='$id'")){
?>
<script>
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Deleted",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php
}
}

if($_POST['del']!='' && $_POST['ac']=='3'){
$id=$_POST['del']; 
if(mysqli_query($host,"delete from meeting where id='$id'")){
?>
<script>
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Deleted",
    showConfirmButton: false,
    timer: 1500
}).then(()=>{
$("#me_rows<?php echo $id;?>").remove();
});
</script>
<?php
}
}

if($_POST['del']!='' && $_POST['ac']=='4'){
$id=$_POST['del']; 
if(mysqli_query($host,"delete from employee where id='$id'")){
?>
<script>
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Deleted",
    showConfirmButton: false,
    timer: 1500
}).then(()=>{
$("#ee_rows<?php echo $id;?>").remove();
});
</script>
<?php
}
}


if($_POST['del']!='' && $_POST['ac']=='5'){
$id=$_POST['del']; 
if(mysqli_query($host,"delete from calls where id='$id'")){
?>
<script>
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Deleted",
    showConfirmButton: false,
    timer: 1500
}).then(()=>{
$("#call_rows<?php echo $id;?>").remove();
});
</script>
<?php
}
}


if($_POST['del']!='' && $_POST['ac']=='6'){
$id=$_POST['del']; 
if(mysqli_query($host,"delete from survey_upload where id='$id' and (idd is null or idd='' )")){
?>
<script>
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Deleted",
    showConfirmButton: false,
    timer: 1500
}).then(()=>{
$("#document_rows<?php echo $id;?>").remove();
});
</script>
<?php
}
}

?>