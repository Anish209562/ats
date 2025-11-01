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
 return $newDate = date("d M Y", strtotime($d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {


	
 $s=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and type NOT IN ('water') and date='$date' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Welcome"; 
$spd=mysqli_query($host,"select * from user where mobile='$username' and subdomain='$subdomain'");	      
$spdd=mysqli_fetch_array($spd);	      
	      
	      $hh=($spdd['height']*0.0254);
	      $ar1['bmi']=round($spdd['weight']/($hh*$hh),1);
	      $bb=round($spdd['weight']/($hh*$hh),0);
	      if($bb>30)
	      {
	          $bc=4;
	      }else
	      {
	        if($bb>25)
	        {
	          $bc=3;
	           }else
	          {
	           if($bb>18.5)
	        {
	          $bc=2;
	           }else
	          {
	             $bc=1;
	          } 
	          }   
	      }
	      $ar1['bmichart']=$bc;
	      
	      if(mysqli_num_rows($s)>0)
	      {
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
		             $row1['date']=condate($d['date']);
		             $row1['title']=$tit;
		             $row1['calorie']=$d['calorie'];
		             $row1['quantity']=$d['quantity'];
		               if($d['cal1']=="" || $d['cal1']==" " || $d['cal1']==NULL)
		             {
		                $row1['cal1']="0";
		                $row1['cal2']="0";
		                $row1['cal3']="0";
		                $row1['cal4']="0";
		             }
		             else
		             {
		                $row1['cal1']=$d['cal1'];
		                $row1['cal2']=$d['cal2'];
		                $row1['cal3']=$d['cal3'];
		                $row1['cal4']=$d['cal4'];
		             }
		             $row1['type']=$d['type'];
                     $row2['todayreport'][]=$row1; 
    	      
    	  } 
	      }else
	      {
	           $row2['todayreport']=array(); 
	      }
    	  
 $ss=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and type NOT IN ('water') order by id desc");
	

	      if(mysqli_num_rows($ss)>0)
	      {
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
		             $row['date']=condate($d['date']);
		             $row['title']=$tit;
		             $row['calorie']=$d['calorie'];
		             if($d['cal1']=="" || $d['cal1']==" " || $d['cal1']==NULL)
		             {
		                $row['cal1']="0";
		                $row['cal2']="0";
		                $row['cal3']="0";
		                $row['cal4']="0";
		             }
		             else
		             {
		                $row['cal1']=$d['cal1'];
		                $row['cal2']=$d['cal2'];
		                $row['cal3']=$d['cal3'];
		                $row['cal4']=$d['cal4'];
		             }
		             
		             $row['quantity']=$d['quantity'];
		             $row['type']=$d['type'];
                     $row2['report'][]=$row; 
    	      
    	  }		  
	      }else
	      {
	           $row2['report']=array(); 
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