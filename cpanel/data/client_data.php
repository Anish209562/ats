<?php include("../session.php"); 

if($_POST['did']!=''){
 $id=$_POST['did']; 
if($sss=mysqli_query($host,"select name from client where id='$id'")){
  $ds=mysqli_fetch_array($sss);
  $canem=$ds[0];
 mysqli_query($host,"delete from client where id='$id'"); 
mysqli_query($host,"delete from upload where did='$id'"); 
mysqli_query($host,"delete from item_details where itemid='$id'");

mysqli_query($host,"insert into upate set table_type='client',userby='$userbyname', username='$username',idd='$idd', type='$canem profile is deleted by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");
$m="Successfully Deleted"; $icon="success";
}
else{
$m="Server Error";$icon="error";
}

}else{

$name=addslashes($_POST['name']);
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$aname=addslashes($_POST['aname']); 
$category=$_POST['category']; 
$indus=$_POST['industry']; 
$website=trim($_POST['website']);

$pterms=addslashes($_POST['pterms']); 
$about=addslashes($_POST['about']);  
$cinform=addslashes($_POST['cinform']);
$remark=addslashes($_POST['remark']);
$address=addslashes($_POST['address']); 

$department = $_POST['department'];
$person = $_POST['person']; 
$mobiles = $_POST['mobiless'];
$emails = $_POST['emailss']; 
$posts = $_POST['post'];
$departedit = $_POST['edit']; 


$primaryaa=explode(";",$_POST['primary']);
$primaryname=$primaryaa[1];
$primaryemai=$primaryaa[0];

$assignmentaa=explode(";",$_POST['assignment']); 
$assignname=$assignmentaa[1];
$assignemai=$assignmentaa[0];


$update=$_POST['updates'];
$dateTime=date('Y-m-d h:i:s');

$token2=$_POST['token2'];
$username=$_SESSION['username'];

if($update){ 

$idds=$update;

$check=mysqli_query($host,"select Website,id from client where Website='$website' and subdomain='$subdomain' and id!='$update'");
if(mysqli_num_rows($check)==0){
 $q="update client set name='$name', aname='$aname',Website='$website', email='$email', mobile='$mobile', address='$address', display='YES', industry='$indus',remark='$remark', about='$about', cinform='$cinform',ltime='$dateTime', primaryn='$primaryname', primarye='$primaryemai', clientn='$assignname', cliente='$assignemai'   where id='$update' and subdomain='$subdomain'"; 

if(mysqli_query($host,"$q")){
mysqli_query($host,"insert into upate set table_type='client',userby='$userbyname', username='$username',idd='$idds', type='$name profile is modified by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");

// for contact information
$qqne="";
if (!empty($department) && !empty($mobiles)) {
   for ($i = 0; $i < count($department); $i++) {
      $departsss=htmlspecialchars($department[$i]);
      $mobilesss= htmlspecialchars($mobiles[$i]);
      $postsss=htmlspecialchars($posts[$i]);
      $emailsss= htmlspecialchars($emails[$i]);
      $personss=htmlspecialchars($person[$i]);
      $departedits=htmlspecialchars($departedit[$i]);
      $ch=mysqli_query($host,"select id from item_details where id='$departedits'");
      if(mysqli_num_rows($ch)==1){
          mysqli_query($host,"update item_details set depart='$departsss', mobile='$mobilesss', post='$postsss', email='$emailsss', name='$personss' where id='$departedits'");
      }else{
       $qqne.="  ('$update', 'user', '$departsss', '$mobilesss','$postsss','$emailsss','$personss', '$date', '$time', 'meraqui') , ";
      }
          
      }

if($qqne!=''){
$lastCommaPos = strrpos($qqne, ',');
if ($lastCommaPos !== false) {
    $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
}

mysqli_query($host,"INSERT INTO item_details (itemid, type, depart,mobile,post,email,name, date, time, sub_domain) VALUES $qqne");
}

}

$m="Successfully Updated";
$icon="success";
}
else{
$m="Server Error"; $icon="error";
}

}
else{
$m="Website Already Exist";
$icon="error";
}

}else{
    
$check=mysqli_query($host,"select Website,id from client where Website='$website' and subdomain='$subdomain'");
if(mysqli_num_rows($check)==0){
 $q="insert into client set name='$name', aname='$aname', email='$email', mobile='$mobile', address='$address', display='YES', industry='$indus', subdomain='$subdomain',remark='$remark', about='$about', cinform='$cinform',date='$date',time='$time' , status='Active', Website='$website' ,createname='$userbyname', createid='$username', unit='FirstMile IT Services', primaryn='$primaryname', primarye='$primaryemai', clientn='$assignname', cliente='$assignemai'  ";
 
if(mysqli_query($host,"$q")){
$s=mysqli_query($host,"select id from client order by id desc limit 1");
$d=mysqli_fetch_array($s);
$idd=$d[0];
$idds=$idd;

mysqli_query($host,"insert into upate set table_type='client',userby='$userbyname', username='$username',idd='$idd', type='$name profile is created by $userbyname', date='$date', time='$time', sub_domain='$subdomain'");

// for contact information
$qqne="";
if (!empty($department) && !empty($mobiles)) {
   for ($i = 0; $i < count($department); $i++) {
      $departsss=htmlspecialchars($department[$i]);
      $mobilesss= htmlspecialchars($mobiles[$i]);
      $postsss=htmlspecialchars($posts[$i]);
      $emailsss= htmlspecialchars($emails[$i]);
      $personss=htmlspecialchars($person[$i]);
      $qqne.="  ('$idd', 'user', '$departsss', '$mobilesss','$postsss','$emailsss','$personss', '$date', '$time', 'meraqui') , ";
    }


}
if($qqne!=''){
$lastCommaPos = strrpos($qqne, ',');
if ($lastCommaPos !== false) {
    $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
}

mysqli_query($host,"INSERT INTO item_details (itemid, type, depart,mobile,post,email,name, date, time, sub_domain) VALUES $qqne");
}

$m="Successfully Added";
$icon="success";

}
else{
$m="Server Error";
$icon="error";
}

}
else{
$m="Website Already Exist";
$icon="error";

}

}

// first check success or not
if($icon=="success"){
if($token2){
// for document update id
$ok=mysqli_query($host,"update upload set did='$idds' where did='$token2' and `table`='user' and sub_domain='$subdomain'");

}
}

}
?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "<?php echo $icon;?>",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
<?php if($icon=="success"){
?>
$("#staticBackdrop").css("display",'none');
 window.location='client.php'; // Reload the page
 <?php } ?>
 
});

  

</script>
