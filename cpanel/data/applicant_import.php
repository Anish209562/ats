<?php
include("../session.php");

if($_FILES['bulk']['tmp_name']) {

    $photo = $_FILES['bulk']['tmp_name'];
    $dc = $_POST['dupOption'];
    $createsource = $_POST['source'];

    $userby = $_SESSION['username'];

    $file = fopen($photo,"r");
    $firstRow = fgetcsv($file); // skip header

    $qqne = "";
    $alreadyExist = [];
    $unique = [];
    $duplicate = [];
    $seenMobiles = [];

    while($data = fgetcsv($file)) {
        $FirstName            = $data[0];
        $Email                = $data[1];
        $MobileNumber         = $data[2];
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

        if($MobileNumber != '' && $FirstName != '') {
            // check in DB
            $j = mysqli_query($host,"select id from applicant where mobile='$MobileNumber' and email='$Email'");
            if(mysqli_num_rows($j) > 0){
                $alreadyExist[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email
                ];
                continue; // skip DB insert
            }

            // check duplicate in CSV itself
            if(in_array($MobileNumber, $seenMobiles)){
                $duplicate[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email
                ];
            } else {
                $seenMobiles[] = $MobileNumber;
                $unique[] = [
                    "name" => $FirstName,
                    "mobile" => $MobileNumber,
                    "email" => $Email
                ];
    $datee=date('Y-m-d h:i:s');
                $qqne .= "('$FirstName', '$Email', '$MobileNumber', '$Address', '$Source', '$Experience', 'Active', '$PrimarySkills', '$AdditionalComments', '$CurrentCompany', '$CurrentCTC','$CurrentCTC_type', '$ExpectedPay', '$ExpectedPay_type','$NoticePeriod', '$ReferredBy', '$ApplicantGroup', '$DateOfBirth', '$Relocation', '$Gender', '$Technology', '$Industry','meraqui','$datee','$userby','$userbyname','Bulk Parsing'), ";
            }
        }
    }

    if($qqne != ''){
        $lastCommaPos = strrpos($qqne, ',');
        if ($lastCommaPos !== false) {
            $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
        }

        $aa="INSERT INTO `applicant`( `name`, `email`,`mobile`, `address`,  `source`, `year`, `status`, `skill`, `comment`, `cname`, `ctc`, `ctc_type`,  `ectc`,`ectc_type`, `period`, `refer`, `groups`, `dob`, `reloaction`, `gender`, `tech`, `industry`, `subdomain`,`date`,`createid`, `createname`,`createtype`) values  $qqne";
        mysqli_query($host,$aa);
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

              <div class="tab-pane fade" id="dupCsvTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($duplicate as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['mobile']?></td><td><?=$row['email']?></td></tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="alreadyDbTab">
                <table class="table table-bordered">
                  <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th></tr></thead>
                  <tbody>
                  <?php foreach($alreadyExist as $k=>$row){ ?>
                    <tr><td><?=($k+1)?></td><td><?=$row['name']?></td><td><?=$row['mobile']?></td><td><?=$row['email']?></td></tr>
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
