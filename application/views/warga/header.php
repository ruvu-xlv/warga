<!--
=========================================================
* Material Kit 3 - v3.1.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/materialKit/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/materialKit/assets/img/favicon.png">

    <title>
<?php echo $website->title ?>    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />

    <!-- Nucleo Icons -->
    <link href="<?php echo base_url() ?>assets/materialKit/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/materialKit/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- CSS Files -->



    <link id="pagestyle" href="<?php echo base_url() ?>assets/materialKit/assets/css/material-kit.css?v=3.1.0" rel="stylesheet" />


</head>

<body class="index-page bg-gray-200">


   <!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 p-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <a class="navbar-brand font-weight-bolder ms-sm-3 text-sm" href="<?php echo base_url() ?>" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
                        Ruvu Apps
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="navbar-nav mx-auto"> <!-- Changed from ms-auto to mx-auto to center the menu -->
                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-symbols-rounded opacity-6 me-2 text-md">dashboard</i>
                                    Menu
                                    <img src="<?php echo base_url() ?>assets/materialKit/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                                </a>
                                <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                                    <div class="d-none d-lg-block">
                                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                            Aplikasi
                                        </h6>
                                        <a href="<?php echo base_url('warga') ?>" class="dropdown-item border-radius-md">
                                            <span>Dashboard</span>
                                        </a>
                                        <a href="<?php echo base_url('warga/pengaduan') ?>" class="dropdown-item border-radius-md">
                                            <span>Pengaduan</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-symbols-rounded opacity-6 me-2 text-md">info</i>
                                    Informasi
                                    <img src="<?php echo base_url() ?>assets/materialKit/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                                    <div class="d-none d-lg-block">
                                        <li class="nav-item">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo base_url('informasi') ?>">
                                                <div class="w-100 d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Berita</h6>
                                                        <span class="text-sm">Informasi terbaru</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo base_url('informasi/kegiatan') ?>">
                                                <div class="w-100 d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Kegiatan</h6>
                                                        <span class="text-sm">Agenda warga</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto"> <!-- Keep the user menu on the right -->
                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-symbols-rounded opacity-6 me-2 text-md">person</i>
                                    <?php echo $this->session->userdata('username') ?>
                                    <img src="<?php echo base_url() ?>assets/materialKit/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg" aria-labelledby="dropdownMenuDocs">
                                    <div class="d-none d-lg-block">
                                        <ul class="list-group">
                                            <li class="nav-item list-group-item border-0 p-0">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo base_url('warga/profil') ?>">
                                                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Profil Saya</h6>
                                                </a>
                                            </li>
                                            <li class="nav-item list-group-item border-0 p-0">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="<?php echo base_url() . 'warga/keluar' ?>">
                                                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Keluar</h6>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>

