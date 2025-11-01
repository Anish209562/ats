<?php include("../session.php"); 


header('Content-Type: application/json');

$ar1 = [
    'success' => false,
    'message' => ''
];
function generatePassword($minLength = 6, $maxLength = 13) {
    $length = rand($minLength, $maxLength);
    
    $numbers = '0123456789';
    $symbols = '=-&#!+';
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Merge all possible characters
    $allChars = $numbers . $symbols . $letters;
    
    // Ensure at least one from each category
    $password  = $numbers[rand(0, strlen($numbers) - 1)];
    $password .= $symbols[rand(0, strlen($symbols) - 1)];
    $password .= $letters[rand(0, strlen($letters) - 1)];
    
    // Fill remaining characters randomly
    for ($i = strlen($password); $i < $length; $i++) {
        $password .= $allChars[rand(0, strlen($allChars) - 1)];
    }
    
    // Shuffle to make it unpredictable
    return str_shuffle($password);
}


if($_POST['did']!=''){
 $id=$_POST['did']; 
mysqli_query($host,"delete from onboarding where id='$id'"); 
$m="Successfully Deleted";

}else{

$name=addslashes($_POST['first']);
$middle=addslashes($_POST['middle']);
$lname=addslashes($_POST['last']);
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$country=$_POST['countryInput']; 
$state=$_POST['stateInput']; 
$gender=$_POST['gender'];
$doj=$_POST['DOJ'];

$etype=$_POST['etype']; 
$city=$_POST['city']; 
$address=$_POST['address'];
$pin=$_POST['zip'];


$job=$_POST['job_title']; 
$start=$_POST['start'];  
$end=$_POST['end'];

$vendor=addslashes($_POST['vendor']);   
$vendoremail=$_POST['vendoremail'];

$client = $_POST['client'];

$brate = $_POST['bill_rate']; 
$brate_type = $_POST['bill_rate_unit'];

$ot_p_rate = $_POST['ot_pay_rate']; 
$ot_b_rate= $_POST['ot_bill_rate'];

$dt_b_rate = $_POST['dt_bill_rate']; 
$dt_p_rate = $_POST['dt_pay_rate'];
$tax = $_POST['tax_terms']; 
$currency = $_POST['currency'];

$diem = $_POST['per_diem']; 
$diemtype = $_POST['per_diem_unit'];

$pay = $_POST['pay_rate']; 
$pay_rate = $_POST['pay_rate_unit'];

$update=$_POST['updates'];
$dateTime=date('Y-m-d h:i:s');

$username=$data['username'];
if(!is_numeric($username)){
    $create="Admin";
}
else{
    $create=$data['name'];
}

$ss=mysqli_query($host,"select id from onboarding where mobile='$mobile' and email='$email'");
$dd=mysqli_num_rows($ss);

if($update or $dd==1){ 
$ds=mysqli_fetch_array($ss);
$update=$ds[0];

$idd=$update;
 $q="update onboarding set name='$name',lname='$lname', middle='$middle',email='$email', mobile='$mobile', address='$address', gender='$gender',country='$country',state='$state', city='$city', pincode='$pin', doj='$doj', etype='$etype', vendor='$vendor', vendor_email='$vendoremail', job_title='$job', start='$start', end='$end', client='$client', clientid='$cid', tax='$tax', currency='$currency', bill_rate='$brate', bill_rate_type='$brate_type', pay_rate='$prate', pay_rate_type='$prate_type', ot_bill_rate='$ot_b_rate', ot_pay_rate='$ot_p_rate', dt_bill_rate='$dt_b_rate', dt_pay_rate='$dt_p_rate', diem='$diem', diem_type='$diemtype' ,ltime='$dateTime' where id='$update'"; 

if(mysqli_query($host,"$q")){

$m="Successfully Updated";
$status=true;
}
else{
    $m="Update Query not fire";
    $status=false;
}

}else{  

$passkey = generatePassword();
$password=md5($passkey);

$q="insert into onboarding set name='$name',lname='$lname', middle='$middle',email='$email', mobile='$mobile', address='$address', gender='$gender',country='$country',state='$state', city='$city', pincode='$pin', doj='$doj', etype='$etype', vendor='$vendor', vendor_email='$vendoremail', job_title='$job', start='$start', end='$end', client='$client', clientid='$cid', tax='$tax', currency='$currency', bill_rate='$brate', bill_rate_type='$brate_type', pay_rate='$pay', pay_rate_type='$pay_rate', ot_bill_rate='$ot_b_rate', ot_pay_rate='$ot_p_rate', dt_bill_rate='$dt_b_rate', dt_pay_rate='$dt_p_rate', diem='$diem', diem_type='$diemtype' ,subdomain='$subdomain', date='$date',time='$time' , createid='$username', createname='$create',status='initiated',password='$password', passkey='$passkey'";
 
if(mysqli_query($host,"$q")){
$ss=mysqli_query($host,"select id,passkey,client,job_title from onboarding order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
$m="Successfully Added"; $status=true;
}
else{
    $m="Query not fire"; $status=false;
}

}

mysqli_query($host,"insert into upate set idd='$idd', table_type='onboarding', type='onboarding profile is created by Admin through Manual Creation.', date='$date', time='$time', sub_domain='$subdomain', userby='Admin', username='$username'");


$ar1['success']=$status;
$ar1['message']="$m";
$ar1['tokenkey']=$idd;
$ar1['name']=$name." ".$middle." ".$lname;
$ar1['email']=$email;
$ar1['clientname']=$dd[2];
$ar1['jobtitle']=$dd[3];
$ar1['password']=$dd[1];
echo json_encode($ar1);
    
}
?>


