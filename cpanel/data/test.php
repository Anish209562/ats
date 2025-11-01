<?php
include("../session.php");

if(isset($_FILES['bulk']['tmp_name']) && $_FILES['bulk']['tmp_name'] != '') {

    // Check file size (<= 5MB)
    if($_FILES['bulk']['size'] > 6*1024*1024) {
        ?>
        <script>
        $('#loader').hide();
        Swal.fire({
            icon: 'error',
            title: 'File too large!',
            text: 'Please upload a file smaller than 5 MB.'
        });
        </script>
        <?php
        exit;
    }

    $photo = $_FILES['bulk']['tmp_name'];
    $userby = $_SESSION['username'];
$tt=$_POST['type'];
    $file = fopen($photo,"r");
    $firstRow = fgetcsv($file); // skip header row

    $qqne = "";
    $alreadyExist = [];
    $unique = [];
    $duplicate = [];
    $seenWebsites = [];

 if($tt=='2'){

    $qqne = "";
    $alreadyExist = [];
    $unique = [];
    $duplicate = [];
    $seenMobiles = [];

    while($data = fgetcsv($file)) {
        $createddate=$data[0];
        $userbyname=addslashes($data[1]);
        $ownership=addslashes($data[2]);
        $aid=$data[3];
        $FirstName=addslashes($data[4]);
        $Email=$data[5];
        $MobileNumber=$data[6];
        
        $client=$data[7];
        $jobtitle=$data[8];
        $jobcode=$data[9];
        $pstatus=$data[10];
        $sdate=strtotime($data[11]);
        $ssdate=date('Y-m-d',$sdate);
        $sstime=date('H:i:s',$sdate);

        if($MobileNumber != '' && $FirstName != '') {
            
        $qqne= "('$FirstName', '$Email', '$MobileNumber','Active', 'meraqui','$createddate','$userbyname','Bulk Parsing','$ownership')";
        $aa="INSERT INTO `applicant`(`name`, `email`,`mobile`, `status`, `subdomain`,`date`, `createname`,`createtype`,`ownername`) values  $qqne";
        if(mysqli_query($host,$aa)){
        if($jobcode!=''){
            $aas=mysqli_query($host,"select id from applicant order by id desc limit 1");
            $asa=mysqli_fetch_array($aas);
            $aid=$asa[0];
            
                $jj=mysqli_query($host,"select id,cid from job where job_code='$jobcode'");
                $js=mysqli_fetch_array($jj);
                $jobid=$js[0];
                $cid=$js[1];
                
                
                $qqne4.="('$subdomain','avail','$aid','$jobid','$ssdate','$sstime','$userbyname'), ";
                
                
                $qqne2.= "('$cid','$aid','$jobid','$ssdate','$sstime','$subdomain','$userbyname','$pstatus'), ";
                $qqne3.="('$aid','$comment','$ssdate','$sstime','$userbyname','$subdomain','applicant','$pstatus','$jobid'), ";
                
                
                }
        }
                
                
            
        }
    }
    
    $qqne4=rtrim($qqne4,", ");
    $qqne3=rtrim($qqne3,", ");
    $qqne2=rtrim($qqne2,", ");
    mysqli_query($host,"insert into submit_data (subdomain,avail,aid, jid,date, time,userby) values $qqne4");
    
    mysqli_query($host, "insert into submitjob (clientid,sid,jobid,date,time,sub_domain,type,status) values $qqne2");
    mysqli_query($host,"insert into shistory (idd,comment,date,time,userby,sub_domain,table_type,status,type) values $qqne3");

    fclose($file);
    mysqli_close($host);

    ?>
    <script>
    $('#loader').hide();
  
    </script>
    <?php
}

    fclose($file);
    mysqli_close($host);
    ?>
    <script>
    $('#loader').hide();
    
    </script>
    <?php
}
else {
?>
<script>
    $('#loader').hide();
    Swal.fire({
        icon: 'warning',
        title: 'No file found',
        text: 'Please upload a valid CSV file.'
    });
</script>
<?php
}
?>
