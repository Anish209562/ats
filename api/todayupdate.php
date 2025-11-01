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


	
		  $ar1 = array();
          $ar1['status']=true; 
		  
		  $ar1['data']=array();         
		       
          $sss=mysqli_query($host,"select * from daily_updates where status='Active' order by date desc limit 25");
          
	      $ar1['message']="success"; 
		  while($dfdf=mysqli_fetch_array($sss))
		        {
		           $idd=$dfdf['id'];
		           $dr=mysqli_query($host,"select idd from groups where type='today' and sub_domain='$subdomain' and idd='$idd' and user='$username'");
		           if(mysqli_num_rows($dr)==0){
		              mysqli_query($host,"insert into groups set type='today' , idd='$idd', sub_domain='$subdomain', date='$date', time='$time', user='$username' ");
		           }
		            
		             $row1['title']=$dfdf['title']; 
		             $row1['description']=$dfdf['description'];
		             $row1['image']="https://kaizencommunity.in/admin/cpanel/img/".$dfdf['path'];
		             $row1['date']=date('d M Y',strtotime($dfdf['date']));
		             $row1['time']=date('H:i:s',strtotime($dfdf['time']));
		             $ar1['data'][]=$row1;
		        }
		        
		   
    }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'";
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