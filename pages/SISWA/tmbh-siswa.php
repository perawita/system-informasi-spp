<?php
require_once './backend/app/function/crud/read.php';
$read = new Read();
$get_data = $read->TableKelas();
?>
<div class="card-body">
  <h2 class="fw-bolder">HALAMAN TAMBAH DATA SISWA</h2>
  <hr>
  <form action="./backend/router/view.php?URL=Tambah Data Siswa" method="POST">
    <div class="form-group mb-2">
      <label for="nisn" class="fw-bolder fs-4" id="label-nisn">NISN</label>
      <input type="number" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN" required>
    </div>
    <div class="form-group mb-2">
      <label for="nama" class="fw-bolder fs-4" id="label-nama">Nama</label>
      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
    </div>
    <div class="form-group mb-2">
      <label for="id_kelas" class="fw-bolder fs-4" id="label-jurusan">Jurusan</label>
      <select type="text" name="id_kelas" id="id_kelas" class="form-control" required>
        <option selected disabled>--Jurusan--</option>
        <?php foreach ($get_data as $index => $jurusan) : ?>
          <option value="<?php echo $jurusan['id_kelas'] ?>"><?php echo $jurusan['jurusan'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group mb-2">
      <label for="jk" class="fw-bolder fs-4" id="label-jk">Jenis Kelamin</label>
      <select type="text" name="jk" id="jk" class="form-control" required>
        <option selected disabled>--Jenis Kelamin--</option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
    <div class="form-group mb-2">
      <label for="kelas" class="fw-bolder fs-4" id="label-kelas">Kelas</label>
      <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Kelas Berapa (X, XI, XII)" required>
    </div>
    <div class="form-group mb-2">
      <label for="no_telp" class="fw-bolder fs-4" id="label-no_telp">No HP</label>
      <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No HP" required>
    </div>
    <div class="form-group">
      <a href="?buka=data_siswa" class="btn btn-primary"><i class="ti ti-arrow-back"></i></a>
      <button type="submit" class="btn btn-success"><i class="ti ti-device-floppy"></i></button>
      <button type="reset" class="btn btn-warning"><i class="ti ti-x"></i></button>
    </div>
  </form>
</div>
</div>