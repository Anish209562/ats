<?php
include("../session.php");

if(isset($_FILES['bulk']['tmp_name']) && $_FILES['bulk']['tmp_name'] != '') {

    // Check file size (<= 5MB)
    if($_FILES['bulk']['size'] > 5*1024*1024) {
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
    while($data = fgetcsv($file)) {
        $ClientName     = $data[0];
        $ContactNumber        = $data[1];
        $Address          = $data[2];
        $Website  = $data[3];
        $Industry        = $data[4];
        $about       = $data[5];
        $Email         = $data[6];
        
         $primary  = $data[7];
        $cliente        = $data[8];
        $display       = $data[9];
        $alise         = $data[10];

        if($ClientName != '' && $Website != '') {
            
            // check in DB by Website
            $j = mysqli_query($host,"SELECT id FROM client WHERE Website='$Website'");
            if(mysqli_num_rows($j) > 0){
                $alreadyExist[] = [
                    "name" => $ClientName,
                    "website" => $Website,
                    "email" => $Email
                ];
                continue; // skip DB insert
            }

            // check duplicate in CSV itself (by Website)
            if(in_array($Website, $seenWebsites)){
                $duplicate[] = [
                    "name" => $ClientName,
                    "website" => $Website,
                    "email" => $Email
                ];
            } else {
                $seenWebsites[] = $Website;
                $unique[] = [
                    "name" => $ClientName,
                    "website" => $Website,
                    "email" => $Email
                ];

                $qqne .= "('$ClientName', '$alise','$Email','$ContactNumber','$Address','$display','$Industry','$about','$date','$time','Active','$Website','$userbyname','$username','FirstMile IT Services','$primary', '$cliente', 'meraqui'), ";
            }
        }
    }

    if($qqne != ''){
        $lastCommaPos = strrpos($qqne, ',');
        if ($lastCommaPos !== false) {
            $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
        }
        $aa="INSERT INTO `client`(`name`, `aname`,`email`, `mobile`, `address`, `display`, `industry`, `about`, `date`,`time`, `status`, `Website`, `createname`, `createid`, `unit`,`primarye`,`cliente`,`subdomain`) VALUES $qqne";
        mysqli_query($host,$aa);
    }
}
else if($tt=='1'){

while($data = fgetcsv($file)) {
    $JobCode            = trim($data[0]);
    $JobTitle           = $data[1];
    $Client             = $data[2];
    $clientrate             = $data[3];
    $MinPay             = $data[4];
    $MaxPay             = $data[5];
    $remote            = $data[6];
    $assignto            = $data[7];
    $recruiter          = $data[8];
    $sales                = $data[9];
    $numberof             = $data[10];
    $jobstatus            = $data[11];
    $priority             = $data[12];
    $primary              = $data[13];
    $secondary           = $data[14];
    $country             = $data[15];
    $state               = $data[16]; // multpke ","
    $minExp      = $data[17];
    $maxExp        = $data[18];
    $CreatedDate     = $data[19];
    $descr            = $data[20];
    $hours           = $data[21];
    $NoticePeriod         = $data[22];
    $MaxSubmissions   = $data[23];
    $AccountManager   = $data[24];
    $comments         = $data[25];
    $publishDate      = $data[26];
    $jobtype          = $data[27];
    $jobStartdate     = $data[28];
    $JobEndDate       = $data[29];
    $respond          = $data[30];
    $industry         = $data[31];
    $EmployeeLevel    = $data[32];
    $degree           = $data[33];
    $lang             = $data[34];
    $CreatedBy        = $data[35];
    $datetime=date('Y-m-d H:i:s');
  
    if($JobTitle != '' && $Client != '') {

        $j = mysqli_query($host,"SELECT id FROM job WHERE job_code='$JobCode' and subdomain='meraqui' ");
        if(mysqli_num_rows($j) > 0){
            $alreadyExist[] = [
                "job_title" => $JobTitle,
                "client" => $Client,
                "job_code" => $JobCode
            ];
            continue;
        }

        $uniqueKey = $JobCode.'|'.$Client;
        if(in_array($uniqueKey, $seenJobs)){
            $duplicate[] = [
                "job_title" => $JobTitle,
                "client" => $Client,
                "job_code" => $JobCode
            ];
        } else {
            $seenJobs[] = $uniqueKey;
            $unique[] = [
                "job_title" => $JobTitle,
                "client" => $Client,
                "job_code" => $JobCode
            ];
            
            // check team
            $ch=mysqli_query($host,"select max(case when email='$assignto' then name end) as assignName ,max(case when email='$sales' then name end) as salesName ,max(case when email='$AccountManager' then name end) as accountName ,max(case when email='$recruiter' then name end) as recruiterName, max(case when email='$CreatedBy' then name end) as createrName from team where email in ('$assignto','$sales','$AccountManager','$recruiter','$CreatedBy')");
            $nn=mysqli_query($ch);
            $assigntoname=$nn[0];
            $salesName=$nn[1];
            $AccountManagername=$nn[2];
            $recruiterName=$nn[3];
            $CreatedBy=$nn[4];

            $qqne.= "('meraqui','FirstMile IT Services','$JobCode','$JobTitle','$clientrate','$jobStartdate','$JobEndDate','$respond','$remote','$country','$state','$CreatedDate','$datetime','$jobstatus','$time','$JobType','$hours','$Client','$clientid','$clientmanager','$clientmanager_email','Do Nothing','$lang','$priority','$NoticePeriod','$EmployeeLevel','$numberof','$MaxSubmissions','$salesName','$recruiterName','$AccountManagername','$assigntoname', '$sales','$AccountManager','$assignto','$recruiter','$comments','$publishDate','$descr','$industry','$degree','$minExp','$maxExp','$primary','$secondary','$MinPay','$MaxPay','$userby','$CreatedBy','INR','Monthly','No','INR','Monthly'), ";
        }
    }
}

    if($qqne != ''){
        $lastCommaPos = strrpos($qqne, ',');
        if ($lastCommaPos !== false) {
            $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
        }
      $aa="INSERT INTO `job`(`subdomain`, `unit`, `job_code`, `job_title`, `rate`, `start_job`, `end_job`, `response`, `remote`, `country`, `state`, `date`, `ltime`, `status`, `time`,  `job_type`, `hours`, `client`, `cid`, `c_manager`, `c_manager_email`, `limit_main`, `language`, `priority`, `notice`, `employee`, `position`, `max`, `sales`, `recrutment`, `account`, `assigned`, `sales_email`,`account_email`,`assigned_email`,`recrutment_email`,`comments`, `publish`, `job_desc`, `Indus`, `degree`, `min_exp`, `max_exp`, `primarys`, `secondary`,`salary_min`, `salary_max`,`createid`, `createname`,`bill_type`,`bill_time`,`expense`,`salary_type`,`salary_time`) VALUES $qqne";
        mysqli_query($host,$aa);
    }
}

    fclose($file);
    mysqli_close($host);
    ?>
    <script>
    $('#loader').hide();
    var modalHtml = `
    <div class="modal fade" style="z-index:9992 !important;" id="bulkResultModal" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title">Bulk Upload — Results</h5>
            <button type="button" class="btn-close" onclick="history.back();"></button>
          </div>
          <div class="modal-body">

            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#addedTab"><?php echo count($unique);?> Added</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#dupCsvTab"><?php echo count($duplicate);?> Duplicates in CSV</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#alreadyDbTab"><?php echo count($alreadyExist);?> Already in DB</a></li>
            </ul>

            <div class="tab-content mt-3" style="max-height: 500px;overflow-y: auto;">
             <?php
             if($tt=='2'){
             ?>
              <div class="tab-pane fade show active" id="addedTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Website</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($unique as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['website']?></td><td><?=$row['email']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="dupCsvTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Website</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($duplicate as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['website']?></td><td><?=$row['email']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="alreadyDbTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Website</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($alreadyExist as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['website']?></td><td><?=$row['email']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php }
              else if($tt=='1'){
                ?>
            <div class="tab-pane fade show active" id="addedTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Job Title</th><th>Job Code</th><th>Client</th></tr></thead>
                  <tbody>
                  <?php foreach($unique as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['job_title']?></td><td><?=$row['job_code']?></td><td><?=$row['client']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="dupCsvTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Job Title</th><th>Job Code</th><th>Client</th></tr></thead>
                  <tbody>
                  <?php foreach($duplicate as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['job_title']?></td><td><?=$row['job_code']?></td><td><?=$row['client']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="alreadyDbTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Job Title</th><th>Job Code</th><th>Client</th></tr></thead>
                  <tbody>
                  <?php foreach($alreadyExist as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['job_title']?></td><td><?=$row['job_code']?></td><td><?=$row['client']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
                <?php
              }
              ?>
            </div>

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
