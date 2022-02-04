@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection
@section('css')
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            datasets: [{
                label: 'My First Dataset',
                data: [<?php echo $chart['agama'] ?>, <?php echo $chart['mipa'] ?>, <?php echo $chart['ips'] ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
            }],
            labels: [
                'Agama',
                'MIPA',
                'IPS'
            ]
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection

@section('dashboard')
active
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-6">

    </div>
</div>
@endsection
