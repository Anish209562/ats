<?php include("../session.php"); 
$check=false;
$id=$_POST['id']; 

if($id){

mysqli_query($host,"delete from placement where id='$id'"); 
$m="Successfully Deleted";
$check=true;

}else{

$name=$_POST['name'];
$vendor=$_POST['vendor']; 
$vemail=$_POST['vemail'];

$start=$_POST['start_job'];
$end=$_POST['end_job'];

$aaa=explode(";",$_POST['client']);
$clientname=$aaa[0];
$cid=$aaa[1];

$variable=$_POST['variable'];
$rate=$_POST['rate'];

$currency=$_POST['currency'];

$update=$_POST['updates'];
$date=date('Y-m-d');
$time=date('h:i:s'); 


if($update>0){ 

  $q="update placement set job_title='$name', vendor='$vendor', vendor_email='$vemail', cid='$cid', client='$clientname',variable='$variable', pay_rate='$rate',currency='$currency',start_date='$start', end_date='$end' where id='$update'"; 

mysqli_query($host,"$q");
$check=true;
$m="Successfully Updated";

}else{  

 $q="insert into placement set sub_domain='$subdomain',job_title='$name', vendor='$vendor', vendor_email='$vemail', cid='$cid', client='$clientname',variable='$variable', pay_rate='$rate',currency='$currency',status='Active',date='$date',time='$time', start_date='$start', end_date='$end'";
mysqli_query($host,"$q");
$check=true;
$m="Successfully Created";


}

}

if($check){
?>
<script> 
$("#loader").hide();
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
    $("#staticBackdrop").css("display",'none');
});

    $("#postform1")[0].reset();
    $("#updates").val("");

 
</script>
<?php
include("../content/placement.php");
}
?>

