<?php include "../session.php";
$jobid = $_POST['jobid'];
$sid = $_POST['sid'];
$username = $_SESSION['username'];
if ($sid != '') {
    
$app=mysqli_query($host,"select name from applicant where id='$sid' and subdomain='$subdomain'");
$aps=mysqli_fetch_array($app);
$sname=$aps[0];

    $qqne = ""; $qqne2="";
    if (!empty($jobid) && $sid != '') {
        for ($i = 0; $i < count($jobid); $i++) {
            $jid = htmlspecialchars($jobid[$i]);
            if($jid!=''){
            // check job code
            $js=mysqli_query($host,"select cid,job_code from job where id='$jid'");
            $js2=mysqli_fetch_array($js);
            $jobcode=$js2[1];
            $cid=$js2[0];
            
            $s = mysqli_query($host, "select id from submitjob where sid='$sid' and jobid='$jid'");
            if (mysqli_num_rows($s) == 0) {
                $comment="$sname applicant to Assign Job of [ $jobcode ]";
                $qqne .= "('$cid','$sid','$jid','$date','$time','$subdomain','$userbyname','$username','SUBMITTED TO ATS','$comment') ,";
                $qqne2.="('$sid','$comment','$date','$time','$userbyname','$subdomain','applicant','$username','SUBMITTED TO ATS','$jid') ,";
            }
            }
        }
        if ($qqne != '') {
            $qqne = rtrim($qqne, ",");
            $qqne2=rtrim($qqne2,",");
            if (mysqli_query($host, "insert into submitjob (clientid,sid,jobid,date,time,sub_domain,type,username,status,comment) values $qqne")) {
                mysqli_query($host,"insert into shistory (idd,comment,date,time,userby,sub_domain,table_type,username,status,type) values $qqne2");
                $m = "Successfully Added";
                $icon = "success";
            } else {
                $m = "Query not fired";
                $icon = "error";
            }
        }
    } else {
        $m = "Data not found";
        $icon = "error";
    }
    ?> <script> Swal.fire("<?php echo $m; ?>", "", "<?php echo $icon; ?>").then(()=>{
         <?php if($icon=="success"){?>window.location='app_view.php?sid=<?php echo $sid;?>'; <?php } ?>
        }); </script> <?php
} ?>
