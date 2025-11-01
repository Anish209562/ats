<?php include '../session.php';  

   $x=$_POST['x'];
   
   
   ?>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 9999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from team where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); 
   } ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD Team Member</h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3"> 
            
              <div class="col-xl-6">
                  <label for="status" class="form-label">Department*</label>
                  <select class="form-control" id="department" name="department" required="">
                     <option value="" hidden="">Select One</option>
                    <?php
             $sds2=mysqli_query($host,"select name from category where type='department' order by name asc");
             while($dss2=mysqli_fetch_array($sds2)){
            ?>
        <option value="<?php echo $dss2[0];?>"><?php echo $dss2[0];?></option>
       <?php } ?>
                  </select>
                   <script> $("#department").val('<?php echo $ss1['department'];  ?>'); </script>
               </div>


               <div class="col-xl-6"> 
                   <label for="title" class="form-label">Name*</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $ss1['name'];?>" required=""/>
               </div>
               <div class="col-xl-6"> 
                   <label for="title" class="form-label">Mobile*</label>
                  <input type="text" class="form-control" inputmode="numeric" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php echo $ss1['mobile'];?>" required=""/>
               </div>
               <div class="col-xl-6"> 
                   <label for="title" class="form-label">Email*</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $ss1['email'];?>" required=""/>
               </div>
               
               <div class="col-xl-6"> 
                   <label for="position" class="form-label">Position/Role*</label>
                   <select class="form-control" id="position" name="position" required="">
                     <option value="" hidden="">Select Position</option>
                     <option value="recruiter">Recruiter</option>
                     <option value="recruiter team">Recruiter Team Leader</option>
                     <option value="delivery head">Delivery Head</option>
                     <option value="account management">Account Management</option>
                     <option value="account representatives">Account Representatives</option>
                     <option value="HR Access">HR Access</option>
                  </select>
                   <script> $("#position").val('<?php echo $ss1['position'];  ?>'); </script>
               </div>
               <div class="col-xl-6"> 
                   <label for="staffid" class="form-label">StaffId*</label>
                  <input type="text" class="form-control" id="staffid" name="staffid" placeholder="Staff ID" value="<?php echo $ss1['staffid'];?>" required=""/>
               </div>
              <div class="col-xl-6">
                  <label for="image_file" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image_file" name="image_file" />
               </div>
               <div class="col-xl-6"> 
                   <label for="manager" class="form-label">Reporting Manager</label>
                   <select class="form-control" id="manager" name="manager"/>
                     <option value="" hidden="">Select Manager</option>
                    <?php
                    $s=mysqli_query($host,"select email,name from team where sub_domain='$subdomain'");
                    while($ds=mysqli_fetch_array($s)){
                    ?>
                    <option value="<?php echo $ds[0].";".$ds[1];?>"><?php echo $ds[1];?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <?php
                  if($x){
                  ?>
                   <script> $("#manager").val("<?php echo $ss1['managere'].";".$ss1['manager'];  ?>"); </script>
                   <?php } ?>
               </div>
               <div class="col-xl-12">
                   <img id="preview" style="max-width: 300px; display: none;"/>
               </div>

             
               <div class="col-xl-12" style="text-align: right;">

                  <input type="reset" id="resetbtn" style="display: none;" />
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
               <button type="submit" class="btn btn-primary" id="submit">Submit</button>

               </div>

            </div>
         </form>
 
            </div>  
      </div>
   </div>
</div>
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
<script>    
 
      $(document).ready(function() {
    $("#loader").hide();
           $("#postform1").on('submit', function(e) {
                e.preventDefault();
       $("#loader").show();         
$.ajax({
	url: "data/team_data.php",
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(html){
	$("#mistable").text("");	
    $("#mistable").prepend(html); 
	}
});
            });
            
     $('#image_file').on('change', function (event) {
                let file = event.target.files[0];

                if (file) {
                    let reader = new FileReader();

                    reader.onload = function () {
                        $('#preview').attr('src', reader.result).show();
                    };

                    reader.readAsDataURL(file);
                }
            });
    
        });
</script>