<?php 
   $s1=mysqli_query($host,"select * from user");  
   $r=mysqli_num_rows($s1); 
   if($r>0){   ?>
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
      <h4 class="text-blue h4">USER LIST</h4>
      <div class="card-body">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Name</th>
                  <th>Mobile </th>
                  <th>Email</th>
                  <th>Dob</th> 
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td>
            <td>
                <img src="build/assets/images/user.jpg" width="70" height="70">
            </td>
            <td><?php echo $d1['name']; ?></td>
            <td><?php echo $d1['mobile']; ?></td>
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo $d1['dob']; ?></td>
            <td>
            <?php
               if ($d1['status'] == 'active' || $d1['status'] == 'Active') {
                   ?>
                   <span class="badge bg-primary">Active</span>
            <?php
               } else {
                   ?>
                   <span class="badge bg-danger">Inactive</span>
                   <?php
               }
               ?> 
            </td>
            <td>
                <div class="dropdown">
                    <div onclick="toggleDropdown(event)"><img src="build/assets/images/more.png" width="35"></div>
                    <div class="options" style="display: none;">
                        <div class="option" onclick="edit(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-edit"></i> Edit </div>
                        <div class="option" onclick="deles(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-trash-alt"></i> Delete </div>
                        <div class="option" onclick="sms(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-comment"></i> View Details </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
      </div>
   </div>
</div>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<?php } ?>