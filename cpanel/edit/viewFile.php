<?php
include '../session.php'; // or your DB connection

if (isset($_POST['ff'])) {
    $idd = $_POST['ff'];

    $q = mysqli_query($host, "SELECT * FROM survey_upload WHERE idd='$idd'");
    while ($row = mysqli_fetch_array($q)) {
        $file = htmlspecialchars($row['file']); // sanitize output
        $id=$row['id'];
        ?>
        <li class="d-flex justify-content-between align-items-center py-1 px-2 bg-light mb-2 rounded" id="list_row<?php echo $id;?>">
            <span class="text-truncate" style="max-width: 70%;"><?php echo $file;?></span>
            <div>
                <a href="img/<?php echo $file;?>" download class="btn btn-sm btn-success me-2" title="Download">
                    <i class="fa fa-download"></i>
                </a>
                <button class="btn btn-sm btn-danger" onclick="deleteFile(<?php echo $id;?>)" title="Delete">
                    <i class="fa fa-trash-alt"></i>
                </button>
            </div>
        </li>
        <?php
    }
}
else{
    if(isset($_POST['del'])){
        $del=$_POST['del'];
        $s=mysqli_query($host,"select file from survey_upload where id='$del'");
        $dd=mysqli_fetch_array($s);
        $filename=$dd[0];
        if (mysqli_query($host,"delete from survey_upload where id='$del'")) {
        $filePath = '../img/' . $filename;
        unlink($filePath);
        ?>
        <script>
  Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Succesfully Delete",
    showConfirmButton: false,
    timer: 2000
}).then(function() {
$("#list_row<?php echo $del;?>").remove();
});
        </script>
        <?php
        }
    }
}
?>
