<?php include("../db.php"); 
$check=false;
$id=$_POST['id']; 

if($id){

mysqli_query($host,"delete from team where id='$id'"); 
$m="Successfully Deleted";
$check=true;

}else{

$name=$_POST['name'];
$mobile=$_POST['mobile']; 
$email=$_POST['email'];

$position=$_POST['position'];
$sid=$_POST['staffid'];

$department=$_POST['department'];
$aaa=explode(";",$_POST['manager']);
$manageemail = $aaa[0];
$managername = $aaa[1];


$update=$_POST['updates'];
$date=date('Y-m-d');
$time=date('h:i:s'); 


if($_FILES['image_file']['tmp_name']){
    $ext = strtolower(pathinfo($_FILES['image_file']['name'],PATHINFO_EXTENSION));
   $fileName="team".time().".".$ext;
   move_uploaded_file($_FILES['image_file']['tmp_name'],"../img/".$fileName); 
}else{
    if(isset($update)) { 
        $s=mysqli_query($host,"select path from team where id='$update'");
        $d=mysqli_fetch_array($s);
        $fileName=$d[0];
        
    }
}

if($update>0){ 

  $q="update team set manager='$managername', managere='$manageemail', name='$name', mobile='$mobile', email='$email', staffid='$sid', position='$position', department='$department', path='$fileName', date='$date',time='$time' where id='$update'"; 

mysqli_query($host,"$q");
$check=true;
$m="Successfully Updated";

}else{  

$passkey=uniqid().substr(time(),6,5).substr(uniqid(),1,5);
$password=md5($passkey);

$q="insert into team set password='$password', passkey='$passkey', manager='$managername', managere='$manageemail',sub_domain='$subdomain',name='$name', mobile='$mobile', email='$email', staffid='$sid', position='$position', department='$department',path='$fileName',status='Active',date='$date',time='$time'";

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
include("../content/team.php");
}
?>

