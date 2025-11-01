<?php
include("../db.php");

$id=$_POST['id'];
$type=$_POST['type'];

if($type=="state"){
$s=mysqli_query($host,"select * from district where id=$id");
$d=mysqli_fetch_array($s);
?>
<script>
    $(document).ready(function (){
        $("#category").val('<?php echo $d['category'];?>');
        $("#product").val("<?php echo $d['name'];?>");
        $("#update").val("<?php echo $d['id'];?>");
    });
</script>
<?php
}
else if($type=="address"){
$s=mysqli_query($host,"select * from district_sub where id=$id");
$d=mysqli_fetch_array($s);
?>
<script>
    $(document).ready(function (){

       $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:"<?php echo $d['category'];?>",type:"state"},
         success: function(html){
         $("#product").text("");	 	
         $("#product").prepend(html); 
         
        $("#category").val('<?php echo $d['category'];?>');
        $("#product").val("<?php echo $d['name'];?>");
        $("#name2").val("<?php echo $d['name2'];?>");
        $("#update").val("<?php echo $d['id'];?>");  
        var status="<?php echo $d['status'];?>";
         if (status == "Urban") {
            $("#urban").prop("checked", true);
            $("#txt").text("City & Town Name");
         } else{
            $("#rural").prop("checked", true);
            $("#txt").text("Panchayat Name");
         }
             
         }// success
        
      
      }); // ajax end
      
       
    });
</script>
<?php
}

else if($type=="gram"){
$s=mysqli_query($host,"select * from district_sub2 where id=$id");
$d=mysqli_fetch_array($s);
?>
<script>
    $(document).ready(function (){
      var ajax1  = $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:"<?php echo $d['category'];?>",type:"state"},
         success: function(html){
              $("#product").text("");	 	
               $("#product").prepend(html);
         }
     });
      var ajax2 = $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:"<?php echo $d['name'];?>",type:"district"},
         success: function(html){
             $("#name2").text("");	 	
             $("#name2").prepend(html);
             
         }
           
      });
      
     $.when(ajax1, ajax2).done(function () {
         
        $("#category").val('<?php echo $d['category'];?>');
        $("#product").val("<?php echo $d['name'];?>");
        $("#name2").val("<?php echo $d['name2'];?>");
        $("#name3").val("<?php echo $d['name3'];?>");
        $("#update").val("<?php echo $d['id'];?>");
       
     });
        
    });
</script>
<?php
}

else if($type=="village"){
$s=mysqli_query($host,"select * from district_sub3 where id=$id");
$d=mysqli_fetch_array($s);
?>
<script>
    $(document).ready(function (){
  var ajax1  = $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:"<?php echo $d['category'];?>",type:"state"},
         success: function(html){
              $("#product").text("");	 	
               $("#product").prepend(html);
         }
     });
      var ajax2 = $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:"<?php echo $d['name'];?>",type:"district"},
         success: function(html){
             $("#name2").text("");	 	
             $("#name2").prepend(html);
             
         }
           
      });
     var ajax3 = $.ajax({
         url: "content/getdata.php",
         type: "POST",
         data: {hh:"<?php echo $d['name2'];?>",type:"panch"},
         success: function(html){
             $("#name3").text("");	 	
             $("#name3").prepend(html);
             
         }
           
      });
   
    $.when(ajax1, ajax2, ajax3).done(function () {   
        $("#category").val('<?php echo $d['category'];?>');
        $("#product").val("<?php echo $d['name'];?>");
        $("#name2").val("<?php echo $d['name2'];?>");
         $("#name3").val("<?php echo $d['name3'];?>");
          $("#status").val("<?php echo $d['status'];?>");
        $("#update").val("<?php echo $d['id'];?>");
    });
    });
</script>
<?php
}

?>