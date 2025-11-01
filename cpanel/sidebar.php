
      <style>
          .opens{
              display:block;
          }
          .new{
                  margin-left: 15px;
    margin-top: 4px;
    font-size: 9px !important;
    /*margin-block-start: 2.75rem;*/
          }
      </style>
            <aside class="app-sidebar sticky" id="sidebar" style="top:0%;">

                <!-- Start::main-sidebar-header -->
                <div class="main-sidebar-header">
                    <a href="index.php" class="header-logo">
                        <img src="build/assets/images/brand-logos/Kaizen%20Community%20Logo.png" alt="logo" class="desktop-dark" height="45px">
                        
                </a>
                </div>
                <!-- End::main-sidebar-header -->

                <!-- Start::main-sidebar -->
                <div class="main-sidebar" id="sidebar-scroll">

                    <!-- Start::nav -->
                    <nav class="main-menu-container nav nav-pills  sub-open">
                        <div class="" id="slide-left" style="display:block !important;align-content: center;">
                            <a href="index.php" class="header-logo">
                                   <img src="build/assets/images/brand-logos/Kaizen%20Community%20Logo.png" alt="logo" class="desktop-dark" height="35px">
                        
                                  </a>
                        </div>
                        <ul class="main-menu">
                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">Main</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::slide -->

                            <li class="slide">
                                <a href="index.php" class="side-menu__item">
                                   <i class="bx bx-home side-menu__icon"></i>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li> 
                            <!-- End::slide -->

                         <?php
                         $ss=mysqli_query($host,"select * from feature  order by status asc");
                         while($dd=mysqli_fetch_array($ss)){

if($dd['link']=='reports.php' or $dd['link']=='billing.php'){

if(strtolower($_SESSION['typess'])=='admin' or strtolower($data['position'])=='delivery head'){
?>
 <li class="slide <?php if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='onboard_index.php' or $dd['link']=='reports.php'){echo "d-none"; if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='reports.php'){echo "d-xxl-block";}else{echo "d-xl-block";}  }?>"  id="<?php echo $dd['ids'];?>">
                                 
                                <a href="<?php echo $dd['link'];?>" <?php if($dd['name']=='Onboarding' or $dd['name']=='Reports'){echo "target='_blank'";} ?>class="side-menu__item">
                                   <i class="bx bx-<?php echo $dd['icon'];?> side-menu__icon"></i>
                                    <span class="side-menu__label"><?php echo $dd['name'];?></span> 
                                    </a>
                    </li>
<?php

}

}

else if($dd['link']=='profile.php' or $dd['link']=='team.php'){

  if(strtolower($_SESSION['typess'])=='admin'){
 ?>
 <li class="slide <?php if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='onboard_index.php' or $dd['link']=='reports.php'){echo "d-none"; if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='reports.php'){echo "d-xxl-block";}else{echo "d-xl-block";}  }?>"  id="<?php echo $dd['ids'];?>">
                                 
                                <a href="<?php echo $dd['link'];?>" <?php if($dd['name']=='Onboarding' or $dd['name']=='Reports'){echo "target='_blank'";} ?>class="side-menu__item">
                                   <i class="bx bx-<?php echo $dd['icon'];?> side-menu__icon"></i>
                                    <span class="side-menu__label"><?php echo $dd['name'];?></span> 
                                 </a>
                            </li>
 <?php
}
}
else if($dd['link']=='onboard_index.php' ){

  if(strtolower($_SESSION['typess'])=='admin' or strtolower($data['position'])=='hr access'){
 ?>
 <li class="slide <?php if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='onboard_index.php' or $dd['link']=='reports.php'){echo "d-none"; if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='reports.php'){echo "d-xxl-block";}else{echo "d-xl-block";}  }?>"  id="<?php echo $dd['ids'];?>">
                                 
                                <a href="<?php echo $dd['link'];?>" <?php if($dd['name']=='Onboarding' or $dd['name']=='Reports'){echo "target='_blank'";} ?>class="side-menu__item">
                                   <i class="bx bx-<?php echo $dd['icon'];?> side-menu__icon"></i>
                                    <span class="side-menu__label"><?php echo $dd['name'];?></span> 
                                 </a>
                            </li>
 <?php
}
}
else{
                            ?>
                             <li class="slide <?php if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='onboard_index.php' or $dd['link']=='reports.php'){echo "d-none"; if($dd['link']=='team.php' or $dd['link']=='billing.php' or $dd['link']=='reports.php'){echo "d-xxl-block";}else{echo "d-xl-block";}  }?>"  id="<?php echo $dd['ids'];?>">
                                 
                                <a href="<?php echo $dd['link'];?>" <?php if($dd['name']=='Onboarding' or $dd['name']=='Reports'){echo "target='_blank'";} ?>class="side-menu__item">
                                   <i class="bx bx-<?php echo $dd['icon'];?> side-menu__icon"></i>
                                    <span class="side-menu__label"><?php echo $dd['name'];?></span> 
                                    <?php
                                    if($dd['link']=='#'){
                                    ?>
                                    <i class="bx bx-lock side-menu__icon" style="margin-left:10px;"></i>
                                    <?php
                                    }
                                    ?>
                                  </a>
                            </li>
<?php
}
}
                         
?>
                            
                          <li class="slide d-none d-xxl-block" id="logout-li">
                                <a href="logout.php" class="side-menu__item">
                                    
                                   <i class="ti ti-logout side-menu__icon"></i>
                                    <span class="side-menu__label">Logout</span>
                                </a>
                            </li>
                            
<li class="slide dropdown d-none" id="more-menu">
  <a href="javascript:void(0);" class="side-menu__item dropdown-toggle" data-bs-toggle="dropdown">
    <i class="bx bx-dots-horizontal-rounded side-menu__icon"></i>
    <span class="side-menu__label">More</span>
  </a>
  <ul class="dropdown-menu">
      <?php
       $ss=mysqli_query($host,"select * from feature where name!='Dashboard' and status in (1,2,6,7,11) order by status asc");
       while($dd=mysqli_fetch_array($ss)){
    ?>
    <li><a class="dropdown-item" href="<?php echo $dd['link'];?>" <?php if($dd['status']=='6'){echo "target='_blank'; ";} echo "id='".$dd['ids']."-2'";?> ><?php echo $dd['name'];?></a></li>
    <?php } ?>
     <li><a class="dropdown-item" href="logout.php">Logout</a></li>
  </ul>
</li>
 
                            
                        </ul>
                        <div class="slide-right" id="slide-right" style="display:block !important;padding-top: 2px;background-color:transparent !important;border-color:transparent !important;">
                             <a href="javascript:void(0);" class="header-link" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="me-sm-2 me-0">
                                        <img src="build/assets/images/faces/9.jpg" alt="img" width="32" height="32" class="rounded-circle">
                                    </div>
                                    <div class="d-sm-block d-none">
                                        <p class="fw-semibold mb-0 lh-1" style="color:#fff;"><?php  echo $data['name']; ?></p>
                                        <!--<span class="op-7 fw-normal d-block fs-11">Admin Dashboard</span>-->
                                    </div>
                                </div>
                            </a>
                            <!-- End::header-link|dropdown-toggle -->
                            <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                                <li><a class="dropdown-item d-flex" href="change_password.php"><i class="ti ti-lock fs-18 me-2 op-7"></i>Change Password</a></li>
                                <li><a class="dropdown-item d-flex" href="logout.php"><i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a></li>
                            </ul>
                            </div>
                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->

            </aside>
<script>
     $(".has-sub").click(function (){
         $(this).toggleClass("open");
         $(".slide-menu.child1").toggleClass("opens");
     });
</script>
<style>
    .modal-header, .offcanvas-header {
    background: #d7e2ff !important;
}
.modal-content {
    background-color: #f1f1f1 !important;
}

#onboarding-li-2, #company-li-2{display:none;}

@media (max-width: 1575px) {
  #team-li, #billing-li, #logout-li , #reports-li{ display: none !important; }
  #more-menu { display: block !important; }
}

/* Additional hide at 1190px */
@media (max-width: 1301px) {
  #onboarding-li, #company-li , #reports-li{ display: none !important; }
  #onboarding-li-2 ,#company-li-2, #reports-li{display:block  !important;}
}
</style>