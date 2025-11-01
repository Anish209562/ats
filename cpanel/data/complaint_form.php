<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from user where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); } ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Complaint</h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3"> 

               <div class="col-xl-4"> 
                   <label for="name" class="form-label">Name*</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="<?php echo $ss1['name'];  ?>">
               </div>

               <div class="col-xl-4">
                  <label for="mobile" class="form-label">Mobile*</label>
                  <input type="tel" class="form-control" id="mobile" maxlength="10" minlength="10" name="mobile" placeholder="Enter Mobile" value="<?php echo $ss1['mobile'];  ?>">
               </div>

               <div class="col-xl-4">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $ss1['email'];  ?>">
               </div>

                <div class="col-xl-4">
                  <label for="description" class="form-label"> Complaint </label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter OCCUPATION" value="<?php echo $ss1['description'];  ?>">
               </div> 

               <div class="col-xl-4">
                  <label for="status" class="form-label">Status*</label>
                  <select class="form-control" id="status" name="status">
                     <option value="">Select One</option>
                     <option value="pending">Pending</option>
                     <option value="solved">Solved</option>
                      <option value="unsolved">Unsolved</option>
                  </select>
                   <script> $("#status").val('<?php echo $ss1['status'];  ?>'); </script>
               </div>

               <div class="col-xl-12" style="text-align: center;">

                  <input type="reset" id="resetbtn" style="display: none;" />
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
                <input type="hidden" value="<?php echo $x; ?>" id='cid' name="cid"/>
               <button type="submit" class="btn btn-primary" id="submit">Save Changes</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cls('staticBackdrop');">Close</button> 

               </div>

            </div>
         </form>
 
            </div>  
      </div>
   </div>
</div>
<script>    
 
 

   $(document).ready(function(e){
         $("#postform1").on('submit',(function(e){
         e.preventDefault();   
        $.ajax({
             url: "data/complaint_data.php",
             type: "POST",
             data:  new FormData(this),
             contentType: false,
             cache: false,
             processData:false,
             success: function(html){   
             $("#mistable").text(""); 
             $("#mistable").prepend(html); 
             },
             error: function(){}      
         });  
         }));  
         });
   
   
   
   
</script>