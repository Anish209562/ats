<?php include("cpanel/db.php");  include("cpanel/popup.php");?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Forgot Password</title>

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
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
					<img src="cpanel/vendors/images/smartech-logo.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="index.php">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="cpanel/vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Forgot Password</h2>
						</div>
						
						
							<span id="emaildiv">
							<h6 class="mb-20">Enter your email address to reset your password</h6>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Email" id="email">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								</div>
							</div>
							</span>
							<span style="display: none;" id="otpdiv">
							<h6 class="mb-20">Enter your OTP . Sent On Your Register Mobile No. OR E-mail Address</h6>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="OTP" id="otp">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
								</div>
							</div>
						</span>
<span style="display: none;" id="passdiv">
						<h6 class="mb-20">Enter your email address to reset your password</h6>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Password" id="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Re-Password" id="rpassword">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
								</div>
							</div>
						</span>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
										-->
										<button class="btn btn-primary btn-lg btn-block" id="reset">Submit</button>
									</div>
								</div>
								<div class="col-2">
									<div class="font-16 weight-600 text-center" data-color="#707373">OR</div>
								</div>
								<div class="col-5">
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Login</a>
									</div>
								</div>
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<span id="output"></span>	<!-- js -->
	<script src="cpanel/vendors/scripts/core.js"></script>
	<script src="cpanel/vendors/scripts/script.min.js"></script>
	<script src="cpanel/vendors/scripts/process.js"></script>
	<script src="cpanel/vendors/scripts/layout-settings.js"></script>
<script>
	var page=1;
	$(document).ready(function(e){
$("#reset").click(function(e){
	var otp=$("#otp").val();
	var email=$("#email").val();
	var pass=$("#password").val();
	var rpass=$("#rpassword").val();
if(page==1){
if(email==""){
popup2("Please Enter E-mail");
}else{
$.ajax({
type:"post",
url:"data/verify-email.php",
data:{email:email},
success:function(html){
	$("#output").text("");
	$("#output").prepend(html);
	}
	});		
}
}else{
if(page==2){

if(otp==""){
popup2("Please Enter OTP");
}else{
$.ajax({
type:"post",
url:"data/otp-verify.php",
data:{otp:otp,email:email},
success:function(html){
	$("#output").text("");
	$("#output").prepend(html);
	}
	});		
}
}else{


if(pass==""){

popup2("Please Enter password");

}else{
if(rpass==""){
popup2("Please Enter Repeat Password");
}else{
if(pass==rpass){
$.ajax({
type:"post",
url:"data/verify-email.php",
data:{otp:otp,email:email,pass:pass},
success:function(html){
	$("#output").text("");
	$("#output").prepend(html);
	}
	});	
}else{
popup2("Password & Repeat Password Did not Match");	
}

}

}





}

}

});

$("#password").on('keyup',function(){
var mail=$(this).val();
if(mail.length>8){
$("#password").css("border-color","#28a745");
}else{
	if(mail.length>4){
$("#password").css("border-color","#ffc107");
}else{
	if(mail.length>0){
$("#password").css("border-color","#dc3545");
}else{
	$("#password").css("border-color","#d4d4d4");
}
}
}
});

$("#rpassword").on('keyup',function(){
 var rpass=$(this).val();
 var pass=$("#password").val();
 if(rpass.length==0){
$("#rpassword").css("border-color","#d4d4d4");
 }else{
 if(rpass==pass){
$("#rpassword").css("border-color","#28a745");
 }else{
$("#rpassword").css("border-color","#dc3545");
 }
}
});

	});

</script>
</body>

</html>