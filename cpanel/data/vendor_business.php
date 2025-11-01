<?php include("../db.php"); 


$category=addslashes($_POST['category']);
$mobile=addslashes($_POST['phone']);
$product=addslashes($_POST['product']);
$oname=addslashes($_POST['oname']);
$bname=addslashes($_POST['bname']);
$desc=addslashes($_POST['desc']); 
$address=addslashes($_POST['address']); 

$city=addslashes($_POST['city']); 
$state=addslashes($_POST['state']); 
$pincode=$_POST['pincode']; 



$photo=$_FILES['profile_pic'];

 $update=$_POST['updates'];
$date=date('Y-m-d');
$time=date('h:i:s'); 




if($update){ 
    
if($photo['tmp_name']){
   $fileName=time().uniqid().".jpg";
   move_uploaded_file($photo['tmp_name'],"../img/".$fileName); 
}else{
  $check=mysqli_query($host,"select vendor_photo from user where id='$update' ");
  $ch=mysqli_fetch_array($check);
  $fileName=$ch['vendor_photo'];
}

$qrrrrr = "UPDATE user SET vendor_photo='$fileName',phone='$mobile', oname='$oname', bname='$bname', address2='$address', description='$desc', category='$category', product='$product', date='$date', time='$time' , pincode2='$pincode', state='$state', city='$city' WHERE id='$update' ";
$result = mysqli_query($host, $qrrrrr);
$m="Successfully Updated";

}else{  

$q="insert into sms_allotment set name='$name',mobile='$mobile',email='$email',address2='$address',dob='$dob',mstatus='$mstatus',occu='$occupation',aadhar='$aadhar_id',pan='$pan_id',gender='$gender',status='$status',date='$date',time='$time'";
 
mysqli_query($host,"$q");

$m="Successfully Inserted";


}



?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
    $("#staticBackdrop").css("display",'none');
    
 setTimeout(function() {
               location.reload(); // Reload the page
            }, 1100);
});
</script>


