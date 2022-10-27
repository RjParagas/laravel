@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $haulerC }}</h3>
                <p>Hauler Information</p>
              </div>
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <a href="{{ route('hauler') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $truckC }}</h3>
                <p>Truck Information</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck-moving"></i>
              </div>
              <a href="{{ route('truck') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $ratingsC }}</h3>
                <p>Ratings</p>
              </div>
              <div class="icon">
                <i class="fas fa-star"></i>
              </div>
              <a href="{{ route('ratings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $wasteCollectedC }}</h3>
                <p>Collected Waste</p>
              </div>
              <div class="icon">
               <i class="fas fa-trash-restore"></i>
              </div>
              <a href="{{ route('wasteCollected') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $reportC }}</h3>
                <p>Reports</p>
              </div>
              <div class="icon">
               <i class="far fa-calendar-times"></i>
              </div>
              <a href="{{ route('report') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>
          <!-- /.col (RIGHT) -->

     <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Registered Hauler</b></h3>
                   <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="piechartgender" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of the Hauler Status</b></h3>
                   <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="piechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          </div>

           <div class="form-group">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Hauler Ratings</b></h3>
                   <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="columnchart" >
              </div>
            <!-- /.card-body -->
          </div>
          </div>


<div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Waste being Collected</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="donutchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          

           <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Waste being Recycled</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="donutRchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

      </div><!-- /.rowcard -->

      <div class="form-group">
            <div class="card card-primary ">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Total Location Collecting Construction Waste (District 1)</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="barchart" style=" height: 650px; max-height: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          <div class="form-group">
            <div class="card card-primary ">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Total Location Collecting Construction Waste (District 2)</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="barchart1L" style=" height: 400px; max-height: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          <div class="form-group">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Daily Collected Waste</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="date" >
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          {{-- <div class="form-group">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Daily Collected Waste</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="example" >
              </div>
            <!-- /.card-body -->
          </div>
          </div> --}}


          <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Weekly Collected Waste</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="weekly" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

          

           <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Summary of Monthly Collected Waste</b></h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" id="monthly" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
              </div>
            <!-- /.card-body -->
          </div>
          </div>

      </div><!-- /.rowcard -->

            

        </div>
         
 </div><!-- /.container-fluid -->
</section>


  </div>
  </div><!-- /.container-fluid -->
  

  <!-- /.content-wrapper -->

@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Vacant', 'Occupied',],
                
                @php
                echo "['Vacant', ". $vacant_counter .",],";
                echo "['Occupied', ".$occupied_counter .",],";
                @endphp
            ]);

            var options = {
                is3D: false,
                legend: { position: 'bottom', maxLines: 3 },
                width:550,
                height:230
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['string', 'total',],
                
                @php
                echo "['Male', ". $male_counter .",],";
                echo "['Female', ".$female_counter .",],";
                @endphp
            ]);

            var options = {
                is3D: false,
                legend: { position: 'bottom', maxLines: 3 },
                width:550,
                height:230
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechartgender'));

            chart.draw(data, options);
        }
    </script>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','number',],
                @php
                echo "['Concrete', ". $con_counter .",],";
                echo "['Metal', ".$metal_counter .",],";
                echo "['Mixed C&D Waste', ".$mix_counter .",],";
                echo "['Wood', ".$wood_counter .",],";
                echo "['Glass', ".$glass_counter .",],";
                echo "['Soil', ".$soil_counter .",],";
                @endphp
            ]);

            var options = {
                is3D: false,
                pieHole: 0.4,
                legend: { position: 'bottom', maxLines: 3 },
                width:550,
                height:230
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['Rate of ','Total',],
                @php
                echo "['1.0', ".$one_counter .",],";
                echo "['1.5', ".$one1_counter .",],";
                echo "['2.0', ".$two_counter .",],";
                echo "['2.5', ".$two1_counter .",],";
                echo "['3.0', ".$three_counter .",],";
                echo "['3.5', ".$three1_counter .",],";
                echo "['4.0', ".$four_counter .",],";
                echo "['4.5', ".$four1_counter .",],";
                echo "['5.0', ".$five_counter .",],";
                echo "['5.5', ".$five1_counter .",],";
                @endphp
            ]);

            var options = {
                colors: ['#FF8000'],
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));

            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                @php
                echo "['Concrete', ". $conR_counter .",],";
                echo "['Wood', ".$woodR_counter .",],";
                echo "['Mixed C&D Waste', ".$mixR_counter .",],";
                echo "['Metal', ".$metalR_counter .",],";
                echo "['Glass', ".$glassR_counter .",],";
                echo "['Soil', ".$soilR_counter .",],";

                @endphp
            ]);

            var options = {
                is3D: false,
                pieHole: 0.4,
                legend: { position: 'bottom', maxLines: 3 },
                width:550,
                height:230
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutRchart'));

            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                 
                @php

                echo "['Bagong Ilog', ". $pasig1c .",],";
                echo "['Bagong Katipunan', ". $pasig2c .",],";
                echo "['Bambang', ". $pasig3c .",],";
                echo "['Buting', ". $pasig4c .",],";
                echo "['Caniogan', ". $pasig5c .",],";
                echo "['Kalawaan', ". $pasig6c .",],";
                echo "['Kapasigan', ". $pasig7c .",],";
                echo "['Kapitolyo', ". $pasig8c .",],";
                echo "['Malinao', ". $pasig9c .",],";
                echo "['Oranbo', ". $pasig10c .",],";
                echo "['Palatiw', ". $pasig11c .",],";
                echo "['Pineda', ". $pasig12c .",],";
                echo "['Sagad', ". $pasig13c .",],";
                echo "['San Antonio', ". $pasig14c .",],";
                echo "['San Joaquin', ". $pasig15c .",],";
                echo "['San Jose', ". $pasig16c .",],";
                echo "['San Nicolas', ". $pasig17c .",],";
                echo "['Sta. Cruz', ". $pasig18c .",],";
                echo "['Sta. Rosa', ". $pasig19c .",],";
                echo "['Sto. Tomas', ". $pasig20c .",],";
                echo "['Sumilang', ". $pasig21c .",],";
                echo "['Ugong', ". $pasig22c .",],";
                
                
                @endphp
            ]);

            var options = {
                
                colors: ['#FF0000'],
                legend: 'none'
            };

            var chart = new google.visualization.BarChart(document.getElementById('barchart'));

            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                 
                @php

                
                echo "['Dela Paz', ". $pasig23c .",],";
                echo "['Manggahan', ". $pasig24c .",],";
                echo "['Maybunga', ". $pasig25c .",],";
                echo "['Pinagbuhatan', ". $pasig26c .",],";
                echo "['Rosario', ". $pasig27c .",],";
                echo "['San Miguel', ". $pasig28c .",],";
                echo "['Santolan', ". $pasig29c .",],";
                echo "['Sta. Lucia', ". $pasig30c .",],";
                
                
                
                @endphp
            ]);

            var options = {
                colors: ['#FF0000'],
                legend: 'none'
            };

            var chart = new google.visualization.BarChart(document.getElementById('barchart1L'));

            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                @php
                echo "['18-Oct-2021', ".$date1_c .",],";
                echo "['29-Oct-2021', ".$date2_c .",],";
                echo "['12-Nov-2021', ".$date3_c .",],";
                echo "['13-Nov-2021', ".$date4_c .",],";
                echo "['01-Dec-2021', ".$date5_c .",],";
                echo "['03-Dec-2021', ".$date6_c .",],";
                echo "['04-Dec-2021', ".$date7_c .",],";
                
                @endphp
            ]);

            var options = {
                //curveType: 'function',
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('date'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                @php
                echo "['Oct 17-23, 2021', ".$week1_c .",],";
                echo "['Oct 24-30, 2021', ".$week2_c .",],";
                echo "['Nov 07-13, 2021', ".$week3_c .",],";
                echo "['Nov 28 - Dec 04, 2021', ".$week4_c .",],";
               
               
                
                @endphp
            ]);

            var options = {
                //curveType: 'function',
                colors: ['#1b9e77'],
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('weekly'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                @php
                echo "['October', ".$mon1_c .",],";
                echo "['November', ".$mon2_c .",],";
                echo "['December', ".$mon3_c .",],";
                
                
                @endphp
            ]);

            var options = {
                colors: ['#7570b3'],
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('monthly'));

            chart.draw(data, options);
        }
    </script>

    {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                 ['string','Total',],
                @php
                echo "['weekly', ".$weekly_accepted .",],";
                echo "['monthly', ".$mothly_accepted .",],";
                
                
                @endphp
            ]);

            var options = {
                colors: ['#7570b3'],
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('example'));

            chart.draw(data, options);
        }
    </script> --}}

