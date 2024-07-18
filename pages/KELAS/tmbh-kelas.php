<div class="card-body">
  <h2 class="fw-bolder">HALAMAN TAMBAH DATA KELAS</h2>
  <hr>

  <form action="./backend/router/view.php?URL=Tambah Data Kelas" method="POST">
    <div class="form-group mb-2">
      <label for="" class="fw-bolder fs-4">Nama Kelas</label>
      <input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan Nama Kelas" required>
    </div>
    <div class="form-group mb-2">
      <label for="" class="fw-bolder fs-4">Jurusan</label>
      <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required>
    </div>
    <div class="form-group">
      <a href="?buka=data_kelas" class="btn btn-primary"><i class="ti ti-arrow-back"></i></a>
      <button type="submit" class="btn btn-success"><i class="ti ti-device-floppy"></i></button>
      <button type="reset" class="btn btn-warning"><i class="ti ti-x"></i></button>
    </div>
  </form>
</div>