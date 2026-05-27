<?php
ob_start(function ($buffer) {
    return preg_replace('/<base\b[^>]*>/i', '', $buffer);
});
include("../session.php");
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
		<title> Applicant REPORTS </title>

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">


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
       if($_GET['type']=='5'){?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Notes Count</th>
                    <th>Task Count</th>
                    <th>Messages Count</th>
                </tr>
            </thead>
            <tbody>
      <?php 
       $s1=mysqli_query($host,"select name from applicant where subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' group by name");  
       while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><?php echo $d1['name'];?></td>
                    <td><?php echo 0;?></td>
                    <td><?php echo 0;?></td>
                    <td><?php echo 0;?></td>
                </tr>
        <?php  } ?>
            </tbody>
        </table>
      <?php
       }
       else if($_GET['type']=='7'){
         ?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Created By</th>
                    <th>Count</th>
                 </tr>
            </thead>
            <tbody>
                 <?php 
       $s1=mysqli_query($host,"select createname,count(createid) as total from applicant where subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' group by createid order by createname asc");  
 
    while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><?php echo $d1['createname'];?></td>
                    <td><?php echo $d1['total'];?></td>
                </tr>
        <?php  } ?>
         
            </tbody>
        </table>
         <?php
       }
       else if($_GET['type']=='8'){
         ?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Count</th>
                 </tr>
            </thead>
            <tbody>
                 <?php 
       $s1=mysqli_query($host,"select createtype,count(createtype) as total from applicant where subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' group by createtype order by createtype asc");  
 
    while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><?php echo $d1['createtype'];?></td>
                    <td><?php echo $d1['total'];?></td>
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
                    <th>Applicant Status</th>
                    <th>Count</th>
                 </tr>
            </thead>
            <tbody>
                 <?php 
      
       $s1=mysqli_query($host,"SELECT status,COUNT(status) AS total FROM applicant where status in ('INTERNAL SCREEN REJECT','FIRSTMILE PANEL REJECT','ASSIGNED TO PRESELECTION TEAM','SUBMITTED TO CLIENT','DROP','HOLD BY CLIENT') and subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' GROUP BY status ORDER BY status ASC;");  
      while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><?php echo $d1['status'];?></td>
                    <td><?php echo $d1['total'];?></td>
                </tr>
        <?php  } ?>
         
            </tbody>
        </table>
         <?php
       }
       else if($_GET['type']=='3'){
$username = $_SESSION['username'];

$customRes = mysqli_query($host,
    "SELECT * FROM custom 
     WHERE username='$username' 
       AND type='applicant' 
       AND report_type='1'
     LIMIT 1"
);

$realColumns = [];
$commentColumns = [];
$columnOrder = [];

if (mysqli_num_rows($customRes) > 0) {

    $customRow = mysqli_fetch_assoc($customRes);

    $groups = $customRow['groups'];
    $order  = $customRow['orders'];

    $realColumns    = array_map('trim', explode(",", $customRow['col']));
    $commentColumns = array_map('trim', explode(",", $customRow['comment']));
    $columnOrder    = array_map('trim', explode(",", $customRow['tcolumn']));

} else {

    $groups = "";  
    $order  = "ORDER BY applicant.id DESC";

    $realColumns = ['id','name','mobile','email','status','source','date','ltime','createname'];

    // Fetch labels
    $cm = [];
    $res = mysqli_query($host,"SHOW FULL COLUMNS FROM applicant");
    while ($c = mysqli_fetch_assoc($res)) {
        $cm[$c['Field']] = $c['Comment'];
    }

    foreach ($realColumns as $c) {
        $commentColumns[] = $cm[$c] ?: ucfirst($c);
        $columnOrder[]    = $c;
    }
}
$appQ = mysqli_query($host,
    "SELECT * FROM applicant
     WHERE subdomain='$subdomain'
       AND DATE(date) BETWEEN '$start_date' AND '$end_date'
     $groups
     $order"
);

?>
<table class="table report-table example display">
  <?php
echo "<thead><tr>";

$colCounter = 0;

foreach ($commentColumns as $i => $head) {

    $colCounter++;

    // print dynamic heading
    echo "<th>" . htmlspecialchars($head) . "</th>";

    // After 6 headings → insert job columns
    if ($colCounter == 6) {
        echo "<th>Profile Status</th>";
        echo "<th>Job Title</th>";
        echo "<th>Job Code</th>";
        echo "<th>Client Name</th>";
    }
}

echo "</tr></thead>";

echo "<tbody>";

while ($d1 = mysqli_fetch_assoc($appQ)) {

    // fetch job for this applicant
    $sid = $d1['id'];

    $jobTitle = "N/A";
    $jobClient = "N/A";
    $jobcode = "N/A";
    $jobstatus = "N/A";
    $profileStatus = !empty($d1['status']) ? $d1['status'] : "N/A";

    $sj = mysqli_query($host,"SELECT jobid,status as jobstatus FROM submitjob WHERE sid='$sid' LIMIT 1");
    if (mysqli_num_rows($sj)>0) {
        $sjRow = mysqli_fetch_assoc($sj);
        $jobid = $sjRow['jobid'];
        $jobstatus=$sjRow['jobstatus'];
        $jobQ = mysqli_query($host,"SELECT job_title, client,job_code FROM job WHERE id='$jobid' LIMIT 1");
        if ($jobRow = mysqli_fetch_assoc($jobQ)) {
            $jobTitle  = $jobRow['job_title'];
            $jobClient = $jobRow['client'];
            $jobcode=$jobRow['job_code'];
        }
    }

    echo "<tr>";

    $colCounter = 0;

    foreach ($realColumns as $col) {

        $colCounter++;

        echo "<td>";

        // ========================
        // Dynamic FIELD LOGIC
        // ========================
        switch ($col) {

            case "id":
                echo "<a href='../app_view.php?sid=".$d1[$col]."' target='_blank'>".$d1[$col]."</a>";
                break;

            case "name":
                $full = htmlspecialchars($d1[$col]);
                $short = strlen($full) > 20 ? substr($full,0,20)."..." : $full;
                echo "<a href='../app_view.php?sid=".$d1['id']."' target='_blank' title='$full'>$short</a>";
                break;

            case "status":
                echo $jobstatus;
                break;

            case "address":
                $full = htmlspecialchars($d1[$col]);
                if ($full == "") { echo "N/A"; break; }
                $short = strlen($full) > 12 ? substr($full,0,12)."..." : $full;
                echo strlen($full) > 12 ? "<span title='$full'>$short</span>" : $short;
                break;

            case "date":
                echo date("d M, Y H:i:s", strtotime($d1[$col]));
                break;

            case "ltime":
                echo !empty($d1[$col]) ? date("d M, Y H:i:s A", strtotime($d1[$col])) : "N/A";
                break;

            default:
                echo !empty($d1[$col]) ? htmlspecialchars($d1[$col]) : "N/A";
        }

        echo "</td>";

        // ========================
        // Insert job columns AFTER 6 dynamic columns
        // ========================
        if ($colCounter == 6) {
            echo "<td>" . htmlspecialchars($profileStatus) . "</td>";
            echo "<td>" . ($jobTitle ?: "N/A") . "</td>";
            echo "<td>" . ($jobcode ?: "N/A") . "</td>";
            echo "<td>" . ($jobClient ?: "N/A") . "</td>";
        }
    }

    echo "</tr>";
}

echo "</tbody>";

  ?>
</table>
         <?php
       }
       else if($_GET['type']=='6'){?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Applicant Status</th>
                    <th>Count</th>
                 </tr>
            </thead>
            <tbody>
                 <?php 
      
       $s1=mysqli_query($host,"SELECT status,COUNT(status) AS total FROM applicant where subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' GROUP BY status ORDER BY status ASC;");  
      while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><?php echo $d1['status'];?></td>
                    <td><?php echo $d1['total'];?></td>
                </tr>
        <?php  } ?>
         
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
                $s1=mysqli_query($host,"select createname,count(createid) as total from applicant where subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' group by createid order by createname asc");  
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
       
       else if($_GET['type']=='2'){
          ?>
         <table class="table report-table example display">
    <thead>
        <tr>
            <th>Created By</th>
            <th>Source</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT createname, createtype, COUNT(*) as total FROM applicant where subdomain='$subdomain' and date(date) between '$start_date' and '$end_date' GROUP BY TRIM(LOWER(createid)), createtype ORDER BY createid";
        $res = mysqli_query($host, $sql);

        $currentUser = "";
        $userTotal = 0;

        while ($row = mysqli_fetch_array($res)) {
            if ($currentUser != $row['createname']) {
                
                if ($currentUser != "") {
                    echo "<tr style='background:#f0f0f0;font-weight:bold;'>
                            <td colspan='2' align='right'>Total</td>
                            <td>{$userTotal}</td>
                          </tr>";
                }

                $currentUser = $row['createname'];
                $userTotal = 0;

                echo "<tr style='background:#cfe2ff;font-weight:bold;'>
                        <td colspan='3'>{$currentUser}</td>
                        <td></td>
                        <td></td>
                      </tr>";
            }

            echo "<tr>
                    <td></td>
                    <td>{$row['createtype']}</td>
                    <td>{$row['total']}</td>
                  </tr>";

            $userTotal += $row['total'];
        }

        if ($currentUser != "") {
            echo "<tr style='background:#f0f0f0;font-weight:bold;'>
                    <td colspan='2' align='right'>Total</td>
                    <td >{$userTotal}</td>
                  </tr>";
        }
        ?>
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
