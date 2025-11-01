<?php include("session.php"); ?>
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
		<title> Meraqui - Admin Panel </title>

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

     <style>
    .category-link.primary{
    color: var(--primary-color);
    background-color: var(--primary01);
    border-color: var(--primary02);
}
.category-link.secondary{
    color: rgb(var(--secondary-rgb));
    background-color: rgba(var(--secondary-rgb), .1);
    border-color: rgba(var(--secondary-rgb), .2);
}
.category-link.warning {
    color: rgb(var(--warning-rgb));
    background-color: rgba(var(--warning-rgb), .1);
    border-color: rgba(var(--warning-rgb), .2);
}
.category-link.success {
    color: rgb(var(--success-rgb));
    background-color: rgba(var(--success-rgb),.1);
    border-color: rgba(var(--success-rgb),.2)
}
.category-link.danger {
    color: rgb(var(--danger-rgb));
    background-color: rgba(var(--danger-rgb),.1);
    border-color: rgba(var(--danger-rgb),.2)
}
.category-link.purple {
    color: rgb(var(--purple-rgb));
    background-color: rgba(var(--purple-rgb),.1);
    border-color: rgba(var(--purple-rgb),.2)
}
.category-link.pink {
    color: rgb(var(--pink-rgb));
    background-color: rgba(var(--pink-rgb),.1);
    border-color: rgba(var(--pink-rgb),.2)
}
.category-link.danger .category-svg {
    fill: var(--bs-red);
}
.category-link.purple .category-svg {
    fill: var(--bs-purple);
}
.category-link.pink .category-svg {
    fill: var(--bs-pink);
}

                            .text-muted{
                                font-weight: bold;
                            }
                            .category-link{
                                    padding: 10px;
                            }
                            .category-link .fw-semibold{
                                margin-bottom: 0px !important;
                            }
        .table thead tr th{
            background-color:#111c431c !important;
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

            <!-- SIDEBAR -->
            <?php  include 'sidebar.php';  ?>
          
            <div class="main-content app-content">

                
                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <div class="ms-md-1 ms-0">
                         </div>
                    </div>
  
   <div class="row">
     <div class="col-xl-12">
    <div class="card custom-card">
        <div class="card-body">
            <div class="row gy-xl-0 gy-3 mb-4">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="jobposting.php" class="category-link primary text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"></path>
                                <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"></path>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Job</p>
                            <?php
                            $ss=mysqli_query($host,"select count(id) from job where subdomain='$subdomain'");
                            $rr=mysqli_fetch_array($ss);
                            ?>
                            <span class="fs-17 text-muted"><?php echo $rr[0];?></span>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="javascript:void(0);" class="category-link secondary text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <g><rect fill="none" height="24" width="24"></rect></g>
                                <g>
                                    <g opacity=".3">
                                        <path
                                            d="M6.71,18.71c-0.28,0.28-2.17,0.76-2.17,0.76s0.47-1.88,0.76-2.17C5.47,17.11,5.72,17,6,17c0.55,0,1,0.45,1,1 C7,18.28,6.89,18.53,6.71,18.71z M7.41,10.83L5.5,10.01l1.97-1.97l1.44,0.29C8.34,9.16,7.83,10.03,7.41,10.83z M13.99,18.5 l-0.82-1.91c0.8-0.42,1.67-0.93,2.49-1.5l0.29,1.44L13.99,18.5z M19.99,4.01c0,0-3.55-0.69-8.23,3.99 c-1.32,1.32-2.4,3.38-2.73,4.04l2.93,2.93c0.65-0.32,2.71-1.4,4.04-2.73C20.68,7.56,19.99,4.01,19.99,4.01z M15,11 c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2s2,0.9,2,2C17,10.1,16.1,11,15,11z"
                                        ></path>
                                    </g>
                                    <g>
                                        <path
                                            d="M6,15c-0.83,0-1.58,0.34-2.12,0.88C2.7,17.06,2,22,2,22s4.94-0.7,6.12-1.88C8.66,19.58,9,18.83,9,18C9,16.34,7.66,15,6,15 z M6.71,18.71c-0.28,0.28-2.17,0.76-2.17,0.76s0.47-1.88,0.76-2.17C5.47,17.11,5.72,17,6,17c0.55,0,1,0.45,1,1 C7,18.28,6.89,18.53,6.71,18.71z M17.42,13.65L17.42,13.65c6.36-6.36,4.24-11.31,4.24-11.31s-4.95-2.12-11.31,4.24l-2.49-0.5 C7.21,5.95,6.53,6.16,6.05,6.63L2,10.69l5,2.14L11.17,17l2.14,5l4.05-4.05c0.47-0.47,0.68-1.15,0.55-1.81L17.42,13.65z M7.41,10.83L5.5,10.01l1.97-1.97l1.44,0.29C8.34,9.16,7.83,10.03,7.41,10.83z M13.99,18.5l-0.82-1.91 c0.8-0.42,1.67-0.93,2.49-1.5l0.29,1.44L13.99,18.5z M16,12.24c-1.32,1.32-3.38,2.4-4.04,2.73l-2.93-2.93 c0.32-0.65,1.4-2.71,2.73-4.04c4.68-4.68,8.23-3.99,8.23-3.99S20.68,7.56,16,12.24z M15,11c1.1,0,2-0.9,2-2s-0.9-2-2-2s-2,0.9-2,2 S13.9,11,15,11z"
                                        ></path>
                                    </g>
                                </g>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Submissions</p>
                            <span class="fs-17 text-muted">8</span>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="javascript:void(0);" class="category-link warning text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" id="swatchbook">
                                <path opacity="0.2" d="M9 22H5a3.003 3.003 0 0 1-3-3V5a3.003 3.003 0 0 1 3-3h4a3.003 3.003 0 0 1 3 3v14a3.003 3.003 0 0 1-3 3z"></path>
                                <path opacity="0.4" d="m20.293 6.535-2.828-2.828a3.004 3.004 0 0 0-4.243 0l-1.229 1.228c0 .022.007.043.007.065v14c0 .027-.007.052-.008.08l8.301-8.302a3.004 3.004 0 0 0 0-4.243z"></path>
                                <circle cx="7" cy="17" r="1" opacity="1"></circle>
                                <path opacity="1" d="m19.065 12.007-7.073 7.072c0-.027.008-.052.008-.079a3.003 3.003 0 0 1-3 3h10a3.003 3.003 0 0 0 3-3v-4a3 3 0 0 0-2.935-2.993z"></path>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Interview Schedules</p>
                            <span class="fs-17 text-muted">0</span>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="javascript:void(0);" class="category-link success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <rect fill="none" height="24" width="24"></rect>
                                <g opacity=".3"><path d="M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                                <g><path d="M16,11V3H8v6H2v12h20V11H16z M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Confirmations</p>
                            <span class="fs-17 text-muted">2</span>
                        </a>
                    </div>
                </div>
              
              </div>  
                <div class="row gy-xl-0 gy-3">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="javascript:void(0);" class="category-link danger">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <rect fill="none" height="24" width="24"></rect>
                                <g opacity=".3"><path d="M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                                <g><path d="M16,11V3H8v6H2v12h20V11H16z M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Placed</p>
                            <span class="fs-17 text-muted">0</span>
                        </a>
                    </div>
                </div>
                 <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="javascript:void(0);" class="category-link purple">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <rect fill="none" height="24" width="24"></rect>
                                <g opacity=".3"><path d="M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                                <g><path d="M16,11V3H8v6H2v12h20V11H16z M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Client Submissions</p>
                            <span class="fs-17 text-muted">0</span>
                        </a>
                    </div>
                </div>
                 <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div>
                        <a href="javascript:void(0);" class="category-link pink">
                            <svg xmlns="http://www.w3.org/2000/svg" class="category-svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <rect fill="none" height="24" width="24"></rect>
                                <g opacity=".3"><path d="M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                                <g><path d="M16,11V3H8v6H2v12h20V11H16z M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"></path></g>
                            </svg>
                            <p class="fs-14 mb-1 text-default fw-semibold">Offer Aceepted</p>
                            <span class="fs-17 text-muted">0</span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

</div>

<div class="row">
                      <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="card-title">Candidate Submission Funnel
                                    </div>
                                    <a href="javascript:void(0);" title="Save as Image" class="btn btn-icon btn-light"><i class="bi bi-download fs-18" onclick="downloadChart()" ></i></a>
                                    
                                </div>
                                <div class="card-body">
                                     <div id="funnel-chart" style="width: 800px; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                                              <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Revenue by Recruiter</div>
                                </div>
                                <div class="card-body">
                                    <div id="pie-basic"></div>
                                </div>
                            </div>
                        </div>

</div>

 <div class="row">
 
 <div class="col-xl-6">
    <div class="card custom-card overflow-hidden">
        <div class="card-header justify-content-between">
            <div class="card-title">Total Applicant ( Department & Client Wise )</div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table text-nowrap table-bordered">
                    <thead >
                        <tr >
                            <th scope="col" >Department</th>
                            <th scope="col">Applied</th>
                            <th scope="col">Reject</th>
                            <th scope="col">Inprogress</th>
                            
                            <th scope="col">Placed</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $ss=mysqli_query($host,"select count(id), industry ,count(CASE WHEN status = 'reject' THEN 1 ELSE NULL END) AS rejected_applicants, count(CASE WHEN status = 'placed' THEN 1 ELSE NULL END) AS placed_applicants,count(CASE WHEN status = 'Processing' THEN 1 ELSE NULL END) AS progress from applicant where subdomain='$subdomain' and industry is not null group by industry");
                       while($ds=mysqli_fetch_array($ss)){
                          ?>
                           <tr>
                            <th scope="row">
                               <span class="d-blockfw-semibold"><?php echo $ds[1];?></span>
                                
                            </th>
                            <td class=""><?php echo $ds[0];?></td>
                            <td class=""><?php echo $ds[2];?></td>
                            <td><?php echo $ds[4];?></td>
                            <td><?php echo $ds[3];?></td>
                        </tr>
                          <?php
                       }
                       ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 <div class="col-xl-6">
    <div class="card custom-card overflow-hidden">
        <div class="card-header justify-content-between">
            <div class="card-title">Client Wise Stats</div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Client Name</th>
                            <th scope="col">Requirement</th>
                            <th scope="col">Placed</th>
                            <th scope="col">Revnue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                               <span class="d-blockfw-semibold">XYZ</span>
                                
                            </th>
                            <td class="">200</td>
                            <td class="">150</td>
                            <td>33 Lakh</td>
                        </tr>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        
    </div>



   
  
 <div class="row">
      <div class="col-xl-6">
    <div class="card custom-card overflow-hidden">
        <div class="card-header justify-content-between">
            <div class="card-title">Recruiter Wise Stats</div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
              <table border="1" cellspacing="0" cellpadding="6" class="table">
  <thead style="background-color: #f2f2f2;">
    <tr>
      <th>Recruitment Manager</th>
      <th>Job Age</th>
      <th>#Active Jobs</th>
      <th>Number Of Positions</th>
      <th># Open Positions</th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="background-color: #dce6f1 !important;">Deepa Nambu</td>
      <td style="background-color: #dce6f1 !important;">21 Days</td>
      <td style="background-color: #dce6f1 !important;">2</td>
      <td style="background-color: #dce6f1 !important;">2</td>
      <td style="background-color: #dce6f1 !important;"><a href="#">2</a></td>
    </tr>
  </tbody>
</table>

            </div>
        </div>
    </div>
</div>


 </div>

 

                </div>


            </div> 
            <!-- END MAIN-CONTENT -->
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
</style>

        <!-- SCRIPTS -->

        <!-- SCROLL-TO-TOP -->
           <!-- APEX CHARTS JS -->
        <script src="build/assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="build/assets/libs/echart/echarts.min.js"></script>
<script>
    

var chartDom = document.getElementById('funnel-chart');
var myChart = echarts.init(chartDom);
var option = {
  tooltip: {
    trigger: 'item',
    formatter: '{b}: {c} ({d}%)'
  },
  // Disable legend box
  legend: {
  show: true,
  orient: 'vertical',    // vertical layout
  left: '0%',            // align to the far left
  top: 'middle',         // center vertically
  icon: 'circle',        // or 'rect' for square blocks
  itemWidth: 14,
  itemHeight: 14,
  textStyle: {
    fontSize: 12
  }
},
  series: [{
    name: 'Candidates',
    type: 'funnel',
    left: '20%',
    width: '40%',
    sort: 'descending',
    label: {
      show: true,
      position: 'right',
      formatter: '{b}: {c}',
      color: '#333',
      fontSize: 13
    },
    labelLine: {
      show: true,
      length: 10,
      lineStyle: {
        color: '#aaa'
      }
    },
    itemStyle: {
      borderWidth: 1,
      borderColor: '#fff',
      opacity: 1
    },
    data: [
      { value: 108, name: 'Waiting for Evaluation', itemStyle: { color: '#111c43' } },
      { value: 99, name: 'Offer Sent', itemStyle: { color: '#7a8898' } },
      { value: 89, name: 'Submitted To Client', itemStyle: { color: '#0a2eae' } },
      { value: 78, name: 'Not Joined', itemStyle: { color: '#111c43a1' } },
      { value: 76, name: 'L1 Interview', itemStyle: { color: '#263a84a1' } },
      { value: 64, name: 'Client Interview', itemStyle: { color: '#3e62eaa1' } },
      { value: 42, name: 'L1 Selected', itemStyle: { color: '#3f5298c9' } },
      { value: 38, name: 'Vendor Interview', itemStyle: { color: '#4c6eea82' } },
      { value: 12, name: 'Placed', itemStyle: { color: '#1c2856a8' } },
      { value: 7, name: 'L3 Interview', itemStyle: { color: '#2196f3' } },
      { value: 3, name: 'Risk Assessment Initiated', itemStyle: { color: '#89d1f9' } }
    ]
  }]
};

myChart.setOption(option);

  function downloadChart() {
    var img = new Image();
    img.src = myChart.getDataURL({
      type: 'png',
      pixelRatio: 2,
      backgroundColor: '#fff'
    });

    // Create a temporary link and download
    var link = document.createElement('a');
    link.href = img.src;
    link.download = 'funnel_chart.png';
    link.click();
  }
  
      var options = {
    series: [800400, 80000, 556899,513200],
    chart: {
      height: 300,
      type: "pie"
    },
    colors: ["#845adf", "#23b7e5", "#f5b849", "#49b6f5"],
    labels: ["Anusha Parwal", "Mohan Krishna", "Nicholas Kola", "Richard Grey"],
    legend: {
      position: "bottom"
    },
    dataLabels: {
      dropShadow: {
        enabled: false
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#pie-basic"), options);
  chart.render();
</script>
        <!-- INTERNAL APEX PIE CHARTS JS -->
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
<span id="output"></span>
        <!--<script>-->
        <!--    $(document).ready(function (){-->
        <!--        $("#dateForm").on("submit",function (e){-->
        <!--             e.preventDefault();-->
        <!--             $.ajax({-->
        <!--                 type:"post",-->
        <!--                 url:"data/export.php",-->
        <!--                 data:$(this).serialize(),-->
        <!--                 success:function (forr){-->
        <!--                     $("#output").text("").prepend(forr);-->
        <!--                 }-->
        <!--             });-->
        <!--        });-->
        <!--    });-->
        <!--</script>-->

	</body> 
</html>
