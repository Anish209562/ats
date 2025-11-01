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
<div class="modal fade " id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from client where id='$x'");  
   
   $ss1=mysqli_fetch_array($qq1); } 
   
   ?>
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header" style="box-shadow:-2px 3px 12px darkgrey;z-index:9;">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">View Client</h1>
         <button type="button" id="closeid" class="btn-close" style="font-size:18px !important;" data-bs-dismiss="modal" aria-label="Close" onclick="cls('staticBackdrop');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3">
                <div class="col-xl-12">
                    <h5>Business Information</h5>
                </div>
 <div class="col-xl-6"> 
                   <label for="name" class="form-label">Client Name*</label>
                  <input type="text" class="form-control" readonly="" disabled="" id="name" name="name" placeholder="Client Name" value="<?php echo $ss1['name'];  ?>">
               </div>
               <div class="col-xl-6"> 
                   <label for="name" class="form-label">Alise Name*</label>
                  <input type="text" class="form-control" readonly="" disabled="" id="aname" name="aname" placeholder="Alise Name" value="<?php echo $ss1['aname'];  ?>">
               </div>

          <div class="col-xl-6">
              <div class="row">
                  
                  <div class="col-xl-12">
                  <label for="mobile" class="form-label">Mobile*</label>
                  <input type="tel" class="form-control" readonly="" disabled="" id="mobile" maxlength="10" minlength="10" name="mobile" placeholder="Enter Mobile" value="<?php echo $ss1['mobile'];  ?>">
               </div>

               <div class="col-xl-12">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" class="form-control" readonly="" disabled="" id="email" name="email" placeholder="Enter Email" value="<?php echo $ss1['email'];  ?>">
               </div>
                  
              </div>
          </div>
          
          <div class="col-xl-6">
                  <label for="address" class="form-label">Address*</label>
                  <textarea class="form-control" readonly="" disabled="" id="address" name="address" placeholder="Enter Address" rows="4"><?php echo $ss1['address'];  ?></textarea>
               </div>
               
                <div class="col-xl-4">
                  <label for="website" class="form-label">Website*</label>
                  <input type="text" class="form-control" readonly="" disabled="" id="website" name="website" placeholder="Enter Webiste" value="<?php echo $ss1['Website'];  ?>">
               </div>

                <div class="col-xl-4">
                  <label for="industry" class="form-label">Industry*</label>
                  <input type="text" class="form-control" readonly="" disabled="" id="industry" name="industry" placeholder="Enter Industry" value="<?php echo $ss1['industry'];  ?>">
               </div>

               <div class="col-xl-4">
                  <label for="category" class="form-label">Category*</label>
                  <input type="text" class="form-control" readonly="" disabled="" id="category" name="category" placeholder="Enter category" value="<?php echo $ss1['category'];  ?>">
               </div>
               
            <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Primary Assign*</label>
                     <div class="dropdown"> 
     <?php
     $ss=mysqli_query($host,"select team.name,client_data.name_id from team left join client_data on team.id=client_data.name_id and client_data.status='primary' and client_data.cid='$x' where team.sub_domain='$subdomain'");
     while($dd=mysqli_fetch_array($ss)){
      $isChecked .= ($dd['name_id']) ? $dd['name']."," : '';
      } 
      ?>
                        <input type="text" class="form-control"  readonly="" disabled="" value="<?php if($isChecked!=''){echo rtrim($isChecked, ', ');}?>" placeholder="No Staff"/> 
                    </div>
               </div>
              
             <div class="col-xl-4">
                  <label class="form-label" style="width:100%;">Assignment*</label>
                     <div class="dropdown"> 
     <?php
     $ss2=mysqli_query($host,"select team.name,client_data.name_id from team left join client_data on team.id=client_data.name_id and client_data.status='assignment' and client_data.cid='$x' where team.sub_domain='$subdomain'");
     while($dd2=mysqli_fetch_array($ss2)){
      $isChecked2 .= ($dd2['name_id']) ? $dd2['name']."," : '';
      } 
      ?>
                        <input type="text" class="form-control"  readonly="" disabled="" value="<?php if($isChecked2!=''){echo rtrim($isChecked2, ', ');}?>" placeholder="No Staff"/> 
                    </div>
               </div>
               <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Document*</label>
                     <div class="dropdown"> 
     <?php
    $ds3=mysqli_query($host,"select category.name,client_data.name_id from category left join client_data on category.id=client_data.name_id and client_data.status='document' and client_data.cid='$x' where type='document' and category.status='1'");
     while($dd3=mysqli_fetch_array($ds3)){
      $isChecked3 .= ($dd3['name_id']) ? $dd3['name']."," : '';
      } 
      ?>
                        <input type="text" class="form-control"  readonly="" disabled="" value="<?php if($isChecked3!=''){echo rtrim($isChecked3, ', ');}?>" placeholder="No Document"/> 
                    </div>
               </div>
             
                <div class="col-xl-6">
                  <label for="pterms" class="form-label">Payment Terms*</label>
                  <textarea class="form-control" readonly="" disabled="" id="pterms" name="pterms" placeholder="Payment Terms"><?php echo $ss1['pterms'];  ?></textarea>
               </div>

              
               <div class="col-xl-6">
                  <label for="cinform" class="form-label">Construct Information*</label>
                  <textarea class="form-control" readonly="" disabled="" id="cinform" name="cinform" placeholder="Construct Information"><?php echo $ss1['cinform'];  ?></textarea>
               </div>
               <div class="col-xl-6">
                  <label for="about" class="form-label">About company*</label>
                  <textarea class="form-control" readonly="" disabled="" id="about" name="about" placeholder="About company"><?php echo $ss1['about'];  ?></textarea>
               </div>
               <div class="col-xl-6">
                  <label for="remark" class="form-label">Remark*</label>
                  <textarea class="form-control" readonly="" disabled="" id="remark" name="remark" placeholder="Enter Remark"><?php echo $ss1['remark'];  ?></textarea>
               </div>

               
            </div>
            <!-- contact -->
            <div class="row gy-3" style="margin-top:20px">
                  <div class="col-xl-12">
                    <h5>Contact Information 
                    </h5>
                </div>
                <div class="col-xl-12" style="margin-top:0px;padding-left: 26px;">
     <?php
     $uss=mysqli_query($host,"select id,depart,email,post,name,mobile from item_details where type='user' and sub_domain='$subdomain' and itemid='$x'");
     if(mysqli_num_rows($uss)>0){
     while($us=mysqli_fetch_array($uss)){
     ?>
     <div class="row mb-2 input-group">
                <div class="col-2">
                    <select class="form-control" readonly="" disabled="" name="department[]" disabled="">
                        <option value="" hidden>Select Department</option>
                        <?php
                        $de=mysqli_query($host,"select name from category where type='department'");
                        while($dee=mysqli_fetch_array($de)){
                        ?><option value="<?php echo $dee['name'];?>" <?php if(trim($dee['name'])==trim($us['depart'])){echo 'selected';}?>><?php echo $dee['name'];?></option><?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" readonly="" disabled="" name="person[]" placeholder="Enter Name" value="<?php echo $us['name'];?>"/>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" readonly="" disabled="" name="mobiless[]" placeholder="Enter Mobile" value="<?php echo $us['mobile'];?>" maxlength="10">
                </div>
                <div class="col-3">
                    <input type="email" class="form-control" readonly="" disabled="" name="emailss[]" placeholder="Enter Email" value="<?php echo $us['email'];?>">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" readonly="" disabled="" name="post[]" placeholder="Enter Designation" value="<?php echo $us['post'];?>">
                </div>
               
            </div>
     <?php
     }
     }
     ?>

               </div>
                </div>
            <div class="row gy-3">
                  <div class="col-xl-12">
                    <h5>Document Attachment</h5>
                </div>

<div class="col-xl-12" style="margin-top:0px;">

<div class="row">

<div class="col-lg-12">
<table class="table table-hover table-bordered">
        <thead>
        <tr>
             <th>View Or Download</th>
            <th>Document Name</th>
            <th>Upload Date & Time</th>
        </tr>
        </thead>
        <tbody id="newoutput">
            <?php
     $do=mysqli_query($host,"select id,files,filename,date,time from upload where `table`='user' and sub_domain='$subdomain' and did='$x'");
     if(mysqli_num_rows($do)>0){
     while($dos=mysqli_fetch_array($do)){
     ?>
     <tr id='rows<?php echo $dos['id'];?>' >
         <td><a href='<?php echo "/Meraqui/cpanel/img/".$dos['files'];?>' download=''>View or Download</a></td>
         <td><?php echo $dos['filename'];?></td><td><?php echo $dos['date']."<br>".$dos['time'];?></td>
     <?php
     }
     }
     else{
         echo '<tr id="firstrow"><td colspan="4" style="text-align:center;">No Document Upload</td></tr>';
     }
     ?>
        </tbody>
    </table>
</div>
</div>

</div>

                </div>
            <!-- submit button -->
         </form>
 
    </div>
            </div>
        </div>
    </div>
    <style>
     
        table,
        tr,
        td {
            height: 45px !important ;
        }
    </style>
<script>
$(document).ready(function () {
$("#loader").css("display","none");
    $('#pterms, #remark, #cinform, #about').each(function () {
        const placeholderText = $(this).attr('placeholder') || '';

        ClassicEditor
            .create(this, {
                placeholder: placeholderText  // ✅ set placeholder manually
            })
            .then(editor => {
                editor.enableReadOnlyMode('forceDisable');
                editor.ui.view.editable.element.setAttribute('disabled', 'disabled');
            })
            .catch(error => console.error(error));
    });
});
</script>


