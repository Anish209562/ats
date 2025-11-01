<?php include("../session.php"); 

if($_POST['did']!=''){
 $id=$_POST['did']; 

if($sss=mysqli_query($host,"select name,email from applicant where id='$id'")){
$ds=mysqli_fetch_array($sss);
$namee=$ds[0]." - ".$ds[1];
mysqli_query($host,"delete from applicant where id='$id'"); 

mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$username',idd='$id', type='$namee profile is deleted by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");
$m="Successfully Deleted"; $icon="success";

}
else{
$m="Not found"; $icon="error";
}

}else{

$name=addslashes($_POST['name']);
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$refer=$_POST['refer']; 
$indus=$_POST['industry']; 
$gender=$_POST['gender'];
$remark=addslashes($_POST['remark']);
$address=addslashes($_POST['address']); 

$city=addslashes($_POST['city']);
$state=addslashes($_POST['state']);


$year=$_POST['year']; 
$source=$_POST['source'];  
$skill=$_POST['skill'];

$status=addslashes($_POST['status']); 
$group=addslashes($_POST['group']);  
$period=$_POST['period'];

$reloaction = $_POST['reloaction'];
$ctc = $_POST['ctc']; 
$ctctype=$_POST['ctctype'];

$ectc = $_POST['ectc'];
$ectctype=$_POST['ectctype'];

$cname=addslashes($_POST['cname']); 

$jobtitle=addslashes($_POST['jobtitle']);

$lang=implode(",", $_POST['lang']); 
$tech=implode(",", $_POST['tech']);

 $update=$_POST['updates'];
$dateTime=date('Y-m-d h:i:s');

$token2=$_POST['token2'];

$username=$data['username'];

// generate password 
$passkey=substr(uniqid(),1,6).substr(time(),3,7)."_meraqui";
$password=md5($passkey);


if($update){ 
$aap=mysqli_query($host,"select status from applicant where id='$update'");
$aps=mysqli_fetch_array($aap);

$idds=$update;
 $q="update applicant set jobtitle='$jobtitle',name='$name',cname='$cname', email='$email', mobile='$mobile', address='$address', refer='$refer', industry='$indus', subdomain='$subdomain',remark='$remark', gender='$gender', year='$year', status='$status', source='$source',skill='$skill', groups='$group', period='$period', reloaction='$reloaction',ctc='$ctc',ctc_type='$ctctype', ectc='$ectc',ectc_type='$ectctype',ltime='$dateTime',lang='$lang',tech='$tech' ,city='$city', state='$state' where id='$update' and subdomain='$subdomain'"; 

if(mysqli_query($host,"$q")){
mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$username',idd='$idds', type='$name profile is modified by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");

if($status!=$aps[0]){
mysqli_query($host,"insert into the shistory set idd='$idd', comment='$name status has been changed by applicant full detail modified',date='$date', time='$time', userby='$userbyname', username='$username', sub_domain='$subdomain',table_type='applicant',status='$status', type='2'");

}
$m="Successfully Updated"; $icon="success";

}
else{
$m="Server Error"; $icon="error";
}


}else{  
$aap=mysqli_query($host,"select status from applicant where email='$email' and mobile='$mobile'");
if(mysqli_num_rows($aap)==0){
    $datee=date('Y-m-d h:i:s');
$q="insert into applicant set jobtitle='$jobtitle', name='$name',cname='$cname', email='$email', mobile='$mobile', address='$address', refer='$refer', industry='$indus', subdomain='$subdomain',remark='$remark', gender='$gender', year='$year', status='$status', source='$source',skill='$skill', groups='$group', period='$period', reloaction='$reloaction', ctc='$ctc',ctc_type='$ctctype', ectc='$ectc',ectc_type='$ectctype', date='$datee',lang='$lang',tech='$tech' ,createname='$userbyname', createid='$username' ,city='$city', state='$state' , createtype='Manual Creation' , unit='FirstMile IT Services', ownershipid='$username', ownername='$userbyname' ";
 
if(mysqli_query($host,"$q")){
$ss=mysqli_query($host,"select id from applicant order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$username',idd='$idd', type='$name profile is created by $userbyname through Manual Creation.', date='$date', time='$time', sub_domain='$subdomain'");

mysqli_query($host,"insert into the shistory set idd='$idd', comment='$name has been created',date='$date', time='$time', userby='$userbyname', username='$username', sub_domain='$subdomain',table_type='applicant',status='$status', type='2'");


$m="Successfully Added"; $icon="success";
}
else{
$m="Server Error"; $icon="error";
}

}
else{
$m="Mobile Already exist";
$icon="error";
}

}


}
?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "<?php echo $icon;?>",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
<?php if($icon=="success"){
?>
$("#staticBackdrop").css("display",'none');
 window.location='applicant.php'; // Reload the page
 <?php } ?>
 
});

  

</script>
