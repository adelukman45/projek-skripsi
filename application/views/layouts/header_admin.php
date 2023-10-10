 <?php
    if ($this->session->status !== ('Logged')) {
        redirect('login');
    }
    ?>

 <div class="container-fluid">

     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="utf-8">
         <meta content="width=device-width, initial-scale=1.0" name="viewport">

         <title>Penentuan Bantuan Sosial</title>
         <meta content="" name="description">
         <meta content="" name="keywords">

         <!-- Favicons -->
         <!-- <link href="<?= base_url('assets/') ?>/img/favicon.png" rel="icon">
         <link href="<?= base_url('assets/') ?>/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

         <!-- Google Fonts -->
         <link href="https://fonts.gstatic.com" rel="preconnect">
         <link
             href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
             rel="stylesheet">

         <!-- Vendor CSS Files -->
         <link href="<?= base_url('assets/') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/vendor/quill/quill.snow.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/vendor/simple-datatables/style.css" rel="stylesheet">

         <!-- Template Main CSS File -->
         <link href="<?= base_url('assets/') ?>/css/style.css" rel="stylesheet">
         <link href="<?= base_url('assets/') ?>/img/lg.png" rel="icon">
     </head>

     <body>
         <!-- ======= Header ======= -->
         <header id="header" class="header fixed-top d-flex align-items-center">

             <div class="d-flex align-items-center justify-content-between">
                 <a href="<?= base_url('/'); ?>" class="d-flex align-items-center">
                     <img class="w-75" src="<?php echo base_url(); ?>assets/img/lg.png" alt="">
                 </a>
                 <a href="<?= base_url('/'); ?>" class="d-flex align-items-center">
                     <span class=" fw-bold fs-6 d-none d-lg-block" style="color:#012970;">Penentu Penerima BANSOS</span>
                 </a>
                 <i class="bi bi-list toggle-sidebar-btn"></i>
             </div><!-- End Logo -->


             <nav class="header-nav ms-auto">
                 <ul class="d-flex align-items-center">

                     <li class="nav-item dropdown pe-3">

                         <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                             data-bs-toggle="dropdown">
                             <img src="<?= base_url('assets/') ?>img/user.png" alt="Profile" class="rounded-circle">
                             <span class="d-none d-md-block dropdown-toggle ps-2">
                                 <?= $this->session->username; ?></span>
                         </a><!-- End Profile Iamge Icon -->

                         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                             <?php if ($this->session->userdata('id_user') == '1') : ?>
                             <li class="dropdown-header">
                                 <h6> <?= $this->session->nama; ?></h6>
                                 <span><?= $this->session->email; ?></span>
                             </li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>


                             <li>
                                 <a class="dropdown-item d-flex align-items-center" href="<?= base_url('Profile'); ?>">
                                     <i class="bi bi-person"></i>
                                     <span>Profil Saya</span>
                                 </a>
                             </li>

                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <?php endif; ?>


                             <li>
                                 <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"
                                     class="dropdown-item d-flex align-items-center w-100 border-0">
                                     <i class="bi bi-box-arrow-right"></i>
                                     <span>Keluar</span>
                                 </a>

                             </li>

                         </ul><!-- End Profile Dropdown Items -->
                     </li><!-- End Profile Nav -->

                 </ul>
             </nav><!-- End Icons Navigation -->

         </header><!-- End Header -->