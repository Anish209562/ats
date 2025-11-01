<?php include '../db.php';  

$mobile = $_POST['x']; 

$idds = $_POST['y'];   

?>


<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  

   $qq1=mysqli_query($host,"select * from itc_client");  
   $ss1=mysqli_fetch_array($qq1);  ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">SMS</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3"> 
               <div class="col-xl-4">
                  <label for="otp" class="form-label">Mobile OTP</label>
                  <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter Your Mobile OTP" value="<?php echo $ss1['sms'];  ?>">
               </div>
               <div class="col-xl-4">
                  <label for="eotp" class="form-label">Email OTP</label>
                  <input type="text" class="form-control" id="eotp" name="eotp" placeholder="Enter Your Email OTP" value="<?php echo $ss1['remark'];  ?>">
               </div>

               <div class="col-xl-4">

                  <input type="reset" id="resetbtn" style="display: none;" />
                <input type="hidden" value="<?php echo $mobile; ?>" id='mobile' name="mobile"/> 
                <input type="hidden" value="<?php echo $idds; ?>" id='uppp' name="uppp"/> 
               <button style="margin: 25px;" type="submit" class="btn btn-primary" id="submit">Submit</button>

               </div>

            </div>
         </form> 
            </div>
            <div class="modal-footer"> 
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cls('staticBackdrop');">Close</button> 
            </div> 
      </div>
   </div>
</div>

<span id="mistable"></span>

<script>
      $(document).ready(function(e){
         $("#postform1").on('submit',(function(e){
         e.preventDefault();  
         var otp = $("#otp").val(); 
         var eotp = $("#eotp").val(); 
          if(otp == '') { 
         Swal.fire({
           icon: 'error',
           title: 'Validation Error',
           text: 'Please Enter Mobile OTP',
           confirmButtonColor: '#3085d6',
           confirmButtonText: 'OK'
          }); 
          return;
     }

       if(eotp == '') { 
         Swal.fire({
           icon: 'error',
           title: 'Validation Error',
           text: 'Please Enter Email OTP',
           confirmButtonColor: '#3085d6',
           confirmButtonText: 'OK'
          }); 
          return;
     }   

        $.ajax({
             url: "data/verify_data.php",
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
 