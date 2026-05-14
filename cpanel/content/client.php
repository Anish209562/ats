<?php 
include("../session.php");

$showColumn = ['id','name','Website','email','mobile','status','primaryn','display','industry','date','ltime','createname'];

$customRes = mysqli_query($host, "SELECT * FROM custom WHERE username='$username' AND type='client' LIMIT 1");
$hasCustom = mysqli_num_rows($customRes) > 0;

$realColumns = [];
$commentColumns = [];
$qualifiedColumns = [];

if ($hasCustom) {
    $customRow = mysqli_fetch_array($customRes);

    $realColumns      = array_map('trim', explode(",", $customRow['col']));
    $commentColumns   = array_map('trim', explode(",", $customRow['comment']));
    $tcolList = $customRow['tcolumn'];

} else {
    $showColumn = ['id','name','Website','email','mobile','status','primaryn','display','industry','date','ltime','createname'];

    $sql = "SHOW FULL COLUMNS FROM `client`";
    $res = mysqli_query($host, $sql);
    $commentsMap = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $commentsMap[$row['Field']] = $row['Comment'];
    }

    foreach ($showColumn as $c) {
        $realColumns[]      = $c;
        $commentColumns[]   = $commentsMap[$c] ?: ucfirst($c);
        $qualifiedColumns[] = "client." . $c;
    }
    $tcolList = implode(",", $qualifiedColumns);
}

$search=$_POST['search'];
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

function particularCall(id,type,extra){
    
    if (!id || id === "") {
        id = $("#hiddenSelectedIds").val();
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
 
 function switchh(id){
     $.ajax({
      type: "POST",
      url: "content/client_contact.php",
      data: { jid: id ,type:"2"},
      success: function (html) {
        
      }
    });
 }
    
function callJobs(el, id) {
  const icon = $(el); // the <i> element
  const checkbox = $("input.checkboxx[value='" + id + "']");
  const tr = checkbox.closest('tr');

  const extraRowClass = '.job-extra-row-' + id;

  if (icon.hasClass('fa-plus')) {
    icon.removeClass('fa-plus').addClass('fa-minus');

    $(extraRowClass).remove();
    $('#job-loader').show();

    $.ajax({
      type: "POST",
      url: "content/client_contact.php",
      data: { jid: id ,type:"1"},
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

.custom-toggle-switch > input[type="checkbox"] + label::after {
  content: "OFF";
  display: flex;                    /* center text inside the circle */
  align-items: center;
  justify-content: center;
  font-size: 0.55rem;               /* tweak if text is too big/small */
  font-weight: 700;
  color: #ffffff;
  background: #7f1d1d !important;   /* dark red background */
  width: 1.5rem;                    /* keep same size as external CSS */
  height: 1.5rem;
  border-radius: 50%;
  box-shadow: 0 0 .313rem #e4e5edcc;
  transition: all .25s ease-in-out;
}

/* ON state — green knob with "ON" */
.custom-toggle-switch > input[type="checkbox"]:checked + label::after {
  content: "ON";
  background: #16a34a !important;   /* green background */
  color: #ffffff;
}

</style>

<div class="row">

<div class="top-controls" style="display: flex;justify-content: space-between;align-items: center;">
    
<div class="input-group mb-3" style="width:23%">
  <button class="btn btn-primary dropdown-toggle"  id="cc" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $realcolumn ? $realcolumn :'Search Any'; ?></button>
  <ul class="dropdown-menu" id="columnSelect">
    <li><a class="dropdown-item" href="javascript:void(0);" data-col="null">Search Any</a></li>
    <?php
    foreach ($showColumn as $colName) {
        $colLabel = $commentsMap[$colName] ?? ucfirst($colName); // reuse previous query
        echo '<li><a class="dropdown-item" href="javascript:void(0);" data-col="'.$colName.'">'.htmlspecialchars($colLabel).'</a></li>';
    }
    ?>
  </ul>
  <input type="text" id="search-text" class="form-control" placeholder="Search text" value="<?php if(isset($search)){echo $search;}?>" />
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
       <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','2','yy');">Add Notes</a></li>
        <?php if(strtolower($_SESSION['typess'])=='admin'){
        ?>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','4','yy');">Delete</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="particularCall('','9','yy');">Change Ownership</a></li>
  </ul>
</div>
     <table id="myTable" class="table table-striped display nowrap" style="width:100%">
            <thead>
               <tr>
            
            <th><input type="checkbox" id="allchecked" /></th>

<?php foreach ($commentColumns as $i => $colHead) { ?>
    <th data-col="<?= htmlspecialchars($realColumns[$i]) ?>">
        <?= htmlspecialchars($colHead) ?>
    </th>
<?php } ?>
               </tr>
            </thead>
         <tbody>
    <?php
     $limit=25;
    $last= $startPage = isset($_GET['li']) ? (int)$_GET['li'] : 1;
    $off=($last - 1)*$limit;
    $s1=mysqli_query($host,"SELECT $tcolList FROM `client` WHERE subdomain='$subdomain' $tt ORDER BY id desc limit $off,$limit");  

    while ($d1 = mysqli_fetch_array($s1)) { 
        
        $cid=$d1['id'];
        $cc=mysqli_query($host,"select count(itemid) from item_details where itemid='$cid'");
        $ccs=mysqli_fetch_array($cc);
    ?>
        <tr id="jobrow<?php echo $d1['id'];?>">
            <td class="table-plus">
                <input type="checkbox" class="checkboxx" value="<?php echo $d1['id'];?>"/>
            
                 <?php
                 if($ccs[0]>0){
                 ?>
                 <i class="fa fa-plus" onclick="callJobs(this,<?php echo $d1['id'];?>);" data-bs-toggle="tooltip" data-bs-original-title="Show Contacts"></i>
                 <span class="badge bg-primary" data-bs-toggle="tooltip" data-bs-original-title="Client Contact Count"><?php echo $ccs[0];?></span>
                 <?php } ?> 
            
            </td>
            <?php foreach ($realColumns as $col): ?>
       <td>
           <?php
            $maxLen = 20; // truncate length
            switch ($col) {
                   case "id":
                   echo $d1[$col];
                   echo ' <span class="mera-primary" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit Client">';
                   echo '<i class="fas fa-pencil-alt mera-primary" onclick="dailyupt('.$d1['id'].');"></i>';
                   echo '</span>';
                   break;
            
             case "Website":
                    $full = htmlspecialchars($d1[$col]);
            $short = (strlen($full) > $maxLen) ? substr($full,0,$maxLen).'...' : $full;
            $tooltip = (strlen($full) > $maxLen) ? ' data-bs-toggle="tooltip" data-bs-original-title="'.$full.'"' : '';
                   echo '<a href="'.$d1[$col].'" target="_blank"'.$tooltip.'>'.$short.'</a>';
                   break;

               // --- status with span + pencil icon
               case "status":
                   echo $d1[$col];
                   echo ' <span class="mera-primary" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit Status">';
                   echo '<i class="fas fa-pencil-alt mera-primary" onclick="status('.$d1['id'].',\''.$d1[$col].'\',\'4\');"></i>';
                   echo '</span>';
                   break;

               // --- display toggle switch
               case "display":
                   $checked = (strtolower($d1[$col]) == 'yes') ? 'checked' : '';
                   echo '<div class="custom-toggle-switch">';
                   echo ' <input id="menu-view'.$d1['id'].'" type="checkbox" '.$checked.' onchange="switchh(\''.$d1['id'].'\');">';
                   echo ' <label for="menu-view'.$d1['id'].'" class="label-success mb-1"><span class="switch-text"></span></label>';
                   echo '</div>';
                   break;

               // --- date formatting
               case "date":
                   echo date('d M, Y', strtotime($d1[$col])) . " " . date('H:i:s A', strtotime($d1['time']));
                   break;

               case "ltime":
                   echo $d1[$col] ? date('d M, Y H:i:s A', strtotime($d1[$col])) : 'N/A';
                   break;

               // --- default case = plain text
               default:
                   $full = htmlspecialchars($d1[$col]);
                   $short = (strlen($full) > $maxLen) ? substr($full,0,$maxLen).'...' : $full;
                   $tooltip = (strlen($full) > $maxLen) ? ' data-bs-toggle="tooltip" data-bs-original-title="'.$full.'"' : '';
                   echo '<span '.$tooltip.'>'.$short.'</span>';
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
$nn = mysqli_query($host, "SELECT COUNT(id) FROM client WHERE subdomain='$subdomain'");
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
var table;
function initDataTable() {
    DataTable.ext.search = [];
    if (DataTable.isDataTable('#myTable')) {
        table.destroy();
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
        scrollX: true,
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
});

$(document).on('click', function() {
    $('.filter-options').removeClass('show');
});

$(document).ready(function () {

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
            $.ajax({
                url: 'content/client.php', // Replace with your server URL
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

let selectedColumnIndex = null;
function setupDropdown() {
  const $dropdown = $('#columnSelect');
  $dropdown.empty();
  table.columns().every(function (index) {
    if (index != 0) {
      const header = this.header().textContent;
      $dropdown.append(`<li><a class="dropdown-item" href="javascript:void(0);" data-col="${index}">${header}</a></li>`);
    }
  });

  $dropdown.on('click', '.dropdown-item', function () {
    selectedColumnIndex = $(this).data('col');
    $('.dropdown-toggle').text($(this).text());
  });
}


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
