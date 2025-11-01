<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

 $username=$obj['username'];
$user=$username;
$subdomain=$obj['subdomain'];;
$token=$obj['token'];
$stt=$obj['status'];
$dtt=$obj['date'];
$date=date('Y-m-d');
function condate($d)
{
 return $newDate = date("d M Y", strtotime(d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {

  if($stt)
    {
     $da=date('Y-m-d');    
     if($dtt==$da)
     {
         $daa=date('Y-m-d');
     mysqli_query($host,"insert into task_allot_status set task_date='$daa', task_allot_id='$stt' ,subdomain='$subdomain'");   
     }else
     {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Only Today Task will be complete !";  
		  echo $json = json_encode($ar1); 
		  return;
     }
         
     }

 $kk=mysqli_query($host,"select * from  user where mobile='$username' and plan='1' and subdomain='$subdomain'");
 if(mysqli_num_rows($kk)==1)
    {
          $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Welcome"; 
   for($i=1;$i<8;$i++)
          {
              if($i==1){ $day=date("Y-m-d", strtotime("this week monday")); }
              if($i==2){ $day=date("Y-m-d", strtotime("this week tuesday")); }
              if($i==3){ $day=date("Y-m-d", strtotime("this week wednesday")); }
              if($i==4){ $day=date("Y-m-d", strtotime("this week thursday")); }
              if($i==5){ $day=date("Y-m-d", strtotime("this week friday")); }
              if($i==6){ $day=date("Y-m-d", strtotime("this week saturday")); }
              if($i==7){ $day=date("Y-m-d", strtotime("this week sunday")); }
	
$s=mysqli_query($host,"select * from task_allot where user='$username' and subdomain='$subdomain' and fdate<='$day' and tdate>='$day' group by date order by id desc ");
	 
	           $row1=array();
	              $row4=array();
		       $row1['date']=$day;
    	  while($d=mysqli_fetch_array($s))
    	  {
    	      
		            $row2=array();
		            $ids=$d['task_id'];
		            $idd=$d['id'];
		             $ss=mysqli_query($host,"select * from task where user='$subdomain' and id='$ids'");
		               $dd=mysqli_fetch_array($ss);
    	                
    	                   $row3['id']=$d['id'];
		                   $row3['title']=$dd['title'];
		                   $row3['link']=$dd['links'];
		                   $row3['description']=$dd['description'];
		                   $s12=mysqli_query($host,"select * from task_allot inner join task_allot_status on task_allot.id=task_allot_status.task_allot_id where task_allot_status.task_date='$day' and task_allot.user='$username' and task_allot_status.task_allot_id='$idd' and task_allot.subdomain='$subdomain'");
		                   if(mysqli_num_rows($s12)>0){ $status="Complete"; }else{ $status="Pending"; }
		                   $row3['status']=$status;
		                   $row2=$row3;
		                  
    	                
                          
    	         $row1['data'][]=$row2;
    	  } 
    	  
    	 $ar1['data'][]=$row1;   

          }
         
    }else
    {
        $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="No Plan";
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