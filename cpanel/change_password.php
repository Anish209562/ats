<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA eta Data -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
        <!-- TITLE -->
		<title> Meraqui Venture - Change Password </title>

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
      

	</head>

    <body class="bg-white">

        

        <div class="row authentication mx-0">

            <div class="col-xxl-7 col-xl-7 col-lg-12">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                        <div class="p-5">
                            <div class="mb-3">
                                <a href="index.php">
                                    <img src="build/assets/images/kailoggg.png" alt="" class="authentication-brand desktop-logo" style="filter:invert(1);"> 
                                </a>
                            </div>
                            <p class="h5 fw-semibold mb-2">Reset Password</p>
                            <p class="mb-3 text-muted op-7 fw-normal">Hello  !</p>
                        <form  method="post" id="formtemplates" style="margin-top: 40px;"> 
                            <div class="row gy-3">
                                <div class="col-xl-12 mt-0">
                                    <label for="pass" class="form-label text-default">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="pass" name="pass" placeholder="current password">
                                        <button class="btn btn-light" onclick="createpassword('pass',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <label for="npass" class="form-label text-default">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="npass" id="npass" placeholder="new password">
                                        <button class="btn btn-light" onclick="createpassword('npass',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label for="reset-confirmpassword" class="form-label text-default">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="nrpass" id="nrpass" placeholder="confirm password">
                                        <button class="btn btn-light" onclick="createpassword('nrpass',this)" type="button" id="button-addon22"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div> 
                                </div>
                                <div class="col-xl-12 d-grid mt-2"> 
                                     <button type="submit" class="btn btn-lg btn-primary">Submit</button> 
                                </div>
                            </div> 
                        </form>
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
                                            <h6 class="fw-semibold text-fixed-white">Reset Password</h6>
                                            <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="build/assets/images/authentication/3.png" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Reset Password</h6>
                                            <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="mb-5">
                                                <img src="build/assets/images/authentication/2.png" class="authentication-image" alt="">
                                            </div>
                                            <h6 class="fw-semibold text-fixed-white">Reset Password</h6>
                                            <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
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

<span id="output"></span>
        
        <!-- SCRIPTS -->

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        
       <!-- SWIPER JS -->
       <script src="build/assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- INTERNAL AUTHENTICATION JS -->
        <link rel="modulepreload" href="build/assets/authentication-fa6f6b78.js" /><script type="module" src="build/assets/authentication-fa6f6b78.js"></script>

        <!-- SHOW PASSWORD JS -->
        <script src="build/assets/show-password.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



        <!-- END SCRIPTS -->


        <script>
 

  $(document).ready(function(){
    $("#formtemplates").on('submit', function(e) {
        e.preventDefault();
        var aa = $("#pass").val();
        var bb = $("#npass").val();
        var cc = $("#nrpass").val();

        if(aa === "") {
            alert("Please Enter Old Password");
        } else if (bb === "") {
            alert("Please Enter New Password");
        } else if (cc === "") {
            alert("Please Enter Confirm Password");
        } else {
            $.ajax({
                url: "data/change-password.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(html) {
                    $("#output").text("");  
                    $("#output").prepend(html);
                },
                error: function() { 
                }           
            });
        }
    });
});

</script>


	</body> 
</html>
