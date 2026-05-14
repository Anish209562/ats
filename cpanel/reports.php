<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="KAiZEN  KCC Card community System - Add Client">
        <meta name="Author" content="KAiZEN  KCC Card community System - Add Client">
        <meta name="keywords" content="KAiZEN  KCC Card community System - Add Client">
        
        <!-- TITLE -->
		<title> MERAQUI REPORTS </title>

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
<style>
        body {
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            background-color: #ffffff;
            color: #495057;
            min-height: 100vh;
            padding: 1.5rem 0;
            border-right: 1px solid #e0e0e0;
        }
        .sidebar-item {
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 0.5rem;
            margin: 0.25rem 1rem;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }
        .sidebar-item:hover, .sidebar-item.active {
            background-color: #f0f2f5;
            color: #0d6efd;
        }
        .sidebar-header {
            font-weight: bold;
            color: #6c757d;
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 1rem 1.5rem 0.5rem;
        }
        .count-badge {
            background-color: #e9ecef;
            color: #6c757d;
            font-weight: bold;
            font-size: 0.75rem;
            border-radius: 0.75rem;
            padding: 0.2rem 0.6rem;
        }
        .main-content {
            padding: 2rem;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            overflow-x: auto;
        }
        .report-table {
            background-color: #ffffff;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 1rem;
            overflow: hidden;
        }
        .report-table th, .report-table td {
            padding: 1rem;
            vertical-align: middle;
            border-top: none;
        }
        .report-table thead th {
            background-color: #f8f9fa;
            color: #6c757d;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid #e9ecef;
            cursor: pointer;
        }
        .report-table tbody tr {
            border-bottom: 1px solid #e9ecef;
        }
        .report-table tbody tr:last-child {
            border-bottom: none;
        }
        .report-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .link-icon {
            color: #0d6efd;
            margin-left: 0.5rem;
        }
        .action-icons .fa-solid {
            margin-left: 0.75rem;
            color: #6c757d;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }
        .action-icons .fa-solid:hover {
            color: #dc3545;
        }
        .table-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .table-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .btn-link-sm {
            font-size: 0.8rem;
            text-decoration: none;
            color: #28a745;
        }
        .text-primary {
            color: #0d6efd !important;
        }
        .star-icon {
            color: #ffc107;
            margin-right: 0.5rem;
        }
        .fa-up-down, .fa-trash, .fa-user-group {
            font-size: 1.2rem;
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

            <div class="main-content app-content p-2" style="margin-block-start: 0rem !important;">

                
                <div class="container-fluid">

<style>
    .btn-outline-primary:hover a{
        color: #fff !important;
    }
    .dropdown button{
        opacity: 0 ;
        transition: all 0.9s;
    }
    .sidebar-item:hover .dropdown button{
        opacity: 1;
        transition: all 1.2s;
    }
</style>

 <div class="header-bar">
        <nav aria-label="breadcrumb" class="d-flex justify-content-between">
            <h4><i class="fa fa-home mb-0 mt-0" style="margin-right:10px;"></i>Custom Report</h4>
            <button class="btn btn-primary" type="button" onclick="window.location='index.php'">Go Back</button>
         </nav>
    </div>
        <div class="row">
            <!-- Sidebar -->
            
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky">
                    <div class="sidebar-header">MODULES</div>
                     
                     <ul class="nav flex-column">
                        <li class="sidebar-item active" data-tab-id="job-postings">
                            <span>Job Postings</span>

<div class="dropdown">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"></button>
  <ul class="dropdown-menu">
    <li><a href="reports/jobposting.php?type=4&ok=1" target="_blank" class="dropdown-item">Detailed Report</a></li>
    <li><a href="#" class="dropdown-item">Graph Report</a></li>
  </ul>
</div>
                            <span class="count-badge">6</span>
                        </li>
                        <li class="sidebar-item" data-tab-id="applicants">
                            <span>Applicants</span>
<div class="dropdown">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"></button>
  <ul class="dropdown-menu">
    <li><a href="reports/applicant.php?type=3&ok=1" target="_blank" class="dropdown-item">Detailed Report</a></li>
    <li><a href="#" class="dropdown-item">Graph Report</a></li>
  </ul>
</div>
                            <span class="count-badge">8</span>
                        </li>
                        <li class="sidebar-item" data-tab-id="clients">
                            <span>Clients</span>
<div class="dropdown">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"></button>
  <ul class="dropdown-menu">
    <li><a href="reports/client.php?type=3&ok=1" target="_blank" class="dropdown-item">Detailed Report</a></li>
    <li><a href="#" class="dropdown-item">Graph Report</a></li>
  </ul>
</div>
                            <span class="count-badge">3</span>
                        </li>
                        <li class="sidebar-item" data-tab-id="access-log">
                            <span>Access Log</span>
                            <span class="count-badge">3</span>
                        </li>
                    </ul>   
                </div>
            </nav>


<main class="col-md-9 ms-sm-auto col-lg-10 p-2">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="job-postings" role="tabpanel" aria-labelledby="job-postings-tab">
            <div class="table-container">
                <div class="card p-4">
                    <table class="table report-table">
                        <thead>
                            <tr>
                                <th>REPORT NAME <i class="fas fa-up-down"></i></th>
                                <th>DESCRIPTION <i class="fas fa-up-down"></i></th>
                                <th>MODULE <i class="fas fa-up-down"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="reports/jobposting.php?type=1" target="_blank" class="text-primary text-decoration-none">DAILY_JOB_POSTING_REPORT</a></td>
                                <td>JOB_POSTING (ACTIVE-TODAY)</td>
                                <td>Job Postings</td>
                            </tr>
                            <tr>
                                <td><a href="reports/jobposting.php?type=2" target="_blank" class="text-primary text-decoration-none">Client wise / Status wise</a></td>
                                <td>Client wise / Status wise</td>
                                <td>Job Postings</td>
                            </tr>
                            <tr>
                                <td><a href="reports/jobposting.php?type=3" target="_blank" class="text-primary text-decoration-none">Job Details by Client</a></td>
                                <td>Complete Job Details grouped by Clients</td>
                                <td>Job Postings</td>
                            </tr>
                            <tr>
                                <td><a href="reports/jobposting.php?type=4" target="_blank" class="text-primary text-decoration-none">Active Job - All</a></td>
                                <td>Active Job</td>
                                <td>Job Postings</td>
                            </tr>
                             <tr>
                                <td><a href="reports/jobposting.php?type=33" target="_blank" class="text-primary text-decoration-none">Active Job With All Status</a></td>
                                <td>Active Job - All Status</td>
                                <td>Job Postings</td>
                            </tr>
                            <tr>
                                <td><a href="reports/jobposting.php?type=5" target="_blank" class="text-primary text-decoration-none">Job Count by Status</a></td>
                                <td>Job Count by status - Summary Report</td>
                                <td>Job Postings</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="applicants" role="tabpanel" aria-labelledby="applicants-tab">
         
         <div class="table-container">
                <div class="card p-4">
                    <table class="table report-table">
                        <thead>
                            <tr>
                                <th>REPORT NAME <i class="fas fa-up-down"></i></th>
                                <th>DESCRIPTION <i class="fas fa-up-down"></i></th>
                                <th>MODULE <i class="fas fa-up-down"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="reports/applicant.php?type=1" target="_blank" class="text-primary text-decoration-none">Preselection - Status wise</a></td>
                                <td>Preselection - Status wise</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=9" target="_blank" class="text-primary text-decoration-none">Recruiter wise sub/pipeline</a></td>
                                <td>Recruiter wise sub/pipeline</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=5" target="_blank" class="text-primary text-decoration-none">Applicants - Notes/Tasks/Messages Counts</a></td>
                                <td>Applicants - Notes/Tasks/Messages Counts</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=6" target="_blank" class="text-primary text-decoration-none">Applicant Status Counts</a></td>
                                <td>Applicant Status Counts</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=7" target="_blank" class="text-primary text-decoration-none">Applicant Statistics - By User</a></td>
                                <td>Applicant Statistics - By User</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=2" target="_blank" class="text-primary text-decoration-none">Applicant Details - By User/Source</a></td>
                                <td>Applicant Details - By User/Source</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=8" target="_blank" class="text-primary text-decoration-none">Applicant Details -Source</a></td>
                                <td>Applicant Details Source</td>
                                <td>Applicants</td>
                            </tr>
                            <tr>
                                <td><a href="reports/applicant.php?type=3" target="_blank" class="text-primary text-decoration-none">Applicant Details</a></td>
                                <td>Applicant Details</td>
                                <td>Applicants</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="clients" role="tabpanel" aria-labelledby="clients-tab">
                        <div class="table-container">
                <div class="card p-4">
                    <table class="table report-table">
                        <thead>
                            <tr>
                                <th>REPORT NAME <i class="fas fa-up-down"></i></th>
                                <th>DESCRIPTION <i class="fas fa-up-down"></i></th>
                                <th>MODULE <i class="fas fa-up-down"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="reports/client.php?type=1" target="_blank" class="text-primary text-decoration-none">Clients by Primary Owner</a></td>
                                <td>Clients data grouped by Primary owner and created this year. It will show the total number of Contacts as a column</td>
                                <td>Client</td>
                            </tr>
                            <tr>
                                <td><a href="reports/client.php?type=2" target="_blank" class="text-primary text-decoration-none">Active Clients - # of Contacts/# of Notes</a></td>
                                <td>This report shows the active clients with number of Contacts and # of Notes count.</td>
                                <td>Client</td>
                            </tr>
                            <tr>
                                <td><a href="reports/client.php?type=3" target="_blank" class="text-primary text-decoration-none">Clients - All Records</a></td>
                                <td>Clients report loads all clients data with full information</td>
                                <td>Client</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <div class="tab-pane fade" id="access-log" role="tabpanel" aria-labelledby="access-log-tab">
                                    <div class="table-container">
                <div class="card p-4">
                    <table class="table report-table">
                        <thead>
                            <tr>
                                <th>REPORT NAME <i class="fas fa-up-down"></i></th>
                                <th>DESCRIPTION <i class="fas fa-up-down"></i></th>
                                <th>MODULE <i class="fas fa-up-down"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="reports/access.php?type=1" target="_blank" class="text-primary text-decoration-none">User Login Report</a></td>
                                <td>The user Login report shows the login counts of each user for the all.</td>
                                <td>Access Log</td>
                            </tr>
                            <tr>
                                <td><a href="reports/access.php?type=2" target="_blank" class="text-primary text-decoration-none">Hourly User Access log</a></td>
                                <td>This report shows hourly user activity in the application including Login, Logout etc.- Default time frame is Today.</td>
                                <td>Access Log</td>
                            </tr>
                            <tr>
                                <td><a href="reports/access.php?type=3" target="_blank" class="text-primary text-decoration-none">Access Log Report </a></td>
                                <td>This report shows all the activities done by the users in the application.</td>
                                <td>Access Log</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="interviews" role="tabpanel" aria-labelledby="interviews-tab">
            <div class="card p-4">
                <h2>Interviews Content</h2>
                <p>Content for Interviews module goes here.</p>
            </div>
        </div>
    </div>

</main>        

</div>
 
</div>


</div> 
 </div>

          
            </div> 

            <?php include 'footer.php';  ?>

		</div>
       
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="build/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>
      
        <script> 
         document.addEventListener('DOMContentLoaded', () => {
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            const tabPanes = document.querySelectorAll('.tab-pane');

            sidebarItems.forEach(item => {
                item.addEventListener('click', (event) => {
                    sidebarItems.forEach(i => i.classList.remove('active'));

                    item.classList.add('active');

                    const targetId = item.dataset.tabId;
                    tabPanes.forEach(pane => {pane.classList.remove('active'),pane.classList.remove('show')});
                    const targetPane = document.getElementById(targetId);
                    if (targetPane) {
                        targetPane.classList.add('active');
                        targetPane.classList.add('show');
                        
                    }
                });
            });
        });

  new DataTable('.example', {
    lengthChange: false,
    searching:false,
    ordering:false
});


        </script>

	</body> 
</html>
