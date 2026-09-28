<?php include("../cpanel/db.php");

$json = file_get_contents('php://input');
$obj = json_decode($json,true);


$name=$obj['name'];
$email=$obj['email'];
$rahul=$obj['rahul'];
$number=$obj['number'];
$address=$obj['address'];
$dob=$obj['dob'];
$gender=$obj['gender'];
$domain=$obj['domain'];
$otp=$obj['otp'];
$pincode=$obj['pincode'];
$city=$obj['city'];
$state=$obj['state'];
if($domain){

if($otp){
    
    $sql=mysqli_query($host,"select * from otp where username='$number' order by id desc limit 1");
    $like=mysqli_fetch_array($sql);
    $r=mysqli_num_rows($sql);
    
    if($like['otpcode']==$otp){

         	mysqli_query($host,"INSERT INTO user set mobile='$number',name='$name',email='$email',gender='$gender',address='$address',dob='$dob',`password`='$rahul',subdomain='$domain',date='$date',pincode='$pincode',city='$city',state='$state',status='Active',time='$time'");
         $ar1 = array();
		 $ar1['status']=true;
		 $ar1['message']='Sucessfully Registered !';
		 echo $json = json_encode($ar1);
        
        
    }else{
        	$ar1 = array();
		 $ar1['status']=false;
		 $ar1['message']='OTP Did not Match';
		     
		       echo $json = json_encode($ar1);
        
    }


    
}
else
{
  $sql1=mysqli_query($host,"select * from user where mobile='$number' and status='Inactive'");  
   if(mysqli_num_rows($sql1)==1)
   {
       $ar1 = array();
		 $ar1['status']=false;
		 $ar1['message']="You Are Block, Contact Our Support Team !";
	 
              echo $json = json_encode($ar1); 
       return;
   }    
if($name && $number)
{
    
$sql=mysqli_query($host,"select * from user where mobile='$number'");
if(mysqli_num_rows($sql)==0)   
{
    $sql=mysqli_query($host,"select * from user where email='$email'");
    if(mysqli_num_rows($sql)==0)   
    {
        
	 $ar1 = array();

	 
	     
    $otp=rand(999,9999); 
    $mobile=$number;

 

        $ar1=array();
              $ar1['status']=true;
    		  $ar1['message']="OTP Send Successfully !";  
      echo $json = json_encode($ar1); 
    
    
	 $q="insert into otp set otpcode='$otp',username='$number',date='$date',time='$time'";
		 $ar1['status']=true;
		 $ar1['message']="OTP Send Successfully";
		 mysqli_query($host,"delete from otp where username='$number'");
		if(mysqli_query($host,$q))
		{
		    
     $link="https://www.fast2sms.com/dev/bulkV2?authorization=OVRZapKM4Jrw2lym0xbW6ScFBgtGh3fonUHDdACXENiI5YP7vTE50JHKM9Fum4rhBobfw8IsdLvnCjq6&route=otp&sender_id=&message=".$otp."&variables_values=".$otp."&flash=0&numbers=".$mobile;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch); 
    
		}
     
    }
    else
    {
        $ar1 = array();
              $ar1['status']=false;
    		  $ar1['message']="Email Address Already Registered !";   
    }  
}
else
{
    $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Mobile Number Already Registered !";   
}

     echo $json = json_encode($ar1); 
}

}


}else{
    
    ?>
    <script>
        window.location="https://esoftware.co.in";
        
    </script>
    <?php
    
    
}











?>