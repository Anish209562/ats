<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

 $username=$obj['username'];
$user=$username;
 $subdomain=$obj['subdomain'];;
 $token=$obj['token'];
 $id=$obj['id'];
if($username)
{

    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {


		$s=mysqli_query($host,"select * from notification where user='$subdomain' and id='$id' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Success";
		  $d=mysqli_fetch_array($s);
		  $likes=$d['likes']+1;
          mysqli_query($host,"update notification set likes='$likes' where user='$subdomain' and id='$id'");
		  $ar1['likes']=$likes;
		           
		   
		   
    }else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Token Not Match, Login Again !";
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