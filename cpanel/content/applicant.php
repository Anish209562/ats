<?php
include("../session.php");


$customRes = mysqli_query($host, "SELECT * FROM custom WHERE username='$username' AND type='applicant' and report_type!='1' LIMIT 1");
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
    
    $showColumn = ['id','name','mobile', 'email','status','source','date','ltime','createname']; // <-- your choices

    $sql = "SHOW FULL COLUMNS FROM `applicant`";
    $res = mysqli_query($host, $sql);
    $commentsMap = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $commentsMap[$row['Field']] = $row['Comment'];
    }

    foreach ($showColumn as $c) {
        $realColumns[]      = $c;
        $commentColumns[]   = $commentsMap[$c] ?: ucfirst($c);
        $qualifiedColumns[] = "applicant." . $c;
    }
    $tcolList = implode(",", $qualifiedColumns);
}


$search=strtolower(trim($_POST['search']));
$column=$_POST['column'];
$realcolumn=$_POST['realcolumn'];
$tt="";
if ($column == "null") {
    $likeParts = [];
    foreach ($realColumns as $col) {
        $likeParts[] = "$col LIKE '%" .$search . "%'";
    }
    $tt.=" or ";
    $tt.= implode(" OR ", $likeParts);
}
else if($column!=''){
    $tt=" and $column like '%$search%'";
}

?>
 <style>
div[style*="overflow-x: auto"] {
  display: block;
  overflow-x: auto;
  width: 100%;              /* keeps container limited to parent */
  max-width: 100%;          /* prevents growing beyond parent */
}

div[style*="overflow-x: auto"] table {
  width: max-content;       /* table takes only as much width as needed */
  min-width: 100%;          /* ensures full width when content smaller */
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
  width: 100% !important;
}
.dataTables_wrapper {
  width: 100%;
  overflow-x: auto;
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

.subTLV21 tbody tr:hover td .mera-primarys {
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

div.dataTables_scrollBody {
  overflow-x: scroll !important;
}
div.dt-scroll-body thead tr th, div.dt-scroll-body thead tr td, div.dt-scroll-body tfoot tr th, div.dt-scroll-body tfoot tr td {
        background: #111c431c !important;
}
table.table.dataTable.table-striped > tbody > tr:nth-of-type(2n+1) > * {
    box-shadow: inset 0 0 0 9999px rgba(var(--dt-row-stripe), 0.03);
}
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
                width: 42%;
    margin: auto;
        }

        .grid-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            height: 120px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .grid-item .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #fff;
        }

        .grid-item .text {
            font-size: 0.9rem;
            color: #fff;
            font-weight: 600;
        }

        /* Specific item colors */
        .grid-item:nth-child(1) { background-color: #2e8bfe; }
        .grid-item:nth-child(2) { background-color: #5cb85c; }
        .grid-item:nth-child(3) { background-color: #6c7a89; }
        .grid-item:nth-child(4) { background-color: #9258a4; }
        .grid-item:nth-child(5) { background-color: #337ab7; }
        .grid-item:nth-child(6) { background-color: #eb6e80; }

        .info-bar {
            background-color: #e6f7ff;
            color: #1a73e8;
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }

        .info-bar .info-icon {
            font-size: 1.2rem;
            margin-right: 10px;
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
    background-color: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    padding: 10px;
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
<div class="modal fade" id="exampleModalFullscreen" style="z-index:9992 !important;"  tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" style="display:block !important;text-align:right;">
                 <i class="fa fa-download" onclick="window.location='content/applicant.xlsx';" data-bs-toggle="tooltip" data-bs-original-title="Demo Bulk Parsing"></i>
                 <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
              <div class="container">    
                <h1 class="text-center mb-4 mt-4">Add Applicant</h1>
                
                
                 <div class="grid-container">
                    <div class="grid-item" onclick="window.open('resume_upload.php','_blank');">
                        <span class="icon">&#x2601;&#xFE0E;</span>
                        <span class="text">Parse Resume</span>
                    </div>
                    <div class="grid-item" onclick="dailyupt(0);">
                        <span class="icon">&#x2795;&#xFE0E;</span>
                        <span class="text">Manual Creation</span>
                    </div>

<div class="grid-item" id="bulk_uplaod">
    <span class="icon">&#x2601;&#xFE0E;</span>
    <span class="text">Bulk Parsing</span>
    <input type="file" name="bulk" id="bulk" style="display:none;"/>
    <input type="hidden" name="source" id="source" value="Bulk Parsing"/>
</div>
                </div>
                <div class="info-bar mt-5">
                    <!-- Unicode character for information icon -->
                    <span class="info-icon">&#x2139;&#xFE0E;</span>
                    <span>Save time by importing your information into our system automatically</span>
                </div>
                <button type="button" class="btn btn-secondary" id="modalShowFirst" data-bs-dismiss="modal" style="display:none;"></button>
                </div>
            </div>
        </div>
    </div>
</div>

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
        
function callJobs(el, id) {
  const icon = $(el); // the <i> element
  const checkbox = $("input.checkboxx[value='" + id + "']");
  const tr = checkbox.closest('tr');

  const extraRowClass = '.job-extra-row-' + id;

  if (icon.hasClass('fa-plus')) {
    $('.job-extra-row').remove();           // remove all expanded rows
    $('.fa-minus').removeClass('fa-minus').addClass('fa-plus'); // reset icons
 
    icon.removeClass('fa-plus').addClass('fa-minus');

    $(extraRowClass).remove();
    $('#job-loader').show();

    $.ajax({
      type: "POST",
      url: "content/more_job_row.php",
      data: { jid: id ,type:"1"},
      success: function (html) {
        tr.after(html);
        $('#job-loader').hide();
      }
    });

  } else {
    // If already MINUS, remove the extra row and toggle back to PLUS
    icon.removeClass('fa-minus').addClass('fa-plus');
    $(extraRowClass).remove();
  }
}

</script>
<div class="row">
<div class="top-controls" style="display: flex;justify-content: space-between;align-items: center;">
<div class="input-group mb-3" style="width:23%">

    <button class="btn btn-primary dropdown-toggle" id="cc" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $realcolumn ? $realcolumn :'Search Any'; ?></button>
    <ul class="dropdown-menu" style="" id="columnSelect">
        <li><a class="dropdown-item" href="javascript:void(0);" data-col="null">Search Any</a></li>
 <?php foreach ($showColumn as $colName) {
        $colLabel = $commentsMap[$colName] ?? ucfirst($colName); // reuse previous query
        echo '<li><a class="dropdown-item" href="javascript:void(0);" data-col="'.$colName.'">'.htmlspecialchars($colLabel).'</a></li>';
    }?>
    </ul>

    <input type="text"  id="search-text" class="form-control" placeholder="Search text" value="<?php if(isset($search)){echo $search;}?>"/>
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
  <ul class="dropdown-menu shadow animate__animated animate__fadeIn p-2" aria-labelledby="actionBtnWrapper" style="transform:translate(-2px, 34px) !important;max-height:380px !important;transform:translate(-2px, 34px) !important;">
      <input type="hidden" id="hiddenSelectedIds" value=""/>
       <li><a class="dropdown-item markForReview" href="javascript:void(0);">Mark as Favorite</a></li>
        <?php
        if(strtolower($_SESSION['typess'])=='admin' or strtolower($data['position'])=='delivery head' or strtolower($data['position'])=='recruiter team'){
        ?>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','4');">Delete</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','7');">Add Tag</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','9');">Change Ownership</a></li>
  </ul>
</div>

       <table id="myTable" class="table table-striped display nowrap" style="width:100%">
            <thead>
                 
               <tr>
                   <th><input type="checkbox" id="allchecked" />
                  </th>
<?php foreach ($commentColumns as $i => $colHead) { 
    $realCol = $realColumns[$i];
?>
    <th data-col="<?= htmlspecialchars($realCol) ?>">
        <?= htmlspecialchars($colHead) ?>
    </th>
<?php } ?>
               </tr>
            </thead>
         <tbody>
    <?php 
    $limit=25;
    $last= $startPage= isset($_GET['li']) ? (int)$_GET['li'] : 1;
    $off=($last - 1)*$limit;
    
    $query="select $tcolList from applicant where subdomain='$subdomain' $tt order by id asc limit $off,$limit ";
//   if(strtolower($_SESSION['typess'])=='admin'){
//       echo $query;
//   }
   $s1=mysqli_query($host,$query);  
   $r=mysqli_num_rows($s1); 
    while ($d1 = mysqli_fetch_array($s1)) { 
        $sid=$d1['id'];
        $cc=mysqli_query($host,"select count(sid) from submitjob where sid='$sid'");
        $ccs=mysqli_fetch_array($cc);
  $address=$d1['address'];
   $name=$d1['name'];
 
$maxLen2 = 12; // show first 12 characters only
if(strlen($name) > $maxLen2){
$full  = htmlspecialchars($name);
$name = substr($name, 0, $maxLen2) . '...';
}
    ?>
        <tr id="app-row-<?php echo $d1['id']; ?>">
            <td>
                <i class="fa<?php echo $d1['favorite']==0 ? 'r' : 's';?> fa-star markForReview" data-bs-toggle="tooltip" data-bs-original-title="<?php echo $d1['favorite']==0 ? 'Mark as Favorite' : 'Marked as Favorite';?>" data-id="<?php echo $d1['id'];?>" ></i>
                <input type="checkbox" class="checkboxx" value="<?php echo $d1['id'];?>"/>
              <?php
              if($ccs[0]>0){
              ?>
                <i class="fa fa-plus" onclick="callJobs(this,<?php echo $d1['id'];?>);" data-bs-toggle="tooltip" data-bs-original-title="Show Associated Jobs"></i>
                <span class="badge bg-primary" data-bs-toggle="tooltip" data-bs-original-title="Submissions"><?php echo $ccs[0];?></span>
               <?php } ?> 
            </td>
    <?php foreach ($realColumns as $col): ?>
        <td>
            <?php
            switch ($col) {
                 case "id":
                    echo '<a href="app_view.php?sid='.$d1['id'].'" target="_blank">'.$d1['id'].'</a>';
                    ?>
                    <span class="mera-primary" onclick="particularCall(<?php echo $d1['id'];?>,'1');" 
                          style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Quick View">
                        <i style="margin-left:10px;" class="fa fa-binoculars"></i>
                    </span>
                    <?php
                    break;

                case "name":
                    $maxLen = 20; // truncate length
                    $full = htmlspecialchars($d1[$col]);
                    $short = (strlen($full) > $maxLen) ? substr($full,0,$maxLen).'...' : $full;
                    ?>
                    <a href="app_view.php?sid=<?php echo $d1['id']; ?>" target="_blank"
                       <?php if(strlen($full) > $maxLen) echo "data-bs-toggle='tooltip' data-bs-original-title='$full'"; ?>>
                        <?php echo $short; ?>
                        <span class="mera-primary" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Open Applicant in New tab">
                            <i style="margin-left:10px;" class="fa fa-share"></i>
                        </span>
                    </a>
                    <?php
                    break;

                case "status":
                    ?>
                    <span id="applicant_status_div_<?php echo $d1['id']; ?>">
                        <?php echo htmlspecialchars($d1[$col]); ?>
                    </span>
                    <span class="mera-primary" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                        <i class="fas fa-pencil-alt mera-primary" onclick="status(<?php echo $d1['id'];?>,'<?php echo addslashes($d1[$col]); ?>','3');"></i>
                    </span>
                    <span class="mera-primary" onclick="particularCall(<?php echo $d1['id'];?>,'111');" 
                          style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Status History">
                        <i style="margin-left:10px;" class="fa fa-history"></i>
                    </span>
                    <?php
                    break;

                case "source": case "refer":
                    echo !empty($d1[$col]) ? htmlspecialchars($d1[$col]) : 'N/A';
                    break;

                case "address":
                    if(!empty($d1[$col])){
                        $maxLen = 12;
                        $full = htmlspecialchars($d1[$col]);
                        $short = (strlen($full) > $maxLen) ? substr($full,0,$maxLen).'...' : $full;
                        if(strlen($full) > $maxLen){
                            echo "<span data-bs-toggle='tooltip' data-bs-original-title='$full'>$short</span>";
                        } else {
                            echo $short;
                        }
                    } else {
                        echo 'N/A';
                    }
                    break;

                case "date":
                    echo date('d M, Y H:i:s', strtotime($d1[$col]));
                    break;

                case "ltime":
                    echo !empty($d1[$col]) ? date('d M, Y H:i:s A', strtotime($d1[$col])) : 'N/A';
                    break;

                case "createname":
                    echo htmlspecialchars($d1[$col]);
                    break;

                default:
                    echo htmlspecialchars($d1[$col]);
                    break;
            }
            ?>
        </td>
    <?php endforeach; ?>           
  
        </tr>

<?php } ?>
</tbody>
         </table>
         
   <div id="job-loader" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 10;display: none;font-weight: bold;font-size:35px;">
    <i class="fa fa-spinner fa-spin"></i>
  </div>

   </div>

</div>
  
<div class="card custom-card" style="padding: 10px 25px 20px;background-color: transparent;display: flex;align-items: center;margin-bottom: 0px;">
<?php
$nn = mysqli_query($host, "SELECT COUNT(id) FROM applicant WHERE subdomain='$subdomain'");
$ns = mysqli_fetch_array($nn);
$totalRows = $ns[0];
$maxPage = ceil($totalRows / $limit);

$displayCount = 5; // number of pages to show

$endPage = $startPage + $displayCount - 1;
if ($endPage > $maxPage) {
    $endPage = $maxPage;
}
if ($endPage - $startPage + 1 < $displayCount) {
    $startPage = max(1, $endPage - $displayCount + 1);
}

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

    <!-- First Page Button -->
    <li class="page-item <?= ($last == 1) ? 'disabled' : '' ?>">
      <a class="page-link" href="?li=1" aria-label="First">
        <span aria-hidden="true">« First</span>
      </a>
    </li>

    <!-- Previous Button -->
    <li class="page-item <?= ($last <= 1) ? 'disabled' : '' ?>" data-bs-toggle="tooltip" data-bs-original-title="Previous page">
      <a class="page-link" href="?li=<?= $prevPage ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    <?php
    for ($i = $startPage; $i <= $endPage; $i++) {
        $activeClass = ($i == $last) ? 'active' : '';
        echo '<li class="page-item ' . $activeClass . '">';
        echo '<a class="page-link" href="?li=' . $i . '">' . $i . '</a>';
        echo '</li>';
    }
    ?>

    <!-- Next Button -->
    <li class="page-item <?= ($last >= $maxPage) ? 'disabled' : '' ?>"  data-bs-toggle="tooltip" data-bs-original-title="Next page">
      <a class="page-link" href="?li=<?= $nextPage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>

    <!-- Last Page Button -->
    <li class="page-item <?= ($last == $maxPage) ? 'disabled' : '' ?>">
      <a class="page-link" href="?li=<?= $maxPage ?>" aria-label="Last">
        <span aria-hidden="true">Last »</span>
      </a>
    </li>

  </ul>
</nav>
</div>

</div> 
	
<script src="build/assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

 
<script>
var table;
function initDataTable() {
    DataTable.ext.search = [];
    if (DataTable.isDataTable('#myTable')) {
        table.destroy();
        //$('#myTable').closest('.dt-container').remove(); // remove full wrapper
        $('#myTable').find('.filter-container').remove();
        $('#myTable').removeAttr('style'); // remove inline width styles
    }

DataTable.ext.search.push(function (settings, data, dataIndex) {
    const api = new DataTable.Api(settings);
    const activeFilters = $(api.table().node()).data("activeFilters");

    if (!activeFilters) return true;

    for (const columnKey in activeFilters) {
        const selected = activeFilters[columnKey];
        if (selected.length > 0) {
            const colIndex = api.columns().indexes().filter(function (idx) {
                return $(api.column(idx).header()).data("col") === columnKey;
            })[0];

            const cellValue = $('<div>').html(data[colIndex]).text().trim();

            if (!selected.includes(cellValue)) {
                return false;
            }
        }
    }
    return true;
});


    table = new DataTable('#myTable', {
        scrollX: false,
        ordering: false,
        paging:false,
        searching: true,
        info: false,
    lengthChange: false,
        dom: 'lrtip',
        columnDefs: [
            { orderable: false, targets: 0 }
        ],
        initComplete: function () {
            const api = this.api();

let activeFilters = $(api.table().node()).data("activeFilters") || {};
$(api.table().node()).data("activeFilters", activeFilters);  

 const scrollHeads = $('.dt-scroll-head');
            if (scrollHeads.length > 1) {
                scrollHeads.eq(1).remove();
            }

             api.columns().every(function () {
                const column = this;
                const header = $(column.header());
                const columnKey = header.data('col');

               // 🔹 Prevent duplicate filter buttons if reinitializing or redrawing
               if (header.find('.filter-container').length) return;
               
                if (!columnKey) return;
                    const uniqueValues = api.column(column.index()).nodes().map(node => $(node).text().trim()).toArray().filter(v => v !== "").filter((v, i, self) => self.indexOf(v) === i).sort();
                    
                    const filterContainer = $('<div class="filter-container"></div>');
                    const filterButton = $('<button class="filter-button transition-colors"><i class="fa fa-filter"></i></button>');
                    const optionsContainer = $('<div class="filter-options" data-column-key="' + columnKey + '"></div>');
                    
const selectAllLabel = $('<label class="flex items-center text-sm text-gray-700 select-all-label">');
const selectAllCheckbox = $('<input type="checkbox" data-select-all="true">');
selectAllLabel.append(selectAllCheckbox).append('Select All');
optionsContainer.append(selectAllLabel);

                    uniqueValues.forEach(value => {
                        const label = $('<label class="flex items-center text-sm text-gray-700" for="column' + value + '">');
                        const checkbox = $('<input type="checkbox" value="' + value + '" id="column' + value + '">');
                        label.append(checkbox).append(value);
                        optionsContainer.append(label);
                    });

                    filterContainer.append(filterButton, optionsContainer);
                    header.append(filterContainer);

                    activeFilters[columnKey] = [];

                    filterButton.on('click', function(e) {
                        e.stopPropagation();
                        $('.filter-options').not(optionsContainer).removeClass('show');
                           if (!optionsContainer.parent().is('body')) {
                           optionsContainer.appendTo('body');
                           }
                            optionsContainer.toggleClass('show');
                            const offset = filterButton.offset();
                            optionsContainer.css({
        top: offset.top + filterButton.outerHeight() + 5,
        left: offset.left - 100,
        position: 'absolute',
        zIndex: 10000
    });
                    });

optionsContainer.on('click', function(e){
    e.stopPropagation(); // prevents closing
});


                    optionsContainer.on('change', 'input[type="checkbox"]', function(e) {
                        const isSelectAll = $(this).data('select-all');
                        const checkboxes = optionsContainer.find('input[type="checkbox"]:not([data-select-all])');
                        
                        if (isSelectAll) {
                            checkboxes.prop('checked', this.checked);
                        } else {
                            const allChecked = checkboxes.length === checkboxes.filter(':checked').length;
                            optionsContainer.find('input[data-select-all="true"]').prop('checked', allChecked);
                        }

                        activeFilters[columnKey] = checkboxes.filter(':checked').map(function() {
                            return $(this).val();
                        }).get();

    $('#myTable, #myTable thead, #myTable tbody, #myTable thead tr, #myTable thead th')
        .removeAttr('style'); // no inline width at all
    $('.dataTables_scrollHead, .dataTables_scrollHeadInner, .dataTables_scrollBody')
        .removeAttr('style');
    $('#myTable').css('width', '100%'); // keep it full width only
    api.settings()[0].oScroll.sXInner = $('#myTable').closest('.dataTables_wrapper').width() + 'px';
    api.columns.adjust().draw(false);
                    
                    });
                
            });
        }
    });
    
   }


$(document).ready(function () {
$("#loader").hide();

initDataTable();
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

$(document).on("change", "#allchecked", function () {

    const isChecked = $(this).prop('checked');
    table.rows().every(function () {
      const row = this.node();
      $(row).find('input.checkboxx').prop('checked', isChecked);
    });
    updateHiddenInput();
    toggleActionButton();
  });


$(document).on('change', '#myTable tbody input.checkboxx', function () {
    const allCheckboxes = table.rows().nodes().to$().find('input.checkboxx');
    const allChecked = allCheckboxes.length === allCheckboxes.filter(':checked').length;
    $('#allchecked').prop('checked', allChecked);
    updateHiddenInput();
    toggleActionButton();
  });

$(document).on("click", "#bulk_uplaod", function () {
  
          document.getElementById('bulk').click();
      });

$(document).on("change", "#bulk", function () {
   var fileInput = this;
        if (fileInput.files.length > 0) {
            var formData = new FormData();
            formData.append('bulk', fileInput.files[0]); // the file
            formData.append('source', $('#source').val()); // the hidden source value

            $('#loader').css("display","block");
            $.ajax({
                url: 'data/applicant_import.php', // Replace with your server URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#dataedit").text("").prepend(response);
                }
            });
        }
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

$(".markForReview").on("click",function (e){
    e.preventDefault();
    
    let button = $(this);
    var vv = button.data("id");
    let isFavorite = button.hasClass("fas");
    
    if (!vv || vv === "") {
        vv = $("#hiddenSelectedIds").val();
    }

    if (!vv || vv == "") {
        alert("No applicant selected!");
        return;
    }
    
    $("#job-loader").show();
    $.ajax({
        url: "data/favorite.php",   // backend endpoint
        type: "POST",
        data: { ids: vv },
        success: function (response) {
        $("#job-loader").hide();
        let res = JSON.parse(response);
        if (res.status === "success") {
                
                if (isFavorite) {
                    button.removeClass("fas").addClass("far").attr("data-bs-original-title", "Mark as Favorite");
                } else {
                    button.removeClass("far").addClass("fas").attr("data-bs-original-title", "Marked as Favorite");
                }
                
           // alert(res.message);
            table.ajax.reload(null, false);
        } else {
            alert(res.message);
        }
        }
    });
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
            $.ajax({
                url: 'content/applicant.php', // Replace with your server URL
                type: 'POST',
                data: {search:searchValue, column:selectedCol,realcolumn:cc},
                success: function(response) {
                    $('#loader').hide();
                    $("#mistable").html(response);
                    
                     // Make sure the new table has correct ID
                     const newTable = $("#mistable").find('table').attr('id', 'myTable');
                      initDataTable();
                }
            });
    }

  document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
      new bootstrap.Tooltip(el);
    });
  });

</script>
