<?php include("../session.php"); 

if($_POST['ed_type']=='1'){
$school=$_POST['school'];
$higher=$_POST['higherEdu'];
$major=$_POST['major'];
$degree=$_POST['degree']; 
$year=$_POST['yearCompleted']; 

$aid=$_POST['educationhidden'];
 
$update=$_POST['educationupdates'];
 
$date=date('Y-m-d');
$time=date('h:i:s'); 


if($update>0){ 

$q="update education set sname='$school',degree='$degree',year='$year',major='$major',higher='$higher' ,sid='$aid' where id='$update'";

mysqli_query($host,"$q");
$check=2;
$m="Successfully Updated";
$idd=$update;
}else{  

$q="insert into education set sname='$school',degree='$degree',year='$year',major='$major',higher='$higher',sid='$aid',date='$date',time='$time', sub_domain='$subdomain'";
 
mysqli_query($host,"$q");
$ss=mysqli_query($host,"select id from education where sid='$aid' order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
$m="Successfully Added";
$check=2;

}

}


else if($_POST['ed_type']=='2'){
$degree=$_POST['ccomment']; 
$year=$_POST['cyear']; 
$certi=$_POST['cname'];

$aid=$_POST['certifihidden'];
$update=$_POST['certifiupdates'];
 
$date=date('Y-m-d');
$time=date('h:i:s'); 

if($update){ 

$q="update education set comment='$degree',cname='$certi',cyear='$year' , sid='$aid' where id='$update'";

mysqli_query($host,"$q");
$check=2;
$m="Successfully Updated";
$idd=$update;
}else{  

$q="insert into education set comment='$degree',cname='$certi',cyear='$year',sid='$aid',date='$date',time='$time', sub_domain='$subdomain'";
 
mysqli_query($host,"$q");
$ss=mysqli_query($host,"select id from education where sid='$aid' order by id desc limit 1");
$dd=mysqli_fetch_array($ss);
$idd=$dd[0];
$m="Successfully Added";
$check=2;

}

}

if($check!=0){
?>

<script> 
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(()=>{
    $("#certification_form #certifiupdates").val("<?php echo $idd;?>");
    $("#education_form #educationupdates").val("<?php echo $idd;?>");
});

</script>
<?php
}

?>
