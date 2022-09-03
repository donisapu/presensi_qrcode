<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("assets/admin/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("assets/admin/css/sb-admin-2.min.css"); ?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/admin/vendor/datatables/dataTables.bootstrap4.min.css"); ?>" rel="stylesheet">

    <script type="text/javascript">
        function check() {
            var x = document.getElementById("pwd");
            var x1 = document.getElementById("pwd1");


            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (x1.type === "password") {
                x1.type = "text";
            } else {
                x1.type = "password";
            }
        }
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-default sidebar sidebar-dark accordion" id="accordionSidebar" style="background: purple">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-list"></i>
                </div>
                <div class="sidebar-brand-text mx-3" > Presensi<br>QR-Code </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin/profil') ?>">
                    <i class="fas fa-fw fa-laptop"></i>
                    <span>Profil Website</span></a>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/administrator"); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Administrator</span></a>
            </li> -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/data_kelas"); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Data Kelas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/data_mapel"); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Mapel</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/data_mahasiswa"); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Mahasiswa</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/atur_mapel"); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Atur Mapel Kelas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/atur_jadwal"); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Atur Jadwal</span></a>
            </li>


            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("admin/laporan_absen"); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Absensi</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-black-600 small" style="color: black"><?= $this->session->userdata('username'); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url("assets/admin/img/undraw_profile.svg"); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= site_url('admin/gantipassword') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Update Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>