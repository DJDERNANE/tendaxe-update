@extends('layouts.adminStorePanel')

@section('title', 'Dashbord')
@section('content')

    <div class="grid-container">
       
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Livres',
                    'Retour',
                    'Confirmes'
                ],
                datasets: [{
                    label: 'Products',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false // Disable display of labels
                    }
                }
            }
        });
    </script>

@endsection
