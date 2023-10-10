<?php $this->load->view('layouts/header_admin'); ?>
<?php $this->load->view('layouts/sidebar_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>

</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="row card-header py-3">
        <div class="col-6">
            <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Daftar Data Kriteria</h6>
        </div>
        <div class="col d-flex justify-content-end pb-3">
            <a href="<?= base_url('Kriteria/create'); ?>" class="btn btn-success"> <span class="bi bi-plus">Tambah</span> </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th width="5%">No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $no = 1;
                        foreach ($list as $data => $value) {
                        ?>
                            <tr align="center">
                                <td><?= $no ?></td>
                                <td><?php echo $value->kode_kriteria ?></td>
                                <td><?php echo $value->nama_kriteria ?></td>
                                <td><?php echo $value->bobot ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Kriteria/edit/' . $value->id_kriteria) ?>" class="mx-1 badge bg-warning text-light"><span class="bi bi-pencil-square">Ubah</span></a><br>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Kriteria/destroy/' . $value->id_kriteria) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="badge bg-danger text-light"><span class="bi bi-trash">Hapus</span></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php $this->load->view('layouts/footer_admin'); ?>