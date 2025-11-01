<?php 
  $ta=mysqli_query($host,"select * from user where kcc='approved' order by kdate desc ");
  
  $tt=mysqli_num_rows($ta);
  if($tt>0){
  ?>
   <table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <!--<th>KCC ID</th>-->
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Card</th>
                    <th>Wallet</th>
                    <th>View Details</th> 
                    <th>Status</th>
                    <th>Action</th>
               </tr>
           </thead>
           
           <tbody>
           <?php 
           $x=0;
           while($rr=mysqli_fetch_array($ta)){
               
                  $wallet_user=$rr['mobile'];
           ?>
           <tr>
                     <td><?php echo ++$x;?></td>
                      <td><?php echo $rr['name']."<br>"."<b>KCC ID: ".$rr['id']."</b>";?></td>
                     
                     <td><?php echo $rr['mobile'];?></td>
                     <td><?php echo $rr['email'];?></td>
                     <td><span class="badge <?php 
                     if(ucwords($rr['plan'])=='Vip'){
                         echo "badge-secondary";
                     }else{
                         if(ucwords($rr['plan'])=='Basic'){
                             echo "badge-info";
                         }else{
                             echo "badge-warning";
                         } 
                     }
                     ?>"><?php echo $rr['plan'];?></span></td>
                     <?php
$wa1_result = mysqli_query($host, "select sum(amount) as total_paid from wallet where user='$wallet_user' and type='paid'  and ( status='success' or status='pending')");
$wa2_result = mysqli_query($host, "select sum(amount) as total_received from wallet where user='$wallet_user' and type='received'");

$wa1_data = mysqli_fetch_array($wa1_result);
$wa2_data = mysqli_fetch_array($wa2_result);

$wa1 = $wa1_data['total_paid'];
$wa2 = $wa2_data['total_received'];

$total_wallet = $wa2 - $wa1;
?>
            <td><span class="badge bg-primary-transparent"> ₹ <?php echo $total_wallet;?></span></td>
                     
                     <td>
                <button type="button" class="btn btn-outline-success"><a href="wallet_history.php?mobile=<?php echo $rr['mobile'];?>">Wallet History</a></button>
            </td>
                     <td>
                    <?php
                           if($rr['kcc']=='approved'){
                    ?>
                    <span class="badge badge-success">Approved</span>
                    <?php
                    } ?>   
                    
                     </td>
                <td><button class="btn btn-outline-danger" onclick="remove(<?php echo $rr['id'];?>);">Remove KCC</button></td>
                </tr>
             <?php
           }
           ?>
           </tbody>
     </table> 
      <?php
  }
?> 
     