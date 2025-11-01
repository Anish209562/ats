<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['domain'];;
$token=$obj['token'];

$message=$obj['message'];
$rating=$obj['rating'];
     
function condate($d)
{
 return $newDate = date("d M Y", strtotime(d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)>0)
    {


	
		$s=mysqli_query($host,"insert into feedback SET message ='$message',rating='$rating',date='$date',time='$time',user='$username'");
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Successfully Submited !";
	
		   
    }else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Token Expire !";
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