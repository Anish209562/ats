<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

 $username=$obj['username'];
$user=$username;
$subdomain=$obj['subdomain'];;
$token=$obj['token'];

$status=$obj['status'];
 $title=$obj['title'];
 $rdate=$obj['rdate'];
 $mode=$obj['mode'];
$date=time();
function condate($d)
{
 return $newDate = date("d M Y", strtotime($d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {



        if($title)
        {
    
$s1=mysqli_query($host,"select * from reminder where title='$title' and user='$username' and subdomain='$subdomain'");
if(mysqli_num_rows($s1)==0)
{
    
            
          $arr=$obj['data'];
         
           mysqli_query($host,"insert into reminder set title='$title',mode='$mode',status='Active',rdate='$rdate', user='$username' , subdomain='$subdomain',date='$date'"); 
  	$s2=mysqli_query($host,"select * from reminder where user='$username' and subdomain='$subdomain' order by id desc limit 1");
  	$s22=mysqli_fetch_array($s2);
          $mid=$s22['id'];
           
          for($i=0;$i<count($arr);$i++)
          {
                $time=$arr[$i]['name'];
              if($time!="")
              {
                  
   mysqli_query($host,"insert into reminder_time set rid='$mid',time='$time', user='$username' , subdomain='$subdomain',date='$date'"); 
              }
          }
       
        }else
        {
             $ar1['status']=false;
		     $ar1['message']="Title Already Exist !";    
		     echo $json = json_encode($ar1); 
		  return;
        }
    }

        if($status)
        {
            mysqli_query($host,"delete from reminder where user='$username' and id='$status' and subdomain='$subdomain'");
        }
	
		$s=mysqli_query($host,"select * from reminder where user='$username' and subdomain='$subdomain' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
           $ar1['data']=array();
		 if($status){ 
		  $ar1['message']="Successfully Update";  }else{ $ar1['message']="Success";  }
		   
		        while($d=mysqli_fetch_array($s))
		        {
		              $rs="";   
		            if($d['mode']=="Daily"){ $rs="Everyday"; }else{ 
		                if($d['mode']=="Date"){ $rs=condate($d['rdate']); }else{ 
		                    
		                     if($d['mode']=="Day"){ $rs=$d['rdate']; }else{ 
		                          if($d['mode']=="Month"){ 
		                                 $rss=explode('-',$d['rdate']);
                                         $rs = "Every Month of ".$rss[2]." Date";
                                         
		                          }else{ 
		                              
		                                $rss=explode('-',$d['rdate']);
		                              $mn=$rss[1];
                                       $dateObj   = DateTime::createFromFormat('!m', $mn);
                                        $rs = "Every Year of ".$rss[2]." ".$dateObj->format('F')." Date"; // March
		                          }
		                     }
		                }
		                
		            }
		            
		            
		            
		             $row=array();
		             $row['title']=$d['title'];
                     $row['rdate']=$rs;
                     $row['dates']=condate($d['date']);
                     $row['mode']=$d['mode'];
                     $row['id']=$d['id'];
                     $row['status']=$d['status'];
                    $ids=$d['id'];
		$ss=mysqli_query($host,"select * from reminder_time where rid='$ids' and user='$username' and subdomain='$subdomain' order by id asc");   
                     
                while($dd=mysqli_fetch_array($ss))
		        {
		            $row1['name']=date('h:i a', strtotime($dd['time']));
		            $row['data'][]=$row1;
		        }
                     
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