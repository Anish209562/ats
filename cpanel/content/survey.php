<?php 
  $ta=mysqli_query($host,"select * from survey_name");
  
  $tt=mysqli_num_rows($ta);
  if($tt>0){
  ?>
  <style>
      .btn-outline-primary:hover a{
    color: #fff !important;
}
.btn-outline-primary a {
    color: rgb(var(--primary-rgb));
    border-color: rgb(var(--primary-rgb));
}
  </style>
   <table width="100%" >
           <thead>
               <tr>
                    <th>Sr.no.</th>
                    <th>Survey Name</th>
                    <th>Status</th>
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
                     <td><button class="status btn btn-outline-<?php if($rr['status']=='active'){echo 'danger';}else{echo 'success';}?>" data-status="<?php echo $rr['id'];?>"> <?php if($rr['status']=='active'){echo 'Inactive';}else{echo 'Active';}?></button>
                     
                     <button class="btn btn-outline-primary"><a href="survey_views.php?name=<?php echo $rr['sname'];?>" target="_">View</a></button> 
                     </td>
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
     