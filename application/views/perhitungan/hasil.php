<?php $this->load->view('layouts/header_admin'); ?>
<?php $this->load->view('layouts/sidebar_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-layout-text-window-reverse"></i> Data Hasil Akhir</h1>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="row card-header py-3">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Hasil Akhir Perankingan</h6>
                </div>
                <div class="col d-flex justify-content-end pb-3">
                    <a href="<?= base_url('Laporan'); ?>" class="btn btn-primary me-1"> <span class="bi bi-printer">Cetak</span> </a>
                    </a>
                    <a href="<?= base_url('Laporan/pdf'); ?>" class="btn btn-danger me-1"> <span class="bi bi-file-pdf">PDF</span> </a>
                    <a href="<?= base_url('Laporan/excel'); ?>" class="btn btn-success"> <span class="bi bi-file-spreadsheet">Cetak
                            Excel</span> </a>
                    </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>Alternatif</th>
                                    <th>Nilai MFEP</th>
                                    <th width="15%">Rank</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $no = 1;
                                foreach ($hasil as $keys) : ?>
                                    <tr align="center">
                                        <td align="left">
                                            <?php
                                            $nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
                                            echo $nama_alternatif['nama'];
                                            ?>

                                        </td>
                                        <td><?= number_format($keys->nilai, 2, '.', '.'); ?></td>
                                        <td><?= $no; ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    $this->load->view('layouts/footer_admin');
    ?>