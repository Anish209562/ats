<?php
include("../session.php");

if($_POST['jid']!='' && $_POST['type']!='' && $_POST['type']!=0){
    $jobid=$_POST['jid'];
$typee=$_POST['type'];

?>

<tr class="job-extra-row job-extra-row-<?php echo $jobid;?>">
    <td colspan="100%">
        <div class="listTabB fetch_associate_block" id="fetch_associate_block03" style="display:grid;margin-left:35px;">
     <?php
  if($typee=='1'){
  ?>
                <div style="display:none !important;gap: 25px;margin-bottom: 12px;" id="showDivTabs">
                   <a href="javascript:void(0);" onclick="particularCall('','2','0101');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Add Note</a>
                   <a href="javascript:void(0);" onclick="updatejobStatus('','15','aa');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Update Status</a>
                   <?php
                   if(strtolower($_SESSION['typess'])=='admin'){ ?>
                   <a href="javascript:void(0);" onclick="particularCall('','4','0101');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Remove</a>
                   <?php } ?>
                   <a href="javascript:void(0);" id="exportbtn" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Export</a>
             
               </div>
               <input type="hidden" id="hiddenSelectedId_job" name="selectedValues" value=""/>
               <input type="hidden" id="hiddenSelectedIdsSorry" name="selectedValues2" value=""/>
                    <table class="subTLV21 table-striped" cellpadding="0" cellspacing="0" style="width:100% !important;" id="subTLV21">
                         <thead>
                            <tr>
                                 <th style="padding: 8px 10px !important;">
                                    <input type="hidden" name="data[]" id="_" value="0" />
                                    <input type="checkbox" name="data[]" data-applicant-id="5" class="select-all-subs" value="1" id="" />
                            </th>
                                <th style="padding: 8px 10px !important;"> Job Code
                                </th>
                                <th style="padding: 8px 10px !important;"> Job Title
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Recruitment Manager
                                </th>
                                <th style="padding: 8px 10px !important;">Resume</th>
                                <th style="padding: 8px 10px !important;">
                                    Profile Status
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Client
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Source
                                </th>
                                <th style="padding: 8px 10px !important;">Client Bill Rate / Salary</th>
                                <th style="padding: 8px 10px !important;">Bill Rate</th>
                                <th style="padding: 8px 10px !important;">Pay Rate</th>
                                <th style="padding: 8px 10px !important;">Employer Name</th>
                                <th style="padding: 8px 10px !important;">
                                    Submitted By
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Submitted On
                                </th>
                            </tr>
                        </thead>
                        <tbody>
<?php
// applicant data
$app=mysqli_query($host,"select id, status,source from applicant where subdomain='$subdomain' and id='$jobid'");
$aps=mysqli_fetch_array($app);

// resume
$sur=mysqli_query($host,"select file from survey_upload where sid='$jobid'");
$down=mysqli_fetch_array($sur);

// Salary
$ss=mysqli_query($host,"select jobid,clientid, type, date,time, status,id from submitjob where sub_domain='$subdomain' and sid='$jobid'");
while($dss=mysqli_fetch_array($ss)){

$job=$dss[0];    
$cid=$dss[1];
$typee=$dss[2];
$ddate=$dss[3];
$times=$dss[4];

$mainStatus2=$dss[5];
$mainid2=$dss[6];

$sd=mysqli_query($host,"select job.salary_type,job.salary_time,job.salary_max,job.id,job.job_code,job.job_title,job.recrutment, job.bill_type,job.bill_time,job.rate, job.client from job where job.subdomain='$subdomain' and job.id='$job'");
$d2=mysqli_fetch_array($sd);
$sal2=$d2['salary_max'];
?>
<tr class="exportcheck<?php echo $d2['id'];?>">
                                <td>
                                    <input type="checkbox" class="applicantCheckbox" name="dummychk" value="<?php echo $d2['id'].";".$dss['id'];?>" />
                                </td>
                                <td>
                                    <?php echo $d2['job_code'];?>
                                </td>

                                <td>
                                    <a href="job_view.php?sid=<?php echo $job;?>" target="_blank"><?php echo $d2['job_title'];?></a>
                                   
                                    <a href="job_view.php?sid=<?php echo $job;?>" class="mera-primary" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Quick View">
                                     <i class="fas fa-binoculars"></i>
                                   </a>
                                    
                                </td>

                                <td>
                                    <?php echo $d2['recrutment'];?>
                                </td>

                                <td>
                                    <span>
                                        <a class="filedownload view_doc" data-img-ext="far fa-file-pdf" href="img/<?php echo $down[0];?>" download="" data-toggle="tooltip"data-original-title="Resume"data-placement="bottom">
                                            <i class="far fa-file-pdf" style="font-size: 12px;"></i>
                                        </a>
                                    </span>
                                </td>

                                <td>
            
            <span id="applicant_status_div_<?php echo $mainid2;?>"><?php echo $mainStatus2; ?> </span>
            <span class="mera-primary" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                <i class="fas fa-pencil-alt mera-primary" onclick="status(<?php echo $mainid2;?>,'<?php echo $mainStatus2; ?>','1');"></i>
                
            </span>
            <span class="mera-primary" onclick="particularCall(<?php echo $jobid;?>,'1111',<?php echo $d2['id']; ?>);" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Status History"><i style="margin-left:10px;" class="fa fa-history"></i></span>
</td>
                                <td>
                                    <?php echo $d2['name'];?>
                                </td>
                                <td>
                                   <?php echo $aps['source'];?>
                                </td>

                                <td>
                                    <?php echo $d2['bill_type']." /".$d2['bill_time'];?>
                                </td>

                                <td>
                                   <?php echo $d2['rate'];?>
                                </td>

                                <td>
                                  <?php if($sal2>0){echo $d2['salary_type']."/".$d2['salary_max']."/".$d2['salary_time'];}else{echo '-';}?>
                                </td>

                                <td>
                                    一
                                </td>

                                <td><?php echo $typee;?></td>

                                <td>
                                <?php echo date('d M, Y',strtotime($ddate))." ".date('H:i:s',strtotime($times));?>
                                </td>

                            </tr>

<?php

}
?>
                      </tbody>
                    </table>
    <?php
  }
  else{
      if($typee=='2'){
      ?>
               <div style="display:none !important;gap: 25px;margin-bottom: 12px;" id="showDivTabs">
                   <a href="javascript:void(0);" onclick="updatejobStatus('','15','aa');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Update Status</a>
                   <a href="javascript:void(0);" onclick="particularCall('','7','0101');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Add Tag</a>
                   <a href="javascript:void(0);"  onclick="particularCall('','9','0101');"style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Change Ownership</a>
                  <?php if(strtolower($_SESSION['typess'])=='admin'){?>
                   <a href="javascript:void(0);" onclick="particularCall('','4','0101');" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Remove</a>
                   <?php } ?>
                   <a href="javascript:void(0);" id="exportbtn" style="padding: 7px 14px;border: 2px solid var(--primary08);color: var(--primary-color) !important;font-size: 13px;border-radius: 10px;">Export</a>
               </div>
               <input type="hidden" id="hiddenSelectedId_job" name="selectedValues" value="">
               <input type="hidden" id="hiddenSelectedIdsSorry" name="selectedValues2" value=""/>
                 <table class="table-striped" cellpadding="0" cellspacing="0" id="subTLV21" style="width:100% !important;">
                         <thead>
                            <tr>
                                <th style="padding: 8px 10px !important;">
                                    <input type="hidden" name="data[]" id="_" value="0" />
                                    <input type="checkbox" name="data[]" data-applicant-id="5" class="select-all-subs" value="1" id="" />
                            </th>
                                <th style="padding: 8px 10px !important;"> Submission Id
                                </th>
                                <th style="padding: 8px 10px !important;"> Applicant Name
                                </th>
                                <th style="padding: 8px 10px !important;">Mobile No.</th>
                                <th style="padding: 8px 10px !important;">
                                    Location
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Experience
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Source
                                </th>
                                <th style="padding: 8px 10px !important;">Resume</th>
                                <th style="padding: 8px 10px !important;">
                                    Application Status
                                </th>
                                <th style="padding: 8px 10px !important;">Pay Rate</th>
                                <th style="padding: 8px 10px !important;">Availability</th>
                                
                                <th style="padding: 8px 10px !important;">
                                    Current CTC
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Submitted By
                                </th>
                                <th style="padding: 8px 10px !important;">
                                    Submitted On
                                </th>
                            </tr>
                        </thead>
                        <tbody>
<?php

$ss=mysqli_query($host,"select sid, status,id from submitjob where sub_domain='$subdomain' and jobid='$jobid'");
while($dss=mysqli_fetch_array($ss)){

$sid=$dss[0];    
$mainStatus=$dss[1];
$mainId=$dss[2];

$sd=mysqli_query($host,"select * from applicant where subdomain='$subdomain' and id='$sid'");
$d2=mysqli_fetch_array($sd);

$sur=mysqli_query($host,"select file from survey_upload where sid='$sid'");
$down=mysqli_fetch_array($sur);

?>
<tr  class="exportcheck<?php echo $sid;?>">
                                <td>
                                    <input type="checkbox" class="applicantCheckbox" name="dummychk "  value="<?php echo $sid.";".$dss['id'];?>" />
                                </td>
                                <td>
                                    <?php echo $mainId;?>
                                </td>

                                <td>
                                    <a href="app_view.php?sid=<?php echo $sid;?>" target="_blank"><?php echo ucwords(strtolower($d2['name']));?></a>
                                   
                                    <a href="app_view.php?sid=<?php echo $sid;?>" target="_blank" class="mera-primary" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Quick View">
                                     <i class="fas fa-binoculars"></i>
                                   </a>
                                    
                                </td>

                                <td>
                                     <?php echo $d2['mobile'];?>
                                </td>

                                <td><?php if($d2['city']!='' or $d2['address']){echo $d2['city'].",".$d2['state'];}else{echo "N/A";}?></td>
                                
                                <td>
                                    <?php echo $d2['year'] ? $d2['year'] : 'N/A';?>
                                </td>
                                <td>
                                    <?php echo $d2['source'] ? $d2['source'] : 'N/A';?>
                                </td>

                                <td>
                                    <span>
                                        <a class="filedownload view_doc" data-img-ext="far fa-file-pdf" href="img/<?php echo $down[0];?>" download="" data-bs-toggle="tooltip" data-bs-original-title="Resume Download" data-placement="bottom">
                                            <i class="far fa-file-pdf" style="font-size: 12px;"></i>
                                        </a>
                                    </span>
                                </td>

                               <td>
                                   <span id="applicant_status_div_<?php echo $mainId;?>">
                                 <?php echo $mainStatus; ?>
            </span>
            <span class="mera-primary" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                <i class="fas fa-pencil-alt mera-primary" onclick="status(<?php echo $mainId;?>,'<?php echo $mainStatus; ?>','1');"></i>
            </span>
            <span class="mera-primary" onclick="particularCall(<?php echo $sid;?>,'1111',<?php echo $jobid; ?>);" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Status History"><i style="margin-left:10px;" class="fa fa-history"></i></span>

                                <td>
                                    <?php if($d2['ectc']!='' or $d2['ectc_type']){echo $d2['ectc']."/".$d2['ectc_type'];}else{echo "N/A";}?>
                                </td>
                                
                                <td>
                                    <?php echo '__';?>
                                </td>

                                <td>
                                     <?php if($d2['ctc']!='' or $d2['ctc_type']){echo  $d2['ctc']."/".$d2['ctc_type'];}else{echo "N/A";}?>
                                </td>

                                <td>
                                <?php echo $d2['createname'];?>
                                </td>

                                  <td>
                                <?php echo date('d M, Y',strtotime($d2['date']))." ".date('H:i A',strtotime($d2['time']));?>
                                </td>

                            </tr>

<?php

}
?>
                      </tbody>
                    </table>
      <?php
      }
  }
  ?>       
        </div>
    </td>
    </tr>
<script>

$(document).ready(function () {
    
const $selectAll = $(".select-all-subs"); // Select all checkbox
const $checkboxes = $(".applicantCheckbox"); // Candidate checkboxes
const $div = $("#showDivTabs");
const $hiddenInput = $("#hiddenSelectedId_job"); // Hidden input where we store IDs
const $hiddenInput2 = $("#hiddenSelectedIdsSorry");

$selectAll.on("change", function () {
        $checkboxes.prop("checked", this.checked);
        updateHiddenInput();
        toggleDiv();
    });

$checkboxes.on("change", function () {
        const allChecked = $checkboxes.length === $checkboxes.filter(":checked").length;
        $selectAll.prop("checked", allChecked);
        updateHiddenInput();
        toggleDiv();
    });

function updateHiddenInput() {
        let beforeVals = [];
        let afterVals  = [];

        $checkboxes.filter(":checked").each(function () {
            let val = $(this).val(); 
            let parts = val.split(";");
            if (parts.length === 2) {
                beforeVals.push(parts[0]);
                afterVals.push(parts[1]);
            }
        });
        
        $hiddenInput.val(beforeVals.join(","));   // store comma separated before ;
        $hiddenInput2.val(afterVals.join(","));   // store comma separated after ;
}

function toggleDiv() {
        if ($checkboxes.is(":checked") || $selectAll.is(":checked")) {
            $div.css("display","flex");
        } else {
            $div.hide();
        }
    }

$("#exportbtn").on("click",function (){
  $("#loader").show();
  let ids = document.getElementById("hiddenSelectedId_job").value.split(",").filter(Boolean);
  if (ids.length === 0) {
    alert("Please select rows to export!");
    return;
  }

  let table = document.getElementById("subTLV21");

  // get headers (skip the checkbox column header)
  let headers = Array.from(table.querySelectorAll("thead th"))
                     .slice(1) // skip first th with checkbox
                     .map(th => th.innerText.trim());
  
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

if ($.fn.DataTable.isDataTable('#subTLV21')) {
    $('#subTLV21').DataTable().destroy();
}
new DataTable('#subTLV21', {
        scrollX: true,
        ordering: false,
        searching: false,lengthChange: false
});
        
});

</script>
<?php
}
?>
