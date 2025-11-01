<?php
include("../session.php");

if($_POST['jid']!='' && $_POST['type']!='' && $_POST['type']!=0){

$jobid=$_POST['jid'];
$typee=$_POST['type'];
if($typee==='1'){
?>
<tr class="job-extra-row job-extra-row-<?php echo $jobid;?>">
    <td colspan="100%">
        <div class="listTabB fetch_associate_block" id="fetch_associate_block03" style="display:grid;margin-left:35px;width:49%;">
               <div style="display:none !important;gap: 25px;margin-bottom: 12px;" id="showDivTabs">
                  
                  <?php if(strtolower($_SESSION['typess'])=='admin'){?>
                   <a href="javascript:void(0);" onclick="particularCall('','4');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Remove</a>
                   <?php } ?>
                   <a href="javascript:void(0);" id="exportbtn" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Export</a>
               </div>
               <input type="hidden" id="hiddenSelectedIds" name="selectedValues" value="">
                 <table class="table-striped" cellpadding="0" cellspacing="0" id="subTLV21">
                         <thead>
                            <tr>
                                <th style="padding: 8px 10px !important;">
                                    <input type="checkbox" name="data[]" data-applicant-id="5" class="select-all-subs" value="1" id="" />
                                     </th>
                                <th style="padding: 8px 10px !important;"> Name
                                </th>
                                <th style="padding: 8px 10px !important;"> Email
                                </th>
                                <th style="padding: 8px 10px !important;">Mobile No.</th>
                                <th style="padding: 8px 10px !important;">
                                    Department
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    POST
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Created On
                                </th>
                            </tr>
                        </thead>
                        <tbody>
<?php

$ss=mysqli_query($host,"select * from item_details where sub_domain='$subdomain' and itemid='$jobid'");
while($dss=mysqli_fetch_array($ss)){

?>
<tr  class="exportcheck<?php echo $dss['id'];?>">
                                <td>
                                    <input type="checkbox" class="applicantCheckbox" name="dummychk "  value="<?php echo $dss['id'];?>" />
                                </td>
                                <td><?php echo ucwords(strtolower($dss['name']));?></td>
                                
                                 <td>
                                     <span data-bs-toggle="tooltip" data-bs-original-title="Copy Email Id"><?php echo $dss['email'];?></span>
                                </td>

                                <td>
                                     <span data-bs-toggle="tooltip" data-bs-original-title="Copy number"><?php echo $dss['mobile'];?></span>
                                </td>

                                <td><?php echo $dss['depart']; ?></td>
                                <td><?php echo $dss['post']; ?></td>
                                
                                  <td>
                                <?php echo date('d M, Y',strtotime($dss['date']))." ".date('H:i A',strtotime($dss['time']));?>
                                </td>
                      
                            </tr>

<?php

}
?>
                      </tbody>
                    </table>
    
        </div>
    </td>
    </tr>
<script>
    $(document).ready(function () {
    const $selectAll = $(".select-all-subs"); // Select all checkbox
    const $checkboxes = $(".applicantCheckbox"); // Candidate checkboxes
    const $div = $("#showDivTabs");
    const $hiddenInput = $("#hiddenSelectedIds"); // Hidden input where we store IDs

    // Select All toggle
    $selectAll.on("change", function () {
        $checkboxes.prop("checked", this.checked);
        updateHiddenInput();
        toggleDiv();
    });

    // Individual checkbox toggle
    $checkboxes.on("change", function () {
        const allChecked = $checkboxes.length === $checkboxes.filter(":checked").length;
        $selectAll.prop("checked", allChecked);
        updateHiddenInput();
        toggleDiv();
    });

    // Update hidden input with checked values
    function updateHiddenInput() {
        const values = $checkboxes.filter(":checked").map(function () {
            return $(this).val();
        }).get();
        $hiddenInput.val(values.join(",")); // Store as comma separated
    }

    // Show/hide div
    function toggleDiv() {
        if ($checkboxes.is(":checked") || $selectAll.is(":checked")) {
            $div.css("display","flex");
        } else {
            $div.hide();
        }
    }

document.getElementById("exportbtn").addEventListener("click", () => {
  $("#loader").show();
  let ids = document.getElementById("hiddenSelectedIds").value.split(",").filter(Boolean);
  if (ids.length === 0) {
    alert("Please select rows to export!");
    return;
  }

  let table = document.getElementById("subTLV21");

  let headers = Array.from(table.querySelectorAll("thead th")).slice(1).map(th => th.innerText.trim());
  
  let rows = [];
  rows.push(headers);

  ids.forEach(id => {
    let row = document.querySelector(".exportcheck" + id);
    if (row) {
      let cols = Array.from(row.querySelectorAll("td")).slice(1); // skip first td with checkbox
      rows.push(cols.map(td => td.innerText.trim()));
    }
  });

  // convert to CSV
  let csvContent = "data:text/csv;charset=utf-8,"
      + rows.map(r => r.map(v => `"${v}"`).join(",")).join("\n");

  let link = document.createElement("a");
  link.setAttribute("href", encodeURI(csvContent));
  link.setAttribute("download", "export.csv");
  document.body.appendChild(link);
  link.click();
  $("#loader").hide();
  document.body.removeChild(link);
});
        
    });
</script>
<?php
}
else{

if($typee=='2'){

$jid=$_POST['jid'];

$s=mysqli_query($host,"select display from client where id='$jid' and subdomain='$subdomain'");
$ds2=mysqli_fetch_array($s);
$disp=$ds2[0];
if(strtoupper($disp)=="yes"){
    $ok="YES";
}
else{
    $ok="NO";
}
mysqli_query($host,"update client set display='$ok' where id='$jid' and subdomain='$subdomain'");
}

}


}


?>
