<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
 <style>
    .form-check{
        float: left;
        width: 20%;
        padding-top:5px;
    }
    .form-label{
        margin-top:.5rem;
    }
    .row .col-xl-12, .row .col-xl-4, .row .col-xl-6{
        margin-top:0px !important;
    }
</style>
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from applicant where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); } ?>

<div class="modal-dialog modal-fullscreen">
   <div class="modal-content">
      <div class="modal-header" style="box-shadow:-2px 3px 12px darkgrey;z-index:9;">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Applicant</h1>
         <button type="button" id="closeid" class="btn-close" style="font-size:18px !important;" data-bs-dismiss="modal" aria-label="Close" onclick="$('#output1').html('');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data" style="margin-top: 15px;">
            <div class="row gy-3">
                <div class="col-xl-12">
                    <h5>Personal Information</h5>
                </div>
               <div class="col-xl-4"> 
                   <label for="name" class="form-label">Name*</label>
                  <input type="text" class="form-control"required="" id="name" name="name" placeholder="Enter Name" value="<?php echo $ss1['name'];  ?>">
               </div>
               
                 <div class="col-xl-4">
                  <label for="mobile" class="form-label">Mobile*</label>
                  <input type="tel" class="form-control"  required="" id="mobile" maxlength="10" minlength="10" name="mobile" placeholder="Enter Mobile" value="<?php echo $ss1['mobile'];  ?>">
               </div>

               <div class="col-xl-4">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" class="form-control" required="" id="email" name="email" placeholder="Enter Email" value="<?php echo $ss1['email'];  ?>">
               </div>
              
          <div class="col-xl-4">
              <div class="row">
                  
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="gender" class="form-label">Gender*</label>
                  <select class="form-control" id="gender" name="gender" required>
                     <option value="" hidden="">Select Gender</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                     <option value="other">Other</option>
                  </select>
                  <?php
                  if($x){
                  ?>
                  <script>$("#gender").val("<?php echo $ss1['gender'];?>");</script>
                  <?php } ?>
              </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="source" class="form-label">Source*</label>
                  <select type="text" class="form-control" id="source" name="source">
                      <option value="" hidden="">Select Source</option>
                                  <?php
                                  $ss=mysqli_query($host,"select name from appSetting where tables='applicant' and type='source' order by name asc");
                                  while($dd=mysqli_fetch_array($ss)){
                                  ?>
                                  <option value="<?php echo $dd[0];?>"><?php echo $dd[0];?></option>
                                  <?php
                                  }
                                  ?>
                </select>
                <?php
                  if($x){
                  ?>
                  <script>$("#source").val("<?php echo $ss1['source'];?>");</script>
                  <?php } ?>
               </div>
                  
              </div>
          </div>
          
          <div class="col-xl-4">
              <div class="row">
                  
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="industry" class="form-label">Industry*</label>
                  <select type="text" class="form-control" id="industry" name="industry">
                       <option value="" hidden="">Select industry</option>
                                  <?php
                                  $ss=mysqli_query($host,"select name from appSetting where tables='applicant' and type='industry' order by name asc");
                                  while($dd=mysqli_fetch_array($ss)){
                                  ?>
                                  <option value="<?php echo $dd[0];?>"><?php echo $dd[0];?></option>
                                  <?php
                                  }
                                  ?>
                </select>
                <?php
                  if($x){
                  ?>
                  <script>$("#industry").val("<?php echo $ss1['industry'];?>");</script>
                  <?php } ?>
               </div>

               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="refer" class="form-label">Reference By*</label>
                  <input type="text" class="form-control" id="refer" name="refer" placeholder="Enter Reference By" value="<?php echo $ss1['refer'];  ?>">
               </div>
                  
              </div>
          </div>
          
          <div class="col-xl-4">
              <div class="row">
                  
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="industry" class="form-label">Experience Year*</label>
                  <input type="text" class="form-control" id="year" name="year" placeholder="Enter year of Experience" value="<?php echo $ss1['year'];  ?>">
               </div>

               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label class="form-label" style="width:100%;">Skill*</label>
                  <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="skill" id="primary" value="primary" <?php if(trim($ss1['skill'])=='primary'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="skill"> Primary </label> 
                 </div>
                 <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" type="radio" name="skill" id="secondary" value="secondary" <?php if(trim($ss1['skill'])=='secondary'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="secondary"> Secondary </label> 
                 </div>
               </div>
                  
              </div>
          </div>
          
           <div class="col-xl-6">
               <div class="row">
                   <div class="col-xl-6">
                         <div class="col-xl-12">
                              <label for="city" class="form-label">City*</label>
                              <input type="text" required="" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $ss1['city'];  ?>">
                         </div>
                         <div class="col-xl-12">
                              <label for="state" class="form-label">State*</label>
                              <input type="text"  required=""class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $ss1['state'];  ?>">
                         </div>
                   </div>
                   <div class="col-xl-6">
                       <label for="address" class="form-label">Address*</label>
                       <textarea class="form-control"  required=""id="address" name="address" placeholder="Enter Address" rows="4"><?php echo $ss1['address'];  ?></textarea>
                   </div>
               </div>
                  
           </div>
               
              <div class="col-xl-6">
                  <label for="remark" class="form-label">Remark*</label>
                  <textarea class="form-control" id="remark" name="remark" placeholder="Enter Remark"><?php echo $ss1['remark'];  ?></textarea>
               </div>


 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <label for="jobtitle" class="form-label">Applicant Job Title (Old Job)</label>
                  <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Enter old job title" value="<?php echo $ss1['jobtitle'];  ?>">
               </div>
               
                 <div class="col-xl-4">
                  <label for="group" class="form-label">Applicant Group*</label>
                  <select type="text" class="form-control" id="group" name="group" required>
                     <option value="" hidden="">Select Group</option>
                                  <?php
                                  $ss=mysqli_query($host,"select name from appSetting where tables='applicant' and type='groups' order by name asc");
                                  while($dd=mysqli_fetch_array($ss)){
                                  ?>
                                  <option value="<?php echo $dd[0];?>"><?php echo $dd[0];?></option>
                                  <?php
                                  }
                                  ?>
                </select>
                <?php
                  if($x){
                  ?>
                  <script>$("#group").val("<?php echo $ss1['groups'];?>");</script>
                  <?php } ?>
               </div>

               <div class="col-xl-4">
                  <label for="period" class="form-label">Notice Period*</label>
                  <input type="text" class="form-control" required="" id="period" name="period" placeholder="Enter Notice Period" value="<?php echo $ss1['period'];  ?>">
               </div>
               
               

                
               
            <div class="col-xl-4">
                  <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Language*</label>
                     <div class="dropdown dropdown-wrapper"> 
  <?php
     $selected_features4 = [];
     if($x){
       $selected_features4 = array_map('trim', explode(",", $ss1['lang']));
       $count=count($selected_features4);
     }
     
    $tr=mysqli_query($host,"select name from appSetting where tables='applicant' and type='lang' order by name asc");
    while($trr=mysqli_fetch_array($tr)){
        $lang[]=$trr['name'];
    }
    $total=count($lang);
    ?>
   <input type="text"value="<?php if($x){ if($count<4){echo $ss1['lang'];}else{echo "$count of $total selected";}}?>" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Select Languages"/> 
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
              
                <div class="col-xl-4">
                  <label for="assign" class="form-label" style="width:100%;">Technology*</label>
                     <div class="dropdown dropdown-wrapper"> 
  <?php
     $selected_features5 = [];
     if($x){
       $selected_features5 = array_map('trim', explode(",", $ss1['tech']));
       $count=count($selected_features5);
     }
     $tech =[];
    $tr=mysqli_query($host,"select name from appSetting where tables='applicant' and type='tech' order by name asc");
    while($trr=mysqli_fetch_array($tr)){
        $tech[]=$trr['name'];
    }
    $total=count($tech);
    ?>
   <input type="text"value="<?php if($x){ if($count<4){echo $ss1['tech'];}else{echo "$count of $total selected";}}?>" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Select Technologies"/> 
    <ul class="dropdown-menu"> 
    
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
    for($i=0;$i<count($tech);$i++){
         $feature_name=$tech[$i];
         $kkk = in_array($feature_name, $selected_features5) ? 'checked' : '';
     ?>
        <li class="dropdown-item">
            <label for="tech<?php echo $i;?>"> 
            <input type="checkbox" id="tech<?php echo $i;?>" name="tech[]" <?php echo $kkk;?> value="<?php echo $tech[$i];?>" data-name="<?php echo strtoupper($tech[$i]); ?>" class="dropdown-check" /> <?php echo strtoupper($tech[$i]);?> 
            </label>
        </li>
    <?php } ?>
                        </ul>
                    </div>
               </div>
               
               <div class="col-xl-4"> 
                   <label for="status" class="form-label">Applicant Status*</label>
                  <select type="text" class="form-control" id="status" name="status" required>
                       <option value="" hidden="">Select Status</option>
                                  <?php
                                  $ss=mysqli_query($host,"select name from appSetting where tables='applicant' and type='status' order by name asc");
                                  while($dd=mysqli_fetch_array($ss)){
                                  ?>
                                  <option value="<?php echo $dd[0];?>"><?php echo $dd[0];?></option>
                                  <?php
                                  }
                                  ?>
                </select>
                <?php
                  if($x){
                  ?>
                  <script>$("#status").val("<?php echo $ss1['status'];?>");</script>
                  <?php } ?>
               </div>
               
               <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                 <label class="form-label" style="width:100%;">Relocation*</label>
                  <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" required="" type="radio" name="reloaction" id="yes" value="yes" <?php if(trim($ss1['reloaction'])=='yes'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="yes"> Yes </label> 
                 </div>
                 <div class="form-check mb-2 form-check-md"> 
                    <input class="form-check-input" required="" type="radio" name="reloaction" id="no" value="no" <?php if(trim($ss1['reloaction'])=='no'){echo 'checked';}?>/> 
                    <label class="form-check-label" for="no"> NO </label> 
                 </div>
             </div>
         

             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                  <label class="form-label" style="width:100%;">Current CTC*</label>
                 <div class="d-flex">
                 <input type="text" class="form-control" required="" name="ctc" id="ctc" placeholder="Every Year/Monthly Calculation" value="<?php echo $ss1['ctc'];  ?>">
                 <select name="ctctype" id="ctctype" class="form-control" style="width: 188px;">
                     <option value="Monthly" selected="">Monthly</option>
                      <option value="Yearly">Yearly</option>
                       <option value="Hourly">Hourly</option>
                 </select>
                 </div>
                 <?php
                  if($x){
                  ?>
                  <script>$("#ctctype").val("<?php echo $ss1['ctc_type'];?>");</script>
                  <?php } ?>
             </div>
             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                  <label class="form-label" style="width:100%;">Company Name</label>
                 <input type="text" class="form-control" name="cname" id="cname" placeholder="Current Company Name" value="<?php echo $ss1['cname'];  ?>">
             </div>
             
             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                  <label class="form-label" style="width:100%;">Expected CTC</label>
                 <div class="d-flex">
                 <input type="text" class="form-control" name="ectc" placeholder="Every Year/Monthly Calculation" id="ectc" value="<?php echo $ss1['ectc'];  ?>"/>
                 <select name="ectctype" id="ectctype" class="form-control" style="width: 188px;">
                     <option value="Monthly" selected="">Monthly</option>
                      <option value="Yearly">Yearly</option>
                       <option value="Hourly">Hourly</option>
                 </select>
                 </div>
                 <?php
                  if($x){
                  ?>
                  <script>$("#ectctype").val("<?php echo $ss1['ectc_type'];?>");</script>
                  <?php } ?>
             </div>
               </div>
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
                <input type="hidden" value="1" id='cid' name="cid"/>
                <input type="hidden" value="<?php echo time().uniqid();?>" id="token2" name="token2"/>
                <input type="reset" id="resetbtn" style="display: none;" />
            <!-- submit button -->
         </form>
 
    </div>
              <div class="modal-footer" style="box-shadow: 0px -4px 12px darkgrey;">
                <button type="button" class="btn btn-primary" id="submit">Save Changes</button>
              </div>

      </div>
   </div>
</div>
<span id="dataedit"></span>

<script>
window.gameEditor2 = null;
ClassicEditor.create(document.querySelector('#remark')).then(editor => gameEditor2 = editor).catch(console.error);

function email(val) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(val);
}

$(document).ready(function (){
$("#loader").css("display","none");

$("#submit").on('click',(function(){
    
    if (gameEditor2) $('#remark').val(gameEditor2.getData());
    
              $('#loader').css("display","block");
               
                    $.ajax({
                        url: "data/app_data.php",
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
          }));  
 
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


