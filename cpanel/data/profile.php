<?php include("../session.php"); 

// compnay
$name=$_POST['name'];
$timezone=$_POST['timezone'];
$dateformat=$_POST['dateformat'];
$color=$_POST['colorcode'];
$officeno=$_POST['officeno'];

$alt=$_POST['officeno2'];
$address=$_POST['address'];
$email=$_POST['email'];
$email2=$_POST['email2'];

// account information
$aname=$_POST['aname'];
$amobileno=$_POST['amobileno'];
$astatus=$_POST['astatus'];
$aemail=$_POST['aemail'];
$aaddress=$_POST['account_address'];
$currancy=$_POST['currancy'];
$payroll=$_POST['payroll'];

$text1=$_POST['text1'];
$text2=$_POST['text2'];
$text3=$_POST['text3'];
$text4=$_POST['text4'];


// remainder settings
$application=$_POST['application'];
$interview=$_POST['interview'];
$offerletter=$_POST['offerletter'];
$joiningletter=$_POST['Joiningletter'];

// applicatn setting
$age=$_POST['age'];
$tat=$_POST['replytat'];

// document manager
$dname=$_POST['dname'];
$compulsory=$_POST['dnametype'];

$update=$_POST['update'];
$date=date('Y-m-d');
$time=date('h:i:s'); 

// logo
if($_FILES['photo']['tmp_name']){
$ext=pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
$fileName="logo".time().'.'.$ext;
move_uploaded_file($_FILES['photo']['tmp_name'], "../img/".$fileName);

}else{
  $s=mysqli_query($host,"select logo from basic_setting where id='$update' ");
  $ss=mysqli_fetch_array($s);
  $fileName=$ss['logo'];
}

if($update){ 
    
$q="update `basic_setting` SET `name` = '$name', `timezone` = '$timezone', `dateformat` = '$dateformat', `colorcode` = '$color', `logo` = '$fileName', `text1` = '$text1', `text2` = '$text2', `text3` = '$text3', `text4` = '$text4', `officeno` = '$officeno', `altno` = '$alt', `email` = '$email', `email2` = '$email2', `address` = '$address', `aname` = '$aname', `aemail` = '$aemail',  `amobile` = '$amobileno', `aaddress` = '$aaddress', `astatus` = '$astatus', `currancy` = '$currancy', `payroll` = '$payroll', `application` = '$application', `interview` = '$interview', `offerletter` = '$offerletter', `joiningletter` = '$joiningletter', `age` = '$age', `tat` = '$tat'  where id='$update'"; 

mysqli_query($host,"$q");

$m="Successfully Updated";

}else{  

$q="INSERT INTO `basic_setting` SET `name` = '$name', `timezone` = '$timezone', `dateformat` = '$dateformat', `colorcode` = '$color', `logo` = '$fileName', `text1` = '$text1', `text2` = '$text2', `text3` = '$text3', `text4` = '$text4', `officeno` = '$officeno', `altno` = '$alt', `email` = '$email', `email2` = '$email2', `address` = '$address', `aname` = '$aname', `aemail` = '$aemail', `sub_domain` = 'meraqui', `amobile` = '$amobileno', `aaddress` = '$aaddress', `astatus` = '$astatus', `currancy` = '$currancy', `payroll` = '$payroll', `application` = '$application', `interview` = '$interview', `offerletter` = '$offerletter', `joiningletter` = '$joiningletter', `age` = '$age', `tat` = '$tat';
  ";
 
mysqli_query($host,"$q");

$m="Successfully Updated";


}



?>

<script> 
alert("<?php echo $m; ?>");

</script>
