<?php session_start();
include("../db.php");
$username=$_POST['username'];
$password=$_POST['password'];
$type=$_POST['type']; 
$subdomain="meraqui";

// manager login
if($type==1){
 
if(strpos($username, "@")!=false and strpos($username, ".com")!=false ) {

$s=mysqli_query($host,"select email from onboarding where email='$username' and lockk='1' and subdomain='$subdomain'");
$r=mysqli_num_rows($s);    
if($r==1) {
$ip=$_SERVER['REMOTE_ADDR'];
$token="user".uniqid().time();
mysqli_query($host,"insert into token set username='$username',token='$token',date='$date',time='$time',ip='$ip'");
$_SESSION['token']=$token;
$_SESSION['username']=$username;
$_SESSION['typess']="user"; 

?>
<script>
Swal.fire({
  position: "top-center",
  icon: "success",
  title: "Successfully Login",
  showConfirmButton: false,
  timer: 1500
}).then(()=>{
    window.location="index.php";
});
</script>
<?php
}

else{
?>
<script>
Swal.fire({
  title: "Password is incorrect",
  text: "Check Username and password re-again",
  icon: "error"
});
</script>
<?php
}

}


}
// admin login
?>