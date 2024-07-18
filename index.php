<?php
include "./includes/header.php";
?>
<div class="container-xxl">
  <div class="row">
    <div class="col-lg-12">
      <?php
      $buka = $_GET['buka'] ?? 'dashboard';

      if ($buka !== 'dashboard') {
        echo '
      <div class="card rounded-3">
        <main class="content">';
      }

      switch ($buka) {
          // Start Data Kelas
        case 'data_kelas':
        case 'tmbh-kelas':
        case 'ubh-kelas':
          include("./pages/KELAS/{$buka}.php");
          break;

          // End Data Kelas

          // Start Data Siswa
        case 'data_siswa':
        case 'tmbh-siswa':
        case 'ubh-siswa':
          include("./pages/SISWA/{$buka}.php");
          break;

          // End Data Siswa

          // Start Data Admin
        case 'data_admin':
        case 'tmbh-admin':
        case 'ubh-admin':
          include("./pages/ADMIN/{$buka}.php");
          break;

          // End Data Admin

          // Start Data Transaksi Pembayaran
        case 'transaksi_pembayaran':
          include("./pages/TRANSAKSI_PEMBAYARAN/transaksi.php");
          break;
        case 'tmbh-transaksi':
          include("./pages/TRANSAKSI_PEMBAYARAN/tambah-transaksi.php");
          break;

          // End Data Transaksi Pembayaran

          // Start Data Rekapan Pemasukan
        case 'rekapan_pemasukan':
          include("./pages/{$buka}.php");
          break;

          // End Data Rekapan Pemasukan

        default:
          include("./pages/dashboard.php");
          break;
      }

      if ($buka !== 'dashboard') {
        echo '</main>
      </div>';
      }
      ?>

    </div>
  </div>
  <?php
  include "./includes/footer.php";
  ?>