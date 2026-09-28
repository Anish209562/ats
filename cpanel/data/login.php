<?php session_start();
include("../db.php");
$username=$_POST['username'];
$password=$_POST['password'];
$type=$_POST['type']; 
$subdomain="meraqui";

// subadmin
if(strpos($username, "@")!=false and strpos($username,".")!=false) {
    $password=md5(trim($password));
    $aa = "SELECT * FROM team WHERE email='$username' AND `password`='$password' AND status='Active'";
    $stmt = mysqli_query($host, $aa);
   $count = mysqli_num_rows($stmt);
    $data = mysqli_fetch_array($stmt);

    if ($count == 1 && $data['email'] == $username && $data['password'] == $password) {
        $token = time() . uniqid();
$ip=$_SERVER['REMOTE_ADDR'];
mysqli_query($host,"insert into token set username='$username',token='$token',date='$date',time='$time',ip='$ip'");
$_SESSION['token']=$token;
$_SESSION['username']=$username;
$_SESSION['typess']="staff";
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

    } else {
        ?>
        <script>
Swal.fire({
  title: "Staff login failed. ",
  text: "Invalid number or password.",
  icon: "error"
});
       </script>
        <?php
    }

}

else{
$password=md5($password);
$s=mysqli_query($host,"select * from register where username='$username' and `password`='$password'");
$r=mysqli_num_rows($s);
if($r==1){
$ip=$_SERVER['REMOTE_ADDR'];
$token="admin".uniqid().time();
mysqli_query($host,"insert into token set username='$username',token='$token',date='$date',time='$time',ip='$ip'");
$_SESSION['token']=$token;
$_SESSION['username']=$username;
$_SESSION['typess']="admin";
?>
<script>
    
    Swal.fire({
  position: "center",
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
  title: "Username & password Did Not Match !",
  text: "Please fill correct username & password",
  icon: "error"
});
    </script>
<?php	
}
}

?>