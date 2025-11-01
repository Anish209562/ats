<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$arr = json_decode($json,true);
$output=array();
$token=$_GET['token'];
$s=mysqli_query($host,"select * from register where authkey='$token'");
$r=mysqli_num_rows($s);
if($r==1){
$d=mysqli_fetch_array($s);
$user=$d['username'];
$q="select sum(if(type = 'transation',sms,0)) as t,sum(if(type = 'promotional',sms,0)) as p from sms_allotment where user='$user'";
$q2="select sum(if(type = 'transation',lengh,0)) as t,sum(if(type = 'promotional',lengh,0)) as p from sms_sent where user='$user' and status='success'";
		$s1=mysqli_query($host,$q); $d1=mysqli_fetch_array($s1); 
		$s2=mysqli_query($host,$q2);  $d2=mysqli_fetch_array($s2); 
		$t=$d1[0]-$d2[0];
		$p=$d1[1]-$d2[1]; 
$output2['status']=true;
$output2['message']='Success';
$output2['transational']=$t;

$output2['promotional']=$p;


}else{
$output2['status']=false;
$output2['message']="Token Not Match";
}
echo json_encode($output2,true);
?>
