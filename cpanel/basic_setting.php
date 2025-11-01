<?php include("session.php");
$s=mysqli_query($host,"select * from basic_setting where sub_domain='kaizen'");
$ddd=mysqli_fetch_array($s);

$arr=array();
$arr[0]=$ddd['terms_text'];
$arr[1]=$ddd['aboutus_text'];
$arr[2]=$ddd['privacy_text'];
$arr[3]=$ddd['faq_text'];
$arr[4]=$ddd['card_benefit'];


?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="KAiZEN  KCC Card community System - Add Client">
        <meta name="Author" content="KAiZEN  KCC Card community System - Add Client">
        <meta name="keywords" content="KAiZEN  KCC Card community System - Add Client">
        
        <!-- TITLE -->
		<title> KAiZEN  KCC Card community System - Add Client </title>

        <!-- FAVICON -->
        <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="build/assets/icon-fonts/icons.css" rel="stylesheet">
        
        <!-- APP SCSS -->
        <link rel="preload" as="style" href="build/assets/app-fce3f544.css" /><link rel="stylesheet" href="build/assets/app-fce3f544.css" />

        <!-- NODE WAVES CSS -->
        <link href="build/assets/libs/node-waves/waves.min.css" rel="stylesheet"> 

        <!-- SIMPLEBAR CSS -->
        <link rel="stylesheet" href="build/assets/libs/simplebar/simplebar.min.css">

        <!-- COLOR PICKER CSS -->
        <link rel="stylesheet" href="build/assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="build/assets/libs/%40simonwep/pickr/themes/nano.min.css">

        <!-- CHOICES CSS -->
        <link rel="stylesheet" href="build/assets/libs/choices.js/public/assets/styles/choices.min.css">

        <!-- CHOICES JS -->
        <script src="build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

        <!-- MAIN JS -->
        <script src="build/assets/main.js"></script>

         
        <!-- QUILL CSS -->
        <link rel="stylesheet" href="build/assets/libs/quill/quill.snow.css">
        <link rel="stylesheet" href="build/assets/libs/quill/quill.bubble.css">

        <!-- FILEPOND CSS -->
        <link rel="stylesheet" href="build/assets/libs/filepond/filepond.min.css">
        <link rel="stylesheet" href="build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
        <link rel="stylesheet" href="build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

        <!-- DATE & TIME PICKER CSS -->
        <link rel="stylesheet" href="build/assets/libs/flatpickr/flatpickr.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


<style>

	.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    border-radius: 4px;
}
    
 
table.dataTable thead > tr > th.dt-orderable-asc:hover, table.dataTable thead > tr > th.dt-orderable-desc:hover, table.dataTable thead > tr > td.dt-orderable-asc:hover, table.dataTable thead > tr > td.dt-orderable-desc:hover {
    outline: 0px solid rgba(0, 0, 0, 0.05);
    outline-offset: -2px;
}
table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
    text-align: start;
}

   
    .log-btn {
         width: auto;
    height: 30px;
    text-align: left;
    float: left;
    margin-left: 5px;
    margin-top: 3px;
    border: 1px solid #ccc;
    border-radius: 5px;
    line-height: 22px;
    background: #fff;
    font-size: 13px;
    text-indent: 10px;
    cursor: pointer;
    padding: 3px 5px;
         }

       .radi {
       display: block !important;
    opacity: 1 !important;
    height: 12px !important;
    float: left;
    padding: 0px !important;
    width: 16px;
    margin-top: 6px!important; 
    margin-left: 1px!important;
    position: relative !important;
         }

         .modal-footer {
    padding: 4px 4px;
    border-block-start: 1px solid #f3f3f3; 
    margin-top: 21px;
}


.swal2-container {
    display: flex;
    position: fixed;
    z-index: 999999;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 0.625em;
    overflow-x: hidden;
    transition: background-color .1s;
    -webkit-overflow-scrolling: touch;
}


    .dropdown {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .options {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 140px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 99;
    }

    .option {
        padding: 12px 16px;
        cursor: pointer;
    }

    .option:hover {
        background-color: #ddd;
    }
    .answer-type input{
        margin-right:5px;
        margin-left:5px;
    }
    table tbody button.btn{    font-size: 10px;
    padding: 5px 8px}
    
    #formtemplate img{display:none;}
    .ck-editor__editable {
    min-height: 300px !important; /* Adjust height as needed */
    max-height: 500px !important; /* Optional: Set a max-height */
    overflow: auto; /* Allows scrolling if content exceeds height */
}
</style>

	</head>

	<body>

   <span id="output"></span>
        <!-- LOADER -->
		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

            <!-- HEADER -->
          <?php include 'header.php';  ?>
            <!-- END HEADER -->

            <!-- SIDEBAR -->
          <?php include 'sidebar.php';  ?>
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content">

                
                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">Basic Settings</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close --> 
                    
<div class="row">
      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="card custom-card"> 
                 <div class="card-body " style="overflow-x: scroll;">   
                    <form id="formtemplate" method="post" enctype="multipart/form-data">
<?php 
$s=mysqli_query($host,"select * from basic_setting where sub_domain='kaizen' order by id desc limit 1");
$d=mysqli_fetch_array($s);
$rr=mysqli_num_rows($s);
if($rr>0){
?>
<style>
#formtemplate img{
    display:block;
}    
</style>
<?php
}
?>
  <!-- Third Row -->
<div class="row " style="margin-top:20px;">
            <div class="col-xl-3 col-lg-3 col-md-4 col-md-6">
                <label for="auth1" class="form-label">Auth 1</label>
                <input type="file" class="form-control" id="auth1" name="auth1" data-id="photo_hidden1" data-image="image1" accept="application/pdf"/>
                <button type="button" class="btn btn-info"><a href="img/basic_photo/<?php echo $d['auth1'];?>" style="color:#fff;" target="_" id="image1">View</a></button>
                <input type="hidden" name="photo_hidden1" id="photo_hidden1"/>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-md-6">
                <label for="auth2" class="form-label">Auth 2</label>
                <input type="file" class="form-control" id="auth2" name="auth2" data-id="photo_hidden2" data-image="image2"  accept="application/pdf"/>
                <button type="button" class="btn btn-info"><a href="img/basic_photo/<?php echo $d['auth2'];?>" style="color:#fff;" target="_" id="image2">View</a></button>
                 <input type="hidden" name="photo_hidden2" id="photo_hidden2"/>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-md-6">
                <label for="terms" class="form-label">Terms & condition photo</label>
                <input type="file" class="form-control" id="terms" name="terms" data-id="photo_hidden3" data-image="image3"  accept="application/jpg"/>
                <img src="img/basic_photo/<?php echo $d['terms'];?>" width="200px" height="100px" id="image3"/>
                 <input type="hidden" name="photo_hidden3" id="photo_hidden3"/>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-md-6">
                <label for="ads_banner_pic" class="form-label">Ads Banner</label>
                <input type="file" class="form-control" id="ads_banner_pic" name="ads_banner_pic" data-id="photo_hidden4" data-image="image4"  accept="application/jpg"/>
                <img src="img/basic_photo/<?php echo $d['ads_banner'];?>" width="200px" height="100px" id="image4"/>
                 <input type="hidden" name="photo_hidden4" id="photo_hidden4"/>
            </div>
</div>
            <!-- Third row End -->

                <!-- Fourth Row -->
<!-- this row has display none -->
<div class="row " style="margin-top:20px;display:none;">            
           
           <div class="col-xl-3 col-lg-3 col-md-4 col-md-6">
                <label for="temp1" class="form-label">Temp 1</label>
                <input type="file" class="form-control" id="temp1" name="temp1"/>
            </div>
           <div class="col-xl-3 col-lg-3 col-md-4 col-md-6">
                <label for="temp2" class="form-label">Temp 2</label>
                <input type="file" class="form-control" id="temp2" name="temp2"/>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6">
                <label for="test1" class="form-label">Test 1</label>
                <input type="text" class="form-control" id="test1" name="test1" placeholder="Test 1"/>
            </div>

             <div class="col-xl-3 col-lg-3 col-md-6">
                <label for="test2" class="form-label">Test 2</label>
                <input type="text" class="form-control" id="test2" name="test2" placeholder="Test 2"/>
            </div>
             
</div>
                <!-- Fourth row End --> 
<!-- this row has display none ends -->                
<div class="row" style="padding-top:30px;">
                                        
                                        <div class="col-xl-6">
                                            
    <label for="terms_text_hidden" class="form-label">Terms & Conditions</label>
    <textarea class="form-control" name="terms_text" id="terms_text" placeholder="Add Terms & condition " ><?php echo $d['terms_text'];?></textarea>
    <input type="hidden" name="terms_text_hidden" id="terms_text_hidden" />
                                       
                                        </div>
                                        
                                        <div class="col-xl-6">
     <label for="about_text_hidden" class="form-label">About Us </label>
    <textarea class="form-control" name="about_text" id="about_text" placeholder="Add About us "><?php echo $d['aboutus_text'];?></textarea>
    <input type="hidden" name="about_text_hidden" id="about_text_hidden"/>
                                        </div>
                                        
                                        <div class="col-xl-6">
    <label for="privacy_hidden" class="form-label">Privacy</label>
    <textarea class="form-control" name="privacy" id="privacy" placeholder="Add Privacy Details "><?php echo $d['privacy_text'];?></textarea>
    <input type="hidden" name="privacy_hidden" id="privacy_hidden"/>
                                        </div>
                            
                                   <div class="col-xl-6">
    <label for="faq_hidden" class="form-label">Faq</label>
    <textarea class="form-control" name="faq" id="faq" placeholder="Add Faq ? Details "><?php echo $d['faq_text'];?></textarea>
    <input type="hidden" name="faq_hidden" id="faq_hidden"/>
                                  </div>
     
</div>

<div class="row" style="padding-top:40px;">
	  <div class="col-lg-6 col-md-6 col-md-6" >
                <label for="ads_banner_link" class="form-label">Ads Banner Link</label>
                <input type="text" class="form-control" id="ads_banner_link" name="ads_banner_link" placeholder="ADs Banner Link" value="<?php echo $d['ads_banner_link'];?>"/>
     </div>
     <div class="col-lg-6 col-md-6 col-md-6" >
               <label for="bonus" class="form-label">KCC Creator Bonus Amount</label>
               <input type="text" class="form-control" id="bonus" name="bonus" placeholder="Wallet Bonus Amount" value="<?php echo $d['wallet_bonus'];?>"/>
     </div>
     
</div>

<div class="row" style="padding-top:40px;">
      <div class="col-xl-6 col-md-6 col-md-6">
          <label for="kcc_card" class="form-label">How to use KCC?</label>
          <textarea class="form-control" name="kcc_card" id="kcc_card" placeholder="Add Card Benefits Details"></textarea>
          <input type="hidden" name="kcc_card_hidden" id="kcc_card_hidden"/>
    </div>
     <div class="col-lg-6 col-md-6 col-md-6" >
                <label for="whatsapp" class="form-label">Whatsapp Number</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp number" value="<?php echo $d['whatsapp'];?>"/>
     </div>
</div>

<div class="row " style="margin-top:20px;">
    <div class="col-lg-12" style="text-align:left;"> 
	    <input type="hidden" name="update" id="update" value="<?php echo $d['id'];?>"/> 
	    <input type="submit" value="Update" class="btn btn-outline-primary"/> 
	</div>
</div>           <!-- Sixth row End --> 

</form>
</div>
                    
                    
                    
                          
              </div> 
       </div>
 </div>

                 

            
 
<span id="output1">

 </span>


</div> 
 </div>
<style>
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
      table,tr,td{height:50px !important ;padding:8px 0px !important;}
</style>
          
            </div> 
            <!-- END MAIN-CONTENT --> 



            <!-- FOOTER -->
            <?php include 'footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->

        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <!-- DATE & TIME PICKER JS -->
        <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 

           <!-- CUSTOM-SWITCHER JS --> 
        <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

        <!-- QUILL EDITOR JS -->
        <script src="build/assets/libs/quill/quill.min.js"></script>

        <!-- FILEPOND JS -->
        <script src="build/assets/libs/filepond/filepond.min.js"></script>  

        <!-- INTERNAL CREATE BLOG JS --> 
        <script type="module" src="build/assets/blog-create-8640480c.js"></script> 

        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>
        <!-- END SCRIPTS -->

        <script> 
        
$(document).ready(function() {
    // Initialize CKEditor 5 instances
    let editors = {};
    ClassicEditor.create(document.querySelector('#terms_text')).then(editor => { editors['terms_text'] = editor; });
    ClassicEditor.create(document.querySelector('#about_text')).then(editor => { editors['about_text'] = editor; });
    ClassicEditor.create(document.querySelector('#privacy')).then(editor => { editors['privacy'] = editor; });
    ClassicEditor.create(document.querySelector('#faq')).then(editor => { editors['faq'] = editor; });
    ClassicEditor.create(document.querySelector('#kcc_card')).then(editor => { editors['kcc_card'] = editor; });

    // Form submission handling
    $("#formtemplate").on('submit', function(e) {
        e.preventDefault();

        // Get CKEditor data and set it to hidden fields
        $("#terms_text_hidden").val(editors['terms_text'].getData());
        $("#about_text_hidden").val(editors['about_text'].getData());
        $("#privacy_hidden").val(editors['privacy'].getData());
        $("#faq_hidden").val(editors['faq'].getData());
        $("#kcc_card_hidden").val(editors['kcc_card'].getData());

        // AJAX form submission
        $.ajax({
            type: "post",
            url: "data/basic_setting.php",
            data: $(this).serialize(),
            success: function(response) {
                $("#output1").text("");    
                $("#output1").prepend(response);
            }     
        });
    });

    // Set initial data from the PHP variable
    var a = <?php echo json_encode($arr); ?>;
    if (editors['terms_text']) { editors['terms_text'].setData(a[0]); }
    if (editors['about_text']) { editors['about_text'].setData(a[1]); }
    if (editors['privacy']) { editors['privacy'].setData(a[2]); }
    if (editors['faq']) { editors['faq'].setData(a[3]); }
    if (editors['kcc_card']) { editors['kcc_card'].setData(a[4]); }
});        


// CKEDITOR.replace('terms_text');
// CKEDITOR.replace('about_text');
// CKEDITOR.replace('privacy');
// CKEDITOR.replace('faq');
// CKEDITOR.replace('kcc_card');


//  $(document).ready(function(){
 
//  $("#formtemplate").on('submit', function(e){
//   e.preventDefault();
  
//   var alert_1=CKEDITOR.instances.terms_text.getData();
//   var alert_2=CKEDITOR.instances.about_text.getData();
//   var alert_3=CKEDITOR.instances.privacy.getData();
//   var alert_4=CKEDITOR.instances.faq.getData();
//   var alert_5=CKEDITOR.instances.kcc_card.getData();
    
//   $("#terms_text_hidden").val(alert_1);  
//   $("#about_text_hidden").val(alert_2);
//   $("#privacy_hidden").val(alert_3);
//   $("#faq_hidden").val(alert_4);
//   $("#kcc_card_hidden").val(alert_5);
   
//   $.ajax({
//       type:"post",
//       url:"data/basic_setting.php",
//       data: new FormData(this),
//       contentType: false,
//       processData: false,
//       success:function(lavi){
//           $("#output1").text("");    
//           $("#output1").prepend(lavi);
//       }     
//   });

//   }); 
  
  
//  // get the details from database for ckeditor 
// var a=<?php echo json_encode($arr); ?>;
// CKEDITOR.replace('terms_text');
// CKEDITOR.replace('about_text');
// CKEDITOR.replace('privacy');
// CKEDITOR.replace('faq');
// CKEDITOR.replace('kcc_card');

// CKEDITOR.instances.terms_text.setData(a[0]);
// CKEDITOR.instances.about_text.setData(a[1]);
// CKEDITOR.instances.privacy.setData(a[2]);
// CKEDITOR.instances.faq.setData(a[3]);
// CKEDITOR.instances.kcc_card.setData(a[4]);

//  });
  
  
   var a;
function dele(a){
$(document).ready(function(e){
var b=confirm("Are You Sure Do You Want to Delete ?");
if(b==true){

$.ajax({
type:"post",
url:"data/survey_detail.php",
data:{id:a},
success:function(html){
$("#output1").text("");  
$("#output1").prepend(html);
}

});

}

});
    }
    
    
    
    
 var b;
function edit(b){
$(document).ready(function(e){

$.ajax({
type:"post",
url:"edit/survey_detail.php",
data:{id:b},
success:function(html){
$("#output").text("");  
$("#output").prepend(html);
}

});

});
}

$("#resetbtn").click(function(){
     $("#hidden").val("");
     $("#edit_image").attr('src','');
    $("#edit_image").css("display","none");
});
 $('input[type=file]').on('change', function (event) {
                let file = event.target.files[0];
                var hidden=$(this).attr("data-id");
                var image=$(this).attr("data-image");
                
                if (file) {
                    let reader = new FileReader();

                    reader.onload = function () {
                        let base64String = reader.result.split(',')[1]; // Extract Base64 part
                        $('#'+hidden).val(base64String);
                        if (file.type != 'application/pdf') {
                          $('#'+image).attr('src', reader.result).show();
                        }
                    };

                    reader.readAsDataURL(file);
                }
            });

        </script>

	</body> 
</html>
