<?php include("../session.php");  
$id=$_POST['id'];
if($id){
mysqli_query($host,"delete from itc_client where id='$id'");
?>
<script> 
$m="Successfully deleted";
</script>
<?php
}else{ 

$cname=$_POST['cname'];
$mobile=$_POST['mobile'];
$altmobile=$_POST['altmobile'];	
$email=$_POST['email'];
$branch=$_POST['branch'];
$student=$_POST['student']; 
$subdomain=$_POST['subdomain']; 
$expire_date=$_POST['publish-date'];  
$update=$_POST['update'];
$date=date('Y-m-d');
$time=date('H:i:s'); 

$otp=rand(100000, 999999);

$to = $email;
$subject = "OTP Verification";
$message = "
<html>
<head>
<title>Verify Your E-mail Via OTP</title>
</head>
<body>
<p>Please Use This OTP to verify Your E-mail Account.</p>
<table>
<tr>
<td>OTP</td>
<td>".$otp."</td>
</tr>
<tr>
<td><b>Regards</b></td>
<td>Smartech Software Solution - SMS Service</td>
</tr>
</table>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <info@smartechindia.in>' . "\r\n";
mail($to,$subject,$message,$headers);
 
 
if($update){

mysqli_query($host,"update itc_client set cname='$cname',mobile='$mobile',altmobile='$altmobile',email='$email',branch='$branch',student='$student',expire_date='$expire_date',subdomain='$subdomain',date='$date',time='$time' where id='$update'");

$m="Successfully Updated";

}else{
  mysqli_query($host,"insert into itc_client set cname='$cname',mobile='$mobile',altmobile='$altmobile',email='$email',branch='$branch',student='$student',expire_date='$expire_date',status='pending',subdomain='$subdomain',date='$date',time='$time',otp='$otp'"); 
$m="Successfully Inserted";
}
?>

<script> 

 Swal.fire({
        position: "top-center",
        icon: "success",
        title: "<?php echo $m;  ?>",
        showConfirmButton: false,
        timer: 2000
    }); 
 
$(document).ready(function(e){ 
$("#resetbtn").click(); 
$("#update").val("");   
 
}); 
 

</script>

<?php

}



?>
 
 <script type="text/javascript">
        function toggleDropdown(event) {
         var clickedRow = event.target.closest("tr");
         var dropdownOptions = clickedRow.querySelector(".options");
         
         var allOptions = document.querySelectorAll(".options");
         allOptions.forEach(function(option) {
             if (option !== dropdownOptions && option.style.display === "block") {
                 option.style.display = "none";
             }
         });
         
         if (dropdownOptions.style.display === "block") {
             dropdownOptions.style.display = "none";
         } else {
             dropdownOptions.style.display = "block";
         }
         }
 </script>
 <?php include("../content/client.php"); ?>  