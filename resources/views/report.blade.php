<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="col-12">
        <div id="container"></div>
    </div>

    <div class="p-6">
        <hr>
        <hr>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tamus as $key=>$item)                    
                    <tr>
                        <td>{{ ++$key  }}</td>
                        <td>{{ $item->nama }}</td>
                        @php
                            $today = time();
                        @endphp
                        <td>{{ date('H:i:s', strtotime($item->updated_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </table>
        </div>
        <div class="col-12 col-md-6">
            <h1 class="text-center p-2">Informasi Tamu</h1>
            <div class="row text-center">
                <div class="col-12 col-md-6">
                    <h4>Jumlah Tamu yang hadir : {{ $jumlah_hadir }}</h4>
                </div>
                <div class="col-12 col-md-6">
                    <h4>Jumlah Tamu belum hadir : {{ $jumlah_tamu-$jumlah_hadir }}</h4>
                </div>
            </div>
            <h3 class="text-center" style="padding-top: 30px">Jumlah Tamu Total : <b>{{ $jumlah_tamu }}</b></h3>
        </div>
    </div>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var tamuData = <?php echo json_encode($tamuData)?>;

    Highcharts.chart('container', {
        title: {
            text: 'Kedatangan Tamu'
        },
        subtitle: {
            text: 'Source: Odete Jaya Kreatif'
        },
        xAxis: {
            categories: '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00',
                '21:00', '22:00'
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Tamu Undangan'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Tamu Undangan',
            data: tamuData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
</body>
</html>