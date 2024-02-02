@extends('layouts.main')

@section('content')
    <div class="admin">
        <div class="grafik">
            <h1>Grafik Penyewaan Kendaraan</h1>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Angkutan Orang', 'Angkutan Barang', ],
                datasets: [{
                    label: 'Data Penyewaan',
                    backgroundColor: "rgb(210, 69, 69)",
                    data: [{{ $jumlahData['angkutanOrang'] }}, {{ $jumlahData['angkutanBarang'] }}],
                    borderWidth: 2
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
    </script>
@endsection

@section('content-2')
    <div class="scroll">
        @if ($dataPenyewaan->count() == 0)
            <h1>Belum ada penyewaan yang diajukan</h1>
        @else
            @include('table-data-penyewaan')
        @endif
    </div>
@endsection
