<?php include("session.php"); 
if(strtolower($_SESSION['typess'])=='admin'){
    
}
else{
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
     
        <!-- TITLE -->
		<title>Company Configuration </title>

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

 <!--SIMONWEP CSS -->
        <link rel="stylesheet" href="build/assets/libs/%40simonwep/pickr/themes/classic.min.css">
        <link rel="stylesheet" href="build/assets/libs/%40simonwep/pickr/themes/monolith.min.css">
        <link rel="stylesheet" href="build/assets/libs/%40simonwep/pickr/themes/nano.min.css">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	</head>

<body>

		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>

        <div class="page">

        
            <!-- SIDEBAR -->

<?php include("sidebar.php");?>            <!-- END SIDEBAR -->
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
</style>
            <!-- MAIN-CONTENT -->
 <div class="modal fade"  id="modaldemo8" data-bs-backdrop="static" data-bs-keyboard="false">
                                        <div class="modal-dialog modal-lg modal-dialog-centered text-center" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Data</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start" style="padding-top: 0px;">
<div class="row gx-5 gy-3">
     <div class="col-xl-6">
      
      <label for="typeemail" class="form-label">Type of Email</label>
      <select class="form-select" id="typeemail" name="typeemail">
        <option value="" hidden="">-- Select Type --</option>
        <option value="Submit Applicaton">Submit Applicaton</option>
        <option value="Interview">Interview</option>
      </select>
                                                        </div>
                                                        <div class="col-xl-6">
                                                                  <label for="emailsubject" class="form-label">Email Subject</label>
                                                                  <input type="text" required=""  class="form-control" id="emailsubject" name="emailsubject" placeholder="Enter E-mail Subject" />
                                                        </div>
                                    
                                                        <div class="col-xl-6">
      <label for="emaildesc" class="form-label">Email Description</label>
      <textarea class="form-control" id="emaildesc" name="emaildesc" placeholder="Email Description" rows="5"></textarea>
                                                        </div>
                                                        
                                                        <div class="col-xl-6">
      <label for="emailremark" class="form-label">Remark Here</label>
      <textarea class="form-control" id="emailremark" name="emailremark" placeholder="Remark Here" rows="5"></textarea>
                                                        </div>
                                                        
                                                        
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                     <button class="btn btn-primary" type="button" id="addbtn3">Add</button>
                                                     <input type="hidden" name="updatess3" id="updatess3"/>
                                                     <input type="hidden" name="formtype" id="formtype3" value="3"/>
                                                </div>
                                            </div>
                                        </div>
</div>


            <div class="main-content app-content">

     <?php
     
     $ab=mysqli_query($host,"select * from basic_setting where sub_domain='meraqui'");
     $db=mysqli_fetch_array($ab);
     ?>
                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">Configuration</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Company Configuration</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <style>
              i.bi{
                      margin-top: -2px;
    float: left;
    padding-right: 6px;
              }
                    </style>
                    <div class="row mb-5">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header d-sm-flex d-block" style="padding-bottom:0px;">
                                    <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                                        <li class="nav-item m-1">
                                            <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#personal-info" aria-selected="true">
                                               <i class="bi bi-building fs-17 ok"></i>

                                                Company Information</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#account-settings" aria-selected="true">
                                                <i class="bi bi-cash-coin fs-17 ok"></i>
                                                Account & Billing Information</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#email-settings" aria-selected="true">
                                                <i class="bi bi-shop-window"></i>

                                                Department & Hirachial</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#labels" aria-selected="true">
                                                <i class="bi bi-envelope-fill fs-17"></i>

                                                Email Template</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#notification-settings" aria-selected="true">
                                                <i class="bi bi-gear-wide-connected fs-17"></i>

                                                Applicant Setting</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#security" aria-selected="true">
                                               <i class="bi bi-file-earmark-pdf-fill fs-17"></i>
Document Manager
</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#reminder" aria-selected="true">
                                                <i class="bi bi-alarm fs-17"></i>
                                                Reminder & Alert Setting</a>
                                        </li>
                                    </ul>
                                </div>
                             <form method="post" id="allForm" enctype="multipart/form-data">
                                <div class="card-body"  style="padding-top:0px;padding-bottom:0px;">
                                    <div class="tab-content">
                                      
                                        <div class="tab-pane show active" id="personal-info"
                                            role="tabpanel">
                                            <div class="p-sm-3 p-0">
                                                
                                                <h4 class="fw-semibold mb-3">
                                                    Company Details :
                                                </h4>
                                                <div class="row gy-4">
                                                    <div class="col-xl-6">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" required=""  class="form-control" id="name" name="name" placeholder="Full Name" value="<?php if($db['name']!=''){echo $db['name'];}?>"/>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label for="timezone" class="form-label">Time zone</label>
                                                        <select class="form-control" id="timezone"  name="timezone">
                                                            <option value="" hidden="">Select Time Zone</option>
                                                            <option value="Asia/Kolkata">Asia – Kolkata (India Standard Time)</option>
  <option value="Asia/Dubai">Asia – Dubai (Gulf Standard Time)</option>
  <option value="Asia/Tokyo">Asia – Tokyo (Japan Standard Time)</option>
  <option value="Asia/Shanghai">Asia – Shanghai (China Standard Time)</option>
  <option value="Asia/Singapore">Asia – Singapore</option>
  <option value="Asia/Bangkok">Asia – Bangkok (Indochina Time)</option>
  <option value="Asia/Riyadh">Asia – Riyadh (Arabian Standard Time)</option>
  <option value="Europe/London">Europe – London (GMT)</option>
  <option value="Europe/Berlin">Europe – Berlin (Central European Time)</option>
  <option value="Europe/Moscow">Europe – Moscow (Moscow Standard Time)</option>
  <option value="America/New_York">America – New York (Eastern Time)</option>
  <option value="America/Los_Angeles">America – Los Angeles (Pacific Time)</option>
  <option value="America/Chicago">America – Chicago (Central Time)</option>
  <option value="Australia/Sydney">Australia – Sydney (Australian Eastern Time)</option>
  <option value="Africa/Johannesburg">Africa – Johannesburg (South Africa Standard Time)</option>
                                                        </select>
                                                    <?php
                                                    if($db['timezone']!=''){
                                                    ?>
                                                        <script>$("#timezone").val("<?php echo $db['timezone'];?>");</script>
                                                    <?php  } ?>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <label for="dateformat" class="form-label">Date Format :</label>
                                                        <select class="form-control" name="dateformat" id="dateformat">
                                                        <option hidden="" value="">Select Format</option>
  
  <option value="Y-m-d">YYYY-MM-DD (e.g. 2025-06-13)</option>
  <option value="Y-d-m">YYYY-DD-MM (e.g. 2025-13-06)</option>
  <option value="d-Y-m">DD-YYYY-MM (e.g. 13-2025-06)</option>
  <option value="d-m-Y">DD-MM-YYYY (e.g. 13-06-2025)</option>
  <option value="m-d-Y">MM-DD-YYYY (e.g. 06-13-2025)</option>
  <option value="m-Y-d">MM-YYYY-DD (e.g. 06-2025-13)</option>
  <option value="Y/m/d">YYYY/MM/DD (e.g. 2025/06/13)</option>
  <option value="d/m/Y">DD/MM/YYYY (e.g. 13/06/2025)</option>
                                                        
                                                        </select>
                                                        <?php
                                                    if($db['dateformat']!=''){
                                                    ?>
                                                        <script>$("#dateformat").val("<?php echo $db['dateformat'];?>");</script>
                                                    <?php  } ?>
                                                    </div>
                                                    
                                                    <div class="col-xl-6">
                                                        <label for="colorcode" class="form-label" style="width:100%;">Primary Color Code</label>
                                                         <input type="color" name="colorcode" id="colorcode" value="<?php if($db['colorcode']!=''){echo $db['colorcode'];}?>"/>
                                                   </div>
                                                  <div class="col-xl-6">
                                                      <label class="form-label" style="width:100%;">Logo</label>
                                                  <div class="d-sm-flex align-items-center">
                                                    <div class="mb-0 me-5">
                                                        <span class="avatar avatar-xxl avatar-rounded">
                                                            <label for="profile-change" style="display:contents;"><img src="img/<?php echo $db['logo'];?>" onerror="this.src='build/assets/images/faces/9.jpg'" alt="" id="profile-img"></label>
                                                            <a href="javascript:void(0);" class="badge rounded-pill bg-primary avatar-badge">
                                                                <input type="file" name="photo" class="position-absolute w-100 h-100 op-0" id="profile-change">
                                                                <i class="fe fe-camera"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button class="btn btn-light" type="button" onclick="removee(<?php echo $db['id'];?>);">Remove</button>
                                                    </div>
                                                </div> 
                                                  </div>  
                                                </div>
                                                <h4 class="fw-semibold mb-3">
                                                    Contact Details :
                                                </h4>
                                                <div class="row gy-4 mb-4">
                                                    <div class="col-xl-6">
                                                        <label for="officeno" class="form-label">Office Number :</label>
                                                        <input type="text" required=""  class="form-control" id="officeno" placeholder="Office Number" name="officeno"   value="<?php if($db['officeno']!=''){echo $db['officeno'];}?>"/>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="officeno2" class="form-label">Alt. Mobile Number :</label>
                                                        <input type="text" required=""  class="form-control" id="officeno2" placeholder="Alternate Mobile Number" name="officeno2"  value=" <?php if($db['altno']!=''){echo $db['altno'];}?>"/>
                                                    </div>
                                                    
                                                    <div class="col-xl-12">
                                                       <div class="row gy-4">
                                                           <div class="col-xl-6">
                                                                
                                                        <label for="address" class="form-label">Address :</label>
                                                        <textarea class="form-control" id="address" placeholder="Address Here" name="address" id="address" rows="4"><?php if($db['address']!=''){echo $db['address'];}?></textarea>
                                                           </div>
                                                           <div class="col-xl-6">
                                                               <div class="row">
                                                                   
                                                    <div class="col-xl-12">
                                                        <label for="email" class="form-label">Account Invoice Department E-mail :</label>
                                                        <input type="email" class="form-control" id="email" placeholder="department@gmail.com" name="email"  value=" <?php if($db['email']!=''){echo $db['email'];}?>"/>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="email2" class="form-label">Official E-mail :</label>
                                                        <input type="email" class="form-control" id="email2" placeholder="office@gmail.com" name="email2"   value="<?php if($db['email2']!=''){echo $db['email2'];}?>"/>
                                                    </div>
                                                                   
                                                               </div>
                                                           </div>
                                                       </div>    
                                                        
                                                   
                                                   
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account-settings"
                                            role="tabpanel">
                                            <div class="row gap-3 justify-content-between">
                                                <div class="col-xl-12">
                                                    <div class="card custom-card shadow-none mb-0 border">
                                                        <div class="card-body">
                                                            
                                                 <h4 class="fw-semibold mb-3">
                                                    Contact Details :
                                                </h4>
                                                <div class="row gy-4 mb-4">
                                                   
                                                     <div class="col-xl-12">
                                                       <div class="row gy-4">
                                                           
                                                         <div class="col-xl-6">
                                                               <div class="row">
                                                                   
                                                    <div class="col-xl-12">
                                                        
                                                        <div class="row gy-4">
                                                            <div class="col-xl-6">
                                                                <label for="aname" class="form-label">Full Name</label>
                                                                <input type="text" required=""  class="form-control" id="aname" placeholder="Full Name" name="aname"   value="<?php if($db['aname']!=''){echo $db['aname'];}?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="amobileno" class="form-label">Mobile Number :</label>
                                                                <input type="text" required=""  class="form-control" id="amobileno" placeholder="Mobile Number" name="amobileno"  value="<?php if($db['amobile']!=''){echo $db['amobile'];}?>">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="col-xl-12">
                                                       <div class="row gy-4">
                                                            <div class="col-xl-6">
                                                                 <label for="aemail" class="form-label">E-mail :</label>
                                                                 <input type="email" class="form-control" id="aemail" placeholder="Email@gmail.com" name="aemail"   value="<?php if($db['aemail']!=''){echo $db['aemail'];}?>"/>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                 <label for="astatus" class="form-label">Status :</label>
                                                                <input type="text" required=""  class="form-control" id="astatus" placeholder="Status Here" name="astatus"   value="<?php if($db['astatus']!=''){echo $db['astatus'];}?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                                   
                                                               </div>
                                                           </div>
                                                           
                                                           <div class="col-xl-6">
                                                                
                                                        <label for="account_address" class="form-label">Address :</label>
                                                        <textarea class="form-control" id="account_address" placeholder="Address Here" name="account_address" id="account_address" rows="4"><?php if($db['aaddress']!=''){echo $db['aaddress'];}?></textarea>
                                                           </div>
                                                           
                                                       </div>    
                                                        
                                                   
                                                   
                                                    </div>
                                                    
                                                           
                                                    </div>
                                                    <h4 class="fw-semibold mt-3">
                                                    Billing Details :
                                                </h4>
                                                <div class="row gy-4 mb-4">
                                                     <div class="col-xl-6">
                                                        <label for="currancy" class="form-label">Currancy:</label>
                                                        <select class="form-control" id="currancy" name="currancy">
                                                            <option value="" hidden="">Select Currancy</option>
                                                              <option value="USD">USD – US Dollar</option>
  <option value="EUR">EUR – Euro</option>
  <option value="INR">INR – Indian Rupee</option>
  <option value="GBP">GBP – British Pound</option>
  <option value="JPY">JPY – Japanese Yen</option>
  <option value="CNY">CNY – Chinese Yuan</option>
  <option value="AED">AED – UAE Dirham</option>
  <option value="AUD">AUD – Australian Dollar</option>
  <option value="CAD">CAD – Canadian Dollar</option>
  <option value="CHF">CHF – Swiss Franc</option>
  <option value="SGD">SGD – Singapore Dollar</option>
  <option value="ZAR">ZAR – South African Rand</option>
  <option value="THB">THB – Thai Baht</option>
  <option value="SAR">SAR – Saudi Riyal</option>
  <option value="HKD">HKD – Hong Kong Dollar</option>
                                                    </select>
                                                     <?php
                                                    if($db['currancy']!=''){
                                                    ?>
                                                        <script>$("#currancy").val("<?php echo $db['currancy'];?>");</script>
                                                    <?php  } ?>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="payroll" class="form-label">Payroll Due Date :</label>
                                                        <input type="date" class="form-control" id="payroll" name="payroll"   value="<?php if($db['payroll']!=''){echo $db['payroll'];}?>"/>
                                                    </div>
                                                </div>
                                                
                                                  </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane p-0" id="email-settings" role="tabpanel">
                                            
                                             <div class="row gx-5 gy-3" style="margin-top:0px;">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Department Name</label>
                                                                  <input type="text" required=""  class="form-control" id="department_name" name="department_name" placeholder="Enter Department Name" required>
                                                        </div>
                                                        <div class="col-xl-3">
      
      <label for="under_department" class="form-label">Under Department</label>
      <select class="form-select" id="under_department" name="under_department">
        <option value="" hidden="">-- Select Parent Department --</option>
       <?php
             $sds2=mysqli_query($host,"select name from category where type='department' order by name asc");
             while($dss2=mysqli_fetch_array($sds2)){
            ?>
        <option value="<?php echo $dss2[0];?>"><?php echo $dss2[0];?></option>
       <?php } ?>
      </select>
                                                        </div>
                                                        <div class="col-xl-3">
      <label for="level" class="form-label">Level</label>
      <input type="number" class="form-control" id="level" name="level" min="1" placeholder="Enter Level (e.g., 1, 2)">
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary" type="button" id="addbtn2" style="margin-top: 35px;">Add</button>
                                                            <input type="hidden" name="updatess2" id="updatess2"/>
                                                            <input type="hidden" name="formtype" id="formtype2" value="2"/>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-5 gy-3">
<style>
    #departmenttable thead tr th{
      background-color: var(--menu-bg) !important;
    color: #fff;
    font-size: 12px;
    padding: 10px 20px;

}
</style>
<div class="col-xl-12" style="margin-top: 45px;">     
     <table class="table table-hover table-bordered" id="departmenttable">
        <thead>
        <tr>
             <th>Department name</th>
            <th>Under Department</th>
            <th>Level</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="newoutputs2">
             <?php
             $sds=mysqli_query($host,"select name,under,id,level from category where type='department' order by name asc");
             while($dss=mysqli_fetch_array($sds)){
            ?>
            <tr id='rows<?php echo $dss['id'];?>' >
                <td><?php echo $dss['name']?></td>
                <td><?php if($dss['under']!=''){echo $dss['under'];} else{echo 'No Department';}?></td>
                <td><?php if($dss['level']!='' && $dss['level']!=0){echo $dss['level'];}else{echo 'No level';}?></td>
                <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit('2',<?php echo $dss['id'];?>,'<?php echo $dss['name'];?>','<?php echo $dss['under'];?>','<?php echo $dss['level'];?>');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $dss['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>
            <?php
             }
             ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="labels" role="tabpanel">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="float:left;">
    <a class="modal-effect btn btn-primary d-grid btn-sm" id="addemail" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8" style="float:right;margin-top:5px;"> <i class="bi bi-plus-circle"></i> Add Details</a>
</div>                                         
                                                    <div class="row gx-5 gy-3">
<style>
    #departmenttable2 thead tr th{
        background-color: var(--menu-bg);
    color: #fff;
    font-size: 12px;
    padding: 10px 20px;

   }
</style>
<div class="col-xl-12">     
     <table class="table table-hover table-bordered" id="departmenttable2">
        <thead>
        <tr>
             <th>Type of Email</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Remark</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="newoutputs3">
             <?php
             $sds=mysqli_query($host,"select * from category where type='email' order by name asc");
             while($dss=mysqli_fetch_array($sds)){
            ?>
            <tr id='rows<?php echo $dss['id'];?>' >
                <td><?php echo $dss['name']?></td>
                <td><?php echo $dss['subject'];?></td>
                <td><?php echo $dss['descc'];?></td>
                <td><?php echo $dss['remark'];?></td>
                <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit2(<?php echo $dss['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $dss['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>
            <?php
             }
             ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>
                                        <div class="tab-pane p-0" id="notification-settings" role="tabpanel">
                                             <div class="row gx-5 gy-3" style="margin-top:0px;">
                                                 <div class="col-xl-2">
      <label for="age" class="form-label">Age</label>
      <input type="number" class="form-control" id="age" name="age" min="1" placeholder="Enter Age (e.g., 14, 21)" value="<?php if($db['age']!=''){echo $db['age'];}?>" />
                                                        </div>
                                                        <div class="col-xl-10">
                                                                  <label for="replytat" class="form-label">Reply TAT</label>
                                                                  <input type="text" required=""  class="form-control" id="replytat" name="replytat" placeholder="Enter Reply TAT" value="<?php if($db['tat']!=''){echo $db['tat'];}?>"/>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="tab-pane p-0" id="security" role="tabpanel">
                                                    <div class="row gx-5 gy-3" style="margin-top:0px;">
                                                        <div class="col-xl-4">
                                                                    <p class="fs-14 mb-1 fw-semibold">Document Name</p>
                                                                    <input type="text" required=""  name="dname" id="dname" placeholder="Document Name" class="form-control"/>
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <p class="fs-16 mb-1 fw-semibold">Compulsory</p>
                                                            <div class="form-check" style="float: left;width:22%;">
                                                                    <input class="form-check-input" type="radio" name="dnametype" id="unknown-messages-show1" value="1"/>
                                                                    <label class="form-check-label" for="unknown-messages-show1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="dnametype" id="unknown-messages-hide2" value="0" checked=""/>
                                                                    <label class="form-check-label" for="unknown-messages-hide2">
                                                                        No
                                                                    </label>
                                                                </div>
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <button class="btn btn-primary" type="button" id="addbtn" style="margin-top: 20px;">Add</button>
                                                            <input type="hidden" name="updatess" id="updatess"/>
                                                            <input type="hidden" name="formtype" id="formtype" value="1"/>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-5 gy-3">
<style>
    #documenttable thead tr th{
          background-color: var(--menu-bg);
    color: #fff;
    font-size: 12px;
    padding: 10px 20px;
}
    }
</style>
<div class="col-xl-12" style="margin-top: 45px;">     
     <table class="table table-hover table-bordered" id="documenttable">
        <thead>
        <tr>
             <th>Document name</th>
            <th>Compulsory</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="newoutputs">
             <?php
             $sds=mysqli_query($host,"select name,status,id from category where type='document' order by name asc");
             while($dss=mysqli_fetch_array($sds)){
            ?>
            <tr id='rows<?php echo $dss['id'];?>' >
                <td><?php echo $dss['name']?></td>
                <td><?php if($dss['status']=='1'){echo 'Yes';}else{echo 'No';} ?></td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="edit('1',<?php echo $dss['id'];?>,'<?php echo $dss['name'];?>','<?php echo $dss['status'];?>');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $dss['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>
            <?php
             }
             ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                        </div>
                                        
                                        <div class="tab-pane" id="reminder" role="tabpanel">
                                            <div class="row gy-2">
                                                <div class="col-xl-3">
                                                    <div class="card custom-card shadow-none border">
                                                        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                            <div class="">
                                                                <span class="fw-semibold">Application Submission</span>
                                                            </div>
                                                            <div>
                                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="radio" value="1" class="btn-check" name="application" id="custom-mail-enable"<?php if($db['application']=='1'){ ?> checked="" <?php  } ?>/>
                                                                    <label class="btn btn-sm btn-outline-primary" for="custom-mail-enable">Yes</label>
                                                                    <input type="radio" value="0" class="btn-check" name="application" id="custom-mail-disable" <?php if($db['application']=='0'){ ?> checked="" <?php  } ?>/>
                                                                    <label class="btn btn-sm btn-outline-primary" for="custom-mail-disable">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="card custom-card shadow-none border">
                                                        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                            <div class="">
                                                                <span class="fw-semibold">Interview</span>
                                                            </div>
                                                            <div>
                                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="radio" value="1" class="btn-check" name="interview" id="home-enable" <?php if($db['interview']=='1'){ ?> checked="" <?php  } ?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="home-enable">Yes</label>
                                                                    <input type="radio" value="0" class="btn-check" name="interview" id="home-disable" <?php if($db['interview']=='0'){ ?> checked="" <?php  } ?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="home-disable">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="card custom-card shadow-none border">
                                                        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                            <div class="">
                                                                <span class="fw-semibold">Offer Letter</span>
                                                            </div>
                                                            <div>
                                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="radio" value="1" class="btn-check" name="offerletter" id="work-enable" <?php if($db['offerletter']=='1'){ ?> checked="" <?php  } ?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="work-enable">Yes</label>
                                                                    <input type="radio" value="0" class="btn-check" name="offerletter" id="work-disable" <?php if($db['offerletter']=='0'){ ?> checked="" <?php  } ?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="work-disable">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="card custom-card shadow-none border">
                                                        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                            <div class="">
                                                                <span class="fw-semibold">Joining Letter</span>
                                                            </div>
                                                            <div>
                                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="radio" value="1" class="btn-check" name="Joiningletter" id="friends-enable" <?php if($db['joiningletter']=='1'){ ?> checked="" <?php  } ?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="friends-enable">Yes</label>
                                                                    <input type="radio" value="0" class="btn-check" name="Joiningletter" id="friends-disable" <?php if($db['joiningletter']=='0'){ ?> checked="" <?php  } ?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="friends-disable">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                   
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div style="text-align: right">
                                        <input type="hidden" name="update" id="update"  value="<?php if($db['id']!=''){echo $db['id'];}?>"/>
                                        <button class="btn btn-myself m-1" type="button" id="submitBtn">
                                            Save
                                        </button>
                                    </div>
                                </div>
                             </form>  
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->

                </div>


            </div> 
            <!-- END MAIN-CONTENT -->

    
            <!-- FOOTER -->
            
            <?php include("footer.php");?> 
            <span id="output"></span>
            <span id="dataedit"></span>

		</div>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 


        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>

        <script src="build/assets/libs/%40popperjs/core/umd/popper.min.js"></script>

        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="build/assets/libs/node-waves/waves.min.js"></script>

        <!-- SIMPLEBAR JS -->
        <script src="build/assets/libs/simplebar/simplebar.min.js"></script>
        <link rel="modulepreload" href="build/assets/simplebar-635bad04.js" /><script type="module" src="build/assets/simplebar-635bad04.js"></script>

        <script src="build/assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script>
        
        <link rel="modulepreload" href="build/assets/mail-settings-818145a6.js" /><script type="module" src="build/assets/mail-settings-818145a6.js"></script>
		<script src="build/assets/sticky.js"></script>

        <!-- APP JS -->
		<link rel="modulepreload" href="build/assets/app-3cade095.js" /><script type="module" src="build/assets/app-3cade095.js"></script>

        <!-- CUSTOM-SWITCHER JS -->
        <link rel="modulepreload" href="build/assets/custom-switcher-383b6a5b.js" /><script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<style>
    .ck-editor__editable {
    min-height: 200px !important; /* Adjust height as needed */
    max-height: 500px !important; /* Optional: Set a max-height */
    overflow: auto; /* Allows scrolling if content exceeds height */
}
</style>
        <script>

$('#profile-change').on('change', function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img').attr('src', e.target.result); // show preview
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

let gameEditor;
let gameEditor2;
ClassicEditor
    .create(document.querySelector('#emaildesc')).then((editor)=>{
        gameEditor=editor;
    })
    .catch(error => {
      console.error(error);
    });
ClassicEditor
    .create(document.querySelector('#emailremark')).then((editor)=>{
        gameEditor2=editor;
    })
    .catch(error => {
      console.error(error);
    });
function dele(xx){
    $.ajax({
	url: "data/category_data.php",
	type: "POST",
	data: {id:xx},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}

function edit2(xx){
    $.ajax({
	url: "edit/category.php",
	type: "POST",
	data: {id:xx},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}

function edit(tyt,id,name,status,level){
if(tyt=="1"){
$("#dname").val(name);
$("#updatess").val(id);
$("input[name='dnametype'][value='" + status + "']").prop("checked", true);
}

else{
    if(tyt=="2"){
       $("#department_name").val(name);
       $("#level").val(level);
       $("#under_department").val(status); // status has under
       $("#updatess2").val(id); 
    }
}

}

// document
$("#addbtn").on('click',(function() {
var sta = $("input[name=dnametype]:checked").val();
var cat=$("#dname").val();
var up=$("#updatess").val();
var formtype=$("#formtype").val();

if(cat==""){
    alert("Please enter the document name");
    return false;
}

$.ajax({
	url: "data/category_data.php",
	type: "POST",
	data: {category:cat,status:sta,update:up,formtype:formtype},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}));


// Department
$("#addbtn2").on('click',(function() {
var name = $("#department_name").val();
var under=$("#under_department").val();
var level=$("#level").val();
var up=$("#updatess2").val();
var formtype=$("#formtype2").val();

if(name==""){
    alert("Please enter department name");
    return false;
}

$.ajax({
	url: "data/category_data.php",
	type: "POST",
	data: {category:name,under:under,update:up,level:level,formtype:formtype},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}));

// email
$("#addbtn3").on('click',(function() {
var name = $("#typeemail").val();
var under=$("#emailsubject").val();
var level=gameEditor.getData();
var up=$("#updatess3").val();
var remark=gameEditor2.getData();
var formtype=$("#formtype3").val();

if(name=="" || under=="" || level=="" || remark==""){
    alert("Please enter value");
    return false;
}

$.ajax({
	url: "data/category_data.php",
	type: "POST",
	data: {category:name,subject:under,update:up,desc:level,formtype:formtype,remark:remark},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}));


$("#allForm").on("submit",function (e){
    e.preventDefault();
    console.log("form is calling");
});

$("#submitBtn").on('click',(function() {

$.ajax({
	url: "data/profile.php",
	type: "POST",
	data:  new FormData($("#allForm")[0]),
	contentType: false,
	cache: false,
	processData:false,
	success: function(html){
	$("#output").text("");	
$("#output").prepend(html);
	
	},
	error: function(){} 	        
});
}));

        </script>
    
    
	</body>

</html>
