<?php
error_reporting(0);
include './backend/inc/connection.php';
require_once './backend/app/function/SetChookie.php';
require_once './backend/app/controller/AdminControllers.php';
session_start();
if (!isset($_SESSION['user'])) {
    return include './pages/login.php';
}


$title;
switch ($_GET['buka']) {
    case 'dashboard':
        $title = 'Dashboard';
        break;
        // Start Data Kelas
    case 'data_kelas':
        $title = 'Data Kelas';
        break;

    case 'tmbh-kelas':
        $title = 'Tambah Data Kelas';
        break;

    case 'ubh-kelas':
        $title = 'Ubah Data Kelas';
        break;

        // End Data Kelas

        // Start Data Siswa
    case 'data_siswa':
        $title = 'Data Siswa';
        break;

    case 'tmbh-siswa':
        $title = 'Tambah Data Siswa';
        break;

    case 'ubh-siswa':
        $title = 'Ubah Data Siswa';
        break;


        // End Data Siswa

        // Start Data Admin
    case 'data_admin':
        $title = 'Data Admin';
        break;

    case 'tmbh-admin':
        $title = 'Tambah Data Admin';
        break;

    case 'ubh-admin':
        $title = 'Ubah Data Admin';
        break;


        // End Data Admin

        // Start Data Transaksi
    case 'transaksi_pembayaran':
        $title = 'Transaksi Pembayaran';
        break;

    case 'tmbh-transaksi':
        $title = 'Tambah Data Transaksi Pembayaran';
        break;

        // End Data Transaksi

        // Start Data Rekapan
    case 'rekapan_pemasukan':
        $title = 'Rekapan Pemasukan';
        break;
        // End Data Rekapan

        // Start Data Laporan
    case 'laporan_spp':
        $title = 'Laporan SPP';
        break;
        // End Data Laporan
    default:
        $title = 'Dashboard';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="assets/OIP-removebg-preview.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <!-- CSS files -->
    <link href="assets/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="assets/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="assets/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="assets/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="assets/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>


</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full " data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <img src="assets/OIP-removebg-preview.png" width="60" alt="" />
                    <h2 class="ms-2 fw-bolder fs-7">SI-SPP</h2>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebar">
                        <li class="nav-small-cap ">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?buka=dashboard" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4h6v8h-6z" />
                                    <path d="M4 16h6v4h-6z" />
                                    <path d="M14 12h6v8h-6z" />
                                    <path d="M14 4h6v4h-6z" />
                                </svg>
                                <span class="hide-menu fw-bolder fs-">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-2"></i>
                            <span class="hide-menu">Komponen Data</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?buka=data_kelas" aria-expanded="false">
                                <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circles" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M6.5 17m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M17.5 17m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    </svg>
                                </span>
                                <span class="hide-menu fw-bolder fs-">Data Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?buka=data_siswa" aria-expanded="false">
                                <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                    </svg>
                                </span>
                                <span class="hide-menu fw-bolder fs-">Data Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?buka=data_admin" aria-expanded="false">
                                <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                </span>
                                <span class="hide-menu fw-bolder fs-">Data Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?buka=transaksi_pembayaran" aria-expanded="false">
                                <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M12 17v1m0 -8v1" />
                                    </svg>
                                </span>
                                <span class="hide-menu fw-bolder fs-">Transaksi Pembayaran</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./backend/router/view.php?URL=Log Out" aria-expanded="false" onclick="return confirm('Apakah anda yakin akan keluar?')">
                                <svg xmlns=" http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                    <path d="M9 12h12l-3 -3" />
                                    <path d="M18 15l3 -3" />
                                </svg>
                                <span class="hide-menu fw-bolder fs-">Log Out</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->

        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header rounded-2 ">
                <nav class="">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    </div>
                </nav>
            </header>