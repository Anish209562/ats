<?php
include("../session.php");

if($_FILES['bulk']['tmp_name']) {

    $photo = $_FILES['bulk']['tmp_name'];
    $dc = $_POST['dupOption'];
    $createsource = $_POST['source'];
     $jobid=isset($_POST['jobid']) && $_POST['jobid']!=0 ? $_POST['jobid'] : '';

    $userby = $_SESSION['username'];

    $file = fopen($photo,"r");
    $firstRow = fgetcsv($file); // skip header

    $qqne = "";
    $alreadyExist = [];
    $unique = [];
    $duplicate = [];
    $missingRequired = [];
    $seenMobiles = [];
    $seenEmails = [];

    while($data = fgetcsv($file)) {
        $FirstName            = trim($data[0]);
        $Email                = trim($data[1]);
        $MobileNumber         = trim($data[2]);
        $Address              = $data[3];
        $Source               = $data[4];
        $Experience           = $data[5];
        $PrimarySkills        = $data[6];
        $AdditionalComments   = $data[7];
        $CurrentCompany       = $data[8];
        $CurrentCTC           = $data[9];
        $CurrentCTC_type      = $data[10];
        $ExpectedPay          = $data[11];
        $ExpectedPay_type     = $data[12];
        $NoticePeriod         = $data[13];
        $ReferredBy           = $data[14];
        $ApplicantGroup       = $data[15];
        $DateOfBirth          = $data[16];
        $Relocation           = $data[17];
        $Gender               = $data[18];
        $Technology           = $data[19];
        $Industry             = $data[20];

        if($FirstName != '') {
            if($MobileNumber == '' || $Email == ''){
                $missingRequired[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email,
                    "missing" => $MobileNumber == '' && $Email == '' ? 'Mobile, Email' : ($MobileNumber == '' ? 'Mobile' : 'Email')
                ];
                continue;
            }

            $duplicateApplicant = ats_find_duplicate_applicant($host, $subdomain, $Email, $MobileNumber);
            if($duplicateApplicant){
                $alreadyExist[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email,
                    "matched_on" => !empty($duplicateApplicant['email_match']) && !empty($duplicateApplicant['mobile_match']) ? 'Email, Mobile' : (!empty($duplicateApplicant['email_match']) ? 'Email' : 'Mobile')
                ];
                continue; // skip DB insert
            }

            $normalizedMobile = ats_normalize_mobile($MobileNumber);
            $normalizedEmail = ats_normalize_email($Email);
            $mobileExistsInCsv = $normalizedMobile !== '' && in_array($normalizedMobile, $seenMobiles, true);
            $emailExistsInCsv = $normalizedEmail !== '' && in_array($normalizedEmail, $seenEmails, true);

            if($mobileExistsInCsv || $emailExistsInCsv){
                $duplicate[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email,
                    "matched_on" => $mobileExistsInCsv && $emailExistsInCsv ? 'Email, Mobile' : ($emailExistsInCsv ? 'Email' : 'Mobile')
                ];
            } else {
                if($normalizedMobile !== ''){
                    $seenMobiles[] = $normalizedMobile;
                }
                if($normalizedEmail !== ''){
                    $seenEmails[] = $normalizedEmail;
                }
                $unique[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email
                ];
                  $datee=date('Y-m-d h:i:s');
                 $qqne= "('$FirstName', '$Email', '$MobileNumber', '$Address', '$Source', '$Experience', 'Active', '$PrimarySkills', '$AdditionalComments', '$CurrentCompany', '$CurrentCTC','$CurrentCTC_type', '$ExpectedPay', '$ExpectedPay_type','$NoticePeriod', '$ReferredBy', '$ApplicantGroup', '$DateOfBirth', '$Relocation', '$Gender', '$Technology', '$Industry','meraqui','$datee','$userby','$userbyname','Bulk Parsing')";
                
                $aa="INSERT INTO `applicant`( `name`, `email`,`mobile`, `address`,  `source`, `year`, `status`, `skill`, `comment`, `cname`, `ctc`, `ctc_type`,  `ectc`,`ectc_type`, `period`, `refer`, `groups`, `dob`, `reloaction`, `gender`, `tech`, `industry`, `subdomain`,`date`,`createid`, `createname`,`createtype`) values  $qqne";
                 mysqli_query($host,$aa);
                 
 $ss=mysqli_query($host,"select id,name from applicant order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
$sname=$dd[1];
                 
                 if($jobid!=''){
            // check job code
            $js=mysqli_query($host,"select cid,job_code from job where id='$jobid'");
            $js2=mysqli_fetch_array($js);
            $jobcode=$js2[1];
            $cid=$js2[0];
            $qqne=''; $qqne2='';
            $s = mysqli_query($host, "select id from submitjob where sid='$idd' and jobid='$jobid'");
            if (mysqli_num_rows($s) == 0) {
                $comment="$sname applicant to Assign Job of [ $jobcode ]";
                $qqne= "('$cid','$idd','$jobid','$date','$time','meraqui','$userbyname','$userby','SUBMITTED TO ATS','$comment')";
                mysqli_query($host, "insert into submitjob (clientid,sid,jobid,date,time,sub_domain,type,username,status,comment) values $qqne");
                $qqne2="('$idd','$comment','$date','$time','$userbyname','meraqui','applicant','$userby','SUBMITTED TO ATS','$jobid')";
                mysqli_query($host,"insert into shistory (idd,comment,date,time,userby,sub_domain,table_type,username,status,type) values $qqne2");
            }

}
                 
                 
            }
        }
    }


    fclose($file);
    mysqli_close($host);

    // now show modal instead of swal
    ?>
    <script>
    $('#loader').hide();
    var modalHtml = `
    <div class="modal fade" style="z-index:9992 !important;" id="bulkResultModal" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title">Bulk Upload — Results</h5>
            <button type="button" class="btn-close" onclick="window.location.reload(true);"></button>
          </div>
          <div class="modal-body">

            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#addedTab"><?php echo count($unique);?> Added</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#missingRequiredTab"><?php echo count($missingRequired);?> Missing Mobile/Email</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#dupCsvTab"><?php echo count($duplicate);?> Duplicates in CSV</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#alreadyDbTab"><?php echo count($alreadyExist);?> Already in DB</a></li>
            </ul>

            <div class="tab-content mt-3" style="max-height: 500px;overflow-y: auto;">
              <div class="tab-pane fade show active" id="addedTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($unique as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['mobile']?></td><td><?=$row['email']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="missingRequiredTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th><th>Missing</th></tr></thead>
                  <tbody>
                  <?php foreach($missingRequired as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['mobile']?></td><td><?=$row['email']?></td><td><?=$row['missing']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="dupCsvTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th><th>Matched On</th></tr></thead>
                  <tbody>
                  <?php foreach($duplicate as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['mobile']?></td><td><?=$row['email']?></td><td><?=$row['matched_on']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="alreadyDbTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th><th>Matched On</th></tr></thead>
                  <tbody>
                  <?php foreach($alreadyExist as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['mobile']?></td><td><?=$row['email']?></td><td><?=$row['matched_on']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" onclick="window.location.reload(true);">Close</button>
          </div>
        </div>
      </div>
    </div>`;

    $("body").append(modalHtml);
    var bulkModal = new bootstrap.Modal(document.getElementById('bulkResultModal'));
    bulkModal.show();
    </script>
    <?php
}
else{
?>
<script>
    $('#loader').hide();
    alert("File Not found");
</script>
<?php
}
?>
