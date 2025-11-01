<?php include("../cpanel/db.php");

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['number'];
$user=$username;
$password=md5($obj['password']);

$pass=$obj['password'];
$deviceid=$obj['deviceid'];
$subdomain=$obj['domain'];

if($subdomain)
{

function token($sub,$t,$user,$h){
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $ip=$_SERVER['REMOTE_ADDR'];
    $token=$sub;
     $token.=uniqid();
     mysqli_query($h,"delete from apk_token where user='$user'");
    if(mysqli_query($h,"insert into apk_token set token='$token',date='$date',ip='$ip',type='$t',user='$user',sub_domain='$sub'")){
        
        return $token;
    }
    
}
if($username){



    
    $sql=mysqli_query($host,"select * from user where mobile='$username' and (password='$password' or password='$pass')");
    $like=mysqli_fetch_array($sql);
    $r=mysqli_num_rows($sql);
    if($r==1){
        
        if($like['status']=="Inactive")
        {
            $ar1 = array();
		 $ar1['status']=false;
		 $ar1['message']="You Are Block, Contact Our Support Team !";
	 
              echo $json = json_encode($ar1); 
       return;   
            
        }
        $tok=token($subdomain,'Employee',$username,$host);
        
        mysqli_query($host,"update user set deviceid='$deviceid' where mobile='$username'");
         $ar1 = array();
		 $ar1['status']=true;
		 $ar1['message']='Sucessfully Login !';
		 $ar1['token']=$tok;
         $ar1['name']=ucwords($like['name']);
	     $ar1['id']=$like['id'];
	     $ar1['email']=$like['email'];
	     $ar1['mobile']=$like['mobile'];
	     $ar1['gender']=$like['gender'];
	     $ar1['address']=$like['address'];
	     $ar1['dob']=$like['dob'];
	     $ar1['occu']=$like['occu'];
	     $ar1['mstatus']=$like['mstatus'];
	     $ar1['education']=$like['education'];
	     $ar1['aadhar']=$like['aadhar'];
	     $ar1['pan']=$like['pan'];
	     $ar1['mstatus']=$like['mstatus'];
		 echo $json = json_encode($ar1);
        
        
    }else{
        	$ar1 = array();
		 $ar1['status']=false;
		 $ar1['message']='Mobile number or password not match';
		     
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