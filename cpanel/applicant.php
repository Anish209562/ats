<?php include("session.php");

$allowed_positions = array(
    'recruiter',
    'recruiter team',
    'delivery head',
    'hr manager',
    'hr access',
    'account representatives'
);

$ch=strtolower($data['position']);
if(strtolower($_SESSION['typess'])=='admin' or (in_array($ch, $allowed_positions))){
    
}
else{
header("Location :index.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
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
		<title> Applicant - Meraqui </title>

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
        <script src="build/assets/libs/jquery/jquery.min.js"></script>


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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
     <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">


<style>
*{
    font-family: 'Roboto', sans-serif;
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
    table.table-bordered thead tr th {
    background-color: var(--menu-bg);
    color: #fff;
    font-size: 12px;
    padding: 10px;
}

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
       textarea {
  resize: none;
}
/*.form-control{*/
/*    background-color:#f1f1f1b8 !important;*/
/*}*/
.modal-content {
    background-color: #ececec !important;
}
.ck-editor__editable {
    min-height: 100px !important; /* Adjust height as needed */
    max-height: 500px !important; /* Optional: Set a max-height */
    overflow: auto; /* Allows scrolling if content exceeds height */
}
.col-xl-12 h5{
    font-size: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1.5px solid #a9a9a978;
    padding-bottom: 5px;
}
.collapse{
        box-shadow: darkgrey -2px 3px 12px;
    border: 1px solid #dedede;
    border-radius: 10px;
}
input[type="checkbox"]{
        width: 30px;
    height: 17px;
}
.dropdown-menu{
        max-height:200px !important;
    overflow-x: scroll;
}
.input-group .col-3{
    margin-bottom:13px;
}
.accordion-item:last-of-type .accordion-collapse {
    max-height: 300px;
    overflow-x: scroll;
}
.modal-fullscreen{
    transform: translate(0,0px) !important;
}
.dropdown{
    width: 100% !important;
}

#setting .form-control{
    background-color: #eeeeee94 !important;
}
#setting_form div.col-xl-12{
    max-height: 200px !important;
    overflow-y: auto !important;
}
 </style>


	</head>

	<body>
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

     <?php include("bread_head.php");?>

                 

            <span id="mistable"> 
   <?php include("content/applicant.php");?>
            </span>

            <span id="output1"></span>


                </div>


            </div> 
            <!-- END MAIN-CONTENT --> 



            <!-- FOOTER -->
            <?php include 'footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
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
 
        <!-- END SCRIPTS -->
         
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
    	 <script src="build/assets/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<?php
include("statusform.php");
?>
<script>

  function removeAllModalBackdrops() {
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    document.body.classList.remove('modal-open');
}


function abc(){
    $(".modal .btn-outline-dark").click();
    $("#status_hidden").val("");
}

              var x;
              function dailyupt(x){  
                 
              $('#modalShowFirst').click();
               	 
              if(x==0){
                x=''; 
              }
                 
              $("#loader").css("display","block");
               
               $.ajax({
               url: "data/app_form.php",
               type: "POST",
               data:{x:x},
               success: function(html){
               $("#output1").text('');
               $("#output1").prepend(html);
               
               },
               error: function(){}           
               }); 
               
               }
 
              var v;
              function view(v){  
                  $("#loader").css("display","block");   
               $.ajax({
               url: "content/app_view.php",
               type: "POST",
               data:{x:v},
               success: function(html){
               $("#output1").text('');
               $("#output1").prepend(html);
               
               },
               error: function(){}           
               });  
               }
<?php
if(isset($_GET['aid'])){
$aid=$_GET['aid'];
$ss=mysqli_query($host,"select id from applicant where subdomain='$subdomain' and id='$aid'");
if(mysqli_num_rows($ss)=='1'){
?>
setTimeout(function (){

setTimeout(function (){
dailyupt("<?php echo $aid;?>");
},1000);
$("#loader").css("display","block");
},700);
<?php
}

}
?>

var a;

function deles(a){
$(document).ready(function(e){
var b=confirm("Are You Sure Do You Want to Delete ?");
if(b==true){
$.ajax({
type:"post",
url:"data/app_data.php",
data:{did:a},
success:function(html){
$("#mistable").text("");  
$("#mistable").prepend(html);
}

});

}

});

}

function toggleDropdown(event) {
           event.stopPropagation();
        var clickedRow = event.target.closest("tr");
        var dropdownOptions = clickedRow.querySelector(".options");
 
        var allOptions = document.querySelectorAll(".options");
        allOptions.forEach(function(option) {
            if (option !== dropdownOptions && option.style.display === "block") {
                option.style.display = "none";
            }
        });

        if (dropdownOptions.style.display == "block") {
            dropdownOptions.style.display = "none";
        } else {
            dropdownOptions.style.display = "block";
        }
    }

$("body").on("click",function (){
    var allOptions = document.querySelectorAll(".options");
    allOptions.forEach(function(option) {
      option.style.display = "none";
    });
});
              
var p;
function cls(p){
  $("#"+p).css('display','none');
  $("#staticBackdrop1").css('display','block');
}

  document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
      new bootstrap.Tooltip(el);
    });
  });

</script>
 <span id="dataedit"></span>
<style>
/*    .modal-backdrop {*/
/*    z-index: 999 !important;*/
/*}*/
</style>
</body> 
</html>
