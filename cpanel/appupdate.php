<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="KAiZEN  KCC Card community System - App Update">
        <meta name="Author" content="KAiZEN  KCC Card community System - App Update">
        <meta name="keywords" content="KAiZEN  KCC Card community System - App Update">
        
        <!-- TITLE -->
		<title> KAiZEN  KCC Card community System - App Update</title>

        <!-- FAVICON -->
        <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="build/assets/icon-fonts/icons.css" rel="stylesheet">
        
        <!-- APP SCSS -->
        <link rel="preload" as="style" href="build/assets/app-fce3f544.css" /><link rel="stylesheet" href="build/assets/app-fce3f544.css" />

        <!-- NODE WAVES CSS -->
        <link href="build/assets/libs/node-waves/waves.min.css" rel="stylesheet"> 

        <!-- SIMPLEBAR CSS -->
        <link rel="stylesheet" href="build/assets/libs/simplebar/simplebar.min.css">

        <!-- COLOR PICKER CSS -->
        <link rel="stylesheet" href="build/assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="build/assets/libs/%40simonwep/pickr/themes/nano.min.css">

        <!-- CHOICES CSS -->
        <link rel="stylesheet" href="build/assets/libs/choices.js/public/assets/styles/choices.min.css">

        <!-- CHOICES JS -->
        <script src="build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

        <!-- MAIN JS -->
        <script src="build/assets/main.js"></script>

         
        <!-- QUILL CSS -->
        <link rel="stylesheet" href="build/assets/libs/quill/quill.snow.css">
        <link rel="stylesheet" href="build/assets/libs/quill/quill.bubble.css">

        <!-- FILEPOND CSS -->
        <link rel="stylesheet" href="build/assets/libs/filepond/filepond.min.css">
        <link rel="stylesheet" href="build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
        <link rel="stylesheet" href="build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">

        <!-- DATE & TIME PICKER CSS -->
        <link rel="stylesheet" href="build/assets/libs/flatpickr/flatpickr.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


<style>
    
 
table.dataTable thead > tr > th.dt-orderable-asc:hover, table.dataTable thead > tr > th.dt-orderable-desc:hover, table.dataTable thead > tr > td.dt-orderable-asc:hover, table.dataTable thead > tr > td.dt-orderable-desc:hover {
    outline: 0px solid rgba(0, 0, 0, 0.05);
    outline-offset: -2px;
}
table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
    text-align: start;
}

   
    .log-btn {
         width: auto;
    height: 30px;
    text-align: left;
    float: left;
    margin-left: 5px;
    margin-top: 3px;
    border: 1px solid #ccc;
    border-radius: 5px;
    line-height: 22px;
    background: #fff;
    font-size: 13px;
    text-indent: 10px;
    cursor: pointer;
    padding: 3px 5px;
         }

       .radi {
       display: block !important;
    opacity: 1 !important;
    height: 12px !important;
    float: left;
    padding: 0px !important;
    width: 16px;
    margin-top: 6px!important; 
    margin-left: 1px!important;
    position: relative !important;
         }

         .modal-footer {
    padding: 4px 4px;
    border-block-start: 1px solid #f3f3f3; 
    margin-top: 21px;
}


.swal2-container {
    display: flex;
    position: fixed;
    z-index: 999999;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 0.625em;
    overflow-x: hidden;
    transition: background-color .1s;
    -webkit-overflow-scrolling: touch;
}


    .dropdown {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .options {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 140px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 99;
    }

    .option {
        padding: 12px 16px;
        cursor: pointer;
    }

    .option:hover {
        background-color: #ddd;
    }
</style>

	</head>

	<body>

        <!-- SWITCHER -->

        <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
                
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="border-bottom border-block-end-dashed">
                        <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                            <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab" data-bs-target="#switcher-home"
                                type="button" role="tab" aria-controls="switcher-home" aria-selected="true">Theme Styles</button>
                            <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab" data-bs-target="#switcher-profile"
                                type="button" role="tab" aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel" aria-labelledby="switcher-home-tab"
                            tabindex="0">
                            <div class="">
                                <p class="switcher-style-head">Theme Color Mode:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-light-theme">
                                                Light
                                            </label>
                                            <input class="form-check-input" type="radio" name="theme-style" id="switcher-light-theme"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-dark-theme">
                                                Dark
                                            </label>
                                            <input class="form-check-input" type="radio" name="theme-style" id="switcher-dark-theme">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Directions:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-ltr">
                                                LTR
                                            </label>
                                            <input class="form-check-input" type="radio" name="direction" id="switcher-ltr" checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-rtl">
                                                RTL
                                            </label>
                                            <input class="form-check-input" type="radio" name="direction" id="switcher-rtl">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Navigation Styles:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-vertical">
                                                Vertical
                                            </label>
                                            <input class="form-check-input" type="radio" name="navigation-style" id="switcher-vertical"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-horizontal">
                                                Horizontal
                                            </label>
                                            <input class="form-check-input" type="radio" name="navigation-style"
                                                id="switcher-horizontal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="navigation-menu-styles">
                                <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                                <div class="row switcher-style gx-0 pb-2 gy-2">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-menu-click">
                                                Menu Click
                                            </label>
                                            <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                                id="switcher-menu-click">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-menu-hover">
                                                Menu Hover
                                            </label>
                                            <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                                id="switcher-menu-hover">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-icon-click">
                                                Icon Click
                                            </label>
                                            <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                                id="switcher-icon-click">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-icon-hover">
                                                Icon Hover
                                            </label>
                                            <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                                id="switcher-icon-hover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidemenu-layout-styles">
                                <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                                <div class="row switcher-style gx-0 pb-2 gy-2">
                                    <div class="col-sm-6">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-default-menu">
                                                Default Menu
                                            </label>
                                            <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                                id="switcher-default-menu" checked>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-closed-menu">
                                                Closed Menu
                                            </label>
                                            <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                                id="switcher-closed-menu">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-icontext-menu">
                                                Icon Text
                                            </label>
                                            <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                                id="switcher-icontext-menu">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-icon-overlay">
                                                Icon Overlay
                                            </label>
                                            <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                                id="switcher-icon-overlay">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-detached">
                                                Detached
                                            </label>
                                            <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                                id="switcher-detached">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-double-menu">
                                                Double Menu
                                            </label>
                                            <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                                id="switcher-double-menu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Page Styles:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-regular">
                                                Regular
                                            </label>
                                            <input class="form-check-input" type="radio" name="page-styles" id="switcher-regular"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-classic">
                                                Classic
                                            </label>
                                            <input class="form-check-input" type="radio" name="page-styles" id="switcher-classic">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-modern">
                                                Modern
                                            </label>
                                            <input class="form-check-input" type="radio" name="page-styles" id="switcher-modern">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Layout Width Styles:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-full-width">
                                                Full Width
                                            </label>
                                            <input class="form-check-input" type="radio" name="layout-width" id="switcher-full-width"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-boxed">
                                                Boxed
                                            </label>
                                            <input class="form-check-input" type="radio" name="layout-width" id="switcher-boxed">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Menu Positions:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-menu-fixed">
                                                Fixed
                                            </label>
                                            <input class="form-check-input" type="radio" name="menu-positions" id="switcher-menu-fixed"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-menu-scroll">
                                                Scrollable
                                            </label>
                                            <input class="form-check-input" type="radio" name="menu-positions" id="switcher-menu-scroll">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Header Positions:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-header-fixed">
                                                Fixed
                                            </label>
                                            <input class="form-check-input" type="radio" name="header-positions"
                                                id="switcher-header-fixed" checked>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-header-scroll">
                                                Scrollable
                                            </label>
                                            <input class="form-check-input" type="radio" name="header-positions"
                                                id="switcher-header-scroll">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="switcher-style-head">Loader:</p>
                                <div class="row switcher-style gx-0">
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-loader-enable">
                                                Enable
                                            </label>
                                            <input class="form-check-input" type="radio" name="page-loader"
                                                id="switcher-loader-enable">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check switch-select">
                                            <label class="form-check-label" for="switcher-loader-disable">
                                                Disable
                                            </label>
                                            <input class="form-check-input" type="radio" name="page-loader"
                                                id="switcher-loader-disable" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel" aria-labelledby="switcher-profile-tab" tabindex="0">
                            <div>
                                <div class="theme-colors">
                                    <p class="switcher-style-head">Menu Colors:</p>
                                    <div class="d-flex switcher-style pb-2">
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                                id="switcher-menu-light">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                                id="switcher-menu-dark" checked>
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                                id="switcher-menu-primary">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Gradient Menu" type="radio" name="menu-colors"
                                                id="switcher-menu-gradient">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-transparent"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                                type="radio" name="menu-colors" id="switcher-menu-transparent">
                                        </div>
                                    </div>
                                    <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically change from below Theme Primary color picker</div>
                                </div>
                                <div class="theme-colors">
                                    <p class="switcher-style-head">Header Colors:</p>
                                    <div class="d-flex switcher-style pb-2">
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Light Header" type="radio" name="header-colors"
                                                id="switcher-header-light" checked>
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Dark Header" type="radio" name="header-colors"
                                                id="switcher-header-dark">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Color Header" type="radio" name="header-colors"
                                                id="switcher-header-primary">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Gradient Header" type="radio" name="header-colors"
                                                id="switcher-header-gradient">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Transparent Header" type="radio" name="header-colors"
                                                id="switcher-header-transparent">
                                        </div>
                                    </div>
                                    <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically change from below Theme Primary color picker</div>
                                </div>
                                <div class="theme-colors">
                                    <p class="switcher-style-head">Theme Primary:</p>
                                    <div class="d-flex flex-wrap align-items-center switcher-style">
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary-1" type="radio"
                                                name="theme-primary" id="switcher-primary">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary-2" type="radio"
                                                name="theme-primary" id="switcher-primary1">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary-3" type="radio" name="theme-primary"
                                                id="switcher-primary2">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary-4" type="radio" name="theme-primary"
                                                id="switcher-primary3">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-primary-5" type="radio" name="theme-primary"
                                                id="switcher-primary4">
                                        </div>
                                        <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                            <div class="theme-container-primary"></div>
                                            <div class="pickr-container-primary"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="theme-colors">
                                    <p class="switcher-style-head">Theme Background:</p>
                                    <div class="d-flex flex-wrap align-items-center switcher-style">
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-bg-1" type="radio"
                                                name="theme-background" id="switcher-background">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-bg-2" type="radio"
                                                name="theme-background" id="switcher-background1">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-bg-3" type="radio" name="theme-background"
                                                id="switcher-background2">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-bg-4" type="radio"
                                                name="theme-background" id="switcher-background3">
                                        </div>
                                        <div class="form-check switch-select me-3">
                                            <input class="form-check-input color-input color-bg-5" type="radio"
                                                name="theme-background" id="switcher-background4">
                                        </div>
                                        <div class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                            <div class="theme-container-background"></div>
                                            <div class="pickr-container-background"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-image mb-3">
                                    <p class="switcher-style-head">Menu With Background Image:</p>
                                    <div class="d-flex flex-wrap align-items-center switcher-style">
                                        <div class="form-check switch-select m-2">
                                            <input class="form-check-input bgimage-input bg-img1" type="radio"
                                                name="theme-background" id="switcher-bg-img">
                                        </div>
                                        <div class="form-check switch-select m-2">
                                            <input class="form-check-input bgimage-input bg-img2" type="radio"
                                                name="theme-background" id="switcher-bg-img1">
                                        </div>
                                        <div class="form-check switch-select m-2">
                                            <input class="form-check-input bgimage-input bg-img3" type="radio" name="theme-background"
                                                id="switcher-bg-img2">
                                        </div>
                                        <div class="form-check switch-select m-2">
                                            <input class="form-check-input bgimage-input bg-img4" type="radio"
                                                name="theme-background" id="switcher-bg-img3">
                                        </div>
                                        <div class="form-check switch-select m-2">
                                            <input class="form-check-input bgimage-input bg-img5" type="radio"
                                                name="theme-background" id="switcher-bg-img4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between canvas-footer flex-wrap"> 
                            <a href="https://themeforest.net/item/ynex-laravel-admin-panel-template/48397579" class="btn btn-primary m-1" target="_blank">Buy Now</a> 
                            <a href="https://themeforest.net/user/spruko/portfolio" class="btn btn-secondary m-1" target="_blank">Our Portfolio</a> 
                            <a href="javascript:void(0);" id="reset-all" class="btn btn-danger m-1">Reset</a> 
                        </div>
                    </div>
                </div>
            </div>
        <!-- END SWITCHER -->

        <!-- LOADER -->
		<div id="loader">
			<img src="build/assets/images/media/loader.svg" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

            <!-- HEADER -->
          <?php include 'header.php';  ?>
            <!-- END HEADER -->

            <!-- SIDEBAR -->
          <?php include 'sidebar.php';  ?>
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content">

                
                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">App Update</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">App Update</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close --> 

                 

            <span id="mistable"> 
                <?php 
   $s1=mysqli_query($host,"select * from offers");  
   $r=mysqli_num_rows($s1); 
   if($r>0){   ?>
<div class="row">
   <div class="card custom-card" style="padding: 15px 25px;">
        	<div class="bbbb" style="display:flex;">

   		<div style="width: 50%;">
       <h4 class="text-blue h4">App Update</h4>
       </div>
       
       <div style="width: 50%;text-align: end;">
         <button type="button" class="btn btn-info" onclick="dailyupt(0);">ADD App Update</button>
        </div>
         </div>
      <div class="card-body">
         <table id="example" class="table table-hover" style="width:100%">
            <thead>
               <tr>
                  <th>#</th> 
                  <th>Name</th>
                  <th>Description </th> 
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
         <tbody>
    <?php while ($d1 = mysqli_fetch_array($s1)) { ?>
        <tr>
            <td class="table-plus"><?php echo ++$x; ?></td> 
            <td><?php echo $d1['title']; ?></td>
            <td><?php echo $d1['description']; ?></td> 
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
<?php } ?>
            </span>

            <span id="output1"></span>


                </div>


            </div> 
            <!-- END MAIN-CONTENT --> 



            <!-- FOOTER -->
            <?php include 'footer.php';  ?>
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->

        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
                <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
 
        <!-- DATE & TIME PICKER JS -->
        <script src="build/assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 

           <!-- CUSTOM-SWITCHER JS --> 
        <script type="module" src="build/assets/custom-switcher-383b6a5b.js"></script>

        <!-- QUILL EDITOR JS -->
        <script src="build/assets/libs/quill/quill.min.js"></script>

        <!-- FILEPOND JS -->
        <script src="build/assets/libs/filepond/filepond.min.js"></script>  

        <!-- INTERNAL CREATE BLOG JS --> 
        <script type="module" src="build/assets/blog-create-8640480c.js"></script> 

        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

        <!-- END SCRIPTS -->

        <script> 
 

                var x;
               function dailyupt(x){  
               	 if(x==0)
                 {
                 x='';    
                 }
               $.ajax({
               url: "data/addupdate_form.php",
               type: "POST",
               data:{x:x},
               success: function(html){
               $("#output1").text('');
               $("#output1").prepend(html);
               
               },
               error: function(){}           
               });  
               }
 

    var a;
function deles(a){
$(document).ready(function(e){
var b=confirm("Are You Sure Do You Want to Delete ?");
if(b==true){
$.ajax({
type:"post",
url:"data/appupdate_data.php",
data:{id:a},
success:function(html){
$("#mistable").text("");  
$("#mistable").prepend(html);
}

});

}

});

}

        new DataTable('#example');
 
       function toggleDropdown(event) {
        var clickedRow = event.target.closest("tr");
        var dropdownOptions = clickedRow.querySelector(".options");
 
        var allOptions = document.querySelectorAll(".options");
        allOptions.forEach(function(option) {
            if (option !== dropdownOptions && option.style.display === "block") {
                option.style.display = "none";
            }
        });

        if (dropdownOptions.style.display === "block") {
            dropdownOptions.style.display = "none";
        } else {
            dropdownOptions.style.display = "block";
        }
    }


              var p;
              function cls(p){
              $("#"+p).css('display','none');
              $("#staticBackdrop1").css('display','block');
               }

        </script>

	</body> 
</html>
