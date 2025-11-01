<?php include("../db.php"); 

 $id=$_POST['id']; 

if($id){

	mysqli_query($host,"delete from offers where id='$id'"); 
$m="Successfully Deleted";

}else{

$title=$_POST['title'];
$description=$_POST['description']; 
$status=$_POST['status'];  
 $update=$_POST['updates'];
$date=date('Y-m-d');
$time=date('h:i:s'); 


if($_FILES['image_file']['tmp_name']){
	
$sourcePath=$_FILES['image_file']['tmp_name'];
$image_info=getimagesize($sourcePath);
$targetPath =time().".png";
move_uploaded_file($sourcePath,"../img/".$targetPath);
}else{
		if($update) {
$s1=mysqli_query($host,"select * from offers where id='$update'");
$d1=mysqli_fetch_array($s1);
$targetPath=$d1['path'];
	}

}


if($update){ 

  $q="update offers set title='$title',description='$description',path='$targetPath',status='$status',date='$date',time='$time' where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

 $q="insert into offers set title='$title',description='$description',path='$targetPath',status='$status',date='$date',time='$time'";
 
mysqli_query($host,"$q");

$m="Successfully Inserted";


}

}

?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
    $("#staticBackdrop").css("display",'none');
});

   
   

</script>

  <?php 
   $s1=mysqli_query($host,"select * from offers");  
   $r=mysqli_num_rows($s1); 
   if($r>0){   ?>
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
       	<div class="bbbb" style="display:flex;">

   		<div style="width: 50%;">
       <h4 class="text-blue h4">Offers</h4>
       </div>
       
       <div style="width: 50%;text-align: end;">
         <button type="button" class="btn btn-info" onclick="dailyupt(0);">ADD Offers</button>
        </div>
         </div>
      <div class="card-body">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                  <th>Name</th>
                  <th>Description </th> 
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo $d1['title']; ?></td>
            <td><?php echo $d1['description']; ?></td> 
            <td>
            <?php
               if ($d1['status'] == 'active' || $d1['status'] == 'Active') {
                   ?>
                   <span class="badge bg-primary">Active</span>
            <?php
               } else {
                   ?>
                   <span class="badge bg-danger">Inactive</span>
                   <?php
               }
               ?> 
            </td>
            <td>
                <div class="dropdown">
                    <div onclick="toggleDropdown(event)"><img src="build/assets/images/more.png" width="35"></div>
                    <div class="options" style="display: none;">
                        <div class="option" onclick="dailyupt(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-edit"></i> Edit </div>
                        <div class="option" onclick="deles(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-trash-alt"></i> Delete </div> 
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
      </div>
   </div>
</div> 
<?php } ?>