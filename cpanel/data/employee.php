<?php include("../session.php"); 

$check=0;

if($_POST['id']!=''){
 $id=$_POST['id']; 
	mysqli_query($host,"delete from employee where id='$id'"); 
$m="Successfully Deleted";
$check=1;

}else{

$name=$_POST['first'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$last=$_POST['last']; 
$ename=$_POST['employee']; 
$office=$_POST['office']; 
$ext=$_POST['extension'];  

$aid=$_POST['employeehidden'];

$status=$_POST['status'];  
$update=$_POST['employeeupdates'];
 
$date=date('Y-m-d');
$time=date('h:i:s'); 


if($update){ 

 $q="update employee set name='$name',mobile='$mobile',email='$email',last='$last',ename='$ename',office='$office',ext='$ext',status='$status' where id='$update' and aid='$aid'"; 

mysqli_query($host,"$q");
$check=2;
$m="Successfully Updated";

}else{  

$q="insert into employee set name='$name',mobile='$mobile',email='$email',last='$last',ename='$ename',office='$office',ext='$ext',aid='$aid',status='$status',date='$date',time='$time', sub_domain='$subdomain'";
 
mysqli_query($host,"$q");
$check=3;

$m="Successfully Added";

$ss=mysqli_query($host,"select id from employee order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
}

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
}).then(function() {
abc();
<?php
if($check=="1"){
?>
$("#ee_rows<?php echo $id;?>").remove();
<?php
}  
else if($check=="2"){
?>
$("#ee_rows<?php echo $update;?>").append(`
       <td><?php echo strtoupper($name." ".$last."<br>".$mobile);?></td>
        <td><?php echo $ename."<br>".$office." - ".$ext;?></td>
        <td><?php echo $status;?></td>
        <td>
            
<div class="action-wrapper position-relative">
    <!-- 3-dot icon -->
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>

    <!-- Action Box -->
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;" onclick="edit('7',<?php echo $idd;?>);"></i>
      <i class="ri-delete-bin-line text-primary" style="cursor:pointer;" onclick="dele(<?php echo $idd;?>);"></i>
    </div>
  </div>
            
</td>
`);
<?php
}   
else if($check=="3"){
?>
$("#employeetable").append(`
<tr>
        <td><?php echo strtoupper($name." ".$last."<br>".$mobile);?></td>
        <td><?php echo $ename."<br>".$office." - ".$ext;?></td>
        <td><?php echo $status;?></td>
        <td>
            
<div class="action-wrapper position-relative">
    <!-- 3-dot icon -->
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>

    <!-- Action Box -->
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;" onclick="edit('7',<?php echo $idd;?>);"></i>
      <i class="ri-delete-bin-line text-primary" style="cursor:pointer;" onclick="dele(<?php echo $idd;?>);"></i>
    </div>
  </div>
   </td>         
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
