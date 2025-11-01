<?php
include("../session.php");


$chehck="";
$user=$_SESSION['username'];
if (strpos($user,"@")!=false and strpos($user,".com")!=false) {
$chehck=" and email!='$user'";
}


if($_POST['x']!='' && $_POST['type']!=''){
$x=$_POST['x'];

$type=$_POST['type'];
$extra=$_POST['extra'];

if($type=="1" or $type=="111" or $type=="1111"){
$ch=mysqli_query($host,"select * from applicant where id='$x'");
$dh=mysqli_fetch_array($ch);

$sid=$dh['id'];
$fs=mysqli_query($host,"select file from survey_upload where sid='$sid' and dtype='Resume'");
$ff=mysqli_fetch_array($fs);

$pdfFile=$ff['file'];
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
</style>
<div class="offcanvas offcanvas-end" tabindex="-1" id="jobOffcanvas" aria-labelledby="jobOffcanvasLabel" style="width:40%;">
    <div class="offcanvas-header bg-primary text-white">
        <h5 class="offcanvas-title" id="jobOffcanvasLabel"><?php echo strtoupper($dh['name']);?> Applicant Status</h5>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <?php
        if($type=="1"){
        ?>
        <div class="card mb-4 p-3">
            <div class="row g-2">
                <div class="col-6"><strong>Mobile Number : </strong>  <br/>
                <?php echo $dh['mobile'];?>
                </div>
                <div class="col-6"><strong>Email Address :</strong> <br><?php echo  $dh['email'];?></div>
                <div class="col-6"><strong>Location:</strong> <br><?php echo $dh['city'].",".$dh['state'].",".$dh['country'];?></div>
                <div class="col-6"><strong>Experience:</strong> <br><?php echo  $dh['year']."  ".$dh['year2'];?></div>
            </div>
            <hr class="my-3">
        </div>

        <div class="d-flex mb-3 nav-buttons" style="gap:20px;" role="tablist">
            <button class="btn btn-outline-primary active" id="details-tab-btn" data-bs-toggle="tab" data-bs-target="#details" type="button">Resume</button>
            <button class="btn btn-outline-primary" id="skills-tab-btn" data-bs-toggle="tab" data-bs-target="#skills" type="button">Submissions</button>
            <button class="btn btn-outline-primary" id="notes-tab-btn" data-bs-toggle="tab" data-bs-target="#notes" type="button">Experience</button>
            <button class="btn btn-outline-primary" id="email-tab-btn" data-bs-toggle="tab" data-bs-target="#email" type="button">Email Merges</button>
        </div>

        <div class="tab-content" id="jobTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel">
                    <?php
                    
                    if($pdfFile!=''){
                    ?>
                    <iframe src="<?php echo "img/".htmlspecialchars($pdfFile); ?>" width="100%" height="650px"></iframe>
                    <?php
                    }else{
                        echo "<p>No resume Found</p>";
                    }
                    ?>
                </div>
            
                <div class="tab-pane fade" id="skills" role="tabpanel">

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
        <?php
        }
        else{
            if($type=="1111"){
                $ts="1";
                $ttss=" and jid='$extra'"; $tabletype="submitjob";
            }
            else{
                $ts="2";
                $ttss=" and jid is null";
                $tabletype="applicant";
            }
        ?>
<ul class="list-unstyled timeline-widget mb-0 my-3">
    <?php
    $ss=mysqli_query($host,"select * from shistory where type='$ts' and  idd='$x' and table_type='$tabletype' $ttss");
    while($rr=mysqli_fetch_array($ss)){
    ?>
    <li class="timeline-widget-list">
        <div class="d-flex align-items-top">
            <div class="me-5 text-center"><span class="d-block fs-20 fw-semibold text-primary"><?php echo date('d',strtotime($rr['date']))?></span> <span class="d-block fs-12 text-muted"><?php echo date('M,y',strtotime($rr['date']))?></span></div>
            <div class="d-flex flex-wrap flex-fill align-items-top justify-content-between">
                <div>
                    <p class="mb-1 text-truncate timeline-widget-content text-wrap">Comment :- <?php echo $rr['comment'];?></p>
                    <p class="mb-0 fs-12 lh-1 text-muted"><?php echo date('h:i:s A',strtotime($rr['time']))?><span class="badge bg-primary-transparent ms-2"><?php echo $rr['status'];?></span></p>
                </div>
            </div>
        </div>
    </li>
    <?php
    }
    ?>
</ul>

        <?php
        }
        ?>

    </div>
</div>
<script>
   setTimeout(function (){
        const jobOffcanvas = document.getElementById('jobOffcanvas');
        const bsOffcanvas = new bootstrap.Offcanvas(jobOffcanvas);
        bsOffcanvas.show();
        
    $("#loader").css("display","none");
   },900);
</script>
<?php 
    
}

else if($type=="2"){
?>
<div class="offcanvas offcanvas-end"  style="width:45%;" tabindex="-1" id="notesOffcanvas">
  <div class="offcanvas-header  bg-primary text-white">
    <h5 class="offcanvas-title">Add Notes</h5>
    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="SameForm" method="post">

      <!-- Row for Select Action & Medium -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <select class="form-select" name="action" required>
            <option value="" hidden="">Select Action</option>
            <option>Added through Submission</option>
            <option>Added Through Tagging</option>
            <option>Call</option>
            <option>Imported from ResumeInbox</option>
            <option>Inbound SMS</option>
            <option>Meeting</option>
            <option>Outbound SMS</option>
            <option>Prescreen</option>
            <option>Submitted</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          
          <select class="form-select" name="s2">
              <option value=''>Select Priority</option>
              <option>Critical</option>
              <option>Low</option>
              <option>Medium</option>
              <option>High</option>
          </select>
        </div>
      </div>

      <!-- Notes Area -->
      <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea class="form-control" rows="5" name="notes" id="notes"></textarea>
      </div>

      <!-- Buttons -->
      <div class="d-flex justify-content-end gap-2">
             <input type="hidden" name="typee" value="<?php echo $type;?>"/>
             <input type="hidden" name="extra" value="<?php echo $extra;?>"/>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

    </form>
  </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

<script>
 
ClassicEditor
    .create(document.getElementById('notes'), {
     })
    .then(editor => {
    })
    .catch(error => {
        console.error(error);
    });

   setTimeout(function (){
        const jobOffcanvas = document.getElementById('notesOffcanvas');
        const bsOffcanvas = new bootstrap.Offcanvas(jobOffcanvas);
        bsOffcanvas.show();
        
    $("#loader").css("display","none");
   },900);
</script>
<?php
}
//backlist
else if($type=="7"){
    
?>
<div class="modal fade" id="addTagModal" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add Tag</h5>
          <button type="button" class="btn-close btn-close-dark" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();"></button>
        </div>
<form id="SameForm" method="post">
        <div class="modal-body">
          
          <input type="text" class="form-control" name="tag" placeholder="Enter Tag" required>
        </div>

        <!-- Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
             <input type="hidden" name="typee" value="<?php echo $type;?>"/>
             <input type="hidden" name="extra" value="<?php echo $extra;?>"/>
          <button type="button" class="btn btn-secondary" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();">Cancel</button>
        </div>

    </form>
      </div>
  </div>
</div>
<script>
   setTimeout(function (){
        const jobOffcanvas = document.getElementById('addTagModal');
        const bsOffcanvas = new bootstrap.Modal(jobOffcanvas);
        bsOffcanvas.show();
        
    $("#loader").css("display","none");
   },900);
</script>
<?php

}

else if($type=="9"){
    
?>
<div class="modal fade" id="addTagModal" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Change Ownership</h5>
          <button type="button" class="btn-close btn-close-dark" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();"></button>
        </div>
<form id="SameForm" method="post">
        <div class="modal-body">
          
          
             <div class="mb-3">
            <label class="form-label">Ownership</label>
            <select class="form-control" name="team" required>
                <option value=" " hidden="">Select Team</option>
                <?php 
                $s=mysqli_query($host,"select name,email from team where sub_domain='meraqui' $chehck order by name asc");
                while ($row = mysqli_fetch_array($s)) {
                ?>
              <option value="<?php echo $row['email']; ?>"><?php echo $row['name']; ?></option>
              <?php
                }
              ?>
            </select>
          </div>

        </div>

        <!-- Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
             <input type="hidden" name="typee" value="<?php echo $type;?>"/>
             <input type="hidden" name="extra" value="<?php echo $extra;?>"/>
          <button type="button" class="btn btn-secondary" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();">Cancel</button>
        </div>

    </form>
      </div>
  </div>
</div>
<script>
   setTimeout(function (){
        const jobOffcanvas = document.getElementById('addTagModal');
        const bsOffcanvas = new bootstrap.Modal(jobOffcanvas);
        bsOffcanvas.show();
           
    $("#loader").css("display","none");
   },900);
</script>
<?php

}

else if($type=="4" && (strtolower($_SESSION['typess'])=='admin' or strtolower($data['position'])=='recruiter team' or strtolower($data['position'])=='delivery head')){
?>
<div class="modal fade" id="addTagModal" tabindex="-1">
  <div class="modal-dialog">
    
      <div class="modal-content">
          
         <div class="modal-body">
           <div class="row">
               <div class="col-12 text-center">
                   <h4 class="mb-5 mt-5">Do you want to delete selected applicants ?</h4>
               </div>
               <div class="col-12 text-center">
                   <form method="post" id="SameForm">
                       <input type="hidden" name="typee" value="<?php echo $type;?>"/>
                       <input type="hidden" name="extra" value="<?php echo $extra;?>"/>
                   <button type="submit" id="deleteBtn" class="btn btn-danger">YES</button>
                   <button type="button" class="btn btn-outline-danger" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();">Cancel</button>
                   </form>
               </div>
           </div>
        
        </div>
        
      </div>
  </div>
</div>
<script>
       setTimeout(function (){
        const jobOffcanvas = document.getElementById('addTagModal');
        const bsOffcanvas = new bootstrap.Modal(jobOffcanvas);
        bsOffcanvas.show();
        
    $("#loader").css("display","none");
   },900);
</script>
<?php
}

else if($type=="15"){

if($extra=='aa'){
$newArray= [
  'DROP',
  'ONBOARDED',
  'Submitted to ATS',
  'INTERNAL SCREEN REJECT',
  'FIRSTMILE PANEL REJECT',
  'ASSIGNED TO PRESELECTION TEAM',
  'SUBMITTED TO CLIENT',
  'HOLD BY CLIENT',
  'DUPLICATE',
  'Submitted to Client',
  'CLIENT SCREEN REJECT',
  'Resume Shortlisted By Client',
  'L1 INTERVIEW',
  'L1 REJECT',
  'L1 SELECT',
  'L2 INTERVIEW',
  'L3 INTERVIEW',
  'L4 INTERVIEW',
  'MR ROUND',
  'HR ROUND',
  'L2 REJECT',
  'L2 SELECT',
  'L3 REJECT',
  'L3 SELECT',
  'L4 REJECT',
  'L4 SELECT',
  'MR REJECT',
  'MR SELECT',
  'HR REJECT',
  'HR SELECT',
  'FINAL SELECT BY CLIENT',
  'OFFER SENT',
  'OFFER REJECTED',
  'OFFER ACCEPTED'
];
}
else if($extra=='xx'){
$jj=mysqli_query($host,"SELECT name FROM appSetting WHERE tables='job' and type='status'"); 
while($jsx=mysqli_fetch_array($jj)){
$newArray[]=$jsx[0];
}
} 

else if($extra=='yy'){
$jj=mysqli_query($host,"SELECT name FROM appSetting WHERE tables='job' and type='status'"); 
while($jsx=mysqli_fetch_array($jj)){
$newArray[]=$jsx[0];
}
} 
   
?>
<div class="modal fade" id="blacklistModal" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Update Status</h5>
          <button type="button" class="btn-close btn-close-dark" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();"></button>
        </div>
<form id="SameForm" method="post">
        <div class="modal-body">
             <div class="mb-3">
            <label class="form-label">Status</label>
             <select class="form-control" name="tag" placeholder="Enter Tag" required>
                   <option value="">Select</option>
                  <?php
                  foreach($newArray as $values){
                     ?>
                     <option value="<?php echo $values;?>"><?php echo $values;?></option>
                     <?php
                  }
                  ?>
                </select>
          </div>
           <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea class="form-control" name="comment" rows="2"></textarea>
          </div>
        </div>

        <!-- Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
             <input type="hidden" name="typee" value="<?php echo $type;?>"/>
              <input type="hidden" name="extra" value="<?php echo $extra;?>"/>
          <button type="button" class="btn btn-secondary" onclick="$('#dataedit').html(''); $('.modal-backdrop').remove();">Cancel</button>
        </div>

    </form>
      </div>
  </div>
</div>
<script>
   setTimeout(function (){
        const jobOffcanvas = document.getElementById('blacklistModal');
        const bsOffcanvas = new bootstrap.Modal(jobOffcanvas);
        bsOffcanvas.show();
        
    $("#loader").css("display","none");
   },900);
</script>
<?php

}
?>
<script>
<?php
if($extra=="0101" or $extra=="aa"){

if($extra=="0101"){
echo "var allIds = $('#hiddenSelectedId_job').val();" ;  
}
else{
echo "var allIds = $('#hiddenSelectedIdsSorry').val();" ;  
}

}
else{
?>
var allIds = $("#hiddenSelectedIds").val();
<?php
}
?>
function callApplicantAPI(typee, formId) {
    let formDATA;
    formDATA = new FormData(document.getElementById(formId));
   
    formDATA.append("typee", typee);
    formDATA.append("ids", allIds);
  
    $("#loader").show();
    $.ajax({
        type: "post",
        url: "data/all_applicant.php",
        data: formDATA,
        processData: false,
        contentType: false,
        cache: false,
        success: function (html) {
            $("#dataedit").html(html);
            $("#loader").hide();
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            document.body.classList.remove('modal-open');
            //doSearch();
        }
    });
}

<?php
if($type=="2" or $type=="15" or $type=="7" or $type=="4" or $type=="9"){
?>
      $("#SameForm").on("submit",function (e){
        e.preventDefault();
       callApplicantAPI("<?php echo $type;?>", "SameForm");
    });
<?php }
?>
</script>
<?php

}
?>

