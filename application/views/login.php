<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sistem Pendukung Keputusan Metode MFEP</title>

    <!-- Custom fonts for this template-->
    <!-- Favicons -->
    <!-- <link href="<?= base_url('assets/') ?>img/alcpw.png" rel="icon">
    <link href="<?= base_url('assets/') ?>img/alcp.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>/img/lg.png" rel="icon">


</head>

<body>
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="<?= base_url('assets/') ?>img/lg.png" alt="">
                                <span class="d-none d-lg-block">Penentu Penerima BANSOS</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-2 fs-4">Masuk Ke Akun Anda</h5>
                                        <!-- <p class="text-center small">Masukan username & password untuk masuk</p> -->
                                        <?php $error = $this->session->flashdata('message');
                                        if ($error) { ?>
                                            <div class="alert alert-danger alert-dismissable" role="alert">
                                                <span><?php echo $error; ?></span>
                                                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate action="<?php echo site_url('Login/login'); ?>" method="post">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Mohon masukan username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Mohon masukan password!</div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <a type="button" class="col-lg badge text-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-exclamation-circle"></i> Klik Untuk Informasi Login User
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi
                                                            Login User
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <p>Username</p>
                                                                <p>Password</p>
                                                            </div>
                                                            <div class="col-1">
                                                                <p>:</p>
                                                                <p>:</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="text-muted">user</p>
                                                                <p class="text-muted">user</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/') ?>vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/quill/quill.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/') ?>js/main.js"></script>

</body>

</html>