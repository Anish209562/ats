<?php include("../session.php"); 
 $id=$_POST['status_hidden'];
 $tt=$_POST['tables'];
$status=$_POST['status'];
$remark=$_POST['comment'];

$table=""; $tabletype='';
switch($tt){
    case "3":
    $table="applicant";
    $tabletype='2';
    break;
    case "2":
    $table="job";
    $tabletype='3';
    break;
    case "1":
    $table="submitjob";
    $tabletype='1';
    break;
    
    case "22": case "44":
    $table="onboarding";
    $tabletype='101';
    break;
}

if($table=="submitjob"){
$query="select status,jobid,sid from $table where id='$id'";
}
else{
$query="select status from $table where id='$id'";
}


$ss=mysqli_query($host,$query);
$dd=mysqli_fetch_array($ss);
$old=$dd[0];
$sid=$id;
$jj="";

// check when submitjob only then jobid inserg
if($table=="submitjob"){
$jobid=$dd[1];
$sid=$dd[2];
$jj=" , jid='$jobid'";
}

if($table=="onboarding"){
    if($tt=="22"){
        $status="cancel";
    }
    if($tt=="44"){
        $status="disqualify";
    }
}

$username=$_SESSION['username'];

if(strtolower(trim($old))!=strtolower(trim($status))){

if(mysqli_query($host,"update $table set status='$status',comment='$remark' where id='$id' ")){
$m="Successfully Updated";
$date=date('Y-m-d');
$time=date('H:i:s');

mysqli_query($host,"insert into shistory set idd='$sid' , table_type='$table',comment='$remark', status='$status', username='$username',userby='$userbyname', date='$date', time='$time', sub_domain='$subdomain', type='$tabletype' $jj");

mysqli_query($host,"insert into upate set idd='$sid' , table_type='$table',type='The $table Status has been changed from [ $old ] to [ $status ] by $userbyname.', userby='$userbyname', date='$date', time='$time', sub_domain='$subdomain' , username='$username'");
?>
<script>
    $("#loader").hide();
	  Swal.fire({
        position: "top-center",
        icon: "success",
        title: "<?php echo $m;?>",
        showConfirmButton: false,
        timer: 1500
    }).then(()=>{
        $("#applicant_status_div_<?php echo $id;?>").text("<?php echo $status;?>");
        abc();
    });
</script>
<?php
}
else{
?>
<script>
    $("#loader").hide();
      Swal.fire({
        position: "top-center",
        icon: "error",
        title: "Server Error",
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php
}

}
else{
?>
<script>
    $("#loader").hide();
      Swal.fire({
        position: "top-center",
        icon: "error",
        title: "Please select new Status",
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php
}
?>