<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['number'];
$user=$username;
$subdomain=$obj['domain'];

$token=$obj['token'];
$date=date('Y-m-d');
$time=date('H:i:s');
$data=$obj['data'];

  $k1=mysqli_query($host,"select * from  survey_name where status='Active' order by id desc limit 1");
          $kk1=mysqli_fetch_array($k1);
          
          $sid=$kk1['sname'];

if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {
 
          
          for($i=0;$i<count($data);$i++)
          {
              if($data[$i]['question'])
              {
              $question=$data[$i]['question'];
              $answer=$data[$i]['answer'];  
              $q=mysqli_query($host,"insert into survey_upload set question='$question', sid='$sid', answer='$answer', username='$username', date='$date', time='$time' ");   
              }
          }
       
 
 
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Successfully Added";  
		  
		   
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