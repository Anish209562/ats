<?php include("../db.php"); 

 $id=$_POST['id']; 

if($id){

mysqli_query($host,"delete from district_sub3 where id='$id'"); 
$m="Successfully Deleted";

}else{
$category=$_POST['category']; //state
$product=$_POST['product']; // district
$name2=$_POST['name2'];// panchyat samitis
$name3=$_POST['name3'];// gram
$status=trim(preg_replace('/\s+/', ' ', $_POST['status']));// villages
 $update=$_POST['update'];

$date=date('Y-m-d');
$time=date('H:i:s'); 
 
 

if($update){ 

$q="update district_sub3 set name='$product',category='$category', name2='$name2', name3='$name3' ,status='$status' ,date='$date',time='$time' where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

$s=mysqli_query($host,"select name3 from district_sub3 where status='$status' and name3='$name3'");
if(mysqli_num_rows($s)==0){

$q="insert into district_sub3 set name='$product',category='$category', name2='$name2', name3='$name3', status='$status' ,date='$date',time='$time'";
 
mysqli_query($host,"$q");

$m="Successfully Inserted";


}
else{
$m="Already Added !";
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
}).then(function (){
   window.location.reload(true); 
   $("#update").val("");
});


 
</script>

