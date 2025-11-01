  <style>
      .tab-pane{
          padding-top:0px !important;
      }
      .tab-pane  h5{
          font-size: 18px;
      }
      .tab-pane .card.custom-card{
          height:85vh !important;padding: 11px ;
      }
      .dropdown-menu{
          left: -126px !important;
    width: 236px !important;
    max-height: 240px !important;
    overflow-x: auto !important;
      }
      td i{
          cursor: pointer;
      }
      i.ri-edit-line{
         margin-right: 10px; 
      }
      table.table{
          width:100% !important;
      }
  </style>
  <style>
    /* Overlay background */
    .myOverlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      display: none; /* hidden by default */
      align-items: center;
      justify-content: center;
      z-index: 1050; /* above Bootstrap backdrop */
    }

    /* Popup box */
    .myPopupBox {
      background: #fff;
      width: 400px;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      transform: scale(0.7);
      opacity: 0;
      transition: all 0.3s ease-in-out;
    }

    /* Show animation */
    .myOverlay.active .myPopupBox {
      transform: scale(1);
      opacity: 1;
    }

    /* Header */
    .myPopupHeader {
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .myCloseBtn {
      cursor: pointer;
      font-size: 18px;
      border: none;
      background: none;
    }

    /* Footer buttons */
    .myPopupFooter {
      margin-top: 20px;
      text-align: right;
    }
    .myBtnPrimary {
      padding: 6px 14px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      background: #1a73e8;
      color: #fff;
    }
    .myBtnSecondary {
      padding: 6px 14px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      background: #ddd;
      color: #333;
      margin-left: 8px;
    }
  </style>
  
<div class="myOverlay" id="myPopup">
    <div class="myPopupBox">
      <div class="myPopupHeader" id="headingName">
        Cancel Onboarding
        <button class="myCloseBtn" onclick="closeMyPopup()">×</button>
      </div>
      <div class="myPopupBody" id="description">
        Would you like to cancel onboarding? <br>
        Please click on proceed to cancel onboarding.
      </div>
      <div class="myPopupFooter">
          <input type="hidden" id="idss" value=""/>
          <input type="hidden" id="types" value=""/>
        <button class="myBtnPrimary" onclick="proceedMyAction();">Proceed</button>
        <button class="myBtnSecondary" onclick="closeMyPopup()">Cancel</button>
      </div>
    </div>
  </div>  
  
<div class="row" style="margin-top:20px;">
<?php
function getStatusClass($status) {
    $status = strtolower(trim($status));

    $map = [
        'initiated'       => 'btn-sm btn-success ',   // yellow
        'responded'     => 'btn-sm btn-success-gradient',  // green
        'joined'        => 'btn-sm btn-info-gradient',   // red
        'verify'       => 'btn-sm alert-success ',// gray
        'remove'        =>'btn-sm btn-instagram ',     // custom teal
        'cancel'        => 'btn-sm btn-danger ',
        'disqualify'        => 'btn-sm btn-purple-gradient' // light gray
    ];

    return $map[$status]; // default if not found
}
?>
<div class="col-xxl-2">
    <div class="card">
        <div class="card-body">
              <ul class="nav nav-tabs flex-column vertical-tabs-2" role="tablist">

<li class="nav-item" role="presentation">
 	<?php 
   $s1=mysqli_query($host,"select * from onboarding where subdomain='$subdomain' and status is not null");  
   $prrr=mysqli_num_rows($s1);  ?>
    <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#all" aria-selected="true" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-menu-line"></i></p>
        <p class="mb-0 text-break">All(<?php echo $prrr;?>)</p>
    </a>
</li>

<li class="nav-item" role="presentation">
	<?php 
   $s3=mysqli_query($host,"select * from onboarding where subdomain='$subdomain'  and status='initiated'");  
   $prrr3=mysqli_num_rows($s3);  ?>
    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#initiated" aria-selected="false" tabindex="-1" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-user-voice-fill"></i></p>
        <p class="mb-0 text-break">Initiated(<?php echo $prrr3;?>)</p>
    </a>
</li>
<li class="nav-item" role="presentation">
  	<?php 
   $s4=mysqli_query($host,"select * from onboarding where subdomain='$subdomain'  and status='responded'");  
   $prrr4=mysqli_num_rows($s4);  ?>
    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#responded" aria-selected="true" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-edit-2-line"></i></p>
        <p class="mb-0 text-break">Responded(<?php echo $prrr4;?>)</p>
    </a>
</li>
<li class="nav-item" role="presentation">
 	<?php 
   $s5=mysqli_query($host,"select * from onboarding where subdomain='$subdomain'  and status='verify'");  
   $prrr5=mysqli_num_rows($s5);  ?>
    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#verified" aria-selected="false" tabindex="-1" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-checkbox-circle-line"></i></p>
        <p class="mb-0 text-break">Verified(<?php echo $prrr5;?>)</p>
    </a>
</li>

<li class="nav-item" role="presentation">
  	<?php 
   $s8=mysqli_query($host,"select * from onboarding where subdomain='$subdomain'  and status='joined'");  
   $prrr8=mysqli_num_rows($s8);  ?>
    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#joined" aria-selected="false" tabindex="-1" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-thumb-up-line"></i></p>
        <p class="mb-0 text-break">Joined(<?php echo $prrr8;?>)</p>
    </a>
</li>
<li class="nav-item" role="presentation">
   	<?php 
   $s9=mysqli_query($host,"select * from onboarding where subdomain='$subdomain'  and status='remove'");  
   $prrr9=mysqli_num_rows($s9);  ?>
   <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#disqualified" aria-selected="false" tabindex="-1" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-close-line"></i></p>
        <p class="mb-0 text-break">Disqualified(<?php echo $prrr9;?>)</p>
    </a>
</li>
<li class="nav-item" role="presentation">
  	<?php 
   $s10=mysqli_query($host,"select * from onboarding where subdomain='$subdomain'  and status='cancel'");  
   $prrr10=mysqli_num_rows($s10);  ?>
    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#cancelled" aria-selected="false" tabindex="-1" style="max-width: 100%;">
        <p class="mb-1"><i class="ri-close-circle-line"></i></p>
        <p class="mb-0 text-break">Cancelled(<?php echo $prrr10;?>)</p>
    </a>
</li>

                    </ul>
            
        </div>
    </div>
</div>

 <div class="col-md-10" style="padding-left: 0px;padding-right: 0px;">
             
<div class="tab-content">

<div class="tab-pane text-muted active show" id="all" role="tabpanel">
    <h5>All</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                   	<?php  
							while($d1=mysqli_fetch_array($s1)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
									<td><?php echo $d1['tax']; ?></td>

<td><button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td> 
<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
    <?php
        if(strtolower($d1['status'])=='initiated' or strtolower($d1['status'])=='responded' or strtolower($d1['status'])=='verified'){
             ?>
             <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <?php if(strtolower($d1['status'])!='verified'){
            ?>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'11');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <?php } ?>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
             </li>
             <?php
            }
        else if(strtolower($d1['status'])=='cancel'){
                ?>
                 <li>
                   <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i>Move to Previous Status</a>
                 </li>
                <?php
              }
        else if(strtolower($d1['status'])=='disqualify'){
        ?>
            
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'11');"><i class="ri-thumb-up-line me-2"></i>Move to Previous Status</a>
            </li>
                   <?php
               }
             
        if(strtolower($d1['status'])!='disqualify' and strtolower($d1['status'])!='cancel'){
            ?>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
    <?php 
        }
    ?>
        </ul>
    </div>
</td>

							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

                        
<div class="tab-pane text-muted" id="initiated" role="tabpanel">
    <h5>Initiated</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
							while($d1=mysqli_fetch_array($s3)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
										<td><?php echo $d1['tax']; ?></td>
	<td><button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td> 
	<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'3');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
        </ul>
    </div>
</td>
								
							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane text-muted" id="responded" role="tabpanel">
    <h5>Responded</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
							while($d1=mysqli_fetch_array($s4)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
										<td><?php echo $d1['tax']; ?></td>
<td><button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td>  
<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'3');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
        </ul>
    </div>
</td>
																		
							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane text-muted" id="verified" role="tabpanel">
    <h5>Verified</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                   <?php  
							while($d1=mysqli_fetch_array($s5)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
										<td><?php echo $d1['tax']; ?></td>

<td><button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td> 
<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'3');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
        </ul>
    </div>
</td>

							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane text-muted" id="joined" role="tabpanel">
    <h5>Joined</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                   <?php  
							while($d1=mysqli_fetch_array($s8)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
										<td><?php echo $d1['tax']; ?></td>

		<td><button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td>  							
<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'3');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
        </ul>
    </div>
</td>

							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane text-muted" id="disqualified" role="tabpanel">
    <h5>Disqualified</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
<?php  
							while($d1=mysqli_fetch_array($s9)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
										<td><?php echo $d1['tax']; ?></td>
<td><button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td>  	
<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'3');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
        </ul>
    </div>
</td>

							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tab-pane text-muted" id="cancelled" role="tabpanel">
    <h5>Cancelled</h5>
    <div class="card">
        <div class="card-body" style="padding: 10px;">
            <table class="example table mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB TITLE</th>
                        <th>PHONE</th>
                        <th>INITIATED ON</th>
                        <th>JOINING DATE</th>
                        <th>TAX TERMS</th>


                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
							while($d1=mysqli_fetch_array($s10)){ ?>	
								<tr>
									<td><?php echo $d1['name'];?></td>
									<td><?php echo $d1['email']; ?></td><td><?php echo $d1['job_title']; ?></td>
									<td><?php echo $d1['mobile']; ?></td>
									<td><?php echo $d1['date']; ?></td>
									<td><?php echo $d1['doj'];?></td>
										<td><?php echo $d1['tax']; ?></td>

	<td> <button class="btn btn-wave waves-effect waves-light <?php echo getStatusClass($d1['status']);?>"><?php echo ucwords($d1['status']);?></button>  </td>  					
<td>
    <i class="ri-edit-line fs-22" onclick="edit(<?php echo $d1['id'];?>);"></i>
    <div class="dropdown">
        <a href="javascript:void(0);" class="p-2 fs-28 text-muted" data-bs-toggle="dropdown" aria-expanded="true"><i class="ri-more-fill align-middle ms-1 d-inline-block"></i> </a>
        <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 27px);" data-popper-placement="bottom-end">
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'1');"><i class="ri-thumb-up-line me-2"></i> Join Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'22');"><i class="ri-close-circle-line me-2"></i> Cancel Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'3');"><i class="ri-checkbox-circle-line me-2"></i> Verify Onboarding</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="statuss(<?php echo $d1['id'];?>,'44');"><i class="ri-close-line me-2"></i> Disqualify Onboarding</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'copy');"><i class="ri-file-copy-line me-2"></i> Copy Applicant Portal URL</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'send');"><i class="ri-notification-3-line me-2"></i> Send Reminder</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'portal');"><i class="ri-mail-send-line me-2"></i> Send Portal Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'lock');"><i class="ri-lock-line me-2"></i> Lock Applicant Portal</a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);" onclick="update(<?php echo $d1['id'];?>,'password');"><i class="ri-key-2-line me-2"></i> Change Applicant Password</a>
            </li>
        </ul>
    </div>
</td>

							</tr>
							<?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
              
</div>



</div> 

<script>
  const myOverlay = document.getElementById('myPopup');
  const heading = document.getElementById('headingName');
  const desc = document.getElementById('description');
  const idInput = document.getElementById('idss');
  const typeInput = document.getElementById('types');

  function statuss(id, type) {
    
    idInput.value = id;
    typeInput.value = type;

    if (type === '22') {
      heading.innerHTML = 'Cancel Onboarding <button class="myCloseBtn" onclick="closeMyPopup()">×</button>';
      desc.innerHTML = 'Would you like to cancel onboarding? <br>Please click on proceed to cancel onboarding.';
    } else if (type === '44') {
      heading.innerHTML = 'Disqualify Onboarding <button class="myCloseBtn" onclick="closeMyPopup()">×</button>';
      desc.innerHTML = 'Would you like to disqualify onboarding? <br>Please click on proceed to disqualify onboarding.';
    } else if (type === '11') {
      heading.innerHTML = 'Verify Onboarding <button class="myCloseBtn" onclick="closeMyPopup()">×</button>';
      desc.innerHTML = 'Would you like to verify onboarding ? Please click on proceed to verify onboarding';
    }

    myOverlay.style.display = 'flex';
    setTimeout(() => myOverlay.classList.add('active'), 10);
  }

  function closeMyPopup() {
    myOverlay.classList.remove('active');
    setTimeout(() => myOverlay.style.display = 'none', 300);
  }

function proceedMyAction() {
    const id = idInput.value;
    const type = typeInput.value;
    
    $("#loader").show();

$.ajax({
type:"post",
url:"data/statusupdate.php",
data:{tables:type,status_hidden:id},
success:function(html){
$("#dataedit").text("");  
$("#dataedit").prepend(html);
}

});

}
function abc(){
closeMyPopup();

}
</script>
