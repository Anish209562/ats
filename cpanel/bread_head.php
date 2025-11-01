 <?php
 $filename = basename($_SERVER['PHP_SELF']); 
 $ok='';
 $pageAccess = [];
 switch($filename){
     case "jobposting.php":
     $pageAccess = ['account representatives', 'account management','recruiter team'];
     $pageTitle = "Job Posting";
     $table="job";
     $ok='1';
     break;

     case "client.php":
     $ok='2';
     $pageAccess = ['account representatives', 'account management'];
     $pageTitle = $table = "Client";
     break;
     
     case "team.php":
      $ok='3';
      $pageAccess = []; // maybe only admin
      $pageTitle =$table = "Team";
     break;
     
     case "applicant.php":
     $ok='4';
     $pageAccess = ['recruiter', 'recruiter team', 'delivery head'];
     $pageTitle = $table= "Applicant";
     break;
 }
 ?>
 <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0"><?php echo $pageTitle;?></h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                
<div class="dropdown" style="float:left;width:fit-content !important;margin-right:20px;">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownSettings" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-cog"></i> <!-- Font Awesome settings icon -->
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownSettings">
  <?php
if($ok=='4' or $ok=='1'){
?>
    <li><a class="dropdown-item" href="<?php if($ok=='1'){ echo "job_setting.php";}else{echo "app_setting.php";}?>">Settings</a></li>
 <?php } ?> 
 
 <?php if($ok!='4'){
 ?>
   <li><a class="dropdown-item" href="imports.php?data=<?php echo urlencode(base64_encode('?tt='.$ok.'&subdomain=mera_qui')); ?>">Import</a></li>
  <?php } ?>
    <li><a class="dropdown-item" href="edit/upload.php?dd=<?php echo strtolower($table);?>">Export</a></li>
  </ul>
</div>
<?php
$allowAccess = strtolower($_SESSION['typess']) == 'admin' || in_array($data['position'], $pageAccess);
if($allowAccess){
if($ok=='4'){
?>
<button type="button" class="btn btn-sm btn-myself" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"> <i class="bi bi-plus-circle"></i> New</button>
<?php
}else{
?>
<button type="button" style="float:left;" class="btn btn-myself btn-sm" onclick="dailyupt(0);"> <i class="bi bi-plus-circle" style="margin-right:10px;"></i>NEW</button>
<?php
}
?>

<?php } ?>
                            </nav>
                        </div>
                    </div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="columnOffcanvas" data-bs-backdrop="true">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Choose Columns</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
     <form id="column-filter-form" method="post">
    <div class="offcanvas-body" style="min-height:70vh;padding-bottom:0px;">
       
     <div id="column-checkboxes">
        <label for="dropdownMenuButton1" class="form-label" style="width:100%;">Choose Columns*</label>
    
    <div class="dropdown dropdown-wrapper"> 
      <input type="text" value="No Selected" id="selectesColumn" class="form-control dropdown-toggle"  data-bs-toggle="dropdown" data-bs-auto-close="false"  readonly=""/> 
    <ul class="dropdown-menu"> 
    
    <li class="dropdown-item">
      <label><input type="checkbox" class="dropdown-check select-all" /> <strong>Select All</strong></label>
    </li>
     <?php
    $filename=strtolower(basename($_SERVER['PHP_SELF'], '.php'));
    if($filename=="jobposting"){
         $filename="job";
     }
    
    $ss=mysqli_query($host,"SHOW Full COLUMNS FROM $filename");

$savedCols = [];
$checkSaved = mysqli_query($host, "SELECT col FROM custom WHERE username='{$_SESSION['username']}' AND type='$filename' and report_type!='1' LIMIT 1");
if ($row = mysqli_fetch_assoc($checkSaved)) {
    $savedCols = explode(",", $row['col']); // saved column list
}
    $i=0;$totalCheck=0;
    while($cc=mysqli_fetch_array($ss)){
            if ($i == 0) {
            $i++;
            continue;
            }
    $colName    = $cc['Field'];
    $colComment = strtoupper(str_replace("_", " ", $cc['Comment'] ?: $colName));
    
    // Check conditions
    $checked   = "";
    $disabled  = "";
    $isDefault = false;

    // First 3 after skipping first → always checked + disabled
    if ($i > 0 && $i <= 3) {
        $checked  = "checked";
        $disabled = "disabled";
        $isDefault = true;
    }

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
    <?php $i++;
    }
    ?>
                        </ul>
                    </div>
            </div>
            
            <div id="column_output" class="sortable-list"></div>

    </div>
    <div class="offcanvas-footer" style="padding-left:10px;padding-top:0px;padding-bottom:0px;">
        <button type="submit" class="btn btn-primary">GENERATE & SAVE REPORT</button>
        <button type="button" class="btn btn-outline-primary"  data-bs-dismiss="offcanvas">CLOSE</button>
    </div>
    </form>
</div>
<script>
    
$(document).ready(function() {
    $('#column-filter-form').on('submit', function(e) {
        e.preventDefault();
        const selectedColumns = $('#column-checkboxes input:checked').map(function() {
            return this.value;
        }).get();
        
        // $('#columnOffcanvas').offcanvas('hide');
        $('#loader').show();
        $.ajax({
            url: 'data/custom.php',
            method: 'POST',
            data: { columns: selectedColumns,table:"<?php echo $ok;?>"},
            success: function(response) {
                $("#dataedit").html(response);
                
            }
        });

    });
});
</script>

<script>
$(function () {
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
  $('#column-checkboxes .dropdown-menu').on('change', '.dropdown-check', function () {
    const $menu      = $(this).closest('.dropdown-menu');
    const $wrapper   = $menu.closest('.dropdown-wrapper');
    const $input     = $wrapper.find('.dropdown-toggle');
    const $allChecks = $menu.find('.dropdown-check').not('.select-all');
    const $selectAll = $menu.find('.select-all');

    const isChecked = $(this).is(':checked');
    const name  = $(this).data('name');   // from checkbox attribute
    const value = $(this).val();

    if ($(this).hasClass('select-all')) {
      // ✅ If "Select All" clicked
      if (isChecked) {
        $allChecks.each(function () {
          const name  = $(this).data('name');
          const value = $(this).val();
          $(this).prop('checked', true);

          // Append only if not already in output
          if ($('#column_output').find(`[data-value="${value}"]`).length === 0) {
            $('#column_output').append(`
              <div class="column-tag" data-value="${value}">
                <span class="col-number"></span> ${name}
                <button type="button" class="remove-btn">&times;</button>
              </div>
            `);
          }
        });
      } else {
        // Unselect all
        $allChecks.prop('checked', false);
        $('#column_output').empty();
      }

      updateNumbers($allChecks, $selectAll, $input);
      return;
    }

    // ✅ Normal single checkbox toggle
    if (isChecked) {
      $('#column_output').append(`
        <div class="column-tag" data-value="${value}">
          <span class="col-number"></span> ${name}
          <button type="button" class="remove-btn">&times;</button>
        </div>
      `);
    } else {
      $('#column_output').find(`[data-value="${value}"]`).remove();
    }

    updateNumbers($allChecks, $selectAll, $input);
  });

  $("#column_output").sortable({
    update: function () {
      updateNumbers();
    }
  });

  $('#column_output').on('click', '.remove-btn', function () {
    const $tag = $(this).closest('.column-tag');
    const value = $tag.data('value');
    $tag.remove();

    // Uncheck checkbox too
    const $checkbox = $(`.dropdown-check[value="${value}"]`);
    $checkbox.prop('checked', false);

    const $menu      = $checkbox.closest('.dropdown-menu');
    const $wrapper   = $menu.closest('.dropdown-wrapper');
    const $input     = $wrapper.find('.dropdown-toggle');
    const $allChecks = $menu.find('.dropdown-check').not('.select-all');
    const $selectAll = $menu.find('.select-all');

    updateNumbers($allChecks, $selectAll, $input);
  });

  function updateNumbers($allChecks, $selectAll, $input) {
    $('#column_output .column-tag').each(function (i) {
      $(this).find('.col-number').text((i + 1) + ". ");
    });

    if ($allChecks && $selectAll && $input) {
      const total = $allChecks.length;
      const checkedCount = $allChecks.filter(':checked').length;
      $selectAll.prop('checked', total === checkedCount);

      if (checkedCount === total) {
        $input.val("All Selected");
      } else {
        $input.val(`${checkedCount} of ${total} selected`);
      }
    }
  }

  $('.dropdown-menu').on('click', function (e) {
    e.stopPropagation();
  });
  
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.dropdown-wrapper').length) {
      $('.dropdown-menu').removeClass('show');
    }
  });
  
});
</script>
<style>
     .column-tag {
    display: flex
;
    align-items: center;
    justify-content: space-between;
    padding: 6px 10px;
    margin: 4px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    background: #f9f9f9;
    cursor: grab;
}
.sortable-list {
    margin-top: 10px;
    max-height: 500px !important;
    overflow-y: auto !important;
}

.column-tag span {
    font-weight: 500;
}
.remove-btn {
    background: none;
    border: none;
    font-size: 14px;
    cursor: pointer;
    color: red;
}

</style>
