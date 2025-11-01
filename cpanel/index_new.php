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
</style>

	</head>

	<body>


<style>
            
        .text-primary, .nav-link, .btn-link, .dropdown-item {
            color: var(--menu-bg) !important;
        }

        /* Style for the custom checkbox */
        .form-check-input:checked {
            background-color: var(--menu-bg);
            border-color: var(--menu-bg);
        }

        /* Remove borders from cards */
        .card {
            border-radius: 0.5rem;
        }

        /* Custom scrollbar for table container */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #a1a1a1;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /* new css */
        .dbHeadB {
    float: left;
    width: 100%;
    margin-top: 5px;
    margin-bottom: 10px;
}
.dbHeadActB {
    border-bottom: solid 1px #a4c4dd;
    padding-bottom: 15px;
    margin-bottom: 10px;
    float: left;
    width: 100%;
}
.dbQuickLinks {
    float: left;
    width: 100%;
    padding-top: 5px;
}
.dbQuickLinks {
    position: relative;
    padding-right: 200px;
}
.dbHeadActLeft {
    float: left;
    display: flex
;
}
</style>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">COMPANY STATS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            <!-- Date Range Dropdown -->
            <div class="mb-4">
                <select class="form-select">
                    <option selected>Today</option>
                    <option>Yesterday</option>
                    <option>This Week</option>
                    <option>Last Week</option>
                    <option>This Month</option>
                    <option>Last Month</option>
                </select>
            </div>

            <!-- Stats Boxes Grid -->
            <div class="row row-cols-2 g-3">
                <div class="col">
                    <div class="stats-box bg-light-blue">Total Jobs (<span class="count">1</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-yellow">Active Jobs (<span class="count">1</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Hold Jobs (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Filled Jobs (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-green">Inactive Jobs (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Closed Jobs (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-green">Active Placements (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Inactive Placements (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Offer Sent (<span class="count">1</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-green">Offer Accepted (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Offer Rejected (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-blue">Sources (<span class="count">110</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-blue">Pipeline (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-blue">Interview Schedule (<span class="count">16</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-red">Interview Rejects (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-yellow">Waiting for Evaluation (<span class="count">34</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-green">Submissions (<span class="count">39</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-yellow">Jobs with Submissions (<span class="count">1</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-blue">Jobs without Submission (<span class="count">0</span>)</div>
                </div>
                <div class="col">
                    <div class="stats-box bg-light-blue">Aging (<span class="count">0</span>)</div>
                </div>
            </div>
        </div>
    </div>

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
                   
<div class="dbHeadB">
    <div class="dbHeadActB">
        <div class="dbHeadActLeft">
            <div class="dbHIcon"><i class="fas fa-tachometer-alt"></i></div>
            <div class="dbHInfo">
                <div class="dbSTitle">Dashboard</div>
                <div class="dbMTitle">India Delivery Report</div>
            </div>
        </div>
        <div class="dbHeadActRight">
            <div class="dropdown dbDropBtn">
                <button class="dropdown-toggle dashboard_list_btn" type="button" data-toggle="dropdown"><span id="dashboard_list_display">India Delivery ...</span> <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0);" class="dashboard_list" id="dashboard_list1" data-id="1">Recruiter Dashboard</a></li>
                    <li><a href="javascript:void(0);" class="dashboard_list" id="dashboard_list2" data-id="2">Account Manager</a></li>
                    <li><a href="javascript:void(0);" class="dashboard_list" id="dashboard_list3" data-id="3">Executive Dashboard</a></li>
                    <li><a href="javascript:void(0);" class="dashboard_list" id="dashboard_list5000" data-id="5000">India Delivery Report</a></li>
                    <li><a href="javascript:void(0);" class="dashboard_list" id="dashboard_list5003" data-id="5003">COO dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="dbQuickLinks">
        <ul class="quick_link_list">
            <li class="favorites-links"><i class="fas fa-star"></i></li>
            <ul>
                <li><a href="/job_postings/add_job_post">Create Job</a></li>
                <li></li>
                <li><a href="/job_templates">Create Job Template</a></li>
                <li></li>
                <li><a href="/applicant_profiles/add_applicant">Create an Applicant</a></li>
                <li></li>
                <li><a href="javascript:void(0);" class="get_access_token">Setup</a></li>
            </ul>
        </ul>
        <label style="font-size: 13px; color: #666; margin-top: 0; width: auto; position: absolute; right: 0; top: 0;">
            <input type="checkbox" style="float: left; margin-top: 0; margin-right: 5px;" name="make_default_dashboard" id="make_default_dashboard" value="5000" checked="" />Make as Default Dashboard
        </label>
    </div>
</div>


    <!-- Main Content Area -->
    <div class="container-fluid my-4">
        
        <div class="row">
            <!-- Daily Recruiter Wise - Overall Submissions -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center border-0 p-3">
                        <h5 class="mb-0">Daily Recruiter Wise - Overall Submissions</h5>
                        <button class="btn btn-primary btn-sm">Today</button>
                    </div>
                    <div class="card-body p-3">
                        <table class="table table-borderless table-sm mb-0">
                            <thead>
                                <tr class="text-muted">
                                    <th>Submitted By</th>
                                    <th class="text-end">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Anju Bharti</td>
                                    <td class="text-end text-primary">3</td>
                                </tr>
                                <tr>
                                    <td>Bhavani G</td>
                                    <td class="text-end text-primary">2</td>
                                </tr>
                                <tr>
                                    <td>Divya Jyothi K</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr>
                                    <td>Jagannath S</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr>
                                    <td>Kajal Kumari</td>
                                    <td class="text-end text-primary">2</td>
                                </tr>
                                <tr>
                                    <td>Madhu Ram</td>
                                    <td class="text-end text-primary">2</td>
                                </tr>
                                <tr>
                                    <td>Manvi Panshetti</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr>
                                    <td>Manikandan</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr>
                                    <td>Manjushath V</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr>
                                    <td>Mounika Depuri</td>
                                    <td class="text-end text-primary">3</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Total</td>
                                    <td class="text-end">17</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Daily Recruiter Wise - Submitted To Client Only -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center border-0 p-3">
                        <h5 class="mb-0">Daily Recruiter Wise - Submitted To Client Only</h5>
                        <button class="btn btn-primary btn-sm">Today</button>
                    </div>
                    <div class="card-body p-3">
                        <table class="table table-borderless table-sm mb-0">
                            <thead>
                                <tr class="text-muted">
                                    <th>Submitted By</th>
                                    <th class="text-end">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mounika Depuri</td>
                                    <td class="text-end text-primary">2</td>
                                </tr>
                                <tr>
                                    <td>Nazuya Perveen</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr>
                                    <td>Poopi G</td>
                                    <td class="text-end text-primary">1</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Total</td>
                                    <td class="text-end">4</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3 text-muted">Showing the 3 of 3 entries</div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-outline-secondary btn-sm me-1 rounded-circle">&lt;</button>
                            <span class="btn btn-primary btn-sm text-white">1</span>
                            <button class="btn btn-outline-secondary btn-sm ms-1 rounded-circle">&gt;</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Client Submissions - Status Wise Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center border-0 p-3">
                <h5 class="mb-0">Daily Client Submissions - Status Wise</h5>
                <button class="btn btn-primary btn-sm">Today</button>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-muted fw-normal">Client Name</th>
                                <th class="text-muted fw-normal">SUBMITTED TO CLIENT</th>
                                <th class="text-muted fw-normal">ASSIGNED TO PRESELECTION TEAM</th>
                                <th class="text-muted fw-normal">SUBMITTED TO ATS</th>
                                <th class="text-muted fw-normal">DUPLICATE</th>
                                <th class="text-muted fw-normal">DROP</th>
                                <th class="text-muted fw-normal">HOLD BY CLIENT</th>
                                <th class="text-muted fw-normal">FIRSTMILE PANEL REJECT</th>
                                <th class="text-muted fw-normal">CLIENT SCREEN REJECT</th>
                                <th class="text-muted fw-normal">INTERNAL SCREEN REJECT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ACI, Digitas</td>
                                <td><a href="#" class="text-primary text-decoration-none">2</a></td>
                                <td><a href="#" class="text-primary text-decoration-none">3</a></td>
                                <td><a href="#" class="text-primary text-decoration-none">6</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Bajaj Housing Finance Limited</td>
                                <td>0</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">1</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Infosys</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">2</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>ITC Infotech</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">2</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>JNK India</td>
                                <td>0</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">2</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Kyndryl</td>
                                <td>0</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">2</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Moody's</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">4</a></td>
                                <td><a href="#" class="text-primary text-decoration-none">8</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>TCS Adcbe</td>
                                <td>0</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">1</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Varuna.Net</td>
                                <td><a href="#" class="text-primary text-decoration-none">2</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><a href="#" class="text-primary text-decoration-none">3</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Total</td>
                                <td>4</td>
                                <td>9</td>
                                <td>22</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
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
      { value: 108, name: 'Waiting for Evaluation', itemStyle: { color: '#85d3f2' } },
      { value: 99, name: 'Offer Sent', itemStyle: { color: '#3e70dd' } },
      { value: 89, name: 'Submitted To Client', itemStyle: { color: '#9c7ae9' } },
      { value: 78, name: 'Not Joined', itemStyle: { color: '#f083ab' } },
      { value: 76, name: 'L1 Interview', itemStyle: { color: '#e0714c' } },
      { value: 64, name: 'Client Interview', itemStyle: { color: '#f4c663' } },
      { value: 42, name: 'L1 Selected', itemStyle: { color: '#f7e463' } },
      { value: 38, name: 'Vendor Interview', itemStyle: { color: '#63d986' } },
      { value: 12, name: 'Placed', itemStyle: { color: '#42c788' } },
      { value: 7, name: 'L3 Interview', itemStyle: { color: '#7bd8ea' } },
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
