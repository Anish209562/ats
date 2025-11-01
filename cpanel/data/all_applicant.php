<?php
include("../session.php");

$typets=$_POST['typee'];
$userby=$_SESSION['username'];
$extraa=$_POST['extra'];

$ids = $_POST['ids'];
if($ids!=''){
$idArray = array_unique(explode(",", $ids)); // remove duplicates

$action=$_POST['action'];
$s1=$_POST['s2'];
$notes= $_POST['notes'];
$notifyemail=$_POST['notify'];

$createupdate=$_POST['team'];
$te=mysqli_query($host,"select name from team where email='$createupdate'");
$ts=mysqli_fetch_array($te);
$createname=$ts[0];

$tag=$_POST['tag'];
$susername=$_SESSION['username'];

// for applicant
if($extraa=="" or $extraa=="0101"){
foreach ($idArray as $id) {
    $id = intval(trim($id));

    $sql = "SELECT id, name, email,tag FROM applicant WHERE id = $id";
    $result = mysqli_query($host,$sql);

    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);

        $username  = $row['name'];
        $email     = $row['email'];
        $apptag=$row['tag'];
        $sid=$row['id'];
        
    if($typets==="7"){
          mysqli_query($host,"update applicant set tag='$tag' where id='$sid'");
          if($apptag==''){
              $aa="created";
          }
          else{
              $aa="modified";
          }
        mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$susername',idd='$id', type='$username tag is $aa by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
          $stats="success";
          $message="successfully Added Tag";
    }
    
    if($typets==="15"){
        echo "update submitjob set status='$tag',comment='$comment' where id='$id' ";
        mysqli_query($host,"update submitjob set status='$tag',comment='$comment' where id='$id' ");
        mysqli_query($host,"insert into upate set table_type='submitjob',userby='$userbyname', username='$susername',idd='$id', type='$username job status is modified by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
        $message="Successfully Changed Status"; $stats="success";

    }
    
    if($typets==="9"){
          mysqli_query($host,"update applicant set ownershipid='$createupdate' , ownername='$createname' where id='$sid'");
        mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$susername',idd='$id', type='$username Ownership is changed by $userbyname to [ $createname ]', date='$date', time='$time', sub_domain='meraqui'");
          $stats="success";
          $message="Successfully Changed Ownership";
    }
       
    if($typets==='4'){
   mysqli_query($host,"delete from applicant where id='$id'");
  
   mysqli_query($host,"insert into upate set table_type='applicant',userby='$userbyname', username='$susername',idd='$id', type='$username is deleted by $userbyname', date='$date', time='$time', sub_domain='meraqui'");

   $stats="success";
   $message="Successfully Deleted";
} 
    
    }
}
}
else{
// for job
if($extraa=="xx"){

foreach ($idArray as $id) {
    $id = intval(trim($id));

    $sql = "SELECT id, job_code, job_title FROM job WHERE id = $id";
    $result = mysqli_query($host,$sql);

    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);

        $jobcode  = $row['job_code'];
        $jobtitle     = $row['job_title'];
        $sid=$row['id'];
        
    if($typets==="2"){
        mysqli_query($host,"insert into notes set sid='$sid',sub_domain='meraqui',addTask='$notifyemail',date='$date',time='$time',userby='$userbyname',username='$userby',notes='$notes',action='$action',priority='$s1' ,tables='$extraa'");
        mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$susername',idd='$id', type='$jobcode job notes is created by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
       $message="Successfully Added"; $stats="success";
    }
    
    if($typets==="15"){
        mysqli_query($host,"update job set status='$tag',comment='$comment' where id='$id' ");
        mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$susername',idd='$id', type='$jobcode job status is modified by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
        $message="Successfully Changed Status"; $stats="success";

    }

    if($typets==='4'){
   mysqli_query($host,"delete from job where id='$id'");
  
   mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$susername',idd='$id', type='$jobcode & $jobtitle is deleted by $userbyname', date='$date', time='$time', sub_domain='meraqui'");

   $stats="success";
   $message="successfully Deleted";
} 
    
    }
}

}

else{
// for client
if($extraa=="yy"){

foreach ($idArray as $id) {

$id = intval(trim($id));

$sql = "SELECT id, name, Website FROM client WHERE id = $id";
$result = mysqli_query($host,$sql);

if ($result && mysqli_num_rows($result)>0) {
    
$row = mysqli_fetch_array($result);

$cname     = $row['name'];
$website   = $row['Website'];
$sid       = $row['id'];
        
if($typets==="2"){
        mysqli_query($host,"insert into notes set sid='$sid',sub_domain='meraqui',addTask='$notifyemail',date='$date',time='$time',userby='$userbyname',username='$userby',notes='$notes',action='$action',priority='$s1' ,tables='$extraa'");
        mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$susername',idd='$id', type='$jobcode job notes is created by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
       $message="Successfully Added"; $stats="success";
    }
    
if($typets==="9"){
          mysqli_query($host,"update client set ownershipid='$createupdate' , ownername='$createname' where id='$sid'");
        mysqli_query($host,"insert into upate set table_type='client',userby='$userbyname', username='$susername',idd='$id', type='$cname."-".$website Ownership is changed by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
          $stats="success";
          $message="Successfully Changed Ownership";
}

if($typets==='4'){
   mysqli_query($host,"delete from client where id='$id'");
  
   mysqli_query($host,"insert into upate set table_type='job',userby='$userbyname', username='$susername',idd='$id', type='$jobcode & $jobtitle is deleted by $userbyname', date='$date', time='$time', sub_domain='meraqui'");

   $stats="success";
   $message="successfully Deleted";
} 
    
}

}

}

else{

if($extraa=="aa" && $typets=="15"){
foreach ($idArray as $id) {
    $id = intval(trim($id));

    $sql = "SELECT sid,jobid FROM submitjob WHERE id = $id";
    $result = mysqli_query($host,$sql);

    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);

        $email = $row['jobid'];
        $sid   = $row['sid'];
        
        mysqli_query($host,"update submitjob set status='$tag',comment='$comment' where id='$id' ");
        mysqli_query($host,"insert into upate set table_type='submitjob',userby='$userbyname', username='$susername',idd='$id', type='$sid [ $email ] job status is modified by $userbyname', date='$date', time='$time', sub_domain='meraqui'");
        $message="Successfully Changed Status"; $stats="success";
     }
}
}

}

}

}


mysqli_close($host);
?>
<script>
    Swal.fire("<?php echo $message;?>","","<?php echo $stats;?>").then(()=>{
       //window.location.reload(true);
    });
</script>
<?php
}

?>
