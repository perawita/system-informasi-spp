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
           <a href="?buka=tmbh-spp" class="btn btn-primary">Tambah Data SPP</a>
            <h3 class="card-title mt-2">Data SPP</h3>
            <div class="table-responsive">
              <table class="table table-vcenter">
                <thead>
                  <tr>
                    <th class="w-1">No</th>
                    <th>Nominal</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td>
                            <a href="?buka=ubh-spp" class="btn btn-warning">Ubah</a>
                        </td>
                        <td>
                           <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
              </table>
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
