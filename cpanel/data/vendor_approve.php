<?php include("../db.php"); 

 $id=$_POST['id']; 

if($id){

	mysqli_query($host,"delete from user where id='$id'"); 
	
	$aaaa=mysqli_query($host,"select mobile from user where id='$id'"); 
	$arrra=mysqli_fetch_array($aaaa);
	$moible=$arrra['mobile'];
	
		mysqli_query($host,"delete from apk_token where user='$moible'"); 

$m="Successfully Deleted";

}else{

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$occupation=$_POST['occupation'];
$password=md5($_POST['password']);
$dob=$_POST['dob']; 
$mstatus=$_POST['mstatus']; 
$gender=$_POST['gender'];  
$education=$_POST['edu_qualification'];
$address=$_POST['address']; 
$pincode=$_POST['pincode'];
$aadhar_id=$_POST['aadhar_id']; 
$pan_id=$_POST['pan_id']; 
$monthly_incom=$_POST['monthly_incom']; 
$card_stage=$_POST['card_stage']; 
$is_vender=$_POST['is_vender']; 
$is_varification=$_POST['is_varification']; 
$userrole=$_POST['userrole']; 
$status=$_POST['status']; 

$family1=$_POST['family1']; 
$family2=$_POST['family2']; 
$family3=$_POST['family3']; 

$vehicle1=$_POST['vehicle1']; 
$vehicle2=$_POST['vehicle2']; 
$vehicle3=$_POST['vehicle3'];

$photo=$_POST['photo_hidden'];

 $update=$_POST['updates'];
$dateTime=date('Y-m-d h:i:s');




if($update){ 
    
if($_POST['cid']){
$photoData = base64_decode($photo);
   $fileName="user".time().uniqid().".jpg";
   file_put_contents("../img/".$fileName,$photoData); 
}else{
  $check=mysqli_query($host,"select photo from user where id='$update' ");
  $ch=mysqli_fetch_array($check);
  $fileName=$ch['photo'];
}

 $q="update user set photo='$fileName', name='$name',mobile='$mobile', `password`='$password',email='$email',address='$address',dob='$dob',mstatus='$mstatus',occu='$occupation',aadhar='$aadhar_id',pan='$pan_id',gender='$gender', pincode='$pincode', status='$status', ltime='$dateTime', plan='$card_stage',user='$userrole', education='$education'  , F_member='$family1', family2='$family2', family3='$family3', vehicle='$vehicle1',  vehicle2='$vehicle2', vehicle3='$vehicle3' where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

$q="insert into sms_allotment set name='$name',mobile='$mobile',email='$email',address='$address',dob='$dob',mstatus='$mstatus',occu='$occupation',aadhar='$aadhar_id',pan='$pan_id',gender='$gender',status='$status',date='$date',time='$time'";
 
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
}).then(function() {
    $("#staticBackdrop").css("display",'none');
    
 setTimeout(function() {
                location.reload(); // Reload the page
            }, 1100);
});
</script>
<?php include("../content/vendor_approve.php");?>




