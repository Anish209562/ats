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


	
		$s=mysqli_query($host,"select * from user where mobile='$username' and subdomain='$subdomain' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Welcome";  
    	  $d=mysqli_fetch_array($s);
		      
		             
		            
		            
 $now = time(); 
$your_date = strtotime($d['date']);
$datediff = $now - $your_date;

 
		             $row=array();
		             $row['date']=date('d-M-Y');
                     $row['day']=round($datediff / (60 * 60 * 24));
                     $row['need']="20 Kg in 40 Weeks";
                     $cal=($d['weight']*10)+ ($d['height']*6.25)-($d['weight']*5)+5;
                     if($d['gender']=="Female"){ $cal=$cal-156;}
                     $row['calorie']=$cal;
                     $row['carbs']=($cal/5);
                     $row['protin']=$cal/2;
                     $row['fats']=($cal/2)-($cal/5);
                     $row['fibar']=$cal/100;
                     
$sss=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and type='water' and date='$date'");
$dfdf=mysqli_fetch_array($sss);
    if(mysqli_num_rows($sss)==0){  $row['water']='0';  }else{  $row['water']=$dfdf['quantity']; }
		$ss=mysqli_query($host,"select group_manage.title as dish, group_manage.gcvalue as gcvalue,group_contact.title as unit from group_manage inner join group_contact on group_contact.id=group_manage.gcid where  group_manage.user='$subdomain' order by group_manage.title asc");
		while($dd=mysqli_fetch_array($ss))
		        {
		             $row1['id']=$dd['id'];
		            $row1['name']=$dd['dish'];
		            $row1['cal']=$dd['gcvalue'];
		            $row1['unit']=$dd['unit'];
		            $row['food'][]=$row1;
		        }
		        
		        
                     
		        
        		$ss1=mysqli_query($host,"select * from workout where user='$subdomain' order by name asc");
		while($dd1=mysqli_fetch_array($ss1))
		        {
		            $row2['id']=$dd1['id'];
		            $row2['name']=$dd1['name'];
		            $row2['cal']=$dd1['calorie'];
		            $row['workout'][]=$row2;
		        }
		        
		             $ar1['data'][]=$row; 
        
        
   
		   
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