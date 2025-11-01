<?php
include("db.php");

$s=mysqli_query($host,"select id,name from team");
while($d=mysqli_fetch_array($s)){
    $id=$d[0];
    $name=$d[1];
    $passkey = substr(time(),4,5).uniqid().substr($name,1,3);
    $password=md5($passkey);
    mysqli_query($host,"update team set password='$password', passkey='$passkey' where id='$id'");
    
}
?>