<?php 
session_start();
include("db.php"); 
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/');
}
require_once ROOT_PATH . 'db.php';
if (!$host) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_SESSION['token']) && isset($_SESSION['username']))
{
    
$token=$_SESSION['token'];
$username=$_SESSION['username'];
$s=mysqli_query($host,"select * from token where token='$token' and username='$username'");
if(mysqli_num_rows($s)==1){
header("Location :index.php");
exit;

}
}
?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>

        <!-- META DATA eta Data -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
        <!-- TITLE -->
		<title> Meraqui - Login to Admin Panel </title>

        <!-- FAVICON -->
        <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="build/assets/icon-fonts/icons.css" rel="stylesheet">
        
        <!-- APP SCSS -->
        <link rel="preload" as="style" href="build/assets/app-fce3f544.css" /><link rel="stylesheet" href="build/assets/app-fce3f544.css" />

        <!-- MAIN JS -->
        <script src="build/assets/authentication-main.js"></script>

         
        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="build/assets/libs/swiper/swiper-bundle.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


	</head>

    <body class="bg-white"> 
        <div class="row authentication mx-0"> 
            <div class="col-xxl-7 col-xl-7 col-lg-12">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                        <div class="p-5">
                            <div class="mb-3">
                                <a href="index.php">
                                    <img src="build/assets/images/kailoggg.png" alt="" class="authentication-brand desktop-logo" style="filter: invert(1);"> 
                                </a>
                            </div>
                            <p class="h5 fw-semibold mb-2">Sign In</p>
                            <p class="mb-3 text-muted op-7 fw-normal">Welcome back !</p>
                            
                           
                            <div class="row gy-3">
                                <div class="col-xl-12 mt-0">
                                    <label for="username" class="form-label text-default">User Name</label>
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="User Name">
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label for="password" class="form-label text-default d-block">Password
                                    
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                                        <button class="btn btn-light" type="button" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                  
                                </div>
                                <div class="col-xl-12 d-grid mt-2"> 
                                    <button class="btn btn-lg btn-primary" id="signin">Sign In</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5 d-xl-block d-none px-0">
                <div class="authentication-cover">
                    <div class="aunthentication-cover-content rounded">
                        <div class="swiper keyboard-control">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="build/assets/images/authentication/2.png" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Sign In</h6>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="build/assets/images/authentication/3.png" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Sign In</h6>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="build/assets/images/authentication/2.png" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Sign In</h6>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        
        <!-- SCRIPTS -->

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        
        <!-- SWIPER JS -->
        <script src="build/assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- INTERNAL AUTHENTICATION JS -->
        <link rel="modulepreload" href="build/assets/authentication-fa6f6b78.js" /><script type="module" src="build/assets/authentication-fa6f6b78.js"></script>

       <!-- SHOW PASSWORD JS -->
       <script src="build/assets/show-password.js"></script> 

        <!-- END SCRIPTS -->


	<span id="output"></span>
	<script>
$(document).ready(function(e){
$("#signin").on('click',function(e){
var username=$("#username").val();
var password=$("#password").val();
if(username==""){
 Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: 'Please Enter Username',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
         }); 
}else{
if(password==""){
Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: 'Please Enter Password',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
         }); 
}else{
$.ajax({
type:"post",
url:"data/login.php",
data:{username:username,password:password},
success:function(html){
	$("#output").text("");
	$("#output").prepend(html);
	}
	});	
}
}

})

		});
	</script>

	</body> 
</html>
