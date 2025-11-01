<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['subdomain'];;
$token=$obj['token'];

$title=$obj['title'];
$cal=$obj['calorie'];
$quantity=$obj['quantity'];
$type=$obj['type'];
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



       if($title)
       {
           
           if($type=='water')
           {
             $sss=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and type='$type' and date='$date'");
             if(mysqli_num_rows($sss)>0)
             {
                   $q="update calorie set quantity='$quantity' where date='$date' and user='$username'and subdomain='$subdomain'";  
             }else{
                   $q="insert into calorie set date='$date',calorie='$cal',title='$title',type='$type',quantity='$quantity',user='$username', subdomain='$subdomain'";  
             }
           }else
           {
               $q="insert into calorie set date='$date',calorie='$cal',title='$title',type='$type',quantity='$quantity',user='$username', subdomain='$subdomain'";
           }
         
           mysqli_query($host,$q);       
       }
	
$s=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and type='$type' and date='$date' order by id desc");
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="Welcome";
	   $sss1=mysqli_query($host,"select * from calorie where user='$username' and subdomain='$subdomain' and type='water' and date='$date'");  
	   $ddd1=mysqli_fetch_array($sss1);
	      $ar1['water']=$ddd1['quantity'];
    	  while($d=mysqli_fetch_array($s))
    	  {
		             $row=array();
		             $row['title']=$d['title'];
		             $row['type']=$d['type'];
                     $row['quantity']=$d['quantity'];
                     $row['calorie']=$d['calorie'];
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