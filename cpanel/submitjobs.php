<?php
include("session.php"); 

function okay() {
    header("Location: applicant.php"); // fixed space
    exit;
}

$sid = '';
$personmame = "Applicant Profile Submission";

if (!empty($_POST['sid'])) {
    $sid = $_POST['sid']; // Already comma-separated string
    $jid=$_POST['jobid']; // in array format
} 

if ($sid != '') {
        $s = mysqli_query($host, "SELECT * FROM applicant WHERE id='$sid'");
        if (mysqli_num_rows($s) == 1) {
            
            // empoyeer details
            $ee=mysqli_query($host,"select * from employee where aid='$sid' and status='Active'");
            $edd=mysqli_fetch_array($ee);
            
            $ds = mysqli_fetch_array($s);
            $personmame = ucwords(strtolower($ds['name'])) . "'s Profile";
        } else {
            okay();
        }
    
} else {
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
        
        <!-- TITLE -->
		<title> <?php echo $personmame;?> </title>
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
                                                    <input type="hidden"  name="document_hidden" value="<?php echo $_POST['sid'];?>"/>
                                                    <input type="hidden" name="newcheck" id="newcheck"/>
                                                    <button class="btn btn-myself" type="submit" >Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
                                                </form>
                                        </div>
                                    </div>
</div>

<div class="modal fade"  id="skill_modal">
     <div class="modal-dialog modal-dialog-start text-center modal-lg" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Skills</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
<form method="post" id="skill_form" enctype="multipart/form-data">
                                                <div class="modal-body text-start" style="padding-top:0px;">
  <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Skill Name</label>
        <input type="text" required="" class="form-control" placeholder="Skill Title" name="title" id="title"/>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Min Experience</label>
      <input type="text"   required="" class="form-control" name="min_exp" id="min_exp" placeholder="Enter min Experience"/>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Max Experience</label>
      <input type="text"   required="" class="form-control" name="max_exp" id="max_exp" placeholder="enter max Experience"/>
    </div>

  </div>
     </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <input type="hidden"  name="jobid" id="jobid"/>
                                                    <input type="hidden" name="index" id="index"/>
                                                    <button class="btn btn-myself" type="submit" >Add</button> <button class="btn btn-outline-dark" data-bs-dismiss="modal" type="button" >Close</button>
                                                </div>
                                                </form>
                                        </div>
                                    </div>
</div>

            <div class="main-content app-content">

                
                <div class="container-fluid">
<style>
    .maincard{
        background-color: white !important;
    }
</style>
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
   .text-primary {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
}
</style>
        
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <div class="card custom-card">
  
  <div class="card custom-card" style="position:relative;margin-bottom:20px;margin-top:20px;">
                            
<div class="d-flex justify-content-between fixeed">
<h5><?php echo $personmame; ?></h5>                              
<div style="">
  <button class="btn btn-primary" type="button" id="actionBtnWrapper">Submit</button>


 <button class="btn btn-outline-primary" type="button">Email Preview</button>
</div>
                             
</div>

</div>
  
                          
  <div class="row">
      <div class="col-xl-8 col-lg-9 ">
<?php
if(!empty($jid)){
    for($i=0;$i<count($jid);$i++){
        $jobid=$jid[$i];
        $ss=mysqli_query($host,"select * from job where id='$jobid'");
        $jj=mysqli_fetch_array($ss);
    
    $check=mysqli_query($host,"select * from submit_data where aid='$sid' and jid='$jobid' and subdomain='$subdomain'");
    $chs=mysqli_fetch_array($check);
?>

 <div style="background-color:#fff !important;justify-content: space-between;<?php if(isset($chs['id'])){echo "border:2px solid green;";}?>" class="mt-4 maincard card-header card-header-toggle" data-bs-toggle="collapse" data-bs-target="#mainFormCollapse<?php echo $i;?>" aria-expanded="true" aria-controls="mainFormCollapse<?php echo $i;?>">
     <input type="hidden" value="<?php if(isset($chs['id'])){echo $chs['jid'];}?>" id="submitornot<?php echo $jj['id'];?>" />
            
        <h5 class="mb-0 d-inline">Job title :- <?php echo $jj['job_code']." - ".$jj['job_title'];?> </h5>
            <i class="bi bi-dash-lg float-end"></i>
</div>

<div class="mb-3 collapse mt-0" id="mainFormCollapse<?php echo $i;?>" style="background: white;padding: 25px 15px;padding-bottom: 20px;">

    <div class="card mb-2">
        <div style="justify-content:space-between;background-color:#2253ff36 !important;padding:9px 20px;cursor:pointer;" class="card-header card-header-toggle" data-bs-toggle="collapse" data-bs-target="#profileCollapse" aria-expanded="true" aria-controls="profileCollapse">
            <h5 class="mb-0 d-inline">Skills</h5>
        </div>

        <div class="collapse show" id="profileCollapse">
            <div class="card-body">
             <div id="skills-container">
            <a class="btn btn-sm btn-primary float-end" onclick="sendValues(<?php echo $jj['id'];?>,'2');"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>
                 <table class="table table-bordered mb-3">
                    <thead>
                        <tr>
                            <th>Skills</th>
                            <th>#Of Years</th>
                            <th>UPLOADED BY</th>
                            <th>UPLOADED ON</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="list-group-items<?php echo $jj['id'];?>">
 <?php
  $primary=explode(",",$jj['primarys']);
  $mine=$jj['min_exp'];
  $maxe=$jj['max_exp'];
  for($ac=0;$ac<count($primary);$ac++){
       ?>
      <tr data-skill="<?php echo $primary[$ac];?>" data-min="<?php echo $mine;?>" data-max="<?php echo $maxe;?>">
            <td><?php echo $primary[$ac];?></td>
            <td><?php echo $mine." - ".$maxe;?></td>
            <td><?php echo $jj['createname'];?></td>
            <td><?php echo date('d M,Y',strtotime($jj['date']))." - ".date('H:i:s',strtotime($jj['time']));?></td>
            <td><i class="bi bi-pencil" onclick="sendValues('<?php echo $jj['id'];?>','2','<?php echo $ac+2;?>',this);"></i></td>
      </tr>
    <?php } ?>
                    </tbody>
                </table>

                        </div>
             
            </div>
        </div>
    </div>
    <div class="card mb-2">
        <div style="justify-content:space-between;background-color:#2253ff36 !important;padding:9px 20px;cursor:pointer;" class="card-header card-header-toggle" data-bs-toggle="collapse" data-bs-target="#employerCollapse" aria-expanded="false" aria-controls="employerCollapse">
            <h5 class="mb-0 d-inline">Employer Details</h5>
        </div>

        <div class="collapse" id="employerCollapse">
            <div class="card-body">
                <form id="employee_Form" method="post">
                   <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="<?php echo $edd['name'];?>" required placeholder="Required">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="<?php echo $edd['last'];?>" required placeholder="Required">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="employerName">Employer Name</label>
                            <input type="text" class="form-control" id="employerName" value="<?php echo $edd['ename'];?>" required placeholder="Required">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="officeNumber">Office Number</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="officeNumber" value="<?php echo $edd['office'];?>" required placeholder="Required">
                                <input type="text" class="form-control" id="extension" value="<?php echo $edd['ext'];?>" placeholder="Extension">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="mobileNumber">Mobile Number</label>
                            <input type="tel" class="form-control" id="mobileNumber" value="<?php echo $edd['mobile'];?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="emailId">Email ID</label>
                            <input type="email" class="form-control" id="emailId" value="<?php echo $edd['email'];?>">
                        </div>
                        <input type="hidden" name="employeeupdates" value="<?php echo $edd['id'];?>"/>
                        <input type="hidden" name="employeehidden" value="<?php echo $_POST['sid'];?>"/>
                    </div>

                    <button type="submit" class="btn btn-primary me-2 employer-save-btn">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card mb-2">
        <div style="justify-content:space-between;background-color:#2253ff36 !important;padding:9px 20px;cursor:pointer;" class="card-header card-header-toggle" data-bs-toggle="collapse" data-bs-target="#documentsCollapse" aria-expanded="false" aria-controls="documentsCollapse">
            <h5 class="mb-0 d-inline">Documents</h5>
        </div>

        <div class="collapse" id="documentsCollapse">
            <div class="card-body">
            <a class="btn btn-sm btn-primary float-end" onclick="sendValues(<?php echo $jj['id'];?>,'1');"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>
                <table class="table table-bordered mb-3">
                    <thead>
                        <tr>
                            <th>DOCUMENT TITLE</th>
                            <th>DOCUMENT TYPE</th>
                            <th>UPLOADED BY</th>
                            <th>UPLOADED ON</th>
                            <th>Comment</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="list-group-item<?php echo $jj['id'];?>">
 <?php
       $sid=$_POST['sid'];
  $dcd=mysqli_query($host,"select * from survey_upload where sub_domain='$subdomain' and ( idd is null or idd='') and sid='$sid' order by date desc");
  while($dc=mysqli_fetch_array($dcd)){
      if(strtolower($dc['dtype'])=='resume'){
          $resume= [
             $dc['file'],
             $dc['dtitle']
             ];
      }
       ?>
                        <tr>
                            <td><?php echo $dc['dtitle'];?></td>
                            <td><?php echo $dc['dtype'];?></td>
                            <td><?php echo $dc['userbyname'];?></td>
                            <td><?php echo date('d M,Y',strtotime($dc['date']))." - ".date('H:i:s',strtotime($dc['time']));?></td>
                            <td><?php echo $dc['dcomment']? $dc['dcomment'] : 'N/A';?></td>
                            <td><a href="<?php echo $dc['file']? "img/".$dc['file'] : '#';?>" download=""><i class="bi bi-download" ></i></a></td>
                        </tr>
    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="card mb-2">
        <div style="justify-content:space-between;background-color:#2253ff36 !important;padding:9px 20px;cursor:pointer;" class="card-header card-header-toggle" data-bs-toggle="collapse" data-bs-target="#submissionCollapse" aria-expanded="false" aria-controls="submissionCollapse">
            <h5 class="mb-0 d-inline">Submission</h5>
        </div>

        <div class="collapse" id="submissionCollapse">
            <div class="card-body">
                <h6 class="mb-3">Standard Fields</h6>
                <form class="submisstion_form" method="post">
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="availability" class="form-label">Availability *</label>
                        <input type="text" class="form-control" name="availability" id="availability" required="" value="<?php if(isset($chs['avail'])){echo $chs['avail'];}?>"/>
                    </div>
                    <div class="col-md-6">
                        <label for="payRate" class="form-label">Pay Rate *</label>
                        <div class="row">
                    <div class="col-xl-4">
                        
                     <select name="pay_type" class="form-control" id="pay_type" required>

<option value="" hidden="">Select</option>

<option value="INR" selected="">INR</option>
<option value="USD">USD</option>
<option value="CAD">CAD</option>
<option value="NOK">NOK</option> 
<option value="SGD">SGD</option> 
<option value="AED">AED</option>
<option value="EUR">EUR</option>
<option value="GBP">GBP</option> 
  
</select>
<?php
if(isset($chs['pay_type'])){
?>
<script> $('#pay_type').val("<?php echo $chs['pay_type'];?>"); </script>
<?php
}
?>
                </div>
                   <div class="col-xl-4">
                       <input type="text" class="form-control" id="pay_rate" name="pay_rate" placeholder="Rate" value="<?php if(isset($chs['pay_rate'])){echo $chs['pay_rate'];}else{ echo $ds['ctc']; } ?>">

                   </div>
                   <div class="col-xl-4">
                        <select class="form-control" id="pay_time" name="pay_time">
                     <option value="Hourly">Hourly</option>
                      <option value="Yearly" selected="">Yearly</option>
                     <option value="Monthly">Monthly</option>
                  </select>
                  <?php
if(isset($chs['pay_time'])){
?>
<script> $('#pay_time').val("<?php echo $chs['pay_time'];?>"); </script>
<?php
}
                  else if($_POST['sid']){
                  ?>
                  <script>$("#pay_time").val("<?php echo $ds['ctc_type'];?>");</script>
                  <?php } ?>
                   </div>
                </div>
                    </div>
                    <div class="col-md-6">
                        <label for="billRate" class="form-label">Bill Rate</label>
                       <div class="row">
                    <div class="col-xl-4">
                        
                     <select name="bill_type" class="form-control" id="bill_type">

<option value="" hidden="">Select</option>

<option value="INR" selected="">INR</option>
<option value="USD">USD</option>
<option value="CAD">CAD</option>
<option value="NOK">NOK</option> 
<option value="SGD">SGD</option> 
<option value="AED">AED</option>
<option value="EUR">EUR</option>
<option value="GBP">GBP</option> 
  
</select>
                <?php
if(isset($chs['bill_type'])){
?>
<script> $('#bill_type').val("<?php echo $chs['bill_type'];?>"); </script>
<?php
}
else if($_POST['sid']){
?>
<script>$("#bill_type").val("<?php echo $jj['bill_type'];?>");</script>
<?php } ?>

</div>
                   <div class="col-xl-4">
                       <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate" value="<?php if(isset($chs['bill_rate'])){echo $chs['bill_rate'];}else{echo $jj['rate']; } ?>">

                   </div>
                   <div class="col-xl-4">
                        <select class="form-control" id="bill_time" name="bill_time">
                     <option value="Hourly">Hourly</option>
                      <option value="Yearly" selected="">Yearly</option>
                     <option value="Monthly">Monthly</option>
                  </select>
                  <?php
if(isset($chs['bill_time'])){
?>
<script> $('#bill_time').val("<?php echo $chs['bill_time'];?>"); </script>
<?php
}
                  else if($_POST['sid']){
                  ?>
                  <script>$("#bill_time").val("<?php echo $jj['bill_time'];?>");</script>
                  <?php } ?>
                   </div>
                </div>
                    </div>
                    <div class="col-md-6">
                        <label for="relocation" class="form-label d-block">Relocation</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="relocation" value="yes" id="relocation-yes" class="form-check-input" <?php if($ds['reloaction']=='yes' or $chs['reloaction']=='yes'){echo 'checked';}?>>
                            <label class="form-check-label" for="relocation-yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="relocation" value="no" id="relocation-no" class="form-check-input" <?php if($ds['reloaction']=='no' or $chs['reloaction']=='no'){echo 'checked';}?> />
                            <label class="form-check-label" for="relocation-no">No</label>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="resume_<?php echo $jj['id'];?>" class="form-label">Resume *</label>
                        <select class="form-select resumeAction" id="resume_<?php echo $jj['id'];?>" name="resume_<?php echo $jj['id'];?>">
                            <option value="new">Upload New Resume</option>
                            <?php
if(isset($chs['resume'])){
?>
<option value="<?php echo $chs['resume'];?>" selected=""><?php echo 'Applicant Resume';?></option>
<?php
}  
                            else if(!empty($resume)){
                            ?>
                            <option value="<?php echo $resume[0];?>" selected=""><?php echo $resume[1];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 fileUploadWrapper" style="display:none;">
                        <label for="resumeFile<?php echo $jj['id'];?>">Resume Upload*</label>
                        <input type="file" class="form-control" name="resumeFile<?php echo $jj['id'];?>" id="resumeFile<?php echo $jj['id'];?>"/>
                    </div>
                    </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="recipients-select" class="form-label">Recipients</label>
                        <select class="form-select teamSelect" value="<?php echo $chs['receipts'];?>" name="recipients_select<?php echo $jj['id'];?>[]" multiple="" id="recipients_select<?php echo $jj['id'];?>">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="notifiers" class="form-label">Additional Notifiers</label>
                        <select class="form-select teamSelect" value="<?php echo $chs['addition'];?>" name="notifiers<?php echo $jj['id'];?>[]" multiple="" id="notifiers<?php echo $jj['id'];?>">
                        </select>
                    </div>
                    </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="otherEmails" class="form-label">Other Email IDs</label>
                        <input type="text" class="form-control" value="<?php echo $chs['other'];?>"  name="other" id="otherEmails" placeholder="Enter each email id with ',' separate"/>
                    </div>
                    <div class="col-md-6">
                        <label for="recipients-textarea" class="form-label">Comments)</label>
                        <textarea class="form-control" id="recipients-textarea" name="recipients-textarea"><?php echo $chs['comments'];?></textarea>
                    </div>
                </div>
               
                <input type="hidden"  name="document_aid" value="<?php echo $_POST['sid'];?>"/>
                <input type="hidden"  name="document_jobid" value="<?php echo $jj['id'];?>"/>
                <button class="btn btn-success btn-sm" type="submit">SAVE</button>
            
            </form>
 </div>
        </div>
    </div>
    </div>
<?php
}
}
?>

</div>
<div class="col-xl-4 col-lg-3">

<?php
if($_POST['sid']!=''){
?>
<div class="apRDetailsB">
    <h5>Profile Details</h5>
    <div class="apFieldRow">
        <div class="apLabel">Name</div>
        <div class="apFieldInfo">
            Admin On 
            <?php echo ucwords(strtolower($ds['name']));?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Mobile</div>
        <div class="apFieldInfo"><?php echo $ds['mobile'];?></div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Email</div>
        <div class="apFieldInfo"><?php echo $ds['email'];?></div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Address</div>
        <div class="apFieldInfo"><?php echo $ds['address'];?></div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Applicant Status</div>
        <div class="apFieldInfo">
            <span id="applicant_status_div_33751"><?php echo $ds['status'];?></span>
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
            <?php echo $ds['year'];?>
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

<?php
}
?>
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
    
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
 <style>
     .table th, .table td {
         padding: 7px !important;
}

.dataTables_filter input {
    padding: 10px 15px;   /* Increase padding */
    font-size: 16px;      /* Increase font size */
    width: 300px;         /* Increase width */
    border-radius: 5px;   /* Optional: rounded corners */
    border: 1px solid #ccc; /* Optional: border style */
}

.table#example{
    width: :100% !important;
}
.card.custom-card .card-header {
border-radius: 0px !important;
}
 </style>
        <!-- END SCRIPTS -->
<span id="dataedit"></span>
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
    	 <script src="build/assets/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>



function sendValues(dd, type,indexx,el){
if(type=='1'){
$("#document_Form #newcheck").val(dd);
var myModal = new bootstrap.Modal(document.getElementById('document_modal'));
myModal.show();

}
else if(type=='2'){
$("#skill_form #jobid").val(dd);
$("#skill_form #index").val(indexx);
let tr = el.closest("tr");
$("#skill_form #title").val(tr.dataset.skill); // skill name
$("#skill_form #min_exp").val(tr.dataset.min);
$("#skill_form #max_exp").val(tr.dataset.max);
var myModal = new bootstrap.Modal(document.getElementById('skill_modal'));
myModal.show();
}

}

$(document).ready(function(){

document.getElementById("actionBtnWrapper").addEventListener("click", function () {
  let hiddenInputs = document.querySelectorAll("input[id^='submitornot']");
  let allFilled = true;

  hiddenInputs.forEach(input => {
    // find the header wrapper (input is inside it)
    let headerDiv = input.closest(".card-header");

    if (headerDiv) {
      // related collapse id
      let collapseId = headerDiv.getAttribute("data-bs-target");
      
      if (!input.value.trim()) {
        allFilled = false;
        headerDiv.style.border = "2px solid red"; // highlight header directly
      } else {
        headerDiv.style.border = "2px solid green"; // reset if filled
      }
    }
  });
  if (allFilled) {
    $.ajax({
      type: "post",
      url: "data/job_submit.php",
      data: { jobid: <?php echo json_encode($jid); ?>, sid: "<?php echo $sid;?>" },
      success: function (html) {
        $("#dataedit").text("").prepend(html);   
      }
    });
  } else {
    alert("❌ Please fill  availability  field  in each jobs");
  }
});


  $(document).on("change", ".resumeAction", function(){
    const wrapper = $(this).closest(".row").find(".fileUploadWrapper");
    if ($(this).val() === "new") {
      wrapper.show();
      wrapper.find("input[type=file]").attr("required", true); // optional
    } else {
      wrapper.hide();
      wrapper.find("input[type=file]").removeAttr("required"); // optional
    }
  });

  // On page load, check default state for each select
  $(".resumeAction").each(function(){
    const wrapper = $(this).closest(".row").find(".fileUploadWrapper");
    if ($(this).val() === "new") {
      wrapper.show();
    } else {
      wrapper.hide();
    }
  });
});

<?php
$team=[];
$ss=mysqli_query($host,"select email,name from team where sub_domain='$subdomain'");
while($ds=mysqli_fetch_array($ss)){
$team[]=[
    'label'=> $ds[1],
    'value'=> $ds[0]
   ];
}
?>

const recipients = <?php echo json_encode($team);?>;

document.querySelectorAll('.teamSelect').forEach(el => {
  const choice = new Choices(el, {
    removeItemButton: true,
    placeholder: true,
    placeholderValue: 'Select Team options',
    searchPlaceholderValue: 'Type to search...',
    duplicateItemsAllowed: false
  });
  choice.setChoices(recipients, 'value', 'label', false);
});

$(document).ready(function (){

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

$("#document_Form").on("submit",function (e){
    e.preventDefault();
$("#loader").show();
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

$(".submisstion_form").on("submit",function (e){
    e.preventDefault();
$('#loader').show();
$.ajax({
type:"post",
url:"data/submission.php",
data: new FormData(this),
contentType: false,
processData: false,
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});

$("#skill_form").on("submit",function (e){
    e.preventDefault();
$('#loader').show();
$.ajax({
type:"post",
url:"data/submission.php",
data: new FormData(this),
contentType: false,
processData: false,
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});

$('#allchecked').on('change', function () {
    const isChecked = $(this).prop('checked');

    table.rows().every(function () {
      const row = this.node();
      $(row).find('input.checkboxx').prop('checked', isChecked);
    });

    toggleActionButton();
  });

$('#example tbody').on('change', 'input.checkboxx', function () {
    const allCheckboxes = table.rows().nodes().to$().find('input.checkboxx');
    const allChecked = allCheckboxes.length === allCheckboxes.filter(':checked').length;

    $('#allchecked').prop('checked', allChecked);

    toggleActionButton();
  });
 
});

toggleActionButton();
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

  const table = new DataTable('#example', {
    ordering: true,
    columnDefs: [
      { orderable: false, targets: 0 }
    ],
  language: {
    searchPlaceholder: "Job Code,Job title,Client,City", // 👈 Your custom placeholder
    search: "" // removes the label "Search:"
  }
  });

        function toggleActionButton() {
  const checkedCount = table.rows().nodes().to$().find('input.checkboxx:checked').length;
  if (checkedCount > 0) {
    $('#actionBtnWrapper').show();
  } else {
    $('#actionBtnWrapper').hide();
  }
}

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
