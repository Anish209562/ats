<?php include("../cpanel/db.php");

$json = file_get_contents('php://input');
$obj = json_decode($json,true);


$username=$obj['number'];
$name=addslashes($obj['name']);
$email=addslashes($obj['email']);
$password=$obj['password'];
$number=addslashes($obj['number']);
$address=addslashes($obj['address']);
$dob=$obj['dob'];
$gender=$obj['gender'];
$mstatus=$obj['mstatus'];
$cnumber=addslashes($obj['cnumber']);
$domain=$obj['domain'];
$token=$obj['token'];
$pincode=addslashes($obj['pincode']);
$city=addslashes($obj['city']);
$state=addslashes($obj['state']);

if($domain){


    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$domain'");
 if(mysqli_num_rows($k)==1)
    {

            $sql=mysqli_query($host,"select * from user where mobile='$cnumber'");
            if(mysqli_num_rows($sql)==0)   
            {
                $sql=mysqli_query($host,"select * from user where email='$email'");
                if(mysqli_num_rows($sql)==0)   
                {
                    
            
    	mysqli_query($host,"INSERT INTO user set mobile='$cnumber',user='$number',name='$name',email='$email',gender='$gender',address='$address',dob='$dob',`password`='$password',subdomain='$domain',date='$date',pincode='$pincode',city='$city',state='$state',status='Active',time='$time'");
    
    	
    	
         $ar1 = array();
		 $ar1['status']=true;
		 $ar1['message']='Sucessfully Registered !';
		 echo $json = json_encode($ar1);
        
   
                }
                else
                {
                    $ar1 = array();
                          $ar1['status']=false;
                		  $ar1['message']="Email Address Already Registered !";  
                		  	 echo $json = json_encode($ar1);
                }  
            
                 
                }
                else
                {
                    $ar1 = array();
                          $ar1['status']=false;
                		  $ar1['message']="Mobile Number Already Registered !";   
                		  	 echo $json = json_encode($ar1);
                }  


     
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