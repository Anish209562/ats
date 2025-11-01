          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
 <?php 
   $s1=mysqli_query($host,"select * from user where plan='basic'");  
   $prr=mysqli_num_rows($s1);  ?>

    <button class="nav-link active" id="pending-tab-tab" data-bs-toggle="tab" data-bs-target="#pending-tab" type="button" role="tab" aria-controls="pending-tab" aria-selected="true">Basic <span class="badge bg-secondary"><?php echo $prr; ?></span></button>

 
<?php 
   $s2=mysqli_query($host,"select * from user where plan='premium'");  
   $prr2=mysqli_num_rows($s2);  ?>
    <button class="nav-link" id="reject-tab-tab" data-bs-toggle="tab" data-bs-target="#reject-tab" type="button" role="tab" aria-controls="reject-tab" aria-selected="false">Premium <span class="badge bg-secondary"><?php echo $prr2; ?></span> </button>
 
<?php 
   $s3=mysqli_query($host,"select * from user where plan='vip'");  
   $prr3=mysqli_num_rows($s3);  ?>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">VIP <span class="badge bg-secondary"><?php echo $prr3; ?></span></button>
  </div>
</nav>
          
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="pending-tab" role="tabpanel" aria-labelledby="pending-tab-tab">
              
 <?php 
   $s1=mysqli_query($host,"select * from user where plan='Basic' order by date desc");  
   $r=mysqli_num_rows($s1); 
     ?>
           <span id="mistable"> 
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Name</th>
                  <th>Mobile </th>
                  <th>Email</th>
                  <th>Dob</th> 
                  <th>Registration Date</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td>
            <td><img src="img/<?php echo $d1['photo'];?>" width="70" height="70"></td>
            <td><?php echo $d1['name']."<br> <b> KCC ID : ".$d1['id']."</b>"; ?></td>
            <td><?php echo $d1['mobile']; ?></td>
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo $d1['dob']; ?></td>
            <td><?php echo $d1['date']; ?></td>
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
                        <div class="option" onclick="details(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-comment"></i> View Details </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
          </span>
         </div>
         
         
         <div class="tab-pane fade" id="reject-tab" role="tabpanel" aria-labelledby="reject-tab-tab">
             
              <?php 
   $s1=mysqli_query($host,"select * from user where plan='Premium' order by date desc");  
   $r=mysqli_num_rows($s1); 
     ?>
           <span id="mistable"> 
         <table id="examples" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Name</th>
                  <th>Mobile </th>
                  <th>Email</th>
                  <th>Dob</th> 
                  <th>Registration Date</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$y; ?></td>
            <td><img src="img/<?php echo $d1['photo'];?>" width="70" height="70"></td>
            <td><?php echo $d1['name']."<br> <b> KCC ID : ".$d1['id']."</b>"; ?></td>
            <td><?php echo $d1['mobile']; ?></td>
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo $d1['dob']; ?></td>
            <td><?php echo $d1['date']; ?></td>
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
                        <div class="option" onclick="details(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-comment"></i> View Details </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
          </span>
             
             </div>
             
             
             
             <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                 
                  <?php 
   $s1=mysqli_query($host,"select * from user where plan='Vip' order by date desc" );  
   $r=mysqli_num_rows($s1); 
     ?>
           <span id="mistable"> 
         <table id="exampless" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Name</th>
                  <th>Mobile </th>
                  <th>Email</th>
                  <th>Dob</th> 
                  <th>Registration Date</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$z; ?></td>
            <td><img src="img/<?php echo $d1['photo'];?>" width="70" height="70"></td> 
            <td><?php echo $d1['name']."<br> <b> KCC ID : ".$d1['id']."</b>"; ?></td>
            <td><?php echo $d1['mobile']; ?></td>
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo $d1['dob']; ?></td>
            <td><?php echo $d1['date']; ?></td>
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
                        <div class="option" onclick="details(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-comment"></i> View Details </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
          </span>
                 
                 </div>
         
         
         
         </div>
