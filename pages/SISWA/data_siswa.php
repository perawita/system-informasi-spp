<?php
require_once './backend/app/function/crud/read.php';
$read = new Read();
$get_data = $read->TableSiswa();
?>
<div class="card-body">
  <a href="?buka=tmbh-siswa" class="btn btn-primary rounded-2">Tambah Data Siswa</a>
  <h3 class="card-title mt-2 text-center">Data Siswa</h3>
  <div class="table-responsive">
    <table id="example" class="table table-center table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="w-1">No</th>
          <th>Nisn</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Jenis Kelamin</th>
          <th>Ubah</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($get_data as $index => $data) : ?>
          <tr class="table-primary">
            <td><?= $index + 1; ?></td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nama_siswa']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['jurusan']; ?></td>
            <td><?= $data['jk']; ?></td>
            <td>
              <a href="?buka=ubh-siswa&nisn=<?= $data['nisn'] ?>" class="btn btn-warning"><i class="ti ti-edit"></i></a>
            </td>
            <td>
              <a href="./backend/router/view.php?URL=Delet Data Siswa&nisn=<?= $data['nisn'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data')"><i class="ti ti-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>