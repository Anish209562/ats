<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['subdomain'];;
$token=$obj['token'];
function condate($d)
{
 return $newDate = date("d M Y", strtotime(d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {


	
		$s=mysqli_query($host,"select * from notification where user='$subdomain' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Success";
		  
		   
		        while($d=mysqli_fetch_array($s)){
		             $row=array();
		             $row['title']=$d['title'];
                     $row['description']=$d['description'];
                     $row['path']="http://tellpals.in/healthhonor/upload/notification/".$d['path'];
                     $row['date']=condate($d['date']);
                    if($d['apath']==""){  $row['profile']="";  }else{ 
                     $row['profile']="http://tellpals.in/healthhonor/upload/notification/author/".$d['apath'];
                    }
                     $row['name']=$d['name'];
                      $row['share']=$d['share'];
                     $row['likes']=$d['likes'];
                     $row['id']=$d['id'];
		             $ar1['data'][]=$row; 
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