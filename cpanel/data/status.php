<?php include("../session.php");

if($_POST['status']!='' && $_POST['idd']!=''){
$status = $_POST['status'];
$id = $_POST['idd'];

if($status!='onboard_file'){

$ss=mysqli_query($host,"select * from $status where id='$id'");
$dd=mysqli_fetch_array($ss);
if($dd['status']=='Active'){
$stat="Inactive";
$m="Deactivated";
}
else{
$stat="Active"; 
$m="Activated";
}

}
else{
$type=$_POST['type'];
if($type=="1"){
    $stat="verify";
    $m="Verified";
}
elseif($type=="2"){
    $stat="reject";
    $m="Rejected";
}

}
mysqli_query($host, "update $status set status='$stat' WHERE id='$id'");
?>
<script>
    Swal.fire({
  position: "top-center",
  icon: "success",
  title: "Successfully <?php echo $m;?>",
  showConfirmButton: false,
  timer: 1500
});

</script>
<?php
if($status!='onboard_file'){
include("../content/$status.php");
}
}
?>
