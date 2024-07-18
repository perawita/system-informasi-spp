<!DOCTYPE html>
<html>

<head>
    <title>Rekap Pembayaran SPP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h5>Rekap Pembayaran SPP</h5>
        <!-- <a href="?buka=data_transaksi" class="btn btn-primary">Kembali</a> -->
        <!-- <a href="?nisn=<?php echo $_GET['nisn']; ?>&action=cetak" class="btn btn-primary">Cetak Rekapitulasi (Word)</a> -->
        <hr>
        <h4>Rekap Pembayaran per Bulan</h4>
        <?php
        // echo "<p> Nama: " . $dataSiswa['nama'] . "</p>";
        // echo "<p> NISN: " . $_GET['nisn'] . "</p>";
        ?>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $no = 1;
                // foreach ($dataBulan as $data) {
                //     $bulan = $data['bulan'];
                //     $totalPembayaran = $data['total_pembayaran'];

                //     echo '
                //     <tr>
                //         <th scope="row">' . $no++ . '</th>
                //         <td>' . $bulan . '</td>
                //         <td>' . "Rp " . number_format($totalPembayaran, 2, ',', '.') . '</td>
                //     </tr>';
                // }
                ?>
            </tbody>
        </table>

        <hr>
        <h4>Rekap Pembayaran per Tahun</h4>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $no = 1;
                // foreach ($dataTahun as $data) {
                //     $tahun = $data['tahun'];
                //     $totalPembayaran = $data['total_pembayaran'];

                //     echo '
                //     <tr>
                //         <th scope="row">' . $no++ . '</th>
                //         <td>' . $tahun . '</td>
                //         <td>' . "Rp " . number_format($totalPembayaran, 2, ',', '.') . '</td>
                //     </tr>';
                // }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>