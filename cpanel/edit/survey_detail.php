 <?php include("../session.php");
$id=$_POST['id'];
$s=mysqli_query($host,"select * from survey where id='$id'");  
$d=mysqli_fetch_array($s);
 ?>
<script>
$(document).ready(function(e){
var photo="<?php echo $d['photo'];?>";  
var sname = "<?php echo $d['sname'].','.$d['sid'];?>";

$("#sname option").each(function() {
   if ($(this).val() == sname) {
            $(this).prop("selected", true);
    }
});
 
$("#hidden").val("<?php echo $d['id']; ?>");

$("#question").val("<?php echo $d['question']; ?>");

if(photo){
$("#edit_image").attr('src', "<?php echo 'img/'.$d['photo'];?>");
$("#edit_image").show();
$("#photo_hidden").val("<?php echo $d['photo'];?>");  
}


if($("#single").val()=='radio'){
    $("#single").prop("checked",true);
}else{
     $("#multiple").prop("checked",true);
}

$("#answer1").val("<?php echo $d['option1']; ?>");  
$("#answer2").val("<?php echo $d['option2']; ?>"); 
$("#answer3").val("<?php echo $d['option3']; ?>");  
$("#answer4").val("<?php echo $d['option4']; ?>"); 
$("#answer5").val("<?php echo $d['option5']; ?>");  
 

 
});  

</script>