<?php 
if(isset($tokens)){
    $hh=" and token='$tokens'";
?>
 <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>DOCUMENT</th>
                            <th>DUE DATE</th>
                            <th>APPROVERS</th>
                            <th>COMMENTS</th>
                            <th>SUPPORTING DOCUMENTS</th>
                            <th>SEND MAIL <i class="fa fa-info-circle" data-bs-original-title="The document will be visible in the applicant portal only when checkbox is checked" data-bs-toggle="tooltip"></i></th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="document_table">

<?php
$s1=mysqli_query($host,"select * from onboard_file where due is not null $hh order by date desc, time desc");  
$duedate='';
while ($d1 = mysqli_fetch_array($s1)) { 
    if($duedate==''){
    $duedate=$d1['alldue'];
    }
?>
<tr id="check_row<?php echo $d1['id'];?>">
            <td class="mera-primary">
                <?php echo $d1['document']; ?></td>
            <td>
                
                 <input type="text" class="form-control humanfrienndlydates" name="duesdate[]" id="duedate<?php echo $d1['id'];?>" value="<?php echo $d1['due'];?>">
                
            </td>
            <td>
               <div class="dropdown dropdown-wrapper w-100">
      
    <input type="text" class="form-control dropdown-toggle" readonly data-bs-toggle="dropdown" data-bs-auto-close="true" />
     <i class="bi bi-chevron-down position-absolute top-50 translate-middle-y end-0 me-3"></i>

    <ul class="dropdown-menu w-100" style="max-height: 300px; overflow-y: auto;">
    </ul>
  </div>
            </td> 
            <td>
                <input type="hidden" name="idd[]" value="<?php echo $d1['id'];?>"/>
                <input type="text" name="comment[]" value="<?php echo $d1['comments'];?>" class="form-control"/>
                
            </td>
            <td><input type="checkbox" value="0" <?php if($d1['document']=='1'){echo "checked";}; ?>/> <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-original-title="No Documents are linked"></i></td>
            <td><input type="checkbox" value="0" <?php if($d1['mail']=='1'){echo "checked";}; ?>/></td>
            <td>
           <?php
           if(!isset($oks['id'])){?>
             <i style="padding-right: 6px;" class="fas fa-trash-alt mera-primary" onclick="dele(<?php echo $d1['id'];?>,'2')"></i>  
             <?php }
           ?>
             <?php echo ucwords(strtolower($d1['status']));?>
             <i style="padding-right: 6px;" class="fas fa-eye mera-primary" onclick="viewDocument(<?php echo $tokens;?>,<?php echo $d1['id'];?>,'1');" data-bs-original-title="View" data-bs-toggle="tooltip"></i> 
             
            </td>
        </tr>
        
<?php } 
?>
                    </tbody>
                </table>
               <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

                <script>
flatpickr(".humanfrienndlydates",{altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d"});
$("#due_date1, #duedate_form").val("<?php echo $duedate;?>");
                </script>
<?php
} 
?>
