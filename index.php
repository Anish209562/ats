<?php include("cpanel/db.php"); include("cpanel/popup.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Login - Admin Panel</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="cpanel/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="cpanel/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="cpanel/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="cpanel/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="cpanel/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="cpanel/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
					<img src="cpanel/vendors/images/smartech-logo.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="cpanel/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To Admin Panel</h2>
						</div>
						
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" id="username"/>
								<div class="input-group-append custom" >
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" id="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									
								</div>
								<div class="col-6"></div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button class="btn btn-primary btn-lg btn-block" id="signin">Sign In</button>
									</div>
									
									<div class="input-group mb-0">
										
									</div>
								</div>
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="cpanel/vendors/scripts/core.js"></script>
	<script src="cpanel/vendors/scripts/script.min.js"></script>
	<script src="cpanel/vendors/scripts/process.js"></script>
	<script src="cpanel/vendors/scripts/layout-settings.js"></script>
	<span id="output"></span>
	<script>
$(document).ready(function(e){
$("#signin").on('click',function(e){
var username=$("#username").val();
var password=$("#password").val();
if(username==""){
popup2("Please Enter Username");
}else{
if(password==""){
popup2("Please Enter Password");
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