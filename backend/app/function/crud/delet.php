<?php

class DeletDB
{
    public function DeletDataAdmin($id)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($id)) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';
            $iD = $koneksi->real_escape_string($id);
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("i", $iD);


            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data admin berhasil dihapus.', '../../?buka=data_admin');

                exit();
            } else {
                echo $newPOPUP->create('failed', 'Gagal menghapus data admin: ' . $stmt->error, '../../?buka=data_admin');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_admin');
        }
    }

    public function DeletDataSiswa($nisn)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($nisn)) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';
            $NisN = $koneksi->real_escape_string($nisn);
            $sql = "DELETE FROM profile_siswa WHERE nisn = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("i", $NisN);


            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data siswa berhasil dihapus.', '../../?buka=data_siswa');

                exit();
            } else {
                echo $newPOPUP->create('failed', 'Gagal menghapus data siswa: ' . $stmt->error, '../../?buka=data_siswa');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_siswa');
        }
    }

    public function DeletDataKelas($id)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($id)) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';
            $iD = $koneksi->real_escape_string($id);
            $sql = "DELETE FROM data_kelas WHERE id_kelas = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("i", $iD);


            if ($stmt->execute()) {

                echo $newPOPUP->create('succes', 'Data kelas berhasil dihapus.', '../../?buka=data_kelas');

                exit();
            } else {
                echo $newPOPUP->create('failed', 'Gagal menghapus data admin: ' . $stmt->error, '../../?buka=data_kelas');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=data_kelas');
        }
    }

    public function DeletDataTransaksi($id)
    {
        include dirname(__DIR__) . '/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        if (isset($id)) {
            include dirname(dirname(dirname(__DIR__))) . '/inc/connection.php';
            $iD = $koneksi->real_escape_string($id);
            $sql = "DELETE FROM history_spp WHERE id_spp = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("i", $iD);


            if ($stmt->execute()) {
                echo $newPOPUP->create('succes', 'Data Transaksi berhasil dihapus.', '../../?buka=transaksi_pembayaran');

                exit();
            } else {
                echo $newPOPUP->create('failed', 'Gagal menghapus data admin: ' . $stmt->error, '../../?buka=transaksi_pembayaran');
            }

            $stmt->close();
            $koneksi->close();
        } else {
            echo $newPOPUP->create('failed', 'Data yang diperlukan tidak lengkap.', '../../?buka=transaksi_pembayaran');
        }
    }
}
