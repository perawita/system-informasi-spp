<?php

class Search
{
    public function FindSiswa($NISN)
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';

        $response = array();

        if (isset($NISN)) {
            $nisn = $koneksi->real_escape_string($NISN);

            $sql_profile = "SELECT *
            FROM profile_siswa
            WHERE nisn = ?";
            $stmt_profile = $koneksi->prepare($sql_profile);
            $stmt_profile->bind_param("s", $nisn);
            $stmt_profile->execute();
            $result_profile = $stmt_profile->get_result();

            $sql_history = "SELECT history_spp.*, profile_siswa.*, data_spp.*
            FROM history_spp
            INNER JOIN profile_siswa ON history_spp.nisn = profile_siswa.nisn
            INNER JOIN data_spp ON history_spp.id_data_spp = data_spp.id_data_spp
            WHERE history_spp.nisn = ?";
            $stmt_history = $koneksi->prepare($sql_history);
            $stmt_history->bind_param("s", $nisn);
            $stmt_history->execute();
            $result_history = $stmt_history->get_result();


            if ($result_profile->num_rows > 0) {
                if ($row_profile = $result_profile->fetch_assoc()) {
                    $siswaData = array(
                        'nama' => $row_profile['nama_siswa'],
                        'kelas' => $row_profile['kelas'],
                        'nisn' => $row_profile['nisn'],
                    );
                }

                if ($result_history->num_rows > 0) {
                    while ($row_history = $result_history->fetch_assoc()) {
                        $jmlh_bayar = floatval($row_history['nominal']);
                        $sisa = floatval($row_history['jumlah_spp'] - $row_history['nominal']);

                        $siswaHistory = array(
                            'nisn' => $row_history['nisn'],
                            'nama_siswa' => $row_history['nama_siswa'],
                            'tggl_bayar' => $row_history['tanggal_pembayaran'],
                            'jmlh_bayar' => $jmlh_bayar,
                            'id_spp' => $row_history['id_spp'],
                            'sisa' => $sisa
                        );

                        $response['siswaHistory'][] = $siswaHistory;
                    }
                }
                $response['siswaData'][] = $siswaData;
            } else {
                $response['error'] = 'Data not found.';
            }
        } else {
            $response['error'] = 'Invalid request.';
        }

        echo json_encode($response);
    }
}
