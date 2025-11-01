<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['number'];
$user=$username;
$subdomain=$obj['domain'];
$token=$obj['token'];

$email=$obj['email'];
$gender=$obj['gender'];
$address=$obj['address'];
$state=$obj['state'];
$city=$obj['city'];
$pincode=$obj['pincode'];

$dob=$obj['dob'];
$occu=$obj['occu'];
$mstatus=$obj['mstatus'];
$education=$obj['education'];
$aadhar=$obj['aadhar'];
$pan=$obj['pan'];
$mincome=$obj['mincome'];
$fmember=$obj['fmember'];
$vehicle=$obj['vehicle'];

$fmember2=$obj['fmember2'];
$fmember3=$obj['fmember3'];
$vehicle2=$obj['vehicle2'];
$vehicle3=$obj['vehicle3'];

     
function condate($d)
{
 return $newDate = date("d M Y", strtotime(d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)>0)
    {
        
         $plans="";
         $kdd=mysqli_query($host,"select * from  user where ( plan='' or plan IS NULL) and mobile='$username' and subdomain='$subdomain'");
 if(mysqli_num_rows($kdd)>0)
    {
   
        $plans=" , plan='Basic'";
    }   
    

	
	$s=mysqli_query($host,"UPDATE user SET email ='$email',mincome='$mincome', gender ='$gender', address ='$address',state ='$state',city ='$city',pincode ='$pincode', dob ='$dob', occu ='$occu', mstatus ='$mstatus', education ='$education', aadhar ='$aadhar', pan ='$pan', F_member='$fmember', vehicle='$vehicle', family2='$fmember2', family3='$fmember3', vehicle2='$vehicle2', vehicle3='$vehicle3'  $plans where mobile='$username'");
	
	
   	$kss=mysqli_query($host,"select user,name from user where mobile='$username' and subdomain='$subdomain' and user is not null and user!='' ");
     
    if(mysqli_num_rows($kss)==1){
       
       $sd=mysqli_query($host,"select mobile , remark from wallet where mobile='$username' and mode='bid'");
	   if(mysqli_num_rows($sd)==0){
	  $kss2=mysqli_fetch_array($kss);
	  $usern=$kss2['user'];
      $name=$kss2['name'];
    	
    	$s=mysqli_query($host,"select wallet_bonus from basic_setting where sub_domain='kaizen'");
    	$dd=mysqli_fetch_array($s);
    	$amount=$dd[0];
    	
	    mysqli_query($host,"INSERT INTO wallet set remark='Registration For $name', amount='$amount', type='received', mode='bid', date='$date', time='$time', status='success', user='$usern',mobile='$username' ");
    	    	
	}
	
    }

	
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Successfully Update !";
		  
    
	
		   
    }else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']=$token."- ".$username."- ".$subdomain;
    }
     echo $json = json_encode($ar1); 





}else{
    
    ?>
    <script>
        window.location="http://wschool.online";
        
    </script>
    <?php
    
    
}



?>