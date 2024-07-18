<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contoh Tabel dengan Tabler Docs</title>
  <!-- Pautkan stylesheet Tabler -->
  <link href="https://cdn.jsdelivr.net/npm/tabler@latest/dist/css/tabler.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-xxl">
    <div class="row mt-6">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          <h2 class="fw-bolder">HALAMAN TAMBAH DATA SISWA</h2>
<hr>
<form action="?buka=proses-tambah-siswa" method="POST">
  <div class="form-group mb-2">
    <label for="" class="fw-bolder fs-4">Nisn</label>
    <input type="number" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
  </div>
  <div class="form-group mb-2">
    <label for="" class="fw-bolder fs-4">Nama</label>
    <input type="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
  </div>
  <div class="form-group mb-2">
    <label for="" class="fw-bolder fs-4">Kelamin</label>
    <select type="text" name="jk" class="form-control" required>
      <option value="">--Jenis Kelamin--</option>
      <option value="Laki-Laki">Laki-Laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>
  <div class="form-group mb-2">
    <label for="" class="fw-bolder fs-4">Semester</label>
    <input type="number" name="semester" class="form-control" placeholder="Semester Berapa" required>
  </div>
  <div class="form-group mb-2">
    <label for="" class="fw-bolder fs-4">No HP</label>
    <input type="number" name="no_telp" class="form-control" placeholder="Masukkan No HP" required>
  </div>
 <div class="form-group mb-2">
    <label for="" class="fw-bolder fs-4">SPP</label>
    <input type="number" name="spp" class="form-control" placeholder="Masukkan Jumlah SPP" required>
  </div>
  <div class="form-group">
    <a href="?buka=data_siswa" class="btn btn-primary">Kembali</a>
    <button type="submit" class="btn btn-success">Simpan</button>
    <button type="reset" class="btn btn-warning">Kosongkan</button>
  </div>
</form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pautkan script Tabler (opsional) -->
  <script src="https://cdn.jsdelivr.net/npm/tabler@latest/dist/js/tabler.min.js"></script>
</body>
</html>
