<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="KAiZEN  KCC Card community System - Add Client">
        <meta name="Author" content="KAiZEN  KCC Card community System - Add Client">
        <meta name="keywords" content="KAiZEN  KCC Card community System - Add Client">
        
        <!-- TITLE -->
		<title> KAiZEN  KCC Card community System - Add Client </title>

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

	.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    border-radius: 4px;
}
    
 
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">UPGRADE REQUESTS</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">UPGRADE REQUESTS</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close --> 

                 

            
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
      <h4 class="text-blue h4">UPGRADE REQUESTS LIST</h4>
      <div class="card-body" style="overflow-x: scroll;">
  
<span id="mistable"> 
               <?php 
   $s1=mysqli_query($host,"select user.*,max(kccupdate.id) as idd from user INNER JOIN kccupdate on user.mobile=kccupdate.user where kccupdate.status='pending' group by kccupdate.user order by kccupdate.id desc");  
     $r=mysqli_num_rows($s1); 
   if($r>0){   ?>	
   <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                  <th>Name</th>
                  <th>Mobile </th>
                  <th>Email</th>
                  <th>Card </th> 
                  <th>Request Card</th> 
                  <th>Date & Time</th>
                  <th>Documents</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1=mysqli_fetch_array($s1)) {
       $idd=$d1['idd'];
       $s2=mysqli_query($host,"select kccupdate.card as card,kccupdate.date as dates,kccupdate.id as idd,kccupdate.time as times,kccupdate.status as cardstatus from kccupdate where id='$idd'");
$d2=mysqli_fetch_array($s2);

$filecheck=$d1['mobile'];
$file=mysqli_query($host,"select * from kccupdate where user='$filecheck' order by id desc limit 1 ");
$filearray=mysqli_fetch_array($file);
    ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo $d1['name']."<br> <b> KCC ID : ".$d1['id']."</b>"; ?></td>
            <td><?php echo $d1['mobile']; ?></td>
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo strtoupper($d1['plan']); ?></td>
            <td><?php echo strtoupper($d2['card']); ?></td>
            <td><?php echo date('d M Y',strtotime($d2['dates']))." , ".date('H:i A',strtotime($d2['times'])); ?></td>
            <td>
                <button class="btn btn-secondary" style="font-size: 10px;padding: 6px;"><a href="/upload2/New/<?php echo $filearray['file1'];?>" id="terms" name="terms" target="_">Terms & Conditions</a></button>
                
                <button  class="btn btn-primary" style="font-size: 10px;padding: 6px;"><a href="/upload2/New/<?php echo $filearray['file2'];?>" id="authletter" name="authletter" target="_">Auth Letter</a></button>
            </td>
            <td>
                
            <?php if($d2['cardstatus']=="pending")
            {
            ?>
            
           <button type="button" class="btn btn-success" style="font-size:10px;padding:5px;" onclick="change(<?php echo $d1['idd']; ?>,<?php echo $d1['id']; ?>,'approve','<?php echo $d2['card']; ?>');">Approve</button>

           <button type="button" class="btn btn-danger"  style="font-size:10px;padding:5px;" onclick="change(<?php echo $d1['idd']; ?>,<?php echo $d1['id']; ?>,'rejected','<?php echo $d2['card']; ?>');">Reject</button> 
            <?php
            }else
            {
            ?>
           <button type="button" class="btn btn-warning" > <?php echo $d1['plan']; ?></button>
  
            <?php
            }
            ?>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
     </span>  
         <?php } ?>
 
 
</div>





        
      </div>
   </div>
</div> 
 </div>

            <span id="output1"></span>


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
<style>
    .btn a,
    .btn a:hover,
    .btn a:focus{
        color:white;
    }
</style>
        <script> 


        	 var mm,k,m,l;
function change(mm,k,m,l){  
          $.ajax({
            "type":"POST",
            "url":"data/upgrade_status.php",
            "data":{mm:mm,idd:k,status:m,l:l},
            "success":function(html){
              $("#mistable").text(""); 
              window.location="upgrade_request.php";
              $("#mistable").prepend(html);

            }
          });   
    
} 
 

                var x;
               function edit(x){  
               $.ajax({
               url: "data/client_form.php",
               type: "POST",
               data:{x:x},
               success: function(html){
               $("#output1").text('');
               $("#output1").prepend(html);
               
               },
               error: function(){}           
               });  
               }

                   var x,y;
               function verify(x,y){  
                 if(x==0)
                 {
                 x='';    
                 }
               $.ajax({
               url: "data/verify_form.php",
               type: "POST",
               data:{x:x,y:y},
               success: function(html){
               $("#output1").text('');
               $("#output1").prepend(html);
               
               },
               error: function(){}           
               });  
               }


    var a;
function deles(a){
$(document).ready(function(e){
var b=confirm("Are You Sure Do You Want to Delete ?");
if(b==true){
$.ajax({
type:"post",
url:"data/client.php",
data:{id:a},
success:function(html){
$("#output").text("");  
$("#output").prepend(html);
}

});

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
