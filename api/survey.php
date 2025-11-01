<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['number'];
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
	      $ar1['message']="success";  
    	  $ar1['data']=array();  
    	  
    	  
		     
		  $k1=mysqli_query($host,"select * from survey_name where status='active' order by id desc limit 1");
          $kk1=mysqli_fetch_array($k1);
          
          $tt=$kk1['sname'];
          $kt1=mysqli_query($host,"select * from survey where sname='$tt' order by id asc");
          
		  while($kkt1=mysqli_fetch_array($kt1))
		  {
		   
		             $row1['id']=$kkt1['id'];
		                $row1['title']=$kkt1['question'];
		             if($kkt1['photo'])
		             {
		             $row1['path']="https://kaizencommunity.in/admin/cpanel/img/".$kkt1['photo'];    
		             }
		             else
		             {
		             $row1['path']="";    
		             }
		             
		             $row1['val1']=$kkt1['option1']==""?"":$kkt1['option1'];
		             $row1['val2']=$kkt1['option2']==""?"":$kkt1['option2'];
		             $row1['val3']=$kkt1['option3']==""?"":$kkt1['option3'];
		             $row1['val4']=$kkt1['option4']==""?"":$kkt1['option4'];
		             $row1['val5']=$kkt1['option5']==""?"":$kkt1['option5'];
		             $row1['type']="radio";
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