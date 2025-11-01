<?php
include("../db.php");

$category =$_POST['option'];
$type=$_POST['type'];
$ss=$_POST['ss'];
$ss2=$_POST['ss2'];

if($type=="state"){
$va=[];
$result = mysqli_query($host,"select state from state where country='$category' order by state asc");
while($row=mysqli_fetch_array($result)){
$va[]=$row[0];
}

?>

<script>
var stateOption = <?php echo json_encode($va); ?>;
createSearchableDropdown('<?php echo $ss2;?>', '<?php echo $ss;?>', stateOption);
$("#showLoader").removeClass("d-flex").addClass("d-none");
</script>
 <?php    
}
    

?>


   