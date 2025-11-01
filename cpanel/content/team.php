  
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
        	<div class="bbbb" style="display:flex;">

   		<div style="width: 50%;">
       <h4 class="text-blue h4">Team</h4>
       </div>
       
       <div style="width: 50%;text-align: end;">
           <button type="button" class="btn btn-outline-myself" onclick="window.location='edit/upload.php?dd=team';"> <i class="bi bi-arrow-down-up"></i> Export</button>
         <button type="button" class="btn btn-myself" onclick="dailyupt(0);"> <i class="bi bi-plus-circle"></i>
ADD Member</button>
        </div>
         </div>
       <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
 <?php 
   $s1=mysqli_query($host,"select * from team where status='Active'");  
   $prr=mysqli_num_rows($s1);  ?>

    <button class="nav-link active" id="pending-tab-tab" data-bs-toggle="tab" data-bs-target="#pending-tab" type="button" role="tab" aria-controls="pending-tab" aria-selected="true">Active <span class="badge bg-primary"><?php echo $prr; ?></span></button>

 
<?php 
   $s2=mysqli_query($host,"select * from team where status='Inactive'");  
   $prr2=mysqli_num_rows($s2);  ?>
    <button class="nav-link" id="reject-tab-tab" data-bs-toggle="tab" data-bs-target="#reject-tab" type="button" role="tab" aria-controls="reject-tab" aria-selected="false">Inactive <span class="badge bg-primary"><?php echo $prr2; ?></span> </button>
 </div>
</nav> 
<div class="tab-content" id="nav-tabContent">

<div class="tab-pane fade show active" id="pending-tab" role="tabpanel" aria-labelledby="pending-tab-tab">
 
      <div class="card-body" style="overflow-x: scroll;">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Name</th>
                  <th>Mobile </th> 
                  <th>Email</th>
                  <th>Position</th>
                  <th>Department</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { 
    ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td>
            <td>
                <img src="img/<?php echo $d1['path']; ?>" width="40" height="40" class="rounded-pill" onerror="this.src='content/user.png'"/>
            </td>
            <td><?php echo $d1['name']."<br> Staff ID : <b>".$d1['staffid']."</b>"; ?></td>
            <td><?php echo $d1['mobile']; ?></td> 
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo $d1['position']; ?></td>
            <td><?php echo $d1['department']; ?></td>
            <td>
                <div class="dropdown">
                    <div onclick="toggleDropdown(event)"><img src="build/assets/images/more.png" width="35"></div>
                    <div class="options" style="display: none;">
                        <div class="option" onclick="status(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-edit"></i>Inactive</div>
                        <div class="option" onclick="dailyupt(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-edit"></i> Edit </div>
                        <div class="option" onclick="deles(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-trash-alt"></i> Delete </div> 
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
         </table>
      </div>
</div>
<div class="tab-pane fade" id="reject-tab" role="tabpanel" aria-labelledby="reject-tab-tab">
 
      <div class="card-body" style="overflow-x: scroll;">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Name</th>
                  <th>Mobile </th> 
                  <th>Email</th>
                  <th>Position</th>
                  <th>Department</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s2)) { 
    ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td>
            <td>
                <img src="img/<?php echo $d1['path']; ?>" width="40" height="40" class="rounded-pill"/>
            </td>
            <td><?php echo $d1['name']."<br> Staff ID : <b>".$d1['staffid']."</b>"; ?></td>
            <td><?php echo $d1['mobile']; ?></td> 
            <td><?php echo $d1['email']; ?></td>
            <td><?php echo $d1['position']; ?></td>
            <td><?php echo $d1['department']; ?></td>
            <td>
                <div class="dropdown">
                    <div onclick="toggleDropdown(event)"><img src="build/assets/images/more.png" width="35"></div>
                    <div class="options" style="display: none;">
                        <div class="option" onclick="dailyupt(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-edit"></i> Edit </div>
                        <div class="option" onclick="deles(<?php echo $d1['id']; ?>);"><i style="padding-right: 6px;" class="fas fa-trash-alt"></i> Delete </div> 
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


   </div>
</div> 