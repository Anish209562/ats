<?php 
  $ta=mysqli_query($host,"select * from user where kcc!='approved' order by kdate desc");
  
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
                    <th>Remark</th>
                    <th>Date</th>
                    <th>Status</th>
                    
               </tr>
           </thead>
           
           <tbody>
           <?php 
           $x=0;
           while($rr=mysqli_fetch_array($ta)){
               $iddd=$rr['id'];
              $kremark=$rr['kremark'];
              $words = explode(' ', $kremark);
        $shortRemark = implode(' ', array_slice($words, 0, 10));
          $isLong = count($words) > 10;
           ?>
           <tr>
                     <td><?php echo ++$x;?></td>
                     <td><?php echo strtoupper($rr['name'])."<br> <b> KCC ID: ".$rr['id']."<b>";?></td>
                    
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
                <span class="short-text"><?php echo htmlspecialchars($shortRemark); ?><?php if ($isLong) echo '...'; ?></span>
                <?php if ($isLong): ?>
<span class="see-more" onclick="showremark('<?php echo $iddd;?>');">see more</span>
                <?php endif; ?>
            </td>
             <td><?php echo date('d-M-Y',strtotime($rr['kdate']))."<br>".date('h:i A',strtotime($rr['ktime']));?></td>
                     <td>
                      <?php 
                      if($rr['kcc']=='pending'){
                      ?>
                      <button class="status btn btn-success" onclick="status(<?php echo $rr['id'];?>,'approved');">Approve</button>
                      <button class="status btn btn-danger"  onclick="status(<?php echo $rr['id'];?>,'rejected');">Reject</button>
                      <?php
                      }else{
                     ?>
                      <span class="badge badge-danger">Rejected</span>
                     <?php
                          
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
     