<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['number'];
$user=$username;
$subdomain=$obj['domain'];;
$token=$obj['token'];
$date=date('Y-m-d');

$value=$obj['value'];


$type=$obj['type'];



if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {
        
           if($value)
           {
              $rr="select * from user where ( name LIKE '%$value%' or id LIKE '%$value%' ) and  plan!='' order by id desc LIMIT 50";
           }
           else
           {
               $rr="select * from user where plan!='' order by id desc LIMIT 50";
           }
           $s=mysqli_query($host,$rr);
             
       
		  $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="success"; 
	      $ar1['data']=array(); 
	      
	      
	        $s1=mysqli_query($host,"select category from  user group by category order by category asc");
	        
    	      $ar1['service']=array();  
        	 
        	  
        	  
        	  $ar1['location']=array();  
        	
        	  
        	  
        	   $ar1['product']=array();  
        	 
	      
	      
	       $ar1['sector']=array(); 
		  
		 
	
	  
    	  while($d=mysqli_fetch_array($s))
    	  {
    	   if($d['name']){ $row['name']=ucfirst($d['name']); }else{ $row['name']=$d['name']; }
    	    $row['type']=$d['plan'];
    	    
    	    	  
		     	  
		  if(strtolower($d['plan'])=="basic"){  $row['benifit']="<h6>Basic Card Benifits</h6> <p style='padding:0px;margin:0px;'>1. Discounts on daily use services for a lifetime <br></br> 2. Discounts on daily-use products for a lifetime</p>"; }
		  if(strtolower($d['plan'])=="vip"){  $row['benifit']="<h5>VIP Card Benifits</h5> <p>1. Discounts on daily use services for a lifetime <br></br> 2. Discounts on daily-use products for a lifetime <br></br> 3. Emergency Funds <br></br> 4. VIP Access</p>";  }
		  if(strtolower($d['plan'])=="premium"){ 
		      $row['benifit']="<h5>Premium Card Benifits</h5> <p>1. Discounts on daily use services for a lifetime <br></br> 2. Discounts on daily-use products for a lifetime <br></br> 3. Emergency Funds</p> ";
		      
		  }
		  
    	    $row['id']=$d['id'];
    	    if($d['photo']==""){ 
    	         $row['photo']="";
		   }else
    	    {
    	    $row['photo']="https://kaizencommunity.in/admin/cpanel/img/".$d['photo'];
		        
    	    }
    	    $ar1['data'][]=$row;   
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