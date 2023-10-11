<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Statistik Data</h1>
        <form method="POST" class="form-inline justify-content-center mb-4">
            <div class="form-group mx-sm-3">
                <input type="number" name="data" class="form-control" placeholder="Data" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>No Data</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = isset($_POST['data']) ? $_POST['data'] : "";
                $dataList = isset($_POST['dataList']) ? $_POST['dataList'] : [];
                if ($data !== "") {
                    $dataList[] = $data;
                }
                foreach ($dataList as $key => $value) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Statistik:</h2>
                <p class="card-text">Mean: <span id="mean"><?= calculateMean($dataList) ?></span></p>
                <p class="card-text">Modus: <span id="modus"><?= calculateModus($dataList) ?></span></p>
                <p class="card-text">Median: <span id="median"><?= calculateMedian($dataList) ?></span></p>
            </div>
        </div>
        <canvas id="myChart" width="400" height="200"></canvas>
        <canvas id="histogram" width="400" height="200"></canvas>
    </div>

    <script>
        function calculateMean(dataList) {
            // Fungsi calculateMean sama seperti yang sebelumnya.
        }

        function calculateModus(dataList) {
            // Fungsi calculateModus sama seperti yang sebelumnya.
        }

        function calculateMedian(dataList) {
            // Fungsi calculateMedian sama seperti yang sebelumnya.
        }

        document.getElementById('mean').textContent = calculateMean(<?= json_encode($dataList) ?>);
        document.getElementById('modus').textContent = calculateModus(<?= json_encode($dataList) ?>);
        document.getElementById('median').textContent = calculateMedian(<?= json_encode($dataList) ?>);

        // Membuat grafik persebaran data
        var ctx = document.getElementById('myChart').getContext('2d');
        var dataList = <?= json_encode($dataList) ?>;
        var dataLabels = Array.from({ length: dataList.length }, (_, i) => i + 1);

        var myChart = new Chart(ctx, {
            type: 'scatter',
            data: {
                labels: dataLabels,
                datasets: [{
                    label: 'Data',
                    data: dataList,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointHitRadius: 10,
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom'
                    },
                    y: {
                        min: Math.min(...dataList) - 1,
                        max: Math.max(...dataList) + 1
                    }
                }
            }
        });

        // Membuat histogram
        var histogramCtx = document.getElementById('histogram').getContext('2d');
        var histogram = new Chart(histogramCtx, {
            type: 'bar',
            data: {
                labels: dataLabels,
                datasets: [{
                    label: 'Data',
                    data: dataList,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom'
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
