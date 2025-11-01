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
$path = $_SERVER['PHP_SELF'];

header("Location : login_applicant.php");
exit;

}


if(isset($_SESSION['token']) && isset($_SESSION['username']))
{
    
$token=$_SESSION['token'];
$username=$_SESSION['username'];
$s=mysqli_query($host,"select * from token where token='$token' and username='$username'");

if(mysqli_num_rows($s)==1){

$d=mysqli_fetch_array($s);
$user=$d['username'];


if (strpos($user,"@")!=false and strpos($user,".com")!=false) {
$sql = mysqli_query($host, "SELECT * FROM onboarding WHERE email = '$user'");
        
if (mysqli_num_rows($sql) > 0) {
            $data = mysqli_fetch_array($sql);
            $subdomain = "meraqui";
            $manager_email = $data['email']; 

} else {
 redirectTo(2);   
}

}


}else{
redirectTo(1);

}


    
}else{
redirectTo(1);

}

?>