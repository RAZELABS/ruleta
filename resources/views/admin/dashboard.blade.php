@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row counters counters-text-1 mb-2">
        <div class="col-sm-12 col-lg-4 mb-4 mb-lg-0">
            <div class="counter-1">
                <strong id="totalParticipantes"><span class="text-counter-1">{{ $totalParticipantes }}</span></strong>
                <label>Total participantes</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter-1">
                <strong id="totalGanadores"><span class="text-counter-1">{{ $totalGanadores }}</span></strong>
                <label>Total Ganadores</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter-1">
                <strong id="totalPerdedores"><span class="text-counter-1">{{ $totalPerdedores }}</span></strong>
                <label>Total Perdedores</label>
            </div>
        </div>
    </div>
    <div class="row counters counters-text">
        <div class="col-sm-12 col-lg-4 mb-4 mb-lg-0">
            <div class="counter py-3">
                <strong id="totalParticipantesDia">{{ $totalGanadoresDia + $totalPerdedoresDia }}</strong>
                <label>Participantes del día</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter py-3">
                <strong id="totalGanadoresDia">{{ $totalGanadoresDia }}</strong>
                <label>Ganadores del día</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter py-3">
                <strong id="totalPerdedoresDia">{{ $totalPerdedoresDia }}</strong>
                <label>Perdedores del día</label>
            </div>
        </div>
    </div>
</div>
@if ($totalParticipantes >=1)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="winnersChart" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts-head')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        $.ajax({
            url: '{{ route("admin.dashboard.data") }}',
            method: 'GET',
            success: function(response) {
                var data = google.visualization.arrayToDataTable([
                    ['Tienda', 'Ganadores', 'Perdedores'],
                    ...response.stores.map((store, index) => {
                        if (response.winnersPerStore[index] > 0 || response.losersPerStore[index] > 0) {
                            return [store, response.winnersPerStore[index], response.losersPerStore[index]];
                        }
                    }).filter(item => item !== undefined)
                ]);

                var options = {
                    title: 'Ganadores y Perdedores por Tienda (Hoy)',
                    titleTextStyle: {
                        fontSize: 18,
                        bold: true,
                        color: '#343E49'
                    },
                    bars: 'horizontal',
                    hAxis: {
                        title: 'Cantidad',
                        minValue: 0
                    },
                    vAxis: {
                        title: 'Tienda'
                    },
                    colors: ['#AAD500', '#343E49'],
                    height: '100%',
                    width: '100%',
                    responsive: true,
                    backgroundColor: 'transparent'
                };

                var chart = new google.visualization.BarChart(document.getElementById('winnersChart'));
                chart.draw(data, options);

                // Update counters
                $('#totalParticipantes').text(response.totalParticipantes);
                $('#totalGanadores').text(response.totalGanadores);
                $('#totalPerdedores').text(response.totalPerdedores);
                $('#totalParticipantesDia').text(response.totalGanadoresDia + response.totalPerdedoresDia);
                $('#totalGanadoresDia').text(response.totalGanadoresDia);
                $('#totalPerdedoresDia').text(response.totalPerdedoresDia);
            }
        });
    }

    setInterval(drawChart, 10000); // Update every 10 seconds
</script>
@endpush
