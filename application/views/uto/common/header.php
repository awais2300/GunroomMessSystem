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
    .numberCircle {
    border-radius: 50%;
    width: 20px;
    height: 20px;
    padding: 8px;
    margin-left:25px;

    background: red;
    border: 2px solid #666;
    color: white;
    text-align: center;

    font: 20px Arial, sans-serif;
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
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?><?php echo 'Project_Officer';?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text">GUNROOM & MESS SYSTEM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>UTO">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Features
            </div> -->
            <!-- Nav Item - Pages Collapse Menu -->
            <?php if($this->session->userdata('login_type')=='gunroom'){?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/gunroom1" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-hotel"></i>
                    <span> Gunroom 1 </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/gunroom2" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-hotel"></i>
                    <span> Gunroom 2 </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/gunroom3" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-hotel"></i>
                    <span> Gunroom 3 </span>
                </a>
            </li>
            <?php $unseen_complaints= $this->db->where('name',$this->session->userdata('username'))->where('seen','no')->where('type',$this->session->userdata('login_type'))->from('complaints')->count_all_results(); 

            ?>
           
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/complaint" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-tasks"></i>
                    <span> Complaints </span>
                    <?php if($unseen_complaints != '0'){ ?>
                    <span class="numberCircle"><?=  $unseen_complaints; ?></span>
                    <?php } ?>
                </a>
            </li>
            <?php }else if($this->session->userdata('login_type')=='mess'){ ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/guest_reservation" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-hotel"></i>
                    <span> Guest Reservation </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/requesting_menu" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-list"></i>
                    <span> Requesting Menu </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>UTO/complaint" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-tasks"></i>
                    <span> Complaints </span>
                </a>
            </li>

                <?php } ?>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>Project_Officer/view_activity_log" aria-expanded="true">
                    <i style="font-size:20px" class="far fa-list-alt"></i>
                    <span> Weapon Allocation log </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>User_Login/edit_profile" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-user-edit"></i>
                    <span> Edit Profile </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url(); ?>User_Login/change_password" aria-expanded="true">
                    <i style="font-size:20px" class="fas fa-unlock-alt"></i>
                    <span> Change Password </span>
                </a>
            </li> -->
            
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
                                <h5 style="color:white;"> <strong>GUNROOM & MESS SYSTEM</strong></h5>
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
                        <!-- <li class="nav-item dropdown no-arrow mx-1" id="notification">
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
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('username'); ?></span>
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