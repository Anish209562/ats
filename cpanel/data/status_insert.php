<?php include("../db.php");

        
         $table=$_POST['table'];
    
          $status = $_POST['status'];
        
        $id = $_POST['idd']; 

        $update = mysqli_query($host, "update $table set status='$status' WHERE id='$id'");
      
      
?>


 <?php 
   $s1=mysqli_query($host,"select * from complaint");  
   $r=mysqli_num_rows($s1); 
   if($r>0){   ?>
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
      <h4 class="text-blue h4">Complaints LIST</h4>
      <div class="card-body">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                  <th>Message</th>
                  <th>Status</th> 
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo $d1['message']; ?></td> 
        
            <td>
        <a href="#">
   <?php if ($d1['status'] == "Pending" || $d1['status'] == "pending") {?>
        <button class="btn btn-success" type="button" title="Complete" onClick="statusss('<?php echo $d1['id'];?>','Complete');">
           Complete
        </button>
    <?php } else {?>
        <button class="btn btn-danger" type="button" title="Completed" disabled>
           Completed
        </button>
    <?php } ?>
</a>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
      </div>
   </div>
</div> 
<?php } ?>