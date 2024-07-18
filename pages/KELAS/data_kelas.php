<?php
require_once './backend/app/function/crud/read.php';
$read = new Read();
$get_data = $read->TableKelas();
?>

<div class="card-body">
  <a href="?buka=tmbh-kelas" class="btn btn-primary rounded-2">Tambah Data Kelas</a>
  <h3 class="card-title mt-2 text-center">Data Kelas</h3>

  <div class="table-responsive">
    <table id="example" class="table table-center table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="w-1">No</th>
          <th>Nama kelas</th>
          <th>Jurusan</th>
          <th>Ubah</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($get_data as $index => $data) : ?>
          <tr class="table-primary">
            <td><?= $index + 1; ?></td>
            <td><?= $data['nama_kelas']; ?></td>
            <td><?= $data['jurusan']; ?></td>
            <td>
              <a href="?buka=ubh-kelas&id=<?= $data['id_kelas']; ?>" class="btn btn-warning"><i class="ti ti-edit"></i></a>
            </td>
            <td>
              <a href="./backend/router/view.php?URL=Delet Data Kelas&id=<?= $data['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data')"><i class="ti ti-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>