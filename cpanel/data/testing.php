<?php include("../db.php"); 

$category=$_POST['category']; 
$product=$_FILES['product']; 
 $update=$_POST['update'];
$date=date('Y-m-d');
$time=date('H:i:s'); 
 
if($product['tmp_name']){
$ext=pathinfo($product['name'],PATHINFO_EXTENSION);
$pp=time().uniqid().".".$ext;
move_uploaded_file($product['tmp_name'],"../img/".$pp);
}

if($update){ 

$q="update group_contact set name='$pp',user='$category',date='$date',title='$time' where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

$q="insert into group_contact set name='$pp',user='$category',date='$date',title='$time' ";
echo $q; 
mysqli_query($host,"$q");

$m="Successfully Inserted";


}



?>

<script> 
 alert("<?php echo $m; ?>");
  
 
</script>
