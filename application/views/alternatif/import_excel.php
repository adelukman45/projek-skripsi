<?php $this->load->view('layouts/header_admin'); ?>
<?php $this->load->view('layouts/sidebar_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-person-lines-fill"></i> Import Data Alternatif</h1>

    <a href="<?= base_url('Alternatif/create'); ?>" class="btn btn-success"> <span class="bi bi-plus">Tambah</span></a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="col-6">
            <h6 class="m-0 font-weight-bold mb-3"><i class="bi bi-file-spreadsheet"></i> Upload File Excel Data
                Alternatif
            </h6>
        </div>

        <div class="card-body">
            <form method="POST" action="<?= site_url('alternatif/excel') ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-form-label text-md-left">Upload File</label>
                                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                    <div class="mt-1">
                                        <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                    </div>
                                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="form-group mb-0">
                        <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php $this->load->view('layouts/footer_admin'); ?>