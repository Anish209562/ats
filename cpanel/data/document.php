<?php include("../session.php"); 

$dtype=$_POST['dtype'];
$title=$_POST['title'];
$desc=$_POST['desc'];
$files=$_FILES['image_file2']; 

$aid=$_POST['document_hidden'];
 
$update=$_POST['documentupdate'];
$date=date('Y-m-d');
$time=date('h:i:s'); 

$newcheck=$_POST['newcheck'];

if($files['tmp_name']){
   $ext=pathinfo($files['name'],PATHINFO_EXTENSION);
   $fileName="document_".time().".".$ext;
   move_uploaded_file($files['tmp_name'],"../img/".$fileName); 
}
else{
    if($update){
        $s=mysqli_query($host,"select file from suvery_upload where id='$update'");
        $d=mysqli_fetch_array($s);
        $fileName=$d[0];
    }
}

if($newcheck!='' and $newcheck!=0){
    $nn=" , idd='$newcheck'"; // as the job id when submit job new resume upladed, because at the time create user resume is different, when submitting different jobs its different resumes
}

if($update>0){ 

$q="update survey_upload set dtype='$school',dtitle='$higher',dcomment='$major',file='$fileName' ,sid='$aid' , userbyname='$userbyname', username='$username' $nn where id='$update'";

mysqli_query($host,"$q");
$check=2;
$m="Successfully Updated";
$idd=$update;
}else{  

$q="insert into survey_upload set dtype='$dtype',dtitle='$title',dcomment='$desc',file='$fileName' ,sid='$aid' , sub_domain='$subdomain', date='$date', time='$time' , userbyname='$userbyname', username='$username' $nn";
 
mysqli_query($host,"$q");
$ss=mysqli_query($host,"select id from survey_upload where sid='$aid' order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
$m="Successfully Added";
$check=3;

}



if($check!=0){
?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(()=>{
$("#loader").hide();
<?php
if(!isset($_POST['newcheck']) && $newcheck==''){
?>
  abc();

$("#list-group-item").append(`
   <li class="d-flex justify-content-between  align-items-center fw-semibold mb-4">
          <div class="d-flex">
           <span class="shared-file-icon me-2" style="float:left;"> <i class="ti ti-file-text text-success"></i> </span> <br/>
            <div class="myselfb">
                 <span style="display:inline-block;"><?php echo $title." - ".$fileName;?></span>
                 <p class="attchFile-date">
                  Created By<?php echo $type;?>on <?php echo date('d M Y',strtotime($date))." ".date('H:i:s',strtotime($time));?>   |   Modified By <?php echo $type;?> </p>
        <p class="attchFile-date atcSubT-2">
                 Comments : <?php if($desc!=''){echo $desc;}else{echo 'N/A';}?>
              </p>
            </div>
         </div> 
          <div class="action-wrapper position-relative">
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
      <i class="ri-delete-bin-line text-primary me-2" onclick="dele('6',<?php echo $idd;?>);" style="cursor:pointer;"></i>
       <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
        <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
    </div>
  </div>
            
            </li>
  `);
 <?php 
}
else{
?>
$('.btn-close').click();
$("#list-group-item<?php echo $newcheck;?>").append(`
                       <tr>
                             <td><?php echo $title;?></td>
                            <td><?php echo $dtype;?></td>
                            <td><?php echo $username;?></td>
                            <td><?php echo date('d M,Y',strtotime($date))." - ".date('H:i:s',strtotime($time));?></td>
                            <td><?php echo $desc ? $desc : 'N/A';?></td>
                            <td><a href="<?php echo $fileName ? "img/".$fileName : '#';?>" download=""><i class="bi bi-download" ></i></a></td>
                        </tr>
  `);
<?php
}
?>
});

</script>
<?php
}

?>
