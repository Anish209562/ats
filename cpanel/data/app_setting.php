<?php include("../session.php"); 

if($_POST['id']!=''){
$del=$_POST['id'];
if(mysqli_query($host,"delete from appSetting where id='$del' ")){
?>
<script>
$("#rows<?php echo $del;?>").remove();
Swal.fire("Successfully deleted", "", "success");
</script>
<?php
}
}else{
 
$name=$_POST['category'];
$type=$_POST['formtype'];
$update=$_POST['update'];
$data=$_POST['data'];
$check=false;

if($type=="1"){
    $value="status";
}
if($type=="2"){
    $value="groups";
}
if($type=="3"){
    $value="degree";
}
if($type=="4"){
    $value="industry";
}
if($type=="5"){
    $value="lang";
}
if($type=="6"){
    $value="tech";
}
if($type=="7"){
    $value="source";
}


if($update) {
    
mysqli_query($host,"update appSetting set name='$name' ,type='$value' where tables='applicant' and id='$update' ");
$m="Successfully Updated";
$check=true;

}
else{
mysqli_query($host,"insert into appSetting set name='$name' ,type='$value',tables='applicant', date='$date', time='$time'");
$m="Successfully Added";
$check=true;   
}

if($check){
?>
<script> 
Swal.fire("<?php echo $m;?>", "", "success");

$("<?php echo $data;?> input[type='text'], <?php echo $data;?> .updatess").val("");

<?php
$tt="";
if($update){
    $tt=" and id='$update' ";
}
    $sds = mysqli_query($host, "SELECT * FROM appSetting WHERE tables='applicant' $tt ORDER BY id DESC LIMIT 1");
    $dss = mysqli_fetch_array($sds);
?>
$("#rows<?php echo $update;?>").remove();
$("<?php echo $data;?> tbody").append(`
<tr id='rows<?php echo $dss['id']; ?>'>
    <td><?php echo $dss['name']; ?></td>
    <td>
        <a aria-label="anchor" href="javascript:void(0);" onclick="edit(<?php echo $dss['id']; ?>, '<?php echo $name; ?>','<?php echo substr($data,1);?>');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light">
            <i class="ri-edit-line"></i>
        </a>
    </td>
    <td>
        <a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $dss['id']; ?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light">
            <i class="ri-delete-bin-line"></i>
        </a>
    </td>
</tr>
`);

</script>
<?php
}
}
?>
