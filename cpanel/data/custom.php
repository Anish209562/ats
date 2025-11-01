<?php
include("../session.php");
if (isset($_POST['columns'])) {

    $typets = $_POST['table'];
    $email=$_POST['email'];
    $groups=$_POST['gg'];
    $orders=$_POST['ord'];
    $userby = $_SESSION['username'];
    $selectedColumns = $_POST['columns'];

    if ($typets == "1") {
        $tt = "job";
    } elseif ($typets == '2') {
        $tt = "client";
    } elseif ($typets == '4') {
        $tt = "applicant";
    }
$tts=""; $check=0;
if($_POST['type']!='' && isset($_POST['type'])){
    $type=$_POST['type'];
    $ddee=$_POST['ddee'];
    $rr=$_POST['rr'];
    $check='1';
}

    $allColumns   = [];
    $allComments  = [];

    $sql = "SHOW FULL COLUMNS FROM `$tt`";
    $res = mysqli_query($host, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $allColumns[] = $row['Field'];
        $allComments[$row['Field']] = $row['Comment'];
    }

    $realColumns      = [];
    $qualifiedColumns = [];
    $commentColumns   = [];

    foreach ($selectedColumns as $col) {
        $col = trim($col);

        if (in_array($col, $allColumns)) {
            $realColumns[]      = $col;
            $qualifiedColumns[] = $tt . "." . $col;
            $commentColumns[]   = $allComments[$col] ?: $col;
        }
    }

    $colStr       = mysqli_real_escape_string($host, implode(",", $realColumns));
    $tcolumnStr   = mysqli_real_escape_string($host, implode(",", $qualifiedColumns));
    $commentStr   = mysqli_real_escape_string($host, implode(",", $commentColumns));

    $datetime=date('Y-m-d H:i:s');
    $sss=mysqli_query($host,"select id from custom where subdomain='meraqui' and username='$userby' and type='$tt' and report_type='$check' ");
    if(mysqli_num_rows($sss)=="1"){
        $message="Successfully Updated";
        $query = "update custom set email='$email',ltime='$datetime', rr='$rr', ddee='$ddee', tcolumn='$tcolumnStr', col='$colStr', comment='$commentStr' , groups='$groups', orders='$orders' where subdomain='meraqui' and username='$userby' and type='$tt' and report_type='$check'";
    }
    else{
        $message="Successfully Created";
        $query = "INSERT INTO custom set ltime='$datetime', subdomain='meraqui', username='$userby', userbyname='$userbyname' , type='$tt', tcolumn='$tcolumnStr', col='$colStr', comment='$commentStr', report_type='$check', email='$email', groups='$groups', orders='$orders' , rr='$rr', ddee='$ddee'";
    }
    if(mysqli_query($host, $query)){
        $stats="success";
    }
    else{
        $message="Server Error"; $stats="error";
    }
    mysqli_close($host);
    ?>
    <script>
        $("#loader").hide();
        Swal.fire("<?php echo $message;?>","","<?php echo $stats;?>").then(()=>{
          window.location.reload(true);
        });
    </script>
    <?php
}
?>
