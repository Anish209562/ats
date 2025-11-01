<?php include("session.php"); ?>
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
		<title> KAiZEN  KCC Card community System - Complaints </title>

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
                            <textarea class="form-control" id="remarkText" name="remarkText" required placeholder="Enter Remark"></textarea>
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

            <div class="main-content app-content">

                
                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">Complaints</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Complaints</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close --> 

                 

            <span id="mistable"> 
               <?php 
   $s1=mysqli_query($host,"select user.*,complaint.message,complaint.date,complaint.time,complaint.status,complaint.label,complaint.id As cid from user inner join complaint ON user.mobile = complaint.user group by complaint.id order by complaint.id desc");   
   $r=mysqli_num_rows($s1); 
   if($r>0){   ?>
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
      <h4 class="text-blue h4">Complaints LIST</h4>
      <div class="card-body">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                   <th> Name </th>
                    <th> Mobile </th>
                    <th> Plan </th>
                    <th> Date </th>
                    <th> Time </th>
                  <th>Message</th> 
                     <th>Status</th> 
                  <th>Remark</th> 


               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo ucwords($d1['name'])."<br> <b> KCC ID : ".$d1['id']."</b>"; ?></td> 
            <td><?php echo $d1['mobile']; ?></td> 
            <td><?php echo $d1['plan']; ?></td> 
            <td><?php echo date('d M Y', strtotime($d1['date'])); ?></td> 
            <td><?php echo date('h:i A', strtotime($d1['time'])); ?></td>  
            <td><?php echo $d1['message']; ?></td> 
            <td><?php echo $d1['status']; ?></td>
            <td>  <?php   echo $d1['label']."<br>";  ?><button type="button" onclick="abbcvchcv(<?php echo $d1['cid']; ?>,'<?php echo $d1['status']; ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#remarkModal">
        Add Remark
    </button></td>

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
 
 function abbcvchcv(j,jj)
 
 {
     $('#hiddo2').val(j);
     $("#remarkStatus").val(jj);
 }
 
 function supdate()
 
 {
     
   
        var a=  $('#hiddo2').val();
        var b=$('#remarkStatus').val();
        var c=$('#remarkText').val();
        

       $.ajax({
            "type":"POST",
            "url":"data/statusupdate.php",
            "data":{idd:a,status:b,remark:c},
            "success":function(html){
              $("#oll").text(""); 
              $("#oll").prepend(html);
              
            window.location.reload(true);

            }
          }); 
     
 }

 var k,m;
function statusss(k,m){
 var table="complaint";  
          $.ajax({
            "type":"POST",
            "url":"data/status_insert.php",
            "data":{idd:k,table:table,status:m},
            "success":function(html){
              $("#mistable").text(""); 
              $("#mistable").prepend(html);

            }
          });  
         } 
  

        new DataTable('#example');
 
 


              var p;
              function cls(p){
              $("#"+p).css('display','none');
              $("#staticBackdrop1").css('display','block');
               }

        </script>

	</body> 
</html>
