<?php

class CreateDB
{
    public function CretaeDataAdmin()
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($_POST['username'], $_POST['password'], $_POST['nama_petugas'])) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';
            $username = $koneksi->real_escape_string($_POST['username']);
            $password = $koneksi->real_escape_string($_POST['password']);
            $nama_petugas = $koneksi->real_escape_string($_POST['nama_petugas']);

            $level = 'Super Admin';

            $sql = "INSERT INTO users (username, password, nama, level) VALUES (?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);

            $stmt->bind_param("ssss", $username, $password, $nama_petugas, $level);

            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data admin berhasil ditambahkan.', '../../?buka=data_admin');

                exit();
            } else {
                echo $newPOPUP->create('failed', `Gagal menambahkan data admin: {$stmt->error}`, '../../?buka=data_admin');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_admin');
        }
    }

    public function CreateDataSiswa()
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($_POST['nisn'], $_POST['nama'], $_POST['id_kelas'], $_POST['jk'], $_POST['kelas'], $_POST['no_telp'])) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

            $nisn = $koneksi->real_escape_string($_POST['nisn']);
            $nama = $koneksi->real_escape_string($_POST['nama']);
            $id_kelas = $koneksi->real_escape_string($_POST['id_kelas']);
            $jk = $koneksi->real_escape_string($_POST['jk']);
            $kelas = $koneksi->real_escape_string($_POST['kelas']);
            $no_telp = $koneksi->real_escape_string($_POST['no_telp']);

            $sql = "INSERT INTO profile_siswa (nisn, nama_siswa, kelas, jk, hp, id_kelas) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("ssssss", $nisn, $nama, $kelas, $jk, $no_telp, $id_kelas);

            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data siswa berhasil ditambahkan.', '../../?buka=data_siswa');

                exit();
            } else {
                echo $newPOPUP->create('failed', `Gagal menambahkan data siswa (profile_siswa): $stmt->error`, '../../?buka=data_siswa');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_siswa');
        }
    }


    public function CretaeDataKelas()
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($_POST['nama_kelas'], $_POST['jurusan'])) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';
            $nama_kelas = $koneksi->real_escape_string($_POST['nama_kelas']);
            $jurusan = $koneksi->real_escape_string($_POST['jurusan']);

            $sql = "INSERT INTO data_kelas (nama_kelas, jurusan) VALUES (?, ?)";
            $stmt = $koneksi->prepare($sql);

            $stmt->bind_param("ss", $nama_kelas, $jurusan);

            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data kelas berhasil ditambahkan.', '../../?buka=data_kelas');

                exit();
            } else {
                echo $newPOPUP->create('failed', `Gagal menambahkan data kelas: $stmt->error`, '../../?buka=data_kelas');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_kelas');
        }
    }
}
