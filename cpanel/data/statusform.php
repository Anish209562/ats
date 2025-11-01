<?php
include("../session.php");

if(isset($_POST['stid'])){
$stid=$_POST['stid']; // primary key id
$tt=$_POST['tt']; // recieve number 1,2,3, 1 for applicant , 2 for jobposting
$sta=strtoupper($_POST['sta']); // status name

if($tt=='1'){
    $tables="submitjob";
}
if($tt=='2'){
    $tables="job";
}
if($tt=='3'){
    $tables='applicant';
}
if($tt=='4'){
    $tables='client';
}

$new=mysqli_query($host,"select status, comment from $tables where id='$stid'");
$news=mysqli_fetch_array($new);
$real=strtoupper($news[0]);

if($tt=='1') {
    
$final_select_statuses = [
    'FINAL SELECT BY CLIENT', 'DROP', 'HOLD BY CLIENT'
];

$select_levels = [
    'L1 SELECT', 'L2 SELECT', 'L3 SELECT', 'L4 SELECT', 'MR SELECT', 'HR SELECT'
];

$status_flow = [
    'DROP'=> [
      'DROP'
    ],
    'ONBOARDED'=> [
      'ONBOARDED'
    ],
    'Submitted to ATS' => [
        'INTERNAL SCREEN REJECT',
        'FIRSTMILE PANEL REJECT',
        'ASSIGNED TO PRESELECTION TEAM',
        'SUBMITTED TO CLIENT',
        'DROP',
        'HOLD BY CLIENT','DUPLICATE','POSITION ON HOLD'
    ],
    'Submitted to Client' => [
        'CLIENT SCREEN REJECT',
        'Resume Shortlisted By Client',
        'DROP',
        'HOLD BY CLIENT','DUPLICATE','POSITION ON HOLD'
    ],
    'Resume Shortlisted By Client' => [
        'L1 INTERVIEW',
        'L1 REJECT',
        'L1 SELECT', 
        'DROP',
        'HOLD BY CLIENT','DUPLICATE','POSITION ON HOLD'
    ],
     'L1 SELECT' => [
          'L2 INTERVIEW','L3 INTERVIEW','L4 INTERVIEW', 'MR ROUND', 'HR ROUND',
          'DROP','HOLD BY CLIENT','DUPLICATE','POSITION ON HOLD'
     ],
     'L2 INTERVIEW' => [
          'L2 REJECT','L2 SELECT',  'DROP','HOLD BY CLIENT', 'DUPLICATE' ,'POSITION ON HOLD'
      ],
      'L3 INTERVIEW' => [
          'L3 REJECT', 'L3 SELECT', 'DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
      ],
      'L4 INTERVIEW' => [
          'L4 REJECT', 'L4 SELECT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
      ],
      'HR ROUND' => [
          'MR REJECT', 'MR SELECT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
      ],
      'MR ROUND' => [
          'HR REJECT', 'HR SELECT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
      ],
      'L2 SELECT'=>[
        'FINAL SELECT BY CLIENT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
       ],
       'L3 SELECT'=>[
        'FINAL SELECT BY CLIENT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
       ],
       'L4 SELECT'=>[
        'FINAL SELECT BY CLIENT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
       ],
       'MR SELECT'=>[
        'FINAL SELECT BY CLIENT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
       ],
       'HR SELECT'=>[
        'FINAL SELECT BY CLIENT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
       ],
     'FINAL SELECT BY CLIENT' => [
        'OFFER SENT','DROP','HOLD BY CLIENT', 'DUPLICATE','POSITION ON HOLD'
     ],
    'OFFER SENT' => [
        'OFFER REJECTED','DROP','HOLD BY CLIENT',
        'OFFER ACCEPTED','DUPLICATE','POSITION ON HOLD'
    ],
    'OFFER ACCEPTED' => [
        'ONBOARDED','DROP','HOLD BY CLIENT','DUPLICATE','POSITION ON HOLD'
    ]
];

$lowercase_status_flow = [];
foreach ($status_flow as $key => $values) {
    $lowercase_key = strtoupper($key);
    $lowercase_values = array_map('strtoupper', $values);
    $lowercase_status_flow[$lowercase_key] = $lowercase_values;
}

$dropdown_options = [];
$real = strtoupper($real);

if (array_key_exists($real, $lowercase_status_flow)) {
    $dropdown_options = $lowercase_status_flow[$real];
} else {
    foreach ($lowercase_status_flow as $category => $statuses) {
        if (in_array($real, $statuses)) {
            $dropdown_options =$statuses;
            break;
        }
    }
}

if (empty($dropdown_options)) {
    $dropdown_options = [$real];
}

}

?>
<div class="modal fade show" id="modal_statua_demo8" tabindex="-1" role="dialog" aria-labelledby="modal_statua_demo8" aria-hidden="true" style="z-index: 999999; opacity: 1;display: block;background: #00000070;">

     <div class="modal-dialog modal-dialog-start text-center" role="document">
                                            <div class="modal-content modal-content-demo" style="background-color:#ececec !important;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"><span id="statustext"></span> Status</h6>
                                                    <button aria-label="Close" class="btn-close" onclick="$('#dataedit').html('');"></button>
                                                </div>
                                               <form method="post" id="status_form">
                                                <div class="modal-body text-start" style="padding-top:0px;">
                                                    <div class="row">
                                                        
                                                        <div class="col-12">
                                                            <label class="form-label mt-2">Status</label>
                                                            <select class="form-control" name="status" id="status" required="">
                                                               <option value="" hidden="">Select Status</option>
<?php
if($tt=='2' or $tt=='3'){
$ss=mysqli_query($host,"SELECT name FROM appSetting WHERE tables='$tables' and type='status' order by name asc");
while($dd=mysqli_fetch_array($ss)){
?>
<option value="<?php echo $dd[0];?>" <?php echo trim(strtolower($dd[0]))==trim(strtolower($sta)) ? 'selected' : '';?>><?php echo $dd[0];?></option>
                                                                  <?php
}

}
else if($tt=='4'){
$statuses = ['Active', 'Inactive'];
foreach ($statuses as $status) {
    echo "<option value='$status'" . ($real == strtoupper($status) ? " selected" : "") . ">$status</option>";
}

}
else if($tt=='1'){

foreach ($dropdown_options as $option) {
    $selected = ($option === $real) ? 'selected' : '';
    echo "<option value=\"$option\" $selected>$option</option>";
}

}
                                                               ?>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="col-12">
                                                          <label class="form-label mt-2">Comment</label>
                                                          <textarea class="form-control" name="comment" rows="4" id="comment" placeholder="Comment"><?php echo $news[1];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="padding-top: 0px;padding-right: 16px;">
                                                    <input type="hidden" name="status_hidden" id="status_hidden"  value="<?php echo $stid;?>"/>
                                                    <input type="hidden" name="tables" id="tables" value="<?php echo $tt;?>"/>
                                                    <button class="btn btn-myself" type="submit">Update</button> 
                                                    <button class="btn btn-outline-dark" onclick="$('#dataedit').html('');" type="button" >Close</button>
                                            </div>
                                                </form>
                                        </div>
                                    </div>
</div>
<script>
    $(document).ready(function (){
$("#loader").hide();
$("#status_form").on("submit",function (e){
    e.preventDefault();
$("#loader").show();

$.ajax({
type:"post",
url:"data/statusupdate.php",
data:$(this).serialize(),
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

});
});

</script>
<?php 
}
?>