<?php include("../db.php"); 
$id=$_POST['idd'];
$status=$_POST['status'];
$remark=$_POST['remark'];

   mysqli_query($host,"update support set status='$status',label='$remark' where id='$id' ");
    $m="successfully updated";

?>
<script>
Swal.fire({
    position: "top-center",
    icon: "success",
    title: "<?php echo $m; ?>",
    showConfirmButton: false,
    timer: 2500
});

setTimeout(function() { 
            location.reload();
        },3000);
</script>
