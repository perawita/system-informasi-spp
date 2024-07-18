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
  <!-- <?php
$id_spp = $_GET['id_spp'];
include '../inc/koneksi.php';
$sql = "SELECT * FROM spp WHERE  id_spp='$id_spp'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?> -->
<h5>Halaman Ubah Data SPP</h5>
<hr>
<form action="?buka=proses-edit-spp&id_spp=<?= $id_spp; ?>" method="POST">
    
    <div class="form-group mb-2">
        <label for="">Nominal</label>
        <input value="<?= $data['nominal'] ?>" type=" number" name="nominal" maxlength="13" class="form-control" placeholder="Masukkan Nominal" required>
    </div>
    <div class="form-group">
        <a href="?buka=data_spp" class="btn btn-primary">Kembali</a>
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
