<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <!-- META DATA -->
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- TITLE -->
      <title>eBoarding </title>
      <!-- FAVICON -->
      <link rel="icon" href="../build/assets/images/brand-logos/favicon.ico" type="image/x-icon">
      <!-- BOOTSTRAP CSS -->
      <link  id="style" href="../build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- ICONS CSS -->
      <link href="../build/assets/icon-fonts/icons.css" rel="stylesheet">
      <!-- APP SCSS -->
      <link rel="preload" as="style" href="../build/assets/app-fce3f544.css" />
      <link rel="stylesheet" href="../build/assets/app-fce3f544.css" />
      <!-- NODE WAVES CSS -->
      <link href="../build/assets/libs/node-waves/waves.min.css" rel="stylesheet">
      <!-- SIMPLEBAR CSS -->
      <link rel="stylesheet" href="../build/assets/libs/simplebar/simplebar.min.css">
      <!-- COLOR PICKER CSS -->
      <link rel="stylesheet" href="../build/assets/libs/flatpickr/flatpickr.min.css">
      <link rel="stylesheet" href="../build/assets/libs/%40simonwep/pickr/themes/nano.min.css">
      <!-- CHOICES CSS -->
      <link rel="stylesheet" href="../build/assets/libs/choices.js/public/assets/styles/choices.min.css">
      <!-- CHOICES JS -->
      <script src="../build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
      <!-- MAIN JS -->
      <script src="../build/assets/main.js"></script>
      <!-- QUILL CSS -->
      <link rel="stylesheet" href="../build/assets/libs/quill/quill.snow.css">
      <link rel="stylesheet" href="../build/assets/libs/quill/quill.bubble.css">
      <!-- FILEPOND CSS -->
      <link rel="stylesheet" href="../build/assets/libs/filepond/filepond.min.css">
      <link rel="stylesheet" href="../build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
      <link rel="stylesheet" href="../build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">
      <!-- DATE & TIME PICKER CSS -->
      <link rel="stylesheet" href="../build/assets/libs/flatpickr/flatpickr.min.css">
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
         input[type="radio"]{
                 width: 20px;
    height: 20px;
    float: left;
    margin-right: 12px;
    margin-left: 8px;
         }
         
          .opens{
              display:block;
          }
          .new{
                  margin-left: 15px;
    margin-top: 4px;
    font-size: 9px !important;
    /*margin-block-start: 2.75rem;*/
          }
          
    .tab-pane  h5{
          font-size: 18px;
      }
    
      .dropdown-menu{
          left: -126px !important;
    width: 236px !important;
    max-height: 240px !important;
    overflow-x: auto !important;
      }
      td i{
          cursor: pointer;
      }
      i.ri-edit-line{
         margin-right: 10px; 
      }
    
         .legend-item {
      display: flex;
      align-items: center;
      margin-right: 15px;
    }
    .legend-color {
      width: 15px;
      height: 15px;
      margin-right: 5px;
      border-radius: 2px;
    }
    .table th, .table td {
    border: none;
}

table tbody tr{
    display:table;
    width:100%;
    margin-bottom: 20px;
    margin-left:20px;margin-right:20px;
}

.table tbody tr td:first-child {
    border-left: 4px solid var(--menu-bg); /* your theme color */
}
@media(max-width:768px){
    .card.custom-card .card-body {
    padding:10px !important;
}
.card.custom-card .card-body ul{
flex-direction: row !important;
overflow-x: auto;
    white-space: nowrap;
}

.card.custom-card .card-body ul li {
    flex: 0 0 auto; /* prevent shrinking */
}

#okay{
    padding-left:0px !important;
    display:block !important;
    margin-bottom: 10px !important;
}
#firstrow{
    display:none !important;
}
.shadow-sm{
    flex-direction: column !important;
    padding-bottom: 20px !important;
    margin-bottom:20px !important;
}

.shadow-sm div{
    width:100% !important;
}

}

.nav-link{
    min-width: 10.7rem !important; 
     max-width: 10.5rem !important;
}
  </style>

   </head>
   <body>
  
  <span id="viewDocument"></span>

     <!-- LOADER -->
      <div id="loader">
         <img src="../build/assets/images/media/loader.svg" alt="">
      </div>
      <!-- END LOADER -->
      <!-- PAGE -->
      <div class="page">
         
           <header class="app-header" style="background-color:var(--menu-bg);">

                <!-- Start::main-header-container -->
                <div class="main-header-container container-fluid">

                    <!-- Start::header-content-left -->
                    <div class="header-content-left">

                        <!-- Start::header-element -->
                        <div class="header-element">
                            <div class="horizontal-logo">
                                <a href="index.php" class="header-logo">
                                    <img src="../build/assets/images/brand-logos/Kaizen%20Community%20Logo.png" alt="logo" class="desktop-logo"> 
                                </a>
                            </div>
                        </div>
                     
                    </div>
                   
                    <div class="header-content-right">

                        
                        <!-- Start::header-element -->
                        <div class="header-element">
                            <!-- Start::header-link|dropdown-toggle -->
                            <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="me-sm-2 me-0">
                                        <img src="../build/assets/images/faces/9.jpg" alt="img" width="32" height="32" class="rounded-circle">
                                    </div>
                                    <div class="d-sm-block">
                                        <p class="fw-semibold mb-0 lh-1" style="color:#fff;"><?php  echo $data['name']; ?></p>
                                    </div>
                                </div>
                            </a>
                            <!-- End::header-link|dropdown-toggle -->
                            <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                                <li><a class="dropdown-item d-flex" href="logout.php"><i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a></li>
                            </ul>
                        </div>  
                       
                    </div>
                </div>
            </header>

         <div class="main-content app-content">
            <div class="container-fluid">
           <style>
               .cc{
                   border-left:4px solid var(--menu-bg);
               }
               .row.shadow-sm div{
                   height:40px;
                   align-content: center;
               }
           </style>    
               
<div class="row">

<div class="col-xxl-2">
    <div class="card custom-card">
        <div class="card-body">
              <ul class="nav nav-tabs flex-column vertical-tabs-2" role="tablist">

<li class="nav-item" role="presentation">
   <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#comments" aria-selected="true" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-menu-line"></i></p>
        <p class="mb-0 text-break">Chat with Agent</p>
    </a>
</li>

<li class="nav-item" role="presentation">
   <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="register.php" aria-selected="false" tabindex="-1" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-user-voice-fill"></i></p>
        <p class="mb-0 text-break">Register Signature</p>
    </a>
</li>
</ul>
        </div>
    </div>
</div>

                <div class="col-md-10">
                    <?php
     	$aa=mysqli_query($host,"select id from onboarding where email='$manager_email'");
                   	$as=mysqli_fetch_array($aa);
                   	$idds=$as[0];
                   	
$s1=mysqli_query($host,"select * from onboard_file where token='$idds'");
$d11=mysqli_fetch_array($s1);
                    ?>
 <p>Your portal access will expire on <?php echo $d11['alldue'];?>. Please fill and submit the documents before the expiration date</p>
   <div class="d-flex justify-content-between align-items-center mb-4" style="padding-left:30px;" id="okay">
    <div class="d-flex">
      <div class="legend-item">
        <div class="legend-color" style="background-color:#ff007f;"></div>
        <span>Form</span>
      </div>
      <div class="legend-item">
        <div class="legend-color" style="background-color:#8000ff;"></div>
        <span>Reference</span>
      </div>
      <div class="legend-item">
        <div class="legend-color" style="background-color:#40e0d0;"></div>
        <span>Offer Letter</span>
      </div>
    </div>
    <div style="text-align:right;">
      <small class="text-bold">Completed <?php echo $completed;?>/<?php echo $no;?> documents</small>
    </div>
  </div>
 
    <div class="card custom-card">
        <div style="padding:10px;">
            <div class="container">
  <div class="row fw-bold border-bottom pb-2" id="firstrow">
    <div class="col-4">NAME</div>
    <div class="col-1">TYPE</div>
    <div class="col-1">DUE DATE</div>
    <div class="col-2">STATUS</div>
    <div class="col-4">ACTION ON</div>
  </div>
  
  <span id="output">
                   	<?php  
              
                   	$s1=mysqli_query($host,"select * from onboard_file where token='$idds'");
					while($d1=mysqli_fetch_array($s1)){ ?>	
				<div class="row align-items-center bg-white my-2 shadow-sm rounded">
    <div class="col-4 cc">
     <?php echo $d1['document'];?>
    </div>
    <div class="col-1">Comments : <?php if($d1['comments']!='' and $d1['comments']!=null){echo $d1['comments'];}else{echo 'N/A';}?></div>
    <div class="col-1"><?php echo $d1['due']; ?></div>
    <div class="col-2"><?php echo ucwords($d1['status']); ?></div>
    <div class="col-4">
        
     <?php
            if($d1['file']==''){
            ?>
            <button type="button" class="btn btn-primary" onclick="upload(<?= $d1['id']; ?>);">Upload</button>
            <?php
            }
            else{
            ?>
            <button type="button" class="btn btn-primary" onclick="window.location='../pop/<?php echo $d1['file'];?>'">Download</button>
            <button type="button" class="btn btn-primary" onclick="viewDocument(<?php echo $idds;?>,<?php echo $d1['id'];?>,'2');">View</button>
            <?php
            }
            ?>
            
                        <button type="button" class="btn btn-primary" onclick="signature();">Update Details</button>

        
    </div>
  </div>
							<?php  } ?>
        </span>        
        </div>
    </div>

           </div>



</div> 
               
               
            </div>
         </div>
  <form id="hiddenUploadForm" method="post" enctype="multipart/form-data">
    <input type="file" id="hiddenFileInput" name="file" accept=".jpg,.jpeg,.pdf,.docx" style="display:none;"/>
    <input type="hidden" id="hiddenDocId" name="iddss"/>
    <input type="hidden" name="idds" value="<?php echo $idds;?>"/>
</form>    


         <?php include '../footer.php';  ?>
         <style>
                [data-nav-layout=horizontal] .app-content {
        margin-block-start: 0rem !important;
    }
         </style>
      </div>
      
      </div>
      <div class="scrollToTop">
         <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
      </div>
      <div id="responsive-overlay"></div>
      <!-- DATE & TIME PICKER JS -->
      <script src="../build/assets/libs/flatpickr/flatpickr.min.js"></script>
      <!-- BOOTSTRAP JS -->
      <script src="../build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- CUSTOM-SWITCHER JS --> 
      <script type="module" src="../build/assets/custom-switcher-383b6a5b.js"></script>
      <!-- QUILL EDITOR JS -->
      <script src="../build/assets/libs/quill/quill.min.js"></script>
      <!-- FILEPOND JS -->
      <script src="../build/assets/libs/filepond/filepond.min.js"></script>  
      <!-- INTERNAL CREATE BLOG JS --> 
      <script type="module" src="../build/assets/blog-create-8640480c.js"></script> 
      <!-- END SCRIPTS -->
      <script>
function viewDocument(tt,dd,vv){
    $("#showLoader").removeClass("d-none").addClass("d-flex");
 $.ajax({
    type:"post",
    url:"viewDocument.php",
    data:{id:dd,tokens:tt,vv:vv},
    success:function (html){
        $("#viewDocument").text("").html(html);
    }
});   
}

function upload(docId) {
    $("#hiddenDocId").val(docId);

    $("#hiddenFileInput").trigger("click");
}

$("#hiddenFileInput").on("change", function () {
    if (this.files.length > 0) {
      const allowedExtensions = ["jpg", "jpeg", "pdf", "docx"];
        
        const file = this.files[0]; // only one file
        const fileName = file.name.toLowerCase(); // case-insensitive
        const fileExtension = fileName.split(".").pop();

        if (!allowedExtensions.includes(fileExtension)) {
            Swal.fire({
                icon: "error",
                title: "Only JPG, PDF, and DOCX files are allowed!",
                showConfirmButton: false,
                timer: 1500
            });
            $(this).val(""); // reset input
        }
        
        
        let formData = new FormData($("#hiddenUploadForm")[0]);

       $("#showLoader").removeClass("d-none").addClass("d-flex");

        $.ajax({
            url: "upload.php",
            type: "POST",
            data: formData,
            processData: false, // required for FormData
            contentType: false, // required for FormData
            dataType: "json",
            success: function (response) {
              $("#showLoader").removeClass("d-flex").addClass("d-none");
         
          Swal.fire({
            icon: response.icon,
            title: response.message,
            showConfirmButton: false,
            timer: 1500
        });
        
            if (response.html) {
                    $("#output").html(response.html);
                }
        
            },
            error: function () {
               $("#showLoader").removeClass("d-flex").addClass("d-none");
                Swal.fire("Error", "File upload failed", "error");
            }
        });
    }
});

         
      </script>
      <div id="showLoader" class="d-none justify-content-center align-items-center mb-4" style="position: fixed;background: #00000038;width: 100%;height: 100%;z-index: 99999;align-items: center;"> 
  <div class="spinner-border" role="status"> <span class="visually-hidden">Loading...</span> </div> 
</div>
   </body>
</html>