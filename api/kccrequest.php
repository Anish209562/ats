<?php include("../cpanel/db.php");

$json = file_get_contents('php://input');
$obj = json_decode($json,true);


$username=$obj['number'];
$token=$obj['token'];
$domain=$obj['domain'];
$remark=$obj['remark'];


if($domain){


    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$domain'");
 if(mysqli_num_rows($k)==1)
    {

            
    	 mysqli_query($host,"update user set kremark='$remark',kcc='pending',kdate='$date',ktime='$time' where mobile='$username'");
         $ar1 = array();
		 $ar1['status']=true;
		 $ar1['message']='Sucessfully Update !';
		 echo $json = json_encode($ar1);
        
   
     
    }else{
        	$ar1 = array();
		 $ar1['status']=false;
		 $ar1['message']=" sub_domain='$domain' ";
		     
		       echo $json = json_encode($ar1);
        
    }

}else{
    
    ?>
    <script>
        window.location="https://esoftware.co.in";
        
    </script>
    <?php
    
    
}











?>