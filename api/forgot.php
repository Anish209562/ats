<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$mobile=$obj['mobile'];
$rotp=$obj['otp'];
$pass=$obj['password'];
$subdomain="kaizen";
// $domain=$obj['kaizen'];
$domain='kaizen';

if($domain){
 
if($obj['password']){

$s1=mysqli_query($host,"select * from otp where username='$mobile' and otpcode='$rotp' and sub_domain='$domain'");
if(mysqli_num_rows($s1)==1){

mysqli_query($host,"update user set `password`='$pass' where subdomain='$domain' and mobile='$mobile'");    
 $arr['status']=true;
$arr['message']="success";
echo json_encode($arr); 
}else{
$arr['status']=false;
$arr['message']="OTP Did Not Match";
echo json_encode($arr);     
    
}    
    
    
}else{
if($obj['otp']){
$s1=mysqli_query($host,"select * from otp where username='$mobile' and otpcode='$rotp' and sub_domain='$domain'");
if(mysqli_num_rows($s1)==1){
 $arr['status']=true;
$arr['message']="success";
echo json_encode($arr); 
}else{
$arr['status']=false;
$arr['message']="OTP Did Not Match";
echo json_encode($arr);     
    
}    
    
}else{

$s1=mysqli_query($host,"select * from user where mobile='$mobile' and subdomain='$subdomain'");
if(mysqli_num_rows($s1)==1){
$otp=rand(1111,9999);
if(mysqli_query($host,"insert into otp set username='$mobile',otpcode='$otp',date='$date',time='$time',sub_domain='$subdomain'")){

$arr['status']=true;
$arr['message']="Success";
echo json_encode($arr); 


$link="https://www.fast2sms.com/dev/bulkV2?authorization=iUNYaB7DoAwr4Ils1EyqJQhcgGMuTPKf96pOtVRFzkbZHnC5XejtxI8Zh452TiMmN17eDXw6Pq9bLFUc&route=otp&sender_id=&message=".$otp."&variables_values=".$otp."&flash=0&numbers=".$mobile;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch); 

}else{
$arr['status']=false;
$arr['message']="Something Went Wrong";
echo json_encode($arr);  
}

}else{

$arr['status']=false;
$arr['message']="Mobile No Did Not Exists";
echo json_encode($arr); 
    
}

    
    
} 
    
    
} 
    
    
 



}else{
$arr['status']=false;
$arr['message']="$domain";
echo json_encode($arr);
}


?>