<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$output=array();
$token=$_GET['token'];
$arr['type']=$_GET['type'];
$arr['temp']=$_GET['temp'];
$arr['lang']=$_GET['lang'];
$arr['data']=array();
$row3['mobile']=$_GET['mobile'];
$row3['msg']=$_GET['sms'];
$arr['data'][]=$row3;

$s=mysqli_query($host,"select * from register where authkey='$token'");
$r=mysqli_num_rows($s);
if($r==1){
$d=mysqli_fetch_array($s);
$user=$d['username'];
include("../cpanel/sms-send.php");
$output2['status']=true;
$output2['message']='Success';
$output2['data']=array();
$s1=mysqli_query($host,"select * from sms_sent where uniqid='$uniqid' and user='$user'");
while($d1=mysqli_fetch_array($s1)){
	
$row2['mobile']=$d1['mobile'];
$row2['status']=$d1['status'];
$row2['reason']=$d1['reason'];
$row2['responseID']=$d1['id'];	
$output2['data'][]=$row2;
}
}else{
$output2['status']=false;
$output2['message']="Token Not Match";
}
echo json_encode($output2,true);
?>
