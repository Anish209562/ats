<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$username=$obj['username'];
$user=$username;
$otp=$obj['otp'];
$subdomain="healthhonor";
$token=$obj['token'];
$name=$obj['name'];
$tweight=$obj['tweight'];
function token($sub,$t,$user,$h){
    $date=date('Y-m-d');
    $time=date('h:i:s');
    $ip=$_SERVER['REMOTE_ADDR'];
    $token=$sub;
     $token.=uniqid();
     mysqli_query($h,"delete from apk_token where user='$user'");
    if(mysqli_query($h,"insert into apk_token set token='$token',date='$date',ip='$ip',type='$t',user='$user',sub_domain='$sub'")){
        
        return $token;
    }
    
}
if($username){

$q="select * from user where mobile='$username'";
$sql=mysqli_query($host,$q);
$r=mysqli_num_rows($sql);
 $data=mysqli_fetch_array($sql);
if($otp){
    
    $sql=mysqli_query($host,"select * from otp where username='$username' and otpcode='$otp'");
    $like=mysqli_fetch_array($sql);
    $r=mysqli_num_rows($sql);
    if($r==1){
        $tok=token($subdomain,'staff',$username,$host);
        
        	$ar1 = array();
		 $ar1['status']=true;
		 $ar1['message']='Sucessfully Verified !';
		 $ar1['token']=$tok;
         if($data['name']==""){  $ar1['name']="null"; }else{  $ar1['name']=$data['name']; }	
	     $ar1['id']=$data['mobile'];
		 $ar1['subdomain']=$subdomain;
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
if($name)
{
    
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {
    $email=$obj['email'];
    $gender=$obj['gender'];
    $age=$obj['age'];
    $height=$obj['height'];
    $weight=$obj['weight'];
    $veg=$obj['veg'];
    $goal=$obj['goal'];
    $medical=$obj['medical'];
    $activity=$obj['activity'];
   
      
     	$dat=time();
	$q="update user set name='$name',email='$email',tweight='$tweight',gender='$gender',age='$age',height='$height',weight='$weight',
	veg='$veg',goal='$goal',medical='$medical',activity='$activity',date='$dat' where subdomain='$subdomain' and mobile='$username'";
		
	
		mysqli_query($host,$q);
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Welcome ".$name;
		   $ar1['name']=$name;
		 
    }else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Token Not Match, Login Again !";
    }
     echo $json = json_encode($ar1); 
}
else
{
  
 
  $sql1=mysqli_query($host,"select * from user where mobile='$username' and status='Inactive'");  
   if(mysqli_num_rows($sql1)==1)
   {
       $ar1 = array();
		 $ar1['status']=false;
		 $ar1['message']="You Are Block, Contact Our Support Team !";
	 
              echo $json = json_encode($ar1); 
       return;
   }
    
    $ot=rand(100000,999999);
 	$dat=time();
$tym=date("h-i-s");

    if($r==0)
    {
        $sql=mysqli_query($host,"insert into user set mobile='$username',subdomain='$subdomain',date='$dat'");
    }
    

               
	 $ar1 = array();
	 $q="insert into otp set otpcode='$ot',username='$username',date='$dat',time='$tym'";
		 $ar1['status']=true;
		 $ar1['message']="OTP Send Successfully";
		 mysqli_query($host,"delete from otp where username='$username'");
		if(mysqli_query($host,$q)){

		 
 $smstoken="27ed5cd2725f192afc9e04b6376c5f65";
$sms='Your OTP is '.$ot.' and valid for few time . From '.$subdomain;
 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://smartechindia.in/smspanel/api/sendsms.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "token=".$smstoken."&sms=".$sms."&type=1&temp=WSCHOL&lang=English&mobile=".$username);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);






$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://smartechindia.in/smspanel/api/submitsms.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($row));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);


		}

		     
		 
		  
            
              echo $json = json_encode($ar1); 
        

}
}



}else{
    
    ?>
    <script>
        window.location="http://wschool.online";
        
    </script>
    <?php
    
    
}











?>