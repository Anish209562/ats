<?php include("../session.php");
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
		<title> Client REPORTS </title>

        <!-- FAVICON -->
        <link rel="icon" href="../build/assets/images/brand-logos/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="../build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="../build/assets/icon-fonts/icons.css" rel="stylesheet">
        
        <!-- APP SCSS -->
        <link rel="preload" as="style" href="../build/assets/app-fce3f544.css" /><link rel="stylesheet" href="../build/assets/app-fce3f544.css" />

        <!-- NODE WAVES CSS -->
        <link href="../build/assets/libs/node-waves/waves.min.css" rel="stylesheet"> 

        <!-- SIMPLEBAR CSS -->
        <link rel="stylesheet" href="../build/assets/libs/simplebar/simplebar.min.css">

        <!-- COLOR PICKER CSS -->
        <link rel="stylesheet" href="../build/assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../build/assets/libs/%40simonwep/pickr/themes/nano.min.css">

        <!-- CHOICES CSS -->
        <link rel="stylesheet" href="../build/assets/libs/choices.js/public/assets/styles/choices.min.css">

        <!-- CHOICES JS -->
        <script src="../build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

        <!-- MAIN JS -->
        <script src="../build/assets/main.js"></script>

         
        <!-- QUILL CSS -->
        <link rel="stylesheet" href="../build/assets/libs/quill/quill.snow.css">
        <link rel="stylesheet" href="../build/assets/libs/quill/quill.bubble.css">

        <!-- FILEPOND CSS -->
        <link rel="stylesheet" href="../build/assets/libs/filepond/filepond.min.css">
        <link rel="stylesheet" href="../build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
        <link rel="stylesheet" href="../build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

        <!-- DATE & TIME PICKER CSS -->
        <link rel="stylesheet" href="../build/assets/libs/flatpickr/flatpickr.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">



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
    .btn-outline-primary:hover a{
        color: #fff !important;
    }
    .header-bar {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            font-weight: bold;
            color: #343a40;
        }
        .filter-bar {
            background-color: #ffffff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .filter-buttons .btn {
            border-radius: 0.5rem;
            font-size: 0.8rem;
            padding: 0.5rem 0.75rem;
        }
        .filter-buttons .btn.active {
            background-color: #0d6efd;
            color: #ffffff;
        }
        .report-table {
            background-color: #ffffff;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
        }
        .report-table th, .report-table td {
            padding: 1rem;
            vertical-align: middle;
            border-top: none;
            border-bottom: 1px solid #e9ecef;
        }
        .report-table thead th {
            background-color: #f8f9fa;
            color: #6c757d;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.85rem;
            cursor: pointer;
        }
        .report-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .table-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: bold;
        }
        .table-link:hover {
            text-decoration: underline;
        }
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            font-size: 0.9rem;
        }
        .side-arrows {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
        }
        .side-arrows .arrow {
            width: 2.5rem;
            height: 2.5rem;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .side-arrows .arrow i {
            color: #495057;
        }
        .mt-2 {
    margin-top:0 !important;
}

.table thead tr th {
    background: #111c432b !important;
    color: var(--menu-bg) !important;
    padding: 10px !important;
}
</style>
<style>
    .table-container {
    width: 100%;           /* Full width */
    max-height: 80vh;     /* Adjust as needed */
    overflow-x: auto;      /* Horizontal scroll */
    overflow-y: auto;      /* Vertical scroll */
}

.report-table {
    border-collapse: collapse;
    width: 100%;
    min-width: 1200px;     /* Force horizontal scroll if too narrow */
}

.report-table th,
.report-table td {
    border: 1px solid #ddd;
    padding: 6px 10px;
    white-space: nowrap;   /* Prevent wrapping so scrolling works */
}
</style>

	</head>

	<body>

   <span id="output"></span>
        
        <div id="loader">
			<img src="../build/assets/images/media/loader.svg" alt="">
		</div>
	
          <div class="page" style="justify-content: start !important;">

        
           <div class="main-content app-content p-2" style="margin-block-start: 0 !important;">

             <div class="container-fluid" style="padding: 0px;">

<?php include("header.php");?>

    <div class="table-container ">
       <?php 
       if($_GET['type']=='2'){?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>#Of Contacts</th>
                    <th>#Of Notes Count</th>
                </tr>
            </thead>
            <tbody>
      <?php 
       $s1=mysqli_query($host,"select name,id from client where subdomain='$subdomain' and date between '$start_date' and '$end_date'");  
       while ($d1 = mysqli_fetch_array($s1)) {
       $cid=$d1[1];
       $ii=mysqli_query($host,"select count(name) from item_details where itemid='$cid' and type='user'");
       $dd=mysqli_fetch_array($ii);
       $count=$dd[0];
       
       $ii2=mysqli_query($host,"select count(notes) from notes where sid='$cid' and tables='client'");
       $dd2=mysqli_fetch_array($ii2);
       $count2=$dd2[0];
       ?>
                <tr>
                    <td><?php echo $d1['name'];?></td>
                    <td><?php echo $count;?></td>
                    <td><?php echo $count2;?></td>
                </tr>
        <?php  } ?>
            </tbody>
        </table>
      <?php
       }
       else if($_GET['type']=='1'){
         ?>
<table class="table report-table example display">
    <thead>
  <tr>
    <th>Primary Owner</th>
    <th>Client Name</th>
    <th># of Contacts</th>
    <th>Status</th>
    <th>Contact Number</th>
    <th>Email ID</th>
    <th>Website</th>
    <th>Address</th>
    <th>Industry</th>
    <th>Category</th>
    <th>Payment Terms</th>
    <th>Created by</th>
    <th>Created ON</th>
    <th>Notes Count</th>
  </tr>
</thead>

<tbody>
    <?php 
    // Step 1: Get a distinct list of primary owners
    $s1 = mysqli_query($host,"select DISTINCT name_id from client_data where status='primary' and date between '$start_date' and '$end_date' order by name_id asc");  
    
    while ($d1 = mysqli_fetch_array($s1)) { 
        $owner = $d1['name_id'];
        
        // Step 2 & 3: Display the primary owner only once
    ?>
    <tr style="background:#d9e7f6; font-weight:bold;">
         <td colspan="15"><?php echo $owner; ?></td>
   </tr>
    <?php
        // Step 4: Get all clients for the current primary owner
        $cc_query = mysqli_query($host,"select T1.* from client as T1 JOIN client_data as T2 ON T1.id = T2.cid where T2.name_id = '$owner' and T2.status='primary' and T1.subdomain='$subdomain' order by T1.name asc");
        
        if(mysqli_num_rows($cc_query) > 0){
            // Step 5: Loop through and display each client
            while($row = mysqli_fetch_assoc($cc_query)) {
                $cid2 = $row['id'];
                
                // fetch contact count 
                $ii=mysqli_query($host,"select count(name) from item_details where itemid='$cid2' and type='user'");
                $dd=mysqli_fetch_array($ii);
                $count=$dd[0];
                
                // fetch notes count
                $ii2=mysqli_query($host,"select count(notes) from notes where sid='$cid2' and tables='client'");
                $dd2=mysqli_fetch_array($ii2);
                $count2=$dd2[0];
                
                $full_pterms_html = $row['pterms'];
                // Get the plain text version for truncation
                $full_pterms_plain = strip_tags($full_pterms_html);
                
                // Set the character limit
                $char_limit = 50;
                
                // Truncate the plain text if it's too long
                if (strlen($full_pterms_plain) > $char_limit) {
                    $truncated_pterms_plain = substr($full_pterms_plain, 0, $char_limit) . '...';
                } else {
                    $truncated_pterms_plain = $full_pterms_plain;
                }
                
    ?>
                <tr>
                    <td></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['Website']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['industry']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                          <td>
                        <?php if (strlen($full_pterms_plain) > $char_limit) { ?>
                            <span id="truncated-<?php echo $cid2; ?>"><?php echo $truncated_pterms_plain; ?></span>
                            <span id="full-<?php echo $cid2; ?>" style="display: none;"><?php echo $full_pterms_html; ?></span>
                            <a href="javascript:void(0)" onclick="toggleText('<?php echo $cid2; ?>')" id="toggle-link-<?php echo $cid2; ?>">Show full text</a>
                        <?php } else { ?>
                            <?php echo $full_pterms_html; ?>
                        <?php } ?>
                    </td>
                    <td><?php echo $row['createname']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['date'])); ?></td>
                    <td><?php echo $count2; ?></td>
                </tr>

<?php 
            }
        }  
    }
?>
</tbody></table>
         <?php
       }
       else if($_GET['type']=='3'){?>
<table class="table report-table example display">
    <thead>
  <tr>
    <th>Client Name</th>
    <th>Status</th>
    <th>Contact Number</th>
    <th>Email ID</th>
    <th>Website</th>
    <th>Address</th>
    <th>Industry</th>
    <th>Category</th>
    
    <th>Primary Owner</th>
    <th>Payment Terms</th>
    
    <th>About Company</th>
    <th>Created by</th>
    <th>Created ON</th>
  </tr>
</thead>

<tbody>
    <?php 
    $s1 = mysqli_query($host,"select * from client where subdomain='$subdomain' and date between '$start_date' and '$end_date' order by name asc");  
    
    while ($row= mysqli_fetch_array($s1)) { 
                $full_pterms_html = $row['pterms'];
                $full_pterms_plain = strip_tags($full_pterms_html);
                
                $char_limit = 50;
                
                if (strlen($full_pterms_plain) > $char_limit) {
                    $truncated_pterms_plain = substr($full_pterms_plain, 0, $char_limit) . '...';
                } else {
                    $truncated_pterms_plain = $full_pterms_plain;
                }
                
                
                 $full_pterms_html2 = $row['about'];
                $full_pterms_plain2= strip_tags($full_pterms_html2);
                
                if (strlen($full_pterms_plain2) > $char_limit) {
                    $truncated_pterms_plain2 = substr($full_pterms_plain2, 0, $char_limit) . '...';
                } else {
                    $truncated_pterms_plain2 = $full_pterms_plain2;
                }
                
    ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['Website']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['industry']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                          <td>
                        <?php if (strlen($full_pterms_plain) > $char_limit) { ?>
                            <span id="truncated-<?php echo "terms".$cid2; ?>"><?php echo $truncated_pterms_plain; ?></span>
                            <span id="full-<?php echo "terms".$cid2; ?>" style="display: none;"><?php echo $full_pterms_html; ?></span>
                            <a href="javascript:void(0)" onclick="toggleText('<?php echo "terms".$cid2; ?>')" id="toggle-link-<?php echo "terms".$cid2; ?>">Show full text</a>
                        <?php } else { ?>
                            <?php echo $full_pterms_html; ?>
                        <?php } ?>
                    </td>
                    
                         <td>
                        <?php if (strlen($full_pterms_plain2) > $char_limit) { ?>
                            <span id="truncated-<?php echo "about".$cid2; ?>"><?php echo $truncated_pterms_plain2; ?></span>
                            <span id="full-<?php echo "about".$cid2; ?>" style="display: none;"><?php echo $full_pterms_html2; ?></span>
                            <a href="javascript:void(0)" onclick="toggleText('<?php echo "about".$cid2; ?>')" id="toggle-link-<?php echo "about".$cid2; ?>">Show full text</a>
                        <?php } else { ?>
                            <?php echo $full_pterms_html2; ?>
                        <?php } ?>
                    </td>
                    
                    <td><?php echo $row['createname']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['date'])); ?></td>
                </tr>

<?php 
            }
 
?>
</tbody>
</table>
      <?php
       }
       else if($_GET['type']=='9'){?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Ownership</th>
                    <th>#Of Submissions</th>
                    <th>#Of Pipeline</th>
                 </tr>
            </thead>
            <tbody>
                 <?php 
                $s1=mysqli_query($host,"select createname,count(createid) as total from applicant where subdomain='$subdomain' and date between '$start_date' and '$end_date' group by createid order by createname asc");  
                 while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><?php echo $d1['createname'];?></td>
                    <td><?php echo $d1['total'];?></td>
                    <td><?php echo 0;?></td>
                </tr>
        <?php  } ?>
         
            </tbody>
        </table>
      <?php
       }
       
       ?>
       
    </div>

 
</div>


</div> 
 </div>

          
            </div> 
            <!-- END MAIN-CONTENT --> 


            <!-- FOOTER -->
            <?php include '../footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->

        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <!-- DATE & TIME PICKER JS -->
        <script src="../build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="../build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../build/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
        
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>
        <!-- END SCRIPTS -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

            <?php include 'footer.php';  ?>

	</body> 
</html>
