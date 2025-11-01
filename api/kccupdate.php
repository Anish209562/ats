<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$_POST['username'];
$user=$username;
$subdomain=$_POST['domain'];;
$token=$_POST['token'];

$aadhar=$_POST['aadhar'];
$pan=$_POST['pan'];
$income=$_POST['income'];
$card=$_POST['ctype'];
$file1=$_FILES['file1'];
$file2=$_FILES['file2'];
     
function condate($d)
{
 return $newDate = date("d M Y", strtotime(d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)>0)
    {
	
	 $k=mysqli_query($host,"select * from kccupdate where status='pending' and user='$username'");
     if(mysqli_num_rows($k)==0)
     {
         
if($file1['tmp_name']){
$tmp=$file1['tmp_name'];
$extension = pathinfo($file1['name'], PATHINFO_EXTENSION);
$fileName1=uniqid().time()."file1.".$extension;
move_uploaded_file($tmp,"../../upload2/New/".$fileName1);
}

if($file2['tmp_name']){
$tmp=$file2['tmp_name'];
$extension = pathinfo($file2['name'], PATHINFO_EXTENSION);
$fileName2=uniqid().time()."file2.".$extension;
move_uploaded_file($tmp,"../../upload2/New/".$fileName2);
}

		  $s=mysqli_query($host,"insert into kccupdate SET aadhar='$aadhar', pan='$pan', income='$income', file1='$fileName1', file2='$fileName2', card ='$card',date='$date',status='pending',time='$time',user='$username'");
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Successfully Updated";
	
     }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="KCC Update Already In Process !";
    }
    
    }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Token Expire !";
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