@extends('layouts.master')

 
@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

               <div class="panel">
                    <div id="chartNilai"></div>
               </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection


@section('grafik')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Penilaian PKL Siswa'
        },
        subtitle: {
            text: 'Semangat !!!'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5]

        }]
    });
</script>
@endsection