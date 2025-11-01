<?php include("../db.php"); 

 $id=$_POST['id']; 

if($id){

mysqli_query($host,"delete from district_sub where id='$id'"); 
$m="Successfully Deleted";

}else{
$category=$_POST['category']; 
$product=$_POST['product']; 
$name2=trim(preg_replace('/\s+/', ' ', $_POST['name2']));

 $update=$_POST['update'];
 $status=$_POST['status'];
$date=date('Y-m-d');
$time=date('H:i:s'); 
 
 

if($update){ 

$q="update district_sub set name='$product',category='$category', name2='$name2',date='$date',time='$time', status='$status' where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

$s=mysqli_query($host,"select * from district_sub where status='$status' and name2='$name2' and name='$product' ");
if(mysqli_num_rows($s)==0){

$q="insert into district_sub set name='$product',category='$category', name2='$name2', date='$date',time='$time',status='$status'";
 
mysqli_query($host,"$q");

$m="Successfully Inserted";
}else{
$m="Already Added";
}

}

}

?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}) ;
$("#name2").val("");
$("#product").html("").prepend("<option value='' hidden>Select District</option>");

$("#update").val("");

 
</script>

  <?php include("../content/district_sub.php"); ?> 