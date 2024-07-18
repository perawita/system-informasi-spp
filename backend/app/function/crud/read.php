<?php

class Read
{
    public function TableAdmin()
    {
        include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

        if (isset($_GET['id'])) {
            $id = $koneksi->real_escape_string($_GET['id']);
            $sql = "SELECT * FROM users WHERE id = '$id'";
        } else {
            $sql = "SELECT * FROM users";
        }
        $result = $koneksi->query($sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function TableSiswa()
    {
        include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

        if (isset($_GET['nisn'])) {
            $nisn = $koneksi->real_escape_string($_GET['nisn']);
            $sql = "SELECT profile_siswa.*, data_kelas.*
            FROM profile_siswa
            INNER JOIN data_kelas ON profile_siswa.id_kelas = data_kelas.id_kelas
            WHERE profile_siswa.nisn = '$nisn'";
        } else {
            $sql = "SELECT profile_siswa.*, data_kelas.*
            FROM profile_siswa
            INNER JOIN data_kelas ON profile_siswa.id_kelas = data_kelas.id_kelas";
        }

        $result = $koneksi->query($sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }


    public function TableKelas()
    {
        include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

        if (isset($_GET['id'])) {
            $id = $koneksi->real_escape_string($_GET['id']);
            $sql = "SELECT * FROM data_kelas WHERE id_kelas = '$id'";
        } else {
            $sql = "SELECT * FROM data_kelas";
        }

        $result = $koneksi->query($sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function TablePembayaran()
    {
        include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

        $sql = "SELECT history_spp.*, data_kelas.*, profile_siswa.*, data_spp .*
        FROM history_spp
        INNER JOIN profile_siswa ON history_spp.nisn = profile_siswa.nisn
        INNER JOIN data_kelas ON profile_siswa.id_kelas = data_kelas.id_kelas
        INNER JOIN data_spp ON history_spp.nisn = data_spp.id_data_spp
        GROUP BY profile_siswa.nisn";

        $result = $koneksi->query($sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function TableHistory()
    {
        include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

        $sql = "SELECT * FROM history_spp";

        $result = $koneksi->query($sql);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    
}
