<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

 $username=$obj['username'];
$user=$username;
$subdomain=$obj['subdomain'];;
$token=$obj['token'];
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


	
 $s=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and date='$date' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Welcome";  
    	  while($d=mysqli_fetch_array($s))
    	  {
    	      if($d['type']=="water")
    	      {
    	         $tit=$d['title']; 
    	         
    	      }else
    	      {
    	          $p=explode(' ',$d['title']);
    	          $tit=$p[0];
    	          if(is_numeric($p[1])){ }else{ 
    	            $tit=$tit." ".$p[1];   
    	            if(is_numeric($p[2])){ }else{ 
    	              $tit=$tit." ".$p[2]; 
    	          }   
    	         }
    	      }
    	             $row1=array();
		             $row1['date']=$d['date'];
		             $row1['title']=$tit;
		             $row1['calorie']=$d['calorie'];
		             $row1['quantity']=$d['quantity'];
		             $row1['type']=$d['type'];
                     $row2['todayreport'][]=$row1; 
    	      
    	  } 
    	  
    	  
 $ss=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain'  order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Welcome";
	      
	      $ar1['bmi']="23.5";
	      $ar1['bmichart']="";
    	  while($d=mysqli_fetch_array($ss))
    	  {
    	      if($d['type']=="water")
    	      {
    	         $tit=$d['title']; 
    	         
    	      }else
    	      {
    	          $p=explode(' ',$d['title']);
    	          $tit=$p[0];
    	          if(is_numeric($p[1])){ }else{ 
    	            $tit=$tit." ".$p[1];   
    	            if(is_numeric($p[2])){ }else{ 
    	              $tit=$tit." ".$p[2]; 
    	          }   
    	         }
    	      }
    	             $row=array();
		             $row['date']=$d['date'];
		             $row['title']=$tit;
		             $row['calorie']=$d['calorie'];
		             $row['quantity']=$d['quantity'];
		             $row['type']=$d['type'];
                     $row2['report'][]=$row; 
    	      
    	  }		  
 

          for($i=1;$i<8;$i++)
          {
              if($i==1){ $day=date("Y-m-d", strtotime("this week monday")); }
              if($i==2){ $day=date("Y-m-d", strtotime("this week tuesday")); }
              if($i==3){ $day=date("Y-m-d", strtotime("this week wednesday")); }
              if($i==4){ $day=date("Y-m-d", strtotime("this week thursday")); }
              if($i==5){ $day=date("Y-m-d", strtotime("this week friday")); }
              if($i==6){ $day=date("Y-m-d", strtotime("this week saturday")); }
              if($i==7){ $day=date("Y-m-d", strtotime("this week sunday")); }
         
 $s1s=mysqli_query($host,"select sum(calorie) as total from calorie where user='$username' and subdomain='$subdomain' and date='$day'");
 $sdd=mysqli_fetch_array($s1s);
                    
                     $row3['name']=$sdd['total']==null? 0: $sdd['total'];
                     $row2['chart'][]=$row3; 
              
          }
	
		        
		             $ar1['data'][]=$row2; 
		   
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