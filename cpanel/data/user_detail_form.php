<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
 <style>
       .col-xl-4 .col-12 span{
           margin-left: 9px;
    float: left;
    margin-top: -1px;
       }
       .col-xl-4 .col-12 input[type="radio"]{
           width:17px;
           height:17px;
           float:left;
           margin-left:9px;
       }
 </style>
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from user where id='$x'");  
   
   $ss1=mysqli_fetch_array($qq1); } 
   
   ?>

<div class="modal-dialog modal-lg" style="margin-top:60px;">
   <div class="modal-content">
      <div class="modal-header">
         <h1 class="modal-title fs-5" id="staticBackdropLabel"> User Details </h1>
         <button type="button" id="closeid" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3">

               <div class="col-xl-4"> 
                   <label for="name" class="form-label">Name*</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="<?php echo $ss1['name'];  ?>" disabled>
               </div>

               <div class="col-xl-4">
                  <label for="mobile" class="form-label">Mobile*</label>
                  <input type="tel" class="form-control" id="mobile" maxlength="10" minlength="10" name="mobile" placeholder="Enter Mobile" value="<?php echo $ss1['mobile'];  ?>" disabled>
               </div>

               <div class="col-xl-4">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $ss1['email'];  ?>" disabled>
               </div>
               
                <div class="col-xl-4">
                  <label for="passkey" class="form-label">Password*</label>
                  <input type="text" class="form-control" id="passkey" name="passkey" placeholder="Enter password" value="<?php echo $ss1['password'];  ?>" disabled/>
               </div>

                <div class="col-xl-4">
                  <label for="occupation" class="form-label">OCCUPATION*</label>
                  <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter OCCUPATION" value="<?php echo $ss1['occu'];  ?>" disabled>
               </div>

                <div class="col-xl-4">
                  <label for="address" class="form-label">ADDRESS*</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter ADDRESS" value="<?php echo $ss1['address'];  ?>" disabled>
               </div>
                   
                    <div class="col-xl-4">
                  <label for="address" class="form-label">Pincode*</label>
                  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" value="<?php echo $ss1['pincode'];  ?>" disabled>
               </div>

                <div class="col-xl-4">
                  <label for="dob" class="form-label">DOB*</label>
                  <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter ADDRESS" value="<?php echo $ss1['dob'];  ?>" disabled>
               </div>

               <div class="col-xl-4">
                  <label for="mstatus" class="form-label">MARITAL STATUS*</label>
                  <select class="form-control" id="mstatus" name="mstatus" disabled>
                     <option value="">Select One</option>
                     <option value="Married">Married</option>
                     <option value="Unmarried">Unmarried</option>
                  </select>
                  <script> $("#mstatus").val('<?php echo $ss1['mstatus'];  ?>'); </script>
               </div>

               <div class="col-xl-4">
                  <label for="gender" class="form-label">GENDER*</label>
                  <select class="form-control" id="gender" name="gender" disabled>
                     <option value="">Select One</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                     <option value="other">Other</option>
                  </select>
                   <script> $("#gender").val('<?php echo $ss1['gender'];  ?>'); </script>
               </div>

               <div class="col-xl-4">
                  <label for="edu_qualification" class="form-label">Education*</label>
                  <input type="text" class="form-control" id="edu_qualification" name="edu_qualification" placeholder="Enter Education" value="<?php echo $ss1['education'];  ?>" disabled>
               </div>

                <div class="col-xl-4">
                  <label for="aadhar_id" class="form-label">AADHAR ID*</label>
                  <input type="text" class="form-control" id="aadhar_id" name="aadhar_id" placeholder="Enter AADHAR ID" value="<?php echo $ss1['aadhar'];  ?>" disabled>
               </div>

               <div class="col-xl-4">
                  <label for="pan_id" class="form-label">PAN ID*</label>
                  <input type="text" class="form-control" id="pan_id" name="pan_id" placeholder="Enter PAN ID" value="<?php echo $ss1['pan'];  ?>" disabled>
               </div>

               <div class="col-xl-4">
                  <label for="monthly_incom" class="form-label">MONTHLY INCOME*</label>
                  <input type="text" class="form-control" id="monthly_incom" name="monthly_incom" placeholder="Enter MONTHLY INCOME" value="<?php echo $ss1['mincome'];  ?>" disabled>
               </div>


               <div class="col-xl-4">
                  <label for="card_stage" class="form-label">Card Type*</label>
                  <select class="form-control" id="card_stage" name="card_stage" disabled>
                     <option value="">Select One</option>
                     <option value="Basic">Basic</option>
                     <option value="Premium">Premium</option>
                     <option value="Vip">Vip</option>
                  </select>
                   <script> $("#card_stage").val('<?php echo ucwords($ss1['plan']);  ?>'); </script>
               </div>

               <div class="col-xl-4">
                  <label for="dis_venderob" class="form-label">Is Vender*</label>
                  <select class="form-control" id="is_vender" name="is_vender" disabled>
                     <option value="">Select One</option>
                      <option value="False">False</option>
                     <option value="True">True</option>
                  </select>
                 '<?php 
                 if($ss1['vstatus']=='completed'){
                     $boolean="True";
                 }else{
                      $boolean='False';
                 }
                 
                 ?>
                   <script> $("#is_vender").val('<?php echo $boolean;?>'); </script>
               </div>

               

          

               <div class="col-xl-4">
                  <label for="status" class="form-label">Status*</label>
                  <select class="form-control" id="status" name="status" disabled>
                     <option value="">Select One</option>
                     <option value="Active">Active</option>
                     <option value="Inactive">Inactive</option>
                  </select>
                   <script> $("#status").val('<?php echo $ss1['status'];  ?>'); </script>
               </div>
               
                 <!-- family detaiss  -->
               <div class="col-xl-4">
                  <label for="family1" class="form-label">Family Details (Study)*</label>
                  <div class="col-12" style="margin-top:7px;">
                  <input type="radio" id="study_yes" name="family1" value="Yes" <?php if($ss1['F_member']=='Yes' || $ss1['F_member']!='0'){echo 'checked';} ?> disabled/><span>Yes</span>
                  <input type="radio" id="study_no"  name="family1" value="No"  <?php if($ss1['F_member']=='No'  || $ss1['F_member']=='0'){echo 'checked';} ?> disabled/><span>NO</span></div>
               </div>

                <div class="col-xl-4">
                  <label for="family2" class="form-label">Family Details (Job)*</label>
                   <div class="col-12" style="margin-top:7px;">
                  <input type="radio" id="job_yes" name="family2" value="Yes" <?php if($ss1['family2']=='Yes' || $ss1['family2']!='0'){echo 'checked';} ?> disabled/><span>Yes</span>
                  <input type="radio" id="job_no"  name="family2" value="No"  <?php if($ss1['family2']=='No' || $ss1['family2']=='0'){echo 'checked';} ?> disabled/><span>NO</span>
                  </div>
                </div>

               <div class="col-xl-4">
                  <label for="family3" class="form-label">Family Details (Self)*</label>
                  <div class="col-12" style="margin-top:7px;">
                     <input type="radio" id="self_yes" name="family3" value="Yes" <?php if($ss1['family3']=='Yes' || $ss1['family3']!='0'){echo 'checked';} ?> disabled /><span>Yes</span>
                     <input type="radio" id="self_no"  name="family3" value="No"  <?php if($ss1['family3']=='No' || $ss1['family3']=='0'){echo 'checked';} ?> disabled/><span>NO</span>
                  </div>
               </div>
                <!-- vehicle detaiss  -->
               <div class="col-xl-4">
                  <label for="vehicle1" class="form-label">Vehicle Details (Bike)*</label>
                   <div class="col-12" style="margin-top:7px;">
                  <input type="radio" id="bike_yes" name="vehicle1" value="Yes" <?php if($ss1['vehicle']=='Yes' || $ss1['vehicle']!='0'){echo 'checked';} ?> disabled/><span>Yes</span>
                  <input type="radio" id="bike_no"  name="vehicle1" value="No"  <?php if($ss1['vehicle']=='No' || $ss1['vehicle']=='0'){echo 'checked';} ?> disabled/><span>NO</span>
                  </div>
               </div>
               
               <div class="col-xl-4">
                  <label for="vehicle2" class="form-label">Vehicle Details (Car)*</label>
                   <div class="col-12" style="margin-top:7px;">
                  <input type="radio" id="car_yes" name="vehicle2" value="Yes" <?php if($ss1['vehicle2']=='Yes' || $ss1['vehicle2']!='0'){echo 'checked';} ?> disabled/><span>Yes</span>
                  <input type="radio" id="car_no"  name="vehicle2" value="No"  <?php if($ss1['vehicle2']=='No' || $ss1['vehicle2']=='0'){echo 'checked';} ?> disabled/><span>NO</span>
                  </div>
                </div>

               <div class="col-xl-4">
                  <label for="vehicle3" class="form-label">Vehicle Details (Other)*</label>
                   <div class="col-12" style="margin-top:7px;">
                  <input type="radio" id="other_yes" name="vehicle3" value="Yes" <?php if($ss1['vehicle3']=='Yes' || $ss1['vehicle3']!='0'){echo 'checked';} ?> disabled/><span>Yes</span>
                  <input type="radio" id="other_no"  name="vehicle3" value="No"  <?php if($ss1['vehicle3']=='No' || $ss1['vehicle3']=='0'){echo 'checked';} ?> disabled/><span>NO</span>
                  </div>
               </div>
               
               

             </div>
         </form>
         
         
<?php $update_mobile=$ss1['mobile'];?>         
 <ul class="nav nav-tabs" role="tablist" style="margin-top: 30px;">
    <li class="nav-item">
      <a class="nav-link active">Card Request History</a>
    </li>
</ul>

   
  <div class="tab-content">
      
    <div id="home" class="container tab-pane active"><br>
    
    
    <?php 
    $s1=mysqli_query($host,"select * from kccupdate where user='$update_mobile' "); 
    
    $r=mysqli_num_rows($s1); if($r>0){ ?>
    
   
<div style="overflow-y:auto;max-height:34vh;">
    <table class="data-table table stripe hover nowrap">
   <thead>
      <tr>
         <th>#</th>
         <th>Card</th>  
         <th>Terms & Conditions</th>
         <th>Auth Letter</th> 
         <th>Status</th> 
         <th>Date</th> 
         <th>Timer</th> 
      </tr>
   </thead>
   <tbody>
      <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
      <tr>
         <td class="table-plus"><?php echo ++$y; ?></td>
         <td>
             <span class="badge <?php 
                     if(ucwords($d1['card'])=='Vip'){
                         echo "badge-success";
                     }else{
                         if(ucwords($d1['card'])=='Basic'){
                             echo "badge-info";
                         }else{
                             echo "badge-warning";
                         } 
                     }
                     ?>"><?php echo strtoupper($d1['card']);?>
             </span>
         </td> 
         <td>
             <button class="btn btn-secondary" style="font-size: 10px;padding: 6px;"><a href="https://esoftware.co.in/project/APR2024/kaizen/upload2/New/<?php echo $d1['file1'];?>" id="terms" name="terms" target="_">Terms & Conditions</a></button>
         </td>
         <td>
               <button  class="btn btn-primary" style="font-size: 10px;padding: 6px;"><a href="https://esoftware.co.in/project/APR2024/kaizen/upload2/New/<?php echo $d1['file2'];?>" id="authletter" name="authletter" target="_">Auth Letter</a></button>
         </td> 
         
         <td>
             <span class="badge <?php 
              if(lcfirst($d1['status'])=='approve'){
                   echo "bg-success-transparent";
              }else{
                    if(lcfirst($d1['status'])=='rejected'){
                          echo "bg-danger-transparent";
                    }else{
                          echo "bg-warning-transparent";
                    }
              }
             ?>">
                 <?php echo ucwords($d1['status']);?>
             </span>
         </td>
         <td><?php echo date('d M Y',strtotime($d1['date']));?></td>
         <td><?php echo date('H:i',strtotime($d1['time']));?></td>
        
      </tr>
      <?php } ?>
   </tbody>
</table>
</div>
    <?php }else{?> <h4 class="text-blue h4"> No Data Found </h4> <?php }  ?>
    
    
    </div>
    
 </div>
 
  <div class="col-xl-12" style="text-align: end;padding-top:20px;"> 
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cls('staticBackdrop');">Close</button> 

               </div>
            </div>  
      </div>
   </div>
</div>
<style>
    .btn a,
    .btn a:hover,
    .btn a:focus{
        color:white;
    }
    
    .badge-success{
          background-color:darkgreen;
       }
      .badge-danger{
          background-color:darkred;
      }
      .badge-secondary{background-color:deepskyblue;}
      
      .badge-warning{background-color:orange;}
      
      .badge-info{background-color:blueviolet;}
      .badge{
         font-size:12px;
         padding:6px 12px !important;
      }
      table,tr,td{height:45px !important ;}
</style>
