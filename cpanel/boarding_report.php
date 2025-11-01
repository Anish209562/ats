<?php include("session.php");


?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
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
		<title> Onboarding Report </title>

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
    .answer-type input{
        margin-right:5px;
        margin-left:5px;
    }
    table tbody button.btn{    font-size: 10px;
    padding: 5px 8px}
    
    #formtemplate img{display:none;}
    .ck-editor__editable {
    min-height: 300px !important; /* Adjust height as needed */
    max-height: 500px !important; /* Optional: Set a max-height */
    overflow: auto; /* Allows scrolling if content exceeds height */
}
</style>

	</head>

	<body>

   <span id="output"></span>
        <!-- LOADER -->
		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

          
            <!-- SIDEBAR -->
          <?php include 'sidebar2.php';  ?>
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content">

                
                <div class="container-fluid">


  <div class="row align-items-center" style="margin-bottom:20px;">
    <!-- Title -->
    <div class="col-auto">
      <h6 class="fw-bold mb-0">Reports</h6>
    </div>

    <!-- Spacer -->
    <div class="col"></div>

    <!-- Dropdowns -->
    <div class="col-auto">
      <select class="form-select form-select-sm">
       <option selected="">Current Year</option>
    <option>Yesterday</option>
    <option>Current Week</option>
    <option>Last Week</option>
    <option>Last 10 Days</option>
    <option>Current Month</option>
    <option>Last Month</option>
    <option>Last 3 Months</option>
    <option>Current Year</option>
      </select>
    </div>

    <div class="col-auto">
      <select class="form-select form-select-sm">
           <option selected="">All</option>
    <option>Initiated</option>
    <option>Responded</option>
    <option>Verified</option>
    <option>Rejected</option>
    <option>Negotiating</option>
    <option>Joined</option>
    <option>Disqualified</option>
    <option>Cancelled</option>
    <option>Joined in ATS</option>
    <option>Joined in WorkForce</option>
    <option>Employees Placed in WorkForce</option>
      </select>
    </div>

    <div class="col-auto">
      <select class="form-select form-select-sm">
        <option selected>All</option>
       <?php
$sm=mysqli_query($host,"select name,email from team where sub_domain='meraqui'");
while($sms=mysqli_fetch_array($sm)){
?>
<option value="<?php echo $sms[1];?>"><?php echo $sms[0];?></option>
<?php
    
}
?>
      </select>
    </div>
  </div>

                 
<div class="row">
    <div class="col-xl-12">
    <div class="card custom-card">
        <div class="card-body">
                <div id="columns-distributed">
            </div>
        </div>
    </div>
</div>

</div>


</div> 
 </div>
<style>
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
      table,tr,td{height:50px !important ;padding:8px 0px !important;}
</style>
          
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
   <script src="build/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>
        <!-- END SCRIPTS -->

        <script> 
document.addEventListener("DOMContentLoaded", function () {
    var i=["#845adf","#23b7e5","#f5b849","#49b6f5","#e6533c","#26bf94","#5b67c7"];

  var options = {
    series: [{
      data: [6, 1, 4, 2, 1] // Example values matching your screenshot
    }],
    chart: {
      height: 320,
      type: "bar"
    },
    colors: ["#4dabf7"],
    plotOptions: {
      bar: {
        columnWidth: "45%",
        distributed: true
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    grid: {
      borderColor: "#f2f5f7"
    },
    xaxis: {
      categories: [
        "Initiated",
        "Responded",
        "Verified",
        "Joined",
        "Disqualified"
      ],
      labels: {
        style: {
          colors: "#8c9097",
          fontSize: "12px"
        }
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: "#8c9097",
          fontSize: "11px",
          fontWeight: 600
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#columns-distributed"), options);
  chart.render();
});


        </script>

	</body> 
</html>
