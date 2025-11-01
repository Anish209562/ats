  
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
        	<div class="bbbb" style="display:flex;">

   		<div style="width: 50%;">
       <h4 class="text-blue h4">Placement</h4>
       </div>
       
       <div style="width: 50%;text-align: end;">
           <button type="button" class="btn btn-outline-myself" onclick="window.location='edit/upload.php?dd=team';"> <i class="bi bi-arrow-down-up"></i> Export</button>
         <button type="button" class="btn btn-myself" onclick="dailyupt(0);"> <i class="bi bi-plus-circle"></i>
ADD</button>
        </div>
         </div>
  

      <div class="card-body" style="overflow-x: scroll;">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Job Title</th>
                  <th>Start & End Date</th>
                  <th>Vendor </th> 
                  <th>Client</th>
                  <th>Pay rate</th>
                  <th>Currency</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php
       $s1=mysqli_query($host,"select * from placement where sub_domain='$subdomain'");  

    while ($d1 = mysqli_fetch_array($s1)) { 
    ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td>
            <td>
               <?php echo $d1['job_title']; ?>
            </td>
            <td><?php echo date('M d, Y',strtotime($d1['start_date']))."<br>".date('M d, Y',strtotime($d1['end_date'])); ?></td>
            <td><?php echo $d1['vendor']; ?></td> 
            <td><?php echo $d1['client']; ?></td>
            <td><?php echo $d1['pay_rate']; ?></td>
            <td><?php echo $d1['currency']; ?></td>
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