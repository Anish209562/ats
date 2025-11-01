<?php include("../db.php");
 
    
        $status = $_POST['status'];
        
        $id = $_POST['idd'];
      
        if($status=="reject")
        { 
          $update = mysqli_query($host, "update user set vstatus='rejected' WHERE id='$id' ");
        }else
        {

         mysqli_query($host, "update user set vstatus='completed' WHERE id='$id' ");
        } 
        
            
?>
<script>
Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Successfully Updated",
    showConfirmButton: false,
    timer: 1500
});
</script>
