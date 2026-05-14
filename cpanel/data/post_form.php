<?php include '../session.php';  

   $x=$_POST['x'];    
   
   ?>
 <style>
    .form-check{
        float: left;
        width: 27%;
        padding-top:5px;
    }
    .form-label{
        margin-top:.5rem;
    }
    .row .col-xl-12, .row .col-xl-4, .row .col-xl-6{
        margin-top:0px !important;
    }
    .salary-row{
        background:#111c4314;
    padding: 10px;
    margin-bottom: 10px;
    }
    .modal-backdrop{
            z-index: 999999;
    }
    .popover{
            z-index: 999999;
             --bs-popover-max-width: 338px;
    }
    .myself-input{
            float: left;
    width: 48%;
    }
        
.choices {
width: 92%;
    float: left;
}
   #jobdiv .ck-editor__editable {
    min-height: 205px !important; /* Adjust height as needed */
    max-height: 205px !important; /* Optional: Set a max-height */
    overflow: auto; /* Allows scrolling if content exceeds height */
}
</style>
<div class="modal fade" id="showfeatures" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title fs-18s">Submission Limit Configuration</h4>
           <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('showfeatures');"></button>
        </div>
        <div class="modal-body">
        
              <input type="radio" name="limit" class="limit" id="limit" value="Restrict the users to submit the profiles to the job" required=""/>  <label for="limit1">Restrict the users to submit the profiles to the job.</label> <br> <br>
              <input type="radio" name="limit" class="limit" id="limit2" value="Do Nothing" required=""/><label for="limit2"> Do Nothing.</label><br> <br>
              <input type="radio" name="limit" class="limit" id="limit3" value=" Notify these people when the max submissions reached." required="" /> <label for="limit3"> Notify these people when the max submissions reached.</label>
              
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-myself btn-sm" data-bs-dismiss="modal" aria-label="Close" onclick="cls('showfeatures');">Ok</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close" onclick="cls('showfeatures');">Cancel</button>

        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from job where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); } 
   $newJobCode=$ss1['job_code'];


if($x==0 and $x==''){   
   $dd1=mysqli_query($host,"select job_code from job order by id desc limit 1");
   $jjj=mysqli_fetch_array($dd1);
   $job=$jjj[0];
   
if (preg_match('/JPC\s-\s(\d+)/', $job, $matches)) {
    $number = (int)$matches[1];
    $nextNumber = $number + 1;

    // keep same space pattern: JPC - XXXX
    $newJobCode = 'JPC - ' . $nextNumber;
} else {
    // fallback with spaces
    $newJobCode = 'JPC - 2499';
}

}
   ?>


<div class="modal-dialog modal-fullscreen">
   <div class="modal-content">
      <div class="modal-header" style="box-shadow:-2px 3px 12px darkgrey;z-index:9;">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">Job Posting</h1>
         <button type="button" id="closeid" class="btn-close" style="font-size:18px !important;" data-bs-dismiss="modal" aria-label="Close" onclick="$('#output1').html('');">
         </button>
      </div>
      <div class="modal-body" style="padding-left:0px;padding-right:0px;overflow-x:hidden;position:relative;">
         <form method="post" id="postform1" enctype="multipart/form-data" style="margin-top: 15px;">
            <div class="row gy-3" style="padding-left:20px;padding-right:20px;">
                <div class="col-xl-12">
                    <h5>Job Details</h5>
                </div>
                <div class="col-xl-4"> 
                   <label for="code" class="form-label">Job Code<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="code" name="code" readonly=""value="<?php echo $newJobCode;?>" required/>
               </div>
               <div class="col-xl-4"> 
                   <label for="title" class="form-label">Job Title<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Job Title" value="<?php echo $ss1['job_title'];  ?>" required/>
               </div>
               
                <div class="col-xl-4">
                  <label for="rate" class="form-label">Client Bill Rate/ Salary</label>
                <div class="row">
                    <div class="col-xl-4">
                        
                     <select name="bill_type" class="form-control" id="bill_type">

<option value="" hidden="">Select</option>

<option value="INR" selected="">INR</option>
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
                  <script>$("#bill_type").val("<?php echo $ss1['bill_type'];?>");</script>
                  <?php } ?>
                   </div>
                   <div class="col-xl-4">
                       <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate" value="<?php echo $ss1['rate'];  ?>">

                   </div>
                   <div class="col-xl-4">
                        <select class="form-control" id="bill_time" name="bill_time">
                     <option value="Hourly">Hourly</option>
                      <option value="Yearly" selected="">Yearly</option>
                     <option value="Monthly">Monthly</option>
                  </select>
                  <?php
                  if($x){
                  ?>
                  <script>$("#bill_time").val("<?php echo $ss1['bill_time'];?>");</script>
                  <?php } ?>
                   </div>
                </div>
               </div>
               
                 <div class="col-xl-4">
                  <label for="salary" class="form-label">Salary Range</label>
    <div class="salary-row">
    <div class="d-flex align-items-center">
      <select class="form-control me-2" style="width: 100px;" name="salary_type">
        <option value="INR" selected="">INR</option>
        <option value="USD">USD</option>
        <option value="CAD">CAD</option>
<option value="NOK">NOK</option> 
<option value="SGD">SGD</option> 
<option value="AED">AED</option>
<option value="EUR">EUR</option>
<option value="GBP">GBP</option> 
        <!-- add more -->
      </select>
      <input type="text" class="form-control me-2" name="min_salary" placeholder="Min">
      <input type="text" class="form-control me-2" name="max_salary" placeholder="Max">
    </div>
    <div class="w-100 mt-2">
        <select class="form-control" name="salary_time" id="salary_time">
          <option>Yearly</option>
          <option>Monthly</option>
          <option>Weekly</option>
        </select>
      </div>
      </div>
               </div>

              
              
          <div class="col-xl-4">
              <div class="row">
                   
                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="start_job" class="form-label">Job Start Date<span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="start_job" name="start_job" value="<?php echo $ss1['start_job'];  ?>" required=""/>
               </div>
              
               <div class="col-lg-5 col-xl-5 col-md-5">
                 <label class="form-label" style="width:100%;">Remote Job<span class="text-danger">*</span></label>
                  <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="remote" required="" id="yes" value="yes" <?php if(trim($ss1['remote'])=='yes'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="yes"> Yes </label> 
                 </div>
                 <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="remote" required="" id="no" value="no" <?php if(trim($ss1['remote'])=='no'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="no"> No </label> 
                 </div>
                 <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="remote"  required="" id="hybrid" value="hybrid" <?php if(trim($ss1['remote'])=='hybrid'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="hybrid"> Hybrid </label> 
                 </div>
             </div>
         
         <div class="col-lg-2">
             <span style="display:inline-block;width:1px;height:40px;background:var(--menu-bg);margin-top: 20px;"></span>
         </div>
          <div class="col-lg-5 col-xl-5 col-md-5">
                 <label class="form-label" style="width:100%;">Expense Paid</label>
                  <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="expense" id="yes1" value="yes" <?php if(trim($ss1['expense'])=='yes'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="yes1"> Yes </label> 
                 </div>
                 <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="expense" id="no1" value="no" <?php if(trim($ss1['expense'])=='no'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="no1"> NO </label> 
                 </div>
             </div>
         
                
              </div>
          </div>
          
          <div class="col-xl-4">
              <div class="row">
                  
                  
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="end_job" class="form-label">Job End Date</label>
                  <input type="date" class="form-control" id="end_job" name="end_job" value="<?php echo $ss1['end_job'];  ?>">
               </div>
                  
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="response" class="form-label">Response Active<span class="text-danger">*</span></label>
                  <select class="form-control" id="response" name="response" required="" >
                     <option value="" hidden="">Select Response</option>
                     <option value="Open Until Filled">Open Until Filled</option>
                     <option value="Till Target Achieve">Till Target Achieve</option>
                     <option value="End Date">End Date</option>
                  </select>
                  <input type="date" style="display:none;margin-top:10px;" class="form-control" id="response_date" name="response_date" value="<?php echo $ss1['response_date'];  ?>">
                  <?php
                  if($x){
                  ?>
                  <script>$("#response").val("<?php echo $ss1['response'];?>");</script>
                  <?php } ?>
              </div>


                  
              </div>
          </div>
          
          <div class="col-12" style="padding-bottom: 20px;"></div>
          
       <div class="col-xl-4 col-lg-4 col-md-4">
                              <label for="country" class="form-label">Country<span class="text-danger">*</span></label>
                              <select name="country" id="country" required  class="form-control">
                                  <option value="" hidden="">Select Country</option>
                                  <?php
                                  $ss=mysqli_query($host,"select country from state where sub_domain='$subdomain' group by country order by country asc");
                                  while($dd=mysqli_fetch_array($ss)){
                                  ?>
                                  <option value="<?php echo $dd[0];?>" <?php if($dd[0]=='India'){echo 'selected';}?>><?php echo $dd[0];?></option>
                                  <?php
                                  }
                                  ?>
                              </select>
                         </div>

<div class="col-xl-4 col-lg-4 col-md-4">
  <label class="form-label w-100">State<span class="text-danger">*</span></label>
  <div class="dropdown dropdown-wrapper w-100">
    <input type="text" class="form-control dropdown-toggle" required="" placeholder="Select States" readonly data-bs-toggle="dropdown" data-bs-auto-close="false" />

    <ul class="dropdown-menu w-100" style="max-height: 300px; overflow-y: auto;">
      <li class="dropdown-item">
        <input type="text" class="form-control form-control-sm search-box" placeholder="Search state..." />
      </li>
      <li class="dropdown-item">
        <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
      </li>

      <?php
      $ss = mysqli_query($host, "SELECT state FROM state WHERE sub_domain='$subdomain' AND country='India' GROUP BY state ORDER BY state ASC");
      while ($dd = mysqli_fetch_array($ss)) {
        $state = htmlspecialchars($dd[0], ENT_QUOTES);
        $stateUpper = strtoupper($state);
      ?>
        <li class="dropdown-item">
          <label>
            <input type="checkbox" name="state[]" value="<?php echo $state; ?>"   data-name="<?= $stateUpper ?>" class="dropdown-check" /><?= $stateUpper ?>
          </label>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>

                         
        <div class="col-xl-4 col-lg-4 col-md-4">
                  <label class="form-label" style="width:100%;">Job Status<span class="text-danger">*</span></label>
                  <select class="form-control" id="job_status" name="job_status" required="">
                     <option value="" hidden="">Select Status</option>
                     <?php
                    $s2=mysqli_query($host,"select name from appSetting where tables='job' and type='status' order by name asc");
                    while($d2=mysqli_fetch_array($s2)){
                    ?>
                    <option value="<?php echo $d2[0];?>"><?php echo $d2[0];?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <?php
                  if($x){
                  ?>
                  <script>$("#job_status").val("<?php echo $ss1['status'];?>");</script>
                  <?php } ?>
               </div>
                         
         <div class="col-xl-4 col-lg-4 col-md-4">
                  <label class="form-label" style="width:100%;">Job Type</label>
                  <select class="form-control" id="job_type" name="job_type">
                     <option value="" hidden="">Select Type</option>
                     <option value="contract">Contract</option>
                     <option value="fulltime">Full Time</option>
                     <option value="parttime">Part Time</option>
                  </select>
                  <?php
                  if($x){
                  ?>
                  <script>$("#job_type").val("<?php echo $ss1['job_type'];?>");</script>
                  <?php } ?>
               </div>
               
             
              <div class="col-xl-4 col-lg-4 col-md-4">
                  <label for="hours" class="form-label">Request Hours</label>
                  <input type="text" class="form-control" id="hours" name="hours" placeholder="Request Hours in a week" value="<?php echo $ss1['hours'];  ?>">
               </div>
               
                <div class="col-xl-4"> 
                   <label for="client" class="form-label">Select Client<span class="text-danger">*</span></label>
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
               
                 <div class="col-xl-4">
                  <label for="c_manager" class="form-label">Client Manager<span class="text-danger">*</span></label>
                  <select class="form-control" id="c_manager" name="c_manager" placeholder="Client Manager" required>
                      <option value="" hidden="">Select Manager</option>
                      <?php
 if($x){
    $cid=$ss1['cid'];
$ss=mysqli_query($host,"select name,email from item_details where itemid='$cid' and type='user' order by name asc");
while($ds=mysqli_fetch_array($ss)){
        $rowshtml .= "<option value='".$ds['name'].";".$ds['email']."'>".$ds['name']." ( ".$ds['email']." )</option>";
}
echo $rowshtml;
}
?>
                  </select>
                   <?php
                  if($x){
                  ?>
                  <script>$("#c_manager").val("<?php echo $ss1['c_manager'].";".$ss1['c_manager_email'];?>");</script>
                  <?php } ?>
               </div>
               
                <div class="col-xl-4">
                  <label for="priority" class="form-label">Priority<span class="text-danger">*</span></label>
                  <select type="text" class="form-control" id="priority" name="priority" required="">
                    <option value="" hidden="">Select Priority</option>
                    <?php
                    $s2=mysqli_query($host,"select name from appSetting where tables='job' and type='priority' order by name asc");
                    while($d2=mysqli_fetch_array($s2)){
                    ?>
                    <option value="<?php echo $d2[0];?>"><?php echo $d2[0];?></option>
                    <?php
                    }
                    ?>
                  </select>
                   <?php
                  if($x){
                  ?>
                  <script>$("#priority").val("<?php echo $ss1['priority'];?>");</script>
                  <?php } ?>
               </div>
             
             
               <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Document</label>
                     <div class="dropdown dropdown-wrapper"> 
    <?php
     $selected_features = [];
     if($x){
       $selected_features = array_map('trim', explode(",", $ss1['document']));
       $count=count($selected_features);
     }
     $ss=mysqli_query($host,"select id, name FROM appSetting WHERE tables='job' and type='document' and com='yes'");
     $total=mysqli_num_rows($ss);
    ?>
    <input type="text" value="<?php if($x){ if($count<4){echo $ss1['document'];}else{echo "$count of $total selected";}}?>" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Add Documents"/> 
     
     <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style=""> 
    
      <li class="dropdown-item">
      <label for="documentall"><input type="checkbox"  id="documentall" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
    
     <?php
     while($dd=mysqli_fetch_array($ss)){
         $feature_name=$dd[1];
         $kkk = in_array($feature_name, $selected_features) ? 'checked' : '';
     ?>
        <li class="dropdown-item">
            <label for="document<?php echo $dd[0];?>"> 
            <input type="checkbox" name="document[]" value="<?php echo $dd[1];?>" data-name="<?php echo strtoupper($dd[1]); ?>" id="document<?php echo $dd[0];?>" class="dropdown-check" <?php echo $kkk;?> /> <?php echo strtoupper($dd[1]);?> 
            </label>
        </li>
    <?php } ?>
                        </ul>
                    </div>
                     <?php
                  if($x){
                  ?>
                  <script>$("#client").val("<?php echo $ss1['client'].";".$ss1['cid'];?>");</script>
                  <?php } ?>
               </div>
          
       
           <div class="col-xl-6">
                    <div class="row" style="margin-top:15px;">
                         
                
               <!-- <div class="col-xl-4"> -->
               <!--    <label for="city" class="form-label">City*</label>-->
               <!--   <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name" value="<?php //echo $ss1['city'];  ?>">-->
               <!--</div>-->
               
               <!--  <div class="col-xl-4">-->
               <!--   <label for="pincode" class="form-label">Pincode*</label>-->
               <!--   <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" maxlength="6" value="<?php //echo $ss1['pincode'];  ?>">-->
               <!--</div>-->

               <!--<div class="col-xl-4">-->
               <!--   <label for="district" class="form-label">District*</label>-->
               <!--   <input type="text" class="form-control" id="district" name="district" placeholder="Client Salary Bill Rate" value="<?php //echo $ss1['district'];  ?>">-->
               <!--</div>-->
                    
                     
               <div class="col-xl-6">
                  <label for="notice" class="form-label">Notice Period</label>
                  <select type="text" class="form-control" id="notice" name="notice">
                    <option value="" hidden="">Select Notice</option>
                    <?php
                    $s2=mysqli_query($host,"select name from appSetting where tables='job' and type='notice' order by name asc");
                    while($d2=mysqli_fetch_array($s2)){
                    ?>
                    <option value="<?php echo $d2[0];?>"><?php echo $d2[0];?></option>
                    <?php
                    }
                    ?>
                  </select>
                   <?php
                  if($x){
                  ?>
                  <script>$("#notice").val("<?php echo $ss1['notice'];?>");</script>
                  <?php } ?>
               </div>
               
               <div class="col-xl-6">
                  <label for="employee" class="form-label">Employment Level</label>
                  <select type="text" class="form-control" id="employee" name="employee">
                    <option value="" hidden="">Select Level</option>
                    <?php
                    $s2=mysqli_query($host,"select name from appSetting where tables='job' and type='employee' order by name asc");
                    while($d2=mysqli_fetch_array($s2)){
                    ?>
                    <option value="<?php echo $d2[0];?>"><?php echo $d2[0];?></option>
                    <?php
                    }
                    ?>
                  </select>
                   <?php
                  if($x){
                  ?>
                  <script>$("#employee").val("<?php echo $ss1['employee'];?>");</script>
                  <?php } ?>
               </div>
               
               <div class="col-xl-12">
                   <label for="address" class="form-label" style="width:100%;">Address</label>
                    <select id="address" name="address[]" multiple placeholder="Enter or Search Location by City or Zipcode" ></select>
  
  <a id="addBtn" tabindex="0" data-bs-toggle="popover" style="float: left;margin-left: 20px;">
    <i class="fa fa-plus fs-17 text-primary font-semibold" style="margin-top:10px;"></i>
  </a>
               </div>
                    
                    </div>
               </div>
               
             
               <div class="col-xl-6">
                  <label for="remark" class="form-label">Remark</label>
                  <textarea class="form-control" id="remark" name="remark" placeholder="Enter Remark"><?php echo $ss1['remark'];  ?></textarea>
               </div>
               
            
          
               </div>
              
            <div class="row" style="margin-top: 20px;padding-left:20px;padding-right:20px;">
                <div class="col-xl-12">
                    <h5>Skills</h5>
                </div>
                   
                       
              <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Industry</label>
                     <div class="dropdown dropdown-wrapper"> 
    <?php
     $selected_features2 = [];
     if($x){
       $selected_features2 = array_map('trim', explode(",", $ss1['Indus']));
       $count=count($selected_features2);
     }
     $ss=mysqli_query($host,"select id, name FROM appSetting WHERE tables='job' and type='department'");
     $total=mysqli_num_rows($ss);
    ?>
   <input type="text" value="<?php if($x){ if($count<4){echo $ss1['Indus'];}else{echo "$count of $total selected";}}?>" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Add Industries"/> 
   
   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style=""> 
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
    while($in=mysqli_fetch_array($ss)){
         $feature_name=$in[1];
         $kkk = in_array($feature_name, $selected_features2) ? 'checked' : '';
     ?>
        <li class="dropdown-item">
            <label for="depart<?php echo $in[0];?>"> 
            <input type="checkbox" name="indus[]" value="<?php echo $in[1];?>" data-name="<?php echo strtoupper($in[1]); ?>" id="depart<?php echo $in[0];?>" class="dropdown-check" <?php echo $kkk;?>/> <?php echo strtoupper($in[1]);?> 
            </label>
        </li>
    <?php } ?>
                        </ul>
                    </div>
               </div>
              <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Degree</label>
                     <div class="dropdown dropdown-wrapper"> 
      <?php
     $selected_features3= [];
     if($x){
       $selected_features3 = array_map('trim', explode(",", $ss1['degree']));
       $count=count($selected_features3);
     }
    $educationLevels = ['Post Graduation', 'Graduation', '12th', '10th', 'Below 10th', 'M.Com', 'MBA', 'B.Tech', 'M.Tech', 'Diploma', 'PhD', 'B.Sc', 'M.Sc', 'BA', 'BBA'];
    $total=count($educationLevels);
    ?>
     <input type="text" value="<?php if($x){ if($count<4){echo $ss1['degree'];}else{echo "$count of $total selected";}}?>" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Add Degree"/> 
    <ul class="dropdown-menu"> 
   
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
    for($i=0;$i<count($educationLevels);$i++){
         $feature_name=$educationLevels[$i];
         $kkk = in_array($feature_name, $selected_features3) ? 'checked' : '';
     ?>
        <li class="dropdown-item">
            <label for="degree<?php echo $i;?>"> 
            <input type="checkbox"  for="degree<?php echo $i;?>" name="degree[]" value="<?php echo $educationLevels[$i];?>" data-name="<?php echo strtoupper($educationLevels[$i]); ?>" class="dropdown-check" <?php echo $kkk;?> /> <?php echo strtoupper($educationLevels[$i]);?> 
            </label>
        </li>
    <?php } ?>
                        </ul>
                    </div>
               </div>
             
             <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Language</label>
                     <div class="dropdown dropdown-wrapper"> 
  <?php
     $selected_features4 = [];
     if($x){
       $selected_features4 = array_map('trim', explode(",", $ss1['language']));
       $count=count($selected_features4);
     }
    $lang = ['English', 'Spanish', 'Hindi', 'Mandarin', 'Arabic', 'French', 'Russian', 'Portuguese', 'Bengali', 'Japanese'];
    $total=count($lang);
    ?>
   <input type="text"value="<?php if($x){ if($count<4){echo $ss1['language'];}else{echo "$count of $total selected";}}?>" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Select Languages"/> 
    <ul class="dropdown-menu"> 
    
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
    for($i=0;$i<count($lang);$i++){
         $feature_name=$lang[$i];
         $kkk = in_array($feature_name, $selected_features4) ? 'checked' : '';
     ?>
        <li class="dropdown-item">
            <label for="lang<?php echo $i;?>"> 
            <input type="checkbox" id="lang<?php echo $i;?>" name="lang[]" <?php echo $kkk;?> value="<?php echo $lang[$i];?>" data-name="<?php echo strtoupper($lang[$i]); ?>" class="dropdown-check" /> <?php echo strtoupper($lang[$i]);?> 
            </label>
        </li>
    <?php } ?>
                        </ul>
                    </div>
               </div>
               
              <div class="col-lg-4 col-xl-4 col-md-4">
                 <label class="form-label" style="width:100%;">Primary Skills<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="primary" id="primary" placeholder="Primary Skills (Using , comma" value="<?php echo $ss1['primarys'];  ?>" required=""/>

             </div>
             
              <div class="col-lg-4 col-xl-4 col-md-4">
                 <label class="form-label" style="width:100%;">Secondary Skills</label>
                  <input type="text" class="form-control" name="secondary" id="secondary" placeholder="Secondary Skills" value="<?php echo $ss1['secondary'];  ?>">
             </div>
            
             <div class="col-lg-4 col-xl-4 col-md-4">
                 <label class="form-label" style="width:100%;">Experience<span class="text-danger">*</span></label>
                  <div class="row">
                      <div class="col-xl-6">
                       <input type="text" class="form-control" name="min_exp" id="min_exp" placeholder="Min" value="<?php echo $ss1['min_exp'];  ?>" required="">
                      </div>
                      <div class="col-xl-5" style="display: flex">
                       <input type="text" class="form-control" name="max_exp" id="max_exp" placeholder="Max" value="<?php echo $ss1['max_exp'];  ?>" required="">
                       <label style="font-weight:bold;">Years</label>
                      </div>
                     
                  </div>
             </div>
              
            </div>

              
              
            <div class="row" style="margin-top: 20px;padding-bottom:50px;padding-left:20px;padding-right:20px;">
                <div class="col-xl-12">
                    <h5>Job Post Configuration</h5>
                </div>
                   
                       
             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                  <label class="form-label" style="width:100%;">Number of Position<span class="text-danger">*</span></label>
                 <input type="text" class="form-control" name="ctc" id="ctc"  required="" placeholder="Every Year/Monthly Calculation" value="<?php echo $ss1['position'];  ?>">
             </div>
             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                  <label class="form-label" style="width:100%;" for="max">Application Submission</label>
                 <input type="text" class="form-control" name="maxx" id="maxx" placeholder="Maximum Application Submission" value="<?php echo $ss1['max'];  ?>" style="float: left;width: 95%;margin-right: 10px;"/> 
                  <a class="mb-3"  data-bs-toggle="modal" href="#showfeatures"><i class="fa fa-cog text-primary font-semibold" style="margin-top: 10px;"></i></a>
             </div>
             
             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                  <label class="form-label" style="width:100%;" for="publish">Publish Date<span class="text-danger">*</span></label>
                 <input type="date" class="form-control" name="publish" id="publish" value="<?php echo $ss1['publish'];  ?>"/>
             </div>
             
                   <div class="col-lg-4 col-xl-4 col-md-4">
                 <label class="form-label" style="width:100%;">Sales Manager</label>
                   <select class="form-control" name="sales" id="sales">
                       <option value="" hidden="">Select Manager</option>
                           <?php
                           $ss=mysqli_query($host,"select name,email from team where department='Sales' order by name asc");
                           while($ds=mysqli_fetch_array($ss)){
                              ?>
                              <option value="<?php echo $ds['0'].";".$ds[1];?>" <?php ?>> <?php echo $ds[0]." ( ".$ds[1]." ) ";?> </option>
                              <?php
                           }
                           ?>
                         </select>
                <?php
                  if($x){
                  ?>
                  <script>$("#sales").val("<?php echo $ss1['sales'].";".$ss1['sales_email'];?>");</script>
                  <?php } ?>
             </div>
             
              <div class="col-lg-4 col-xl-4 col-md-4">
                 <label class="form-label" style="width:100%;">Recrutment Manager<span class="text-danger">*</span></label>
                 <select class="form-control" name="recrutment" id="recrutment">
                      <option value="" hidden="">Select Manager</option>
                           <?php
                           $ss=mysqli_query($host,"select name,email from team where department='Recruitment' order by name asc");
                           while($ds=mysqli_fetch_array($ss)){
                              ?>
                              <option value="<?php echo $ds['0'].";".$ds[1];?>"> <?php echo $ds[0]." ( ".$ds[1]." ) ";?> </option>
                              <?php
                           }
                           ?>
                         </select>
                         <?php
                  if($x){
                  ?>
                  <script>$("#recrutment").val("<?php echo $ss1['recrutment'].";".$ss1['recrutment_email'];?>");</script>
                  <?php } ?>
             </div>
                    
              <div class="col-lg-4 col-xl-4 col-md-4">
                 <label class="form-label" style="width:100%;">Account Manager<span class="text-danger">*</span></label>
                <select type="text" class="form-control" name="account" id="account" required="">
                   <option value="" hidden="">Select Manager</option>
                     <?php
                      $s1=mysqli_query($host,"select name,email from team where department='Account' order by name asc");
                      while($d1=mysqli_fetch_array($s1)){
                      ?>
                      <option value="<?php echo $d1[0].";".$d1[1];?>"><?php echo $d1[0]." (".$d1[1].")";?></option>
                      <?php
                      }
                      ?>
                </select>
                  <?php
                  if($x){
                  ?>
                  <script>$("#account").val("<?php echo $ss1['account'].";".$ss1['account_email'];?>");</script>
                  <?php } ?>
             </div>
             
              <div class="col-lg-6 col-xl-6 col-md-6">
                 <div  class="row">
                     <div class="col-12">
                         <label class="form-label" style="width:100%;">Assigned To</label>
                         <select class="form-control" name="assigned" id="assigned">
                              <option value="" hidden="">Select Assign</option>
                           <?php
                           $ss=mysqli_query($host,"select name,email from team where department='Recruitment' order by name asc");
                           while($ds=mysqli_fetch_array($ss)){
                              ?>
                              <option value="<?php echo $ds[0].";".$ds[1];?>"> <?php echo $ds[0]." ( ".$ds[1]." ) ";?> </option>
                              <?php
                           }
                           ?>
                         </select>
                          <?php
                  if($x){
                  ?>
                  <script>$("#assigned").val("<?php echo $ss1['assigned'].";".$ss1['assigned_email'];?>");</script>
                  <?php } ?>
                     </div>
                     <div class="col-12">
                         <label for="comments" class="form-label">Comments</label>
                         <textarea class="form-control" id="comments" name="comments"  rows="7" placeholder="Enter comments"><?php echo $ss1['comments'];  ?></textarea>
                     </div>
                 </div>
                 
             </div>
             
             <div class="col-xl-6 col-lg-6 col-md-6" id="jobdiv">
                  <label for="job_desc" class="form-label">Job Description<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="job_desc" name="job_desc"  placeholder="Enter Job Description"><?php echo $ss1['job_desc'];  ?></textarea>
               </div>
              
              
            </div>
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
                <input type="hidden" value="1" id='cid' name="cid"/>
                <input type="hidden" value="" id="limit_main" name="limit_main"/>
                <input type="hidden" value="<?php echo time().uniqid();?>" id="token2" name="token2"/>
                <input type="reset" id="resetbtn" style="display: none;" />
            
             <div class="modal-footer" style="background:white;box-shadow: 0px -4px 12px darkgrey;position: fixed;bottom: 0;width:99%;z-index:9999 !important;">
                <button type="submit" class="btn btn-primary" id="submit">Save Changes</button>
              </div>
            <!-- submit button -->
         </form>
 
    </div>
             

      </div>
   </div>
</div>
<span id="dataedit"></span>
      <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
$(function () {
<?php
if($x!=''){
$locationsString = $ss1['address'];
$locationsArray = explode(";", $locationsString);
}
else{
$ad=mysqli_query($host,"select title from group_contact where sub_domain='$subdomain' group by title");
while($as=mysqli_fetch_array($ad)){
$title=$as[0];
$locationsArray[]=$title;
}
}
if(!empty($locationsArray)){
?>
let savedLocations = <?php echo json_encode($locationsArray); ?>;
<?php
}
?>

const skillsInput = document.getElementById('primary');
const choicess = new Choices(skillsInput, {
  delimiter: ',',
  editItems: true,
  removeItemButton: true,
  duplicateItemsAllowed: false,
  placeholderValue: 'Type and press Enter',
});

  let choices = new Choices('#address', { removeItemButton: true,placeholderValue: 'Search Location with City or Zip Code',
      searchPlaceholderValue: 'Type to search...' });
let check; check=false;
<?php
if(!empty($locationsArray)){

if($x){
?> check=true;<?php
}
?>
savedLocations.forEach(loc => {
  choices.setValue([{ value: loc, label: loc, selected: check }]);
});
<?php } ?>

document.querySelectorAll('.choices__input').forEach(el => {
  el.setAttribute('autocomplete', 'off');
});

  $('#addBtn').popover({
    html: true,
    sanitize: false,
    placement: 'bottom',
    trigger: 'manual', // manual control
    content: `
      <div class=" style="width:280px;">
        <select id="state" class="form-select mb-2">
          <option value="KA">Karnataka</option>
          <option value="RJ">Rajasthan</option>
        </select>
        <input id="city" class="form-control mb-2 myself-input" placeholder="City" style="margin-right:10px;">
        <input id="zip" class="form-control mb-2 myself-input" placeholder="Zip Code">
        <button type="button" class="btn btn-sm btn-myself w-50" style="float:left;" id="saveLoc">Save</button>
        <button type="button" class="btn btn-sm btn-myself-outline w-50" id="closelOc">Close</button>
      </div>
    `
  });

  $(document).on('click', '#saveLoc', function () {
    let state = $('#state').val(),
        stateText = $('#state option:selected').text(),
        city = $('#city').val().trim(),
        zip = $('#zip').val().trim();
    
  if (!city) {
    $('#city').css('border-color', 'red');
    return false;
  }
  if (!zip) {
    $('#zip').css('border-color', 'red');
    return false;
  }

    if (city && zip) {
      let value = `${city}, ${state}, ${zip}`;
      let label = `${city}, ${stateText}, ${zip}`;

      choices.setValue([{ value: value, label: label, selected: true }]);

      $('#city, #zip').val('');
      $('#addBtn').popover('hide');
    }
    
  });
  $('#addBtn').on('click', function (e) {
  e.stopPropagation(); // prevent immediate close
  if ($('#addBtn').attr('aria-describedby')) {
    $('#addBtn').popover('hide');
  } else {
    $('#addBtn').popover('show');
  }
});

// Close on Close button
$(document).on('click', '#closelOc', function () {
  $('#addBtn').popover('hide');
});

// Close on outside click
$(document).on('click', function (e) {
  if (!$(e.target).closest('#addBtn, .popover').length) {
    $('#addBtn').popover('hide');
  }
});

document.getElementById("primary").addEventListener("keydown", function(e) {
    if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        let val = this.value.trim();

        if (val !== "" && !val.endsWith(",")) {
            this.value = val + ", ";
        }
    }
});

});
</script>
<script>
window.gameEditor2 = null;
window.gameEditor3 = null;

ClassicEditor.create(document.querySelector('#remark'))
  .then(editor => window.gameEditor2 = editor)
  .catch(console.error);

ClassicEditor.create(document.querySelector('#job_desc'))
  .then(editor => window.gameEditor3 = editor)
  .catch(console.error);
  
  
function email(val) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(val);
}
$("#loader").css("display","none");


$(document).ready(function (){
    
$(".limit").on("change",function (){
    var value=$(this).val();
    $("#limit_main").val(value);
});
$("#response").on("change",function (){
    var vv=$(this).val();
    if(vv!='Open Until Filled'){
        $("#response_date").show();
    }
    else{
        $("#response_date").hide();
    }
});


 $("#client").on("change",function (){
     var vv=$(this).val();
      $("#loader").show();
      $.ajax({
          type:"post",
          url:"edit/client_contact.php",
          data:{client:vv},
          success:function (html){
              $("#dataedit").html(html);
          }
      });
 });


$("#postform1").on("submit",function (e){
    e.preventDefault();
    if (gameEditor2) $('#remark').val(gameEditor2.getData());
     if (gameEditor3) $('#job_desc').val(gameEditor3.getData());
              $('#loader').css("display","block");
                    $.ajax({
                        url: "data/post_data.php",
                        type: "POST",
                        data: $("#postform1").serialize(),
                        success: function(html) {
                        $('#loader').hide();
                        $("#mistable").text("");
                        $("#mistable").prepend(html);
                        },
                        error: function() {
                            $('#loader').hide();
                        }
                    });
});


  $('.dropdown-menu').on('click', function (e) {
    e.stopPropagation();
  });
  
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.dropdown-wrapper').length) {
      $('.dropdown-menu').removeClass('show');
    }
  });

  $('.dropdown-menu').on('change', '.dropdown-check', function () {
    const $menu = $(this).closest('.dropdown-menu');
    const $wrapper = $menu.closest('.dropdown-wrapper');
    const $input = $wrapper.find('.dropdown-toggle');
    const $allChecks = $menu.find('.dropdown-check').not('.select-all');
    const $selectAll = $menu.find('.select-all');

    if ($(this).hasClass('select-all')) {
      const isChecked = $(this).is(':checked');
      $allChecks.prop('checked', isChecked);
    } else {
      const total = $allChecks.length;
      const checkedCount = $allChecks.filter(':checked').length;
      $selectAll.prop('checked', total === checkedCount);
    }

    const selected = $allChecks.filter(':checked');
    if (selected.length >= 4) {
      $input.val(`${selected.length} of ${$allChecks.length} selected`);
    } else {
      const names = selected.map(function () {
        return $(this).data('name');
      }).get();
      $input.val(names.join(', '));
    }
  });
   

 $('.dropdown-menu').on('keyup', '.search-box', function () {
    const keyword = $(this).val().toLowerCase();
    const $items = $(this).closest('.dropdown-menu').find('li.dropdown-item').not(':first').not(':eq(1)');
    $items.each(function () {
      const text = $(this).text().toLowerCase();
      $(this).toggle(text.includes(keyword));
    });
  });
  
});

</script>


