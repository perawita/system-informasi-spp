<?php

class AdminControllers
{
    public function Dashboard()
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        $jumlah_siswa_profile = $this->getCount('profile_siswa');
        $jumlah_siswa_users = $this->getCount('users');
        $jumlah_pemasukan = $this->getSum('history_spp', 'nominal');
        $total_pemasukan_bulan_ini = $this->getSumByMonth('history_spp', 'nominal');

        $charts_tahunan = $this->chartsYears();
        $charts_bulanan = $this->chartsMonth();

        return array(
            'count-users' => $jumlah_siswa_users,
            'count-siswa' => $jumlah_siswa_profile,
            'jumlah-pemasukan' => $jumlah_pemasukan,
            'jumlah-pemasukan-bulan-ini' => $total_pemasukan_bulan_ini,
            'data-charts-tahunan' => $charts_tahunan,
            'data_charts_bulanan' => $charts_bulanan
        );
    }

    protected function getCount($table)
    {
        global $koneksi;

        $sql = "SELECT COUNT(*) AS jumlah FROM $table";
        $result = $koneksi->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        }

        return 0;
    }

    protected function getSum($table, $column)
    {
        global $koneksi;

        $sql = "SELECT SUM($column) AS total FROM $table";
        $result = $koneksi->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    protected function getSumByMonth($table, $column)
    {
        global $koneksi;

        $bulan_sekarang = date('Y-m');
        $sql = "SELECT SUM($column) AS total FROM $table WHERE DATE_FORMAT(tanggal_pembayaran, '%Y-%m') = '$bulan_sekarang'";

        $result = $koneksi->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    protected function chartsYears()
    {
        global $koneksi;
        $sql = "SELECT YEAR(tanggal_pembayaran) AS tahun, MONTH(tanggal_pembayaran) AS bulan, SUM(nominal) AS total FROM history_spp GROUP BY MONTH(tanggal_pembayaran)";

        $result = $koneksi->query($sql);
        $charts_tahunan = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $charts_tahunan[$row['tahun']][$row['bulan']] = $row['total'];
            }
        }

        return $charts_tahunan;
    }
    
    protected function chartsMonth()
    {
        global $koneksi;
        $sql = "SELECT date(tanggal_pembayaran) AS tanggal, SUM(nominal) AS total FROM history_spp GROUP BY date(tanggal_pembayaran)";

        $result = $koneksi->query($sql);
        $charts_bulanan = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $charts_bulanan[$row['tanggal']] = $row['total'];
            }
        }

        return $charts_bulanan;
    }
}
