<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['domain'];;
$token=$obj['token'];
$date=date('Y-m-d');

if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {



  $stt1=mysqli_query($host,"select sum(amount) as wamount1 from  wallet where type='paid' and user='$username' and ( status='success' or status='pending' )");
        $vtt1 = mysqli_fetch_array($stt1); 

	    $stt2=mysqli_query($host,"select sum(amount) as wamount2 from  wallet where type='received' and user='$username' and status='success'");
        $vtt2 = mysqli_fetch_array($stt2); 
        
    		  $ar1 = array();
    
     $ar1['wallet']=$vtt2[0]-$vtt1[0];
       $ar1['status']=true;
	      $ar1['message']="success";  
    	  $ar1['data']=array();      
		       
          $sss=mysqli_query($host,"select * from wallet where user='$username' order by id desc");
		  while($dfdf=mysqli_fetch_array($sss))
		        {
		             $row1['title']=$dfdf['remark'];
		             $row1['amount']=$dfdf['amount'];
		             if($dfdf['status']=="pending")
		             {
		                
		             $row1['status']="PENDING"; 
		             }else
		             {
		               if($dfdf['status']=="cancel")
		             {
		                
		             $row1['status']="REJECTED"; 
		             }else
		             {
		              $row1['status']="";    
		             }  
		             }
		             $row1['type']=$dfdf['type'];
		             $row1['mode']=$dfdf['mode'];
		             $row1['date']=date('d M Y',strtotime($dfdf['date']));
		             $row1['time']=date('H:i:s',strtotime($dfdf['time']));
		             $ar1['data'][]=$row1;
		        }
		        
		   
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