
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
                                <a href="onboard_index.php" class="side-menu__item">
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li> 
                            <!-- End::slide -->

                        <li class="slide">
                                <a href="initiate.php" class="side-menu__item">
                                    <span class="side-menu__label">Initiate Onboarding</span></a>
                            </li>
                         <li class="slide">
                                <a href="boarding_report.php" class="side-menu__item">
                                    <span class="side-menu__label">Reports</span> 
                                  </a>
                            </li>
                            
                        <li class="slide">
                                <a href="ready.php" class="side-menu__item">
                                    <span class="side-menu__label">Ready for Onboarding</span> 
                                  </a>
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