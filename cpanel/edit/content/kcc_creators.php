<?php 
  $ta=mysqli_query($host,"select * from user");
  
  $tt=mysqli_num_rows($ta);
  if($tt>0){
  ?>
   <table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Card</th>
                    <th>Status</th>
                    
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
                     <td>
                      <?php 
                      if($rr['kcc']=='pending'){
                      ?>
                      <button class="status btn btn-success" onclick="status(<?php echo $rr['id'];?>,'approved');">Approve</button>
                      <button class="status btn btn-danger"  onclick="status(<?php echo $rr['id'];?>,'rejected');">Reject</button>
                      <?php
                      }else{
                          if($rr['kcc']=='approved'){
                    ?>
                    <span class="badge badge-success">Approved</span>
                    <?php
                    }else{
                     ?>
                     <span class="badge badge-danger">Rejected</span>
                     <?php
                          }
                      }
                      ?>     
                    
                     </td>
                </tr>
             <?php
           }
           ?>
           </tbody>
     </table> 
      <?php
  }
?> 
     