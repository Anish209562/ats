<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['domain'];
$token=$obj['token'];
$amount=$obj['amount'];
$upi=$obj['upi'];
$date=date('Y-m-d');

if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {
         
          $sss1=mysqli_query($host,"select sum(amount) from wallet where type='paid' and ( status='success' or status='pending') and user='$username'");
		  $dfdf1=mysqli_fetch_array($sss1);

	
          $sss2=mysqli_query($host,"select sum(amount) from wallet where type='received' and status='success' and user='$username'");
		  $dfdf2=mysqli_fetch_array($sss2);
		  
		  $am=$dfdf2[0]-$dfdf1[0];
		  
		  if($amount<=$am)
		  {
		      
		  $ar1=array();
          $ar1['status']=true;
	      $ar1['message']="Successfully Request Send !";  
		   
		  mysqli_query($host,"insert into wallet set remark='Withdraw money',amount='$amount',type='paid',status='pending', upi='$upi', user='$username',mode='withdraw',date='$date',time='$time'");
		  
         
		  }
		  else
		  {
		  
		  $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Not Sufficient Amount !";  
		  
		      
		  }
		   
    }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']=" sub_domain='$subdomain'";
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