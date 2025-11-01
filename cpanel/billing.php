<?php include("session.php"); 

$fmt = new NumberFormatter('en_IN', NumberFormatter::DECIMAL);
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
		<title> Meraqui - Monthly Billing </title>

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
         
     <style>
         .text-muted {
    color: #8c9097 !important;
    font-size: 12px;
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

           <?php include 'header.php'; ?>
            <?php  include 'sidebar.php';  ?>
            <div class="main-content app-content">

                
                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <div class="ms-md-1 ms-0">
                         </div>
                    </div>
                    <!-- Page Header Close -->

                        
                    <!-- Start::row-1 -->
                                    <div class="row">
                                        <!--<div class="col-6">-->
                                        <!--    <div class="card custom-card">-->
                                        <!--        <div class="card-body d-flex justify-content-between align-items-center">-->
                                        <!--            <div>-->
                                        <!--                <p class="mb-2">Total Gross Revenue</p>-->
                                        <!--                <h4 class="mb-0 fw-semibold mb-2">2,00,00,000</h4>-->
                                        <!--                <span class="badge bg-success-transparent">1.5% <i class="ti ti-trending-up"></i></span><span class="text-muted fs-11 ms-1">this month</span>-->
                                        <!--            </div>-->
                                        <!--            <div>-->
                                        <!--                <span class="avatar avatar-md bg-outline-primary p-2">-->
                                        <!--                    <i class="ti ti-file-check fs-20 op-7"></i>-->
                                        <!--                </span>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--  <div class="col-6">-->
                                        <!--    <div class="card custom-card">-->
                                        <!--        <div class="card-body d-flex justify-content-between align-items-center">-->
                                        <!--            <div>-->
                                        <!--                <p class="mb-2">Total Profit</p>-->
                                        <!--                <h4 class="mb-0 fw-semibold mb-2">2,00,00,000</h4>-->
                                        <!--                <span class="badge bg-success-transparent">0.53% <i class="ti ti-trending-up"></i></span><span class="text-muted fs-11 ms-1">this month</span>-->
                                        <!--            </div>-->
                                        <!--            <div>-->
                                        <!--                <span class="avatar avatar-md bg-warning p-2">-->
                                        <!--                    <i class="ti ti-chart-pie-2 fs-20 op-7"></i>-->
                                        <!--                </span>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                      
                                        <!--<div class="col-4">-->
                                        <!--    <div class="card custom-card">-->
                                        <!--        <div class="card-body d-flex justify-content-between align-items-center">-->
                                        <!--            <div>-->
                                        <!--                <p class="mb-2">Total Expenses</p>-->
                                        <!--                <h4 class="mb-0 fw-semibold mb-2">50,00,000</h4>-->
                                        <!--                <span class="badge bg-danger-transparent">0.23% <i class="ti ti-trending-down"></i></span><span class="text-muted fs-11 ms-1">this month</span>-->
                                        <!--            </div>-->
                                        <!--            <div>-->
                                        <!--                <span class="avatar avatar-md bg-secondary p-2">-->
                                        <!--                    <i class="ti ti-briefcase fs-20 op-7"></i>-->
                                        <!--                </span>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="col-4">-->
                                        <!--    <div class="card custom-card">-->
                                        <!--        <div class="card-body d-flex justify-content-between align-items-center">-->
                                        <!--            <div>-->
                                        <!--                <p class="mb-2">Total Invoice Amount</p>-->
                                        <!--                <h4 class="mb-0 fw-semibold mb-2">4,50,00,000</h4>-->
                                        <!--                <span class="badge bg-success-transparent">0.67% <i class="ti ti-trending-up"></i></span><span class="text-muted fs-11 ms-1">this month</span>-->
                                        <!--            </div>-->
                                        <!--            <div>-->
                                        <!--                <span class="avatar avatar-md bg-success p-2">-->
                                        <!--                    <i class="ti ti-album fs-20 op-7"></i>-->
                                        <!--                </span>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="col-4">-->
                                        <!--    <div class="card custom-card">-->
                                        <!--        <div class="card-body d-flex justify-content-between align-items-center">-->
                                        <!--            <div>-->
                                        <!--                <p class="mb-2">TDS 10%</p>-->
                                        <!--                <h4 class="mb-0 fw-semibold mb-2">45,000</h4>-->
                                        <!--                <span class="badge bg-success-transparent">0.53% <i class="ti ti-trending-up"></i></span><span class="text-muted fs-11 ms-1">this month</span>-->
                                        <!--            </div>-->
                                        <!--            <div>-->
                                        <!--                <span class="avatar avatar-md bg-warning p-2">-->
                                        <!--                    <i class="ti ti-chart-pie-2 fs-20 op-7"></i>-->
                                        <!--                </span>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->

                                      
                                        
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card custom-card overflow-hidden">
        <div class="card-body p-0">
            <div class="p-3">
                <?php 
                $ss=mysqli_query($host,"select sum(bill_rate) from billing_import where sub_domain='$subdomain'");
                $dd=mysqli_fetch_array($ss);
                $total=$dd[0];
                ?>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-2"><span class="d-block fw-semibold fs-15">Total Revenue</span>  
                    
                    <p class="mb-0"><span class="fs-24 fw-semibold">₹ <?php echo $fmt->format($total);?></span> </p>
                    </div>
                    <div>
                        <span class="avatar bg-outline-primary"> <i class="bi bi-bar-chart-line-fill fs-22"></i> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card custom-card overflow-hidden">
        <div class="card-body p-0">
            <div class="p-3">
                <?php 
                $ss2=mysqli_query($host,"select sum(pay_rate) from billing_import where sub_domain='$subdomain'");
                $dd2=mysqli_fetch_array($ss2);
                ?>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-2"><span class="d-block fw-semibold fs-15">Total Bill</span>  
                    
                    <p class="mb-0"><span class="fs-24 fw-semibold">₹ <?php echo $fmt->format($dd2[0]);?></span> </p>
                    </div>
                    <div>
                        <span class="avatar bg-outline-primary"> <i class="bi bi-receipt-cutoff fs-22"></i> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card custom-card overflow-hidden">
        <div class="card-body p-0">
            <div class="p-3">
                <?php 
                $ss3=mysqli_query($host,"select sum(margin) from billing_import where sub_domain='$subdomain'");
                $dd3=mysqli_fetch_array($ss3);
                ?>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-2"><span class="d-block fw-semibold fs-15">Total Margin</span>  
                    
                    <p class="mb-0"><span class="fs-24 fw-semibold">₹ <?php echo $fmt->format($dd3[0]);?></span> </p>
                    </div>
                    <div>
                        <span class="avatar bg-outline-primary"> <i class="bi bi-coin fs-22"></i> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card custom-card overflow-hidden">
        <div class="card-body p-0">
            <div class="p-3">
                 <?php 
                $ss4=mysqli_query($host,"select count(applicant) from billing_import where sub_domain='$subdomain' group by applicant");
                $dd4=mysqli_num_rows($ss4);
                ?>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="mb-2"><span class="d-block fw-semibold fs-15">NO. of Candidates</span>  
                    
                    <p class="mb-0"><span class="fs-24 fw-semibold"><?php echo $dd4;?></span> </p>
                    </div>
                    <div>
                        <span class="avatar bg-outline-primary"> <i class="bi bi-person-bounding-box fs-22"></i> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                                    </div>

                    
                    <!--<div class="row">-->
                    <!--    <div class="col-xxl-12">-->
                    <!--        <div class="card custom-card">-->
                    <!--            <div class="card-header justify-content-between">-->
                    <!--                <div class="card-title">-->
                    <!--                    Applicant List-->
                    <!--                </div>-->
                    <!--                <div class="d-flex flex-wrap">-->
                    <!--                    <div class="me-3 my-1">-->
                    <!--                        <input class="form-control" type="text" placeholder="Search Here" aria-label=".form-control-sm example">-->
                    <!--                    </div>-->
                    <!--                    <div class="dropdown my-1">-->
                    <!--                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">-->
                    <!--                            Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>-->
                    <!--                        </a>-->
                    <!--                        <ul class="dropdown-menu" role="menu">-->
                    <!--                            <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>-->
                    <!--                            <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li>-->
                    <!--                            <li><a class="dropdown-item" href="javascript:void(0);">This Year</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="table-responsive">-->
                    <!--                    <table class="table table-hover text-nowrap table-bordered">-->
                    <!--                        <thead>-->
                    <!--                            <tr>-->
                    <!--                                <th scope="col">S.No</th>-->
                    <!--                                <th scope="col">Applicant name</th>-->
                    <!--                                <th scope="col">Placement code</th>-->
                    <!--                                <th scope="col">Job Code</th>-->
                    <!--                                <th scope="col">Job Title</th>-->
                    <!--                                <th scope="col">Placement Type</th>-->
                    <!--                                <th scope="col">Gross revenue</th>-->
                    <!--                                <th scope="col">Expences</th>-->
                    <!--                                <th scope="col">Invoice </th>-->
                    <!--                                 <th scope="col">TDS 10%</th>-->
                    <!--                                <th scope="col">Profit </th>-->
                    <!--                                  <th scope="col">Duration </th>-->

                    <!--                            </tr>-->
                    <!--                        </thead>-->
                    <!--                        <tbody>-->
                    <!--                            <tr>-->
                    <!--                                <th scope="row">-->
                    <!--                                 1-->
                    <!--                                </th>-->
                    <!--                                <td>-->
                    <!--                                   David-->
                    <!--                                </td>-->
                    <!--                                <td>-->
                    <!--                                    J-102-->
                    <!--                                </td>-->
                                                    
                    <!--                                <td>-->
                    <!--                                    JJ-22-->
                    <!--                                </td>-->
                    <!--                                <td>-->
                    <!--                                    IT Consultant-->
                    <!--                                </td>-->
                    <!--                                <td>-->
                    <!--                                    Full Time-->
                    <!--                                </td>-->
                    <!--                                <td>-->
                    <!--                                    3,00,000-->
                    <!--                                </td>-->
                    <!--                                <td>40,000</td>-->
                    <!--                                <td>-->
                    <!--                                 4,50,000-->
                    <!--                                </td>-->
                    <!--                                <td>-->
                                                      
                    <!--                                </td>-->
                    <!--                                <td>-->
                    <!--                                    1,10,000                                                    </td><td>-->

                    <!--                                    31 Days                                                   </td>                                                </tr>-->
                                                
                    <!--                        </tbody>-->
                    <!--                    </table>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="card-footer">-->
                    <!--                <div class="d-flex align-items-center">-->
                    <!--                    <div>-->
                    <!--                        Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i>-->
                    <!--                    </div>-->
                    <!--                    <div class="ms-auto">-->
                    <!--                        <nav aria-label="Page navigation" class="pagination-style-4">-->
                    <!--                            <ul class="pagination mb-0">-->
                    <!--                                <li class="page-item disabled">-->
                    <!--                                    <a class="page-link" href="javascript:void(0);">-->
                    <!--                                        Prev-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>-->
                    <!--                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>-->
                    <!--                                <li class="page-item">-->
                    <!--                                    <a class="page-link text-primary" href="javascript:void(0);">-->
                    <!--                                        next-->
                    <!--                                    </a>-->
                    <!--                                </li>-->
                    <!--                            </ul>-->
                    <!--                        </nav>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--End::row-1 -->
                    
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between" >
 <div style="width:80%;">
        <form id="dateForm" method="post">
            <div class="row">
                <div class="col-3">
                    <label class="form-label">From date</label>
                    <input type="date" name="fromdate" id="range" class="form-control range"  placeholder="From Date"/>
                </div>
                 <div class="col-3">
                    <label class="form-label">To date</label>
                    <input type="date" name="todate" id="range2" class="form-control range"  placeholder="To Date"/>
                </div>
                <div class="col-lg-3">
                    <label class="form-label">Onboarding Type</label>
                    <select name="onboard_type" class="form-control">
                        <option value="" hidden="">Select Type</option>
                        <?php
                        $ss=mysqli_query($host,"select type from billing_import where sub_domain='$subdomain' group by type order by type asc");
                        if(mysqli_num_rows($ss)>0){
                        echo "<option value=''>All</option>";
                        while($sd=mysqli_fetch_array($ss)){
                        ?>
                        <option value="<?php echo $sd['type'];?>"><?php echo $sd['type'];?></option>
                        <?php
                        }
                        }
                        
                        ?>
                    </select>
                </div>

                <div class="col-1 mt-4">
                    <button id="filterBtn" class="btn btn-primary" type="submit">Filter</button>
                </div>
            </div>
        </form>
 </div>
  <div style="text-align:right;">
    <button id="import" class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#importModal">Import</button>
</div>
                                </div>
                                <div class="card-body" style="padding-top:0px;">
                                    <div class="table-responsive">
                                            <table class="table table-hover text-nowrap table-bordered" id="example" style="width:100% !important;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Invoice Month</th>
                                                        <th scope="col">Applicant ID</th>
                                                        <th scope="col">Candidate name</th>
                                                        <th scope="col">Onboarding Type</th>
                                                        <th scope="col">Client name</th>
                                                        <th scope="col">Invoice No.</th>
                                                        <th scope="col">Invoice Date</th>
                                                        <th scope="col">Pay Rate</th>
                                                        <th scope="col">Bill Rate</th>
                                                        <th scope="col">Margin </th>
                                                         <th scope="col">Upload Date & Time</th>
                                                   </tr>
                                                </thead>
                                                <span id="tableData"></span>
                                               
                                                   <?php
                                                   include("content/billing.php");
                                                   ?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->
                
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

<div class="modal fade effect-super-scaled" id="importModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title">Import Billing Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label"><b>Invoice Month</b></label>
          <input type="text" id="monthPicker" class="form-control" placeholder="YYYY-MM">
        </div>
        
        <div class="mb-3">
          <label class="form-label"><b>CSV File</b></label>
          <input type="file" id="csvFile" class="form-control" accept=".csv">
        </div>
      </div>
      
      <div class="modal-footer">
        <button class="btn btn-danger" onclick="window.location='edit/billing_imports.xlsx';">Demo Bulk</button>
        <button id="submitImport" class="btn btn-primary">Submit</button>
        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
  $('#monthPicker').datepicker({
    format: "MM yyyy",
    startView: "months", 
    minViewMode: "months",
    autoclose: true
  });

  // Submit button click
  $("#submitImport").on("click", function () {
    let month = $("#monthPicker").val();
    let file = $("#csvFile")[0].files[0];

    if (!month) {
      alert("Please select invoice month");
      return;
    }
    if (!file) {
      alert("Please choose file");
      return;
    }

    let formData = new FormData();
    formData.append("monthyear", month);
    formData.append("bulk", file);
    $("#loader").show();
    $.ajax({
      url: "data/billing.php", // your PHP handler
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (html) {
        $("#output").html(html);
        $("#loader").hide();
      }
    });
  });
});


flatpickr(".range",{altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d"});

let commonOptions = {
    paging: true,
    pageLength: 10,
    lengthChange: false,
    dom: 'Bfrtip',
   buttons: [
        {
            extend: 'excel',
            className: 'd-none',
            exportOptions: {
                columns: ':visible',
                format: {
                    body: function (data, row, column, node) {
                        // 1. Replace <br> with space
                        let text = data.replace(/<br\s*\/?>/gi, " ");
                        // 2. Remove other HTML tags
                        text = text.replace(/<[^>]*>/g, "");
                        // 3. Decode HTML entities (so &amp; -> &)
                        let txtArea = document.createElement("textarea");
                        txtArea.innerHTML = text;
                        text = txtArea.value;
                        // 4. Return cleaned text
                        return text.trim();
                    }
                }
            }
        }
    ]
};

let billingTable = new DataTable('#example',commonOptions);

function abcc(){
    let $searchInput = $('input.form-control-sm');

// customize it
$searchInput
    .attr('placeholder', 'Search here...')
    .removeClass('form-control-sm') // remove small size
    .addClass('form-control')       // normal Bootstrap input
    .css({
        'width': '330px',           // increase width
        'border': '2px solid var(--menu-bg)' // custom border
    });

$searchInput.after(
    '<button class="btn btn-success my-btn ms-2" id="customBtn">Export</button>'
);
}

abcc();

$(document).on("click", "#customBtn", function(){
    billingTable.button('.buttons-excel').trigger();
});

$("#dateForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
        type: "post",
        url: "content/billing.php",
        data: $(this).serialize(),
        success: function (forr) {
            // Destroy old DataTable
            billingTable.destroy();
               $('#example').empty();

            // Rebuild table structure
            $('#example').html(`
                <thead>
                    <tr>
                        <th>Invoice Month</th>
                        <th>Applicant ID</th>
                        <th>Candidate name</th>
                        <th>Onboarding Type</th>
                        <th>Client name</th>
                        <th>Invoice No.</th>
                        <th>Invoice Date</th>
                        <th>Pay Rate</th>
                        <th>Bill Rate</th>
                        <th>Margin</th>
                        <th>Upload Date & Time</th>
                    </tr>
                </thead>
                <tbody id="tableData">${forr}</tbody>
            `);

 billingTable = new DataTable('#example', commonOptions);
 abcc();
        }
    });
});

 
</script>

	</body> 
</html>
