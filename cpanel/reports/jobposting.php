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
		<title> MERAQUI REPORTS </title>

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
            width: 100% !important;
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

<?php
include("header.php");
?>

    <div class="table-container ">
       <?php 
        if($_GET['type']=='1') { ?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Job Title</th>
                    <th>Job Code</th>
                    <th>Assigned To</th>
                    <th>Recruitment Manager</th>
                    <th>Job Status</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
         $s1=mysqli_query($host,"select * from job where subdomain='$subdomain' and date(start_job) between '$start_date' and '$end_date' order by id desc");  
         while ($d1 = mysqli_fetch_array($s1)) { ?>
                <tr>
                    <td><?php echo $d1['client'];?></td>
                    <td><?php echo $d1['job_title'];?></td>
                    <td><a href="job_view.php?sid=<?php echo $d1['id'];?>" target="_blank" class="table-link"><?php echo $d1['job_code'];?></a></td>
                    <td><?php echo $d1['assigned'];?></td>
                    <td><?php echo $d1['recrutment'];?></td>
                    <td><?php echo $d1['status'];?> - Today</td>
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
                    <th>Client</th>
                    <th>#Active Jobs</th>
                    <th>Number of Positions</th>
                    <th>#Of Submissions</th>
                    <th>#Of Client Sub</th>
                    <th>#Of Active Client Sub</th>
                    <th>#Of Active Interviews(Excluded Internal Interview)</th>
                    <th>#Of Offers accepted</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
       $s1=mysqli_query($host,"select client,count(case when status='Active' then 1 else 0 end) as totalActivejob from job where subdomain='$subdomain' and date(start_job) between '$start_date' and '$end_date' group by cid order by id desc");  
 
    while ($d1 = mysqli_fetch_array($s1)) {?>
                <tr>
                    <td><a href="client_view.php?sid=<?php echo $d1['id'];?>" target="_blank"><?php echo $d1['client'];?></a></td>
                    <td><?php echo $d1['totalActivejob'];?></td>
                    <td><?php echo "0";?></td>
                    <td><?php echo 0;?></td>
                    <td><?php echo 0;?></td>
                    <td><?php echo 0;?></td>
                     <td><?php echo 0;?></td>
                    <td><?php echo 0;?></td>
                </tr>
        <?php  } ?>
         
            </tbody>
        </table>
         <?php
       }
        else if($_GET['type']=='3'){
         ?>
<table class="table report-table example display">
    <thead>
        <tr>
            <th>Client</th>
            <th>Job Code</th>
            <th>Job Title</th>
            <th>Job Status</th>
            <th>Client Bill Rate</th>
            <th>Pay rate</th>
            <th>State</th>
            <th>Client Manager</th>
            <th>Number of Positions</th>
            <th>Recruitment Manager</th>
            <th>Job Created</th>
            <th>#Of Submissions</th>
            <th>#Of Client Sub</th>
            <th>#Of Interviews</th>
            <th>#Of Confirmations</th>
            <th>Job #1</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM job WHERE subdomain='$subdomain' and date(start_job) between '$start_date' and '$end_date' ORDER BY client asc";
        $s1 = mysqli_query($host, $sql);

        $currentClient = "";
        $jobCount = 0;

        while ($d1 = mysqli_fetch_array($s1)) {
            
$states = explode(",", $d1['state']); // split states into array
$displayStates = array_slice($states, 0, 3); // only first 3
$displayText = implode(", ", $displayStates); // for cell display
$tooltipText = '["' . implode('","', $states) . '"]';
            
            if ($currentClient != $d1['client']) {
             
                $jobCount = 0;
                $currentClient = $d1['client'];

                echo "<tr class='group-row' style='background:#cfe2ff;font-weight:bold;'>
        <td colspan='16'>{$currentClient}</td>
      </tr>";
            }

            $jobCount++;

            echo "<tr>
                <td></td>
                <td><a href='job_view.php?sid={$d1['id']}' target='_blank'>{$d1['job_code']}</a></td>
                <td><a href='job_view.php?sid={$d1['id']}' target='_blank'>{$d1['job_title']}</a></td>
                <td>{$d1['status']}</td>
                <td>{$d1['bill_type']}/{$d1['rate']}/{$d1['bill_time']}</td>
                <td>0</td>
<td data-bs-toggle='tooltip' data-bs-placement='top'
    title='$tooltipText'>
    $displayText
</td>
                <td>{$d1['c_manager']}</td>
                <td>{$d1['position']}</td>
                <td>{$d1['recrutment']}</td>
                <td>{$d1['date']}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>";
        }
        
        
        if ($currentClient != "") {
            echo "<tr style='background:#f0f0f0;font-weight:bold;'>
                    <td colspan='16' align='right'>Total Jobs: $jobCount</td>
                  </tr>";
        }

        ?>
    </tbody>
</table>
         <?php
       }
       
              else if($_GET['type']=='33'){
?>
<table class="table report-table example display">
    <thead>
        <tr>
            <th>Job Status</th>
            <th>Job Code</th>
            <th>Job Title</th>
            <th>Client</th>
            <th>Client Bill Rate</th>
            <th>Pay rate</th>
            <th>State</th>
            <th>Client Manager</th>
            <th>Account Manager</th>
            <th>Number of Positions</th>
            <th>Recruitment Manager</th>
            <th>Job Created</th>
            <th>#Of Submissions</th>
            <th>#Of Client Sub</th>
            <th>#Of Interviews</th>
            <th>#Of Confirmations</th>
            <th>Job #1</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        
        // -------------------------
        // 1️⃣  First: Count per Status
        // -------------------------

        $countQuery = "
            SELECT status, COUNT(*) AS total 
            FROM job 
            WHERE subdomain='$subdomain'
            AND date(start_job) BETWEEN '$start_date' AND '$end_date'
            GROUP BY status
        ";

        $countResult = mysqli_query($host, $countQuery);
        $statusTotal = [];

        while($r = mysqli_fetch_assoc($countResult)) {
            $statusTotal[$r['status']] = $r['total'];
        }

        // -------------------------
        // 2️⃣  Now fetch actual rows
        // -------------------------

        $sql = "
            SELECT * FROM job 
            WHERE subdomain='$subdomain'  
            AND date(start_job) BETWEEN '$start_date' AND '$end_date'
            ORDER BY status ASC, client ASC
        ";

        $s1 = mysqli_query($host, $sql);

        $currentStatus = "";

        while ($d1 = mysqli_fetch_array($s1)) {

            // STATES
            $states = explode(",", $d1['state']);
            $displayStates = implode(", ", array_slice($states, 0, 3));
            $tooltipText = '["' . implode('","', $states) . '"]';

            // -------------------------
            // 3️⃣  New Status Heading
            // -------------------------
            if ($currentStatus != $d1['status']) {

                $currentStatus = $d1['status'];
                $total = $statusTotal[$currentStatus] ?? 0;

                echo "<tr class='group-row' style='background:#cfe2ff;font-weight:bold;'>
                        <td colspan='16'>{$currentStatus} (Total: $total)</td>
                      </tr>";
            }

            // -------------------------
            // 4️⃣  Job row
            // -------------------------
            echo "<tr>
                <td></td>
                <td><a href='job_view.php?sid={$d1['id']}' target='_blank'>{$d1['job_code']}</a></td>
                <td><a href='job_view.php?sid={$d1['id']}' target='_blank'>{$d1['job_title']}</a></td>
                <td>{$d1['client']}</td>
                
                <td>{$d1['bill_type']}/{$d1['rate']}/{$d1['bill_time']}</td>
                <td>0</td>

                <td data-bs-toggle='tooltip' data-bs-placement='top' title='$tooltipText'>
                    $displayStates
                </td>

                <td>{$d1['c_manager']}</td> <td>{$d1['account']}</td>
                <td>{$d1['position']}</td>
                <td>{$d1['recrutment']}</td>
                <td>{$d1['date']}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>";
        }
        ?>
    </tbody>
</table>

<?php
}

       
        else if($_GET['type']=='4'){

$customRes = mysqli_query($host, "SELECT * FROM custom WHERE username='$username' AND type='job' and report_type='1' LIMIT 1");
$hasCustom = mysqli_num_rows($customRes) > 0;

$realColumns = [];
$commentColumns = [];
$qualifiedColumns = [];

if ($hasCustom) {
    $customRow = mysqli_fetch_array($customRes);

    $realColumns      = array_map('trim', explode(",", $customRow['col']));
    $commentColumns   = array_map('trim', explode(",", $customRow['comment']));
    $showColumn=$commentColumns;
    $tcolList = $customRow['tcolumn'];
    $groups=$customRow['groups'];
    if($groups!=''){
        $gg=" group by $groups";
    }
    $orders=$customRow['orders'];
    if($orders!=''){
        $ord="order by $orders asc";
    }

    if (!in_array('id', $realColumns, true)) {
        array_unshift($realColumns, 'id');
        array_unshift($commentColumns, 'ID');
        $tcolList = "job.id," . ltrim($tcolList, ',');
    }

    if (!in_array('position', $realColumns, true)) {
        $insertAt = array_search('status', $realColumns, true);
        $insertAt = ($insertAt === false) ? count($realColumns) : $insertAt + 1;
        array_splice($realColumns, $insertAt, 0, ['position']);
        array_splice($commentColumns, $insertAt, 0, ['No of Roles']);
        $tcolList .= (trim($tcolList) !== '' ? ',' : '') . 'job.position';
    }

} else {
    $showColumn = ['id','job_code','job_title','start_job','priority','assigned','status','position','client','c_manager','date','ltime', 'createname']; // <-- your choices

    $sql = "SHOW FULL COLUMNS FROM `job`";
    $res = mysqli_query($host, $sql);
    $commentsMap = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $commentsMap[$row['Field']] = $row['Comment'];
    }

    foreach ($showColumn as $c) {
        $realColumns[]      = $c;
        $commentColumns[]   = $commentsMap[$c] ?: ucfirst($c);
        $qualifiedColumns[] = "job." . $c;
    }
    $tcolList = implode(",", $qualifiedColumns);
}
          ?>
<table class="table report-table example display">
    <thead>
        <tr>
<?php foreach ($commentColumns as $i => $colHead) { 
    $realCol = $realColumns[$i];
    if ($realCol === 'id') continue; // skip 'id' column
?>
    <th data-col="<?= htmlspecialchars($realCol) ?>">
        <?php echo $realCol!="position" ? htmlspecialchars($colHead) : "No of Roles"; ?>
    </th>
<?php } ?>
        </tr>
    </thead>
    <tbody>

<?php 
$s1=mysqli_query($host,"select $tcolList from job where subdomain='$subdomain' and date(start_job) between '$start_date' and '$end_date' $gg $ord");  

while ($d1 = mysqli_fetch_array($s1)) {
            
$states = explode(",", $d1['state']); // split states into array
$displayStates = array_slice($states, 0, 3); // only first 3
$displayText = implode(", ", $displayStates); // for cell display
$tooltipText = '["' . implode('","', $states) . '"]';
           ?>
<tr>
    <?php foreach ($realColumns as $col): ?>
        <?php if ($col === 'id') continue; ?>
        <td>
            <?php 
            switch ($col) {

                case "job_code":
                    echo '<a href="job_view.php?sid='.$d1['id'].'" target="_blank">'.$d1[$col].'</a>';
                    break;

                case "job_title":
                    echo '<a href="job_view.php?sid='.$d1['id'].'" target="_blank">'.$d1[$col].'</a>';
                    break;

                case "bill_type":
                    echo $d1['bill_type']."/".$d1['rate']."/".$d1['bill_time'];
                    break;

                case "state": // adjust this key to your real column
                    echo '<span data-bs-toggle="tooltip" data-bs-placement="top" 
                            title="'.htmlspecialchars($tooltipText).'">'
                            .$displayText.
                         '</span>';
                    break;

                case "date":
                    echo date('d M, Y', strtotime($d1[$col])) . " " . date('H:i:s A', strtotime($d1['time']));
                    break;

                case "ltime":
                    echo $d1[$col] ? date('d M, Y H:i:s A', strtotime($d1[$col])) : 'N/A';
                    break;

               // Default plain text
                default:
                    echo htmlspecialchars($d1[$col]) ? htmlspecialchars($d1[$col]) : 'N/A';
                    break;
            }
            ?>
        </td>
    <?php endforeach; ?>

</tr>
        <?php
        }
     
        ?>
    </tbody>
</table>
          <?php
       }
        else if($_GET['type']=='5'){?>
        <table class="table report-table example display">
            <thead>
                <tr>
                    <th>Job Status</th>
                    <th>Job #</th>
                </tr>
            </thead>
            <tbody>
      <?php 
       $s1=mysqli_query($host,"select status,count(status) as total from job where subdomain='$subdomain' and date(start_job) between '$start_date' and '$end_date' group by status order by id desc");  
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


<?php include("footer.php");?>

	</body> 
</html>
