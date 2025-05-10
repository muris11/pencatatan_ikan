@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div>
</div>
@endsection

@section('content')
@php
    // Data konsumsi tahunan (2016–2023)
    $labels = ['2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023','2024'];
    $konsumsiTahunan = [46.04, 48.71, 50.84, 55.13, 57.28, 58.13, 58.5, 59.87, 60];

    // Data konsumsi jenis ikan 2024 (dari data kedua)
    $jenisIkan = [
        'Ekor Kuning' => 137,
        'Tongkol' => 474,
        'Tuna' => 9,
        'Tenggiri' => 54,
        'Selar' => 131,
        'Teri' => 81,
        'Bandeng' => 1221,
        'Gabus' => 226,
        'Mujair' => 1093,
        'Mas' => 690,
        'Nila' => 526,
        'Lele' => 882
    ];
@endphp

<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Konsumsi Ikan Per Tahun (KG/Kapita)</h3>
    </div>
    <div class="card-body">
        <canvas id="chartTahunan" height="100"></canvas>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Konsumsi Ikan Berdasarkan Jenis - Indramayu 2024 (gram/minggu)</h3>
    </div>
    <div class="card-body">
        <canvas id="chartJenisIkan" height="100"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart konsumsi per tahun
    new Chart(document.getElementById('chartTahunan'), {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'KG/Kapita',
                data: @json($konsumsiTahunan),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Konsumsi Ikan Tahunan di Kabupaten Indramayu'
                },
                legend: {
                    position: 'top'
                }
            }
        }
    });

    // Chart konsumsi per jenis ikan
    new Chart(document.getElementById('chartJenisIkan'), {
        type: 'bar',
        data: {
            labels: @json(array_keys($jenisIkan)),
            datasets: [{
                label: 'Gram/Minggu',
                data: @json(array_values($jenisIkan)),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'x',
            plugins: {
                title: {
                    display: true,
                    text: 'Konsumsi Ikan per Jenis di Kabupaten Indramayu Tahun 2024'
                },
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
