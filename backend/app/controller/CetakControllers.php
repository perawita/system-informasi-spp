<?php

class CetakExcel
{

    public function CetakTransaksi($id_spp)
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        $sql = "SELECT history_spp.*, profile_siswa.*, data_spp.*, users.*
            FROM history_spp
            INNER JOIN profile_siswa ON history_spp.nisn = profile_siswa.nisn
            INNER JOIN data_spp ON history_spp.id_data_spp = data_spp.id_data_spp
            INNER JOIN users ON history_spp.id_admin = users.id
            WHERE history_spp.id_spp = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_spp);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $convN = $this->conversiNominal($row['nominal']);
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Cetak_Transaksi_{$row['nisn']}.xls");

                echo "Nisn\tNama\tKelas\tAdmin\tJumlah Bayar\tTanggal Pembayaran\n";
                echo "" . $row['nisn'] . "\t" . $row['nama_siswa'] . "\t" . $row['kelas'] . "\t" . $row['nama'] . "\t" . $convN . "\t" . $row['tanggal_pembayaran'] . "\n";
            }
        }

        exit;
    }

    public function Cetak($nisn)
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        $sql = "SELECT history_spp.*, profile_siswa.*, data_spp.*, users.*
        FROM history_spp
        INNER JOIN profile_siswa ON history_spp.nisn = profile_siswa.nisn
        INNER JOIN data_spp ON history_spp.id_data_spp = data_spp.id_data_spp
        INNER JOIN users ON history_spp.id_admin = users.id
        WHERE history_spp.nisn = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $nisn);
        $stmt->execute();
        $result = $stmt->get_result();

        $dataRows = [];

        while ($row = $result->fetch_assoc()) {
            $dataRows[] = $row;
        }

        if (!empty($dataRows)) {
            $convT = $this->conversiNominal($dataRows[0]['jumlah_dibayar']);
            $convS = $this->conversiNominal($dataRows[0]['sisa_spp']);
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Cetak_Transaksi_$nisn.xls");

            echo "\n\t\tSisa\tTotal Pembayaran\n";
            echo "\t\t{$convS}\t{$convT}\n";

            echo "\nNisn\tNama\tKelas\tAdmin\tJumlah Bayar\tTanggal Pembayaran\n";

            foreach ($dataRows as $row) {
                $convN = $this->conversiNominal($row['nominal']);
                echo "{$row['nisn']}\t{$row['nama_siswa']}\t{$row['kelas']}\t{$row['nama']}\t{$convN}\t{$row['tanggal_pembayaran']}\n";
            }
        }

        exit;
    }

    public function CetakTableBulanan($tahun)
    {
        // Formatkan tahun sesuai dengan format DATE di database
        $dateToSearch = date("Y", strtotime("$tahun-01-01"));

        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        $sql = "SELECT YEAR(tanggal_pembayaran) AS tahun, MONTH(tanggal_pembayaran) AS bulan, SUM(nominal) AS total, history_spp .* FROM history_spp 
            WHERE DATE_FORMAT(tanggal_pembayaran, '%Y') = '$dateToSearch'
            GROUP BY MONTH(tanggal_pembayaran)";

        $result = $koneksi->query($sql);
        $charts_tahunan = [];
        $total_nominal = 0;
        $tanggal_cetak = date('Y/F/d');
        $index = 0;
        $bulanOptions = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $charts_tahunan[] = $row;
                $total_nominal += $row['total'];
            }
            if (!empty($charts_tahunan)) {
                $convT = $this->conversiNominal($total_nominal);
                header("Content-type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=Cetak_Data_Tahunan_$tahun.xls");
                echo "\n\tTanggal Cetak\tCetak Tahun\tTotal\n";
                echo "\t{$tanggal_cetak}\t{$dateToSearch}\t{$convT}\n";

                echo "\nNo\tBulan\tJumlah Masuk\n";
                foreach ($charts_tahunan as $data) {
                    $index++;
                    $bulan = $bulanOptions[$data['bulan']];
                    $convN = $this->conversiNominal($data['total']);
                    echo "{$index}\t{$bulan}\t{$convN}\n";
                }
            }
        }

        exit;
    }


    public function CetakTableHarian($tahun, $bulan)
    {

        // Formatkan bulan dan tahun sesuai dengan format DATE di database
        $dateToSearch = date("Y-m", strtotime("$tahun-$bulan-01"));

        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        $sql = "SELECT DATE(tanggal_pembayaran) AS tanggal, SUM(nominal) AS total, history_spp .*
        FROM history_spp 
        WHERE DATE_FORMAT(tanggal_pembayaran, '%Y-%m') = '$dateToSearch'
        GROUP BY DATE(tanggal_pembayaran)";

        $result = $koneksi->query($sql);
        $charts_bulanan = [];
        $tanggal_cetak = date('Y/F/d');
        $total_nominal = 0;
        $index = 0;
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $charts_bulanan[] = $row;
                $total_nominal += $row['total'];
            }

            if (!empty($charts_bulanan)) {
                $convT = $this->conversiNominal($total_nominal);
                header("Content-type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=Cetak_Data_Tahun_{$tahun}_Bulan_{$bulan}.xls");
                echo "\n\tTanggal Cetak\tCetak Tahun-Bulan\tTotal\n";
                echo "\t{$tanggal_cetak}\t{$dateToSearch}\t{$convT}\n";

                echo "\nNo\tTanggal\tBulan\tTahun\tJumlah Bayar\n";
                foreach ($charts_bulanan as $data) {
                    $index++;
                    $tahun = date('Y', strtotime($data['tanggal']));
                    $bulan = date('F', strtotime($data['tanggal']));
                    $tanggal = date('d', strtotime($data['tanggal']));
                    $convN = $this->conversiNominal($data['total']);
                    echo "{$index}\t{$tanggal}\t{$bulan}\t{$tahun}\t{$convN}\n";
                }
            }
        }

        exit;
    }


    public function conversiNominal($nominal)
    {
        return 'Rp ' . number_format($nominal, 2, ',', '.');
    }
}
