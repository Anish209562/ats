<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop"  style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from user where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); } ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">View User Details</h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3">

              <div class="col-12 mb-4" style="display:flex;">
                  <div class="circle" style="margin:auto;border-radius: 100% !important;overflow: hidden;width: 128px;height: 128px;border: 2px solid rgba(66 14 14 / 20%);">
                         <img class="profile-pic" src="../cpanel/img/<?php echo $ss1['vendor_photo'];?>" id="profile_pic" style="width: 100%; height: 100%; display: inline-block; filter: invert(0);"/>
                            <div class="p-image" style="position: absolute;top: 0px;left: 55%; display: inline-flex;">
                                <label class="fa fa-camera upload-button" for="profile_picinput">
                                <input class="file-upload" type="file" id="profile_picinput" name="profile_pic" style="display:none;" accept="image/*" onchange="previewImage(event)">
                            </label></div>
                                                     </div>
                                                     
                                                  </div>

               <div class="col-xl-4"> 
                   <label for="category" class="form-label">Category*</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="Category Name" value="<?php echo $ss1['category'];  ?>"/>
               </div>

               <div class="col-xl-4">
                  <label for="product" class="form-label">Product*</label>
                  <input type="text" class="form-control" id="product" name="product" placeholder="Product Name" value="<?php echo $ss1['product'];  ?>"/>
               </div>

               <div class="col-xl-4">
                  <label for="oname" class="form-label">Owner Name*</label>
                  <input type="text" class="form-control" id="oname" name="oname" placeholder="Owner Name" value="<?php echo $ss1['oname'];  ?>"/>
               </div>

                <div class="col-xl-4">
                  <label for="bname" class="form-label">Business Name</label>
                  <input type="text" class="form-control" id="bname" name="bname" placeholder="Business Name" value="<?php echo $ss1['bname'];  ?>"/>
               </div>
               
               <div class="col-xl-4">
                  <label for="phone" class="form-label">Phone number</label>
                  <input type='tel' class="form-control" id="phone" name="phone" value="<?php echo $ss1['phone'];?>"/>
            </div>


                <div class="col-xl-4">
                  <label for="address" class="form-label">ADDRESS*</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="ADDRESS" value="<?php echo $ss1['address2'];  ?>"/>
               </div>


              <div class="col-xl-4">
                  <label for="city" class="form-label">City*</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="city" value="<?php echo $ss1['city'];  ?>"/>
               </div>
               <div class="col-xl-4">
                  <label for="state" class="form-label">State*</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="state" value="<?php echo $ss1['state'];  ?>"/>
               </div>
               <div class="col-xl-4">
                  <label for="pincode" class="form-label">Pincode*</label>
                  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="pincode" value="<?php echo $ss1['pincode2'];  ?>"/>
               </div>

                <div class="col-xl-12">
                  <label for="desc" class="form-label">Description*</label>
                  <textarea class="form-control" id="desc" name="desc" placeholder="Description"><?php echo $ss1['description'];  ?></textarea>
               </div>

               
              

               <!--<div class="col-xl-4">-->
               <!--   <label for="status" class="form-label">Status*</label>-->
               <!--   <select class="form-control" id="status" name="status">-->
               <!--      <option value="">Select One</option>-->
               <!--      <option value="Active">Active</option>-->
               <!--      <option value="Inactive">Inactive</option>-->
               <!--   </select>-->
               <!--    <script> $("#status").val('<?php //echo $ss1['status'];  ?>'); </script>-->
               <!--</div>-->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
 $(document).ready(function(e){
         $("#postform1").on('submit',(function(e){
         e.preventDefault();
          $.ajax({
                        url: "data/vendor_business.php",
                        type: "POST",
                        data : $(this).serialize(),
                        success: function(html) {
                        setTimeout(function() {
                        $('#loader').hide();
                        $("#output1").text("");
                        $("#output1").prepend(html);
                    }, 1200);
                        },
                        error: function() {
                            $('#loader').hide();
                        }
                    });
          
         
         }));  
         });
      function previewImage(event) {
         var input = event.target;
         var image = document.getElementById('profile_pic');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
</script>
