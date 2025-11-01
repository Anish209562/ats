<?php 
$query=mysqli_query($host,"select wallet.*, user.name, user.plan from wallet  INNER JOIN user ON wallet.user= user.mobile where mode='withdraw' order by wallet.id desc");
$r=mysqli_num_rows($query);
?>
<div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                               <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Remark</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Card</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">UPI</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
if($r>0){

while($fetch=mysqli_fetch_array($query)){
?>

                                                <tr>
                                                     <td>
                                                        <span class=" fw-semibold"><?php echo ++$y;?></span>
                                                    </td>
                                                    <td><?php echo $fetch['remark'];?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                          <div class="fs-14"><?php echo strtoupper($fetch['name']);?></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                          <div class="d-flex align-items-center">
                                                          <div class="fs-14"><?php echo strtoupper($fetch['user']);?></div>
                                                        </div>
                                                    </td>
                <td>
                     <span class="badge <?php 
                     if(ucwords($fetch['plan'])=='Vip'){
                         echo "badge-secondary";
                     }else{
                         if(ucwords($fetch['plan'])=='Basic'){
                             echo "badge-info";
                         }else{
                             echo "badge-warning";
                         } 
                     }
                     ?>"><?php echo $fetch['plan'];?>
                    </span>
              </td>
                                                    <td><span class="fw-semibold fs-14"><?php echo $fetch['amount'];?></span></td>
                                                    <td><?php echo $fetch['upi']?></td>
                                                    <td>
                                                         <?php 
                      if($fetch['status']=='pending'){
                      ?>
                      <button class="status btn btn-success" onclick="status(<?php echo $fetch['id'];?>,'approve');">Approve</button>
                      <button class="status btn btn-danger"  onclick="status(<?php echo $fetch['id'];?>,'reject');">Reject</button>
                      <?php
                      }else{
                           if($fetch['status']=='success'){
                            ?>
                            <span class="badge badge-success">Success</span>
                            <?php
                           }else{
                            ?>
                            <span class="badge badge-danger">Rejected</span>
                            <?php
                           }
                      }
                      ?> 
                                                        
                                                        
                                                    </td>
                                                    
                                                    
                                                    <td><span class="text-muted"><?php echo date("d M Y",strtotime($fetch['date']));?></span></td>
                                                    <td><span class="text-muted"><?php echo date("h:i:s A",strtotime($fetch['time']));?></span></td>
                                                    
                                                </tr>

<?php
}
}
else{
?>
<h4>No data found in this table</h4>
<?php
}
?>
                                             </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>