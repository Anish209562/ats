<?php
include("../session.php");

$to        = $_POST['email'];
$name      = $_POST['name'];

$ccInput   = trim($_POST['ccInput']);                // only one CC
$multiple  = trim($_POST['multiple_email_hidden']);  // multiple CC (comma-separated)
$bccInput  = trim($_POST['bccInput']);               // only one BCC

$subject   = $_POST['subjectInput'];
$message   = $_POST['message'];

$username=$data['username'];
if(!is_numeric($username)){
    $create="Admin";
}
else{
    $create=$data['name'];
}

$idd=$_POST['tokennn'];

$date = date('Y-m-d');
$time = date('H:i:s');

// Merge multiple CCs
$ccList = [];
if (!empty($ccInput)) {
    $ccList[] = $ccInput;
}
if (!empty($multiple)) {
    $moreCCs = array_filter(array_map('trim', explode(',', $multiple)));
    $ccList = array_merge($ccList, $moreCCs);
}

// HTML email body
$htmlContent = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>' . htmlspecialchars($subject) . '</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #ffffff; padding: 20px;">

<div style="text-align:center;background-color:rgb(17, 28, 67);width:20%;margin:0 auto 20px;">
    <img src="https://meraqui.com/wp-content/uploads/2024/09/White-LOGO_High_Meraqui_Tag-line_Hire-Manage-Tech-Services-White-1-2048x512.png" 
         alt="Company Logo" style="width:200px;" />
</div>

<div style="max-width:600px; margin:auto; background-color:#fff; border-radius:8px; border:1px solid #ddd; padding:20px;">
    ' . nl2br($message) . '
</div>


</body>
</html>
';

// Mail headers
$separator = md5(time());
$eol = PHP_EOL;

$headers  = "From: Meraqui Venture PVT. LTD. <contact@meraqui.com>" . $eol;
if (!empty($ccList)) {
    $headers .= "Cc: " . implode(", ", $ccList) . $eol;
}
if (!empty($bccInput)) {
    $headers .= "Bcc: " . $bccInput . $eol;
}
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: text/html; charset=UTF-8" . $eol;
$headers .= "X-Mailer: PHP/" . phpversion();

mysqli_query($host,"insert into upate set table_type='onboarding_email',userby='$create', username='$username',idd='$idd', type='Applicant Email sent by $create through Initiate Onboarding.', date='$date', time='$time', sub_domain='$subdomain'");

// Send mail
if (mail($to, $subject, $htmlContent, $headers)) {
    echo "<script>
        $('#showLoader').removeClass('d-flex').addClass('d-none');
        Swal.fire({
            icon: 'success',
            title: 'Email Sent!',
            text: 'Your email has been sent successfully.',
            timer: 2500,
            showConfirmButton: false
        }).then(()=>{
            window.location='onboard_index.php';
        });
    </script>";
} else {
    echo "<script>
           $('#showLoader').removeClass('d-flex').addClass('d-none');

        Swal.fire({
            icon: 'error',
            title: 'Sending Failed',
            text: 'There was a problem sending your email.',
            timer: 2500,
            showConfirmButton: false
        });
    </script>";
}
?>
