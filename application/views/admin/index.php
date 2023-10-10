<?php $this->load->view('layouts/header_admin'); ?>
<?php $this->load->view('layouts/sidebar_admin'); ?>

<!-- <?php if ($this->session->userdata('id_user_level') == '1') : ?>
<?php endif; ?> -->

<div class="mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-4 col-sm-6">
            <a href="<?= base_url('Kriteria'); ?>">
                <div class="card border-left-info shadow h-75 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="text-secondary text-decoration-none">Kriteria</div>
                                </div>
                            </div>
                            <div class="float-end mt-3">
                                <i class="bi bi-clipboard-data text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('Sub_Kriteria'); ?>">
                <div class="card border-left-primary shadow h-75 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="text-secondary text-decoration-none">Sub Kriteria</div>
                                </div>
                            </div>
                            <div class="float-end mt-3">
                                <i class="bi bi-clipboard-data text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('Alternatif'); ?>">
                <div class="card border-left-success shadow h-75 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="text-secondary text-decoration-none">Alternatif</div>
                                </div>
                            </div>
                            <div class="float-end mt-3 text-decoration-none">
                                <i class="bi bi-person-lines-fill text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('Penilaian'); ?>">
                <div class="card border-left-secondary shadow h-75 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="text-secondary text-decoration-none">Penilaian</div>
                                </div>
                            </div>
                            <div class="float-end mt-3 text-decoration-none">
                                <i class="bi bi-clipboard-check text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('Perhitungan'); ?>">
                <div class="card border-left-warning shadow h-75 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="text-secondary text-decoration-none">Perhitungan</div>
                                </div>
                            </div>
                            <div class="float-end mt-3">
                                <i class="bi bi-calculator text-decoration-none text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('Perhitungan/hasil'); ?>">
                <div class="card border-left-danger shadow h-75 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="text-secondary text-decoration-none">Hasil Akhir</div>
                                </div>
                            </div>
                            <div class="float-end mt-3">
                                <i class="bi bi-layout-text-window-reverse text-decoration-none text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php if ($this->session->userdata('id_user_level') == '2') : ?>
<div class="mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Selamat datang <span class="text-uppercase"><b><?= $this->session->username; ?>!</b></span> Anda bisa
        mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
    </div>
    <div class="row">

        <div class="col-xl-4 col-md-6">
            <div class="card border-left-info shadow h-75 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Login/home'); ?>"
                                    class="text-secondary text-decoration-none">Dashboard</a></div>
                        </div>
                        <div class="float-end mt-3">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card border-left-primary shadow h-75 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                    href="<?= base_url('Perhitungan/hasil'); ?>"
                                    class="text-secondary text-decoration-none">Data Hasil Akhir</a></div>
                        </div>
                        <div class="float-end mt-3">
                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Profile'); ?>"
                                    class="text-secondary text-decoration-none">Data Profile</a></div>
                        </div>
                        <div class="float-end mt-3">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $this->load->view('layouts/footer_admin'); ?>