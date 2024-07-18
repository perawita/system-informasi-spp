<?php

class TransaksiControllers
{
    protected $koneksi;
    protected $input = [];

    public function __construct()
    {
        include dirname(dirname(__DIR__)) . '/inc/connection.php';
        $this->koneksi = $koneksi;
        $this->input = $this->get_inputan();
    }

    protected function get_inputan()
    {
        return [
            'id_admin' => isset($_POST['id_user']) ? $this->koneksi->real_escape_string($_POST['id_user']) : null,
            'nisn' => isset($_POST['nisn']) ? $this->koneksi->real_escape_string($_POST['nisn']) : null,
            'kelas' => isset($_POST['kelas']) ? $this->koneksi->real_escape_string($_POST['kelas']) : null,
            'jumlah_bayar' => isset($_POST['nominal']) ? $this->koneksi->real_escape_string($_POST['nominal']) : null,
            'tanggal' => isset($_POST['tanggal_pembayaran']) ? $this->koneksi->real_escape_string($_POST['tanggal_pembayaran']) : null,
        ];
    }

    public function index()
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        $get_siswa_db = $this->searchNISN($this->input['nisn']);
        if ($get_siswa_db) {
            $this->protocol($get_siswa_db);
        } else {
            echo $newPOPUP->create('failed', 'Data tidak terpenuhi.', '../../?buka=transaksi_pembayaran');
        }
    }

    protected function protocol($get_siswa_db = [])
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        $nominal_input_spp = $this->_handleNominalSpp();
        $kelas = $this->input['kelas'];
        $nisn = $this->input['nisn'];
        $jumlah_bayar = $this->input['jumlah_bayar'];

        $get_db_spp = $this->checkSPP($nisn);
        $sisa_spp_check = isset($get_db_spp[0]['sisa_spp']) ? max($get_db_spp[0]['sisa_spp'] - $jumlah_bayar, 0) : max($nominal_input_spp[$kelas] - $jumlah_bayar, 0);


        if (empty($get_db_spp)) {

            if ($jumlah_bayar > $nominal_input_spp[$kelas]) {
                echo $newPOPUP->create('failed', 'Jumlah yang anda input melebihi nominal spp.', '../../?buka=transaksi_pembayaran');

                return;
            }
            $this->processPayment($get_siswa_db, $nominal_input_spp, $sisa_spp_check);
            return;
        }

        if ($jumlah_bayar > $get_db_spp[0]['sisa_spp']) {
            echo $newPOPUP->create('failed', 'Jumlah yang anda input melebihi sisa spp di database atau SPP Anda sudah lunas.', '../../?buka=transaksi_pembayaran');

            return;
        }

        if ($get_db_spp[0]['sisa_spp'] < 1.00) {
            echo $newPOPUP->create('failed', 'SPP Anda sudah lunas.', '../../?buka=transaksi_pembayaran');

            return;
        }

        $this->processPayment($get_siswa_db, $nominal_input_spp, $sisa_spp_check);
    }


    protected function processPayment($get_siswa_db = [], $nominal_input_spp, $sisa_spp)
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        $jumlah_spp = 0;
        $sql = "INSERT INTO history_spp(nisn, id_admin, tanggal_pembayaran, nominal, id_data_spp) 
                VALUES ('{$this->input['nisn']}', '{$this->input['id_admin']}', '{$this->input['tanggal']}', '{$this->input['jumlah_bayar']}', '{$this->input['nisn']}')";
        if ($this->koneksi->query($sql) === TRUE) {
            if ($this->input['kelas'] == $get_siswa_db['kelas']) {
                $jumlah_spp = $nominal_input_spp[$get_siswa_db['kelas']];
            } else {
                $frist_nominal = "SELECT * FROM data_spp WHERE id_data_spp = '{$get_siswa_db['nisn']}'";
                $result = $this->koneksi->query($frist_nominal);

                if ($result) {
                    $row = $result->fetch_assoc();
                    if ($row) {
                        $jumlah_spp_db = $row['jumlah_spp'];
                        $jumlah_spp = $jumlah_spp_db + $nominal_input_spp[$get_siswa_db['kelas']];
                    }
                }
            }

            $sql_spp = "INSERT INTO data_spp(id_data_spp, sisa_spp, jumlah_spp, jumlah_dibayar) 
                    VALUES ('{$this->input['nisn']}', '{$sisa_spp}', '{$jumlah_spp}', '{$this->input['jumlah_bayar']}')
                    ON DUPLICATE KEY UPDATE 
                    sisa_spp = sisa_spp - '{$this->input['jumlah_bayar']}', 
                    jumlah_spp = '{$jumlah_spp}', 
                    jumlah_dibayar = jumlah_dibayar + '{$this->input['jumlah_bayar']}'";

            if ($this->koneksi->query($sql_spp) === TRUE) {
                echo $newPOPUP->create('succes', 'Data spp berhasil ditambahkan.', '../../?buka=transaksi_pembayaran');
            } else {
                echo $newPOPUP->create('failed', 'Error: ' . $sql_spp . '<br>' . $this->koneksi->error, '../../?buka=transaksi_pembayaran');
            }
        } else {
            echo $newPOPUP->create('failed', 'Error: ' . $sql . '<br>' . $this->koneksi->error, '../../?buka=transaksi_pembayaran');
        }
    }

    public function _handleNominalSpp()
    {
        return [
            'X' => 150000.00,
            'XI' => 160000.00,
            'XII' => 160000.00,
        ];
    }

    protected function searchNISN($nisn)
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        $sql = "SELECT * FROM profile_siswa WHERE nisn = '$nisn'";
        $result = $this->koneksi->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $get_data = $result->fetch_assoc();
                return $get_data;
            } else {
                echo $newPOPUP->create('failed', 'Data tidak ada' . $nisn, '../../?buka=transaksi_pembayaran');
            }
        } else {
            echo $newPOPUP->create('failed', 'Query Error: ' . $this->koneksi->error, '../../?buka=transaksi_pembayaran');
        }
    }

    protected function checkSPP($nisn)
    {
        include dirname(__DIR__) . '/function/PopUp.php';
        $newPOPUP = new CreatePOPUP;

        $nisn = $this->koneksi->real_escape_string($nisn);
        $sql = "SELECT history_spp.*, data_spp.* FROM data_spp 
        INNER JOIN history_spp ON data_spp.id_data_spp = history_spp.id_data_spp
        WHERE data_spp.id_data_spp = '$nisn'";
        $result = $this->koneksi->query($sql);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo $newPOPUP->create('failed', 'Query Error: ' . $this->koneksi->error, '../../?buka=transaksi_pembayaran');
        }

        return $data;
    }
}
