<?php 
  $ta=mysqli_query($host,"select * from survey_name");
  
  $tt=mysqli_num_rows($ta);
  if($tt>0){
  ?>
   <table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Survey Name</th>
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
                     <td><?php echo date('Y-m-d',strtotime($rr['date_from']));?></td>
                     <td><?php echo date('Y-m-d',strtotime($rr['date_to']));?></td>
                     <td><?php echo $rr['sname'];?></td>
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
     