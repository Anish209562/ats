<?php include '../db.php';  

   $x=$_POST['x'];    
   
   ?>
 <style>
     .form-control{
         background-color: #f1f1f182 !important;
     }
 </style>
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

<?php  if($x){ 

   $qq1=mysqli_query($host,"select * from client where id='$x'");  
   $ss1=mysqli_fetch_array($qq1); } ?>

<div class="modal-dialog modal-fullscreen">
   <div class="modal-content">
      <div class="modal-header" style="box-shadow:-2px 3px 12px darkgrey;z-index:9;">
         <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Client</h1>
         <button type="button" id="closeid" class="btn-close" style="font-size:18px !important;" data-bs-dismiss="modal" aria-label="Close" onclick="$('#output1').html('');">
         </button>
      </div>
      <div class="modal-body">
         <form method="post" id="postform1" enctype="multipart/form-data">
            <div class="row gy-3">
                <div class="col-xl-12">
                    <h5>Business Information</h5>
                </div>
 <div class="col-xl-6"> 
                   <label for="name" class="form-label">Client Name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Client Name" value="<?php echo $ss1['name'];  ?>" required="">
               </div>
               <div class="col-xl-6"> 
                   <label for="name" class="form-label">Alise Name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="aname" name="aname" placeholder="Alise Name" value="<?php echo $ss1['aname'];  ?>" required="">
               </div>

          <div class="col-xl-6">
              <div class="row">
                  
                  <div class="col-xl-12">
                  <label for="mobile" class="form-label">Mobile</label>
                  <input type="tel" class="form-control" id="mobile" maxlength="10" minlength="10" name="mobile" placeholder="Enter Mobile" value="<?php echo $ss1['mobile'];  ?>">
               </div>

               <div class="col-xl-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $ss1['email'];  ?>" />
               </div>
                  
              </div>
          </div>
          
          <div class="col-xl-6">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" placeholder="Enter Address" rows="4"><?php echo $ss1['address'];  ?></textarea>
               </div>
               
                <div class="col-xl-3">
                  <label for="website" class="form-label">Website<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="website" name="website" placeholder="Enter Webiste" value="<?php echo $ss1['Website'];  ?>"  required=""/>
               </div>

                <div class="col-xl-3">
                  <label for="industry" class="form-label">Industry<span class="text-danger">*</span></label> 
                  <select class="form-control" id="industry" name="industry">
                     <option value="" hidden="">Select Industry</option>
                     <option value="IT" <?php if($ss1['Industry']='IT'){echo 'selected';}?> > IT</option>
                     <option value="NON_IT" <?php if($ss1['Industry']='NON_IT'){echo 'selected';}?>>NON IT</option>
                  </select>
               </div>

               <!--<div class="col-xl-4">-->
               <!--   <label for="category" class="form-label">Category*</label>-->
               <!--   <input type="text" class="form-control" id="category" name="category" placeholder="Enter category" value="<?php //echo $ss1['category'];  ?>">-->
               <!--</div>-->
               
               <div class="col-xl-3">
                  <label for="primary" class="form-label">Primary Owner<span class="text-danger">*</span></label> 
                  <select class="form-control" id="primary" name="primary" required>
                     <option value="" hidden="">Select Owner</option>
                     <?php
     $team= [];
     $ss=mysqli_query($host,"select team.name,team.email from team where team.sub_domain='$subdomain' order by name asc");
     while($dd=mysqli_fetch_array($ss)){
         $team[] = [
            'name'=> $dd['name'],
            'email'=>$dd['email']
            ];
     ?>
     <option value="<?php echo $dd['email'].";".$dd['name'];?>"> <?php echo strtoupper($dd['name']);?></option>
    <?php  } ?>
                  </select>
                  <?php
                  if($x){
                  ?>
                  <script> $("#primary").val("<?php echo $ss1['primarye'].";".$ss1['primaryn']?>");</script>
                  <?php } ?>
               </div>
             
               <div class="col-xl-3">
                  <label for="assignment" class="form-label">Client Owner<span class="text-danger">*</span></label> 
                  <select class="form-control" id="assignment" name="assignment" required>
                     <option value="" hidden="">Select Owner</option>
                     <?php
     for($is=0;$is<count($team);$is++){
     ?>
     <option value="<?php echo $team[$is]['email'].";".$team[$is]['name'];?>"> <?php echo strtoupper($team[$is]['name']);?></option>
    <?php  } ?>
                  </select>
                   <?php
                  if($x){
                  ?>
                  <script> $("#assignment").val("<?php echo $ss1['cliente'].";".$ss1['clientn']?>");</script>
                  <?php } ?>
               </div>             
     
               <div class="col-xl-6">
                  <label for="about" class="form-label">About company<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="about" name="about" placeholder="About Company"><?php echo $ss1['about'];  ?></textarea>
               </div>
               <!--<div class="col-xl-6">-->
               <!--   <label for="remark" class="form-label">Remark</label>-->
               <!--   <textarea class="form-control" id="remark" name="remark" placeholder="Enter Remark"><?php // echo $ss1['remark'];  ?></textarea>-->
               <!--</div>-->

               
            </div>
            <!-- contact -->
            <div class="row gy-3" style="margin-top:20px">
                  <div class="col-xl-12">
                    <h5>Contact Information 
<button type="button" class="btn btn-myself  btn-sm" id="addMore">Add More</button>
                    </h5>
                </div>
                <div class="col-xl-12" style="margin-top:0px;padding-left: 26px;">
 <div id="inputContainer">
     <?php
     $uss=mysqli_query($host,"select id,depart,email,post,name,mobile from item_details where type='user' and sub_domain='$subdomain' and itemid='$x'");
     if(mysqli_num_rows($uss)>0){
     while($us=mysqli_fetch_array($uss)){
     ?>
     <div class="row mb-2 input-group">
         <input type="hidden" name="edit[]" value="<?php echo $us['id'];?>"/>
                <div class="col-2">
                    <select class="form-control" name="department[]">
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
                    <input type="text" class="form-control" name="person[]" placeholder="Enter Name" value="<?php echo $us['name'];?>"/>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="mobiless[]" placeholder="Enter Mobile" value="<?php echo $us['mobile'];?>" maxlength="10">
                </div>
                <div class="col-3">
                    <input type="email" class="form-control" name="emailss[]" placeholder="Enter Email" value="<?php echo $us['email'];?>">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="post[]" placeholder="Enter Designation" value="<?php echo $us['post'];?>">
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-myself removeField" data-id='<?php echo $us['id'];?>'  data-type="1" >✖</button>
                </div>
            </div>
     <?php
     }
     }
     else{
         echo '<script>$("#inputContainer").html("");setTimeout(function (){$("#addMore").click();},500);</script>';
     }
     ?>
 </div>

               </div>
                </div>
            <div class="row gy-3">
                  <div class="col-xl-12">
                    <h5>Document Attachment</h5>
                </div>

<div class="col-xl-12" style="margin-top:0px;    padding-left: 26px;">

<div class="row">
    <div class="col-lg-5">
              <select class="form-control" id="d_name" name="d_name"/>
<option value="" hidden="">Select Document</option>
<?php
$ss=mysqli_query($host,"select name from category where status='1' and type='document'");
while($dd=mysqli_fetch_array($ss)){
?>
<option value="<?php echo $dd['name'];?>"><?php echo $dd['name'];?></option>
<?php } ?>
              </select>
         </div>
         <div class="col-lg-5">
              <input name="d_file" class="form-control" type="file" id="d_file"/>
         </div>
         <div class="col-lg-2">
             <button type="button" class="btn btn-primary btn-sm" id="changees" style="margin-top:5px;">Upload</button>
         </div>


<div class="col-lg-12">
    <hr/>
<table class="table table-hover table-bordered">
        <thead>
        <tr>
             <th>View Or Download</th>
            <th>Document Name</th>
            <th>Upload Date & Time</th>
            <th>Action</th>
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
         <td><button type='button' class='btn btn-myself btn-sm removeField' data-id="<?php echo $dos['id'];?>" data-type="2"><i class="ri-delete-bin-line"></i></button></td></tr>
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
                <input type="hidden" value="<?php echo $ss1['id']; ?>" id='updates' name="updates"/>
                <input type="hidden" value="1" id='cid' name="cid"/>
                <input type="hidden" value="<?php echo time().uniqid();?>" id="token2" name="token2"/>
                <input type="reset" id="resetbtn" style="display: none;" />
                 <input type="submit" id="submitbtn" style="display: none;" />
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
// window.gameEditor = null;
// window.gameEditor2 = null;
// window.gameEditor3 = null;
window.gameEditor4 = null;
// ClassicEditor.create(document.querySelector('#pterms')).then(editor => gameEditor = editor).catch(console.error);

// ClassicEditor.create(document.querySelector('#remark')).then(editor => gameEditor2 = editor).catch(console.error);

// ClassicEditor.create(document.querySelector('#cinform')).then(editor => gameEditor4 = editor).catch(console.error);

ClassicEditor.create(document.querySelector('#about')).then(editor => gameEditor4 = editor).catch(console.error);

function email(val) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(val);
}

$(document).ready(function (){
$("#loader").css("display","none");
      $("#addMore").click(function () {
        appendField();
    });


// Remove row
$(document).on("click", ".removeField", function () {

var table="";
if($(this).attr("data-type")=="1"){
$(this).closest(".input-group").remove();
table="item_details";
}
if($(this).attr("data-type")=="2"){
table="upload";
}
var a=$(this).attr("data-id");

if(a!=''){
$.ajax({
type:"post",
url:"data/upload.php",
data:{id:a,table:table},
success:function(html){
$("#dataedit").text("").prepend(html);
$("#rows"+a).remove();

}

});
}

    });
    
    
$("#changees").on("click", function () {
  var name = $("#d_name").val();
  var token2 = $("#token2").val();
  var file = $("#d_file")[0].files[0];
  var cid=$("#cid").val();

  if (name == "") {
    Swal.fire({
      title: "Select document name",
      text: "Document name must be compulsory",
      icon: "error"
    });
    return false;
  }

  if (!file) {
    Swal.fire({
      title: "Upload a file",
      text: "You must choose a file to upload.",
      icon: "error"
    });
    return false;
  }

  var formData = new FormData();
  formData.append("photo", file);
  formData.append("name", name);
  formData.append("token2", token2);
  formData.append("cid",cid);

  $('#loader').css("display","block");

  $.ajax({
    url: "data/upload.php",
    type: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (html) {
      $("#dataedit").text("");
      $("#dataedit").prepend(html);
    }
  });
});

});
    
    function appendField() {
    
    let lastRow = $("#inputContainer .input-group").last();
    let nameVal = lastRow.find('select[name="department[]"]').val()?.trim() || '';
    let mobileVal = lastRow.find('input[name="person[]"]').val()?.trim() || '';
    let emailVal = lastRow.find('input[name="mobiless[]"]').val()?.trim() || '';
    let emailVal2 = lastRow.find('input[name="emailss[]"]').val()?.trim() || '';
    let emailVal3 = lastRow.find('input[name="post[]"]').val()?.trim() || '';
    
    if (lastRow.length > 0) {
        if (nameVal == "" || mobileVal == "" || emailVal == "" || emailVal2 == "" || emailVal3 == "") {
 Swal.fire({
  icon: "error",
  title: "Adding Error",
  text: "Please fill Name, Mobile, Email,Department,Post before adding another."
});
return;
        }
        if (emailVal.length != 10) {
 Swal.fire({
  icon: "error",
  title: "Invalid Mobile Number",
  text: "Please fill 10 digit mobile number"
});

            return;
        }
        if (!email(emailVal2)) {

 Swal.fire({
  icon: "error",
  title: "Invalid Email address",
  text: "Please fill correct email address"
});
            return;
        }
    }
   
        $("#inputContainer").append(`
            <div class="row mb-2 input-group">
                <div class="col-2">
                    <select class="form-control" name="department[]">
                        <option value="" hidden>Select Department</option>
                        <?php
                        $de=mysqli_query($host,"select name from category where type='department'");
                        while($dee=mysqli_fetch_array($de)){
                        echo "<option value='".$dee['name']."' >".$dee['name']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="person[]" placeholder="Enter Name">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="mobiless[]" maxlength="10" placeholder="Enter Mobile">
                </div>
                <div class="col-3">
                    <input type="email" class="form-control" name="emailss[]" placeholder="Enter Email">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="post[]" placeholder="Enter Designation">
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-myself removeField" data-id='' data-type='1'>✖</button>
                </div>
            </div>
        `);
    }


 $(document).ready(function(e){
$("#postform1").on("submit", function (e) {
    // stop the actual submit
    e.preventDefault();
    
              
    // if (gameEditor)  $('#pterms').val(gameEditor.getData());
    // if (gameEditor2) $('#remark').val(gameEditor2.getData());
    // if (gameEditor3) $('#cinform').val(gameEditor3.getData());
    if (gameEditor4) $('#about').val(gameEditor4.getData());
    
              $('#loader').css("display","block");
               
                    $.ajax({
                        url: "data/client_data.php",
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
         $("#submit").on('click',(function(e){
             e.preventDefault();
             $("#submitbtn").click();
  
          }));  
   });
   
  // dropdown
  $(document).ready(function () {
  
  $('.dropdown-menu').on('click', function (e) {
    e.stopPropagation();
  });

  $('.dropdown-check').on('change', function () {
    let names = [];
    $('.dropdown-check:checked').each(function () {
      names.push($(this).data("name"));
    });
    $('#dropdownMenuButton1').val(names.join(", "));
  });

  $('.dropdown-checks').on('change', function () {
    let names = [];
    $('.dropdown-checks:checked').each(function () {
      names.push($(this).data("name"));
    });
    $('#dropdownMenuButton2').val(names.join(", "));
  });

  $('.dropdown-checkss').on('change', function () {
    let names = [];
    $('.dropdown-checkss:checked').each(function () {
      names.push($(this).data("name"));
    });
    $('#dropdownMenuButton3').val(names.join(", "));
  });
<?php
if($x){
?>
  $('.dropdown-check').trigger('change');
  $('.dropdown-checks').trigger('change');
  $('.dropdown-checkss').trigger('change');
 <?php
}
?>
});

</script>


