@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4 text-center my-4">Data Statistik</h1>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Data</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataStatistik as $data)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $data->nama }}" name="nama_data">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" value="{{ $data->nilai }}" name="nilai_data">
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" onclick="hapusData({{ $data->id }})">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary" onclick="tambahData()">Tambah Data</button>
                        <button class="btn btn-success" onclick="simpanPerubahan()">Simpan Perubahan</button>
                        <button class="btn btn-secondary" onclick="resetData()">Reset</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Hasil Perhitungan Statistik</h3>
                        <p class="h4">Mean (Rata-rata): {{ $mean }}</p>
                        <p class="h4">Modus (Nilai yang Paling Sering Muncul): {{ $modus }}</p>
                        <p class="h4">Median (Nilai Tengah): {{ $median }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart-container mt-4">
            <canvas id="statistikChart"></canvas>
        </div>
    </div>

    <script>
        // Kode JavaScript untuk menggambar grafik
        var ctx = document.getElementById('statistikChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mean', 'Modus', 'Median'],
                datasets: [{
                    label: 'Hasil Statistik',
                    data: [{{ $mean }}, {{ $modus }}, {{ $median }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fungsi untuk menambahkan data
        function tambahData() {
            // Implementasikan logika penambahan data di sini
        }

        // Fungsi untuk menghapus data
        function hapusData(id) {
            // Implementasikan logika penghapusan data di sini
        }

        // Fungsi untuk menyimpan perubahan data
        function simpanPerubahan() {
            // Implementasikan logika penyimpanan perubahan data di sini
        }

        // Fungsi untuk mereset data
        function resetData() {
            // Implementasikan logika reset data di sini
        }
    </script>
@endsection
