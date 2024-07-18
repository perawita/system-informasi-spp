<?php
require_once './backend/app/function/crud/read.php';
$read = new Read();
$get_data = $read->TablePembayaran();
?>
<div class="card-body">
  <a href="?buka=tmbh-transaksi" class="btn btn-primary mb-2">Tambah Transaksi</a>
  <h3 class="fw-card-title mt-2 text-center">Transaksi Pembayaran</h3>
  <div class="table-responsive">
    <table id="example" class="table table-center table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="w-1">No</th>
          <th>Nisn</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jenis Kelamin</th>
          <th>Sudah Dibayar</th>
          <th>Kekurangan</th>
          <th>Show</th>
          <th>Cetak</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($get_data as $index => $data) : ?>
          <tr class="table-primary">
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama_siswa']; ?></td>
            <td><?php echo $data['kelas']; ?></td>
            <td><?php echo $data['jk']; ?></td>
            <td><?php echo 'Rp ' . number_format($data['jumlah_dibayar'], 2, ',', '.'); ?></td>
            <td><?php echo 'Rp ' . number_format($data['sisa_spp'], 2, ',', '.'); ?></td>
            <td>
              <a href="./pages/TRANSAKSI_PEMBAYARAN/kuitansi.php?URL=Show&nisn=<?php echo $data['nisn']; ?>" class="btn btn-primary"><i class="ti ti-edit"></i></a>
            </td>
            <td>
              <a href="./backend/router/view.php?URL=Cetak&nisn=<?php echo $data['nisn']; ?>" class="btn btn-warning"><i class="ti ti-edit"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>