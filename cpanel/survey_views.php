<?php include("session.php"); 
if(isset($_GET['name'])){
    $name=$_GET['name'];
    
    
    
    $q=mysqli_query($host,"select * from survey_upload where sid='$name' ");
    
    if(mysqli_num_rows($q)>0){
        
    }else{
       echo "<script>window.location='survey.php';</script>"; 
    }
    
    
}else{
echo "<script>window.location='survey.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="KAiZEN  KCC Card community System - Complaints">
        <meta name="Author" content="KAiZEN  KCC Card community System - Complaints">
        <meta name="keywords" content="KAiZEN  KCC Card community System - Complaints">
        
        <!-- TITLE -->
		<title> KAiZEN  KCC Card community System - Survey Views </title>

        <!-- FAVICON -->
        <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="build/assets/icon-fonts/icons.css" rel="stylesheet">
        
           <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


<style>
    
 
table.dataTable thead > tr > th.dt-orderable-asc:hover, table.dataTable thead > tr > th.dt-orderable-desc:hover, table.dataTable thead > tr > td.dt-orderable-asc:hover, table.dataTable thead > tr > td.dt-orderable-desc:hover {
    outline: 0px solid rgba(0, 0, 0, 0.05);
    outline-offset: -2px;
}
table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
    text-align: start;
}

   
    .log-btn {
         width: auto;
    height: 30px;
    text-align: left;
    float: left;
    margin-left: 5px;
    margin-top: 3px;
    border: 1px solid #ccc;
    border-radius: 5px;
    line-height: 22px;
    background: #fff;
    font-size: 13px;
    text-indent: 10px;
    cursor: pointer;
    padding: 3px 5px;
         }

       .radi {
       display: block !important;
    opacity: 1 !important;
    height: 12px !important;
    float: left;
    padding: 0px !important;
    width: 16px;
    margin-top: 6px!important; 
    margin-left: 1px!important;
    position: relative !important;
         }

         .modal-footer {
    padding: 4px 4px;
    border-block-start: 1px solid #f3f3f3; 
    margin-top: 21px;
}


.swal2-container {
    display: flex;
    position: fixed;
    z-index: 999999;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 0.625em;
    overflow-x: hidden;
    transition: background-color .1s;
    -webkit-overflow-scrolling: touch;
}


    .dropdown {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .options {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 140px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 99;
    }

    .option {
        padding: 12px 16px;
        cursor: pointer;
    }

    .option:hover {
        background-color: #ddd;
    }
    .badge-success{
          background-color:darkgreen;
       }
      .badge-danger{
          background-color:darkred;
      }
      .badge-secondary{background-color:deepskyblue;}
      
      .badge-warning{background-color:orange;}
      
      .badge-info{background-color:blueviolet;}
      .badge{
         font-size:12px;
         padding:6px 12px !important;
      }
</style>

	</head>

	<body>

        <div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="remarkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remarkModalLabel">Add Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="remarkForm">
                        <div class="form-group">
                            <label for="remarkStatus">Status</label>
                            <select class="form-control" id="remarkStatus" name="remarkStatus" id="remarkStatus" required>
                                <option value="" hidden>Select Status</option>
                                <option value="Solved">Solved</option>
                                <option value="Wrong Complaint">Wrong Complaint</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="remarkText">Remark</label>
                            <input type="text" class="form-control" id="remarkText" name="remarkText" required>
                        </div>
                        <input type="hidden" id="hiddo2" name="hiddo2">
                        <button type="button" onclick="supdate()" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
<?php
$s1=mysqli_query($host,"select * from survey where sname='$name' ");
 
$row=mysqli_num_rows($s1);


$s1=mysqli_query($host,"select survey_upload.*, user.name, user.plan, user.mobile as number, user.id as kccid from survey_upload inner join user ON survey_upload.username=user.mobile  where survey_upload.sid='$name'");
 
   $r=mysqli_num_rows($s1);
?>
            <div class="main-content app-content">

                
                <div class="container-fluid" style="margin-top:30px;">


                   <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 pe-0">
                                            <p class="mb-2">
                                                <span class="fs-16"><?php echo $name;?></span>
                                            </p>
                                            <p class="mb-2 fs-12">
                                                <span class="fs-25 fw-semibold lh-1 vertical-bottom mb-0"><?php echo $row;?></span>
                                                <span class="d-block fs-10 fw-semibold text-muted">No. of question</span>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="badge bg-success-transparent float-end d-inline-flex">No. of Participates : <?php echo $r;?></p>
                                            <p class="main-card-icon mb-0"><svg class="svg-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M19,19c0,0.55-0.45,1-1,1s-1-0.45-1-1v-3H8V5h11V19z" opacity=".3"></path><path d="M0,0h24v24H0V0z" fill="none"></path><g><path d="M19.5,3.5L18,2l-1.5,1.5L15,2l-1.5,1.5L12,2l-1.5,1.5L9,2L7.5,3.5L6,2v14H3v3c0,1.66,1.34,3,3,3h12c1.66,0,3-1.34,3-3V2 L19.5,3.5z M19,19c0,0.55-0.45,1-1,1s-1-0.45-1-1v-3H8V5h11V19z"></path><rect height="2" width="6" x="9" y="7"></rect><rect height="2" width="2" x="16" y="7"></rect><rect height="2" width="6" x="9" y="10"></rect><rect height="2" width="2" x="16" y="10"></rect></g></svg></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                 
   </div> 

                   
                 

            <span id="mistable"> 
               <?php 
    
   if($r>0){   ?>

      
   
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
      
     
      <div class="card-body" style="padding-top:35px;">
        <div style="margin-top:-36px;width: 16%;float: right;">
               <select id="nameFilter" class="form-control">
    <option value="">Select Name</option>
</select>
        </div>
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                   <th> Name </th>
                   <th>Mobile</th>
                    <th>Question</th> 
                     <th>Answer</th> 
                     <th> Date & Time </th>
                 
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { 
        $hh=$d1['answer'];
     $ss=mysqli_query($host,"select question from survey where id='$hh' ");
    $dd=mysqli_fetch_array($ss);
   
    
    
    ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo ucwords($d1['name'])."<br> <b> KCC ID : ".$d1['kccid']; ?></td> 
            <td><?php echo $d1['number'];?></td>
           <td><?php echo $dd['question'];?></td> 
            <td><?php echo $d1['question']; ?></td>
            <td><?php echo date('d M Y', strtotime($d1['date']))."<br>".date('h:i A', strtotime($d1['time'])); ?></td> 
            
        
        </tr>
    <?php } ?>
</tbody>
         </table>
      </div>
   </div>
</div> 
<?php } ?>
            </span>

            <span id="output1"></span>

<span id="oll"></span>

                </div>


            </div> 
            <!-- END MAIN-CONTENT --> 



            <!-- FOOTER -->
            <?php include 'footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->

        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <!-- DATE & TIME PICKER JS -->
        <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 

           <!-- CUSTOM-SWITCHER JS --> 
        <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

        <!-- QUILL EDITOR JS -->
        <script src="build/assets/libs/quill/quill.min.js"></script>

        <!-- FILEPOND JS -->
        <script src="build/assets/libs/filepond/filepond.min.js"></script>  

        <!-- INTERNAL CREATE BLOG JS --> 
        <script type="module" src="build/assets/blog-create-8640480c.js"></script> 

        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

        <!-- END SCRIPTS -->

        <script> 
 
 
 var j;
 
 function abbcvchcv(j)
 
 {
     $('#hiddo2').val(j);
 }

  var p;
              function cls(p){
              $("#"+p).css('display','none');
              $("#staticBackdrop1").css('display','block');
               }


$(document).ready(function() {
    var table = $('#example').DataTable({
        initComplete: function () {
            // Extract unique names from the "Name" column
            var uniqueNames = [];
            this.api().column(1).data().each(function(value, index) {
                if (uniqueNames.indexOf(value) === -1) {
                    uniqueNames.push(value);
                }
            });

            // Populate the select element with the unique names
            uniqueNames.forEach(function(name) {
                $('#nameFilter').append('<option value="' + name + '">' + name + '</option>');
            });
        }
    });

    // Add event listener to the select element for filtering
    $('#nameFilter').on('change', function() {
        table.column(1).search(this.value).draw();
    });
});



        </script>


	</body> 
</html>
