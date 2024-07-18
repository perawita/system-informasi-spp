<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="assets/css/icons/tabler-icons/tabler-icons.css">

</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.html" class="text-nowrap logo-img">
            <img src="assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebar">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href=".?" aria-expanded="false"> 
                  <i class="ti ti-layout-dashboard"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Komponen Data</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?buka=data_spp" aria-expanded="false">
                <span>
                <i class="ti ti-brand-cashapp"></i>
                </span>
                <span class="hide-menu">Data SPP</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?buka=data_kelas" aria-expanded="false">
                <span>
                  <i class="ti ti-circles"></i>
                </span>
                <span class="hide-menu">Data Kelas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?buka=data_siswa" aria-expanded="false">
                <span>
                  <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Data Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?buka=data_admin" aria-expanded="false">
                <span>
                <i class="ti ti-man"></i>
                </span>
                <span class="hide-menu">Data Admin</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?buka=transaksi_pembayaran" aria-expanded="false">
                <span>
                <i class="ti ti-report-money"></i>
                </span>
                <span class="hide-menu">Transaksi Pembayaran</span>
              </a>
            </li>
          <li class="sidebar-item">
              <a class="sidebar-link" href="?buka=rekapan_pemasukan" aria-expanded="false">
                <span>
                <i class="ti ti-report"></i>
                </span>
                <span class="hide-menu">Rekapan Pemasukan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ui-typography.html" aria-expanded="false">
                <span>
                <i class="ti ti-file-report"></i>
                </span>
                <span class="hide-menu">Laporan SPP</span>
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
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
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
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    
<main class="content">

<?php
error_reporting(0);
        $buka = $_GET['buka'];
        switch ($buka) {

            case 'data_spp':
            include("SPP/data_spp.php");
            break;

            case 'tmbh-spp':
            include("SPP/tmbh-spp.php");
            break;

            case 'ubh-spp':
            include("SPP/ubh-spp.php");
            break;
            

            case 'data_kelas':
            include("KELAS/data_kelas.php");
            break;

            case 'tmbh-kelas':
            include("KELAS/tmbh-kelas.php");
            break;
          
            case 'data_siswa':
            include("SISWA/data_siswa.php");
            break;

            case 'tmbh-siswa':
            include("SISWA/tmbh-siswa.php");
            break;

            case 'data_admin':
            include("ADMIN/data_admin.php");
            break;

            case 'tmbh-admin':
            include("ADMIN/tmbh-admin.php");
            break;

            case 'transaksi_pembayaran':
            include("TRANSAKSI_PEMBAYARAN/transaksi_pembayaran.php");
            break;

            case 'rekapan_pemasukan':
            include("rekapan_pemasukan.php");
            break;



          default:
          include("dashboard.php");
          break;
        }
?>

</main>

    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
 
</body>
</body>
</html>