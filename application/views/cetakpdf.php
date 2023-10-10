<!DOCTYPE html>
<html>

<head>
    <title>Cetak PDF</title>

</head>
<style>
table {
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
}
</style>

<body>

    <h4 align="center">Daftar Nama Penerima Bantuan Sosial</h4>
    <h5 align="center">Pemerintahan Desa Sekarwangi Kecamatan Buahdua Sumedang</h5>
    <table border="1" width="100%">
        <thead>
            <tr align="center">
                <th>Nama</th>
                <th>Nilai</th>
                <th width="15%">Rank</th>
            </tr>
        </thead>
        <tbody>
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
                <td><?= $keys->nilai ?></td>
                <td><?= $no; ?></td>
            </tr>
            <?php
                $no++;
            endforeach ?>
        </tbody>
    </table>
</body>

</html>