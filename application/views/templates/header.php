<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/assets/images/favicon.svg" type="image/x-icon">


    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/simple-datatables/style.css">

    <style>
        .dataTable-top {
            display: flex;
            justify-content: space-between;
        }

        .dataTable-dropdown {
            display: flex;
            width: 50%;
            justify-content: flex-start;
            align-items: center;
        }

        select.dataTable-selector.form-select {
            width: 20%;
            margin-right: 10px;
        }

        .dataTable-table th a {
            text-decoration: none;
            color: inherit;
        }

        .table>:not(caption)>*>* {
            padding: 10px
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a.sidebar.active {
            color: #053382 !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header d-flex">
                    <img class="" src="<?= base_url(); ?>assets/logo/icon_new_nppg.png" alt="Logo">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- <li class='sidebar-title'>Main Menu</li> -->
                        <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                            <a href="<?= base_url(); ?>dashboard" class='sidebar-link'>
                                <i data-feather="monitor" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'investor') ? 'active' : ''; ?>">
                            <a href="<?= base_url('investor'); ?>" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Data Investor</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'investasi') ? 'active' : ''; ?>">
                            <a href="<?= base_url('investasi'); ?>" class='sidebar-link'>
                                <i data-feather="server" width="20"></i>
                                <span>Data Investasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'belanja') ? 'active' : ''; ?>">
                            <a href="<?= base_url('belanja'); ?>" class='sidebar-link'>
                                <i data-feather="shopping-bag" width="20"></i>
                                <span>Data Belanja Produk</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'penjualan') ? 'active' : ''; ?>">
                            <a href="<?= base_url('penjualan'); ?>" class='sidebar-link'>
                                <i data-feather="bar-chart" width="20"></i>
                                <span>Data Penjualan</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <?php if ($this->session->userdata('photo') == '') : ?>
                                        <img src="<?php echo base_url(); ?>assets/logo/icon_new_nppg.png" class="user-image" alt="user photo">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $this->session->userdata('photo'); ?>" class="user-image" alt="user photo">
                                    <?php endif; ?>

                                </div>
                                <span class="d-none d-md-block d-lg-inline-block"><?php echo $this->session->userdata('full_name'); ?></span>
                                <!-- <div class="">Hi, Saugi</div> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?php echo base_url(); ?>profil" class="btn btn-default btn-flat"><i data-feather="eye"></i> Profil</a>
                                <a href="<?php echo base_url(); ?>auth/logout" class="btn btn-default btn-flat"><i data-feather="log-out"></i> Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- Modal -->
            <div class="modal fade" id="profilPerusahaanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profilPerusahaanModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profilPerusahaanModalLabel">DATA PERUSAHAAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>