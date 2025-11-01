<?php include("../db.php"); 

 $id=$_POST['id']; 

if($id){

	mysqli_query($host,"delete from feedback where id='$id'"); 
$m="Successfully Deleted";

}

?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
});

   
   

</script>

  <?php 
   $s1=mysqli_query($host,"select * from feedback");  
   $r=mysqli_num_rows($s1); 
   if($r>0){   ?>
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
      <h4 class="text-blue h4">USER LIST</h4>
      <div class="card-body">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                  <th>message</th>
                  <th>Rating </th>
                  <th>Date</th>   
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo $d1['message']; ?></td>
            <td><?php echo $d1['rating']; ?></td>
            <td><?php echo date('d M Y', strtotime($d1['date'])); ?></td> 
            <td>
                <div class="dropdown">
                    <div onclick="toggleDropdown(event)"><img src="build/assets/images/more.png" width="35"></div>
                    <div class="options" style="display: none;"> 
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