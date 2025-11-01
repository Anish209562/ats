<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['domain'];
$token=$obj['token'];
$lat=$obj['lat'];
$longg=$obj['longg'];
$date=date('Y-m-d');

if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {

 mysqli_query($host,"insert into location set lat='$lat',lon='$longg',username='$username',date='$date',time='$time'");
	
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="success";  
    	        
		   
    }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Token Expire";
    }
     echo $json = json_encode($ar1); 





}
else
{
    ?>
    <script>
        window.location="http://wschool.online";
    </script>
    <?php
}



?>