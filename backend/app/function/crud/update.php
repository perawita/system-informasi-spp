<?php

class UpdateDB
{
    public function ChangeDataAdmin($id)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($_POST['username'], $_POST['nama_petugas'], $_POST['password'], $id)) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

            $newUSER = $koneksi->real_escape_string($_POST['username']);
            $newName = $koneksi->real_escape_string($_POST['nama_petugas']);
            $newPass = $koneksi->real_escape_string($_POST['password']);
            $iD = $koneksi->real_escape_string($id);

            $sql = "UPDATE users SET username = ?, nama = ?, password = ? WHERE id = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("sssi", $newUSER, $newName, $newPass, $iD);

            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data admin berhasil diupdate.', '../../?buka=data_admin');
            } else {
                echo $newPOPUP->create('failed', 'Gagal mengupdate data admin: ' . $stmt->error, '../../?buka=data_admin');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_admin');
        }
    }

    public function ChangeDataSiswa($NISN)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($_POST['nisn'], $NISN, $_POST['nama'], $_POST['id_kelas'], $_POST['jk'], $_POST['kelas'], $_POST['no_telp'])) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

            $nisn = $koneksi->real_escape_string($_POST['nisn']);
            $nama = $koneksi->real_escape_string($_POST['nama']);
            $id_kelas = $koneksi->real_escape_string($_POST['id_kelas']);
            $jk = $koneksi->real_escape_string($_POST['jk']);
            $kelas = $koneksi->real_escape_string($_POST['kelas']);
            $no_telp = $koneksi->real_escape_string($_POST['no_telp']);
            $NisN = $koneksi->real_escape_string($NISN);

            $sql = "UPDATE profile_siswa SET nisn = ?, nama_siswa = ?, kelas = ?, jk = ?, hp = ?, id_kelas = ? WHERE nisn = ?";
            $stmt = $koneksi->prepare($sql);

            $stmt->bind_param("ssssssi", $nisn, $nama, $kelas, $jk, $no_telp, $id_kelas, $NisN);

            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data siswa berhasil diupdate.', '../../?buka=data_siswa');
                exit();
            } else {
                echo $newPOPUP->create('failed', 'Gagal mengupdate data siswa (profile_siswa): ' . $stmt->error, '../../?buka=data_siswa');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_siswa');
        }
    }


    public function ChangeDataKelas($id)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($_POST['nama_kelas'], $_POST['jurusan'], $id)) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';

            $nama_kelas = $koneksi->real_escape_string($_POST['nama_kelas']);
            $jurusan = $koneksi->real_escape_string($_POST['jurusan']);
            $iD = $koneksi->real_escape_string($id);

            $sql = "UPDATE data_kelas SET nama_kelas = ?, jurusan = ? WHERE id_kelas = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("ssi", $nama_kelas, $jurusan, $iD);

            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data kelas berhasil diupdate.', '../../?buka=data_kelas');
            } else {
                echo $newPOPUP->create('failed', 'Gagal mengupdate data kelas: ' . $stmt->error, '../../?buka=data_kelas');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_kelas');
        }
    }
}
