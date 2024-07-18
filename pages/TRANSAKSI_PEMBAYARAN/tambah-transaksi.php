<div class="box-body">
	<div class="row">
		<div class="col-sm-5">
			<table class="table table-striped">
				<tr style="background:black">
					<td colspan="3" class="fw-bold fs-1 text-white">Data Transaksi Pembayaran</td>

				</tr>
				<tr>
					<td class="fw-bolder">Nama Petugas</td>
					<td>:</td>
					<td>
						<input type="text" name="username" id="username" value="<?php echo $_SESSION['user']; ?>" class="form-control" readonly>
					</td>
				</tr>
				<tr>
					<td class="fw-bolder">Tanggal Pembayaran</td>
					<td>:</td>
					<td>
						<input type="date" value="<?= date('Y-m-d'); ?>" name="tanggal_pembayaran" class="form-control">
					</td>
				</tr>
				<tr>
					<td class="fw-bolder">NISN</td>
					<td>:</td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control" required autocomplete="off" name="search-nisn" id="search-nisn" placeholder="Masukkan Nisn" type="text" value="">
							<span class="input-group-text">
								<button id="search-button" data-toggle="search" data-target="#profile_siswa" class="btn btn-primary"><i class="ti ti-search"></i></button>
							</span>
						</div>
					</td>
				</tr>
				<tr>
					<td class="fw-bolder">Biodata</td>
					<td>:</td>
					<td>
						<div id="results-tunggu">
							<p style="color:red">* Belum Ada Hasil</p>
						</div>
						<div id="results-nisn"></div>
					</td>
				</tr>
				<form action="./backend/router/view.php?URL=Transaksi" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>" class="form-control">
					<input type="hidden" name="nisn" id="nisn" value="" class="form-control">
					<input type="hidden" name="kelas" id="kelas" value="" class="form-control">
					<input type="hidden" value="<?= date('Y-m-d'); ?>" name="tanggal_pembayaran" class="form-control">

					<tr>
						<td class="fw-bolder">Nominal Pembayaran</td>
						<td>:</td>
						<td>
							<input type="number" id="nominal" name="nominal" class="form-control" required>
							<span id="formattedNominal"></span>
						</td>
					</tr>
			</table>
			<div class="pull-right">
				<input type="hidden" name="tambah" value="tambah">
				<button type="submit" class="btn btn-primary btn-md"><i class="ti ti-discount-check-filled"></i></button>
				</form>
				<a href="?buka=transaksi_pembayaran" class="btn btn-green btn-md"><i class="ti ti-arrow-back-up"></i></a>
			</div>
		</div>
		<div class="col-sm-7">
			<table class="table table-striped">
				<tr style="background:black">
					<td colspan="3" class="fw-bold fs-1 text-white">History Pembayaran</td>
				</tr>
				<table class="table">
					<thead>
						<tr>
							<th scope="col" class="fw-bolder text-center">No</th>
							<th scope="col" class="fw-bolder text-center">Nama</th>
							<th scope="col" class="fw-bolder text-center">Tanggal Pembayaran</th>
							<th scope="col" class="fw-bolder text-center">Jumlah Bayar</th>
							<th scope="col" class="fw-bolder text-center">Sisa Belum Dibayar</th>
							<th scope="col" class="fw-bolder text-center">Aksi</th>
						</tr>
					</thead>
					<tbody id="data-history">
					</tbody>
				</table>
			</table>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	document.getElementById('nominal').addEventListener('input', function() {
		var numericValue = parseFloat(this.value);
		var formattedValueElement = document.getElementById('formattedNominal');

		if (!isNaN(numericValue)) {
			var formattedValue = formatRupiah(numericValue);
			formattedValueElement.textContent = formattedValue;
		} else {
			formattedValueElement.textContent = '';
		}
	});

	function formatRupiah(angka) {
		return 'Rp ' + angka.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
	}

	$(document).ready(function() {
		$("#search-button").click(function() {
			var nisn = $("#search-nisn").val().trim();

			if (nisn !== "") {
				$.ajax({
					type: "POST",
					url: "./backend/router/view.php?URL=Search Data",
					data: {
						nisn: nisn
					},
					dataType: 'json',
					success: function(response) {
						if (response.error) {
							$("#results-nisn").html('<div>' + response.error + '</div>');
							$("#data-history").html('');
						} else {
							// Process siswaData
							var siswaData = response.siswaData[0];
							$("#nisn").val(siswaData.nisn);
							$("#kelas").val(siswaData.kelas);

							var html = '<div>' +
								'Nama: ' + siswaData.nama + '<br>' +
								'Kelas: ' + siswaData.kelas +
								'</div>';
							$("#results-nisn").html(html);
							$("#results-tunggu").hide();

							// Process siswaHistory
							var tbl = '';
							$.each(response.siswaHistory, function(index, siswaHistory) {
								tbl += '<tr>' +
									'<td>' + (index + 1) + '</td>' +
									'<td>' + siswaHistory.nama_siswa + '</td>' +
									'<td>' + siswaHistory.tggl_bayar + '</td>' +
									'<td>' + formatRupiah(siswaHistory.jmlh_bayar) + '</td>' +
									'<td>' + formatRupiah(siswaHistory.sisa) + '</td>' +
									'<td>' +
									'<a href="./backend/router/view.php?URL=Cetak%20Transaksi&id_spp=' + siswaHistory.id_spp + '" class="btn btn-primary"><i class="ti ti-printer"></i></a>' +
									'<a href="./backend/router/view.php?URL=Delet%20Data%20Transaksi&id_spp=' + siswaHistory.id_spp + '" class="btn btn-danger" onclick="return confirm("Apakah Anda Yakin Akan Menghapus Data")"><i class="ti ti-trash"></i></a>' +
									'</td>' +
									'</tr>';
							});

							$("#data-history").html(tbl);
						}
					},
					error: function() {
						alert("Error in Ajax request");
					}
				});
			} else {
				alert("Masukkan NISN terlebih dahulu.");
			}
		});
	});
</script>