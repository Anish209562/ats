<?php
$tt = isset($_GET['tt']) ? (int) $_GET['tt'] : 1; // Default to 1 (Today)
$today = date('Y-m-d');
$start_date = $end_date = $today;

switch ($tt) {
    case 1: // Today
        $start_date = $end_date = $today;
        break;

    case 2: // Yesterday
        $start_date = $end_date = date('Y-m-d', strtotime('-1 day'));
        break;

    case 3: // Current Week (Monday to today)
        $start_date = date('Y-m-d', strtotime('monday this week'));
        $end_date = $today;
        break;

    case 4: // Month to Till Date (1st of current month to today)
        $start_date = date('Y-m-01');
        $end_date = $today;
        break;

    case 5: // Current Month (full)
        $start_date = date('Y-m-01');
        $end_date = date('Y-m-t');
        break;

    case 6: // Last Week (Previous Monday to Sunday)
        $start_date = date('Y-m-d', strtotime('monday last week'));
        $end_date = date('Y-m-d', strtotime('sunday last week'));
        break;

    case 7: // Last Month
        $start_date = date('Y-m-01', strtotime('first day of last month'));
        $end_date = date('Y-m-t', strtotime('last day of last month'));
        break;

    case 8: // This Year to Date
        $start_date = date('Y-01-01');
        $end_date = $today;
        break;

    case 9: // All — Set to a wide range or leave as null
        $start_date = '2000-01-01';
        $end_date = $today;
        break;

    default: // Fallback to today
        $start_date = $end_date = $today;
}

?>
 <style>
     .date-range-picker-container {
    position: relative;
    display: inline-block;
    font-family: Arial, sans-serif;
}

.date-range-toggle {
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    color: #555;
    display: flex;
    align-items: center;
}

.date-range-toggle:hover {
    background-color: #eaeaea;
}

.date-range-toggle span {
    margin: 0 4px;
}

.dropdown-icon {
    font-size: 10px;
    margin-left: 10px;
    color: #777;
}

.date-range-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 5px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 10;
    display: none; /* This is controlled by JavaScript to show/hide */
    white-space: nowrap;
}

.date-input-group {
    display: flex;
    gap: 10px;
}

.date-range-dropdown input[type="date"] {
    border: 1px solid #ccc;
    padding: 6px;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
}

.date-actions {
    display: flex;
    justify-content: flex-end;
    gap: 5px;
}

.date-actions button {
    border: 1px solid #ccc;
    background-color: #eee;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    line-height: 1;
}

.date-actions button#apply-date-range {
    background-color: #28a745;
    color: #fff;
    border-color: #28a745;
}

.date-actions button#cancel-date-range {
    background-color: #dc3545;
    color: #fff;
    border-color: #dc3545;
}
.btn-group .btn.active{
  background-color: var(--menu-bg) !important;
  color:#fff !important;
}
 </style>
 <div class="header-bar">
        <nav aria-label="breadcrumb">
            <h4><i class="fa fa-home" style="margin-right:10px;"></i>Custom Report</h4>
            <ol class="breadcrumb breadcrumb-example1 mb-0">
                <li class="breadcrumb-item"><a href="reports.php">All Reports</a></li>
                <li class="breadcrumb-item active"><?php echo $filename=strtoupper(basename($_SERVER['PHP_SELF'], '.php'));?></li>
                <li class="breadcrumb-item active" aria-current="page">
                    
                    <?php
                    if(basename($_SERVER['PHP_SELF'], '.php')=='jobposting'){
                      switch($_GET['type']){
                        case "1":
                        echo "DAILY_JOB_POSTING REPORT";
                        break;
                        
                        case "2":
                        echo "CLIENT WISE / STATUS WISE";
                        break;
                        
                        case "3":
                        echo "JOB DETAILS BY CLIENT";
                        break;
                        
                        case "4":
                        echo "ACTIVE JOBS ALL";
                        break;
                        
                        case "5":
                        echo "JOB COUNT BY STATUS";
                        break;
                        
                    }
                    $ok="1";
                    }
                    else if(basename($_SERVER['PHP_SELF'], '.php')=='applicant'){
                       switch($_GET['type']){
                        case "1":
                        echo "Preselection - Status wise";
                        break;
                        
                        case "6":
                        echo "Applicants Status Count";
                        break;
                        
                        case "5":
                        echo "Applicants - Notes/Tasks/Messages Counts";
                        break;
                        
                        case "7":
                        echo "Applicant Statistics By user";
                        break;
                        
                        case "8":
                        echo "Applicant By Source";
                        break;
                        
                        case "3":
                        echo "Applicant Details";
                        break;
                        
                        case "9":
                        echo "Recruiter wise sub/pipeline";
                        break;
                        
                        case "2":
                        echo "Applicant Counts by User/Source";
                        break;
                        
                    }
                    $ok="4";

                    }
                    else if(basename($_SERVER['PHP_SELF'], '.php')=='client'){
                       switch($_GET['type']){
                        case "1":
                        echo "Client By Primary Owner";
                        break;
                        
                        case "2":
                        echo "Active Clients";
                        break;
                        
                        case "3":
                        echo "Clients All Records";
                        break;
                        
                        case "4":
                        echo "Client Document Expiry Report";
                        break;
                        
                    }
                    $ok="2";
                    }
                    
                   else if(basename($_SERVER['PHP_SELF'], '.php')=='access'){
                       switch($_GET['type']){
                        case "1":
                        echo "User Login Report";
                        break;
                        
                        case "2":
                        echo "Hourly User Access Log";
                        break;
                        
                        case "3":
                        echo "Access Log Report";
                        break;
                      }
                    }

                    ?>
                    
                </li>
            </ol>
        </nav>
            <button class="btn btn-primary" type="button" onclick="window.location='index.php'">Go Back</button>

    </div>
<div class="header-bar">
    <div>
<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#columnOffcanvas">
    Filter
</button>

        
    </div>
        <div class="d-flex align-items-center">
            <div class="btn-group me-3" role="group">
                <button type="button" class="btn btn-light <?php echo $tt=='1' ? 'active' : ' ';?>" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-bs-original-title="Today" onclick="addTTParameter(1);">T</button>
                <button type="button" class="btn btn-light <?php echo $tt=='2' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Yesterday"  onclick="addTTParameter(2);">Y</button>
                <button type="button" class="btn btn-light <?php echo $tt=='3' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Current Week"  onclick="addTTParameter(3);">CW</button>
                <button type="button" class="btn btn-light <?php echo $tt=='4' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Month to Till Date"  onclick="addTTParameter(4);">MTD</button>
                <button type="button" class="btn btn-light <?php echo $tt=='5' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Current Month"  onclick="addTTParameter(5);">CM</button>
                <button type="button" class="btn btn-light <?php echo $tt=='6' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Last Week"  onclick="addTTParameter(6);">LW</button>
                <button type="button" class="btn btn-light <?php echo $tt=='7' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Last Month"  onclick="addTTParameter(7);">LM</button>
                <button type="button" class="btn btn-light <?php echo $tt=='8' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="This Year"  onclick="addTTParameter(8);">YTD</button>
             
               <button type="button" class="btn btn-light  <?php echo $tt=='9' ? 'active' : '';?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="All"  onclick="addTTParameter(9);">All</button>

<div class="date-range-picker-container" id="daterangediv" style="display:none;">
    <button class="date-range-toggle">
        <span id="display-from-date"><?php echo date('d M, Y',strtotime($start_date));?></span> 
        →
        <span id="display-to-date"><?php echo date('d M, Y',strtotime($end_date));?></span>
        <span class="dropdown-icon">▼</span>
    </button>
    <div class="date-range-dropdown" style="gap: 10px;">
        <div class="date-input-group">
            <input type="date" id="from-date-input" value="<?php echo date('d M, Y',strtotime($start_date));?>"/>
            <input type="date" id="to-date-input" value="<?php echo date('d M, Y',strtotime($end_date));?>"/>
        </div>
        <div class="date-actions">
            <button id="apply-date-range" style="height: 35px;">✓</button>
            <button id="cancel-date-range" style="height: 35px;">✗</button>
        </div>
    </div>
</div>
  

            </div>
              <button id="customExportExcel" class="btn btn-primary" style="width:7rem;">Export Excel</button>

              <select id="customLength" class="form-control form-select-sm" style="width:4rem;">
  <option value="25">25</option>
  <option value="50" selected>50</option>
  <option value="100">100</option>
  <option value="200">200</option>
</select>   
     
        </div>

</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="columnOffcanvas" data-bs-backdrop="true">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Choose Columns</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
     <form id="column-filter-form">
    <div class="offcanvas-body" style="padding-bottom:0px">
       
            <div id="column-checkboxes">
                <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Choose Columns*</label>
                     <div class="dropdown dropdown-wrapper"> 
     <input type="text"  id="selectesColumn" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly=""/> 
    <ul class="dropdown-menu"> 
    
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
$wantedCols = ["rate","start_job","response","country","state","date","status","city","job_type","client"];

     if($filename=="JOBPOSTING"){
         $filena="job";
     }
     else{
         $filena=strtolower($filename);
     }
     $ss=mysqli_query($host,"SHOW Full COLUMNS FROM $filena");
    $i=0;
$savedCols = [];
$checkSaved = mysqli_query($host, "SELECT col FROM custom WHERE username='{$_SESSION['username']}' AND type='$filena' and report_type='1' LIMIT 1");
if ($row = mysqli_fetch_assoc($checkSaved)) {
    $savedCols = explode(",", $row['col']); // saved column list
}
    while($cc=mysqli_fetch_array($ss)){
            if ($i == 0) {
            $i++;
            continue;
            }

    $colName    = $cc['Field'];
    $colComment = strtoupper(str_replace("_", " ", $cc['Comment'] ?: $colName));
    
    // If column saved in custom table → checked
    if (in_array($colName, $savedCols)) {
        $checked = "checked";
        $totalCheck++;
    }
    ?>
        <li class="dropdown-item">
        <label for="lang<?php echo $i; ?>"> 
            <input type="checkbox" 
                   id="lang<?php echo $i; ?>" 
                   name="lang[]" 
                   value="<?php echo $colName; ?>" 
                   data-name="<?php echo $colComment; ?>" 
                   class="dropdown-check" 
                   <?php echo $checked . " " . $disabled; ?> />
            <?php echo $colComment; ?>
        </label>
    </li>
    <?php 
    if (in_array($colName, $wantedCols)) {
        $groupOptions[] = "<option value=\"$colName\">$colComment</option>";
    }
      $orderOptions[]="<option value=\"$colName\">$colComment</option>";
    $i++;} ?>
                        </ul>
                    </div>
            </div>
            
            <div id="column_output" class="sortable-list"></div>
            
        <div class="row">
            <div class="col-12">
                <label>Group by</label>
                <select name="groups" id="groups" class="form-control">
                    <option value="">Select Column</option>
                    <?php echo implode("\n", $groupOptions); ?>
                </select>
            </div>
        </div>
        
        <hr class="mb-2"/>
        <div class="row">
            <div class="col-12">
                <label>Sorted by</label>
                <select name="orders" id="orders" class="form-control">
                    <option value="">Select Column</option>
                    <?php echo implode("\n", $orderOptions); ?>
                </select>
            </div>
        </div>
         <hr class="mb-4"/>

    </div>
    <div class="offcanvas-footer" style="position:fixed;background: white;bottom: 0;width:49vh;padding: 10px;box-shadow: 0px -10px 12px darkgrey;">
        <button type="submit" class="btn btn-primary">GENERATE REPORT</button>
        <button type="button" class="btn btn-primary" id="save">SAVE REPORT</button>
        <button type="button" class="btn btn-outline-primary"  data-bs-dismiss="offcanvas">CLOSE</button>
    </div>
    </form>
</div>


<div class="modal fade" id="addTagModal" style="z-index:9999;" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Share With</h5>
          <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
           <div class="mb-3">
            <label class="form-label">REport name</label>
            <input type="text" class="form-control" id="report" name="report" placeholder="Enter Report name"/>
          </div>

             <div class="mb-3">
            <label class="form-label">REport Description</label>
            <textarea type="text" class="form-control" id="descr" name="descr"></textarea>
          </div>
          
             <div class="mb-3">
            <label class="form-label">Select Team</label>
            <select class="form-control" id="team" multiple="">
            </select>
          </div>

        </div>

        <!-- Footer -->
        <div class="modal-footer">
          <button type="button" id="updatebtn" class="btn btn-primary">Update</button>
        </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
let emailString;

$(document).ready(function() {
 let choices = new Choices('#team', { removeItemButton: true,placeholderValue: 'Search Team Member',searchPlaceholderValue: 'Type to search...' });
 
 <?php
 $s=mysqli_query($host,"select email,name from team where sub_domain='meraqui' and mobile!='$username' order by name asc");
while ($row = mysqli_fetch_assoc($s)) {
    $locationsArray[] = [
        'value' => $row['email'], // email as value
        'label' => $row['name']   // name as label
    ];
}
 
  if(!empty($locationsArray)){
?>
let savedLocations = <?php echo json_encode($locationsArray); ?>;
savedLocations.forEach(item => {
  choices.setValue([{
    value: item.value,
    label: item.label
  }]);
});
<?php
}
?>

  $("#save").click(function (){
        const jobOffcanvas = document.getElementById('addTagModal');
        const bsOffcanvas = new bootstrap.Modal(jobOffcanvas);
        bsOffcanvas.show();
  });
$("#updatebtn").click(function (e){
    e.preventDefault();

    let selectedEmails = choices.getValue(true); // array of emails
    emailString = selectedEmails.join(",");  // convert array → "a@x.com,b@y.com,c@z.com"

    $("#column-filter-form").submit();
});
    $('#column-filter-form').on('submit', function(e) {
        e.preventDefault();
        const selectedColumns = $('#column-checkboxes input:checked').map(function() {
            return this.value;
        }).get();
        var gg=$("#groups").val();
        var ord=$("#orders").val();
        
        var rr=$("#report").val();
        var ddee=$("#descr").val();
        $('#loader').show();
        $.ajax({
            url: 'data/custom.php',
            method: 'POST',
            data: { columns: selectedColumns,table:"<?php echo $ok;?>",type:"1",rr:rr, ddee:ddee,email:emailString,gg:gg,ord:ord},
            success: function(response) {
                $("#dataedit").html(response);
                
            }
        });

    });

  $('#column-checkboxes .dropdown-check:checked').each(function () {
    const name = $(this).data('name');
    const value = $(this).val();

    if ($('#column_output').find(`[data-value="${value}"]`).length === 0) {
     $('#column_output').append(`
  <div class="column-tag" data-value="${value}" ${$(this).is(':disabled') ? 'style="justify-content: left; gap: 21px;"' : ''}>
    <span class="col-number"></span> ${name}
    ${$(this).is(':disabled') ? '' : '<button type="button" class="remove-btn">&times;</button>'}
  </div>
`);

    }
  });

  $('#column_output .column-tag').each(function (i) {
    $(this).find('.col-number').text((i + 1) + ". ");
  });
$("#selectesColumn").val("<?php echo $totalCheck." of ".$i." selected";?>");  

});

function addTTParameter(ttValue) {
  const currentUrl = new URL(window.location.href);
  const baseUrl = currentUrl.origin + currentUrl.pathname;
  const typeValue = currentUrl.searchParams.get('type'); // existing 'type'
  const okValue = currentUrl.searchParams.get('ok');     // existing 'ok'

  const newUrl = new URL(baseUrl);

  // Keep 'type' if present
  if (typeValue !== null) {
    newUrl.searchParams.set('type', typeValue);
  }

  // Keep 'ok' if it exists and is exactly "1"
  if (okValue === "1") {
    newUrl.searchParams.set('ok', okValue);
  }

  // Always set/update 'tt'
  newUrl.searchParams.set('tt', ttValue);

  // Redirect
  window.location.href = newUrl.toString();
}

document.addEventListener('DOMContentLoaded', function() {
<?php if($tt=='4'){
?>
document.getElementById('daterangediv').style.display='block';
<?php
} ?>
  
    const toggleButton = document.querySelector('.date-range-toggle');
    const dropdown = document.querySelector('.date-range-dropdown');
    const applyButton = document.getElementById('apply-date-range');
    const cancelButton = document.getElementById('cancel-date-range');
    const fromDateInput = document.getElementById('from-date-input');
    const toDateInput = document.getElementById('to-date-input');
    const displayFromDate = document.getElementById('display-from-date');
    const displayToDate = document.getElementById('display-to-date');

    toggleButton.addEventListener('click', function() {
        dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
    });

document.addEventListener('click', function(event) {
    const container = document.querySelector('.date-range-picker-container');
    const isClickInside = container.contains(event.target);

    if (!isClickInside && dropdown.style.display === 'flex') {
        dropdown.style.display = 'none';
    }
});

    applyButton.addEventListener('click', function() {
        const fromDate = fromDateInput.value;
        const toDate = toDateInput.value;

        // Construct the GET URL
        const url = new URL(window.location.href);
        url.searchParams.set('from_date', fromDate);
        url.searchParams.set('to_date', toDate);
        window.location.href = url.toString();

        // Update the displayed dates
        displayFromDate.textContent = formatDateForDisplay(fromDate);
        displayToDate.textContent = formatDateForDisplay(toDate);
        dropdown.style.display = 'none'; // Hide the dropdown
    });

    cancelButton.addEventListener('click', function() {
        dropdown.style.display = 'none';
    });

    function formatDateForDisplay(dateString) {
        if (!dateString) return '';
        const [year, month, day] = dateString.split('-');
        return `${month}/${day}/${year.slice(2)}`;
    }
document.getElementById('loader').style.display='block';
window.onload = function () {
  var loader = document.getElementById('loader');
  if (loader) {
      setTimeout(function (){
    loader.style.display = 'none';
      },1000);
  }
};
});

</script>
    
