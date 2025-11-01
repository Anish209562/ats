<?php include("../session.php"); 
$ss=false;



if($_POST['id']!=''){
$id=$_POST['id']; 
mysqli_query($host,"delete from onboard_file where id='$id'"); 
$m="Successfully Deleted";
$ss=true;
?>
<script>
    $("#check_row<?php echo $id;?>").remove();
</script>
<?php
}
else{

$document=$_POST['document'];
$due=$_POST['duedate_form']; 
$status="Initiated";
$tokens=$_POST['tokennn'];
$date=date('Y-m-d');
$time=date('h:i:s');

$username=$data['username'];

// for comments
$idd=$_POST['idd'];
$comment=$_POST['comment'];
$duedate=$_POST['alldue'];

$qqne="";
if (!empty($document)) {
   for ($i = 0; $i < count($document); $i++) {
      $dcus=htmlspecialchars($document[$i]);
      $ch=mysqli_query($host,"select id from onboard_file where token='$tokens' and document='$dcus' and username='$username'");
      if(mysqli_num_rows($ch)==1){
        
        mysqli_query($host,"update onboard_file set document='$dcus',due='$due' where token='$tokens' and document='$dcus' and username='$username'");
        $ss=true;
    
      }else{
       $qqne.="  ('$dcus', 'Admin' ,'$username', '$status', '$date', '$time','$tokens','$due','1') , ";
      }
          
      }

if($qqne!=''){
$lastCommaPos = strrpos($qqne, ',');
if ($lastCommaPos !== false) {
    $qqne = substr_replace($qqne, '', $lastCommaPos, 1);
}

if(mysqli_query($host,"INSERT INTO onboard_file (document, user, username,status,date, time,token,due,mail) VALUES $qqne")){
    $ss=true;
}

}

if($ss){

include("../content/checklist.php");
}

}


if(!empty($idd) && !empty($comment)){
 header('Content-Type: application/json');

$ar1 = [
    'success' => false,
    'message' => ''
];
if($duedate!=''){  
 for ($i = 0; $i < count($idd); $i++) {
      $idds=htmlspecialchars($idd[$i]);
      $com=htmlspecialchars($comment[$i]);
      $ch=mysqli_query($host,"select id from onboard_file where token='$tokens' and id='$idds'");
      if(mysqli_num_rows($ch)==1){
        
        mysqli_query($host,"update onboard_file set comments='$com',alldue='$duedate' where token='$tokens' and id='$idds'");
$m="Successfully Updated";
$status=true;    
      }
          
      }

}
else{
  $status=false;
  $m="Due date not found";
}
$ar1['success']=$status;
$ar1['message']="$m";
echo json_encode($ar1);

}


}


?>