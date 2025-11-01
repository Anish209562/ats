<?php include("session.php"); 
if($_GET['mobile']){
   $mobile=$_GET['mobile']; 
}else{
?>
<script>window.location='index.php';</script>
<?php
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
    table,tr,td{height:45px !important ;}
    
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

                    
                    <!-- Page Header Close --> 

<?php 
$mobile=$_GET['mobile'];
$check=mysqli_query($host,"select * from user where mobile='$mobile' ");
$che=mysqli_fetch_array($check);

$wa1_result = mysqli_query($host, "select sum(amount) as total_paid from wallet where user='$mobile' and type='paid' and ( status='success' or status='pending')");
$wa2_result = mysqli_query($host, "select sum(amount) as total_received from wallet where user='$mobile' and type='received' and status='success'");

$wa1_data = mysqli_fetch_array($wa1_result);
$wa2_data = mysqli_fetch_array($wa2_result);

$wa1 = $wa1_data['total_paid'];
$wa2 = $wa2_data['total_received'];

$total_wallet = $wa2 - $wa1;


$query=mysqli_query($host,"select * from wallet where user='$mobile' ");
$fetch=mysqli_fetch_array($query);
?>

            
<div class="row">
 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   <div class="card custom-card" style="padding: 15px 25px;">
      <div class="card-body" style="overflow-x: scroll;">


 <div class="d-flex align-items-top" style="margin-bottom:30px;">         
<div class="me-3"> 
   <span class="avatar avatar-md p-2 bg-secondary"> 
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
    </span> 
</div>
<div class="flex-fill">
                                                    <div class="d-flex mb-1 align-items-top justify-content-between">
                                                        <h5 class="fw-semibold mb-0 lh-1"><?php echo strtoupper($che['name']);?></h5>
                                                        <div class="text-danger fw-semibold" style="font-size:1.3rem;">
                                                             Total Wallet : ₹ <?php echo $total_wallet; ?>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 text-muted fw-semibold" style="font-size:1.1rem;"><?php echo $che['mobile'];?>
                                                        <span class="badge <?php 
                     if(ucwords($che['plan'])=='Vip'){
                         echo "bg-secondary-transparent";
                     }else{
                         if(ucwords($che['plan'])=='Basic'){
                             echo "bg-primary-transparent";
                         }else{
                             echo "bg-warning-transparent";
                         } 
                     }
                     ?>"><?php echo strtoupper($che['plan']);?></span>
                                                    </p>
    </div>
 </div>
 
 
 
 
 <span id="output1">
<?php 
$s=mysqli_query($host,"select * from wallet where user='$mobile' ");
$r=mysqli_num_rows($s);
if($r>0){
?> 
<table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <th style="width:38%;">Remark</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th style="width:8%;">Date</th>
                    <th style="width:12%;">Time</th>
               </tr>
           </thead>
           
           <tbody>
           <?php 
           $x=0;
           while($rr=mysqli_fetch_array($s)){
           ?>
           <tr>
                     <td><?php echo ++$x;?></td>
                     <td><?php echo $rr['remark'];?>
                       
                         <?php 
                         if($rr['mode']=="withdraw")
                         {
                     if($rr['status']=='success'){
                    ?>
                    <span style="margin-left:10px;" class="badge bg-success-transparent"><?php echo ucwords($rr['status']);?></span>
                    <?php
                     }else{
                      ?>
                    <span style="margin-left:10px;" class="badge bg-danger-transparent"><?php echo ucwords($rr['status']);?></span>
                    <?php   
                     }
                         }
                     ?>
                   </td>
                     <td><?php 
                     if($rr['type']=='received'){
                    ?>
                    <span class="badge badge-success"><?php echo strtoupper($rr['type']);?></span>
                    <?php
                     }else{
                      ?>
                    <span class="badge badge-danger"><?php echo strtoupper($rr['type']);?></span>
                    <?php   
                     }
                     
                     ?></td>
                     <td>
                         <?php 
                     if($rr['type']=='received'){
                    ?>
                    <span class="badge bg-success-transparent"><?php echo $rr['amount'];?></span>
                    <?php
                     }else{
                      ?>
                    <span class="badge bg-danger-transparent"><?php echo $rr['amount'];?></span>
                    <?php   
                     }
                     
                     ?>
                     </td>
                     
                     
                    
                     
                     <td><?php echo date("d M Y",strtotime($rr['date']));?></td>
                     <td><?php echo date('H:i:s',strtotime($rr['time']));?></td>
                </tr>
             <?php
           }
           ?>
           </tbody>
     </table> 
<?php
}
?>

</span>
 
</div>

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
