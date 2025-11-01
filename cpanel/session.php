<?php 
session_start();
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/');
}
require_once ROOT_PATH . 'db.php';
if (!$host) {
  die("Connection failed: " . mysqli_connect_error());
}

function redirectTo($aa){
unset($_SESSION['username']);
unset($_SESSION['token']);
unset($_SESSION['typess']);
$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, '/reports/') !== false) {
    header('Location: ../login.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}


}


if(isset($_SESSION['token']) && isset($_SESSION['username']))
{
    
$token=$_SESSION['token'];
$username=$_SESSION['username'];
$s=mysqli_query($host,"select * from token where token='$token' and username='$username'");

if(mysqli_num_rows($s)==1){

$d=mysqli_fetch_array($s);
$user=$d['username'];


if (strpos($user,"@")!=false and strpos($user,".")!=false) {
$sql = mysqli_query($host, "SELECT * FROM team WHERE email = '$user' and status='Active'");
        
if (mysqli_num_rows($sql) > 0) {
    $data = mysqli_fetch_array($sql);
    $data['username']=$data['email'];
    $subdomain = "meraqui";
    $userbyname=$data['name'];

} else {
    redirectTo(1);
}

}

else{
$sql = mysqli_query($host, "SELECT * FROM register WHERE username = '$user'");
if (mysqli_num_rows($sql) > 0) {
$data=mysqli_fetch_array($sql);
$data['username']=$data['username'];
$subdomain="meraqui";
$userbyname="Admin";
            
} else {
redirectTo(1);
}

}
    

}else{
redirectTo(1);

}


    
}else{
redirectTo(1);

}

?>