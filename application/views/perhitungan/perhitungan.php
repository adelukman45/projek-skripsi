<?php $this->load->view('layouts/header_admin'); ?>
<?php $this->load->view('layouts/sidebar_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-calculator"></i> Data Perhitungan</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Alternatif</th>
                        <?php foreach ($kriteria as $key) : ?>
                            <th><?= $key->kode_kriteria ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $no = 1;
                    foreach ($alternatif as $keys) : ?>
                        <tr align="center">
                            <td><?= $no; ?></td>
                            <td align="left"><?= $keys->nama ?></td>
                            <?php foreach ($kriteria as $key) : ?>
                                <td>
                                    <?php
                                    $data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
                                    echo $data_pencocokan['nilai'];
                                    ?>
                                </td>
                            <?php endforeach ?>
                        </tr>
                    <?php
                        $no++;
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Nilai Evaluasi Factor (E)</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Nilai Evaluasi Factor (E)</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($kriteria as $key) : ?>
                        <tr align="center">
                            <td><?= $key->kode_kriteria; ?></td>
                            <td><?= $key->nama_kriteria; ?></td>
                            <td><?= $key->bobot; ?></td>
                            <td>
                                <?php
                                $t_bobot = $this->Perhitungan_model->get_total_bobot();
                                echo number_format($key->bobot / $t_bobot['total_bobot'], 2);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Nilai Bobot Evaluasi (WE)</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Alternatif</th>
                        <?php foreach ($kriteria as $key) : ?>
                            <th><?= $key->kode_kriteria ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $no = 1;
                    foreach ($alternatif as $keys) : ?>
                        <tr align="center">
                            <td><?= $no; ?></td>
                            <td align="left"><?= $keys->nama ?></td>
                            <?php foreach ($kriteria as $key) : ?>
                                <td>
                                    <?php
                                    $data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
                                    $t_bobot = $this->Perhitungan_model->get_total_bobot();
                                    $n_e = number_format($key->bobot / $t_bobot['total_bobot'], 2);
                                    echo number_format($data_pencocokan['nilai'] * $n_e, 2);
                                    ?>
                                </td>
                            <?php endforeach ?>
                        </tr>
                    <?php
                        $no++;
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="bi bi-table"></i> Nilai Total Evaluasi (&Sigma;WE)</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Alternatif</th>
                        <th>Penjumlahan Nilai WE</th>
                        <th>Total Nilai &Sigma;WE</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $this->Perhitungan_model->hapus_hasil();
                    $no = 1;
                    foreach ($alternatif as $keys) : ?>
                        <tr align="center">
                            <td><?= $no; ?></td>
                            <td align="left"><?= $keys->nama ?></td>
                            <td>SUM (
                                <?php
                                $sum_we = 0;
                                foreach ($kriteria as $key) {
                                    $data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
                                    $t_bobot = $this->Perhitungan_model->get_total_bobot();
                                    $n_e = number_format($key->bobot / $t_bobot['total_bobot'], 2);
                                    $n_we = number_format($data_pencocokan['nilai'] * $n_e, 2);
                                    echo $n_we . " ";
                                    $sum_we += $n_we;
                                }
                                $hasil_akhir = [
                                    'id_alternatif' => $keys->id_alternatif,
                                    'nilai' => $sum_we
                                ];
                                $this->Perhitungan_model->insert_nilai_hasil($hasil_akhir);
                                ?>
                                )</td>
                            <td><?= $sum_we; ?></td>
                        </tr>
                    <?php
                        $no++;
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$this->load->view('layouts/footer_admin');
?>