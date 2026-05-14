<?php
include("../session.php");

$customRes = mysqli_query($host, "SELECT * FROM custom WHERE username='$username' AND type='job' and report_type!='1' LIMIT 1");
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

} else {
    $showColumn = ['job_code','job_title','start_job','assigned','status','client','date','ltime', 'createname']; // <-- your choices

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

$searchType = (int)$_POST['searchType'];

$tt = '';
if ($searchType === 1) {
    $search=$_POST['search']; $column=$_POST['column']; $realcolumn=$_POST['realcolumn'];
    if ($column == "null") {
        $likeParts = [];
        foreach ($realColumns as $col) {
            $likeParts[] = "$col LIKE '%" . mysqli_real_escape_string($host, $search) . "%'";
        }
        $tt = implode(" OR ", $likeParts);
        $tt = " AND ($tt)";
    } else {
        $tt = " AND $column LIKE '%" . mysqli_real_escape_string($host, $search) . "%'";
    }
} else if ($searchType === 2) {
        $filters = isset($_POST['filters']) ? json_decode($_POST['filters'], true) : [];
        
    foreach ($filters as $col => $values) {
    if (!is_array($values) || count($values) === 0) {
        continue; // skip empty filter
    }

    $escaped = array_map(fn($v) => "'" . mysqli_real_escape_string($host, $v) . "'", $values);
    $tt .= " AND $col IN (" . implode(',', $escaped) . ")";
}
}

// job post status
$statusList = [];
$sts = mysqli_query($host, "SELECT name FROM appSetting WHERE tables='job' and type='status' order by name asc");
while ($srow = mysqli_fetch_array($sts)) {
    $statusList[] = $srow[0];
}

foreach ($realColumns as $col) {
    if ($col === 'id') continue; // skip id
    if ($col === 'status') {
        $columnOptions[$col] = $statusList;
    } else {
        $optQuery = mysqli_query($host, "SELECT DISTINCT `$col` FROM job WHERE `$col` IS NOT NULL AND `$col` != '' ORDER BY `$col` ASC");
        $values = [];
        while ($opt = mysqli_fetch_assoc($optQuery)) {
            $values[] = $opt[$col];
        }
        $columnOptions[$col] = $values;
    }
}

$x=$_POST['x'];
if($x){
$ch=mysqli_query($host,"select * from job where id='$x'");
$dh=mysqli_fetch_array($ch);
?>
<style>

.status-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 1rem;
        margin: 0 0.5rem;
        flex-grow: 1;
        max-width: 150px; /* Adjust as needed */
    }
    .status-number {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }
    .status-label {
        font-size: 0.75rem;
        color: #6c757d;
        text-transform: uppercase;
        margin-bottom: 0;
    }
    .table-responsive table thead tr th{
            background: #111c431c !important;
    }

.action-button {
    color: #007bff; /* Blue color for the text */
    text-decoration: none; /* Removes the underline from the link */
    padding: 5px 10px; /* Adds some space around the text for a button-like feel */
    transition: background-color 0.3s ease; /* Smooth transition for the hover effect */
    cursor: pointer; /* Indicates that the text is clickable */
}

.action-button:hover {
    background-color: rgba(var(--dark-rgb), .1);
    color: var(--default-text-color);
    border-color: rgba(var(--dark-rgb), .1);
}
</style>
<div class="offcanvas offcanvas-end" tabindex="-1" id="jobOffcanvas" aria-labelledby="jobOffcanvasLabel" style="width:40%;">
    <div class="offcanvas-header bg-primary text-white">
        <h5 class="offcanvas-title" id="jobOffcanvasLabel"><?php echo $dh['job_code']. " ".strtoupper($dh['job_title']);?></h5>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        
        <div class="card mb-4 p-3">
            <div class="row g-2">
                <div class="col-6"><strong>Pay Rate / Salary:</strong>  <br/>
                <?php echo 
    ($dh['bill_type'] ? $dh['bill_type'] : 'N/A') . " / " .
    ($dh['rate'] ? $dh['rate'] : 'N/A') . " / " .
    ($dh['bill_time'] ? $dh['bill_time'] : 'N/A');
?>
                </div>
                <div class="col-6"><strong>Client:</strong> <br><?php echo  $dh['client'] ? $dh['client'] : 'N/A';;?></div>
                <div class="col-6"><strong>Country:</strong> <br><?php echo $dh['country'] ? $dh['country'] : 'N/A';?></div>
                <div class="col-6"><strong>Job Status:</strong> <br><?php echo  $dh['status'] ? $dh['status'] : 'N/A';?></div>
                <div class="col-12"><strong>Location:</strong> <br>N/A</div>
            </div>
            <hr class="my-3">
           <div class="d-flex justify-content-around my-3">
    
    <div class="status-card text-center">
        <h3 class="status-number text-dark">0</h3>
        <p class="status-label">#OF SUBMISSIONS</p>
    </div>

    <div class="status-card text-center">
        <h3 class="status-number text-dark">0</h3>
        <p class="status-label">#OF PIPELINE</p>
    </div>

    <div class="status-card text-center">
        <h3 class="status-number text-danger">0</h3>
        <p class="status-label">#OF CLIENT SUBMISSIONS</p>
    </div>

    <div class="status-card text-center">
        <h3 class="status-number text-warning">0</h3>
        <p class="status-label">#OF INTERVIEWS</p>
    </div>

    <div class="status-card text-center">
        <h3 class="status-number text-primary">0</h3>
        <p class="status-label">#OF HIRES</p>
    </div>

</div>
        </div>

        <div class="d-flex mb-3 nav-buttons" style="gap:20px;" role="tablist">
            <button class="btn btn-outline-primary active" id="details-tab-btn" data-bs-toggle="tab" data-bs-target="#details" type="button">Job Details</button>
            <button class="btn btn-outline-primary" id="skills-tab-btn" data-bs-toggle="tab" data-bs-target="#skills" type="button">Skills & Job Description</button>
            <button class="btn btn-outline-primary" id="notes-tab-btn" data-bs-toggle="tab" data-bs-target="#notes" type="button">Notes(0)</button>
            <button class="btn btn-outline-primary" id="email-tab-btn" data-bs-toggle="tab" data-bs-target="#email" type="button">Email Merges</button>
        </div>

            <div class="tab-content" id="jobTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel">
                  <div class="row g-2">
    <div class="col-6"><strong>Client Bill Rate / Salary:</strong> N/A</div>
    <div class="col-6"><strong>Required Documents:</strong> RESUME</div>
    <div class="col-6"><strong>Interview Mode:</strong> -</div>
    <div class="col-6"><strong>Experience:</strong> <?php echo  $dh['min_exp']."-".$ds['max_exp'];?> Years</div>
    <div class="col-6"><strong>Assigned To:</strong> <?php echo  $dh['assigned'] ? $dh['assigned'] : 'N/A';?></div>
    <div class="col-6"><strong>Job Type:</strong><?php echo  $dh['job_type'] ? $dh['job_type'] : 'N/A';?></div>
</div>
                </div>
                <div class="tab-pane fade" id="skills" role="tabpanel">
    <div class="col-6"><strong>Primary Skills</strong> 
    <br>
    <?php echo $dh['primarys'] ? $dh['primarys'] : 'N/A';?>
    </div>
    <div class="col-6"><strong>Secondary Skills</strong> 
    <br>
    <?php echo $dh['secondary'] ? $dh['secondary'] : 'N/A';?>
    </div>
    <div class="col-12"><strong>Job Description:</strong>
    <br>
    <?php echo  $dh['job_desc'] ? $dh['job_desc'] : 'N/A';?>
    </div>
    
    
</div>
                <div class="tab-pane fade" id="notes" role="tabpanel">
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
                
                <div class="tab-pane fade" id="email" role="tabpanel">

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mail Sender</th>
                <th scope="col">Email Subject</th>
                <th scope="col">Applicant Name</th>
                <th scope="col">Job Title/Search String</th>
                <th scope="col">Zip Location</th>
                <th scope="col">Email Read</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class="text-center text-muted">No data available</td>
            </tr>
        </tbody>
    </table>
</div>

                </div>
            </div>

    </div>
</div>
<script>
   setTimeout(function (){
        const jobOffcanvas = document.getElementById('jobOffcanvas');
        const bsOffcanvas = new bootstrap.Offcanvas(jobOffcanvas);
        bsOffcanvas.show();
        
    $("#job-loader").css("display","none");
   },900);
</script>
<?php } ?>


<?php
if($x=='' && $x==0){
?>
<script>
        
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

function updatejobStatus(id,type,extra){

id = $("#hiddenSelectedIdsSorry").val();

$('#loader').show();
$.ajax({
      type: "POST",
      url: "content/view_applicant.php",
      data: { x: id ,type:type,extra:extra},
      success: function (html) {
       $("#dataedit").html(html);
      }
    });
    
}

function particularCall(id,type,extra){

if (!id || id === "") {
      if(extra=="0101"){
          id = $("#hiddenSelectedId_job").val();
      }else{
         id = $("#hiddenSelectedIds").val();
      }
    }
$('#loader').show();
$.ajax({
      type: "POST",
      url: "content/view_applicant.php",
      data: { x: id ,type:type,extra:extra},
      success: function (html) {
       $("#dataedit").html(html);
      }
    });
    
}
    
function showQuickView(id){
    $('#job-loader').show();

    $.ajax({
      type: "POST",
      url: "content/jobposting.php",
      data: { x: id },
      success: function (html) {
       $("#dataedit").html(html);
      }
    });
}

function callJobs(el, id) {
  const icon = $(el); // the <i> element
  const checkbox = $("input.checkboxx[value='" + id + "']");
  const tr = checkbox.closest('tr');

  const extraRowClass = '.job-extra-row-' + id;
  

  if (icon.hasClass('fa-plus')) {
  
  $('.job-extra-row').remove();
  $('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
  
    icon.removeClass('fa-plus').addClass('fa-minus');

    $(extraRowClass).remove();
    $('#job-loader').show();

    $.ajax({
      type: "POST",
      url: "content/more_job_row.php",
      data: { jid: id ,type:"2"},
      success: function (html) {
        tr.after(html);
        $('#job-loader').hide();
      }
    });

  } else {
    icon.removeClass('fa-minus').addClass('fa-plus');
    $(extraRowClass).remove();
  }
}

</script>

<style>
.dt-scroll-headInner, .dt-scroll-headInner table{
    width: 100% !important;
}
 #myTable th {
    position: relative;
    white-space: nowrap;  /* Prevent line break in header */
    vertical-align: middle;
    overflow: hidden;
}

.filter-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 5px;
}

#myTable {
    table-layout: fixed;
    width: 100% !important;
}


.dropdown-menu {
    position: absolute !important;
    top: 100% !important;      /* right below the button */
    left: 0 !important;
    z-index: 1050 !important;  /* above table rows */
    display: none;  
     transform: none !important;/* initially hidden */
}

.dropdown-menu.show {
    display: block !important;
}


      
     td a, #myTable tbody td i{
    color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1)) !important;
}

.mera-primary , .mera-primarys{
    opacity: 0;
    transition: opacity 0.3s ease;
    --bs-text-opacity: 1;
    color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
}

/* Show icon only for the hovered row's icon */
#myTable tbody tr:hover td .mera-primary {
    opacity: 1;
    cursor: pointer;
}

.subTLV21 tbody tr:not(.job-extra-row):hover td .mera-primarys {
    opacity: 1;
    cursor: pointer;
}

.job-extra-row th {
  background-color: #f4f7fc;
  padding: 20px;
  border-top: none;
}

    .listTabB {
    padding-left: 30px;
}
.subTLV21 tbody td{
text-align: center !important;
}

div.dataTables_scrollBody {
  overflow-x: scroll !important;
}
div.dt-scroll-body thead tr th, div.dt-scroll-body thead tr td, div.dt-scroll-body tfoot tr th, div.dt-scroll-body tfoot tr td {
        background: #111c431c !important;
}
table.table.dataTable.table-striped > tbody > tr:nth-of-type(2n+1) > * {
    box-shadow: inset 0 0 0 9999px rgba(var(--dt-row-stripe), 0.03);
}
.table th, .table td {
    padding: 12px 0px !important;
}

    td a{
        color:rgba(var(--bs-link-color-rgb),var(--bs-link-opacity,1)) !important;
    }
/* Container around the button (can stay in table header) */
.filter-container {
    display: inline-block;
    position: relative; /* not needed anymore for dropdown positioning to body, but safe */
    margin-left: 5px;
}

/* The filter button */
.filter-button {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

/* The dropdown with checkboxes */
.filter-options {
    display: none; /* hide by default */
    max-height: 250px; /* scrollable */
    overflow-y: auto;
    min-width: 150px;
    max-width: 300px !important;
    background-color: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    padding: 0px !important;
    z-index: 10000; /* very high to be above table */
}

/* Show dropdown */
.filter-options.show {
    display: block;
}

/* Each label inside the dropdown */
.filter-options label {
    display: flex;
    align-items: center;
    gap: 8px; /* space between checkbox and text */
    padding: 5px;
    font-size: 14px;
    color: #4a5568;
    cursor: pointer;
}

/* Hover effect for labels */
.filter-options label:hover {
    background-color: #f7fafc;
}

/* Style for the checkboxes */
.filter-options input[type="checkbox"] {
    width: 16px;
    height: 16px;
    cursor: pointer;
}

</style>
<div class="row">
    
<div class="top-controls" style="display: flex;justify-content: space-between;align-items: center;">
    
<div class="input-group mb-3" style="width:23%">
  <button class="btn btn-primary dropdown-toggle" id="cc" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $realcolumn ? $realcolumn :'Search Any'; ?></button>
  <ul class="dropdown-menu" id="columnSelect">
    <li><a class="dropdown-item" href="javascript:void(0);" data-col="null">Search Any</a></li>
    <?php
    foreach ($showColumn as $colName) {
        if ($colName === 'id') continue;
        $colLabel = $commentsMap[$colName] ?? ucfirst($colName); // reuse previous query
        echo '<li><a class="dropdown-item" href="javascript:void(0);" data-col="'.$colName.'">'.htmlspecialchars($colLabel).'</a></li>';
    }
    ?>
  </ul>
  <input type="text" id="search-text" class="form-control" placeholder="Search text" value="<?php if(isset($search)){echo $search;}?>"/>
  <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
</div>
<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#columnOffcanvas">Filter</button>
</div>
<div class="card custom-card" style="padding: 15px 25px;margin-bottom: 0px;padding-bottom: 10px;">

<div style="overflow-x: auto;position:relative;">
     <div class="dropdown">
  <button class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="actionBtnWrapper" style="display:none;">
    Actions
  </button>
  <ul class="dropdown-menu shadow animate__animated animate__fadeIn p-2" aria-labelledby="actionBtnWrapper" style="max-height:380px !important;">
      <input type="hidden" id="hiddenSelectedIds" value=""/>
       <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','2','xx');">Add Notes</a></li>
        <?php if(strtolower($_SESSION['typess'])=='admin'){
        ?>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','4','xx');">Delete</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','15','xx');">Change Status</a></li>
  </ul>
</div>
<div style="overflow-x:auto; max-width:100%;">
     <table id="myTable" class="table table-striped display nowrap" style="width:100%">
            <thead>
               <tr>
                  <th><input type="checkbox" id="allchecked" />
                  </th>

<?php foreach ($commentColumns as $i => $colHead) { 
    $realCol = $realColumns[$i];
    if ($realCol === 'id') continue; // skip 'id' column
?>
    <th data-col="<?= htmlspecialchars($realCol) ?>">
        <?= htmlspecialchars($colHead) ?>
    </th>
<?php } ?>

               </tr>
            </thead>
         <tbody>
    <?php 
    $limit=10;
    $last= $startPage= isset($_POST['li']) ? (int)$_POST['li'] : 1;
    $off=($last - 1)*$limit;
    $query="select id,$tcolList from job where subdomain='$subdomain' $tt ORDER BY CAST(SUBSTRING_INDEX(job_code, '-', -1) AS UNSIGNED) DESC limit $off,$limit";
    $s1=mysqli_query($host,$query);  

    while ($d1 = mysqli_fetch_array($s1)) {
        $jid=$d1['id'];
        $cc=mysqli_query($host,"select count(sid) from submitjob where jobid='$jid'");
        $ccs=mysqli_fetch_array($cc);
    ?>
        <tr id="jobrow<?php echo $d1['id'];?>">
            <td>
                <input type="checkbox" class="checkboxx" value="<?php echo $d1['id'];?>"/>
              <?php
              if($ccs[0]>0){
              ?>
                <i class="fa fa-plus" onclick="callJobs(this,<?php echo $d1['id'];?>);" data-bs-toggle="tooltip" data-bs-original-title="Show Applicant"></i>
                <span class="badge bg-primary" data-bs-toggle="tooltip" data-bs-original-title="Submissions"><?php echo $ccs[0];?></span>
               <?php } ?> 
            </td>

<?php foreach ($realColumns as $col): ?>
    <?php if ($col === 'id') continue; ?>
    <td>
        <?php 
        $maxLen=18;
        switch ($col) {

            case "job_code":
                echo '<a href="job_view.php?sid='.$d1['id'].'">'.$d1[$col].'</a>';
                echo '<span class="mera-primary" onclick="showQuickView('.$d1['id'].');" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Quick View">
                        <i style="margin-left:10px;" class="fa fa-binoculars"></i>
                      </span>';
                break;

            case "job_title":
            $full = htmlspecialchars($d1[$col]);
            $short = (strlen($full) > $maxLen) ? substr($full,0,$maxLen).'...' : $full;
            $tooltip = (strlen($full) > $maxLen) ? ' data-bs-toggle="tooltip" data-bs-original-title="'.$full.'"' : '';
                echo '<a href="job_view.php?sid='.$d1['id'].'" '.$tooltip.'>'.$short.'</a>';
                break;

            case "status":
                echo htmlspecialchars($d1[$col]);
                echo '<span class="mera-primary" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                        <i class="fas fa-pencil-alt mera-primary" onclick="status('.$d1['id'].',\''.addslashes($d1[$col]).'\',\'2\');"></i>
                      </span>';
                break;

            case "date":
                echo date('d M, Y', strtotime($d1[$col])) . " " . date('H:i:s A', strtotime($d1['time']));
                break;

            case "ltime":
                echo $d1[$col] ? date('d M, Y H:i:s A', strtotime($d1[$col])) : 'N/A';
                break;
            

            default:
                 $full = htmlspecialchars($d1[$col]);
                 $short = (strlen($full) > $maxLen) ? substr($full,0,$maxLen).'...' : $full;
                 $tooltip = (strlen($full) > $maxLen) ? ' data-bs-toggle="tooltip" data-bs-original-title="'.$full.'"' : '';
                 echo '<span '.$tooltip.'>'.($short ? $short : 'N/A').'</span>';
                break;
        }
        ?>
    </td>
<?php endforeach; ?>

        </tr>
    <?php } ?>
</tbody>
</table>
</div>
     <div id="job-loader" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 10;display: none;font-weight: bold;font-size:35px;">
    <i class="fa fa-spinner fa-spin"></i>
  </div>

</div>

</div>

<div class="card custom-card" style="padding: 10px 25px 20px; background-color: transparent; display: flex; align-items: center; margin-bottom: 0px;">
     <?php
     $nn = mysqli_query($host, "SELECT COUNT(id) FROM job WHERE subdomain='$subdomain' $tt");
     $ns = mysqli_fetch_array($nn);
     $totalRows = $ns[0];
     $maxPage = ceil($totalRows / $limit);

     $displayCount = 5;
     $endPage = $startPage + $displayCount - 1;
     if ($endPage > $maxPage) $endPage = $maxPage;
     if ($endPage - $startPage + 1 < $displayCount) $startPage = max(1, $endPage - $displayCount + 1);
     $startRecord = (($last - 1) * $limit) + 1;
     $endRecord = min($last * $limit, $totalRows);
     $prevPage = ($last > 1) ? $last - 1 : 1;
     $nextPage = ($last < $maxPage) ? $last + 1 : $maxPage;
     ?>

     <p class="text-muted mb-2">
         Showing <strong><?= number_format($startRecord) ?>–<?= number_format($endRecord) ?></strong> of 
         <strong><?= number_format($totalRows) ?></strong> entries
     </p>

     <nav aria-label="Page navigation example" class="rounded-lg">
       <ul class="pagination mb-0">
         <li class="page-item <?= ($last == 1) ? 'disabled' : '' ?>">
           <a class="page-link page-btn" data-page="1" href="javascript:void(0)">« First</a>
         </li>

         <li class="page-item <?= ($last <= 1) ? 'disabled' : '' ?>">
           <a class="page-link page-btn" data-page="<?= $prevPage ?>" href="javascript:void(0)">&laquo;</a>
         </li>

         <?php
         for ($i = $startPage; $i <= $endPage; $i++) {
             $activeClass = ($i == $last) ? 'active' : '';
             echo '<li class="page-item ' . $activeClass . '">';
             echo '<a class="page-link page-btn" data-page="' . $i . '" href="javascript:void(0)">' . $i . '</a>';
             echo '</li>';
         }
         ?>

         <li class="page-item <?= ($last >= $maxPage) ? 'disabled' : '' ?>">
           <a class="page-link page-btn" data-page="<?= $nextPage ?>" href="javascript:void(0)">&raquo;</a>
         </li>

         <li class="page-item <?= ($last == $maxPage) ? 'disabled' : '' ?>">
           <a class="page-link page-btn" data-page="<?= $maxPage ?>" href="javascript:void(0)">Last »</a>
         </li>
       </ul>
     </nav>
   </div>
</div>
<script src="build/assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    window.columnOptions = <?= json_encode($columnOptions, JSON_UNESCAPED_UNICODE); ?>;
</script>
<script>
window.columnOptions = <?= json_encode($columnOptions, JSON_UNESCAPED_UNICODE); ?>;
var table;
window.currentFilters = window.currentFilters || <?= $searchType === 2 && !empty($filters) ? json_encode($filters) : '{}' ?>;
window.currentPage = <?= $last ?>;
window.searchType = <?= $searchType ?>;
var selectedCol = "<?= $column ?? 'null' ?>"; // Store selected column for simple search

function initDataTable() {
    // 1. Destroy existing instance if it exists
    if (DataTable.isDataTable('#myTable')) {
        $('#myTable').DataTable().destroy();
    }
    
    $('#myTable colgroup').remove();
    $('#myTable').removeAttr('style');
    
    table = new DataTable('#myTable', {
        ordering: false,
        paging: false,
        searching: false, // Server-side search used
        info: false,
        lengthChange: false,
        dom: 'lrtip',
        scrollX: true, 
        columnDefs: [
            { orderable: false, targets: 0 },
        ],
        language: {
            "zeroRecords": "No records found matching your criteria."
        },
        initComplete: function () {
            const api = this.api();

            // Clean up duplicated headers from DataTables ScrollX feature
            const scrollHeads = $('.dt-scroll-head');
            if (scrollHeads.length > 1) {
                scrollHeads.eq(1).remove();
            }

            // 3. Re-apply Filter UI (Without Client-side Filter Logic)
            api.columns().every(function () {
                const column = this;
                const header = $(column.header());
                const columnKey = header.data('col');

                if (!columnKey || header.find('.filter-container').length) return;

                let uniqueValues = window.columnOptions[columnKey] || [];
                
                const filterContainer = $('<div class="filter-container"></div>');
                const filterButton = $('<button class="filter-button transition-colors"><i class="fa fa-filter"></i></button>');
                const optionsContainer = $('<div class="filter-options" data-column-key="' + columnKey + '" ></div>');
                
                // Search Input & Select All (Kept for UI usability)
                const searchInput = $('<input type="text" class="filter-search" placeholder="Search..." ' + 'style="width:100%;padding:4px;margin-bottom:5px;border:1px solid #ccc;border-radius:4px;position:sticky;top:0;background:#fff;z-index:10;">');
                optionsContainer.append(searchInput);

                const selectAllLabel = $('<label class="flex items-center text-sm text-gray-700 select-all-label">');
                const selectAllCheckbox = $('<input type="checkbox" data-select-all="true">');
                selectAllLabel.append(selectAllCheckbox).append('Select All');
                optionsContainer.append(selectAllLabel);

                uniqueValues.forEach(value => {
                    const label = $('<label class="flex items-center text-sm text-gray-700">');
                    const checkbox = $('<input type="checkbox" value="' + value + '">');
                    label.append(checkbox).append(value);
                    optionsContainer.append(label);
                });

                filterContainer.append(filterButton, optionsContainer);
                header.append(filterContainer);

                // Restore checked state based on window.currentFilters
                const saved = window.currentFilters[columnKey] || [];
                if (saved.length) {
                    optionsContainer.find('input[type="checkbox"]:not([data-select-all])').each(function() {
                        if (saved.includes($(this).val())) $(this).prop('checked', true);
                    });
                    const checkboxes = optionsContainer.find('input[type="checkbox"]:not([data-select-all])');
                    const allChecked = checkboxes.length > 0 && checkboxes.length === checkboxes.filter(':checked').length;
                    optionsContainer.find('input[data-select-all]').prop('checked', allChecked);
                    filterButton.find('i').css('color', 'green'); // Indicate active filter
                }
                
                // 4. Filter Button Click (UI Positioning)
                filterButton.on('click', function(e) {
                    e.stopPropagation();
                    $("#loader").show();
                    $('.filter-options').not(optionsContainer).removeClass('show');
                    
                    // Reposition dropdown to body to avoid clipping inside table scroll
                    if (!optionsContainer.parent().is('body')) {
                        optionsContainer.appendTo('body');
                    }
                    optionsContainer.toggleClass('show');
                    const offset = filterButton.offset();
                    optionsContainer.css({
                        top: offset.top + filterButton.outerHeight() + 5,
                        left: offset.left,
                        position: 'absolute',
                        zIndex: 10000
                    });
                    setTimeout(function (){ $("#loader").hide(); }, 500); 
                });

                optionsContainer.on('click', function(e){ e.stopPropagation(); });
                
                // Search input inside filter dropdown
                searchInput.on('keyup', function () {
                    const searchVal = $(this).val().toLowerCase();
                    optionsContainer.find('label').not('.select-all-label').each(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(searchVal) > -1);
                    });
                });
                
                // 5. Checkbox Change (Triggers Server-Side Filter Reload)
                optionsContainer.on('change', 'input[type="checkbox"]', function(e) {
                    const isSelectAll = $(this).data('select-all');
                    const checkboxes = optionsContainer.find('input[type="checkbox"]:not([data-select-all])');
                    
                    if (isSelectAll) {
                        checkboxes.prop('checked', this.checked);
                    } else {
                        const allChecked = checkboxes.length === checkboxes.filter(':checked').length;
                        optionsContainer.find('input[data-select-all="true"]').prop('checked', allChecked);
                    }

                    const selectedValues = checkboxes.filter(':checked').map(function() { return $(this).val(); }).get();

                    window.currentFilters[columnKey] = selectedValues;
                    window.currentPage = 1; // Reset to page 1 on filter change
                    
                    if (selectedValues.length > 0) {
                        filterButton.find('i').css('color', 'green');
                    } else {
                        filterButton.find('i').css('color', '');
                    }
                    
                    loadTableData(1, 2, window.currentFilters); 
                });
            });
        }
    });
    $(document).off('error.dt'); // Remove previous handlers
    $(document).on('error.dt', function (e, settings, techNote, message) {
        if (techNote === 4 || techNote === 18) {
            console.warn(`DataTables warning suppressed (TN${techNote}): No data or incorrect column count.`, message);
            e.preventDefault(); // Stop the default alert
        }
    });
    $("#loader").hide();
}

function loadTableData(page, type, filters, search, column) {
    $('#loader').css("display", "block");
    
    let postData = { 
        li: page,
        searchType: type,
        filters: JSON.stringify(filters) // Always send current filters
    };
    
    // If simple search is active, include search parameters
    if (type === 1 || (type === 0 && window.searchType === 1)) {
        postData.search = search || $("#search-text").val();
        postData.column = column || selectedCol;
        postData.realcolumn = $("#cc").text();
        postData.filters = JSON.stringify({}); // Clear filters for simple search
        window.currentFilters = {};
    }

    // Update global state
    window.currentPage = page;
    window.searchType = type;

    $.ajax({
        url: 'content/jobposting.php',
        type: 'POST',
        data: postData,
        success: function(response) {
            $("#mistable").html(response);
            initDataTable(); // Re-init table after loading new data
            $('#loader').hide();
            $('.filter-options').removeClass('show'); // Ensure dropdowns are closed
        },
        error: function() {
            $('#loader').hide();
            alert('Error loading data.');
        }
    });
}

// Global Document Ready Handlers
$(document).ready(function () {
    // Initial load and setup
    initDataTable();
    $(document).on("click", ".pagination a.page-link", function(e){
        e.preventDefault();
        const newPage = $(this).data("page");
        
        // Pass the context of the active search/filter mode
        let currentSearchText = $("#search-text").val();
        let currentSearchCol = selectedCol;
        
        // If search type is 0 (default), check if a filter/search was previously applied
        let typeToUse = window.searchType || 0;
        if(typeToUse === 1 && currentSearchText === '') {
            // If simple search was active but text is now empty, treat as default (type 0)
            typeToUse = 0;
        } else if (typeToUse === 2 && Object.keys(window.currentFilters).length === 0) {
            // If multi-filter was active but filters are now empty, treat as default (type 0)
            typeToUse = 0;
        }

        loadTableData(newPage, typeToUse, window.currentFilters, currentSearchText, currentSearchCol);
    });
});   

document.querySelectorAll('.dropdown-toggle').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.stopPropagation();
        const menu = this.nextElementSibling;
        if(menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            // hide all other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(m => m.style.display='none');
            menu.style.display = 'block';
        }
    });
});

document.addEventListener('click', function(){
    document.querySelectorAll('.dropdown-menu').forEach(m => m.style.display='none');
});

$(document).on('click', function() {
    $('.filter-options').removeClass('show');
});

$(document).on('click', function(e) {
        if (!$(e.target).closest('.filter-container').length) {
            $('.filter-options').removeClass('show');
        }
});

var selectedCol="null";
<?php
if($column!=''){
echo "selectedCol='".$column."';";
}
?>
$(function(){
$("#columnSelect .dropdown-item").on("click", function () {
    selectedCol = $(this).data("col");
    $("#cc").text($(this).text());
    $("#columnSelect").removeClass("show");
    $("#columnSelect").hide();
});

$(document).on("keyup", "#search-text", function (e) {
    if (e.which === 13) {  // Enter key
        doSearch();
    }
});

$(document).on("click", "#basic-addon2", function () {
    doSearch();
});

});

function doSearch() {
        let searchValue = $("#search-text").val();
    
    if (searchValue === "") {
        alert("Please enter something to search.");
        return;
    }
$('#loader').css("display","block");
var cc=$("#cc").text();
window.searchType= 1;
            $.ajax({
                url: 'content/jobposting.php', // Replace with your server URL
                type: 'POST',
                data: {search:searchValue, column:selectedCol,realcolumn:cc,searchType: window.searchType},
                success: function(response) {
                    $("#mistable").html(response);
                }
            });
    }

$(document).ready(function () {

  // Handle master checkbox
  $('#allchecked').on('change', function () {
    const isChecked = $(this).prop('checked');
    table.rows().every(function () {
      const row = this.node();
      $(row).find('input.checkboxx').prop('checked', isChecked);
    });
    updateHiddenInput();
    toggleActionButton();
  });


  $('#myTable tbody').on('change', 'input.checkboxx', function () {
    const allCheckboxes = table.rows().nodes().to$().find('input.checkboxx');
    const allChecked = allCheckboxes.length === allCheckboxes.filter(':checked').length;
    $('#allchecked').prop('checked', allChecked);
    updateHiddenInput();
    toggleActionButton();
  });
});


function toggleActionButton() {
  const checkedCount = table.rows().nodes().to$().find('input.checkboxx:checked').length;
  $('#actionBtnWrapper').toggle(checkedCount > 0);
}

function updateHiddenInput() {
    let selectedIds = [];
     table.$('input.checkboxx:checked').each(function () {
        selectedIds.push($(this).val());
    });

    $("#hiddenSelectedIds").val(selectedIds.join(","));
}


</script>

<?php } ?>