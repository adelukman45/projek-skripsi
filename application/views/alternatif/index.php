<?php $this->load->view('layouts/header_admin'); ?>
<?php $this->load->view('layouts/sidebar_admin'); ?>

<div class="row mb-3">
    <div class="col-6">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-person-lines-fill"></i> Data Alternatif</h1>
    </div>
    <div class="col d-sm-flex align-items-center justify-content-end">

        <a href="<?= base_url('Alternatif/create'); ?>" class="btn btn-success mx-1"> <span class="bi bi-plus">Tambah</span></a>
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="bi bi-file-spreadsheet">Import
                    Excel</span>
            </button>
            <ul class="dropdown-menu bg-dark ">
                <li><a class="dropdown-item text-light" href="<?= base_url('Alternatif/import_excel'); ?>">Import</a>
                </li>
                <li><a class="dropdown-item text-light" href="<?= base_url('assets/') ?>/template.xlsx">Template
                        Import</a></li>
            </ul>
        </div>
    </div>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="row card-header py-3">
        <div class="col-6">
            <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Daftar Data Alternatif</h6>
        </div>
        <div class="col d-flex justify-content-end mx-2">
            <form action="<?= base_url('alternatif/loadRecord'); ?>" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari alternatif..." name='search' value='<?= $search ?>'>
                    <input class="btn btn-outline-secondary" type="submit" name="submit" value="Cari">
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Nama Alternatif</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $no = $row + 1;
                        foreach ($result as $value) {
                        ?>
                            <tr align="center">
                                <td><?= $no ?></td>
                                <td align="left"><?php echo $value['nama'] ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Alternatif/edit/' . $value['id_alternatif']) ?>" class="mx-1 badge bg-warning btn-sm"><span class="text-light bi bi-pencil-square">Ubah</span></a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Alternatif/destroy/' . $value['id_alternatif']) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="badge bg-danger text-light"><span class="bi bi-trash">Hapus</span></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        if (count($result) == 0) {
                            echo "<tr>";
                            echo "<td colspan='3' style='text-align:center;'>Data tidak ditemukan.</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div style='margin-top: 10px;'>
                    <?= $pagination; ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('layouts/footer_admin'); ?>