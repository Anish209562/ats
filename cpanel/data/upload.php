<?php include("../session.php"); 

if($_POST['table']!='' && $_POST['id']!=''){
$table=$_POST['table'];
$tid=$_POST['id'];
if(mysqli_query($host,"delete from $table where id='$tid'")){
?>
<script>
Swal.fire({
  title: "Successfully Deleted",
  icon: "success",
  timer: 1500,
  showConfirmButton: false
});
</script>
<?php
}
}

else{
if($_POST['token2']!=''){

$userid=$_POST['token2'];
$table=$_POST['cid'];
// client documents
$files=$_FILES['photo'];
$filename=trim($_POST['name']);
$update=$_POST['update'];
$dateTime=date('Y-m-d h:i:s');

if($filename!=''){
// client documents
if($files['tmp_name']){
   $ext=pathinfo($files['name'],PATHINFO_EXTENSION);
   $filess="document".time().".".$ext;
   move_uploaded_file($files['tmp_name'],"../img/".$filess); 


$time=date('H:i:s');

if($table=="1"){
    $table="user";
}

$qq="insert into upload set files ='$filess', filename='$filename', did='$userid',sub_domain='$subdomain',date='$date',time='$time',`table`='$table'"; 

mysqli_query($host,"$qq");
$m="Successfully Uploaded";

$sds=mysqli_query($host,"select files,filename,id,date,time from upload where `table`='$table' and sub_domain='$subdomain' order by id desc limit 1");
$dss=mysqli_fetch_array($sds);

?>
<script> 
$("#firstrow").remove();
 $('#loader').css("display","none");
 Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2000
}).then(function (){
   $("#dname, #d_file").val("");
  <?php
  if(mysqli_num_rows($sds)>0){
  ?>
    $("#newoutput").append(`<tr id='rows<?php echo $dss['id'];?>' ><td><a href='<?php echo "/Meraqui/cpanel/img/".$dss['files'];?>' download=''>View or Download</a></td><td><?php echo $dss['filename'];?></td><td><?php echo $dss['date']."<br>".$dss['time'];?></td><td><button type='button' class='btn btn-myself btn-sm removeField' data-id="<?php echo $dss['id'];?>" data-type="2"><i class="ri-delete-bin-line"></i></button></td></tr>`);
<?php } ?>
}); 

</script>
<?php
}
}
}

}
?>

