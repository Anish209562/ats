<?php include("session.php"); 

function okay(){
header("Location :jobposting.php");
exit;
}

if($_GET['sid']!=''){
$sid=$_GET['sid'];
$s=mysqli_query($host,"select * from job where id='$sid'");
if(mysqli_num_rows($s)==1){
$ds=mysqli_fetch_array($s);
}
else{
okay();
}
}
else{
okay();
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
		<title> <?php echo $ds['job_code'];?> - Job Posting </title>

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
 

<style>
    .pickr .pcr-button {
    height: 4em !important;
    width: 4em !important;
    }
    #newoutputs3 td p{
        margin-bottom:0px !important;
    }
    .form-control , .form-select{
        background-color: #eeeeeed6 !important;
        padding:.475rem .75rem !important;
    }
    
    .tab-content .tab-pane {
     padding: 0px !important; 
     border: none !important;
    }
    .p-sm-3 {
        padding-bottom: 0px !important;
    }
    .form-label {
    margin-top: 5px;
}
#reminder .card.custom-card {
    margin-bottom: 0px !important;
}
#reminder .card.custom-card .card-body {
    padding: 8px 15px !important;
    margin: 12px 0px !important;
}
.nav-tabs-header .nav-item .nav-link.active {
    background: var(--primary-color) !important;
    color: #fff !important;
}
.form-check-input, .form-check-input:focus {
    border: 1px solid var(--menu-bg) !important;
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

             <style>
i.bi{
    margin-top: -2px;
    float: left;
    padding-right: 6px;
    
}

    .nav-tabs {
      border: none;
      background-color: #f5f8fb;
    }

    .nav-tabs .nav-link {
      color: #555;
      font-size: 14px;
      position: relative;
      border: none;
      background-color: transparent;
      margin-right: 10px;
    }

    .nav-tabs .nav-link.active {
      color: #007bff;
      font-weight: 500;
      background-color: #f3f8fb;
    }



    .tab-content {
      border-top: none;
      background: none !important;
    }
.card-header{
    background: #fff !important;
}
    .word {
      background-color: #eac6e1;
      width: 50px;
      height: 50px;
      display: flex; /* Use flexbox for centering */
      align-items: center; /* Center vertically */
      justify-content: center; /* Center horizontally */
      color: white;
      font-size: 22px;
      font-weight: bold;
      border-radius: 50%; /* Changed to 50% for a perfect circle */
    }

    p {
      margin: 0;
    }
 /* Align star ratings */
    .star-rating i {
      color: orange; /* Example color for stars */
      margin-right: 2px;
    }

    /* Style for buttons within the snapshot section */
    .snapshot-buttons button {
      margin-right: 10px;
      margin-bottom: 10px; /* Add some space below buttons */
      padding: 8px 15px;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    .snapshot-buttons button:hover {
      opacity: 0.9;
    }

    /* Tag styling */
    .tag-bubble {
      display: inline-flex;
      align-items: center;
         padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
      margin-right: 10px;
    }

    .tag-bubble.bg-primary {
           color:var(--custom-white) !important;

    }

    .tag-bubble.secondary {
      background-color: #e8e8e8;
      color: var(--default-text-color) !important;
    }

    .tag-bubble .count {
      background-color: white;
      color: black;
      border-radius: 10px;
      padding: 2px 8px;
      margin-left: 5px;
      font-weight: bold;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table thead th {
        border-top: 1px solid #313649;
    border-bottom: 1px solid #313649;
    color: #313649;

    }
    .card.custom-card{
        background:none !important;
    }
    .section-container{
        background-color: #fff !important;
        margin-bottom:20px;
        padding: 15px;
    }
     .border-right {
    border-right: 1px solid #dee2e6;
    margin-top: 15px;
  }
  
                    </style>
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header d-sm-flex d-block" style="background-color:#fff !important;">
                                    
                                    <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                                        <li class="nav-item">
      <a class="nav-link active" id="snapshot-tab" data-bs-toggle="tab" href="#snapshot" role="tab" aria-controls="snapshot" aria-selected="true">Snapshot</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Job Details</a>
    </li>
    <!--<li class="nav-item">-->
    <!--  <a class="nav-link" id="activities-tab" data-bs-toggle="tab" href="#employer" role="tab" aria-controls="employer" aria-selected="false">Additional Details</a>-->
    <!--</li>-->
    <li class="nav-item">
      <a class="nav-link" id="profession-tab" data-bs-toggle="tab" href="#profession" role="tab" aria-controls="profession" aria-selected="false">Task Manager</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="employer-tab" data-bs-toggle="tab" href="#activities" role="tab" aria-controls="activities" aria-selected="false">Activities</a>
    </li>
    <!--<li class="nav-item">-->
    <!--  <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email Merges</a>-->
    <!--</li>-->
   
                                    </ul>
                                    
                                    
                               
                                </div>
                                
                                 <form method="post" id="allForm" enctype="multipart/form-data" style="margin-top:20px;">
  <div class="row">
      <div class="col-xl-8 col-lg-8">
   
          <div class="section-container">
            <div class="row mb-3">
              <div class="col-auto">
                 <i class="fa fa-arrow-left"></i>
              </div>
              <div class="col">
                <h5><?php echo $ds['job_code'];?> - <?php echo $ds['job_title'];?></h5>
                 <button class="btn btn-primary" style="float:right;"><a href="applicant.php?jid=<?php echo $ds['id'];?>" class="text-white">Add Applicant</a></button>
                <h6 class="text-muted"><a href="client_view.php?sid=<?php echo $ds['cid'];?>"> <i class="fa fa-pulse"></i> <?php echo $ds['client'];?></a> | <i class="fa fa-map-marker"></i>
                <?php $add = explode(";", $ds['address']); ?>
<span class="text-primary" style="cursor: pointer;" data-bs-toggle="tooltip" title='<?php echo htmlspecialchars(json_encode($add), ENT_QUOTES, 'UTF-8'); ?>'>
    <?php echo htmlspecialchars($add[0], ENT_QUOTES, 'UTF-8') . "..."; ?>
</span>

                </h6>
               <button class="btn btn-sm btn-outline-myself" type="button" onclick="window.location='jobposting.php?aid=<?php echo $sid;?>'">Edit Job</button>
    
<div class="row border-top">

    <!-- Recruitment Manager -->
    <div class="col-md border-right py-2">
      <small class="text-muted d-block">Recruitment Manager</small>
      <strong><?php echo $ds['recrutment'] ? $ds['recrutment'] : 'N/A';?></strong>
    </div>

    <!-- Client Bill Rate / Salary -->
    <div class="col-md border-right py-2">
      <small class="text-muted d-block">
        Client Bill Rate / Salary 
        <i class="fa fa-question-circle text-primary" data-bs-toggle="tooltip" title="Amount offered by Client"></i>
      </small>
      <strong><?php echo $ds['bill_type'] ? $ds['bill_type']."/".$ds['rate']."/".$ds['bill_time'] : 'N/A';?></strong>
    </div>

    <!-- Pay Rate / Salary -->
    <div class="col-md border-right py-2">
      <small class="text-muted d-block">
        Pay Rate / Salary 
        <i class="fa fa-question-circle text-primary" data-bs-toggle="tooltip" title="Amount offered to the consultant"></i>
      </small>
      <strong><?php echo $ds['salary_type'] ? $ds['salary_type']."/".$ds['salary_min']."-".$ds['salary_max']."/".$ds['salary_time'] : 'N/A';?></strong>
    </div>

    <!-- Created By & On -->
    <div class="col-md py-2" style="margin-top:15px;">
      <small class="text-muted d-block">Created By & On</small>
      <div><strong><?php echo $ds['createname'];?></strong></div>
      <div class="text-muted">On <?php echo date('d M,Y',strtotime($ds['date']));?></div>
    </div>
  </div>    
       
                <div class="snapshot-buttons mt-3">
                    <strong>Job Description</strong><br/>
                    <div class="text-muted">
                        <?php echo $ds['job_desc'] ? $ds['job_desc'] : 'N/A';?>
                    </div>
                </div>
              </div>
            </div>
          </div>

   
     <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="snapshot" role="tabpanel" aria-labelledby="snapshot-tab">

          <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
              <h5>Submissions</h5>

                 <div class="input-group" style="max-width: 300px;">
                       <input type="text" class="form-control" placeholder="Search...">
                       <span class="input-group-text bg-primary"><i class="fa fa-search text-white"></i></span>
                   </div>

            </div>
            <div class="d-flex flex-wrap">
                <span class="tag-bubble secondary mb-2">Pipeline <span class="count">0</span></span>
                <span class="tag-bubble bg-primary mb-2">All <span class="count">1</span></span>
                <span class="tag-bubble secondary mb-2">Client Submissions <span class="count">0</span></span>
                <span class="tag-bubble secondary mb-2">Interviews <span class="count">0</span></span>
                <span class="tag-bubble secondary mb-2">Confirmations <span class="count">0</span></span>
                <span class="tag-bubble secondary mb-2">Placements <span class="count">0</span></span>
                <span class="tag-bubble secondary mb-2">Not Joined <span class="count">0</span></span>
              </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                              <tr class="sticky-row">
                            	<th >Name</th>
                                <th >Submitted by/ON</th>
                                <th >Contact/Location</th>
                                <th >Pay Rate/Work Auth</th>
                                <th >Status</th>
                            </tr>
                </thead>
                <tbody>
                  <tr>
                     <td colspan="5" class="text-center text-muted">No data available</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
             <div class="d-flex" style="gap:20px;">
              <h5>Notes</h5>
              <div>
                <span class="tag-bubble bg-primary">Job Posting <span class="count">0</span></span>
                <span class="tag-bubble secondary">Applicant Reference<span class="count">0</span></span>
              </div>
            </div>
              <div>
                <button class="btn btn-light me-2"><i class="fa fa-filter" aria-hidden="true"></i></button>
                <button class="btn btn-primary">+ Add</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ADDED BY/ON</th>
                    <th scope="col">NOTES/DESCRIPTION</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="3" class="text-center text-muted">No data available</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

                  <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Documents</h5>
              <div>
                <!--<button class="btn btn-light me-2"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>-->
                <!--<button class="btn btn-light me-2"><i class="fa fa-share-alt" aria-hidden="true"></i></button>-->
                <!--<button class="btn btn-light me-2"><i class="fa fa-download" aria-hidden="true"></i></button>-->
                <button class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
              </div>
            </div>
            <p class="text-center">No Data available</p>
          </div>
       
               
    </div>
<style>
    #personal .row .col-md-4 p{
        color:#979797 !important;
    }
    #personal .row .col-md-4 h6{
            font-size: 13px;
    }
</style>
    <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
 <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Job Details</h5>
              <i class="fa fa-pencil"></i>
            </div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <p>Placement Fee Percentage</p>
      <h6>
          
      </h6>
    </div>
    
    <div class="col-md-4">
      <p>Pricing Model</p>
      <h6>N/A</h6>
    </div>
    
      <div class="col-md-4">
      <p>TVOP</p>
      <h6>N/A</h6>
    </div>
    
    <div class="col-md-4">
      <p>Job Start Date</p>
      <h6><?php echo date('d M Y',strtotime($ds['start_job']));?></h6>
    </div>
    
      <div class="col-md-4">
      <p>Job End Date</p>
      <h6><?php echo date('d M Y',strtotime($ds['end_job']));?></h6>
    </div>
    
     <div class="col-md-4">
      <p>Required Documents</p>
      <h6><?php echo $ds['document'];?></h6>
    </div>
  
    <div class="col-md-4">
      <p>Remote Job</p>
      <h6><?php echo $ds['remove'];?></h6>
    </div>


    <div class="col-md-4">
      <p>Required Hours/Week</p>
      <h6><?php echo $ds['hours'];?></h6>
    </div>

<div class="col-md-4">
      <p>Turnaround Time</p>
      <h6>0.00</h6>
    </div>


    <div class="col-md-4">
      <p>Additional Details</p>
      <h6>N/A</h6>
    </div>
    
        <div class="col-md-4">
      <p>Application Form</p>
      <h6>N/A</h6>
    </div>
    <div class="col-md-4">
      <p>Respond By</p>
      <h6>N/A</h6>
    </div>
   
    <div class="col-md-4">
      <p>Expenses Paid</p>
      <h6><?php echo $ds['expense'];?></h6>
    </div>
    
    
    <div class="col-md-4">
      <p>Client</p>
      <h6><?php echo $ds['client'];?></h6>
    </div>
    
    
    <div class="col-md-4">
      <p>Client Manager</p>
      <h6>No</h6>
    </div>
    
    <div class="col-md-4">
      <p>Priority</p>
      <h6><?php echo $ds['priority'];?></h6>
    </div>
    
    
    <div class="col-md-4">
      <p>Client Job ID</p>
      <h6>Pramod HD</h6>
    </div>
    
     <div class="col-md-4">
      <p>Client Category</p>
      <h6>N/A</h6>
    </div>

   <div class="col-md-4">
      <p>CEIPAL Ref #</p>
      <h6>N/A - / N/A</h6>
    </div>
 
  <div class="col-md-4">
      <p>Interview Mode</p>
      <h6>N/A</h6>
    </div>
 
  <div class="col-md-4">
      <p>Address</p>
      <h6>N/A</h6>
    </div>
    
    
    <div class="col-md-4">
      <p>Post Job on Career Portal</p>
      <h6>N/A</h6>
    </div>
    <div class="col-md-4">
      <p>Job Type</p>
      <h6>N/A</h6>
    </div>
    
     
    <div class="col-md-4">
      <p>Post Job on Career Portal</p>
      <h6>N/A</h6>
    </div>
 
 <div class="col-md-4">
      <p>Display Contact Details on Career Portal</p>
      <h6>N/A</h6>
    </div>
  
    
    <div class="col-md-4">
      <p>Domain</p>
      <h6>N/A</h6>
    </div>

    <div class="col-md-4">
      <p>Notice Period</p>
      <h6><?php echo $ds['notice'];?></h6>
    </div>   
 
    <div class="col-md-4">
      <p>Project Type</p>
      <h6>N/A</h6>
    </div>
  
 <div class="col-md-4">
      <p>Job Category</p>
      <h6>Naudiyal</h6>
    </div>
    
     <div class="col-md-4">
      <p>PW Published Status</p>
      <h6>N/A</h6>
    </div>

 
  </div>
</div>


          </div>

  </div>
    
    <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
             <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Activities</h5>
               <div>
               
                <select class="form-control"><option value="" hidden="">Select</option><option selected="">Last 6 Months</option><option>Older than 6 Months</option></select>
              </div>
            </div>
            <div class="table-responsive row">
              <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 15%;">DATE & TIME</th>
      <th scope="col">DESCRIPTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>07/12/24 11:43:37</td>
      <td>Applicant Himanshu Naudiyal has been removed as a submission for the job (JPC - 570 - Oracle Apex Developer) by Raghavendra Aithal from ApplicantProfiles_submit_jobs</td>
    </tr>
    <tr>
      <td>04/25/24 17:35:26</td>
      <td>Uploaded a new resume (Naukri_HimanshuNaudiyal[11y_0m].docx) to submit for the job Engineering lead.</td>
    </tr>
    <tr>
      <td>04/25/24 17:34:13</td>
      <td>Uploaded a new resume (Naukri_HimanshuNaudiyal[11y_0m].docx) to submit for the job Engineering lead.</td>
    </tr>
    <tr>
      <td>04/25/24 17:33:37</td>
      <td>Applicant Himanshu Naudiyal has been removed as a submission for the job (JPC - 118 - PAM CyberArk Implementation Managers) by Naveen Kumar from ApplicantProfiles_submit_jobs</td>
    </tr>
    <tr>
      <td>02/06/24 11:44:11</td>
      <td>Submission status has been changed from Waiting</td>
    </tr>
    <tr>
      <td>01/16/24 13:39:55</td>
      <td>Applicant has been submitted to JPC - 150 - SDET - API & UI Automation with SIT By Samhitha P</td>
    </tr>
    <tr>
      <td>01/16/24 13:38:57</td>
      <td>Uploaded a new resume (Naukri_HimanshuNaudiyal[11y_0m].docx) to submit for the job SDET - API & UI Automation with SIT.</td>
    </tr>
    <tr>
      <td>01/16/24 13:37:00</td>
      <td>Applicant profile is created by Samhitha P and the Document is added from Bulk Parsing.</td>
    </tr>
  </tbody>
</table>


</div>
</div>
    </div>

    <div class="tab-pane fade" id="profession" role="tabpanel" aria-labelledby="profession-tab">

           <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Task Manager</h5>
               <div>
                <button class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
              </div>
            </div>
            <div class="table-responsive row">
              <table class="table">
  <thead>
                            <tr>                                     
                                <th class="col">Task Name</th>
                                <th class="col">Due Date</th>
                                <th class="col">Time Zone</th>
                                <th class="col">Assigned to</th>
                                <th class="col">Assigned By</th>
                                <th class="col">Created on</th>
                                <th class="col">Modified</th>
                                <th class="col">Status Modified on</th>
                                <th class="col">Status</th>
                            </tr>
  </thead>
  <tbody>
   <td colspan="9" class="text-center text-muted">No data available</td>
  </tbody>
</table>


</div>
</div>

     
     
    </div>
    <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
      
      
      <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <p>No Data available.</p>
            </div>
    </div>
      
    </div>
    <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
      <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Email Merge</h5>
            </div>
            <div class="table-responsive row">
              <table class="table">
  <thead>
                             <tr>
                                <th>Sent By/On</th>
                                <th>Sent To</th>
                                <th>Search String</th>
                                <th>Zip Location</th>
                                <th>Subject</th>
                                <th>Email Details</th> 
                            </tr>
  </thead>
  <tbody>
   <td colspan="6" class="text-center text-muted">No data available</td>
  </tbody>
</table>


</div>
</div>
    
    </div>
    
  </div>

   
          
      </div>
<div class="col-xl-4 col-lg-4">
  <div class="section-container border p-3 rounded bg-white">
    <h5 class="text-primary mb-1 border-bottom pb-1">Search Criteria</h5>

    <!-- Keywords -->
    <div class="form-group mb-2">
      <textarea class="form-control" id="keywords" rows="4" placeholder="Enter keywords..."></textarea>
    </div>

    <!-- Job Title -->
    <div class="form-group">
      <input type="text" class="form-control" id="jobTitle" placeholder="e.g. App security" value="<?php echo $ds['job_title']?>"/>
    </div>

    <!-- Location Details -->
    <h6 class="mt-3 font-weight-bold fs-14 text-primary">LOCATION DETAILS</h6>

    <div class="form-group">
      <label for="country">Country</label>
      <select class="form-control" id="country">
         <?php
         $country=$ds['country'];
                                  $ss=mysqli_query($host,"select country from state where sub_domain='$subdomain' group by country order by country asc");
                                  while($dd=mysqli_fetch_array($ss)){
                                  ?>
                                  <option value="<?php echo $dd[0];?>" <?php if($ds['country']==$dd[0]){echo 'selected';}?>><?php echo $dd[0];?></option>
                                  <?php
                                  }
                                  ?>
      </select>
    </div>

    <div class="form-group">
      <label for="state">State</label>
       <div class="dropdown dropdown-wrapper w-100">
   <?php
      $multpkestate=$ds['state'];
      $selectedStates = array_map('trim', explode(",", $multpkestate)); // convert to array
      
      $ss = mysqli_query($host, "SELECT state FROM state WHERE sub_domain='$subdomain' AND country='$country' GROUP BY state ORDER BY state ASC");
      $rr=mysqli_num_rows($ss);
   ?>
    <input type="text" class="form-control dropdown-toggle" value="<?php echo count($selectedStates)." of $rr selected";?>" placeholder="Select States" readonly data-bs-toggle="dropdown" data-bs-auto-close="false" />

    <ul class="dropdown-menu w-100" style="max-height:300px; overflow-y:auto;">
      <li class="dropdown-item">
        <input type="text" class="form-control form-control-sm search-box" placeholder="Search state..." />
      </li>
      <li class="dropdown-item">
        <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
      </li>

      <?php
      while ($dd = mysqli_fetch_array($ss)) {
        $state = htmlspecialchars($dd[0], ENT_QUOTES);
        $stateUpper = strtoupper($state);
        
        $isChecked = in_array($dd[0], $selectedStates) ? 'checked' : '';
      ?>
        <li class="dropdown-item">
          <label>
            <input type="checkbox" name="state[]" value="<?php echo $state; ?>"   data-name="<?= $stateUpper ?>" class="dropdown-check" <?php echo $isChecked;?>/><?= $stateUpper ?>
          </label>
        </li>
      <?php } ?>
    </ul>
  </div>

    </div>

  <style>
      .experience-group {
  margin-bottom: 1rem;
  font-family: Arial, sans-serif;
}

.exp-label {
  display: block;
  font-weight: bold;
  margin-bottom: 6px;
  color: #111c43;
}

.exp-wrapper {
  display: flex;
  gap: 10px;
  align-items: center;
}

.exp-box {
  display: flex;
  align-items: center;
  height: 38px;
  overflow: hidden;
}

.exp-input {
  border: none;
  outline: none;
  padding: 6px 10px;
  font-size: 14px;
  flex: 1;
  background: transparent;
}

.exp-input::placeholder {
  color: #999;
}

.exp-text {
  background: #f8f9fa;
  padding: 0 8px;
  font-size: 12px;
  white-space: nowrap;
      height: 100%;
    align-content: center;
}
.exp-input::-webkit-outer-spin-button,
.exp-input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.exp-input[type=number] {
  -moz-appearance: textfield; /* Firefox */
}

  </style>
<div class="experience-group">
  <label class="exp-label">Years Experience</label>
  <div class="exp-wrapper">

    <!-- Min to -->
    <div class="exp-box">
      <input type="number" class="exp-input form-control" placeholder="Min" value="<?php echo $ds['min_exp'];?>"/>
      <span class="exp-text">to</span>
    </div>

    <!-- Max years -->
    <div class="exp-box">
      <input type="number" class="exp-input form-control" placeholder="Max"  value="<?php echo $ds['min_exp'];?>"/>
      <span class="exp-text">years</span>
    </div>

  </div>
</div>

    <div class="form-group">
      <label for="education">Educational Details</label>
                     <div class="dropdown dropdown-wrapper"> 
      <?php
    $educationLevels = ['Associate Degree', 'Bachelors Degree', 'Highschool', 'Masters Degree', 'Below 10th', 'Undergraduate'];
    $total=count($educationLevels);
    ?>
     <input type="text" <?php if($count){echo "value='$count of $total selected'";}?> class="form-control dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly="" placeholder="Education Details"/> 
   
    <ul class="dropdown-menu"> 
   
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
    for($i=0;$i<count($educationLevels);$i++){
         $feature_name=$educationLevels[$i];
         //$kkk = in_array($feature_name, $selected_features3) ? 'checked' : '';
     ?>
        <li class="dropdown-item">
            <label for="degree<?php echo $i;?>"> 
            <input type="checkbox"  for="degree<?php echo $i;?>" name="degree[]" value="<?php echo $educationLevels[$i];?>" data-name="<?php echo strtoupper($educationLevels[$i]); ?>" class="dropdown-check" <?php echo $kkk;?> /> <?php echo strtoupper($educationLevels[$i]);?> 
            </label>
        </li>
    <?php } ?>
      </ul>
        </div>
    </div>

 
    <div class="d-flex gap-2">
      <button class="btn btn-primary">Save</button>
      <button class="btn btn-outline-primary">Save and Search</button>
      <button class="btn btn-outline-primary">Search Job Boards</button>
    </div>
  </div>
</div>
  </div> 
                                    
                              </form>
                            </div>
                        </div>
                   </div>
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
<span id="dataedit"></span>
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
    	 <script src="build/assets/ckeditor.js"></script>
<script>
      $('.dropdown-menu').on('click', function (e) {
    e.stopPropagation();
  });
  
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.dropdown-wrapper').length) {
      $('.dropdown-menu').removeClass('show');
    }
  });

  $('.dropdown-menu').on('change', '.dropdown-check', function () {
    const $menu = $(this).closest('.dropdown-menu');
    const $wrapper = $menu.closest('.dropdown-wrapper');
    const $input = $wrapper.find('.dropdown-toggle');
    const $allChecks = $menu.find('.dropdown-check').not('.select-all');
    const $selectAll = $menu.find('.select-all');

    if ($(this).hasClass('select-all')) {
      const isChecked = $(this).is(':checked');
      $allChecks.prop('checked', isChecked);
    } else {
      const total = $allChecks.length;
      const checkedCount = $allChecks.filter(':checked').length;
      $selectAll.prop('checked', total === checkedCount);
    }

    const selected = $allChecks.filter(':checked');
      $input.val(`${selected.length} of ${$allChecks.length} selected`);
    });
   

 $('.dropdown-menu').on('keyup', '.search-box', function () {
    const keyword = $(this).val().toLowerCase();
    const $items = $(this).closest('.dropdown-menu').find('li.dropdown-item').not(':first').not(':eq(1)');
    $items.each(function () {
      const text = $(this).text().toLowerCase();
      $(this).toggle(text.includes(keyword));
    });
  });
  function addField(containerId, fieldName) {
    const container = document.getElementById(containerId);

    // Create row wrapper
    const row = document.createElement('div');
    row.className = 'row row-item mb-2';

    // Create input column
    const inputCol = document.createElement('div');
    inputCol.className = 'col-xl-10';
    const input = document.createElement('input');
    input.type = 'text';
    input.name = fieldName + '[]';
    input.placeholder = 'Enter ' + fieldName;
    input.className = 'form-control';
    inputCol.appendChild(input);

    // Create button column
    const btnCol = document.createElement('div');
    btnCol.className = 'col-lg-2';
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'btn btn-primary btn-sm';
    btn.textContent = 'X';
    btn.onclick = () => row.remove();
    btnCol.appendChild(btn);

    // Append both columns to row
    row.appendChild(inputCol);
    row.appendChild(btnCol);

    // Append row to container
    container.appendChild(row);
  }

  function Newapp(containerId){
      
           const container = document.getElementById(containerId);

            const row = document.createElement('div');
            row.className = 'row row-item mb-2'; // Tailwind classes for spacing and layout

            const inputCol = document.createElement('div');
            inputCol.className = 'col-xl-8'; // Column width for larger screens
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'source[]'; // Name attribute for form submission
            input.placeholder = 'Enter Document Name';
            input.className = 'form-control'; // Styling class
            inputCol.appendChild(input);

            const selectCol = document.createElement('div');
            selectCol.className = 'col-xl-2'; // Column width for larger screens
            const select = document.createElement('select');
            select.name = 'dyes[]'; // Name attribute for form submission
            select.className = 'form-control'; // Styling class

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.hidden = true;
            defaultOption.textContent = 'Select Type';
            select.appendChild(defaultOption);

            const yesOption = document.createElement('option');
            yesOption.value = 'yes';
            yesOption.textContent = 'Yes';
            select.appendChild(yesOption);

            const noOption = document.createElement('option');
            noOption.value = 'no';
            noOption.textContent = 'No';
            select.appendChild(noOption);

            selectCol.appendChild(select);

            const btnCol = document.createElement('div');
            btnCol.className = 'col-lg-2'; // Column width for larger screens
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'btn btn-primary btn-sm'; // Styling classes
            btn.textContent = 'X';
            btn.onclick = () => row.remove();
            btnCol.appendChild(btn);

            // Append all created columns to the main row
            row.appendChild(inputCol);
            row.appendChild(selectCol);
            row.appendChild(btnCol);

            // Append the complete new row to the specified container
            container.appendChild(row);
        }

  // Attach remove to existing buttons
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('#inputContainer, #inputContainer2, #inputContainer3, #inputContainer4, #inputContainer5, #inputContainer6')
      .forEach(container => {
        container.querySelectorAll('.row-item button').forEach(btn => {
          btn.addEventListener('click', () => {
              const row = btn.closest('.row-item');
              const dataId = btn.getAttribute('data-id');
              if(dataId!=''){
                  var ac="1";
                  var table="posting";
                  $.ajax({
                      type:"post",
                      url:"data/delete.php",
                      data:{del:dataId,ac:ac,table:table},
                      success:function(html){
                          $("#dataedit").text("").prepend(html);
                           row.remove();
                      }
                  });
              }
              else{
                   row.remove();
              }
             
          });
        });
      });
  });
</script>

<script>

                var x;
               function dailyupt(x){  
               	 if(x==0)
                 {
                 x=''; 
                 
                 }
                 $("#loader").css("display","block");
               $.ajax({
               url: "data/post_form.php",
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

    var a;
function deles(a){
$(document).ready(function(e){
var b=confirm("Are You Sure Do You Want to Delete ?");
if(b==true){
$.ajax({
type:"post",
url:"data/post_data.php",
data:{did:a},
success:function(html){
$("#mistable").text("");  
$("#mistable").prepend(html);
}

});

}

});

}

$("#submit_form_btn").on("click",function (){
     $("#loader").css("display","block");
$.ajax({
type:"post",
url:"data/post_setting.php",
data:$("#setting_form").serialize(),
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});

        new DataTable('#example');
 
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

        </script>

	</body> 
</html>
