<?php include("session.php"); 
$tts="";
if (isset($_GET['idd'])) {
$id = $_GET['idd']; // first part after the file name
$tts=" where token='$id'";

$ok=mysqli_query($host,"select * from onboarding where id='$id'");
if(mysqli_num_rows($ok)){

$oks=mysqli_fetch_array($ok);

}
else {
header("Location: onboard_index.php");
exit;
}

}
else {

if(isset($_GET['ids']) && isset($_GET['jid'])){
    
$jid=$_GET['jid'];

$id = $_GET['ids']; // first part after the file name
$tts=" where token='$id'";

$ok=mysqli_query($host,"select * from applicant where subdomain='$subdomain' and id='$id'");
if(mysqli_num_rows($ok)){

$oks=mysqli_fetch_array($ok);

$sidd=$oks['id'];

$bb=mysqli_query($host,"select * from job where id='$jid' and subdomain='$subdomain'");
$bs=mysqli_fetch_array($bb);


$oks['job_title']=$bs['job_title'];
$oks['start']=$bs['start_job'];
$oks['end']=$bs['end_job'];
$oks['client']=$bs['client'];
$oks['bill_rate']=$bs['rate'];
$oks['bill_rate_type']=$bs['bill_time'];

}
else {
header("Location: onboard_index.php");
exit;
}
    
}
else{
header("Location: onboard_index.php");
exit;    
}

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
		<title> eBoarding - Meraqui </title>

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
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>

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


.wizard-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    position: relative;
}

.wizard-header {
  display: flex;
  justify-content: space-evenly;
  position: relative;
  margin-bottom: 30px;
  padding-top: 30px;
}

.wizard-progress-bar {
  position: absolute;
  top: 48px;
  left: 0;
  height: 2px;
  background-color: #1aad8b;
  z-index: 0;
  transition: width 0.3s;
  width:22%;
}

.wizard-header .step {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  color: #888;
  z-index: 1;
}

.wizard-header .step.active .step-circle,
.wizard-header .step.active .step-text {
  color: #1aad8b;
}

.wizard-header .step-circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #f0f0f0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2em;
  font-weight: bold;
  color: #888;
  transition: background-color 0.3s, color 0.3s;
  border: 2px solid #ccc;
}

.wizard-header .step.active .step-circle {
  border-color: #1aad8b;
  background-color: #fff;
  color: #1aad8b;
}

.wizard-header .step-text {
  margin-top: 5px;
  font-size: 0.9em;
  text-align: center;
  transition: color 0.3s;
}


/* Form sections and inputs */
.form-step {
    display: none;
    animation: fadeIn 0.5s ease-in-out;
}

.form-step.active {
    display: block;
}

.section {
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    padding: 20px;
    margin-bottom: 20px;
}

.section h3 {
    margin-top: 0;
    color: #333;
    font-weight: normal;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}

.form-group {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 0.9em;
    color: #555;
    margin-bottom: 5px;
}

/* Validation styling */
input.invalid, select.invalid, textarea.invalid {
    border-color: red !important;
}

/* Fixed footer */
.wizard-footer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #fff;
    border-top: 1px solid #e0e0e0;
    padding: 15px 20px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
}

.btn.prev-btn {
    background-color: #f0f0f0;
    color: #333;
}

.btn.next-btn {
    background-color:var(--primary-color);
    color: #fff;
}

        .searchable-dropdown-container {
            position: relative;
            width: 100%;
            max-width: 100%;
        }

        /* Styling for the input field */
        .searchable-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            border: 1px solid #c9d0da;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            outline: none; /* Remove default focus outline */
        }

        .searchable-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
        }

        /* Styling for the dropdown list */
        .dropdown-list {
            position: absolute;
            top: 100%; /* Position right below the input */
            left: 0;
            right: 0;
            z-index: 10;
            background-color: #fff;
            border: 1px solid #c9d0da;
            border-radius: 8px;
            margin-top: 5px;
            padding: 0;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            list-style: none;
            display: none; /* Hidden by default */
        }

        .dropdown-list.show {
            display: block; /* Show when the 'show' class is added */
        }

        /* Styling for each list item */
        .dropdown-list li {
            padding: 12px 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .dropdown-list li:hover {
            background-color: #e9ecef;
        }

        /* No results message */
        .dropdown-list .no-results {
            color: #6c757d;
            font-style: italic;
            text-align: center;
        }
        
.wizard-header .step.completed .step-circle {
background: #1aad8b;
color: #fff;
border: none;
}

.wizard-header .step.completed .step-text {
  color: #1aad8b;
}
</style>
<style>
    .dropdown-item label {
    width: 100%;
    padding: 8px !important;
}
.dropdown-item {
    padding: 0px !important;
}
.dropdown-item input[type="checkbox"] {
    width: 30px;
    height: 17px;
    margin-top: 1px;
    float: left;
}
</style>
	</head>

	<body>

 <div class="offcanvas offcanvas-end" style="width:55%;" stytabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header border-bottom border-block-end-dashed">
          <h5 class="offcanvas-title" id="offcanvasRightLabel1">Add Document / Checklist</h5>
         <button type="button" class="btn-close" data-bs-dismiss="offcanvas"aria-label="Close"></button>
      </div>

<div class="offcanvas-body">
  
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
 
<button class="nav-link active" id="pending-tab-tab" data-bs-toggle="tab" data-bs-target="#document-tab" type="button" role="tab" aria-controls="pending-tab" aria-selected="true">Document</button>

    <button class="nav-link" id="reject-tab-tab" data-bs-toggle="tab" data-bs-target="#checklist-tab" type="button" role="tab" aria-controls="reject-tab" aria-selected="false">Checklist </button>
 </div>
   <div class="tab-content">

                  
<div class="tab-pane fade show active" id="document-tab" role="tabpanel" style="border:none !important;">
 <form method="post" id="document_tab_form">
<div class="row">
<div class="col-xl-2" style="align-content: center;">
    <label class="form-label mb-0">Select Documents</label>
</div>
<div class="col-xl-4 col-lg-4 col-md-4">
  <div class="dropdown dropdown-wrapper w-100">
      
    <input type="text" class="form-control dropdown-toggle" readonly data-bs-toggle="dropdown" data-bs-auto-close="true" />
     <i class="bi bi-chevron-down position-absolute top-50 translate-middle-y end-0 me-3"></i>

    <ul class="dropdown-menu w-100" style="max-height: 300px; overflow-y: auto;">
<?php
      $sds=mysqli_query($host,"select name from category where type='document' and name not in (select document from onboard_file $tts) order by name asc");
if(mysqli_num_rows($sds)>0){
?>
      <li class="dropdown-item">
        <input type="text" class="form-control form-control-sm search-box" placeholder="Search Document" />
      </li>
      <?php
}
       while($dss=mysqli_fetch_array($sds)){
        $state = htmlspecialchars($dss[0], ENT_QUOTES);
        $stateUpper = strtoupper($state);
      ?>
        <li class="dropdown-item">
          <label>
            <input type="checkbox" name="document[]" value="<?php echo $state; ?>"   data-name="<?= $stateUpper ?>" class="dropdown-check" /><?= $stateUpper ?>
          </label>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>

</div>

    <input type="hidden" id="duedate_form" name="duedate_form"/>
</form>
</div>

                  
<div class="tab-pane fade" id="checklist-tab" role="tabpanel" >
<div class="row">
    <div class="col-12">
        
        <input type="text" placeholder="Search Checklist here .." name="checklist_input" id="checklist_input" class="form-control"/>
        
    </div>
</div>
</div>
                    
                </div>
  
       
                                        </div>

<div style="padding: 20px;" class="offcanvas-footer">
    <button class="btn btn-primary" type="button" id="add_ajax_submit">Add</button>
    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="offcanvas">Cancel</button>
</div>
     
</div>        

<span id="viewDocument"></span>

        <!-- LOADER -->
		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

            <!-- SIDEBAR -->
          <?php include 'sidebar2.php';  ?>
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content" style="margin-inline-start: 15rem; !important">

             <div class="container-fluid">

<div style="position:relative;margin-bottom:50px">
<div class="wizard-header">
  <div class="wizard-progress-bar"></div>

  <div class="step active" data-step="1" id="step-1">
    <div class="step-circle"><i class="fa fa-edit"></i></div>
    <div class="step-text">Fill Details</div>
  </div>
  <div class="step" data-step="2" id="step-2">
    <div class="step-circle"><i class="fa fa-check"></i></div>
    <div class="step-text">Add Checklist</div>
  </div>
  <div class="step" data-step="3" id="step-3">
    <div class="step-circle"><i class="fa fa-thumbs-up"></i></div>
    <div class="step-text">Initiate Onboarding</div>
  </div>
</div>


        <div class="form-step active" data-step="1">
<form id="onboarding_form" method="post">
            <input type="hidden" name="tokennn" id="tokennn" value=""/>
            
             <div class="card-body" style="background-color:#fff;padding:40px 20px;">
 <h6 class="mb-4"><strong>General</strong></h6>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" autocomplete="off"  placeholder="First name" name="first" id="first" required=""
                                                aria-label="First name" value="<?php if(isset($oks['name'])){echo $oks['name'];}?>">
                                        </div>
                                         <div class="col-md-3 mb-3">
                                            <label class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" autocomplete="off"  placeholder="Middle name" name="middle" id="middle"
                                                aria-label="First name"value="<?php if(isset($oks['middle'])){echo $oks['middle'];}?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" autocomplete="off"  placeholder="Last name" name="last" id="last" required=""
                                                aria-label="Last name" value="<?php if(isset($oks['lname'])){echo $oks['lname'];}?>">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                                    <div class="row">
                                                        <label class="form-label mb-1">Gender</label>
                                                        <div class="col-xl-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" <?php if(isset($oks['gender'])){ if($oks['gender']=='male'){echo "checked";}}?>>
                                                                <label class="form-check-label" for="flexRadioDefault1" >
                                                                   Male
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" <?php if(isset($oks['gender'])){ if($oks['gender']=='female'){echo "checked";}}?>>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                         <div class="col-md-3 mb-3">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" inputmode="numeric" class="form-control" minlength="10" maxlength="10" autocomplete="off"  placeholder="Phone number" name="mobile" id="mobile" required=""
                                                aria-label="Phone number" value="<?php if(isset($oks['mobile'])){echo $oks['mobile'];}?>">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" autocomplete="off"  placeholder="Email" name="email" id="email" required=""
                                                    aria-label="email" value="<?php if(isset($oks['email'])){echo $oks['email'];}?>">
                                                </div>
                                        <div class="col-xxl-3 col-xl-3 mb-3">
                                            <label class="form-label">Country</label>
                                           <div class="searchable-dropdown-container">
                                            <input type="text" id="countryInput" name="countryInput" class="form-control" autocomplete="off"  autocomplete="off"  required="" value="<?php if(isset($oks['country'])){echo $oks['country'];}?>"/>
                                              <ul id="countryList" class="dropdown-list"></ul>
                                          </div>        
                                    </div>
                                         <div class="col-xxl-3 col-xl-3 mb-3">
                                             <label class="form-label">State</label>
                                          <div class="searchable-dropdown-container">
                                              <input type="text" id="stateInput" name="stateInput" class="form-control" autocomplete="off"  autocomplete="off" required="" value="<?php if(isset($oks['state'])){echo $oks['state'];}?>"/>
                                              <ul id="stateList" class="dropdown-list"></ul>
                                          </div>  
                                    </div>
                                                
                                        <div class="col-xxl-3 col-xl-3">
                                            <label class="form-label">Date of Joining</label>
                                            <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                            <input type="text" class="form-control humanfrienndlydate" placeholder="Date of Joining" name="DOJ" id="DOJ" required="" value="<?php if(isset($oks['doj'])){echo $oks['doj'];}?>">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 mb-3">
                                             <label class="form-label">Employement Type</label>
                                                    <select class="form-select" name="etype" id="etype">
                                                        <option value="Employee" <?php if(isset($oks['etype'])){ if($oks['etype']=='Employee'){echo "selected";}}?>>Employee</option>
                                                        <option value="Contract" <?php if(isset($oks['etype'])){ if($oks['etype']=='Contract'){echo "selected";}}?>>Contract</option>
                                                    </select>
                                                </div>
                                        <div class="col-xxl-3 col-xl-12 mb-3">
                                                    <label class="form-label">City/Zip Code</label>
                                                     <div class="row">
                                                         <div class="col-6">
                                                             <input type="text" class="form-control" autocomplete="off"  placeholder="City" name="city" id="city" value="<?php if(isset($oks['city'])){echo $oks['city'];}?>">
                                                         </div>
                                                         <div class="col-6">
                                                             <input type="text" class="form-control" autocomplete="off"  placeholder="Zip code" name="zip" id="zip" value="<?php if(isset($oks['pincode'])){echo $oks['pincode'];}?>">
                                                         </div>
                                                     </div>
                                                </div>        
                                        <div class="col-xl-3 mb-3">
                                           <label class="form-label">Street Addrees</label>
                                           <input value="<?php if(isset($oks['address'])){echo $oks['address'];}?>" type="text" class="form-control" autocomplete="off"  placeholder="Street Address" name="address" id="address" aria-label="Street">
                                        </div>
                                                
                                              
                                    </div>
 <h6 class="my-4"><strong>Placement</strong></h6>

    <div class="row g-3">

      <!-- Job Title -->
      <div class="col-md-3">
        <label for="jobTitle" class="form-label">Job Title</label>
        <input type="text" class="form-control" autocomplete="off"  id="jobTitle" name="job_title" placeholder="Job Title" value="<?php if(isset($oks['job_title'])){echo $oks['job_title'];}?>">
      </div>

        <div class="col-xxl-3 col-xl-3 mb-3">
                                                    <label class="form-label">Start/End Date</label>
                                                     <div class="row">
                                                         <div class="col-6">
                                          
                                            <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                            <input type="text" class="form-control humanfrienndlydate" placeholder="Start Date" name="start" id="start" value="<?php if(isset($oks['start'])){echo $oks['start'];}?>">
                                            </div>
                                                         </div>
                                                         <div class="col-6">
                                            
                                             <div class="input-group">
                                            <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                            <input type="text" class="form-control humanfrienndlydate" placeholder="End date" name="end" id="end" value="<?php if(isset($oks['end'])){echo $oks['end'];}?>">
                                            </div>
                                                         </div>
                                                     </div>
      </div> 

      <!-- Vendor -->
      <div class="col-md-3">
        <label for="vendor" class="form-label">Vendor</label>
        <input type="text" class="form-control" autocomplete="off"  id="vendor" name="vendor" placeholder="Vendor" value="<?php if(isset($oks['vendor'])){echo $oks['vendor'];}?>">
      </div>
      
      <div class="col-md-3">
        <label for="vendoremail" class="form-label">Vendor Email</label>
        <input type="email" class="form-control" autocomplete="off"  id="vendoremail" name="vendoremail" placeholder="Vendor Email" value="<?php if(isset($oks['vendor_email'])){echo $oks['vendor_email'];}?>">
      </div>

      <!-- Client -->
      <div class="col-md-3">
        <label for="client" class="form-label">Client</label>
        <input type="text" class="form-control" autocomplete="off"  id="client" name="client" placeholder="Client" value="<?php if(isset($oks['client'])){echo $oks['client'];}?>">
      </div>

      <!-- Bill Rate -->
      <div class="col-md-3">
        <label class="form-label">Bill Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="billRate" name="bill_rate" placeholder="Bill Rate" value="<?php if(isset($oks['bill_rate'])){echo $oks['bill_rate'];}?>">
          <select class="form-select" id="billRateUnit" name="bill_rate_unit">
            <option value="Hourly" <?php if(isset($oks['bill_rate_type'])){ if($oks['bill_rate_type']=='Hourly'){echo "selected";}}?> >Hourly</option>
            <option value="Daily" <?php if(isset($oks['bill_rate_type'])){ if($oks['bill_rate_type']=='Daily'){echo "selected";}}?> >Daily</option>
            <option value="Monthly" <?php if(isset($oks['bill_rate_type'])){ if($oks['bill_rate_type']=='Monthly'){echo "selected";}}?> >Monthly</option>
            <option value="Monthly" <?php if(isset($oks['bill_rate_type'])){ if($oks['bill_rate_type']=='Yearly'){echo "selected";}}?> >Yearly</option>
          </select>
        </div>
      </div>

      <!-- OT Bill Rate -->
      <div class="col-md-3">
        <label class="form-label">OT Bill Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="otBillRate" name="ot_bill_rate" placeholder="OT Bill Rate" value="<?php if(isset($oks['ot_bill_rate'])){echo $oks['ot_bill_rate'];}?>">
          <span class="input-group-text">/hr</span>
        </div>
      </div>

       <div class="col-md-3">
        <label class="form-label">DT Bill Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="dtBillRate" name="dt_bill_rate" placeholder="DT Bill Rate" value="<?php if(isset($oks['dt_bill_rate'])){echo $oks['dt_bill_rate'];}?>">
          <span class="input-group-text">/hr</span>
        </div>
      </div>
      
      <div class="col-md-3">
        <label for="taxTerms" class="form-label">Tax Terms</label>
        <select class="form-select" id="taxTerms" name="tax_terms">
          <option selected disabled>Select Tax Term</option>
          <option value="W2" <?php if(isset($oks['tax'])){ if($oks['tax']=='W2'){echo "selected";}}?> >W2</option>
          <option value="1099" <?php if(isset($oks['tax'])){ if($oks['tax']=='1099'){echo "selected";}}?> >1099</option>
          <option value="C2C" <?php if(isset($oks['tax'])){ if($oks['tax']=='C2C'){echo "selected";}}?> >C2C</option>
        </select>
      </div>
      
       <!-- Pay Rate -->
      <div class="col-md-3">
        <label class="form-label">Pay Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="payRate" name="pay_rate" placeholder="Pay Rate">
          <select class="form-select" id="payRateUnit" name="pay_rate_unit">
            <option value="Hourly" <?php if(isset($oks['pay_rate_type'])){ if($oks['pay_rate_type']=='Hourly'){echo "selected";}}?> >Hourly</option>
            <option value="Daily" <?php if(isset($oks['pay_rate_type'])){ if($oks['pay_rate_type']=='Daily'){echo "selected";}}?> >Daily</option>
            <option value="Monthly" <?php if(isset($oks['pay_rate_type'])){ if($oks['pay_rate_type']=='Monthly'){echo "selected";}}?> >Monthly</option>
          </select>
        </div>
      </div>
      
      
      <!-- OT Pay Rate -->
      <div class="col-md-3">
        <label class="form-label">OT Pay Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="otPayRate" name="ot_pay_rate" placeholder="OT Pay Rate" value="<?php if(isset($oks['ot_pay_rate'])){echo $oks['ot_pay_rate'];}?>">
          <span class="input-group-text">/hr</span>
        </div>
      </div>
      
      
      <!-- DT Pay Rate -->
      <div class="col-md-3">
        <label class="form-label">DT Pay Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="dtPayRate" name="dt_pay_rate" placeholder="DT Pay Rate" value="<?php if(isset($oks['dt_pay_rate'])){echo $oks['dt_pay_rate'];}?>">
          <span class="input-group-text">/hr</span>
        </div>
      </div>

      

      <!-- Per Diem -->
      <div class="col-md-3">
        <label class="form-label">Per Diem</label>
        <div class="input-group">
          <input type="text" class="form-control" autocomplete="off"  id="perDiem" name="per_diem" placeholder="Per Diem">
          <select class="form-select" id="perDiemUnit" name="per_diem_unit">
            <option  value="Hourly" <?php if(isset($oks['diem_type'])){ if($oks['diem_type']=='Hourly'){echo "selected";}}?> > Hourly </option>
            <option  value="Daily"  <?php if(isset($oks['diem_type'])){ if($oks['diem_type']=='Daily'){echo "selected";}}?>  > Daily  </option>
          </select>
        </div>
      </div>

      <!-- Currency -->
      <div class="col-md-3">
        <label for="currency" class="form-label">Currency</label>
        <select class="form-select" id="currency" name="currency" required>
          <option value="" hidden="">Select Currency</option>
          <option value="USD">US Dollar (USD)</option>
<option value="INR">Indian Rupee (INR)</option>
<option value="EUR">Euro (EUR)</option>
<option value="GBP">British Pound Sterling (GBP)</option>
<option value="JPY">Japanese Yen (JPY)</option>
<option value="AUD">Australian Dollar (AUD)</option>
<option value="CAD">Canadian Dollar (CAD)</option>
<option value="CHF">Swiss Franc (CHF)</option>
<option value="CNY">Chinese Yuan (CNY)</option>
<option value="NZD">New Zealand Dollar (NZD)</option>
<option value="SGD">Singapore Dollar (SGD)</option>
<option value="HKD">Hong Kong Dollar (HKD)</option>
<option value="ZAR">South African Rand (ZAR)</option>
<option value="SEK">Swedish Krona (SEK)</option>
<option value="NOK">Norwegian Krone (NOK)</option>
<option value="DKK">Danish Krone (DKK)</option>
<option value="KRW">South Korean Won (KRW)</option>
<option value="BRL">Brazilian Real (BRL)</option>
<option value="RUB">Russian Ruble (RUB)</option>
<option value="MXN">Mexican Peso (MXN)</option>

        </select>
        <?php
        if($oks['currency']!=''){
        ?>
       <script>
           $("#currency").val("<?php echo $oks['currency'];?>");
       </script>        
        <?php
        }
        ?>
      </div>
   <!-- DT Bill Rate -->
     

    </div>

            </div>
 </form>           
        </div>

        <div class="form-step" data-step="2">
            
        <div class="row align-items-center mb-4 d-none">
            <!-- Left side: Onboard Date Input Group -->
            <!--<div class="col-md-2 d-flex align-items-center">-->
            <!--      <div class="input-group">-->
            <!--                                <div class="input-group-text text-muted">Onboard Due</div>-->
            <!--                                <input type="text" class="form-control humanfrienndlydate" placeholder="Due Date" name="all_due" id="all_due"/>-->
            <!--     </div>-->
            <!--</div>-->
            <!-- Right side: Applicant button -->
            <div class="col-md-12 text-end">
                <button class="btn btn-primary btn-applicant" type="button">Applicant</button>
            </div>
        </div>

        <div class="card p-4">
            <!-- First Checklist Section -->
            <div class="row align-items-center mb-3">
                  <div class="col-md-3 form-group align-items-center" style="flex-direction:row;gap:22px">
                    <label class="form-label" for="onboardChecklist1">Onboard Checklist</label>
                    <select id="onboardChecklist1" name="onboardChecklist1" style="width:55%;" class="form-select">
                        <option value="" hidden="">Select</option>
                    </select>
                </div>
                <div class="col-md-3 form-group align-items-center" style="flex-direction:row;gap:22px">
                    <label class="form-label" for="due_date1">Due Date</label>
                     <div class="input-group" style="width:55%;">
                            <input type="text" class="form-control humanfrienndlydate" placeholder="Due date" name="due_date[]" id="due_date1" />
                  </div>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" style="display:none;" id="hidden_document" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas"></button>
                      <i class="fa fa-plus fs-17" style="margin-right:10px;"  id="add_document" data-bs-toggle="tooltip" data-bs-original-title="Add Document"></i>
                     <!-- <i class="fa fa-trash fs-17"  data-bs-toggle="tooltip" data-bs-original-title="Delete"></i> -->
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <form method="post" id="check_form">
                    <span id="document_table">
                        
<?php if(isset($oks['id'])){$tokens=$oks['id'];}include("content/checklist.php"); ?>
                    </span>
               
                </form>
            </div>

            
        </div>
        
        <!-- add button offcanvasRight-->     
           <!--<div class="text-end">-->
           <!--     <a href="#" class="text-decoration-none fs-17"><i class="fa fa-plus me-1"></i>Add Checklist</a>-->
           <!-- </div>  -->
            
        </div>

        <div class="form-step" data-step="3">
          <div class="card p-4 mb-4">
            <form method="post" id="email_form">
           
            <h5 class="mb-3" style="border-bottom:2px solid;width:fit-content;height:35px">Notify Onboard Inititation</h5>
            <div class="sky-blue" style="background: #87ceeb40;padding: 19px;">  
            <div class="row align-items-center mb-3">
                    <div class="col-3">
                        <label class="form-check-label" for="sendMailCheck">
                            Send Mail to Applicant
                        </label>
                    </div>
                    <div class="col-7">
                        <div class="input-group">
                          <!--<input class="form-check-input" type="checkbox" value=""/>-->
                           <input type="text" class="form-control" id="email_sent_name" name="name" readonly>
                       </div>
                    </div>
                    
              
            </div>

            <div class="row align-items-center mb-3">
                    <div class="col-3">
                        <label class="form-check-label" for="sendMailCheck">
                            To
                        </label>
                    </div>
                    <div class="col-7">
                        <input type="email" class="form-control" id="email_sent_mail" name="email" readonly>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-primary" type="button" id="ccbutton">CC</button>
                    </div>
            </div>
            
            <div class="row align-items-center mb-3" id="ccdiv" style="display:none;">
                    <div class="col-3">
                        <label class="form-check-label">
                            CC
                        </label>
                    </div>
                    <div class="col-7">
                        
                        <div class="searchable-dropdown-container">
                        <input type="text" id="ccInput" name="ccInput" class="form-control" autocomplete="off"  autocomplete="off"  required=""/>
                                <ul id="ccList" class="dropdown-list"></ul>
                        </div>   
                        
                    </div>
            </div>

            <div class="row align-items-center mb-4">
                 <div class="col-3">
                        <label class="form-check-label" for="sendMailCheck">
                            Additions : CC <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-original-title="Click spacebar after entering the new email"></i>
                        </label>
                    </div>
        <div class="col-7">
                
                <div class="email-input-container" id="email-input-container">
                    <input type="text" class="form-control" id="multiple_email_input" aria-label="Enter multiple email addresses separated by a space or comma">
                </div>
                <input type="hidden" name="multiple_email_hidden" id="multiple_email_hidden">
        </div>
                    <div class="col-2">
                        <button class="btn btn-outline-primary" type="button" id="bccbutton">BCC</button>
                    </div>
            </div>
            
                        <div class="row align-items-center mb-3" id="bccdiv" style="display:none;">
                    <div class="col-3">
                        <label class="form-check-label">
                            BCC
                        </label>
                    </div>
                    <div class="col-7">
                        
                        <div class="searchable-dropdown-container">
                        <input type="text" id="bccInput" name="bccInput" class="form-control" autocomplete="off"  autocomplete="off"  required=""/>
                                <ul id="bccList" class="dropdown-list"></ul>
                        </div>   
                        
                    </div>
            </div>
            
         </div>
           
            <h5 class="mb-3 mt-3" style="border-bottom:2px solid;width:fit-content;height:35px">Applicant</h5>
            <div class="card p-3" style="background:#a9a9a942;">
                <div class="row mb-3 align-items-center">
                    
                    <div class="col-3">
                        <label class="form-check-label" for="sendMailCheck">
                            Fields
                        </label>
                    </div>
                    <div class="col-3">
                        <select id="fieldsSelect" class="form-select">
                            <option selected>Select</option>
                            <option>Job Title</option>
                            <option>Client Name</option>
                            <option>Date of Joining</option>
                        </select>
                    </div>
                    <div class="col-3">
                         <select id="valueSelect" class="form-select">
                                <option value="" hidden="" required>Select</option>
                                <option>Subject</option>
                                <option>Body</option>
                            </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary btn-sm" type="button">Add</button>
                    </div>
                 </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <label for="subjectInput" class="form-label">Subject</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="subjectInput" name="subjectInput" value="requests you to fill onboarding documents">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="mailContent" class="form-label">Mail Content</label>
                        <input type="hidden" name="message" id="message"/>
                        
                        <textarea class="form-control" id="editor-container" rows="10">
                            <p>Hi <span class="email_sent_name2"></span></p>
    <p>We have processed your profile and you are ready for a Placement with us; please sign-in to the Portal to fill and sign the documents required for onboarding. Below are the placement Details:</p>
    <p>
        Job Title: <span id="job_titles"></span><br>
        Client Name: <span id="client_name"></span><br>
        Date of Joining:  08/14/25<br><br>
        Please follow the link below to access the onboaring portal<br> <br/>
        <a href="https://gdmhbassi.com/Meraqui/cpanel/user/login_applicant.php">https://gdmhbassi.com/Meraqui/cpanel/user/login_applicant.php</a><br> <br/>
        Username:  <span class="email_sent_mail2"></span><br>
        Password: <span class="password"></span><br>
        Due Date for Filling Details:  08/15/25
    </p>
    <p>Thanks & Regards,</p>
                            
                        </textarea>
                    </div>
                </div>
            </div>
           
            </form>
        </div>

        </div>
 
</div>

<div class="wizard-footer">
    <button type="button" id="prevBtn" class="btn prev-btn">Previous</button>
    <button type="button" id="cancelBtn" class="btn prev-btn" style="display:none;">Cancel</button>
   
      <button type="button" id="nextBtn" class="btn next-btn">Next</button>

 <button type="button"  class="btn next-btn" id="initiateBtn" style="display:none;" style="float:left;border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;">Inititate  </button>

</div>

                </div>


            </div> 
            
              <?php include 'footer.php';  ?>
         
		</div>
        <script src="build/assets/libs/jquery/jquery.min.js"></script>
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

        <script src="build/assets/libs/quill/quill.min.js"></script>
        <script src="build/assets/libs/filepond/filepond.min.js"></script>  

        <script type="module" src="build/assets/blog-create-8640480c.js"></script> 

        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>

  <span id="dataedit2"></span>
<script src="build/assets/libs/jquery/jquery.min.js"></script>
<script>
flatpickr(".humanfrienndlydate",{altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d"})


 
function dele(dd,tt){
 if(confirm("Are sure want to delete it ?")){
     
if(tt=="1"){
$.ajax({
    type:"post",
    url:"data/initiative_document.php",
    data:{id:dd},
    success:function (html){
        $("#dataedit2").text("").html(html);
    }
});
}     
     
 }
}

function verify(id,type){
    var status="onboard_file";
 $.ajax({
    type:"post",
    url:"data/status.php",
    data:{status:status,type:type,idd:id},
    success:function (html){
        $("#viewDocument").text("").html(html);
    }
});   
}

function viewDocument(tt,dd,vv){
    $("#showLoader").removeClass("d-none").addClass("d-flex");
 $.ajax({
    type:"post",
    url:"user/viewDocument.php",
    data:{id:dd,tokens:tt,vv:vv},
    success:function (html){
        $("#viewDocument").text("").html(html);
    }
});   
}

document.addEventListener('DOMContentLoaded', function () {
        const emailInput = document.getElementById('multiple_email_input');
            const hiddenInput = document.getElementById('multiple_email_hidden');
            const tagContainer = document.getElementById('email-input-container');

            function isValidEmail(email) {
                // A simple regex for email validation
                const re = /\S+@\S+\.\S+/;
                return re.test(email);
            }

            function updateHiddenInput() {
                let emails = [];
                document.querySelectorAll('.email-tag span').forEach(tag => {
                    emails.push(tag.textContent);
                });
                hiddenInput.value = emails.join(',');
            }

            function addEmailTag(email) {
                if (isValidEmail(email)) {
                    // Create the tag element
                    const tag = document.createElement('span');
                    tag.className = 'email-tag';
                    tag.innerHTML = `
                        <span>${email}</span>
                        <i class="bi bi-x-circle-fill remove-tag"></i>
                    `;
                    // Insert the tag before the input field
                    tagContainer.insertBefore(tag, emailInput);
                    updateHiddenInput();
                }
            }

            emailInput.addEventListener('keyup', function(event) {
                // Check if the spacebar or a comma was pressed
                if (event.key === ' ' || event.key === ',' || event.key === 'Enter') {
                    event.preventDefault(); // Prevent space/comma from being added
                    const email = emailInput.value.trim();
                    if (email) {
                        // Remove trailing comma/space if present
                        addEmailTag(email.replace(/[, ]+$/, ''));
                        emailInput.value = '';
                    }
                }
            });

            // Handle removing tags
            tagContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-tag')) {
                    event.target.closest('.email-tag').remove();
                    updateHiddenInput();
                }
            });
            
            
  const steps = document.querySelectorAll('.wizard-header .step');
  const formSteps = document.querySelectorAll('.form-step');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');
    const cancelBtn = document.getElementById('cancelBtn');
  const progressBar = document.querySelector('.wizard-progress-bar');

  let currentStep = 1;

  function updateProgressBar() {
    const stepPercent = currentStep === 1 ? '22' : currentStep === 2 ? '48' : '98';
    progressBar.style.width = `${stepPercent}%`;
  }

  function showStep(stepNumber) {
    formSteps.forEach(step => step.classList.remove('active'));
    document.querySelector(`.form-step[data-step="${stepNumber}"]`).classList.add('active');

    steps.forEach((step, index) => {
      step.classList.remove('active');
      if (index < stepNumber - 1) {
        step.classList.add('completed');
      } else {
        step.classList.remove('completed');
      }
    });

    const currentStepElement = document.querySelector(`.wizard-header .step[data-step="${stepNumber}"]`);
    currentStepElement.classList.add('active');
    currentStepElement.classList.remove('completed');

    prevBtn.style.display = stepNumber === 1 ? 'none' : 'inline-block';
   // nextBtn.textContent = stepNumber === formSteps.length ? 'Submit' : 'Next';

    updateProgressBar();
  }

  function validateStep(stepNumber) {
    const currentFormStep = document.querySelector(`.form-step[data-step="${stepNumber}"]`);
    const requiredInputs = currentFormStep.querySelectorAll('[required]');
    let isValid = true;

    requiredInputs.forEach(input => {
      if (input.value.trim() === '') {
        input.classList.add('invalid');
        isValid = false; // Corrected this line to set isValid to false
      } else {
        input.classList.remove('invalid');
      }
    });

    return isValid;
  }

  nextBtn.addEventListener('click', function () {
    if (validateStep(currentStep)) {

if (currentStep == 1) {
    const proceedAjax = () => {
        $("#showLoader").removeClass("d-none").addClass("d-flex");
        $.ajax({
            type: "post",
            url: "data/intitate_data.php",
            data: $("#onboarding_form").serialize(),
            success: function(response) {
                $("#showLoader").removeClass("d-flex").addClass("d-none");
                if (response.success) {
                    
                    currentStep++;
                    showStep(currentStep);
                    $("#tokennn").val(response.tokenkey);
                    $("#email_sent_name").val(response.name);
                    $("#email_sent_name2").text(response.name);
                    $("#email_sent_mail").val(response.email);
                    $("#email_sent_mail2").text(response.email);
                    $("#job_titles").text(response.jobtitle);
                    $("#client_name").text(response.clientname);
                    $(".password").text(response.password);
                    
let gameEditor;
ClassicEditor
    .create(document.querySelector('#editor-container')).then((editor)=>{
        gameEditor=editor;
    })
    .catch(error => {
      console.error(error);
    });
    
                } else {
                    console.log(response.message);
                }
            }
        });
    };

    let vendorEmpty = $("#vendor").val().trim() === "" && $("#vendoremail").val().trim() === "";
    let clientEmpty = $("#client").val().trim() === "";

    // Case 1: All empty
    if (vendorEmpty && clientEmpty) {
        Swal.fire({
            text: "Are you sure to proceed without Vendor and Client?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "OK",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                proceedAjax();
            }
        });
    }
    // Case 2: Client filled but vendor empty
    else if (vendorEmpty && !clientEmpty) {
        Swal.fire({
            text: "Are you sure to proceed without Vendor?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "OK",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                proceedAjax();
            }
        });
    }
    // Case 3: Vendor filled but client empty
    else if (!vendorEmpty && clientEmpty) {
        Swal.fire({
            text: "Are you sure to proceed without Client?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "OK",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                proceedAjax();
            }
        });
    }
    // Case 4: All good, proceed directly
    else {
        proceedAjax();
    }
}


 else if (currentStep == 2) {
        if($("#document_table tr").length>0){
        if($("#due_date1").val()!=''){
     
                  var token=$("#tokennn").val();
                   const formdata = new FormData($("#check_form")[0]);
                  formdata.append("tokennn",token);
                  formdata.append("alldue",$("#due_date1").val());
      
       $("#showLoader").removeClass("d-none").addClass("d-flex");
        $.ajax({
          type: "post",
          url: "data/initiative_document.php",
          data: formdata, 
          processData: false,
         contentType: false,
          success: function(response) {
              if(response.success){
                  $("#showLoader").removeClass("d-flex").addClass("d-none");
          
          currentStep++;
          showStep(currentStep);
          
          prevBtn.style.display='none';
          nextBtn.style.display='none';
          document.getElementById('initiateBtn').style.display='block';
          cancelBtn.style.display='block';
          
                  console.log(response.message);
          
              }
              else{
                  $("#showLoader").removeClass("d-flex").addClass("d-none");
                  console.log(response.message);
              }
          }
        });
             
            }
          
          else{
              alert("Please fill due date");
          }
          
        }
        else{
            alert("Please add at least one checklist");
        }
  
  
}
    }
  });

  prevBtn.addEventListener('click', function () {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  });
  
  document.getElementById('initiateBtn').addEventListener("click",function (){
        $("#showLoader").removeClass("d-none").addClass("d-flex");
         var formdataa= new FormData($("#email_form")[0]);
          formdataa.append("message",gameEditor.getData());
          formdataa.append("tokennn",$("#tokennn").val());
        $.ajax({
          type: "post",
          url: "data/verify_data.php",
          data: formdataa,
          processData:false,
          contentType:false,
          success: function(response) {
            $("#dataedit2").html(response);
          }
        });
  });

  //showStep(currentStep);
});


const countryOptions = [
    'Argentina', 'Australia', 'Brazil', 'Canada', 'Chile', 'China', 'Egypt',
    'France', 'Germany', 'India', 'Italy', 'Japan', 'Mexico', 'Nigeria',
    'Norway', 'South Africa', 'Spain', 'Sweden', 'United Kingdom', 'United States'
];

// team member name
<?php
$team_names=[];$sm=mysqli_query($host,"select name from team where sub_domain='meraqui'");
while($sms=mysqli_fetch_array($sm)){
$team_names[]=$sms[0];
}
?>
const teamNames = <?php echo json_encode($team_names); ?>;

function createSearchableDropdown(inputId, ulId, optionsArray) {
    const $searchInput = $(`#${inputId}`);
    const $dropdownList = $(`#${ulId}`);
    const $container = $searchInput.closest('.searchable-dropdown-container');

    // ⬅ Extracted AJAX call into a reusable function
    function fetchStates(option) {
        $("#showLoader").removeClass("d-none").addClass("d-flex");
        $.ajax({
            type: "post",
            url: "content/getdata.php",
            data: { option: option, type: "state", ss: "stateList", ss2: "stateInput" },
            success: function (html) {
                $("#dataedit").text("").prepend(html);
            }
        });
    }

    const renderOptions = (options) => {
        $dropdownList.empty();
        if (options.length == 0) {
            $dropdownList.append(`<li class="no-results">No results found</li>`);
            return;
        }

        options.forEach(option => {
            const $li = $('<li class="listvalue">').text(option);
            $li.on('click', () => {
                $searchInput.val(option);
                $dropdownList.removeClass('show');

                if (inputId == "countryInput") {
                    fetchStates(option); // Call AJAX here
                }
            });
            $dropdownList.append($li);
        });
    };

    $searchInput.on('input', function () {
        const searchTerm = $(this).val().toLowerCase();
        const filteredOptions = optionsArray.filter(option =>
            option.toLowerCase().includes(searchTerm)
        );
        renderOptions(filteredOptions);
        if (searchTerm.length > 0) {
            $dropdownList.addClass('show');
        } else {
            $dropdownList.removeClass('show');
        }
    });

    $searchInput.on('focus', function () {
        renderOptions(optionsArray);
        $dropdownList.addClass('show');
    });

    $(document).on('click', function (e) {
        if (!$container.is(e.target) && $container.has(e.target).length === 0) {
            $dropdownList.removeClass('show');
        }
    });

    renderOptions(optionsArray);

    $searchInput.data("fetchStates", fetchStates);
}


  $(document).ready(function() {
    
createSearchableDropdown('countryInput', 'countryList', countryOptions);
createSearchableDropdown('ccInput', 'ccList', teamNames);
createSearchableDropdown('bccInput', 'bccList', teamNames);

$("#ccbutton").click(function (){
    $("#ccdiv").toggle();
    $("#ccInput").val("");
});

$("#bccbutton").click(function (){
    $("#bccdiv").toggle();
    $("#bccInput").val("");
});

$(document).on("keyup", "input[required]", function () {
    if ($(this).val().length > 1) {
        $(this).removeClass("invalid");
    }
    else{
        $(this).addClass("invalid");
    }
});

$("#add_document").on("click",function (){
    
    if($("#duedate_form").val()==""){
        alert("Please enter the due date");
        return false;
    }
    $("#hidden_document").click();
});

$("#add_ajax_submit").on("click",function (){
    if($("#duedate_form").val()==""){
        alert("Please enter the due date");
        return false;
    }
     
     $("#showLoader").removeClass("d-none").addClass("d-flex");
     var token=$("#tokennn").val();
     const formdata = new FormData($("#document_tab_form")[0]);
     formdata.append("tokennn",token);
     $.ajax({
         type:"post",
         url:"data/initiative_document.php",
         data:formdata,
         processData: false,
         contentType: false,
          success:function (html){
               $("#document_table").text("").html(html);
               $("#showLoader").removeClass("d-flex").addClass("d-none");
               $("#offcanvasRight .btn-close").click();
         }
     });
});

$("#due_date1").on("change",function (){
    var vv=$(this).val();
    $("#duedate_form").val(vv);
});
        
});

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
    if (selected.length >= 4) {
      $input.val(`${selected.length} of ${$allChecks.length} selected`);
    } else {
      const names = selected.map(function () {
        return $(this).data('name');
      }).get();
      $input.val(names.join(', '));
    }
  });
   
  $('.dropdown-menu').on('keyup', '.search-box', function () {
    const keyword = $(this).val().toLowerCase();
    const $items = $(this).closest('.dropdown-menu').find('li.dropdown-item').not(':first');
    $items.each(function () {
      const text = $(this).text().toLowerCase();
      $(this).toggle(text.includes(keyword));
    });
  });

</script>
<style>
    .form-control:focus {
    border-color: transparent !important;
    box-shadow:0px 0px 3.5px darkgrey !important;
}
.mera-primary, .mera-primarys {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
}
.ck-editor__editable {
    min-height: 300px !important;
    overflow: auto; 
}
        .email-input-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        .email-tag {
            background-color: #e9ecef;
            color: #495057;
            padding: 5px 10px;
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
        }
        .email-tag .remove-tag {
            margin-left: 5px;
            cursor: pointer;
            color: #dc3545;
        }
</style>
<span id="dataedit"></span>

<div id="showLoader" class="d-flex justify-content-center align-items-center mb-4" style="position: fixed;background: #00000038;width: 100%;height: 100%;z-index: 99999;align-items: center;"> 
  <div class="spinner-border" role="status"> <span class="visually-hidden">Loading...</span> </div> 
</div>

<script>
    window.onload = function (){
        <?php if(isset($oks['country'])){ ?>
        $("#countryInput").val("<?php echo $oks['country'];?>");
        $("#countryInput").data("fetchStates")("<?php echo $oks['country'];?>");
        <?php } ?>
        setTimeout(function (){
            $("#showLoader").removeClass("d-flex").addClass("d-none");
        },890);
    }
</script>


	</body> 
</html>
