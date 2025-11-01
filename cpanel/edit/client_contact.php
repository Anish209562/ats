<?php
include("../session.php");

if(isset($_POST['client'])){

$client=explode(";",$_POST['client']);
$cid=$client[1];

$rowshtml="<option value='' hidden=''>Select Client Manager</option>";
$ss=mysqli_query($host,"select name,email from item_details where itemid='$cid' and type='user' order by name asc");
while($ds=mysqli_fetch_array($ss)){
        $rowshtml .= "<option value='".$ds['name'].";".$ds['email']."'>".$ds['name']." ( ".$ds['email']." )</option>";
}
?>
<script>
    $("#loader").hide();
    $("#c_manager").html("").append("<?php echo $rowshtml;?>");
</script>
<?php

}
?>