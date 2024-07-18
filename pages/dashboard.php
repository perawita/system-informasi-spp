<?php
require_once './backend/app/controller/AdminControllers.php';

$admin = new AdminControllers();
$dashboard = $admin->Dashboard();

$total_siswa = $dashboard['count-siswa'];
$total_users = $dashboard['count-users'];
$data_charts_tahunan = $dashboard['data-charts-tahunan'];
$data_charts_bulanan = $dashboard['data_charts_bulanan'];


function formatRupiah($angka)
{
    if ($angka >= 1000000000) {
        return number_format($angka / 1000000000, 2, ',', '.') . ' Miliar';
    } elseif ($angka >= 100000000) {
        return number_format($angka / 1000000, 0, ',', '.') . ' Juta';
    } elseif ($angka >= 1000000) {
        return number_format($angka / 1000000, 2, ',', '.') . ' Juta';
    } elseif ($angka >= 1000) {
        return number_format($angka / 1000, 0, ',', '.') . ' Ribu';
    } else {
        return number_format($angka, 0, ',', '.');
    }
}

$total_pemasukan = formatRupiah($dashboard['jumlah-pemasukan']);
$total_pemasukan_bulan_ini = formatRupiah($dashboard['jumlah-pemasukan-bulan-ini']);
?>

<div class="col-12">
    <div class="row row-cards">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Total Siswa
                            </div>
                            <div class="text-muted">
                                <?php echo $total_siswa ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Jumlah Petugas
                            </div>
                            <div class="text-muted">
                                <?php echo $total_users; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-twitter text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                    <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                    <path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                    <path d="M3 6v10c0 .888 .772 1.45 2 2" />
                                    <path d="M3 11c0 .888 .772 1.45 2 2" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Total Pemasukan
                            </div>
                            <div class="text-muted">
                                <?php echo $total_pemasukan; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-facebook text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                    <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                    <path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                    <path d="M3 6v10c0 .888 .772 1.45 2 2" />
                                    <path d="M3 11c0 .888 .772 1.45 2 2" />
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Bulanan <?php echo date('F'); ?>
                            </div>
                            <div class="text-muted">
                                <?php echo $total_pemasukan_bulan_ini; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-12">
    <div class="row row-cards">
        <div class="col-sm-6 col-lg-6">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="card-title">Pembayaran spp di tahun</h3>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="selectedYear"><?php echo date('Y'); ?></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <?php
                                    // Gantilah 2020 dengan tahun pertama yang Anda inginkan
                                    for ($year = 2020; $year <= date('Y'); $year++) {
                                        echo '<a class="dropdown-item" href="#" onclick="selectYear(' . $year . ')">' . $year . '</a>';
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChartYear" width="352" height="148" style="display: block; width: 352px; height: 148px;"></canvas>

                    <form action="./backend/router/view.php?URL=CetakBulanan" method="post">
                        <input type="hidden" name="tahun" id="tahun_chart_year" value="">

                        <button type="submit" class="btn btn-green btn-md"><i class="ti ti-file-spreadsheet"></i> Cetak ke excel</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="card-title">Pembayaran spp di bulan</h3>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="selectedMonth"><?php echo date('F'); ?></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <?php
                                    $monthNames = [
                                        'January', 'February', 'March', 'April', 'May', 'June',
                                        'July', 'August', 'September', 'October', 'November', 'December'
                                    ];

                                    foreach ($monthNames as $index => $month) {
                                        echo '<a class="dropdown-item" href="#" onclick="selectMonth(' . ($index + 1) . ')">' . $month . '</a>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="selectedYearForMonth"><?php echo date('Y'); ?></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <?php
                                    // Gantilah 2020 dengan tahun pertama yang Anda inginkan
                                    for ($year = 2020; $year <= date('Y'); $year++) {
                                        echo '<a class="dropdown-item" href="#" onclick="selectYearForMonth(' . $year . ')">' . $year . '</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChartMonth" width="352" height="148" style="display: block; width: 352px; height: 148px;"></canvas>

                    <form action="./backend/router/view.php?URL=CetakHarian" method="post">
                        <input type="hidden" name="bulan" id="bulan_chart_month" value="">
                        <input type="hidden" name="tahun" id="tahun_chart_month" value="">

                        <button type="submit" class="btn btn-green btn-md"><i class="ti ti-file-spreadsheet"></i> Cetak ke excel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once './backend/app/function/crud/read.php';
$read = new Read();
$get_data = $read->TableHistory();
?>
<div class="card-body">
    <h3 class="fw-card-title mt-2 text-center">History Pembayaran</h3>
    <div class="table-responsive">
        <table id="example" class="table table-center table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="w-1">No</th>
                    <th>Nisn</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($get_data as $index => $data) : ?>
                    <tr class="table-primary">
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $data['nisn']; ?></td>
                        <td><?php echo $data['tanggal_pembayaran']; ?></td>
                        <td><?php echo 'Rp ' . number_format($data['nominal'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- bootstrap 5 atribut -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

<script>
    feather.replace({
        'aria-hidden': 'true'
    });

    const myChartDat = {
        labels: [],
        datasets: [{
            data: [],
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff',
        }]
    };

    const myChartConfi = {
        type: 'line',
        data: myChartDat,
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                    ticks: {
                        callback: function(value) {
                            return formatRupiah(value);
                        }
                    }
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        return 'Rp ' + tooltipItem.yLabel.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                    }
                }
            },
            animation: {
                duration: 1000, // Durasi animasi dalam milidetik (misalnya, 1000ms atau 1 detik)
            }
        }
    };

    const myChartCtx = document.getElementById('myChartYear').getContext('2d');
    const myChart = new Chart(myChartCtx, myChartConfi);

    const selectedYearElement = document.getElementById('selectedYear');
    selectedYearElement.addEventListener('change', () => {
        updateConfiguration();
    });

    updateConfiguration();

    function updateConfiguration() {
        const selectedYear = selectedYearElement.value;
        document.getElementById('tahun_chart_year').value = document.getElementById('selectedYear').innerText;
        myChartDat.labels = generateMonthsInYear(parseInt(selectedYear)).map(month => month.label);
        myChartDat.datasets[0].data = generateEnrollmentData(<?php echo json_encode($data_charts_tahunan); ?>, parseInt(selectedYear));
        myChart.update();
        configurasi(); // Call configurasi after updating the chart
    }

    function generateEnrollmentData(filteredData, selectedYear) {
        const data = [];
        const monthlyData = filteredData[selectedYear];

        for (let month = 1; month <= 12; month++) {
            const enrollmentCount = monthlyData ? monthlyData[month] || 0 : 0;
            data.push(enrollmentCount);
        }

        return data;
    }

    function generateMonthsInYear(selectedYear) {
        const result = [];
        for (let month = 1; month <= 12; month++) {
            result.push({
                label: getMonthLabel(month)
            });
        }
        return result;
    }

    function getMonthLabel(month) {
        const monthNames = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];
        return monthNames[month - 1] || '';
    }

    function selectYear(year) {
        document.getElementById('selectedYear').innerHTML = year;
        document.getElementById('tahun_chart_year').value = year;
        configurasi();
    }

    function configurasi() {
        const selectedYear = selectedYearElement.innerHTML;

        // Perbarui data chart dengan data yang sudah difilter
        myChartDat.labels = generateMonthsInYear(parseInt(selectedYear)).map(month => month.label);
        myChartDat.datasets[0].data = generateEnrollmentData(<?php echo json_encode($data_charts_tahunan); ?>, parseInt(selectedYear));

        // Perbarui chart
        myChart.update();
    }
</script>

<script>
    'use strict';

    feather.replace({
        'aria-hidden': 'true'
    });

    // Data untuk chart Results
    const myChartDatM = {
        labels: [],
        datasets: [{
            data: [],
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff',
        }]
    };

    // Konfigurasi chart
    const myChartConfiM = {
        type: 'line',
        data: myChartDatM,
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                    ticks: {
                        callback: function(value) {
                            // Fungsi formatRupiah belum didefinisikan, Anda mungkin perlu mendefinisikannya
                            return formatRupiah(value);
                        }
                    }
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        return 'Rp ' + tooltipItem.yLabel.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                    }
                }
            },
            animation: {
                duration: 1000, // Durasi animasi dalam milidetik (misalnya, 1000ms atau 1 detik)
            }
        }
    };

    const myChartCtxM = document.getElementById('myChartMonth').getContext('2d');
    const myChartM = new Chart(myChartCtxM, myChartConfiM);

    // Event listener untuk perubahan pada filter tahun
    const selectedMonthElementM = document.getElementById('selectedMonth');
    selectedMonthElementM.addEventListener('change', () => {
        // Panggil fungsi updateConfiguration dengan data yang baru
        updateConfiguration();
    });

    const selectedYearElementM = document.getElementById('selectedYearForMonth');
    selectedYearElementM.addEventListener('change', () => {
        // Panggil fungsi updateConfiguration dengan data yang baru
        updateConfiguration();
    });

    // Initial rendering
    updateConfiguration();

    function updateConfiguration() {
        const selectedYearM = selectedYearElementM.innerText;
        const selectedMonth = selectedMonthElementM.innerText;
        document.getElementById('tahun_chart_month').value = document.getElementById('selectedYearForMonth').innerText;
        document.getElementById('bulan_chart_month').value = getMonthIndex(document.getElementById('selectedMonth').innerText);


        // Perbarui data chart dengan data yang sudah difilter
        myChartDatM.labels = generateDatesInYearMonth(parseInt(selectedYearM), selectedMonth);
        myChartDatM.datasets[0].data = generateEnrollmentData(
            <?php echo json_encode($data_charts_bulanan); ?>,
            parseInt(selectedYearM),
            getMonthIndex(selectedMonth),
            generateDates(parseInt(selectedYearM), selectedMonth)
        );

        // Perbarui chart
        myChartM.update();
    }

    function generateEnrollmentData(filteredDataM, selectedYearM, selectedMonth, selectedDates) {
        const dataM = [];

        // Mendapatkan data bulanan untuk tahun dan bulan tertentu
        const monthlyDataM = filteredDataM;

        // Loop melalui tanggal-tanggal yang dipilih
        for (const selectedDate of selectedDates) {
            // Gabungkan tahun, bulan, dan tanggal menjadi format date
            const dateString = `${selectedYearM}-${selectedMonth}-${selectedDate}`;

            // Dapatkan jumlah siswa untuk tanggal tertentu, atau 0 jika tidak ada data
            const enrollmentCountM = monthlyDataM[dateString] || 0;
            console.log(dateString)
            console.log(enrollmentCountM);
            dataM.push(enrollmentCountM);
        }

        return dataM;
    }



    function generateDatesInYearMonth(selectedYearM, selectedMonth) {
        const resultM = [];
        const monthNames = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];

        // Ubah nama bulan menjadi indeks bulan (0-11)
        const monthIndex = monthNames.findIndex(month => month === selectedMonth);

        // Set tahun dan bulan pada tanggal pertama dalam rentang yang dipilih
        const startDate = new Date(selectedYearM, monthIndex, 1);

        // Loop dari tanggal pertama hingga tanggal terakhir
        for (let day = startDate.getDate(); day <= new Date(selectedYearM, monthIndex + 1, 0).getDate(); day++) {
            const currentDate = new Date(selectedYearM, monthIndex, day);
            resultM.push(currentDate.toLocaleDateString('en-GB', {
                day: 'numeric',
                month: 'short'
            }));
        }

        return resultM;
    }


    function generateDates(selectedYearM, selectedMonth) {
        const resultD = [];
        const monthNames = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];

        // Ubah nama bulan menjadi indeks bulan (0-11)
        const monthIndex = monthNames.findIndex(month => month === selectedMonth);

        // Set tahun dan bulan pada tanggal pertama dalam rentang yang dipilih
        const startDate = new Date(selectedYearM, monthIndex, 1);

        // Loop dari tanggal pertama hingga tanggal terakhir
        for (let day = startDate.getDate(); day <= new Date(selectedYearM, monthIndex + 1, 0).getDate(); day++) {
            const currentDate = new Date(selectedYearM, monthIndex, day);
            resultD.push(currentDate.toLocaleDateString('en-GB', {
                day: '2-digit', // Format tanggal menjadi dua digit
            }));
        }

        return resultD;
    }


    function selectYearForMonth(year) {
        document.getElementById('selectedYearForMonth').innerText = year;
        document.getElementById('tahun_chart_month').value = year;
        updateConfiguration();
    }

    function selectMonth(month) {
        document.getElementById('selectedMonth').innerText = getMonthName(month);
        document.getElementById('bulan_chart_month').value = getMonthIndex(month);
        updateConfiguration();
    }

    function getMonthIndex(month) {
        const monthNames = {
            'January': '01',
            'February': '02',
            'March': '03',
            'April': '04',
            'May': '05',
            'June': '06',
            'July': '07',
            'August': '08',
            'September': '09',
            'October': '10',
            'November': '11',
            'December': '12'
        };

        return monthNames[month];
    }

    function getMonthName(month) {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        return monthNames[month - 1];
    }
</script>