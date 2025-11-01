<?php
include("../session.php");
if($_FILES['bulk']['tmp_name']) {

$photo=$_FILES['bulk']['tmp_name'];
$month=date('Y-m',strtotime($_POST['monthyear']));

$file = fopen($photo,"r");

$firstRow = fgetcsv($file);

$qqne="";
while($data = fgetcsv($file)) {
    
    // Basic Details
  $client           = $data[0];   // Name
    $appid         = $data[1];   // Mobile
    $name        = $data[2];   // Manager
    $type   = $data[3];   // Manager Email
    $invoice   = $data[4];   // Type/Category
    $invoice_date    = date('Y-m-d', strtotime($data[5])); // Joining Date
    $pay         = $data[6];   // Status (right after joining date)
     $bill         = $data[6];   // Status (right after joining date)
      $margin         = $data[6];   // Status (right after joining date)
  
    // Time Info
    $date              = date('Y-m-d');
    $time=date('H:i:s');
    
  
    $qqne .= "( '$client', '$appid', '$name', '$type', '$invoice', '$invoice_date','$pay', '$bill', '$margin', '$date' , '$time', 'meraqui','$month'), ";
}


if($qqne!=''){

$lastCommaPos = strrpos($qqne, ',');
if ($lastCommaPos !== false) {
    $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
}
if(mysqli_query($host,"insert INTO `billing_import`(`client`, `applicant`, `candidate`,`type`,`inv_no`,`inv_date`,`pay_rate`, `bill_rate`, `margin`, `date`, `time`,`sub_domain`,`month`) VALUES $qqne")){
// done
?>
<script>
    $("#preloader").hide();
    Swal.fire({
         position: "top-center",
      icon: 'success',
       title: 'Upload Successful',
       showConfirmButton: false,
    timer: 2000
  }).then(function (){
      window.location.reload(true);
  });
</script>
<?php
}
else{
?>
<script>
    $("#preloader").hide();
    Swal.fire({
      icon: 'error',
       title: 'Query not fired',
  });
</script>
<?php
    
}
}

fclose($file);
mysqli_close($host);

}
else{
?>
<script>
    $("#preloader").hide();
    Swal.fire({
      icon: 'error',
       title: 'file Not found',
  });
</script>
<?php
    
}
?>
