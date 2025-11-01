<?php include '../session.php';  

   $x=$_POST['x'];
   
   
   ?>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 9999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from placement where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); 
   } ?>

<div class="modal-dialog modal-xl modal-dialog-centered" style="margin-top:60px;">
   <div class="modal-content" style="background-color:#ececec !important;">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD Placement</h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');" style="transform: scale(1.5);">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3"> 
        
               <div class="col-xl-6"> 
                   <label for="title" class="form-label">Job Title*</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Job Title" value="<?php echo $ss1['job_title'];?>" required=""/>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <label for="start_job" class="form-label">Job Start Date*</label>
                  <input type="date" class="form-control" id="start_job" name="start_job" value="<?php echo $ss1['start_date'];  ?>">
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <label for="end_job" class="form-label">Job End Date*</label>
                  <input type="date" class="form-control" id="end_job" name="end_job" value="<?php echo $ss1['end_date'];  ?>">
               </div>
                  
               
               <div class="col-xl-6"> 
                   <label for="vendor" class="form-label">Vendor*</label>
                  <input type="text" class="form-control" id="vendor" name="vendor" placeholder="Vendor Name" value="<?php echo $ss1['vendor'];?>" required="" />
               </div>
               <div class="col-xl-6"> 
                   <label for="vemail" class="form-label">Vendor Email*</label>
                  <input type="email" class="form-control" id="vemail" name="vemail" placeholder="Vendor Email" value="<?php echo $ss1['vendor_email'];?>" required=""/>
               </div>
             
                <div class="col-xl-6"> 
                   <label for="client" class="form-label">Select Client*</label>
                  <select type="text" class="form-control" id="client" name="client" required>
                      <option value="" hidden="">Select Client</option>
                      <?php
                      $s1=mysqli_query($host,"select name,id from client where subdomain='$subdomain' order by name asc");
                      while($d1=mysqli_fetch_array($s1)){
                      ?>
                      <option value="<?php echo $d1[0].";".$d1[1];?>"><?php echo $d1[0];?></option>
                      <?php
                      }
                      ?>
                  </select>
                   <?php
                  if($x){
                  ?>
                  <script>$("#client").val("<?php echo $ss1['client'].";".$ss1['cid'];?>");</script>
                  <?php } ?>
               </div>
 <div class="col-xl-6">
     <label for="rate" class="form-label">Pay Rate *</label>
                       <input type="text" class="form-control" id="rate" name="rate" placeholder="Pay Rate" value="<?php echo $ss1['pay_rate'];  ?>">

                   </div>
                   
                   <div class="col-xl-3">
     <label for="variable" class="form-label">Variable *</label>
                       <input type="text" class="form-control" id="variable" name="variable" placeholder="Variable" value="<?php echo $ss1['variable'];  ?>">

                   </div>
                   
                   
                    <div class="col-xl-3">
                       <label for="currency" class="form-label">Currency *</label>
                     <select class="form-control me-2" name="currency" id="currency">
<option value="" hidden="">Select Currency</option>
<option value="INR">INR</option>
<option value="USD">USD</option>
<option value="CAD">CAD</option>
<option value="NOK">NOK</option> 
<option value="SGD">SGD</option> 
<option value="AED">AED</option>
<option value="EUR">EUR</option>
<option value="GBP">GBP</option> 
      </select>
                      <?php
                  if($x){
                  ?>
                  <script>$("#currency").val("<?php echo $ss1['currency'];?>");</script>
                  <?php } ?>
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
    
           $("#postform1").on('submit', function(e) {
                e.preventDefault();
               
$.ajax({
	url: "data/place_data.php",
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
   
        });
</script>