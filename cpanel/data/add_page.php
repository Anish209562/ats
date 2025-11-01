<?php include("../session.php");  
$name=trim($_POST['name']);

$q="select * from group_contact where name='$name'";

$s=mysqli_query($host,$q);
$r=mysqli_num_rows($s);
if($r==0){
    $q="insert into group_contact set name='$name',date='$date'";
	mysqli_query($host,$q);
$m="Successfully Added";

?>
<script> alert("<?php echo $m;  ?>");  $(document).ready(function(e){ $("#add #name").val(""); $("#closes").click(); 
$("#bill_time").append(`<option value="<?php echo $name;?>"><?php echo $name;?></option>`);
}); 
</script>
<?php
}else{

?>
<script> alert("This Frequency Type is already added"); </script>
<?php

}




?>
	