<?php
include("../session.php");

$userby = isset($_SESSION['username']) ? $_SESSION['username'] : 'unknown';
$jobid= isset($_POST['jid']) && $_POST['jid']!=0 ? $_POST['jid'] : '';

$date = date('Y-m-d');
$time = date('H:i:s');


if (isset($_FILES['resume_files']) && isset($_POST['resume_data'])) {

    $files = $_FILES['resume_files'];
    $dataArray = json_decode($_POST['resume_data'], true);

    if (!$dataArray) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid resume data."
        ]);
        exit;
    }

    $uploadDir = '../img/'; // Make sure this directory exists and is writable

    $savedFiles = [];
    for ($i = 0; $i < count($files['name']); $i++) {
        $filename = basename($files['name'][$i]);
        
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $baseName = pathinfo($filename, PATHINFO_FILENAME);
        $baseNameShort = substr($baseName, 0, 6);
        preg_match('/^Naukri_(.*?)\[/i', $filename, $matches);
        if (isset($matches[1])) {
           $baseNameShort = $matches[1];
        }
        
        $savedFiles[] = [
        'tmp_name' => $files['tmp_name'][$i],
        'orig_name' => $filename,
        'base_short' => $baseNameShort,
        'extension' => $extension
       ];
    }

$source="Resume Parse";
if (isset($files['name']) && count($files['name']) > 1) {
    $source = "Bulk Parse";
}


$inserted = []; // newly added applicants
$alreadyExist = [];
$missingRequired = [];

foreach ($dataArray as $index => $item) {
    $name = isset($item['name']) ? mysqli_real_escape_string($host, $item['name']) : '';
    $email = isset($item['email']) ? mysqli_real_escape_string($host, trim($item['email'])) : '';
    $mobile = isset($item['phone']) ? mysqli_real_escape_string($host, trim($item['phone'])) : '';
    $experience = isset($item['experience']) ? mysqli_real_escape_string($host, $item['experience']) : '';
    
    $fileInfo = $savedFiles[$index];
    
    $years = 0;
    $months = 0;
    if (preg_match('/(\d+)\s*Years?\s*(\d+)?\s*Months?/', $experience, $matches)) {
        $years = intval($matches[1])." Years";
        if (isset($matches[2]) && $matches[2] !== '') {
            $months = intval($matches[2])." Months";
        }
    } elseif (preg_match('/(\d+)\s*Years?/', $experience, $matches)) {
        $years = intval($matches[1])." Years";
    } elseif (preg_match('/(\d+)\s*Months?/', $experience, $matches)) {
        $months = intval($matches[1])." Months";
    }
    
    $technicalSkills = isset($item['technicalSkills']) ? mysqli_real_escape_string($host, implode(", ", $item['technicalSkills'])) : '';
    $education = isset($item['education']) ? mysqli_real_escape_string($host, implode(", ", $item['education'])) : '';


if ($name != '') {

if ($mobile == '' || $email == '') {
    $missingRequired[] = [
        'name' => $name,
        'mobile' => $mobile,
        'email' => $email,
        'missing' => $mobile == '' && $email == '' ? 'Mobile, Email' : ($mobile == '' ? 'Mobile' : 'Email')
    ];
    $mess="Mobile and Email are required";
    continue;
}

$duplicateApplicant = ats_find_duplicate_applicant($host, $subdomain, $email, $mobile);

if (!$duplicateApplicant) {

$inserted[] = ['name'=>$name, 'mobile'=>$mobile, 'email'=>$email]; 
$datee=date('Y-m-d h:i:s');
$qqne= "('$name', '$email', '$mobile', '$months $years', '$technicalSkills', 'meraqui', '$datee', '$userby', '$userbyname','$source','Active (Allowed to Submit)') ";

$query = "INSERT INTO `applicant`(`name`, `email`, `mobile`, `year`, `skill`, `subdomain`, `date`, `createid`, `createname`,`source`,`status`) VALUES $qqne";
if(mysqli_query($host, $query)){
/// get pdf 
$timestamp = time();
$realFilename = $timestamp . "_" . $fileInfo['base_short'] . "." . $fileInfo['extension'];
$targetFile = $uploadDir . $realFilename;

$gg=mysqli_query($host,"select id,name from applicant order by id desc limit 1");
$gh=mysqli_fetch_array($gg);
$sid=$gh[0];
$sname=$gh[1];
                
 mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$userby',idd='$sid', type='Applicant profile is created by $userbyname through Parse Resume', date='$date', time='$time', sub_domain='meraqui'");
 
if (!empty($item['education'])) {
    foreach ($item['education'] as $edu) {
        $major = mysqli_real_escape_string($host, $edu);
        $qs = "INSERT INTO education SET major='$major', sid='$sid', date='$date', time='$time', sub_domain='meraqui'";
        mysqli_query($host, $qs);
    }
}
if (move_uploaded_file($fileInfo['tmp_name'], $targetFile)) {
 $q="insert into survey_upload set userbyname='$userbyname',username='$userby',dtype='Resume',dtitle='Applicant Resume',file='$realFilename' ,sid='$sid' , sub_domain='meraqui', date='$date', time='$time', dcomment='applicant resume is uploaded by $userby through resume parsing'";
  mysqli_query($host, $q);
}

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
                $qqne= "('$cid','$sid','$jobid','$date','$time','meraqui','$userbyname','$userby','SUBMITTED TO ATS','$comment')";
                mysqli_query($host, "insert into submitjob (clientid,sid,jobid,date,time,sub_domain,type,username,status,comment) values $qqne");
                $qqne2="('$sid','$comment','$date','$time','$userbyname','meraqui','applicant','$userby','SUBMITTED TO ATS','$jobid')";
                mysqli_query($host,"insert into shistory (idd,comment,date,time,userby,sub_domain,table_type,username,status,type) values $qqne2");
            }

}

$mess="successfully Imported";      
        
}
else{
  $mess="Server Error";
}
            
}
        else{
            $alreadyExist[] = [
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'matched_on' => !empty($duplicateApplicant['email_match']) && !empty($duplicateApplicant['mobile_match']) ? 'Email, Mobile' : (!empty($duplicateApplicant['email_match']) ? 'Email' : 'Mobile')
            ];
            $mess="Already Found";

        }
        
        
    }
}

mysqli_close($host);
?>
<script>
alert("<?php echo $mess;?>");
document.getElementById('job-loader').style.display = 'none';

var modalHtml = `
    <div class="modal fade" style="z-index:9992 !important;" id="bulkResultModal" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title">Resume Parse Upload — Results</h5>
            <button type="button" class="btn-close" onclick="window.location.reload(true);"></button>
          </div>
          <div class="modal-body">

            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#addedTab"><?php echo count($inserted);?> Added</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#missingRequiredTab"><?php echo count($missingRequired);?> Missing Mobile/Email</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#alreadyDbTab"><?php echo count($alreadyExist);?> Already Found in Database</a></li>
            </ul>

            <div class="tab-content mt-3" style="max-height: 500px;overflow-y: auto;">
              <div class="tab-pane fade show active" id="addedTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($inserted  as $k=>$row){ ?>
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
            <button class="btn btn-success" onclick="window.location='applicant.php';">DONE</button>
          </div>
        </div>
      </div>
    </div>`;

    $("body").append(modalHtml);
    var bulkModal = new bootstrap.Modal(document.getElementById('bulkResultModal'));
    bulkModal.show();
</script>
<?php

} else {
?>
<script>
            alert("No file Found"); // Use showMessage here as requested
            document.getElementById('job-loader').style.display = 'none';
</script>
<?php
}
?>
