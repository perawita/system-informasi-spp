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
          <h2 class="fw-bolder">HALAMAN TAMBAH DATA ADMIN</h2>
<hr>
<form action="?buka=proses-tambah-petugas" method="POST">
  <div class="form-group mb-2">
    <label for=""  class="fw-bolder fs-4">Username</label>
    <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
  </div>
  <div class="form-group mb-2">
    <label for=""  class="fw-bolder fs-4">Password</label>
    <input type="text" name="password" class="form-control" placeholder="Masukkan Password" required>
  </div>
  <div class="form-group mb-2">
    <label for=""  class="fw-bolder fs-4">Nama Admin</label>
    <input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama Admin" required>
  </div>
  
  <div class="form-group">
    <a href="?buka=data_admin" class="btn btn-primary">Kembali</a>
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
