<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Warga - Data warga Mars</title>
  <meta
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    name="viewport" />
  <link
    rel="icon"
    href="<?php echo base_url() ?>assets/kaiadmin/assets/img/kaiadmin/favicon.ico"
    type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["<?php echo base_url() ?>assets/kaiadmin/assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/kaiadmin/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/kaiadmin/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/kaiadmin/assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/kaiadmin/assets/css/demo.css" />
</head>

<body>
  <div class="wrapper sidebar_minimize">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="<?php echo base_url() ?>admin" class="logo d-flex align-items-center text-decoration-none">
            <!-- <img src="<?php echo base_url() ?>assets/kaiadmin/assets/img/kaiadmin/logo_light.svg" 
         alt="Ruvu Apps Logo" 
         class="navbar-brand" 
         height="30"> -->
            <h4 class="m-0 text-light fw-semibold ms-2">Ruvu Apps</h4>
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <?php
            if ($this->session->userdata('role') == "admin") {
            ?>
              <li class="nav-item">
                <a
                  href="<?php echo base_url() . 'admin' ?>"
                  class="collapsed"
                  aria-expanded="false">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Main Navigation</h4>
              </li>
              <li class="nav-item">
                <a
                  href="<?php echo base_url() . 'admin/kartukeluarga' ?>"
                  class="collapsed">
                  <i class="far fa-newspaper"></i>
                  <p>Kartu Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="<?php echo base_url() . 'admin/warga' ?>"
                  class="collapsed">
                  <i class="fas fa-users"></i>
                  <p>Warga</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="<?php echo base_url() . 'admin/user' ?>"
                  class="collapsed">
                  <i class="fas fa-user-check"></i>
                  <p>Akun Terdaftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="<?php echo base_url() . 'admin/kegiatan' ?>"
                  class="collapsed">
                  <i class="far fa-calendar-alt"></i>
                  <p>Kegiatan</p>
                </a>
              </li>
              <!-- <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Settings</h4>
              </li> -->
              <!-- <li class="nav-item">
                <a
                  href="<?php echo base_url() . 'admin/website' ?>"
                  class="collapsed">
                  <i class="fas fa-globe"></i>
                  <p>Website</p>
                </a>
              </li> -->
            <?php
            }
            ?>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="<?php echo base_url() ?>assets/kaiadmin/assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav
          class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            <nav
              class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button type="submit" class="btn btn-search pe-1">
                    <i class="fa fa-search search-icon"></i>
                  </button>
                </div>
                <input
                  type="text"
                  placeholder="Search ..."
                  class="form-control" />
              </div>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li
                class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a
                  class="nav-link dropdown-toggle"
                  data-bs-toggle="dropdown"
                  href="#"
                  role="button"
                  aria-expanded="false"
                  aria-haspopup="true">
                  <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                  <form class="navbar-left navbar-form nav-search">
                    <div class="input-group">
                      <input
                        type="text"
                        placeholder="Search ..."
                        class="form-control" />
                    </div>
                  </form>
                </ul>
              </li>
              <li class="nav-item topbar-user dropdown hidden-caret">
                <a
                  class="dropdown-toggle profile-pic"
                  data-bs-toggle="dropdown"
                  href="#"
                  aria-expanded="false">
                  <div class="avatar-sm">
                    <img
                      src="<?php echo base_url() ?>assets/kaiadmin/assets/img/profile.jpg"
                      alt="..."
                      class="avatar-img rounded-circle" />
                  </div>
                  <span class="profile-username">
                    <span class="op-7">Hi,</span>
                    <span class="fw-bold"><?php echo $this->session->userdata('username') ?></span>
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                      <div class="user-box">
                        <div class="avatar-lg">
                          <img
                            src="<?php echo base_url() ?>assets/kaiadmin/assets/img/profile.jpg"
                            alt="image profile"
                            class="avatar-img rounded" />
                        </div>
                        <div class="u-text">
                          <h4><?php echo $this->session->userdata('nama') ?></h4>
                          <small>Hak akses : <?php echo $this->session->userdata('role') ?></small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Account Setting</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url() . 'admin/keluar' ?>">Logout</a>
                    </li>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>