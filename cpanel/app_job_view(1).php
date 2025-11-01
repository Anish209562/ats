<?php include("session.php"); 

function okay(){
header("Location :applicant.php");
exit;
}

if($_GET['sid']!=''){
$sid=$_GET['sid'];
$s=mysqli_query($host,"select * from applicant where id='$sid'");
if(mysqli_num_rows($s)==1){
$ds=mysqli_fetch_array($s);
}
else{
okay();
}
}
else{
okay();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- TITLE -->
		<title> <?php echo $ds['name'];?> - Applicant </title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


        <!-- FAVICON -->
        <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="build/assets/icon-fonts/icons.css" rel="stylesheet">
        
        <!-- APP SCSS -->
        <link rel="preload" as="style" href="build/assets/app-fce3f544.css" /><link rel="stylesheet" href="build/assets/app-fce3f544.css" />

        <!-- NODE WAVES CSS -->
        <link href="build/assets/libs/node-waves/waves.min.css" rel="stylesheet"> 

        <!-- SIMPLEBAR CSS -->
        <link rel="stylesheet" href="build/assets/libs/simplebar/simplebar.min.css">

        <!-- COLOR PICKER CSS -->
        <link rel="stylesheet" href="build/assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="build/assets/libs/%40simonwep/pickr/themes/nano.min.css">

        <!-- CHOICES CSS -->
        <link rel="stylesheet" href="build/assets/libs/choices.js/public/assets/styles/choices.min.css">

        <!-- CHOICES JS -->
        <script src="build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="build/assets/libs/jquery/jquery.min.js"></script>


        <!-- MAIN JS -->
        <script src="build/assets/main.js"></script>

         
        <!-- QUILL CSS -->
        <link rel="stylesheet" href="build/assets/libs/quill/quill.snow.css">
        <link rel="stylesheet" href="build/assets/libs/quill/quill.bubble.css">

        <!-- FILEPOND CSS -->
        <link rel="stylesheet" href="build/assets/libs/filepond/filepond.min.css">
        <link rel="stylesheet" href="build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
        <link rel="stylesheet" href="build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

        <!-- DATE & TIME PICKER CSS -->
        <link rel="stylesheet" href="build/assets/libs/flatpickr/flatpickr.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
 

<style>
    .pickr .pcr-button {
    height: 4em !important;
    width: 4em !important;
    }
    #newoutputs3 td p{
        margin-bottom:0px !important;
    }

    
    .tab-content .tab-pane {
     padding: 0px !important; 
     border: none !important;
    }
    .p-sm-3 {
        padding-bottom: 0px !important;
    }
    .form-label {
    margin-top: 5px;
}
#reminder .card.custom-card {
    margin-bottom: 0px !important;
}
#reminder .card.custom-card .card-body {
    padding: 8px 15px !important;
    margin: 12px 0px !important;
}
.nav-tabs-header .nav-item .nav-link.active {
    background: var(--primary-color) !important;
    color: #fff !important;
}
.form-check-input, .form-check-input:focus {
    border: 1px solid var(--menu-bg) !important;
}
</style>


	</head>

	<body>

       <!-- LOADER -->
		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

            <!-- HEADER -->
          <?php include 'header.php';  ?>
            <!-- END HEADER -->

            <!-- SIDEBAR -->
          <?php include 'sidebar.php';  ?>
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content">

                
                <div class="container-fluid">

             <style>
i.bi{
    margin-top: -2px;
    float: left;
    padding-right: 6px;
    
}

    .nav-tabs {
      border: none;
      background-color: #f5f8fb;
    }

    .nav-tabs .nav-link {
      color: #555;
      font-size: 14px;
      position: relative;
      border: none;
      background-color: transparent;
      margin-right: 10px;
    }

    .nav-tabs .nav-link.active {
      color: #007bff;
      font-weight: 500;
      background-color: #f3f8fb;
    }



    .tab-content {
      border-top: none;
      background: none !important;
    }
.card-header{
    background: #fff !important;
}
    .word {
      background-color: #eac6e1;
      width: 50px;
      height: 50px;
      display: flex; /* Use flexbox for centering */
      align-items: center; /* Center vertically */
      justify-content: center; /* Center horizontally */
      color: white;
      font-size: 22px;
      font-weight: bold;
      border-radius: 50%; /* Changed to 50% for a perfect circle */
    }

    p {
      margin: 0;
    }
 /* Align star ratings */
    .star-rating i {
      color: orange; /* Example color for stars */
      margin-right: 2px;
    }

    /* Style for buttons within the snapshot section */
    .snapshot-buttons button {
      margin-right: 10px;
      margin-bottom: 10px; /* Add some space below buttons */
      padding: 8px 15px;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    .snapshot-buttons button:hover {
      opacity: 0.9;
    }

    /* Tag styling */
    .tag-bubble {
      display: inline-flex;
      align-items: center;
         padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
      margin-right: 10px;
    }

    .tag-bubble.bg-primary {
           color:var(--custom-white) !important;

    }

    .tag-bubble.secondary {
      background-color: #e8e8e8;
      color: var(--default-text-color) !important;
    }

    .tag-bubble .count {
      background-color: white;
      color: black;
      border-radius: 10px;
      padding: 2px 8px;
      margin-left: 5px;
      font-weight: bold;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table thead th {
        border-top: 1px solid #313649;
    border-bottom: 1px solid #313649;
    color: #313649;

    }
    .card.custom-card{
        background:none !important;
    }
    .section-container{
        background-color: #fff !important;
        margin-bottom:20px;
        padding: 15px;border-radius: 9px !important;
    }
     .border-right {
    border-right: 1px solid #dee2e6;
    margin-top: 15px;
  }
  
  
.apRDetailsB {
    float: left;
    width: 100%;
    background: #fff !important;
    padding: 14px 20px;height: 100%;
}

.apFieldRow {
    float: left;
    width: 100%;
}
 .apLabel {
       color: #949494;
    font-size: 13px;
} 
 .apFieldInfo {
    color:var(--menu-bg);
    font-size: 14px;
    font-weight: 500 !important;
    
    margin-bottom: 15px;
} 
.text-muted{
    font-size: 12px;
}
.tap-pane .section-container h5{
    font-size: 18px;
    margin-bottom: 20px;
    padding-top: 4px;
}
.alert-primary{
        font-size: 15px !important;
}
#mera li a{
    padding: 10px 20px !important;
}

/* progress bar */
    .progress-container {
      position: relative;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 30px 10px 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-family: sans-serif;
    }

    .progress-line {
      position: absolute;
      top: 38px;
      left: 0;
      right: 0;
      height: 4px;
      background: #ccc;
      z-index: 0;
    }

    .progress-line-fill {
      position: absolute;
      top: 0px;
      left: 0;
      height: 4px;
      background: #28a745;
      z-index: 1;
      transition: width 0.3s ease;
    }

    .step {
      position: relative;
      text-align: center;
      width: 14.28%; /* 100% / 7 steps */
      z-index: 2;
    }

    .circle {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #ccc;
      margin: 0 auto;
      position: relative;
    }

    .step.active .circle,
    .step.checked .circle {
      background: #28a745;
    }

    .step.checked .circle::after {
      content: "✓";
      color: white;
      font-size: 12px;
      display: block;
      text-align: center;
      line-height: 16px;
    }

    .label {
      font-size: 12px;
      margin-top: 6px;
    }

    .time {
      font-size: 10px;
      color: #777;
      margin-top: 2px;
    }
   .text-primary {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
}
</style>
        
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                            
  <div class="row">
      <div class="col-xl-8 col-lg-9">
 <?php
 if($_GET['tt']==""){
 ?>
         <div class="section-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5><?php echo ucwords(strtolower($ds['name']))."'s Profile";?></h5>
               <div>
           <button class="mb-3 btn btn-sm btn-primary" id="actionBtnWrapper" style="display:none;">Submit Job</a>
    
              </div>
            </div>
            <div class="table-responsive row">
                <form method="post" id="jobform">
                    <input type="hidden" name="sid" value="<?php echo $ds['id'];?>"/>
              <table class="table table-hover" id="example">
  <thead>
            <tr>
    			<th><input type="checkbox" id="allchecked" /></th>
    			<th>JOB CODE</th>
    			<th>JOB CODE</th>
    			<th>CLIENT JOB ID</th>
    			<th>CLIENT</th>
    			<th>CITY</th>
    			<th>RESPOND BY</th>
    		</tr>
  </thead>
  <tbody>
       <?php
       $ok=0;
  $s1=mysqli_query($host,"select DISTINCT job.response,submitjob.jobid,job.id,job_code,job_title,job.cid,client,city from job left join submitjob on job.id=submitjob.jobid and submitjob.sid='$sid' where subdomain='$subdomain' order by job_code desc");  
   while($me=mysqli_fetch_array($s1)){
       if($me['jobid']!='' && $me['jobid']!=null){$ok+=1;}
    ?>
    <tr id="me_rows<?php echo $me['id'];?>">
        
        	<td>
        	    <input type="checkbox" class="checkboxx" value="<?php echo $me['id'];?>" name="jobid[]" <?php if($me['jobid']!='' && $me['jobid']!=null){echo "checked";}?>/>
        	    <input type="hidden" class="clientid" value="<?php echo $me['cid'];?>" name="clientid[]"/>
        	    
        	    </td>
    			<td class="text-primary"><?php echo $me['job_code'];?></td>
    			<td><?php echo $me['job_title'];?></td>
    			<td><?php echo "N/A";?></td>
    			<td><?php echo $me['client'];?></td>
    			<td><?php echo $me['city'];?></td>
    			<td><?php echo $me['response'];?></td>
    		</tr>
    <?php
   }   
 
  ?>
  </tbody>
</table>

</form>


</div>
</div>
  <?php
  }
  else if($_GET['tt']=='1'){
  ?>
                <div class="section-container mt-4">
           <h5>Add Education Details</h5>
        <?php
        $eds=mysqli_query($host,"select * from education where sid='$sid' and sub_domain='$subdomain'");
        $ed=mysqli_fetch_array($eds);
        ?>
           <form id="education_form" method="post">
  <div class="row">
    <!-- School Name -->
    <div class="col-md-4 mb-3">
      <label for="school" class="form-label">School Name <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="school" placeholder="Enter school name" required="" name="school"  value="<?php echo $ed['sname'];?>">
    </div>

    <!-- Degree -->
    <div class="col-md-4 mb-3">
      <label for="degree" class="form-label">Degree <span class="text-danger">*</span></label>
      <select class="form-control" id="degree" required="" name="degree">
        <option hidden="" value="">Select</option>
        <option value="Associate Degree">Associate Degree</option>
  <option value="Bachelors Degree">Bachelors Degree</option>
  <option value="Highschool">Highschool</option>
  <option value="Masters Degree">Masters Degree</option>
  <option value="PHD">PHD</option>
  <option value="Undergraduate">Undergraduate</option>
      </select>
      <script>$("#degree").val("<?php echo $ed['degree'];?>");</script>
    </div>

    <!-- Year Completed -->
    <div class="col-md-4 mb-3">
      <label for="yearCompleted" class="form-label">Year Completed <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="yearCompleted" required="" placeholder="Enter year" name="yearCompleted"  value="<?php echo $ed['year'];?>">
    </div>

    <!-- Major Study -->
    <div class="col-md-4 mb-3">
      <label for="major" class="form-label">Major Study</label>
      <input type="text" class="form-control" id="major" placeholder="Enter major" name="major" value="<?php echo $ed['major'];?>">
    </div>

    <!-- Higher Education Toggle -->
    <div class="col-md-2 mb-3 d-flex flex-column">
      <label for="higherEdu" class="form-label">Higher Education</label>
      
      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" value="1" class="btn-check" name="higherEdu" id="custom-mail-enable" <?php if($ed['higher']=='1'){echo "checked=''";}?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="custom-mail-enable">On</label>
                <input type="radio" value="0" class="btn-check" name="higherEdu" id="custom-mail-disable" <?php if($ed['higher']=='0'){echo "checked=''";}?>>
                                                                    <label class="btn btn-sm btn-outline-primary" for="custom-mail-disable">Off</label>
                                                                </div>
    </div>

    <!-- Buttons -->
    <div class="col-12 mt-3">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <input type="hidden" name="educationupdates" id="educationupdates" value="<?php echo $ed['id'];?>"/>
      <input type="hidden" name="educationhidden" value="<?php echo $ds['id'];?>"/>
         <input type="hidden" name="ed_type" value="1"/>

      <button type="reset" class="btn btn-outline-dark btn-sm">Reset</button>
    </div>
  </div>
</form>

           
    </div>

  <?php
  }
  ?>

      </div>
<div class="col-xl-4 col-lg-3">

<div class="apRDetailsB">
    <h5>Profile Details</h5>
    <div class="apFieldRow">
        <div class="apLabel">Name</div>
        <div class="apFieldInfo">
            Admin On 
            <?php echo ucwords(strtolower($ds['name']));?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Mobile</div>
        <div class="apFieldInfo"><?php echo $ds['mobile'];?></div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Email</div>
        <div class="apFieldInfo"><?php echo $ds['email'];?></div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Address</div>
        <div class="apFieldInfo"><?php echo $ds['address'];?></div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Applicant Status</div>
        <div class="apFieldInfo">
            <span id="applicant_status_div_33751"><?php echo $ds['status'];?></span>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Skills</div>
        <div class="apFieldInfo">
            <span style="width: 72%; word-wrap: break-word; margin-top: 0px;"><?php if($ds['skill']!='' or $ds['skill']!=''){echo ucwords($ds['skill']);}else{echo 'N/A';}?></span>
            
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Experience</div>
        <div class="apFieldInfo">
            <?php echo $ds['year'];?> Years
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Expected Pay</div>
        <div class="apFieldInfo">
            INR - <?php echo $ds['ectc'];?> / <?php echo $ds['ectc_type'];?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Current CTC</div>
        <div class="apFieldInfo">
            INR - <?php echo $ds['ctc'];?> / <?php echo $ds['ctc_type'];?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Notice Period</div>
        <div class="apFieldInfo">
            <?php echo $ds['notice'];?>
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Date Of Birth</div>
        <div class="apFieldInfo">
            <?php $dob=date('Y',strtotime($ds['dob']));echo date('d M Y',strtotime($ds['dob']));?> (<?php echo date('Y') - $dob;?>) Years
        </div>
    </div>
    <div class="apFieldRow">
        <div class="apLabel">Relocation</div>
        <div class="apFieldInfo">
            <?php if($ds['reloaction']!='' or $ds['reloaction']!=''){echo ucwords($ds['reloaction']);}else{echo 'N/A';}?>
        </div>
    </div>
</div>


</div>
  </div> 
                                    
                            </div>
                        </div>
                   </div>
                </div>


            </div> 
            <!-- END MAIN-CONTENT --> 



            <!-- FOOTER -->
            <?php include 'footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <!-- DATE & TIME PICKER JS -->
        <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

           <!-- CUSTOM-SWITCHER JS --> 
        <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

        <!-- QUILL EDITOR JS -->
        <script src="build/assets/libs/quill/quill.min.js"></script>

        <!-- FILEPOND JS -->
        <script src="build/assets/libs/filepond/filepond.min.js"></script>  

        <!-- INTERNAL CREATE BLOG JS --> 
        <script type="module" src="build/assets/blog-create-8640480c.js"></script> 
    
 <link rel="modulepreload" href="build/assets/modal-9dbbb9a6.js" /><script type="module" src="build/assets/modal-9dbbb9a6.js"></script>
 
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
 <style>
     .table th, .table td {
         padding: 7px !important;
}

.table#example{
    width: :100% !important;
}
 </style>
        <!-- END SCRIPTS -->
<span id="dataedit"></span>
    	<script src="build/assets/libs/jquery/jquery.min.js"></script>
    	 <script src="build/assets/ckeditor.js"></script>

<script>

         var v;
               function view(v){  
                  $("#loader").css("display","block");   
               $.ajax({
               url: "content/app_view.php",
               type: "POST",
               data:{x:v},
               success: function(html){
               $("#output1").text('');
               $("#output1").prepend(html);
               
               },
               error: function(){}           
               });  
               }

  const table = new DataTable('#example', {
    ordering: true,
    columnDefs: [
      { orderable: false, targets: 0 }
    ],
  language: {
    searchPlaceholder: "Job Code,Job title,Client,City", // 👈 Your custom placeholder
    search: "" // removes the label "Search:"
  }
  });

$(document).ready(function () {

toggleActionButton();

$("#actionBtnWrapper").on("click",function (){
    var vv=$(".checkboxx").val();
     $.ajax({
         type:"post",
         url:"data/job_submit.php",
         data:$("#jobform").serialize(),
         success:function (html){
          $("#dataedit").text("").prepend(html);   
         }
     });
//   window.location='app_job_view.php?sid='+vv+"&tt=1";
});

    


  $('#allchecked').on('change', function () {
    const isChecked = $(this).prop('checked');

    table.rows().every(function () {
      const row = this.node();
      $(row).find('input.checkboxx').prop('checked', isChecked);
    });

    toggleActionButton();
  });

  $('#example tbody').on('change', 'input.checkboxx', function () {
    const allCheckboxes = table.rows().nodes().to$().find('input.checkboxx');
    const allChecked = allCheckboxes.length === allCheckboxes.filter(':checked').length;

    $('#allchecked').prop('checked', allChecked);

    toggleActionButton();
  });
});

function toggleActionButton() {
  const checkedCount = table.rows().nodes().to$().find('input.checkboxx:checked').length;
  if (checkedCount > 0) {
    $('#actionBtnWrapper').show();
  } else {
    $('#actionBtnWrapper').hide();
  }
}

       function toggleDropdown(event) {
           event.stopPropagation();
        var clickedRow = event.target.closest("tr");
        var dropdownOptions = clickedRow.querySelector(".options");
 
        var allOptions = document.querySelectorAll(".options");
        allOptions.forEach(function(option) {
            if (option !== dropdownOptions && option.style.display === "block") {
                option.style.display = "none";
            }
        });

        if (dropdownOptions.style.display == "block") {
            dropdownOptions.style.display = "none";
        } else {
            dropdownOptions.style.display = "block";
        }
    }
        
        $("body").on("click",function (){
    var allOptions = document.querySelectorAll(".options");
    allOptions.forEach(function(option) {
      option.style.display = "none";
    });
});
        
        var p;
        function cls(p){
              $("#"+p).css('display','none');
              $("#staticBackdrop1").css('display','block');
               }

        </script>

	</body> 
</html>
