<?php include("../session.php"); 

if($host){

$username=$_SESSION['username'];

if($_POST['did']!=''){
$id=$_POST['did']; 

if($sss=mysqli_query($host,"select job_title,job_code from job where id='$id'")){
 $ds=mysqli_fetch_array($sss);
$nameee=$ds[0]." - ".$ds[1]; 
mysqli_query($host,"delete from job where id='$id'"); 
mysqli_query($host,"delete from salary where job_id='$id'");
mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$username',idd='$idds', type=' $nameee Job is deleted by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");

$m="Successfully Deleted"; $icon="success";
}
else{
$m="Server Error"; $icon="error";
}

}else{


$title=addslashes($_POST['title']);
$code=$_POST['code'];
$rate=$_POST['rate'];
$billtime=$_POST['bill_time'];
$billtype=$_POST['bill_type'];
$response=$_POST['response']; 
$respdate=$_POST['response_date'];
$remote=$_POST['remote']; 
$expense=$_POST['expense'];
$min_exp=$_POST['min_exp'];
$max_exp=$_POST['max_exp'];

// insert new address in the db
$address=$_POST['address'];

$locations = implode(";", $address);


$startjob=$_POST['start_job'];
$endjob=$_POST['end_job'];
$remark=addslashes($_POST['remark']);
$comments=addslashes($_POST['comments']); 
$jobdesc=addslashes($_POST['job_desc']); 

$country=$_POST['country']; 
 
$city=$_POST['city'];
$pin=$_POST['pincode']; 
$district=$_POST['district'];

$hours=$_POST['hours']; 
$jobtype=$_POST['job_type'];


$cmanager=explode(";",$_POST['c_manager']);
$cmanagername=$cmanager[0];
$cmanageremail=$cmanager[1];

$ww=explode(";",$_POST['client']);
$client=$ww[0]; // raised by
$cid=$ww[1];

$notice=$_POST['notice']; 
$employee=$_POST['employee'];  
$priority=$_POST['priority'];


// job post configuation
$position = $_POST['ctc'];
$maxx = $_POST['maxx']; 
$publish = $_POST['publish'];

$sales=explode(";",$_POST['sales']);// with email and name
$salesname=$sales[0];
$salesemail=$sales[1];

$recrut=explode(";",$_POST['recrutment']); 
$recrutname=$recrut[0];
$recrutemail=$recrut[1];

$account=explode(";",$_POST['account']);  
$accountname=$account[0];
$accountemail=$account[1];

$assign=explode(";",$_POST['assigned']);
$assignname=$assign[0];
$assignemail=$assign[1];


// multipel document
$indus=implode(",", $_POST['indus']); 
$state=implode(",", $_POST['state']); // multiple
$document=implode(",", $_POST['document']); // multiple
$degree=implode(",", $_POST['degree']); // degree
$lang=implode(",", $_POST['lang']); // lanugage

 $update=$_POST['updates'];
$dateTime=date('Y-m-d h:i:s');

$token2=$_POST['token2'];

$salarycurrency=$_POST['salary_type'];
$salarytime=$_POST['salary_time'];
$minsalary=$_POST['min_salary'];
$maxsalary=$_POST['max_salary'];

$primary=$_POST['primary'];
$secondary=$_POST['secondary'];

$status=$_POST['job_status'];
$limit_main=$_POST['limit_main'];


if (trim($position) == '') {
    $m="No of Roles is required";
    $icon="error";
} else if (trim($startjob) == '') {
    $m="Job Start Date is required";
    $icon="error";
} else if($update){ 
    
$idds=$update;
$q="update job SET min_exp='$min_exp', max_exp='$max_exp',job_code='$code', job_title='$title', bill_type='$billtype', bill_time='$billtime',rate='$rate', start_job='$startjob', end_job='$endjob', response='$response', remote='$remote', expense='$expense', country='$country', state='$state',  ltime='$dateTime', status='$status', city='$city', pincode='$pin', district='$district', job_type='$jobtype', hours='$hours', client='$client', cid='$cid', c_manager='$cmanager', priority='$priority', notice='$notice', employee='$employee', position='$position', max='$maxx', sales='$salesname', sales_email='$salesemail', recrutment='$recrutname', recrutment_email='$recrutemail', account='$accountname',account_email='$accountemail',assigned='$assignname', assigned_email='$assignemail', comments='$comments', publish='$publish', job_desc='$jobdesc' ,document='$document', degree='$degree', indus='$indus', language='$lang' ,remark='$remark',primarys='$primary', secondary='$secondary' ,limit_main='$limit_main', response_date='$respdate', address='$locations', salary_type='$salarycurrency', salary_time='$salarytime', salary_max='$maxsalary', salary_min='$minsalary' where subdomain='$subdomain' and id='$update'";

if(mysqli_query($host,"$q")){
mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$username',idd='$idds', type=' $title Job is modified by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");

$m="Successfully Updated"; $icon="success";
}
else{
$m="Server Error"; $icon="error";
}

}else{  
    
 $q="INSERT INTO `job` SET min_exp='$min_exp', max_exp='$max_exp',job_code='$code', job_title='$title', bill_type='$billtype', bill_time='$billtime',rate='$rate', start_job='$startjob', end_job='$endjob', response='$response', remote='$remote', expense='$expense', country='$country', state='$state', subdomain='$subdomain', date='$date', ltime='$dateTime', status='$status', time='$time', city='$city', pincode='$pin', district='$district', job_type='$jobtype', hours='$hours', client='$client', cid='$cid', c_manager='$cmanagername', c_manager_email='$cmanageremail', priority='$priority', notice='$notice', employee='$employee', position='$position', max='$maxx',sales='$salesname', sales_email='$salesemail', recrutment='$recrutname', recrutment_email='$recrutemail' ,account='$accountname',account_email='$accountemail',assigned='$assignname', assigned_email='$assignemail',  comments='$comments', publish='$publish', job_desc='$jobdesc' ,document='$document', degree='$degree', indus='$indus', language='$lang' ,remark='$remark' , primarys='$primary', secondary='$secondary', limit_main='$limit_main', response_date='$respdate' , address='$locations' ,createname='$userbyname', createid='$username' , salary_type='$salarycurrency', salary_time='$salarytime', salary_max='$maxsalary', salary_min='$minsalary' , unit='FirstMile IT Services'";

if(mysqli_query($host,"$q")){

$s=mysqli_query($host,"select id from job order by id desc limit 1");
$d=mysqli_fetch_array($s);
$idd=$d[0];
$idds=$idd;

mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$username',idd='$idds', type='$title Job is created by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");

$m="Successfully Added"; $icon="success";
}
else{
$m="Server Error"; $icon="error";
}

}

if($token2){
$qqne2 = "";
if (!empty($address)) {
    for ($i = 0; $i < count($address); $i++) {
        $add = $address[$i];
        $s=mysqli_query($host,"select id from group_contact where sub_domain='$subdomain' and title='$add'");
        if(mysqli_num_rows($s)=='0'){
         $qqne2 .= "('$add', '$subdomain', '$userbyname', '$username', '$date'), ";
        }
    }
$last= $qqne2;
echo $address;
if ($last != '') {
    $last = rtrim($last, ', ');
    mysqli_query($host, "insert into group_contact (title, sub_domain, userby, user,date) values $last");
}
}
}

}

?>
<script> 
$("#loader").css("display","none");
Swal.fire({
    position: "top-center",
    icon: "<?php echo $icon; ?>",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
<?php if($icon=="success"){
?>
$("#staticBackdrop").css("display",'none');
 window.location='jobposting.php'; // Reload the page
 <?php } ?>

});

</script>
<?php
}
?>
