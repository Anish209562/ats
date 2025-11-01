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
      <title> KAiZEN  KCC Card community System - ADD Gram Panchayats </title>
      <!-- FAVICON -->
      <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon">
      <!-- BOOTSTRAP CSS -->
      <link  id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- ICONS CSS -->
      <link href="build/assets/icon-fonts/icons.css" rel="stylesheet">
      <!-- APP SCSS -->
      <link rel="preload" as="style" href="build/assets/app-fce3f544.css" />
      <link rel="stylesheet" href="build/assets/app-fce3f544.css" />
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
         min-width: 120px;
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
      </style>
   </head>
   <body>
    <span id="dataedit"></span> 
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
                  <h1 class="page-title fw-semibold fs-18 mb-0">Village Add</h1>
                  <div class="ms-md-1 ms-0">
                     <nav>
                        <ol class="breadcrumb mb-0">
                           <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page">ADD Village</li>
                        </ol>
                     </nav>
                  </div>
               </div>
               <!-- Page Header Close --> 
              <!-- Start::row -->
               <form id="formtemplate" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card custom-card">
                           <div class="card-body">
                              <div class="row gy-3">
                              
                                   <div class="col-xl-4">
                                    <label for="Category" class="form-label">State Name</label>
                                    <select type="text" class="form-control" required id="category" name="category" data-id="state">
                                     <option value="" hidden>Select State</option>
                                     
<?php
$abc = mysqli_query($host, "select * from state where sub_domain='kaizen' order by state ASC");
while ($array1 = mysqli_fetch_array($abc)) {
?>
<option value="<?php echo $array1['state'];?>"><?php echo $array1['state']; ?></option>
<?php
}
?>

                                   </select>
                                 </div>
                             <div class="col-xl-4">
                                    <label for="product" class="form-label">District Name</label>
                                    <select type="text" class="form-control" required id="product" name="product" data-id="district">
                                      <option value="" hidden> Select District </option>
                                     
                                   </select>
                                 </div> 
                                
                            <div class="col-xl-4">
                                    <label for="name2" class="form-label">Panchayat Samitis</label>
                                    <select type="text" class="form-control" required id="name2" name="name2" data-id="panch">
                                      <option value="" hidden> Select Panchayat Samitis </option>
                                     
                                   </select>
                                 </div> 
                                 
                                   <div class="col-xl-4">
                                    <label for="name3" class="form-label"> Gram Panchayats Name </label>
                                    <select type="text" class="form-control" required id="name3" name="name3">
                                      <option value="" hidden> Select Gram Panchayats </option>
                                     
                                   </select>
                                 </div> 
                           
                                 <div class="col-xl-4">
                                    <label for="status" class="form-label" id="txt">Village</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Enter Village name">
                                 </div>
                                 <div class="col-xl-4" style="margin-top: 47px;"> 
                                 <input type="hidden" name="update" id="update"/> 
                                 <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                 <button type="reset" id="resetbtn" class="btn btn-sm btn-danger">Reset</button> 
                                 </div> 
                              </div>
                           </div> 
                        </div>
                     </div>
                  </div>
               </form>
               <!--End::row -->
               <span id="output"> 
               <?php include("content/district_sub3.php"); ?>
               </span>

            </div>
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
      <!-- END SCRIPTS -->
      <script>

$(document).ready(function (){
   
   $("input[type='radio']").click(function (){
        var hh = $(this).val();
        if(hh=="Urban") {
            $("#txt").text("Panchayat Name");
        }else{
            $("#txt").text("City & Town Name");
        }
   });
   
    $("select").on("change",function () {
    
     var hh = $(this).val();
     var type=$(this).attr("data-id");
    
     
      $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:hh,type:type},
         success: function(html){
           if(type=="state"){
               $("#product").text("");	 	
               $("#product").prepend(html);
           }else{
               if(type=="district"){
                    $("#name2").text("");	 	
                    $("#name2").prepend(html);
               }else{
                    if(type=="panch"){
                         $("#name3").text("").prepend(html);
                    }
               }
           }
         }
           
      });
    
    });

});        
        
        
         $("#formtemplate").on('submit',(function(e) { 
          e.preventDefault();
         var mod = $("#name2").val(); 
              if(mod == '') { 
         Swal.fire({
           icon: 'error',
           title: 'Validation Error',
           text: 'Please Enter Panchayat Name',
           confirmButtonColor: '#3085d6',
           confirmButtonText: 'OK'
          });
          return;
         } 
            
         $.ajax({
         url: "data/district_sub3.php",
         type: "POST",
         data: $(this).serialize(),
         success: function(html){
        $('#category').val("");
        $('#product').val("");
         $("#output").text("");	 	
         $("#output").prepend(html); 
         },
         error: function(){} 	        
         });
         }));
      
        
        
          var ab;
         function edit(ab){
         $(document).ready(function(e){
            
            $.ajax({
         type:"post",
         url:"edit/address.php",
         data:{id:ab,type:"village"},
         success:function(html){
         $("#dataedit").text("");  
         $("#dataedit").prepend(html);
         } 
         }); 
          
         });
         } 
              
         
         
         var a;
         function deles(a){
         $(document).ready(function(e){
         var b=confirm("Are You Sure Do You Want to Delete ?");
         if(b==true){
         $.ajax({
         type:"post",
         url:"data/district_sub3.php",
         data:{id:a},
         success:function(html){
         $("#output").text("");  
         $("#output").prepend(html);
         } 
         }); 
         } 
         });
         }
         
         new DataTable('#example');
         
         function toggleDropdown(event) {
         var clickedRow = event.target.closest("tr");
         var dropdownOptions = clickedRow.querySelector(".options");
         
         var allOptions = document.querySelectorAll(".options");
         allOptions.forEach(function(option) {
             if (option !== dropdownOptions && option.style.display === "block") {
                 option.style.display = "none";
             }
         });
         
         if (dropdownOptions.style.display === "block") {
             dropdownOptions.style.display = "none";
         } else {
             dropdownOptions.style.display = "block";
         }
         }
         
         
         var p;
               function cls(p){
               $("#"+p).css('display','none');
               $("#staticBackdrop1").css('display','block');
                }
         
      </script>
   </body>
</html>