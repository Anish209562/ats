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
    $value="priority";
}
if($type=="3"){
    $value="notice";
}
if($type=="4"){
    $value="department";
}
if($type=="5"){
    $value="employee";
}

if($type!='6'){
$tt=" , name='$name' ,type='$value'";
}
if($type=="6"){
$status=$_POST['status'];
$value="document";
$tt=" , com='$status' , name='$name' ,type='$value'";
$value="document";
}

if($update) {
    
mysqli_query($host,"update appSetting set tables='job' $tt where id='$update' ");
$m="Successfully Updated";
$check=true;

}
else{
mysqli_query($host,"insert into appSetting set tables='job', date='$date', time='$time' $tt");
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
    $sds = mysqli_query($host, "SELECT * FROM appSetting WHERE tables='job' $tt ORDER BY id DESC LIMIT 1");
    $dss = mysqli_fetch_array($sds);

if($type=="6"){
$status = ($dss['com'] == '1') ? 'Yes' : 'No';
?>
$("input[name='dnametype']").prop("checked", false);
$("<?php echo $data;?> tbody").append(`
<tr id='rows<?php echo $dss['id']; ?>'>
    <td><?php echo $dss['name']; ?></td>
    <td><?php echo $status; ?></td>
    <td>
        <a aria-label="anchor" href="javascript:void(0);" onclick="edit('1',<?php echo $dss['id']; ?>, '<?php echo $name; ?>', '<?php echo $dss['status']; ?>');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light">
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
<?php
}

if($type!="6"){
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
<?php
}

?>
</script>
<?php
}
}
?>
