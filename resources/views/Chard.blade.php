@extends('template.base')

@section('title', 'Chart')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Chart User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Chart User</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ENd Header -->

<!-- chart -->
<section class="content">
<div class="container-fluid">
    <h1 class="text-center">Chart Data User</h1>
    <div id="chart">

    </div>
</div>
</section>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/10/highcharts.js"></script>
<script type="text/javascript">
    var user = <?php echo json_encode($user) ?>;
    Highcharts.chart('chart', {
        title:{
            title:"Data user"
        },
        xAxis:{
            categories: [ 'Admin', 'Customer'
                ]
        },
        yAxis:{
           title:{
            text:"Jumlah User"
           }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
            }
        },
        series:[{
            name:'User',
            data:user
        }],
        responsive:{
            rules:[{
                condition:{
                    maxWidth:500
                },
                chartOptions:{
                    legend:{
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    })
</script>
<!-- ENDchart -->
@endsection