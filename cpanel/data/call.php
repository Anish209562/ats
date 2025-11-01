<?php include("../session.php"); 

$log=$_POST['calltype'];
$taken=$_POST['taken'];
$comment=addslashes($_POST['call_comment']);

$follow=$_POST['follow']; 
$reminder=$_POST['reminder'];  

$notes=addslashes($_POST['call_notes']);

$aid=$_POST['callhidden'];
 
$update=$_POST['callupdates'];
$type="Admin";
$date=date('Y-m-d');
$time=date('H:i:s'); 

if($update>0){ 

$q="update calls set type='$log',taken='$taken',comment='$comment',dates='$follow',reminder='$reminder',notes='$notes' where id='$update'";

mysqli_query($host,"$q");
$check=2;
$m="Successfully Updated";
$idd=$update;
}else{  

echo $q="insert into calls set username='$type',type='$log',taken='$taken',comment='$comment',dates='$follow',reminder='$reminder',notes='$notes',sid='$aid' , sub_domain='$subdomain', date='$date', time='$time'";
 
mysqli_query($host,"$q");
$ss=mysqli_query($host,"select id from call where sid='$aid' order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
$m="Successfully Added";
$check=3;

}



if($check!=0){
$fullDesc = nl2br(htmlspecialchars($comment));
$shortDesc = mb_strimwidth($fullDesc, 0, 80, '...');
$collapseId = "commentCollapse" . $idd;
?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(()=>{
  abc();
$("#call_body").append(`
    <tr id="call_rows<?php echo $idd;?>">
       <td><?php echo $log;?></td>
       <td>
           
           <div>
    <?php echo $shortDesc; ?>
    <?php if (strlen($me['comment']) > 80): ?>
      <a href="#<?php echo $collapseId; ?>" data-bs-toggle="collapse" class="text-primary" onclick="toggleReadMoreText(this)">Read more</a>
    <?php endif; ?>
  </div>
  <div class="collapse mt-1" id="<?php echo $collapseId; ?>">
    <div class="card card-body bg-light border-0 py-2 px-3">
      <?php echo $fullDesc; ?>
    </div>
  </div>
           
           
       </td>
       <td><?php echo $taken;?></td>
       <td><?php echo $reminder."<br>".$follow;?>
       </td>
       <td><?php echo date('d M Y',strtotime($date))." - ".date('H:i:s',strtotime($time));?></td>
       <td><?php echo $type;?></td>
       
      <td>
           
  <div class="action-wrapper position-relative">
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
      <i class="ri-delete-bin-line text-primary" onclick="dele('3',<?php echo $idd;?>);" style="cursor:pointer;"></i>
    </div>
  </div> 
           
       </td>
    </tr>

`);
});

</script>
<?php
}

?>
