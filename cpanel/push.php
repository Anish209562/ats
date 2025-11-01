<?php include("session.php"); ?>
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
    .card-body  .checkbox{
            font-size: 16px;
    font-weight: 600;
    float: left;
    margin: 5px 10px;
    }
    .card-body input[type="checkbox"]{
      float:left;
      width:25px;
      height:25px;
    }
    .checkbox_box{
        width:100%;
        height:auto;
        float:left;
        padding:15px 0px;
    }
    .selectoption_box{
        width:100%;
        height:auto;
        float:left;
    }
    .selectoption_box select,
    .selectoption_box select:focus{font-size:18px;
        border: 2px solid darkgrey;
    }
    
    
.form-check-input:checked {
    background-color: rgb(132,90,223);
    border-color:rgb(132,90,223);
}
.form-check-input{border-color:rgb(132,90,223);}
    
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

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb" style="margin-top:0px !important;">
                        <h1 class="page-title fw-semibold fs-18 mb-0">Push Notification</h1>
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
   <div class="card custom-card">
      <div class="card-body">
<form id="filter_form" method="post">  
<div class="checkbox_box container-fluid">
    
<div class="row">

<div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">
    <input type="checkbox" name-"filter" id="all" value="all" class="form-check-input"/> <label class="checkbox" for="all">All</label>
</div> 

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
    <input type="checkbox" name-"filter" id="kcc_creator" value="kcc_creator" class="form-check-input"/><label class="checkbox" for="kcc_creator">KCC Creator</label>
</div> 

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
    <input type="checkbox" name-"filter" id="vendor" value="vendor" class="form-check-input"/> <label class="checkbox" for="vendor">Vendor</label>
</div> 

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
    <input type="checkbox" name-"filter" id="kcc_card" value="kcc_card" class="form-check-input"/> <label class="checkbox" for="kcc_card">KCC Cards</label>
</div> 

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
  <div class="filter_btn" style="float:left;">
  <button type="submit" class="btn btn-outline-primary" style="padding: 0.7rem 2rem !important;margin-top:-5px;">Filter</button> 
</div>
</div> 
   
</div> <!-- row ended div -->

</div>

<div class="selectoption_box">
<!-- first select option -->  
 <div id="creators" class="collapse container-fluid" style="width:33%;float:left;padding:0px;">
<!-- location select option --> 
<select id="creators_select" class="form-control" name="creators_select">
                    <option value="" selected >All KCC Creators</option>
                    <option value="approved">Approved</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
  </select>
</div>

<!-- second select option -->  
 <div id="card_select" class="collapse container-fluid" style="width:33%;float:left;padding:0px;">

<select id="card" class="form-control" name="card_select">
   <option value="" selected >All Cards</option>
  <option value="basic">Basic</option>
  <option value="premium">Premium</option>
  <option value="vip">VIP</option>
 </select>
</div>


<!-- vendor selects option -->  
 <div id="vendor_select" class="collapse container-fluid" style="width:94%;float:left;padding:0px;">
<div class="row">

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
<!-- location select option --> 
  <select id="city_select" class="form-control">
   <option value="" selected >All Cities</option>
<?php 
$s=mysqli_query($host,"select * from user group by city ");
while($c=mysqli_fetch_array($s)){
?>
<option  value="<?php echo $c['city'];?>"><?php echo ucwords($c['city']);?></li>
<?php
}
?>
 </select>
</div>

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
<!-- location select option --> 
  <select id="product_select" class="form-control">
   <option value="" selected >All Products</option>
<?php 
$s=mysqli_query($host,"select * from product ");
while($c=mysqli_fetch_array($s)){
?>
<option value="<?php echo $c['name'];?>"><?php echo ucwords($c['name']);?></li>
<?php
}
?>
 </select>
</div> 

<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
<!-- location select option --> 
  <select id="category_select" class="form-control">
   <option value="" selected >All Category</option>
<?php 
$s=mysqli_query($host,"select * from category ");
while($c=mysqli_fetch_array($s)){
?>
<option value="<?php echo $c['name'];?>"><?php echo ucwords($c['name']);?></li>
<?php
}
?>
 </select>

</div>

</div> <!-- row div closed -->
</div>

</div>    
</form>






</div>





        
      </div>
   </div>
   
   




  
<span id="output1">

 
 </span>
 

   
   


<!--<div class="row push_form_div" style="display:none;">-->
                       
<!--        </div>-->
   
   
</div> 
 </div>

          
            </div> 
            <!-- END MAIN-CONTENT --> 



            <!-- FOOTER -->
            <?php include 'footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->
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
      table,tr,td{height:45px !important ;}
      
      
      .form-label{
          font-size:0.9rem !important;
      }
      #push_form input[type="text"]:focus,
      #push_form textarea:focus{
          border-color:rgb(132,90,223) !important;
      }
      
       
         .table-container {
            overflow-y: auto; /* Allow vertical scroll */
            max-height: 400px; /* Set a max height for the container */
        }
        
    thead th {
            position: sticky;
            top: 0;
            background: #fff; /* Background color to ensure header visibility */
            z-index: 2;
        }
</style>
<span id="push_output"></span>

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

        <!-- END SCRIPTS -->
 
        <script> 
document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }
});
        
// filter data form
$(document).ready(function(e){
 
$("#filter_form").on("submit",function(e){
    e.preventDefault();
var checkbox='All';
if($('.form-check-input:checked').length==0){
    Swal.fire({
           icon: 'error',
           title: 'Validation Error',
           text: 'Please select one category',
           confirmButtonColor: '#3085d6',
           confirmButtonText: 'OK'
     });
    return false;
}

if($("#kcc_creator").prop("checked")==true){
    var creator=$("#creators_select").val();
     checkbox="creator";
    
}

if($("#kcc_card").prop("checked")==true){
    var card=$("#card").val();
     checkbox="card";
    
}

if($("#vendor").prop("checked")==true){
    var city=$("#city_select").val();
     var product=$("#product_select").val();
      var category=$("#category_select").val();
      
      checkbox="vendor";
}
$.ajax({
         type:"post",
         url:"content/push.php",
         data:{creator:creator,card:card,city:city,product:product,category:category,checkbox:checkbox},
         success:function(html){
         $("#output1").text("");  
         $("#output1").prepend(html);
     } 
 });


    
});



});

// check only one input type checkbox
$(document).ready(function() {
              $('#filter_form input').on('change', function() {
                
                $('.checkbox_box input').not(this).prop('checked', false);
               
                if ($('#kcc_creator').is(':checked')) {
                    $('#creators').collapse('show');
                    
                } else {
                    $("#creators_select").val("");
                    $('#creators').collapse('hide');
                    
                }
                
                
                if ($('#kcc_card').is(':checked')) {
                    $('#card_select').collapse('show');
                } else {
                    $('#card_select').collapse('hide');
                    $("#card").val("");
                }
                
                if ($('#vendor').is(':checked')) {
                    $('#vendor_select').collapse('show');
                } else {
                    $('#vendor_select').collapse('hide');
                    
                    $("#city_select").val("");
                    $("#category_select").val("");
                    $("#product_select").val("");
                }
                
                if ($('#all').is(':checked')) {
                    $('#vendor_select').collapse('hide');
                    $('#creators').collapse('hide');
                    $('#card_select').collapse('hide');
                }
                
                
            });

        });
        

        


// only select one checkbox in vendor category
$(document).ready(function() {
            $('#vendor_select select').change(function() {
                let selectedCount = 0;

                $('#vendor_select select').each(function() {
                    if ($(this).val() !== "") {
                        selectedCount++;
                    }
                });

                if (selectedCount > 1) {
                       Swal.fire({
    position: "top-center",
    icon: "warning",
    title: "You select only option",
    showConfirmButton: false,
    timer: 3000
}); 
                    $(this).val(""); // Reset the last changed select
                }
            });
        });

        </script>

	</body> 
</html>
