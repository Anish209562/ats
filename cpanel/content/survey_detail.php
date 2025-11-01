<?php 
  $ta=mysqli_query($host,"select * from survey");
  
  $tt=mysqli_num_rows($ta);
  if($tt>0){
  ?>
   <table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <th>Survey Name</th>
                    <th style="width:35%;">Question</th>
                    <th style="padding:0px 20px;text-align:center;">type</th>
                    <th>Answers</th>
                    <th >Action</th>
               </tr>
           </thead>
           
           <tbody>
           <?php 
           $x=0;
           while($rr=mysqli_fetch_array($ta)){
           ?>
           <tr>
                     <td><?php echo ++$x;?></td>
                     <td><?php echo $rr['sname'];?></td>
                     <td><?php echo $rr['question'].'<br>'; if(!empty($rr['photo'])){
                     ?>
                     <button class="btn btn-info"><a href="img/<?php echo $rr['photo'];?>" target="_">View Image</a></button>
                     <?php
                     }?></td>
                     <td style="text-align:center;"><?php echo $rr['type'];?></td>
                     <td><?php echo $rr['option1'].'<br>'.$rr['option2'].'<br>'.$rr['option3'].'<br>'.$rr['option4'].'<br>'.$rr['option5'];?></td>
                     <td>
                         <a href="#" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-danger-light delete-btn" onclick="dele(<?php echo $rr['id']?>);">
                                      <i class="ri-delete-bin-line"></i></a>
                       
                        <a href="#"  class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light edit-btn" onclick="edit(<?php echo $rr['id'];?>);">
                                       <i class="ri-edit-line"></i>
                                       </a>
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
     