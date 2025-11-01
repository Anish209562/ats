<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from offers where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); } ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD App Updates</h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3"> 

               <div class="col-xl-4"> 
                   <label for="name" class="form-label">Name*</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder=" Name" value="<?php echo $ss1['name'];  ?>">
               </div>

               <div class="col-xl-4">
                  <label for="version" class="form-label">Version*</label> 
                  <input type="text" class="form-control" id="version" name="version" placeholder="Enter Version" value="<?php echo $ss1['version'];  ?>">
               </div>

               <div class="col-xl-4">
                  <label for="code" class="form-label">Code*</label>
                  <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code" value="<?php echo $ss1['code'];  ?>">
               </div>

               <div class="col-xl-12">
                  <label for="link" class="form-label">Link*</label>
                  <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link" value="<?php echo $ss1['link'];  ?>">
               </div>

                <div class="col-xl-6">
                  <label for="forceupdate" class="form-label">FORCE UPDATE*</label>
                  <select class="form-control" id="forceupdate" name="forceupdate">
                     <option value="">Select One</option>
                     <option value="true">True</option>
                     <option value="false">False</option>
                  </select>
              </div>

               <div class="col-xl-6">
                  <label for="status" class="form-label">Status*</label>
                  <select class="form-control" id="status" name="status">
                     <option value="">Select One</option>
                     <option value="Active">Active</option>
                     <option value="Inactive">Inactive</option>
                  </select>
                   <script> $("#status").val('<?php echo $ss1['status'];  ?>'); </script>
               </div>

               <div class="col-xl-12" style="text-align: center;">

                  <input type="reset" id="resetbtn" style="display: none;" />
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
                <input type="hidden" value="<?php echo $x; ?>" id='cid' name="cid"/>
               <button type="submit" class="btn btn-primary" id="submit">Submit</button>
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
             url: "data/appupdate_data.php",
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