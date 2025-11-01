<?php include("session.php"); 

if (isset($_GET['data'])) {
   
$decoded = base64_decode($_GET['data']);
parse_str(ltrim($decoded, '?'), $params);
       
$tt = $params['tt'] ?? null;
$subdomain = $params['subdomain'] ?? null;

if( ($tt=='1' or $tt=='2') && $subdomain=='mera_qui'){
 
 if($tt=='1'){
     $text='job';
 }
 if($tt=='2'){
     $text='client';
 }
    
}
else{
header("Location :index.php");
exit;
}
 

} else {
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
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="dashboard bootstrap, laravel template, admin panel in laravel, php admin panel, admin panel for laravel, admin template bootstrap 5, laravel admin panel, admin dashboard template, hrm dashboard, vite laravel, admin dashboard, ecommerce admin dashboard, dashboard laravel, analytics dashboard, template dashboard, admin panel template, bootstrap admin panel template">
        
        <!-- TITLE -->
		<title> MERAQUI - <?php echo strtoupper($text);?></title>

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">


        <!-- CHOICES JS -->
        <script src="build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


        <!-- MAIN JS -->
        <script src="build/assets/main.js"></script>

         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


     <style>
         .text-muted {
    color: #8c9097 !important;
    font-size: 12px;
} 
i.fa{
        width: 30px;
    height: 30px;
    background: white;
    text-align: center;
    align-content: center;
    border-radius: 6px;
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
<style>
    .text-myself{
        font-size: 14px !important;
        color:##111c43 !important;
        font-weight: 500 !important;
    }
</style>
            <?php  include 'sidebar.php';  ?>
            <div class="main-content app-content">

                
                <div class="container-fluid">

               
    <div class="d-flex justify-content-between mt-4 mb-4 align-items-center">
         <h5 class="mb-0">Import <?php echo strtoupper($text);?> from spreadsheet</h5>
         <div>
         <i class="fa fa-long-arrow-left" onclick="history.back();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Go Back"></i>
         <i class="fa fa-download"  onclick="window.location='content/<?php echo $text;?>.xls'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Template Download"></i>
         </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="post" id="importFile">
                <div class="row align-items-center mb-3">
                    <div class="col-md-3 col-lg-2">
                        <label class="col-form-label">Attachment</label>
                    </div>
                    <div class="col-md-9 col-lg-10 d-flex align-items-center">
                        <input type="file" class="form-control me-2" id="importfiledata" name="bulk" style="max-width: 200px;" accept=".csv" required=""/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 col-lg-10">
                        <button type="submit" class="btn btn-primary me-2">IMPORT</button>
                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="col-12">
                       <p class="fw-bold mt-2 mb-2">Please Note</p>
                        <ul class="list-unstyled ms-3">
                            <li class="mb-1 large text-myself">
                                <span class="me-1">•</span> Only **CSV** formats are supported.
                            </li>
                            <?php
                            if($tt=='1'){?>
                            <li class="mb-1 large text-myself">
                                <span class="me-1">•</span> Duplicates will be verified based on 'Job Code' field.
                            </li>
                           <?php } ?>
                           <li class="mb-1 large text-myself">
                                <span class="me-1">•</span> Put the EMAIL ID in every team section which is available in the portal team. Each row check with the team email if found only then import other wise not import
                            </li>
                            <li class="mb-1 large text-myself">
                               <span class="me-1">•</span> First row in the file must be field names.
                            </li>
                            <li class="mb-1 large text-myself">
                                <span class="me-1">•</span> While importing the data, duplicate records will be ignored from the source file.
                            </li>
                           <li class="mb-1 large text-myself">
                                <span class="me-1">•</span> Import might fail in cases where the document has images, special controls like combo filters.
                            </li>
                            <li class="mb-1 large text-myself">
                                <span class="me-1">•</span> The import will also fail in case the file is corrupted or the file has unreadable characters.
                            </li>
                        </ul>
                    </div>
                </div>
           
        </div>
    </div>
               </div>


            </div> 
            <!-- END MAIN-CONTENT -->

            

            <!-- FOOTER -->
            
         <?php  include 'footer.php'; ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->
<style>
    .avatar.avatar-xxl .avatar-badge {
    inset-block-start: 51%;
    inset-inline-end: -0.6rem;
}
.avatar.avatar-xxl {
    width: 2.625rem;
    height: 2.625rem;
    line-height: 5rem;
    font-size: 1.5rem;
}
.flatpickr-calendar {
  z-index: 999999 !important;
}
.table td {
    padding: 3px 20px;
}
.dt-search{
    margin-bottom: 20px;
}
.table tfoot tr td{
        padding: 10px;
    text-align: right !important;
    font-weight: bold;
}
.table>thead {
    background: var(--primary02) !important;
}
div.dt-container div.dt-paging ul.pagination {
   justify-content: center !important;
}
div.dt-container div.dt-info {
  text-align: center;
  margin-bottom: 15px;
}

</style>

        <!-- SCRIPTS -->

        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>

        <!-- POPPER JS -->
        <script src="build/assets/libs/%40popperjs/core/umd/popper.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  
        
        <!-- APEX CHART JS -->
        <script src="build/assets/libs/apexcharts/apexcharts.min.js"></script>
    

        <!-- CUSTOM-SWITCHER JS --> 
        <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>
        
        <!-- END SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
         <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
        
   <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>


<span id="output"></span>


<script>
$(document).ready(function () {

  // Submit button click
  $("#importFile").on("submit", function (e) {
      e.preventDefault();
    let file = $("#importfiledata")[0].files[0];

    if (!file) {
      alert("Please choose file");
      return;
    }

    let formData = new FormData(this);
    formData.append("type","<?php echo $tt;?>");
    $("#loader").show();
    $.ajax({
      url: "data/client_import.php", // your PHP handler
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (html) {
        $("#output").html(html);
      }
    });
  });
});


</script>

	</body> 
</html>
