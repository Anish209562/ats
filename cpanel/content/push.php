<?php 
include("../db.php");

$creator=$_POST['creator'];
$card=ucwords($_POST['card']);
$city=$_POST['city'];
$category=$_POST['category'];
$product=$_POST['product'];
$checkbox=$_POST['checkbox'];

if($checkbox=='creator'){
   $ee="";
     if($creator){
        $ee.=" and kcc='$creator'";
     } 
     $q="select * from user where kcc IS NOT NULL $ee";
     $type="1";
}
else
{
   if($checkbox=='card')
   {
     $ee="";
     if($card){
        $ee.=" and plan='$card'";
     } 
     $q="select * from user where plan IS NOT NULL $ee";
      $type="1";
   }else
   {
   
    if($checkbox=='vendor'){
       
        $t="";
    if($city){
       $t.=" and city='$city'";    
     }
     
     if($category){
         $t.=" and category='$category'";  
     }
     
     if($product){
         $t.=" and product='$product'"; 
     
     }
    $q="select * from user where mobile IS NOT NULL $t";
     $type="1";
       
       
        
    }else{
        
        $q="select * from user";
         $type="all";
        
        
        
    }
    
       
  
    
}
}


 ?>


<?php 
  $ta=mysqli_query($host,"$q");
  
  $tt=mysqli_num_rows($ta);
  if($tt>0){
  ?>
 <form method="post" id="push_form">
 <div class="row">
 
     <div class="col-xxl-6 col-xl-6 col-lg-6">
   <div class="card custom-card" style="padding: 15px 25px;">
       <h5>Total Users : <?php echo $tt;?></h5>
       <input type="hidden" id="total_push" name="total_push" value="<?php echo $tt;?>"/>
       <input type="hidden" id="push_type" name="push_type" value="<?php echo $type;?>"/>
       <div class="card-body " style="overflow-x: scroll;">
           <div class="table-container">
   <table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Card</th>
               </tr>
           </thead>
           
           <tbody>
           <?php 
           $x=0;
           while($rr=mysqli_fetch_array($ta)){
           ?>
           <tr>
                     <td><?php echo ++$x;?></td>
                     <td><?php echo $rr['name'];?></td>
                     <input type="hidden" name="mobile<?php echo $x;?>" value="<?php echo $rr['mobile'];?>"/>
                     <td><?php echo $rr['mobile'];?></td>
                     <td><?php echo $rr['email'];?></td>
                     <td>
                     <span class="badge <?php 
                     if(ucwords($rr['plan'])=='Vip'){
                         echo "badge-secondary";
                     }else{
                         if(ucwords($rr['plan'])=='Basic'){
                             echo "badge-info";
                         }else{
                             echo "badge-warning";
                         } 
                     }
                     ?>"><?php echo $rr['plan'];?></span>
                     <input type="hidden" id="push_id<?php echo $x;?>" name="push_id<?php echo $x;?>" value="<?php echo $rr['deviceid'];?>"/>
                     
                    </td>
                 </tr>
             <?php
           }
           
           ?>
           </tbody>
     </table>
     </div>
     
  
</div>

 </div>
 </div>
 
   <!-- push form -->
  <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Push Notification
                                    </div>
                                 </div>
 <div class="card-body" style="overflow-x: scroll;">
       
            <div class="row"> 

               <div class="col-xl-12"> 
                   <label for="title" class="form-label">Title*</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Push Notification Title"  />
               </div>

               <div class="col-xl-12" style="margin-top:10px;">
                  <label for="message" class="form-label">Push Notificatin Message*</label>
                  <textarea id="message" name="message" class="form-control"  placeholder="Enter Message"></textarea>
               </div>
               
               <div class="col-xl-12" style="margin-top:10px;">
                  <label for="message" class="form-label">Want Break Description*</label>
                  <select id="break" name="break" class="form-control">
                      <option disabled="" selected="">Select</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                  </select>
               </div>

               <div class="col-xl-12" style="text-align: right;padding:20px;">
                  <input type="hidden"  id='updates' name="updates" />
                   <button type="submit" class="btn btn-outline-warning" id="submit" style="padding:.5rem 2rem;font-size:17px;">Send</button>
                </div>

            </div>
        

</div>
                             </div>
                        </div>

 <!-- push form closed   -->
 
 
 
   </div> 
 
   </form>
   
   <span id="push_output"></span>
        <div id="preloader" style="display:none;"></div>
        
<style>
#preloader {
  position: fixed;
  inset: 0;
  z-index: 999999;
  overflow: hidden;
  background: #fff;
  transition: all 0.6s ease-out;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #fff;
  border-color: orange transparent orange transparent;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1.5s linear infinite;
  animation: animate-preloader 1.5s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
        </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
const preloader=$("#preloader");
    $(document).ready(function (){
    $("#push_form").on("submit",function(e){
      e.preventDefault(); 
      
      const formData = $(this).serialize();

   if($("#title").val()==""){
               Swal.fire({
                    icon: 'error',
          title: 'Validation Error',
          text: 'Please enter title of Notification',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
         });
           return false;  
  }
  
 if($("#message").val()==""){
               Swal.fire({
                    icon: 'error',
          title: 'Validation Error',
          text: 'Please enter Message of Notification',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
         });
           return false;  
  }
  
  var title=$("#title").val();
  var mess=$("#message").val();
  var breakk=$("#break").val()
 
  preloader.show();
  setTimeout(function (){
      
 if($("#push_type").val()=="all"){
   $.ajax({
      type:'post',
      url:'data/pushs.php',
      data:{title:title,message:mess,breakk:breakk},
      success:function(lav){
           $("#push_output").text("");
           $("#push_output").prepend(lav);
    }
  });  
 }else{
  $.ajax({
      type:'post',
      url:'data/push.php',
      data:formData,
      success:function(lav){
           $("#push_output").text("");
           $("#push_output").prepend(lav);
    }
  });
 }
 
  },2000); // set timeout after 2 seconds
  
  
    });
});
</script>
      <?php
  }
?> 
  
     