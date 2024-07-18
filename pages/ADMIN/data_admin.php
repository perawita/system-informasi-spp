<?php
require_once './backend/app/function/crud/read.php';
$read = new Read();
$get_data = $read->TableAdmin();
?>
<div class="card-body">
  <a href="?buka=tmbh-admin" class="btn btn-primary rounded-2">Tambah Data Admin</a>
  <h3 class="card-title mt-2 text-center">Data Admin</h3>
  <div class="table-responsive">
    <table id="example" class="table table-center table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="w-1">No</th>
          <th>Username</th>
          <th>Password</th>
          <th>Nama Admin</th>
          <th>Ubah</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($get_data as $index => $data) : ?>
          <tr class="table-primary">
            <td><?= $index + 1; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['password']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td>
              <a href="?buka=ubh-admin&id=<?= $data['id']; ?>" class="btn btn-warning"><i class="ti ti-edit"></i></a>
            </td>
            <td>
              <a href="./backend/router/view.php?URL=Delet Data Admin&id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data')"><i class="ti ti-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>