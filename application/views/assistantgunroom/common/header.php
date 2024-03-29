<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gunroom & Mess System</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
    .dot {
        height: 25px;
        width: 25px;
        background-color: red;
        border-radius: 50%;
        display: inline-block !important;
    }

    span {
        color: black;
        font-size: 15px !important;
    }

    .fas {
        color: black !important;
        font-size: 15px !important
    }

    .img-logo {
        background: url('<?= base_url() ?>assets/img/logo-inverted.png');
        /* background-position: center; */
        background-size: cover;
        height: 50px;
        width: 39px;
        /* filter: blur(1px); */
        /* border-radius: 25px; */
    }



    .sidebar-brand-text {
        color: black !important;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text">GUNROOM & MESS SYSTEM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>AssistantGunroom">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>AssistantGunroom/add_users" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Create New User</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>AssistantGunroom/show_room_allocation_list" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-align-justify"></i>
                    <span>Room Allocation List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>AssistantGunroom/show_gunrooms_list" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Gunroom Data</span>
                </a>
            </li>

            <?php $unseen_complaints = $this->db->where('seen', 'no')->where('account_type', 'gunroom')->from('complaints')->count_all_results(); ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>AssistantGunroom/complaint" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-comments"></i>
                    <span>Complaints</span>
                    <?php if ($unseen_complaints != '0') { ?>
                        <span class="dot">&nbsp;&nbsp;<?= $unseen_complaints; ?></span>
                    <?php } ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>AssistantGunroom/allocate_rooms" aria-expanded="true">
                    <i class="fas fa-hotel"></i>
                    <span> Room Allocations </span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>AssistantGunroom/update_menu" aria-expanded="true">
                    <i class="fas fa-hotel"></i>
                    <span> Update Mess Menu </span>
                </a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>AssistantGunroom/add_new_gunroom" aria-expanded="true">
                    <i class="fas fa-folder-plus"></i>
                    <span> Add New Gunroom </span>
                </a>
            </li>


            <br>


            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-custom2">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-custom1 topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <div class="img-logo"></div>
                            </div>
                            <div class="col-sm-10">
                                <h5 style="color:black;"> <strong>GUNROOM & MESS SYSTEM</strong></h5>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle text-dark-500" type="button" onclick="location.href='<?php echo base_url(); ?>Project_Officer'"> Home </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" type="button" onclick="location.href='<?php echo base_url(); ?>Project_Officer/services'">Services </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" type="button" onclick="location.href='<?php echo base_url(); ?>Project_Officer/about'">About </a>
                        </li> -->

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1" id="notifications">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div style="padding:10px"><b>No New Notifications
                                        </b></div>
                                </a>

                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1" id="notification">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>

                                <span class=""></span>
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Chat Corner
                                </h6>

                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div>
                                        <div style="padding:10px"><b>No New Messages
                                            </b></div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-black small"><?php echo $this->session->userdata('username'); ?></span>
                                <span id="user_id" style="display:none"><?php echo $this->session->userdata('user_id'); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!--     <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->