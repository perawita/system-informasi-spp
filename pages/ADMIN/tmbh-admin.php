<div class="card-body">
  <h2 class="fw-bolder">HALAMAN TAMBAH DATA ADMIN</h2>
  <hr>
  <form action="./backend/router/view.php?URL=Tambah Data Admin" method="POST">
    <div class="form-group mb-2">
      <label for="" class="fw-bolder fs-4">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
    </div>
    <div class="form-group mb-2">
      <label for="" class="fw-bolder fs-4">Password</label>
      <input type="text" name="password" class="form-control" placeholder="Masukkan Password" required>
    </div>
    <div class="form-group mb-2">
      <label for="" class="fw-bolder fs-4">Nama Admin</label>
      <input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama Admin" required>
    </div>

    <div class="form-group">
      <a href="?buka=data_admin" class="btn btn-primary"><i class="ti ti-arrow-back"></i></a>
      <button type="submit" class="btn btn-success"><i class="ti ti-device-floppy"></i></button>
      <button type="reset" class="btn btn-warning"><i class="ti ti-x"></i></button>
    </div>
  </form>
</div>