<?php 
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$hostt = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['PHP_SELF']);


include("../session.php"); 

$check=0;

$title=$_POST['title'];
$desc=$_POST['desc'];
$mode=$_POST['Mode'];
 $venue=$_POST['venue']; 
if($venue==""){
    $venue="N/A";
} 

 $dat=date('Y-m-d',strtotime($_POST['meetingdate'])); 
$tim=date('H:i:s',strtotime($_POST['meetingtime']));  

$attendence=explode(";",$_POST['attend']); 
$name=$attendence[0];
$email=$attendence[1];
$gust=$_POST['guest'];  
$notify=$_POST['n_email'];
$sid=$_POST['meetinghidden'];

$duration=$_POST['duration'];

$update=$_POST['meetingupdates'];
 
$date=date('Y-m-d');
$time=date('h:i:s'); 

if($update){ 

mysqli_query($host,"update meeting set notify='$notify',user='Admin',title='$title',description='$desc',mode='$mode',venue='$venue',dates='$dat',times='$tim',duration='$duration',adname='$name', ademail='$email',sid='$sid',guest='$gust' where sub_domain='$subdomain' and id='$update'");
$check=2;
$m="Successfully Updated";
$idd=$update;

}else{  

mysqli_query($host,"insert into meeting set sub_domain='$subdomain', notify='$notify',user='Admin',title='$title',description='$desc',mode='$mode',venue='$venue',dates='$dat',times='$tim',duration='$duration',adname='$name', ademail='$email',sid='$sid',guest='$gust',date='$date',time='$time'");
$check=13;

$m="Successfully Added";

$ss=mysqli_query($host,"select id from meeting order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];

if ($notify) {
$emailUrl = $protocol . "://" . $hostt . $path . "/email.php?id=" . urlencode($idd); // ✅ Send via GET
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $emailUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); // Get response content
$response = curl_exec($ch);
curl_close($ch);

}


}

if($check!=0){

$uploadDirectory = "../img/";
$ff="";
if (isset($_FILES['image_file']) && !empty($_FILES['image_file']['tmp_name'])) {
    foreach ($_FILES['image_file']['tmp_name'] as $key => $tmp_name) {
        if ($tmp_name != "" && $_FILES['image_file']['error'][$key] == UPLOAD_ERR_OK) {
            $sourcePath = $tmp_name;
            $image_info = pathinfo($_FILES['image_file']['name'][$key], PATHINFO_EXTENSION);
            $newFileName = time() . "_" . uniqid() . "." . $image_info;
            $targetPath = $uploadDirectory . $newFileName;

            if (move_uploaded_file($sourcePath, $targetPath)) {
                $ff.=" ('$newFileName','$sid','$idd','$date','$time','Admin','meraqui') ,";
            }
        }
    }
if($ff!=''){
$ff=rtrim($ff,",");
mysqli_query($host,"insert into survey_upload (file,sid,idd,date,time,username,sub_domain) values $ff");
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
abc();
<?php
if($check=="1"){
?>
$("#me_rows<?php echo $id;?>").remove();
<?php
}  
else if($check=="2"){
?>
$("#ee_rows<?php echo $update;?>").append(`
       <td><?php echo strtoupper($name." ".$last."<br>".$mobile);?></td>
        <td><?php echo $ename."<br>".$office." - ".$ext;?></td>
        <td><?php echo $status;?></td>
        <td>
            
<div class="action-wrapper position-relative">
    <!-- 3-dot icon -->
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>

    <!-- Action Box -->
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;" onclick="edit('7',<?php echo $idd;?>);"></i>
      <i class="ri-delete-bin-line text-primary" style="cursor:pointer;" onclick="dele(<?php echo $idd;?>);"></i>
    </div>
  </div>
            
</td>
`);
<?php
}   
else if($check=="3"){
?>
$("#employeetable").append(`
<tr>
        <td><?php echo strtoupper($name." ".$last."<br>".$mobile);?></td>
        <td><?php echo $ename."<br>".$office." - ".$ext;?></td>
        <td><?php echo $status;?></td>
        <td>
            
<div class="action-wrapper position-relative">
    <!-- 3-dot icon -->
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>

    <!-- Action Box -->
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;" onclick="edit('7',<?php echo $idd;?>);"></i>
      <i class="ri-delete-bin-line text-primary" style="cursor:pointer;" onclick="dele(<?php echo $idd;?>);"></i>
    </div>
  </div>
   </td>         
</tr>
`);
<?php
}
?>    
});

</script>
<?php
}


?>