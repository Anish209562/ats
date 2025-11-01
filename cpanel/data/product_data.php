<?php include("../db.php"); 

 $id=$_POST['id']; 

if($id){

mysqli_query($host,"delete from product where id='$id'"); 
$m="Successfully Deleted";

}else{
$category=$_POST['category']; 
$product=$_POST['product']; 
 $update=$_POST['update'];
$date=date('Y-m-d');
$time=date('H:i:s'); 
 
 

if($update){ 

$q="update product set name='$product',category='$category',date='$date',time='$time' where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

$q="insert into product set name='$product',category='$category',date='$date',time='$time',status='Active'";
 
mysqli_query($host,"$q");

$m="Successfully Inserted";


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
}) 
 
</script>

  <?php include("../content/product.php"); ?> 