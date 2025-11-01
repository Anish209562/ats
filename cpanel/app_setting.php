<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close" loader="disable">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
     
        <!-- TITLE -->
		<title>Applicant  Configuration </title>

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

  <!-- LOADER -->
		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

            <!-- HEADER -->

         <?php include("header.php");?> 
            <!-- END HEADER -->

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
                                    <li class="breadcrumb-item active" aria-current="page">Applicant Setting</li>
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

                                                Applicant Status</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#account-settings" aria-selected="true">
                                                <i class="bi bi-cash-coin fs-17 ok"></i>
                                                Applicant Group</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#email-settings" aria-selected="true">
                                                <i class="bi bi-shop-window"></i>

                                                Degree</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#labels" aria-selected="true">
                                                <i class="bi bi-envelope-fill fs-17"></i>

                                                Industry</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#notification-settings" aria-selected="true">
                                                <i class="bi bi-gear-wide-connected fs-17"></i>

                                               Lanugage</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#security" aria-selected="true">
                                               <i class="bi bi-file-earmark-pdf-fill fs-17"></i>
Applicant Technologies
</a>
                                        </li>
                                        <li class="nav-item m-1">
                                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#reminder" aria-selected="true">
                                                <i class="bi bi-alarm fs-17"></i>
                                                Source</a>
                                        </li>
                                    </ul>
                                </div>
<?php
$main = [
    'status' => [],
    'groups' => [],
    'industry' => [],
    'degree' => [],
    'lang' => [],
    'tech' => [],
    'source'=>[]
];
$s1 = mysqli_query($host, "SELECT id, name, type FROM appSetting WHERE tables='applicant'");
while ($s = mysqli_fetch_array($s1)) {
    $type = $s['type'];
    $row = [
        'id' => $s['id'],
        'name' => $s['name']
    ];

    if (isset($main[$type])) {
        $main[$type][] = $row;
    }
}
?>
                                <div class="card-body"  style="padding-top:0px;">
                                    <div class="tab-content">
                                      
                                        <div class="tab-pane show active p-0" id="personal-info" role="tabpanel">
                                            
                                             <div class="row gx-5 gy-3" style="margin-top:0px;">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Applicant Status</label>
                                                                  <input type="text" class="form-control"  placeholder="Enter Applicant Status" required>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 20px;" data-id="#personal-info">Add</button>
                                                            <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="1"/>
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
             <th>Applicant Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody >
             <?php
     if (!empty($main['status'])) {
    foreach ($main['status'] as $d1) {
        ?>
     <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','personal-info');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>

        <?php
        } 
     }
     ?>
      
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>
                                        <div class="tab-pane p-0" id="account-settings" role="tabpanel">
                                            
                                             <div class="row gx-5 gy-3" style="margin-top:0px;" id="prioritydiv">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Applicant Groupe</label>
                                                                  <input type="text" class="form-control"  placeholder="Enter Group" required>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" data-id="#account-settings" style="margin-top: 20px;">Add</button>
                                                            <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="2"/>
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
             <th>Group</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody >
             <?php
     if (!empty($main['groups'])) {
    foreach ($main['groups'] as $d1) {
        ?>
     <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','account-settings');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>
        <?php
        } 
     }
     ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>


                                        <div class="tab-pane p-0" id="email-settings" role="tabpanel">
                                            
                                             <div class="row gx-5 gy-3" style="margin-top:0px;" id="noticediv">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Degree ( Education )</label>
                                                                  <input type="text" class="form-control" placeholder="Enter Degree" required>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 20px;" data-id="#email-settings">Add</button>
                                                            <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="3"/>
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
             <th>Degree</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody >
           <?php
     if (!empty($main['degree'])) {
    foreach ($main['degree'] as $d1) {
        ?>
        <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                 <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','noticediv');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>

        <?php
        } 
     }
     ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>
                                        <div class="tab-pane p-0" id="labels" role="tabpanel">
                                            
                                             <div class="row gx-5 gy-3" style="margin-top:0px;" id="departdiv">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Industry</label>
                                                                  <input type="text" class="form-control" placeholder="Enter Industry" required>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 20px;" data-id="#labels">Add</button>
                                                            <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="4"/>
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
             <th>Industry name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody >
                  <?php
     if (!empty($main['industry'])) {
    foreach ($main['industry'] as $d1) {
        ?>
        <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                 <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','departdiv');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>

        <?php
        } 
     }
     ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>
                                     
                                        <div class="tab-pane p-0" id="notification-settings" role="tabpanel">
                                            
                                             <div class="row gx-5 gy-3" style="margin-top:0px;" id="employeediv">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Lanugage</label>
                                                                  <input type="text" class="form-control"  placeholder="Enter Lanugage" required>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 20px;" data-id="#notification-settings">Add</button>
                                                           <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="5"/>
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
             <th>Lanugagel</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody >
                  <?php
     if (!empty($main['lang'])) {
    foreach ($main['lang'] as $d1) {
        ?>
        <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                 <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','employeediv');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>

        <?php
        } 
     }
     ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                            
                                        </div>

                                        <div class="tab-pane p-0" id="security" role="tabpanel">
                                                    <div class="row gx-5 gy-3" style="margin-top:0px;" id="documentdiv">
                                                        <div class="col-xl-3">
                                                                    <p class="fs-14 mb-1 fw-semibold">Technologies</p>
                                                                    <input type="text" placeholder="Technologies" class="form-control"/>
                                                        </div>
                                                       
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 20px;" data-id="#security">Add</button>
                                                         <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="6"/>
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
             <th>Technology</th>
             <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="newoutputs">
                   <?php
     if (!empty($main['tech'])) {
    foreach ($main['tech'] as $d1) {
        ?>
        <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                 <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','security');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>

        <?php
        } 
     }
     ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                        </div>


                                        <div class="tab-pane p-0" id="reminder" role="tabpanel">
                                             
                                             <div class="row gx-5 gy-3" style="margin-top:0px;" id="remenderdiv">
                                                        <div class="col-xl-3">
                                                                  <label for="department_name" class="form-label">Source</label>
                                                                  <input type="text" class="form-control"  placeholder="Enter Source" required>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 20px;" data-id="#reminder">Add</button>
                                                           <input type="hidden" class="updatess"/>
                                                            <input type="hidden" class="formtype" value="7"/>
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
             <th>Source</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody >
                  <?php
     if (!empty($main['source'])) {
    foreach ($main['source'] as $d1) {
        ?>
        <tr id='rows<?php echo $d1['id'];?>' >
                <td><?php echo $d1['name']?></td>
                 <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $d1['id'];?>,'<?php echo $d1['name'];?>','reminder');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $d1['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>

        <?php
        } 
     }
     ?>
        </tbody>
    </table>
</div>
                                                    </div>
                                             
                                             
                                        </div>
                                     
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
            
            <?php include("footer.php");?> 
            <span id="output"></span>
            <span id="dataedit"></span>

		</div>
        <!-- END PAGE-->
<style>
    .btn-primary{
        margin-top:31px !important;
    }
</style>
        <!-- SCRIPTS -->
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 


        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>

        <!-- POPPER JS -->
        <script src="build/assets/libs/%40popperjs/core/umd/popper.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- NODE WAVES JS -->
        <script src="build/assets/libs/node-waves/waves.min.js"></script>

        <!-- SIMPLEBAR JS -->
        <script src="build/assets/libs/simplebar/simplebar.min.js"></script>
        <link rel="modulepreload" href="build/assets/simplebar-635bad04.js" /><script type="module" src="build/assets/simplebar-635bad04.js"></script>

        <!-- COLOR PICKER JS -->
        <script src="build/assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script>
        
        <!-- MAIL SETTINGS JS -->
        <link rel="modulepreload" href="build/assets/mail-settings-818145a6.js" /><script type="module" src="build/assets/mail-settings-818145a6.js"></script>
    
  <!--<link rel="modulepreload" href="build/assets/color-picker-f2362010.js" /><script type="module" src="build/assets/color-picker-f2362010.js"></script>-->
        <!-- STICKY JS -->
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
	url: "data/app_setting.php",
	type: "POST",
	data: {id:xx},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}


function edit(id,name,type){

$("#"+type+" input[type='text']").val(name);
$("#"+type+" .updatess").val(id);

}

// document
$(".addbtn").on('click',(function() {
var data=$(this).data('id');

var cat=$(data+" input[type=text]").val();
var up=$(data+" .updatess").val();
var formtype=$(data+" .formtype").val();


$.ajax({
	url: "data/app_setting.php",
	type: "POST",
	data: {category:cat,update:up,formtype:formtype,data:data},
	success: function(html){
	$("#dataedit").text("");	
    $("#dataedit").prepend(html);
	},
	error: function(){} 	        
});
}));

</script>
    
    
	</body>

</html>
