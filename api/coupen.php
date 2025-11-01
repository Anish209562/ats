<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

 $username=$obj['username'];
$user=$username;
$subdomain=$obj['subdomain'];;
$token=$obj['token'];
$coupen=$obj['coupen'];
$orderid=$obj['orderid'];
$date=date('Y-m-d');
function condate($d)
{
 return $newDate = date("d M Y", strtotime($d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {

  if($coupen)
    {
    
     $ss=mysqli_query($host,"select * from coupen where name='$coupen' and user='$subdomain'");   
     if($sarray=mysqli_fetch_array($ss))
     {
       if($sarray['status']=="Active")
       {
              $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Coupen Applied";  
		   $ar1['discount']=$sarray['discount'];  
		   
       }else
       {
              $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Coupen Expire !";  
		  
       }
          echo $json = json_encode($ar1); 
		  return;
     }else
     {
           $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Invalid Coupen !";  
		  echo $json = json_encode($ar1); 
		  return;
     }
     
    }
    else
    {
        
        if($orderid)
        {
	  $s12=mysqli_query($host,"select * from plan where user='$subdomain' and id='$orderid'");
     if($dd=mysqli_fetch_array($s12)){
                $package=$dd['id'];
                 $mon=$dd['plan_duration'];
                 $edate = date('Y-m-d', strtotime("+".$mon." months", strtotime(date('Y-m-d'))));

   mysqli_query($host,"update user set plan='1' , pdate='$date',edate='$edate',package='$package' where mobile='$username' and subdomain='$subdomain'");
          $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Subscription Submited , Welcome to Healthonor Family !";
		  echo $json = json_encode($ar1); 
		  return;
        }
     	    
        }
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Something Went Wrong ! Ask Your Adminster";
		  echo $json = json_encode($ar1); 
		  return;
    }

    }else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Login Please";
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