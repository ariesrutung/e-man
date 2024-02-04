<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Finance</title>
    <link rel="icon" href="<?= base_url(); ?>template/img/logo.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url(); ?>template/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/morris/morris.css">

    <link rel="stylesheet" href="<?= base_url(); ?>template/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>template/css/metisMenu.css">

    <link rel="stylesheet" href="<?= base_url(); ?>template/css/style1.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>template/css/colors/default.css" id="colorSkinCSS">

    <style>
        a.active {
            background-color: #ecf0f6 !important;
            border-radius: 0 50px 50px 0 !important;
            font-weight: bold !important;
        }

        #group>a {
            pointer-events: none !important;
        }

        #modalDetailInvestasi p {
            font-size: 14px;
            color: #828bb2;
        }

        #modalDetailInvestasi td:nth-child(2) {
            padding: 0.75rem 0;
        }
    </style>
</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="<?= base_url(); ?>dashboard"><img class="w-50" src="<?= base_url(); ?>template/img/icon_new_nppg.png" alt></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>" href="<?= base_url(); ?>dashboard">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/dasbor.svg" alt>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>" href="<?= base_url(); ?>profil">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/company.svg" alt>
                    <span>Data Perusahaan</span>
                </a>
            </li>
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'investor') ? 'active' : ''; ?>" href="<?= base_url(); ?>investor">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/investor.svg" alt>
                    <span>Data Investor</span>
                </a>
            </li>
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'investasi') ? 'active' : ''; ?>" href="<?= base_url(); ?>investasi">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/invest.svg" alt>
                    <span>Data Investasi</span>
                </a>
            </li>
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'belanja') ? 'active' : ''; ?>" href="<?= base_url(); ?>belanja">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/belanja.svg" alt>
                    <span>Data Belanja</span>
                </a>
            </li>
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'penjualan') ? 'active' : ''; ?>" href="<?= base_url(); ?>penjualan">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/penjualan.svg" alt>
                    <span>Data Penjualan</span>
                </a>
            </li>
            <li>
                <a class="<?php echo ($this->uri->segment(1) == 'auth') ? 'active' : ''; ?>" href="<?= base_url(); ?>auth">
                    <img class="w-75" src="<?= base_url(); ?>template/img/menu-icon/users.svg" alt>
                    <span>Pengelola Aplikasi</span>
                </a>
            </li>
        </ul>
    </nav>


    <section class="main_content dashboard_part">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button type="submit"> <img src="<?= base_url(); ?>template/img/icon/icon_search.svg"> </button>
                                </form>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a href="#"> <img src="<?= base_url(); ?>template/img/icon/bell.svg"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="<?= base_url(); ?>template/img/icon/msg.svg"> </a>
                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="<?= base_url(); ?>template/img/client_img.png">
                                <div class="profile_info_iner">
                                    <p>Welcome <?= $this->session->userdata('username'); ?>!</p>
                                    <h5><?= $this->session->userdata('identity'); ?></h5>
                                    <div class="profile_info_details">
                                        <!-- <a href="#">My Profile <i class="ti-user"></i></a>
                                        <a href="#">Settings <i class="ti-settings"></i></a> -->
                                        <a href="<?= base_url(); ?>auth/logout">Log Out <i class="ti-shift-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>