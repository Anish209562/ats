f<?php include("session.php"); 

function okay(){
header("Location :applicant.php");
exit;
}

if($_GET['sid']!=''){
$sid=$_GET['sid'];
$s=mysqli_query($host,"select * from applicant where id='$sid'");
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
		<title> <?php echo $ds['name'];?> - Applicant </title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


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

    	<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
	
    	<div class="page" style="min-height:80vh !important;">

    
          <?php include 'sidebar.php';  ?>
    
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
        padding: 15px;border-radius: 9px !important;
    }
     .border-right {
    border-right: 1px solid #dee2e6;
    margin-top: 15px;
  }
  
  
.apRDetailsB {
    float: left;
    width: 100%;
    background: #fff !important;
    padding: 14px 20px;height: 100%;
}

.apFieldRow {
    float: left;
    width: 100%;
}
 .apLabel {
       color: #949494;
    font-size: 13px;
} 
 .apFieldInfo {
    color:var(--menu-bg);
    font-size: 14px;
    font-weight: 500 !important;
    
    margin-bottom: 15px;
} 
.text-muted{
    font-size: 12px;
}
.tap-pane .section-container h5{
    font-size: 18px;
    margin-bottom: 20px;
    padding-top: 4px;
}
.alert-primary{
        font-size: 15px !important;
}
#mera li a{
    padding: 10px 20px !important;
}

/* progress bar */
    .progress-container {
      position: relative;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 30px 10px 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-family: sans-serif;
    }

    .progress-line {
      position: absolute;
      top: 38px;
      left: 0;
      right: 0;
      height: 4px;
      background: #ccc;
      z-index: 0;
    }

    .progress-line-fill {
      position: absolute;
      top: 0px;
      left: 0;
      height: 4px;
      background: #28a745;
      z-index: 1;
      transition: width 0.3s ease;
    }

    .step {
      position: relative;
      text-align: center;
      width: 14.28%; /* 100% / 7 steps */
      z-index: 2;
    }

    .circle {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #ccc;
      margin: 0 auto;
      position: relative;
    }

    .step.active .circle,
    .step.checked .circle {
      background: #28a745;
    }

    .step.checked .circle::after {
      content: "✓";
      color: white;
      font-size: 12px;
      display: block;
      text-align: center;
      line-height: 16px;
    }

    .label {
      font-size: 12px;
      margin-top: 6px;
    }

    .time {
      font-size: 10px;
      color: #777;
      margin-top: 2px;
    }
    .fixeed{
        /*position: sticky;top: 0%;width: 100%;z-index: 999;*/
        /*transition: all 1s ease-in-out;*/
        /*padding:10px 0px;*/
        /*background:#f0f1f7!important;*/
    }
    .sticky .fixeed{
        top:5%;
        transition: top 0.2s ease-in;
    }
    
</style>
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <div class="card custom-card" style="position:relative;">
                            
                        <div class="d-flex justify-content-between fixeed">
                              
                              <ul class="nav nav-pills nav-style-2"  id="mera" role="tablist">
                                        <li class="nav-item">
      <a class="nav-link active" id="snapshot-tab" data-bs-toggle="tab" href="#snapshot" role="tab" aria-controls="snapshot" aria-selected="true">Snapshot</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal Details</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" id="employer-tab" data-bs-toggle="tab" href="#activities" role="tab" aria-controls="activities" aria-selected="false">Activities</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="activities-tab" data-bs-toggle="tab" href="#employer" role="tab" aria-controls="employer" aria-selected="false">Profession Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profession-tab" data-bs-toggle="tab" href="#profession" role="tab" aria-controls="profession" aria-selected="false">Employer Details</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email Merges</a>
    </li>
   
                                    </ul>
                              <div style="">
                                 <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true"><i class="fa fa-cog"></i></button>
                                 <ul class="dropdown-menu" id="columnSelect">
     <li>
        <a href="javascript:void(0);" class="dropdown-item">Add <?php echo ucfirst(strtok($ds['name'], ' ')); ?> to Blacklist </a>
    </li>
    <li>
        <a href="javascript:void(0);" class="dropdown-item" > Activate Mail Merge</a>
        <a href="javascript:void(0);" class="dropdown-item"> Deactivate Email Merge</a>
    </li>
    <li><a href="javascript:void(0);" class="dropdown-item">Add Notes</a></li>

    <li>
        <a href="javascript:void(0);" class="dropdown-item">Upload Document</a>
    </li>

    <li><a href="javascript:void(0);" class="dropdown-item" class="TaskManager_links">Create Task</a></li>

    <li>
        <a href="javascript:void(0);" class="dropdown-item" >Delete Applicant</a>
    </li>

    <li><a href="javascript:void(0);" class="dropdown-item">Add References</a></li>

    <li>
        <a href="javascript:void(0)" class="dropdown-item">Activate Account</a>
    </li>
    <li>
        <a href="javascript:void(0)" class="dropdown-item">Snapshot Configuration</a>
    </li>

    <li><a href="javascript:void(0);" class="dropdown-item">Print</a></li>
    <li><a href="javascript:void(0);" class="dropdown-item" >Share the Profile</a></li>
    <li><a  href="javascript:void(0);" class="dropdown-item">Request More Details </a></li>
    <li><a href="javascript:void(0);" class="dropdown-item">Request eForm to Employer</a></li>
    <li><a  href="javascript:void(0);" class="dropdown-item">Request eForm to Applicant</a></li>
    <li>
        <a href="javascript:void(0);" class="dropdown-item">Add to Unsubscribe List </a>
    </li>
    <li><a href="javascript:void(0);" class="dropdown-item">Resume Download History</a></li>
    <li>
        <a href="javascript:void(0)" class="dropdown-item">Initiate Feedback Review</a>
    </li>
    
                             </ul>
 
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true"><i class="fa fa-share"></i></button>
                      <ul class="dropdown-menu" id="columnSelect">
                           <li>
        <a href="javascript:void(0);" class="dropdown-item">Share Job Via Email</a>
    </li>
                         </ul>            
 
 <button class="btn btn-outline-primary" type="button"><i class="fa fa-envelope"  data-bs-toggle="tooltip" title="Send Email"></i></button>
 
 <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">Submit</button>
  <ul class="dropdown-menu" id="columnSelect">
       <li>
        <a href="app_job_view.php?sid=<?php echo $sid;?>" target="_blank" class="dropdown-item">Submit to Job </a>
    </li>
    <li>
        <a href="javascript:void(0);" class="dropdown-item" > Quick to Submit</a>
        <a href="javascript:void(0);" class="dropdown-item"> Tag Job</a>
    </li>
    <li><a href="javascript:void(0);" class="dropdown-item">Quick Tag</a></li>

  </ul>
 
  <button class="btn btn-outline-primary" type="button"><i class="fa fa-cogs" data-bs-toggle="tooltip" title="Skill Matrix"></i></button>


 <button class="btn btn-outline-primary" type="button"><i class="fa fa-download"  data-bs-toggle="tooltip" title="Resume Download"></i></button>



 
                             </div>
                             
                             </div>

                    </div>
                                
<div style="margin-top:20px;">
  <div class="row">
      <div class="col-xl-9 col-lg-9">
   
          <div class="section-container">
            <div class="row mb-3">
              <div class="col-auto">
                
                 <?php
                 if(isset($ds['photo'])){
                     $filePath = $ds['photo'];
                    $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
                    $imageData = base64_encode(file_get_contents($filePath));
                    $all = 'data:image/' . $fileType . ';base64,' . $imageData;
                  ?>
                  <img src="img/<?php echo $all;?>" style="width: 50px;height: 50px;border-radius: 50%;"/>
                  <?php 
                 }
                 else{
                 ?>
                 <div class="word">
                  <span><?php echo strtoupper(substr($ds['name'],0,1));?></span>
                   </div>
                 <?php
                 }
                 
                   $dcd=mysqli_query($host,"select file from survey_upload where sub_domain='$subdomain' and ( idd is null or idd='') and sid='$sid'  and dtype='Resume'");
                   $res=mysqli_fetch_array($dcd);
                 ?>
               
              </div>
              <div class="col">
                <h5><?php echo $ds['id'];?> - <?php echo ucwords($ds['name']);?></h5>
                <h6 class="text-muted"><i class="ri-map-pin-range-fill"></i> <?php if($ds['address']!='' or $ds['address']!=null){echo ucwords(strtolower($ds['address']));}else{echo 'N/A,';}?>   |   <i class="ri-phone-fill"></i> <?php if($ds['mobile']!='' or $ds['mobile']!=null){echo $ds['mobile'];}else{echo 'N/A,';}?>   |   <i class="ri-mail-fill"></i> <?php if($ds['email']!='' or $ds['email']!=null){echo $ds['email'];}else{echo 'N/A,';}?></h6>
              <div class="mt-3">
               <button class="btn btn-sm btn-outline-myself" type="button" onclick="window.location='applicant.php?aid=<?php echo $sid;?>'">Edit Applicant</button>
               <button class="btn btn-sm btn-outline-myself" type="button" onclick="downloadResume('img/<?php echo $res[0];?>');">View Resume</button>
               <button class="btn btn-sm btn-outline-myself" type="button" onclick="window.open('app_job_view.php?sid=<?php echo $sid;?>','_blank');">Submit to Job</button>
              </div> 
              
              </div>
            </div>
          </div>

   
     <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="snapshot" role="tabpanel" aria-labelledby="snapshot-tab">

<style>
.shared-file-icon i {
    border-radius: .3rem;
    border: 1px solid var(--default-border);
    display: flex
;
    align-items: center;
    padding: 10px;
    justify-content: center;
    font-size: 27px;
}
.attchFile-date{
    color: var(--black-4);
    font-size:11.5px !important;
}
.myselfb{
        border-bottom: 2px solid var(--menu-bg);
}
</style>
                  <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Documents</h5>
              <div>
              <span style="display:inline-block;width:32px;height:29px;border-radius:4px;border:1px solid var(--menu-bg);text-align:center;align-content:center;float:left;margin-right:20px;"><i class="fa fa-download"></i></span>
               <a class="mb-3 btn btn-sm btn-primary"  data-bs-toggle="modal" href="#document_modal"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>
              </div>
            </div>
          
    <ul class="list-group" id="list-group-item">
       <?php
       $sid=$ds['id'];
  $dcd=mysqli_query($host,"select * from survey_upload where sub_domain='$subdomain' and ( idd is null or idd='') and sid='$sid' order by date desc");
  while($dc=mysqli_fetch_array($dcd)){
       ?>
        <li class="d-flex justify-content-between  align-items-center fw-semibold mb-4" id="document_rows<?php echo $dc['id'];?>">
          <div class="d-flex">
           <span class="shared-file-icon me-2" style="float:left;"> <i class="ti ti-file-text text-success"></i> </span> <br/>
            <div class="myselfb">
                 <span style="display:inline-block;"><?php echo $dc['dtitle']." - ".$dc['file'];?></span>
                 <p class="attchFile-date">
                  Created By<?php echo $dc['username'];?>on <?php echo date('d M Y',strtotime($dc['date']))." ".date('H:i:s',strtotime($dc['time']));?>   |   Modified By <?php echo $dc['username'];?> </p>
        <p class="attchFile-date atcSubT-2">
                 Comments : <?php if($dc['dcomment']!=''){echo $dc['dcomment'];}else{echo 'N/A';}?>
              </p>
            </div>
         </div> 
          <div class="action-wrapper position-relative">
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
      <i class="ri-delete-bin-line text-primary me-2" onclick="dele('6',<?php echo $me['id'];?>);" style="cursor:pointer;"></i>
       <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
        <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
    </div>
  </div>
            
            </li>
<?php
}
?>
    </ul>
      
          </div>

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
            
<div class="progress-container">
  <div class="progress-line">
    <div class="progress-line-fill" id="progressFill"></div>
  </div>

  <div class="step active">
    <div class="circle"></div>
    <div>Pipeline</div>
  </div>
  <div class="step checked">
    <div class="circle"></div>
    <div>Submission</div>
    <span class="time">01/16/24 13:38:08</span>
  </div>
  <div class="step">
    <div class="circle"></div>
    <div>Client Submission</div>
  </div>
  <div class="step">
    <div class="circle"></div>
    <div>Interview</div>
  </div>
  <div class="step">
    <div class="circle"></div>
    <div>Confirmation</div>
  </div>
  <div class="step">
    <div class="circle"></div>
    <div>Placement</div>
  </div>
  <div class="step">
    <div class="circle"></div>
    <div>Not Joined</div>
  </div>
</div>            
            
          </div>
    </div>
    
    <style>
    #personal .row .col-md-4 p{
        color:#979797 !important;
    }
    #personal .row .col-md-4 h6{
            font-size: 13px;
    }
    .justify-content-end{
            justify-content: end;
    }
</style>
    <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
 <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Personal Details</h5>
              <i class="fa fa-pencil"></i>
            </div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
       <div class="apLabel">First Name</div>
        <div class="apFieldInfo"><?php echo ucwords(strtolower($ds['name']));?> </div>
   </div>
    
    <div class="col-md-4">
      <div class="apLabel">Mobile</div>
        <div class="apFieldInfo"><?php echo $ds['mobile'];?> </div>
    </div>
    
      <div class="col-md-4">
      <div class="apLabel">Email</div>
        <div class="apFieldInfo"><?php echo $ds['email'];?> </div>
    </div>
    
    <div class="col-md-4">
        <div class="apLabel">Date of Birth</div>
        <div class="apFieldInfo"><?php echo date('d M Y',strtotime($ds['dob']));?></div>
    </div>
    
     <div class="col-md-4">
      <div class="apLabel">Address</div>
        <div class="apFieldInfo"><?php echo $ds['address'];?> </div>
    </div>
  
    <div class="col-md-4">
      <div class="apLabel">Gender</div>
        <div class="apFieldInfo"><?php echo ucwords(strtolower($ds['gender']));?> </div>
    </div>


    <div class="col-md-4">
     <div class="apLabel">Source</div>
        <div class="apFieldInfo"><?php echo $ds['source'];?> </div>
    </div>

<div class="col-md-4">
      <div class="apLabel">Applicant status</div>
        <div class="apFieldInfo"><?php echo $ds['status'];?> </div>
    </div>


    <div class="col-md-4">
      <div class="apLabel">Notice Period</div>
        <div class="apFieldInfo"><?php echo $ds['period'];?> </div>
    </div>
    
        <div class="col-md-4">
      <div class="apLabel">Experience Year</div>
        <div class="apFieldInfo"><?php echo $ds['year'];?> </div>
    </div>
    <div class="col-md-4">
     <div class="apLabel">Skill</div>
        <div class="apFieldInfo"><?php echo ucwords(strtolower($ds['skill']));?> </div>
    </div>
   
    <div class="col-md-4">
      <div class="apLabel">Industry</div>
        <div class="apFieldInfo"><?php echo $ds['industry'];?> </div>
    </div>
    
    
    <div class="col-md-4">
     <div class="apLabel">Reference By</div>
        <div class="apFieldInfo"><?php echo $ds['refer'];?> </div>
    </div>
    
    
    <div class="col-md-4">
     <div class="apLabel">Applicant Group</div>
        <div class="apFieldInfo"><?php echo $ds['groups'];?> </div>
    </div>
    
    <div class="col-md-4">
      <div class="apLabel">Reloaction</div>
        <div class="apFieldInfo"><?php echo ucwords(strtolower($ds['reloaction']));?> </div>
    </div>
    
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="col-md-4">
      <div class="apLabel">Current CTC</div>
        <div class="apFieldInfo">INR - <?php echo $ds['ctc'];?> / <?php echo ucwords(strtolower($ds['ctc_type']));?></div>
    </div>
    
     <div class="col-md-4">
     <div class="apLabel">Current Company</div>
        <div class="apFieldInfo"><?php echo strtoupper($ds['cname']);?> </div>
    </div>

   <div class="col-md-4">
      <div class="apLabel">Expected CTC</div>
        <div class="apFieldInfo">INR - <?php echo $ds['ectc'];?> / <?php echo ucwords(strtolower($ds['ectc_type']));?></div>
    </div>
 
  <div class="col-md-4">
      <div class="apLabel">Languages</div>
        <div class="apFieldInfo"><?php echo $ds['lang'];?> </div>
    </div>
 
   <div class="col-md-8">
      <div class="apLabel">Technlogy</div>
        <div class="apFieldInfo"><?php echo $ds['tech'];?> </div>
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
              <ul class="nav nav-pills justify-content-center nav-style-2 mb-3" role="tablist" style="float:left;">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#activity1" aria-selected="true">Activities</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#activity2" aria-selected="false" tabindex="-1">Msg Activities</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#activity3" aria-selected="false" tabindex="-1">Document Activities</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#activity4" aria-selected="false" tabindex="-1">Download Activities</a>
                                        </li>
                                        
                </ul>
                <select class="form-control" style="width:20%;float:right;"><option value="" hidden="">Select</option><option selected="">Last 6 Months</option><option>Older than 6 Months</option></select>
        </div>
            </div>

<div class="tab-content">
    <div class="tab-pane active show fade" id="activity1">

            <div class="table-responsive row">
              <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 15%;">DATE & TIME</th>
      <th scope="col">DESCRIPTION</th>
    </tr>
  </thead>
 <tbody>
     <?php
  $ee=mysqli_query($host,"select * from upate where idd='$sid' order by id desc");
  if(mysqli_num_rows($ee)>0){
   while($ees=mysqli_fetch_array($ee)){
    ?>
    <tr>
        <td><?php echo date('d M Y',strtotime($ees['date']))." ".date('H:i:s ',strtotime($ees['time']));?></td>
       
        <td>
        <?php 
        echo $ees['type'];
        
        ?>
        </td>
       
    </tr>
    <?php
   }   
  }
  else{
  ?>
   <td>No data available</td>
  <?php
  }
  ?>
  </tbody>
 </table>


</div>
        
    </div>
    <div class="tab-pane fade" id="activity2">
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
          <td>No Data available</td>
      </tr>
  </tbody>
</table>


</div>
    </div>
   
        <div class="tab-pane fade" id="activity3">
            <div class="table-responsive row">
              <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 15%;">DATE & TIME</th>
      <th scope="col">File Details</th>
    </tr>
  </thead>
   <tbody>
      <tr>
          <td>No Data available</td>
      </tr>
  </tbody>
</table>


</div>
    </div>
   
    <div class="tab-pane fade" id="activity4">
            <div class="table-responsive row">
              <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 15%;">Document</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
      <tr>
          <td>No Data available</td>
      </tr>
  </tbody>
</table>


</div>
    </div>

</div>


</div>
    </div>

    <div class="tab-pane fade" id="profession" role="tabpanel" aria-labelledby="profession-tab">

           <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Employer Details</h5>
               <div>
           <a class="mb-3 btn btn-sm btn-primary"  data-bs-toggle="modal" href="#modaldemo899" seeker_id="K3ZnaE1oUlU3UnMzaGxzb3VmOUJNUT09"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>
    
              </div>
            </div>
            <div class="table-responsive row">
              <table class="table">
  <thead>
                            <tr>                                     
                                <th class="col">Employee Name</th>
                                <th class="col">Employer</th>
                                <th class="col">Status</th>
                                <th class="col">Action</th>
                            </tr>
  </thead>
  <tbody id="employeetable">
  <?php
  $ee=mysqli_query($host,"select * from employee where aid='$sid' and sub_domain='$subdomain' order by id desc");
  if(mysqli_num_rows($ee)>0){
   while($ees=mysqli_fetch_array($ee)){
    ?>
    <tr id="ee_rows<?php echo $ees['id'];?>">
        <td><?php echo strtoupper($ees['name']." ".$ees['last']."<br>".$ees['mobile']);?></td>
        <td><?php echo $ees['ename']."<br>".$ees['office']." - ".$ees['ext'];?></td>
        <td><?php echo $ees['status'];?></td>
        <td>
            
<div class="action-wrapper position-relative">
    <!-- 3-dot icon -->
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>

    <!-- Action Box -->
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;" onclick="edit('7',<?php echo $ees['id'];?>);"></i>
      <i class="ri-delete-bin-line text-primary" style="cursor:pointer;" onclick="dele('4',<?php echo $ees['id'];?>);"></i>
    </div>
  </div>
            
        </td>
    </tr>
    <?php
   }   
  }
  else{
  ?>
   <td>No data available</td>
  <?php
  }
  ?>
  </tbody>
</table>


</div>
</div>
   </div>
    <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
      
      
      <div class="section-container mt-4">
           <h5>Add Education Details</h5>
        <?php
        $eds=mysqli_query($host,"select * from education where sid='$sid' and sub_domain='$subdomain'");
        $ed=mysqli_fetch_array($eds);
        ?>
           <form id="education_form" method="post">
  <div class="row">
    <!-- School Name -->
    <div class="col-md-4 mb-3">
      <label for="school" class="form-label">School Name <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="school" placeholder="Enter school name" required="" name="school"  value="<?php echo $ed['sname'];?>">
    </div>

    <!-- Degree -->
    <div class="col-md-4 mb-3">
      <label for="degree" class="form-label">Degree <span class="text-danger">*</span></label>
      <select class="form-control" id="degree" required="" name="degree">
        <option hidden="" value="">Select</option>
        <option value="Associate Degree">Associate Degree</option>
  <option value="Bachelors Degree">Bachelors Degree</option>
  <option value="Highschool">Highschool</option>
  <option value="Masters Degree">Masters Degree</option>
  <option value="PHD">PHD</option>
  <option value="Undergraduate">Undergraduate</option>
      </select>
      <script>$("#degree").val("<?php echo $ed['degree'];?>");</script>
    </div>

    <!-- Year Completed -->
    <div class="col-md-4 mb-3">
      <label for="yearCompleted" class="form-label">Year Completed <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="yearCompleted" required="" placeholder="Enter year" name="yearCompleted"  value="<?php echo $ed['year'];?>">
    </div>

    <!-- Major Study -->
    <div class="col-md-4 mb-3">
      <label for="major" class="form-label">Major Study</label>
      <input type="text" class="form-control" id="major" placeholder="Enter major" name="major" value="<?php echo $ed['major'];?>">
    </div>

    <!-- Higher Education Toggle -->
    <div class="col-md-2 mb-3 d-flex flex-column">
      <label for="higherEdu" class="form-label">Higher Education</label>
      
      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" value="1" class="btn-check" name="higherEdu" id="custom-mail-enable" <?php if($ed['higher']=='1'){echo "checked=''";}?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="custom-mail-enable">On</label>
                <input type="radio" value="0" class="btn-check" name="higherEdu" id="custom-mail-disable" <?php if($ed['higher']=='0'){echo "checked=''";}?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="custom-mail-disable">Off</label>
                                                                </div>
    </div>

    <!-- Buttons -->
    <div class="col-12 mt-3">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <input type="hidden" name="educationupdates" id="educationupdates" value="<?php echo $ed['id'];?>"/>
      <input type="hidden" name="educationhidden" value="<?php echo $ds['id'];?>"/>
         <input type="hidden" name="ed_type" value="1"/>

      <button type="reset" class="btn btn-outline-dark btn-sm">Reset</button>
    </div>
  </div>
</form>

           
    </div>
      
      
    <div class="section-container mt-4">
           <h5>Add Certification</h5>
           <form method="post" id="certification_form">
  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="school" class="form-label">Certification <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="cname" placeholder="Required" required="" name="cname"  value="<?php echo $ed['cname'];?>">
    </div>

    <!-- Year Completed -->
    <div class="col-md-4 mb-3">
      <label for="yearCompleted" class="form-label">Year Completed <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="cyear" placeholder="Enter year" name="cyear"  value="<?php echo $ed['cyear'];?>">
    </div>

    <!-- Major Study -->
    <div class="col-md-4 mb-3">
      <label for="major" class="form-label">Comment</label>
      <textarea type="text" class="form-control" id="ccomment" name="ccomment" placeholder="Comment"><?php echo $ed['comment'];?></textarea>
    </div>

    <!-- Buttons -->
    <div class="col-12 mt-3">
      <button type="submit" class="btn btn-primary  btn-sm">Save</button>
       <input type="hidden" name="certifiupdates" id="certifiupdates" value="<?php echo $ed['id'];?>"/>
      <input type="hidden" name="certifihidden" value="<?php echo $ds['id'];?>"/>
      <input type="hidden" name="ed_type" value="2"/>
      <button type="reset" class="btn btn-outline-dark  btn-sm">Reset</button>
    </div>
  </div>
</form>

           
    </div>

    <div class="section-container mt-4">
        <h5>Languages</h5>
<?php
$ll=explode(",",$ds['lang']);
for($i=0;$i<count($ll);$i++){
?>
<div class="alert alert-primary fade show custom-alert-icon shadow-sm" style="display:flex;justify-content:space-between;">
   <div>
    <svg class="svg-primary" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="currentcolor">
        <path d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
    </svg>
    <?php echo $ll[$i];?>
    </div>
      <div class="action-wrapper position-relative">
    <!-- 3-dot icon -->
    <div class="menu-trigger" style="cursor:pointer;">
      <i class="ri-more-2-fill" style="font-size: 20px;"></i>
    </div>

    <!-- Action Box -->
    <div class="action-box shadow-sm">
      <i class="ri-pencil-line text-primary me-2" style="cursor:pointer;"></i>
      <i class="ri-delete-bin-line text-primary" style="cursor:pointer;"></i>
    </div>
  </div> 
</div>
<?php
}
?>

        
    </div>  
    
    </div>
    <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
      <div class="section-container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Email Merge</h5>
            </div>
            <div class="table-responsive row">
              <table class="table" id="example" style="width: 100%;">
  <thead>
                             <tr>
                                <th>Mail Sender / On</th>
                                <th>Email Subject</th>
                                <th>Job Title</th>
                                <th>Zip Location</th>
                                <th>Email Read</th>
                            </tr>
  </thead>
  
</table>


</div>
</div>
    
    </div>
    
  </div>

      </div>
<div class="col-xl-3 col-lg-3">

<div class="apRDetailsB">
    <h5>Applicant Details</h5>
    <div class="apFieldRow">
        <div class="apLabel">Created By &amp; On</div>
        <div class="apFieldInfo">
            Admin On 
            <?php echo date('d M Y',strtotime($ds['date']))." | ".date('H:i:s',strtotime($ds['time']));?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Ownership</div>
        <div class="apFieldInfo">Admin</div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Applicant Status</div>
        <div class="apFieldInfo">
            <span id="applicant_status_div_<?php echo $ds['id'];?>"><?php echo $ds['status'];?></span> &nbsp;
            <span class="mera-primary" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                <i class="fas fa-pencil-alt mera-primary" onclick="status(<?php echo $ds['id'];?>,'<?php echo $ds['status']; ?>','1');"></i>
                
            </span>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Source</div>
        <div class="apFieldInfo">
           <?php if($ds['source']!='' or $ds['source']!=''){echo $ds['source'];}else{echo 'N/A';}?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Skills</div>
        <div class="apFieldInfo">
            <span style="width: 72%; word-wrap: break-word; margin-top: 0px;"><?php if($ds['skill']!='' or $ds['skill']!=''){echo ucwords($ds['skill']);}else{echo 'N/A';}?></span>
            
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Experience</div>
        <div class="apFieldInfo">
            <?php echo $ds['year'];?> Years
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Expected Pay</div>
        <div class="apFieldInfo">
            INR - <?php echo $ds['ectc'];?> / <?php echo $ds['ectc_type'];?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Current CTC</div>
        <div class="apFieldInfo">
            INR - <?php echo $ds['ctc'];?> / <?php echo $ds['ctc_type'];?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Notice Period</div>
        <div class="apFieldInfo">
            <?php echo $ds['notice'];?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Date Of Birth</div>
        <div class="apFieldInfo">
            <?php $dob=date('Y',strtotime($ds['dob']));echo date('d M Y',strtotime($ds['dob']));?> (<?php echo date('Y') - $dob;?>) Years
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Relocation</div>
        <div class="apFieldInfo">
            <?php if($ds['reloaction']!='' or $ds['reloaction']!=''){echo ucwords($ds['reloaction']);}else{echo 'N/A';}?>
        </div>
    </div>
</div>


</div>
  </div> 
                                    
                              </div>
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


<div class="modal fade"  id="modaldemo899">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Employee</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form method="post" id="employee_Form">

                                                <div class="modal-body text-start" style="padding-top:0px;">
  <div class="row">
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="First Name" name="first">
    </div>
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Last Name" name="last">
    </div>

    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Employer Name" name="employee">
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" required="" class="form-control" placeholder="Office Number" name="office">
    </div>
    <div class="col-md-2 mb-3" style="padding-left: 0px;">
      <input type="text" required="" class="form-control" placeholder="Extension" name="extension">
    </div>

    <div class="col-md-6 mb-3">
      <input type="email" class="form-control" placeholder="Email ID" name="email">
    </div>
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Mobile Number" name="mobile">
    </div>

    <div class="col-md-6 mb-3">
      <select class="form-control" name="status">
        <option value="" hidden="">Select</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>
  </div>
 <input type="hidden" name="employeehidden" id="employeehidden" value="<?php echo $ds['id'];?>" />
 <input type="hidden" name="employeeupdates" value="0"/>


                                                    
                                            </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <button class="btn btn-myself" type="submit" id="employeeadd">Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
                                                </form>
                                        </div>
                                    </div>
</div>

<div class="modal fade"  id="document_modal">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Document</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
<form method="post" id="document_Form" enctype="multipart/form-data">
                                                <div class="modal-body text-start" style="padding-top:0px;">
  <div class="row">
      
    <div class="col-md-6 mb-3">
        <label class="form-label">Document Type</label>
      <select class="form-control" name="dtype" id="dtype">
        <option value="" hidden="">Select Type</option>
     <option value="Driving License">Driving License</option>
  <option value="EML File">EML File</option>
  <option value="Resume">Resume</option>
  <option value="Passport">Passport</option>
  <option value="Reference Letter">Reference Letter</option>
  <option value="Resume">Resume</option>
  <option value="SSN">SSN</option>
  <option value="Transcripts">Transcripts</option>
      </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Document Title</label>
      <input type="text" required="" class="form-control" placeholder="Document Title" name="title" id="title"/>
    </div>
    <div class="col-md-7 mb-3">
      <input type="file" required="" class="form-control" name="image_file2" id="image_file2"/>
    </div>
    <div class="col-md-5 mb-3">
        <p class="text-danger mt-2" id="veiwedFile" style="display:none;"></p>
    </div>

    <div class="col-md-12 mb-3">
      <textarea class="form-control" placeholder="Comment" name="desc" id="desc"></textarea>
    </div>
   
  </div>
     </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <input type="hidden" n value="<?php echo $ds['id'];?>"/>
                                                    <input type="hidden" name="documentupdate" id="documentupdate"/>
                                                    <button class="btn btn-myself" type="submit" >Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
                                                </form>
                                        </div>
                                    </div>
</div>


<div class="modal fade"  id="notes_modal">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Employee</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start" style="padding-top:0px;">
<form method="post" id="employee_Form">
  <div class="row">
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="First Name" name="first">
    </div>
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Last Name" name="last">
    </div>

    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Employer Name" name="employee">
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" required="" class="form-control" placeholder="Office Number" name="office">
    </div>
    <div class="col-md-2 mb-3" style="padding-left: 0px;">
      <input type="text" required="" class="form-control" placeholder="Extension" name="extension">
    </div>

    <div class="col-md-6 mb-3">
      <input type="email" class="form-control" placeholder="Email ID" name="email">
    </div>
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Mobile Number" name="mobile">
    </div>

    <div class="col-md-6 mb-3">
      <select class="form-control">
        <option value="" hidden="">Select</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>
  </div>
</form>

                                                    
                                            </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <input type="hidden" name="hidden" value="0" />
                                                    <button class="btn btn-myself" type="button" >Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
                                        </div>
                                    </div>
</div>


<div class="modal fade"  id="task_modal">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Employee</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start" style="padding-top:0px;">
<form method="post" id="employee_Form">
  <div class="row">
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="First Name" name="first">
    </div>
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Last Name" name="last">
    </div>

    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Employer Name" name="employee">
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" required="" class="form-control" placeholder="Office Number" name="office">
    </div>
    <div class="col-md-2 mb-3" style="padding-left: 0px;">
      <input type="text" required="" class="form-control" placeholder="Extension" name="extension">
    </div>

    <div class="col-md-6 mb-3">
      <input type="email" class="form-control" placeholder="Email ID" name="email">
    </div>
    <div class="col-md-6 mb-3">
      <input type="text" required="" class="form-control" placeholder="Mobile Number" name="mobile">
    </div>

    <div class="col-md-6 mb-3">
      <select class="form-control">
        <option value="" hidden="">Select</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>
  </div>
</form>

                                                    
                                            </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <input type="hidden" name="hidden" value="0" />
                                                    <button class="btn btn-myself" type="button" >Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
                                        </div>
                                    </div>
</div>

<div class="modal fade"  id="call_modal">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Employee</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
<form method="post" id="call_Form">
                                                <div class="modal-body text-start" style="padding-top:0px;">

 <div class="row">
    <div class="col-md-6 mb-3">
      <label class="form-label">Call Type</label>
      <select class="form-control" name="calltype" id="calltype">
        <option value="" hidden="">Select</option>
        <option value="Follow Up Calls">Follow Up Calls</option>
        <option value="Greeting Calls">Greeting Calls</option>
         <option value="Intro Calls">Intro Calls</option>
          <option value="Video Calls">Video Calls</option>
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Call Taken On</label>
      <input type="text" required="" class="form-control date" placeholder="" name="taken" id="taken">
    </div>
    <div class="col-md-12 mb-6">
<label class="form-label">Comments</label>
      <textarea  name="call_comment" id="call_comment" rows="5" class="form-control" placeholder="Comment"></textarea>
    </div>
    <h6 class="mt-3">Follow Up Notes</h6>
    <div class="col-md-4 mb-3">
      <label class="form-label">Date & Time</label>
      <input type="text" required="" class="form-control date" placeholder="" name="follow" id="follow">
    </div>
    <div class="col-md-8 mb-3">
      <label class="form-label">Reminder</label>
      <select class="form-control" name="reminder" id="reminder">
        <option value="" hidden="">Select</option>
        <option value="15 mins before">15 mins before</option>
        <option value="30 mins before">30 mins before</option>
        <option value="45 mins before">45 mins before</option>
        <option value="60 mins before">60 mins before</option>
      </select>
    </div>
    <div class="col-md-12 mb-3">
      <label class="form-label">Notes</label>
      <textarea name="call_notes" id="call_notes"  rows="5" class="form-control" placeholder="Notes"></textarea>
    </div>
</div>

                                            </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                   <input type="hidden" name="callhidden" id="callhidden" value="<?php echo $ds['id'];?>" />
                                                     <input type="hidden" name="callupdates" id="callupdates" value="0"/>
                                                    <button class="btn btn-myself" type="submit" >Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
</form>
                                        </div>
                                    </div>
</div>

<div class="modal fade"  id="file_modal">
     <div class="modal-dialog modal-dialog-middle text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Meeting Attachment</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start" style="padding-top:0px;">
<ul id="fileList" class="list-unstyled">
  <!-- Dynamic list items will be added here -->
</ul>
                                                    
                                            </div>
                                        </div>
                                    </div>
</div>


<div class="modal fade"  id="meeting_modal">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Schedule Meeting</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form method="post" id="meeting_Form" enctype="multipart/form-data">

                                                <div class="modal-body text-start" style="padding-top:0px;">
  <div class="row">
    <div class="col-md-12 mb-3">
      <label class="form-label">Meeting Title</label>
     <input type="text" required="" class="form-control" placeholder="" id="title" name="title" style=" width: 100%;">
    </div>
    <div class="col-md-12 mb-6">
     <label class="form-label">Meeting Description</label>
      <textarea  name="desc" id="desc" class="form-control" placeholder="Description"></textarea>
    </div>
    
    <div class="col-md-6 mb-3">
      <label class="form-label">Meeting Mode</label>
      <select class="form-control" name="Mode" id="Mode">
        <option value="N/A">Select</option>
        <option value="In-person">In-person</option>
        </select>
    </div>
    <div class="col-md-6 mb-3" id="venue_div" style="display:none;">
      <label class="form-label">Venue</label>
      <textarea  class="form-control" name="venue" placeholder="" id="venue"></textarea>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Meeting Date</label>
      <input type="text" required="" class="form-control date" placeholder="" name="meetingdate" id="meetingdate">
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Meeting Time</label>
      <input type="text" required="" class="form-control times" placeholder="" name="meetingtime" id="meetingtime">
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Duration</label>
      <select class="form-control" name="duration" id="duration">
        <option value="" hidden="">Select</option>
        <option value="1 Hrs">1 Hrs</option>
        <option value="2 Hrs">2 Hrs</option>
        <option value="3 Hrs">3 Hrs</option>
        <option value="30 mins">30 mins</option>
        <option value="4 Hrs">4 Hrs</option>
        <option value="5 Hrs">5 Hrs</option>
        <option value="6 Hrs">6 Hrs</option>
        <option value="7 Hrs">7 Hrs</option>
        <option value="8 Hrs">8 Hrs</option>
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Add a Attendee</label>
      <select class="form-control" name="attend" id="attend">
        <option value="" hidden="">Select</option>
<?php 
   $s1=mysqli_query($host,"select name,email from applicant order by  name asc"); 
while ($d1 = mysqli_fetch_array($s1)) { 
    ?>      
        <option value="<?php echo $d1['name'].";".$d1['email'];?>"><?php echo ucwords($d1['name']);?></option>
   <?php } ?>     
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Guest Attendees</label>
      <textarea  class="form-control"  id="guest" name="guest" placeholder="Enter Email-IDs with comma Separator"></textarea>
    </div>
      <div class="col-md-6 mb-3">
      <label class="form-label">Document Upload</label>
      <input type="file" class="form-control" name="image_file[]" multiple="" id="image_file"/>
    </div>
    <div class="col-md-6 mb-3">
    <input type="checkbox" name="n_email" id="n_email" value="1"/>
    <label for="n_email">Notify Via Email</label>
    </div>
</div>
 <input type="hidden" name="meetinghidden" id="meetinghidden" value="<?php echo $ds['id'];?>" />
 <input type="hidden" name="meetingupdates" value="0"/>


                                                    
                                            </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <button class="btn btn-myself" type="submit" id="employeeadd">Schedule</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Cancel</button>
                                                </div>
                                                </form>
                                        </div>
                                    </div>
</div>
<style>
    #comment{
        resize: none ;
    }
    .modal .form-control{
        background-color:#fff !important;
    }
    table.table thead tr th {
     font-weight: 600;
     font-size: .85rem;
     padding-top: 8px;
     padding-bottom: 8px;
    }
.action-wrapper {
  position: relative;
  display: inline-block;
}

.action-box {
  display: none;
  position: absolute;
  top: 50%;
  right: 120%;
  transform: translateY(-50%);
  background: #fff;
  padding: 5px 10px;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: opacity 0.3s ease;
  z-index: 10;
}

.action-wrapper:hover .action-box {
  display: flex;
  align-items: center;
  animation: fadeIn 0.2s ease;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.alert-primary:hover{
    background-color: var(--menu-bg) !important;
    color:#fff;
    transition: all 0.5s !important;
}
.alert-primary:hover .svg-primary{
    fill:#fff !important;
}
</style>

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
 
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

           <!-- CUSTOM-SWITCHER JS --> 
        <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

        <!-- QUILL EDITOR JS -->
        <script src="build/assets/libs/quill/quill.min.js"></script>

        <!-- FILEPOND JS -->
        <script src="build/assets/libs/filepond/filepond.min.js"></script>  

        <!-- INTERNAL CREATE BLOG JS --> 
        <script type="module" src="build/assets/blog-create-8640480c.js"></script> 
    
 <link rel="modulepreload" href="build/assets/modal-9dbbb9a6.js" /><script type="module" src="build/assets/modal-9dbbb9a6.js"></script>
 
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
 
        <!-- END SCRIPTS -->
<span id="dataedit"></span>
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
    	 <script src="build/assets/ckeditor.js"></script>

<script>
function downloadResume(fileUrl) {
  const link = document.createElement("a");
  link.href = fileUrl;
  link.download = fileUrl.split('/').pop(); // get filename
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
function status(stid,sta,tt){
$(document).ready(function (){
$("#loader").show();
$.ajax({
type:"post",
url:"data/statusform.php",
data:{stid:stid,tt:tt,sta:sta},
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});
});


}

$('#image_file2').on('change', function () {
    const fileName = this.files.length > 0 ? this.files[0].name : '';
    if (fileName) {
        $('#veiwedFile').text(fileName).show();
    }
});
let datepicker=flatpickr(".date", {
    dateFormat: "Y-m-d", // format like 2025-07-21
    altInput: true,
    altFormat: "F j, Y", // pretty format like July 21, 2025
    allowInput: true,
    defaultDate: "<?php echo date('Y-m-d');?>"
});

flatpickr(".times",{
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "<?php echo date('H:i');?>"
});

function toggleReadMoreText(anchor) {
anchor.textContent = anchor.textContent === 'Read more' ? 'Read less' : 'Read more';
}

function abc(){
    $(".modal .btn-outline-dark").click();
    $(".modal form input, .modal form select, .modal form textarea").val("");
    $(".modal form textarea").text("");
    $("#employeehidden, #document_hidden, #status_hidden, #meetinghidden, #callhidden").val("<?php echo $ds['id'];?>");
}
$(document).ready(function (){

$("#Mode").on("change",function (){
    if($(this).val()==""){
        $("#venue_div").hide();
    }
    else{
        $("#venue_div").show();
    }
});

$("#employee_Form").on("submit",function (e){
    e.preventDefault();
$.ajax({
type:"post",
url:"data/employee.php",
data:$(this).serialize(),
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});


$("#call_Form").on("submit",function (e){
    e.preventDefault();
$.ajax({
type:"post",
url:"data/call.php",
data:$(this).serialize(),
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});


$("#meeting_Form").on("submit",function (e){
    e.preventDefault();
$.ajax({
type:"post",
url:"data/meeting.php",
data: new FormData(this),
contentType: false,
processData: false,
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});

$("#document_Form").on("submit",function (e){
    e.preventDefault();
$.ajax({
type:"post",
url:"data/document.php",
data: new FormData(this),
contentType: false,
processData: false,
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});


$("#education_form, #certification_form").on("submit",function (e){
    e.preventDefault();
$.ajax({
type:"post",
url:"data/education.php",
data:$(this).serialize(),
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});

$("#mera_note ul li a").on("click",function (){
     if($(this).attr("href")=="#notes1"){
         $("#noteadd").show();
     }
     else{
         $("#noteadd").hide();
     }
});
});

 document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
      new bootstrap.Tooltip(el);
    });
  });

function edit(tt,id){
     $.ajax({
       url: "edit/alledit.php",
       type: "POST",
       data:{tt:tt,id:id},
       success: function(html){
       $("#dataedit").text('');
       $("#dataedit").prepend(html);
       }
         
     });  
}

function dele(ac,id){
     $.ajax({
       url: "data/delete.php",
       type: "POST",
       data:{del:id,ac:ac},
       success: function(html){
       $("#dataedit").text('');
       $("#dataedit").prepend(html);
       }
         
     });  
}

function deleteFile(del){
     $.ajax({
       url: "edit/viewFile.php",
       type: "POST",
       data:{del:del},
       success: function(html){
       $("#dataedit").text('');
       $("#dataedit").prepend(html);
       }
         
     });  
}


function viewFile(ff){
    $.ajax({
       url: "edit/viewFile.php",
       type: "POST",
       data:{ff:ff},
       success: function(html){
       $("#fileList").text('');
       $("#fileList").prepend(html);
       var myModal = new bootstrap.Modal(document.getElementById('file_modal'));
       myModal.show();
       }
         
     }); 
}

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



      new DataTable('#example', {
  ordering: false
});
 
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