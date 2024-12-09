@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-6">
            <canvas id="winnersPerDayChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="remainingWinnersChart"></canvas>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <canvas id="winnersPerTurnChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="winnersPerStoreChart"></canvas>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <canvas id="winningPlaysChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="losingPlaysChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const winnersPerDayCtx = document.getElementById('winnersPerDayChart').getContext('2d');
        const remainingWinnersCtx = document.getElementById('remainingWinnersChart').getContext('2d');
        const winnersPerTurnCtx = document.getElementById('winnersPerTurnChart').getContext('2d');
        const winnersPerStoreCtx = document.getElementById('winnersPerStoreChart').getContext('2d');
        const winningPlaysCtx = document.getElementById('winningPlaysChart').getContext('2d');
        const losingPlaysCtx = document.getElementById('losingPlaysChart').getContext('2d');

        const winnersPerDayChart = new Chart(winnersPerDayCtx, {
            type: 'bar',
            data: {
                labels: @json($days),
                datasets: [{
                    label: 'Winners Per Day',
                    data: @json($winnersPerDay),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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

        const remainingWinnersChart = new Chart(remainingWinnersCtx, {
            type: 'bar',
            data: {
                labels: @json($days),
                datasets: [{
                    label: 'Remaining Winners Per Day',
                    data: @json($remainingWinners),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
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

        const winnersPerTurnChart = new Chart(winnersPerTurnCtx, {
            type: 'bar',
            data: {
                labels: @json($turns),
                datasets: [{
                    label: 'Winners Per Turn',
                    data: @json($winnersPerTurn),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
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

        const winnersPerStoreChart = new Chart(winnersPerStoreCtx, {
            type: 'bar',
            data: {
                labels: @json($stores),
                datasets: [{
                    label: 'Winners Per Store',
                    data: @json($winnersPerStore),
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
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

        const winningPlaysChart = new Chart(winningPlaysCtx, {
            type: 'pie',
            data: {
                labels: ['Winning Plays', 'Losing Plays'],
                datasets: [{
                    data: [@json($winningPlays), @json($losingPlays)],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });

        const losingPlaysChart = new Chart(losingPlaysCtx, {
            type: 'pie',
            data: {
                labels: ['Winning Plays', 'Losing Plays'],
                datasets: [{
                    data: [@json($winningPlays), @json($losingPlays)],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
