<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 9999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from daily_updates where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); 
   $desc=$ss1['description'];
   } ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD Daily Updates</h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3"> 

               <div class="col-xl-12"> 
                   <label for="title" class="form-label">Title*</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Daily Update Title" value="<?php echo $ss1['title'];  ?>">
               </div>

               <div class="col-xl-12">
                  <label for="mobile" class="form-label">DESCRIPTION*</label>
                  <textarea id="description" name="description" class="form-control" cols="4" rows="4"></textarea>
                  <input type="hidden" name="desc_hidden" id="desc_hidden" />
               </div>

               <div class="col-xl-6">
                  <label for="image_file" class="form-label">Image*</label>
                  <input type="file" class="form-control" id="image_file" name="image_file">
                  <input type="hidden" name="photo_hidden" id="photo_hidden"/>
                  <img id="preview" style="max-width: 300px; display: none;"/>
               </div> 

               <div class="col-xl-6">
                  <label for="status" class="form-label">Status*</label>
                  <select class="form-control" id="status" name="status">
                     <option value="" selected disabled>Select One</option>
                     <option value="Active">Active</option>
                     <option value="Inactive">Inactive</option>
                  </select>
                   <script> $("#status").val('<?php echo $ss1['status'];  ?>'); </script>
               </div>

               <div class="col-xl-12" style="text-align: center;">

                  <input type="reset" id="resetbtn" style="display: none;" />
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
                <input type="hidden" value="0" id='cid' name="cid"/>
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
 
 
       $(document).ready(function() {
            // Initialize CKEditor 5 instance for the description field
            let editor;
            ClassicEditor.create(document.querySelector('#description')).then(createdEditor => {
                editor = createdEditor;
                
                // Set initial data from the PHP variable
                var descData = <?php echo json_encode($desc); ?>;
                if (editor) { editor.setData(descData); }
            });
            
                       $("#postform1").on('submit', function(e) {
                e.preventDefault();

                // Get CKEditor data and set it to hidden field
                var alert_1 = editor.getData();
                $("#desc_hidden").val(alert_1);

                if($("#title").val() == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please enter title of offer',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }

                if($("#desc_hidden").val() == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please enter Description of offer',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }

                if($("#status").val() == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please select the status type',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }
                if($("#status").val()=="Active"){
                   $("#loader").css("display","block");
                }
                $.ajax({
                    url: "data/daily_updt_data.php",
                    type: "POST",
                    data:$(this).serialize(),
                    success: function(html) {
                        $("#mistable").text(""); 
                        $("#mistable").prepend(html);
                    },
                    error: function() {}
                });
            });
                 $('#image_file').on('change', function (event) {
                let file = event.target.files[0];

                if (file) {
                    let reader = new FileReader();

                    reader.onload = function () {
                        let base64String = reader.result.split(',')[1]; // Extract Base64 part
                        $('#photo_hidden').val(base64String);
                        $('#preview').attr('src', reader.result).show();
                        $("#cid").val("1");
                    };

                    reader.readAsDataURL(file);
                }
            });

        });
   
   
  
</script>