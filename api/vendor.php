<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['username'];
$user=$username;
$subdomain=$obj['domain'];;
$token=$obj['token'];
$date=date('Y-m-d');

$type=$obj['type'];
$value=$obj['value'];



if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {
        
            if($type)
            {
                
                $types=explode(",",$type);
                $ttt="";
                for($i=0;$i<count($types);$i++)
                {
                    if($types[$i])
                    {
                        $typee=explode("**",$types[$i]);
                        if(trim($typee[0])=="category" || trim($typee[0])=="nullcategory")
                        {
                         $pp=trim($typee[1]);    
                         $ttt.=" category='$pp' or";    
                        }
                        if(trim($typee[0])=="product" || trim($typee[0])=="nullproduct")
                        {
                         $pp=trim($typee[1]);    
                         $ttt.=" product='$pp' or";    
                        }
                        if(trim($typee[0])=="location" || trim($typee[0])=="nulllocation")
                        {
                         $pp=trim($typee[1]);    
                         $ttt.=" pincode2='$pp' or";    
                        }
                    }
                }
                if($ttt)
                {
                  $ttt.=" id<0";    
                 $fffr="select * from  user where vstatus='completed' and ( $ttt )";
                  $s=mysqli_query($host,"select * from  user where vstatus='completed' and ( $ttt )");   
                }
                else
                { 
                    $fffr="select * from  user where vstatus='completed'";
                $s=mysqli_query($host,"select * from  user where vstatus='completed'");     
                }
               
            }
            else
            { 
               if($value)
           {
              $sa="select * from user where ( name LIKE '%$value%' or id LIKE '%$value%' or bname like '%$value%' or mobile like '%$value%' or oname like '%$value%' or description like '%$value%' or category like '%$value%' or product like '%$value%' ) and vstatus='completed'  order by id desc LIMIT 30";
           }
           else
           {
                $sa="select * from  user where vstatus='completed' order by id desc ";  
           }
           
                      $s=mysqli_query($host,$sa);

             
            }
        
        
         
          $ar1=array();
          $ar1['status']=true;
	      $ar1['message']=$fffr; 
	      
	      $ar1['data']=array(); 
		   
		
			  $ar1['location']=array();  
        	  $s2=mysqli_query($host,"select pincode2 from user where vstatus='completed' group by pincode2 order by pincode2 asc");
	          while($d2=mysqli_fetch_array($s2))
        	  { 
    		    $row['name']=$d2[0]; 
    		    $ar1['location'][]=$row; 
        	  }
        	  
        	  
        	   $ar1['product']=array();  
        	           	   

        	  $s3=mysqli_query($host,"select product.category from user inner join product on user.product=product.name where user.vstatus='completed' group by product.category order by product.category asc;");
	          while($d3=mysqli_fetch_array($s3))
        	  { 
        	      $names=$d3[0];
    		    $row['name']=$d3[0]; 
    		    $row['data']=array();
            		    $s31=mysqli_query($host,"select name from product where category='$names' group by name order by name asc");
        	            while($d31=mysqli_fetch_array($s31))
                	  { 
                	      
            		    $rows['name']=$d31[0]; 
            		    $row['data'][]=$rows; 
                	  } 
    		    
    		    $ar1['product'][]=$row; 
        	  }
	      
	      
	

           while($ctt = mysqli_fetch_array($s)){ 
            
    		   $row['oname']=$ctt['oname'];
    		    $row['bname']=$ctt['bname'];
    		     $row['category']=$ctt['category'];
    		      $row['product']=$ctt['product'];
    		      $row['address']=$ctt['address2'];
    		       $row['desc']=$ctt['description'];
    		       
    		       if($ctt['vendor_photo']){
		              $row['path']="https://kaizencommunity.in/admin/cpanel/img/".$ctt['vendor_photo']; 
		           }else{
		              $row['path']=""; 
		           }
    		       
    		       
    		       
    		         $row['mobile']=$ctt['phone'];
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