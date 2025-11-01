<?php
include("../session.php");

if($_POST['title']!='' && $_POST['min_exp']!='' && $_POST['max_exp']!='' && $_POST['jobid']!='' && $_POST['index']!=''){
 $title=$_POST['title'];
 $max=$_POST['max_exp'];
 $min=$_POST['min_exp'];
 $jid=$_POST['jobid'];
 $index=$_POST['index'];
 
 $js=mysqli_query($host,"select primarys from job where id='$jid'");
 $jss=mysqli_fetch_array($js);
 $old=explode(",",$jss['primarys']);
 
 if (isset($old[$index])) {
    $old[$index] = $title;
}
$updatedSkills = implode(",", $old);
if(mysqli_query($host,"update job set primarys='$updatedSkills' ,min_exp='$min', max_exp='$max' where id='$jid'")){
$message="Successfully Done"; $icon="success";
}
else{
 $message="Server Error"; $icon="error";  
}
 
}
else{
$aid      = $_POST['document_aid'] ?? 0; 
$jid     = $_POST['document_jobid'] ?? 0;

$avail      = $_POST['availability'] ?? '';
$bill_type  = $_POST['bill_type'] ?? '';
$bill_time  = $_POST['bill_time'] ?? '';
$bill_rate  = $_POST['rate'] ?? '';
$pay_type   = $_POST['pay_type'] ?? '';
$pay_time   = $_POST['pay_time'] ?? '';
$pay_rate   = $_POST['pay_rate'] ?? '';
$relocation = $_POST['relocation'] ?? '';
$resume     = $_POST['resume'] ?? '';
$other      = $_POST['other'] ?? '';
$comments   = $_POST['recipients-textarea'] ?? '';

$date       = date('Y-m-d');
$time       = date('H:i:s');

$username=$_SESSION['username'];
$resume = '';
if (!empty($_FILES['resumeFile'.$jid]['tmp_name'])) {
    $ext = pathinfo($_FILES['resumeFile'.$jid]['name'], PATHINFO_EXTENSION);
    $resume = "resume_" . time() . "." . $ext;
    move_uploaded_file($_FILES['resumeFile'.$jid]['tmp_name'], "../img/" . $fileName);
    
mysqli_query($host,"insert into survey_upload set idd='$jid', sid='$aid', sub_domain='$subdomain', date='$date', time='$time', file='$resume', dtype='Resume', dtitle='Applicant Resume by Submit Job', dcomment='$username is update new resume file', userbyname='$userbyname', username='$username'");  

}

$recipients = isset($_POST['recipients_select'.$jid]) ? implode(',', $_POST['recipients_select'.$jid]) : '';
$notifiers  = isset($_POST['notifiers'.$jid]) ? implode(',', $_POST['notifiers'.$jid]) : '';

$jjs=mysqli_query($host,"select * from submit_data where aid='$aid' and jid='$jid' and subdomain='$subdomain'");

if (mysqli_num_rows($jjs)==1) {
    $q = "update submit_data SET subdomain='$subdomain',avail='$avail',bill_type='$bill_type',bill_time='$bill_time',bill_rate='$bill_rate',pay_type='$pay_type',pay_time='$pay_time',pay_rate='$pay_rate',relocation='$relocation',resume='$resume',receipts='$recipients',addition='$notifiers',other='$other',comments='$comments' WHERE jid='$jid' and aid='$aid'";
if(mysqli_query($host, $q)){
    $message = "Successfully Updated!"; $icon="success";

}
else{
 $message="Server Error"; $icon="error";  
}

} else {
  $q = "insert into submit_data SET subdomain='$subdomain',avail='$avail',bill_type='$bill_type',bill_time='$bill_time',bill_rate='$bill_rate',pay_type='$pay_type',pay_time='$pay_time',pay_rate='$pay_rate',aid='$aid', jid='$jid',date='$date', time='$time',relocation='$relocation',resume='$resume',receipts='$recipients',addition='$notifiers',other='$other',comments='$comments', userby='$userbyname', username='$username'";

    if(mysqli_query($host, $q)){
    $message = "Successfully Added!"; $icon="success";
    }
else{
 $message="Server Error"; $icon="error";  
}
    
}


}

echo "<script>
$('#loader').hide();
Swal.fire({
    position: 'top-center',
    icon: '$icon',
    title: '$message',
    showConfirmButton: false,
    timer: 1200
}).then(()=>{ $('.btn-close').click(); $('#submitornot$jid').val('$jid'); setTimeout(function (){ $('#dataedit').html('');},2000);});


</script>";
?>
