<?php include("../session.php"); 
$del=$_POST['id'];
if($del){
mysqli_query($host,"delete from category where id='$del' ");
?>
<script>
$("#rows<?php echo $del;?>").hide();
Swal.fire("Successfully deleted", "", "success");
</script>
<?php
}else{
 
 

$name=$_POST['category'];

$type=$_POST['formtype'];

$update=$_POST['update'];
$check=false;


if($type=="1"){
$status=$_POST['status'];
$value="document";
$tt=" , status='$status' , type='$value'";
$value="document";
}

if($type=="2"){
$under=$_POST['under'];
$level=$_POST['level'];
$value="department";
$tt=" , under='$under', level='$level', type='$value'";
}


if($type=="3"){
$subject=addslashes($_POST['subject']);
$desc=addslashes($_POST['desc']);
$remark=addslashes($_POST['remark']);
$value="email";
$tt=" , subject='$subject', descc='$desc', remark='$remark', type='$value'";
}


if($update) {
    
mysqli_query($host,"update category set name='$name', date='$date', time='$time' $tt where id='$update' ");
$m="Successfully Updated";
$check=true;

}
else{
mysqli_query($host,"insert into category set name='$name', date='$date', time='$time' $tt");
$m="Successfully Added";
$check=true;   
}

?>
<script> 
Swal.fire("<?php echo $m;?>", "", "success");

<?php
if($type=="1"){
echo '$("input[name=\'dnametype\']").prop("checked", false);$("#dname, #updatess").val("");';
}
else if($type=="2"){
echo '$("#department_name ,#updatess2, #under_department, #level").val("");';
}
else if($type=="3"){
echo '$("#typeemail ,#updatess3, #emaildesc, #emailremark , #emailsubject").val("");$("#emaildesc, #emailremark").text("");$("#modaldemo8 .btn-close").click();';    
}
?>

<?php
if ($check) {
echo '$("#rows'.$update.'").remove();';
    $tt="";
if($update){
    $tt=" and id='$update' ";
}
    $sds = mysqli_query($host, "SELECT * FROM category WHERE type='$value' and name='$name' $tt ORDER BY id DESC LIMIT 1");
    $dss = mysqli_fetch_array($sds);

if($type=="1"){
$status = ($dss['status'] == '1') ? 'Yes' : 'No';
?>
$("input[name='dnametype']").prop("checked", false);
$("#dname ,#updatess").val("");
$("#newoutputs").append(`
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

else if($type=="2"){
?>

$("#newoutputs2").append(`
<tr id='rows<?php echo $dss['id']; ?>'>
    <td><?php echo $dss['name']; ?></td>
    <td><?php if($dss['under']!=''){echo $dss['under'];} else{echo 'No Department';}?></td>
    <td><?php if($dss['level']!='' && $dss['level']!=0){echo $dss['level'];}else{echo 'No level';}?></td>
    <td>
        <a aria-label="anchor" href="javascript:void(0);" onclick="edit('2',<?php echo $dss['id']; ?>, '<?php echo $name; ?>', '<?php echo $dss['under']; ?>', '<?php echo $dss['level']; ?>');" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light">
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
$("#under_department").append(`<option value="<?php echo $dss['name'];?>" ><?php echo $dss['name'];?></option>`);
<?php
}

else if($type=="3"){
?>

$("#newoutputs3").append(`
<tr id='rows<?php echo $dss['id'];?>' >
                <td><?php echo $dss['name']?></td>
                <td><?php echo $dss['subject'];?></td>
                <td><?php echo $dss['descc'];?></td>
                <td><?php echo $dss['remark'];?></td>
                <td>
                    <a aria-label="anchor" href="javascript:void(0);" onclick="edit2(<?php echo $dss['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                </td>
                <td><a aria-label="anchor" href="javascript:void(0);" onclick="dele(<?php echo $dss['id'];?>);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light"><i class="ri-delete-bin-line"></i></a></td>
            </tr>
`);
<?php
}

?>

<?php
}
echo "</script>";
}
?>
