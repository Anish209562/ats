<?php
include("session.php");

header('Content-Type: application/json'); // Tell JS this is JSON

$response = [
    'icon' => 'error',
    'message' => 'Upload Failed',
    'html' => ''
];

$date = date('Y-m-d');
$idds = $_POST['idds'];
$docId = $_POST['iddss'];

if ($_FILES['file']['tmp_name']) {
    $targetDir = "../pop/";
    $allowTypes = ['jpg','jpeg','png','pdf','docx'];
    
    $fileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $fileName = "doc_" . $docId . "_" . time() . "." . $fileType;
    $targetFilePath = $targetDir . $fileName;

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
           
            mysqli_query($host, "update onboard_file set file='$fileName', file_date='$date', status='responded' where id='$docId'");
            mysqli_query($host, "update onboarding set status='responded' where id='$idds'");

            $response['icon'] = 'success';
            $response['message'] = "Successfully Uploaded";
        }
    } else {
        $response['message'] = "Please upload only: " . implode(", ", $allowTypes);
        $response['icon']="error";
    }
}

if($response['icon']=="success"){
// Always refresh the list in HTML
ob_start();
$s1 = mysqli_query($host, "SELECT * FROM onboard_file WHERE token='$idds'");
while ($d1 = mysqli_fetch_array($s1)) { ?>
    <div class="row align-items-center bg-white my-2 shadow-sm rounded">
        <div class="col-4 cc"><?= $d1['document']; ?></div>
        <div class="col-1">Comments : <?php if($d1['comments']!='' and $d1['comments']!=null){echo $d1['comments'];}else{echo 'N/A';}?></div>
        <div class="col-1"><?= $d1['due']; ?></div>
        <div class="col-2"><?= $d1['status']; ?></div>
        <div class="col-4">
            <?php
            if($d1['file']==''){
            ?>
            <button type="button" class="btn btn-primary" onclick="upload(<?= $d1['id']; ?>);">Upload</button>
            <?php
            }
            else{
            ?>
            <button type="button" class="btn btn-primary" onclick="window.location='../pop/<?php echo $d1['file'];?>'">Download</button>
            <button type="button" class="btn btn-primary" onclick="viewDocument(<?php echo $idds;?>,<?php echo $d1['id'];?>,'2');">View</button>
            <?php
            }
            ?>
            <button type="button" class="btn btn-primary" onclick="signature();">Update Details</button>
        </div>
    </div>
<?php }
$response['html'] = ob_get_clean();
}

echo json_encode($response);
?>