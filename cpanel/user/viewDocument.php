<?php
include("session.php");

$id=$_POST['id'];


if($id>0){
$token=$_POST['tokens'];
$vv=$_POST['vv'];
$ss=mysqli_query($host,"select name,lname,middle,onboard_file.status,onboard_file.file, onboard_file.id as file_id from onboarding inner join onboard_file on onboarding.id=onboard_file.token and onboard_file.id='$id' where onboarding.id='$token'");
$d11=mysqli_fetch_array($ss);
?>
<script>$("#showLoader").removeClass("d-flex").addClass("d-none");$("#clickable").click();</script>

 <div class="offcanvas offcanvas-end" style="width:55%;" stytabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header border-bottom border-block-end-dashed">
          <h5 class="offcanvas-title" id="offcanvasRightLabel1"><?php echo $d11['name']." ".$d11['middle']." ".$d11['lname'];?></h5>
       <div>
        <?php
        if($vv=="1"){
        if($d11['status']=='responded'){
        ?>
         <button type="button" class="btn btn-primary" onclick="verify(<?php echo $d11['file_id'];?>,'1');">Verify</button>
         <button type="button" class="btn btn-primary" onclick="verify(<?php echo $d11['file_id'];?>,'2');">Reject</button>
       <?php
        }
        else if($d11['status']=='reject'){
        ?>
         <button type="button" class="btn btn-primary" onclick="verify(<?php echo $d11['file_id'];?>,'1');">Verify</button>
        <?php
        }
        }
        ?>
  
         <button type="button" class="btn btn-primary" data-bs-dismiss="offcanvas" aria-label="Close" onclick="$('#viewDocument').html('');">Close</button>
         </div>
      </div>

<div class="offcanvas-body">

<div class="row">
    <div class="col-12">
                    <?php
                    if (!empty($d11['file']) && file_exists("../pop/" . $d11['file'])) {
                        $filePath = "../pop/" . $d11['file'];
                        $fileExt = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                        $fileData = file_get_contents($filePath);
                        $base64 = base64_encode($fileData);
                        
                        echo '<iframe src="'.$filePath.'" style="width:100%;height:80vh;" frameborder="0"></iframe>';
                        
                        // if (in_array($fileExt, ['jpg', 'jpeg', 'pdf', 'docx'])) {
                        //     echo '<img src="data:image/' . $fileExt . ';base64,' . $base64 . '" class="img-fluid rounded shadow">';
                        // } elseif ($fileExt == 'pdf') {
                        //     echo '<iframe src="'.$filePath.'" style="width:100%;height:80vh;" frameborder="0"></iframe>';
                        // }
                    } else {
                        echo '<p class="text-muted">No file found.</p>';
                    }
                    ?>
    </div>
</div>
</div>
   
</div>
<button data-bs-toggle="offcanvas" id="clickable" data-bs-target="#offcanvasLeft" style="display:none;">click</button>
<?php
}

?>