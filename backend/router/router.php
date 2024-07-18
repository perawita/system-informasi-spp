<?php
require_once dirname(__DIR__) . '/app/controller/LoginControllers.php';
require_once dirname(__DIR__) . '/app/controller/TransaksiControllers.php';
require_once dirname(__DIR__) . '/app/controller/AdminControllers.php';
require_once dirname(__DIR__) . '/app/controller/CetakControllers.php';

//Import Method CUD
require_once dirname(__DIR__) . '/app/function/crud/update.php';
require_once dirname(__DIR__) . '/app/function/crud/create.php';
require_once dirname(__DIR__) . '/app/function/crud/delet.php';

//Import Method Seacrh
require_once dirname(__DIR__) . '/app/function/FindData.php';





class Router
{
    public function _HandleURL($URL)
    {
        switch ($URL) {
            case "Login":
                $this->_HandleLogin();
                break;

            case "Log Out":
                $this->_HandleLogOut();
                break;

            case "Update Data Admin":
                $this->_HandleUpdateAdmin();
                break;

            case "Tambah Data Admin":
                $this->_HandleCreateAdmin();
                break;

            case "Delet Data Admin":
                $this->_HandleDeletAdmin();
                break;
            case "Tambah Data Kelas":
                $this->_HandleCreateKelas();
                break;
            case "Update Data Kelas":
                $this->_HandleUpdateKelas();
                break;
            case "Delet Data Kelas":
                $this->_HandleDeleKelas();
                break;
            case "Tambah Data Siswa":
                $this->_HandleCreateSiswa();
                break;
            case "Update Data Siswa":
                $this->_HandleUpdateSiswa();
                break;
            case "Delet Data Siswa":
                $this->_HandleDeletSiswa();
                break;
            case "Search Data":
                $this->_HandleSearch();
                break;
            case "Transaksi":
                $this->_HandleTransaksi();
                break;
            case "Cetak Transaksi":
                $this->_HandleCetakTransaksi();
                break;
            case "Delet Data Transaksi":
                $this->_HandleDeletTransaksi();
                break;
            case "Cetak":
                $this->_HandleCetak();
                break;
            case "CetakBulanan":
                $this->_HandleCetakBulanan();
                break;
            case "CetakHarian":
                $this->_HandleCetakHarian();
                break;
        }
    }

    protected function _HandleLogin()
    {
        $loginController = new LoginControllers();
        $loginController->Index($_POST['user'], $_POST['pass']);
    }

    protected function _HandleLogOut()
    {
        $loginController = new LoginControllers();
        $loginController->LogOut();
    }

    #Admin CUD
    protected function _HandleCreateAdmin()
    {
        $createAdmin = new CreateDB();
        $createAdmin->CretaeDataAdmin();
    }

    protected function _HandleUpdateAdmin()
    {
        $upateAdmin = new UpdateDB();
        $upateAdmin->ChangeDataAdmin($_GET['id']);
    }

    protected function _HandleDeletAdmin()
    {
        $deletAdmin = new DeletDB();
        $deletAdmin->DeletDataAdmin($_GET['id']);
    }
    #


    #Kelas CUD
    protected function _HandleCreateKelas()
    {
        $createKelas = new CreateDB();
        $createKelas->CretaeDataKelas();
    }

    protected function _HandleUpdateKelas()
    {
        $upateKelas = new UpdateDB();
        $upateKelas->ChangeDataKelas($_GET['id']);
    }

    protected function _HandleDeleKelas()
    {
        $deletKelas = new DeletDB();
        $deletKelas->DeletDataKelas($_GET['id']);
    }
    #


    #Siswa CUD
    protected function _HandleCreateSiswa()
    {
        $createSiswa = new CreateDB();
        $createSiswa->CreateDataSiswa();
    }

    protected function _HandleUpdateSiswa()
    {
        $upateSiswa = new UpdateDB();
        $upateSiswa->ChangeDataSiswa($_GET['nisn']);
    }

    protected function _HandleDeletSiswa()
    {
        $deletSiswa = new DeletDB();
        $deletSiswa->DeletDataSiswa($_GET['nisn']);
    }
    #

    protected function _HandleSearch()
    {
        $findSiswa = new Search();
        $findSiswa->FindSiswa($_POST['nisn'] ? $_POST['nisn']  : $_GET['nisn']);
    }


    protected function _HandleTransaksi()
    {
        $transaksi = new TransaksiControllers();
        $transaksi->index();
    }


    protected function _HandleCetakTransaksi()
    {
        $c_t_k = new CetakExcel();
        $c_t_k->CetakTransaksi($_GET['id_spp']);
    }


    protected function _HandleCetak()
    {
        $c_t_k = new CetakExcel();
        $c_t_k->Cetak($_GET['nisn']);
    }

    protected function _HandleCetakBulanan()
    {
        $c_t_k = new CetakExcel();
        $c_t_k->CetakTableBulanan($_POST['tahun']);
    }

    protected function _HandleCetakHarian()
    {
        $c_t_k = new CetakExcel();
        $c_t_k->CetakTableHarian($_POST['tahun'], $_POST['bulan']);
    }

    protected function _HandleDeletTransaksi()
    {
        $deletSiswa = new DeletDB();
        $deletSiswa->DeletDataTransaksi($_GET['id_spp']);
    }
}
