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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand fs-4" href="#" style="color: #012970;">Penentuan Penerima Bantuan
                        Sosial</a>
                </div>

            </nav>
        </div>

        <div class="container col-xxl-8 px-4">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?= base_url('assets/') ?>img/home.png" class="d-block mx-lg-auto img-fluid" width="700"
                        height="500" loading="lazy">
                </div>
                <div class="col-lg-6">

                    <h1 class="display-5 fw-bold lh-1 mb-3">Penerima Bantuan Sosial</h1>
                    <h1 class="display-3 fw-bold lh-1 mb-3" style="color: #012970;">Desa Sekarwangi</h1>
                    <p class="lead text-muted">Nama - nama warga desa Sekarwangi yang terdata menjadi penerima bantuan
                        sosial.
                        Untuk melihat perhitungan penentu penerima bantuan sosial silahkan login!</p>
                    <a class="btn btn-primary col-12" href="<?= base_url('login'); ?>" role="button">Login</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="card shadow mb-4">
                <!-- /.card-header -->
                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold mb-3"><i class="bi bi-table"></i> Daftar Nama Penerima Bantuan
                        Sosial</h6>



                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Penerima</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Rank</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                    $no = 1;
                                    foreach ($hasil as $keys) : ?>
                                    <?php if ($keys->nilai >= 3.6) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>

                                        <?php if ($keys !== NULL) { ?>
                                        <td>
                                            <?php
                                                        $nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
                                                        echo $nama_alternatif['nama'];
                                                        ?>

                                        </td>
                                        <td class="text-center"><?= number_format($keys->nilai, 2, '.', '.'); ?></td>
                                        <td class="text-center"><?= $no; ?></td>
                                        <?php } else { ?>
                                        <td class="text-center text-muted py-3" colspan="3">Data Kosong</td>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php
                                        $no++;
                                    endforeach
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <footer class="footer">
            <div class="copyright">
                &copy; <strong><span><?php echo (int)date('Y'); ?></span></strong>.
            </div>
            <div class="credits">
                All Rights Reserved
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

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