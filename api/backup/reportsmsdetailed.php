<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$arr = json_decode($json,true);
$output=array();
$token=$_GET['token'];
$from=$_GET['fromdate'];
$to=$_GET['todate'];


$s=mysqli_query($host,"select * from register where authkey='$token'");
$r=mysqli_num_rows($s);
if($r==1){
$d=mysqli_fetch_array($s);
$user=$d['username'];

$q="select * from sms_sent where user='$user'";
if($from){
$date=date_create($from);
$from=date_format($date,"Y-m-d");
}
if($to){
$date=date_create($to);
$to=date_format($date,"Y-m-d");
}
if($from & $to){
$q.=" and (date BETWEEN '$from' AND '$to')";
}else{
if($from){
$q.=" and date='$from'";
}else{
	if($to){
$q.=" and date='$to'";
	}else{
		$q.=" limit 2000";
	}
}	
}

$output2['status']=true;
$output2['message']='Success';
$output2['data']=array();
$s1=mysqli_query($host,$q);
while($d1=mysqli_fetch_array($s1)){
	
$row2['mobile']=$d1['mobile'];
$row2['status']=$d1['status'];
$row2['reason']=$d1['reason'];
$row2['msg']=$d1['msg'];
$row2['count']=$d1['lengh'];
$row2['date']=$d1['date'];
$row2['msg']=$d1['msg'];
$row2['responseID']=$d1['id'];	
$output2['data'][]=$row2;
}
}else{
$output2['status']=false;
$output2['message']="Token Not Match";
}
echo json_encode($output2,true);
?>
