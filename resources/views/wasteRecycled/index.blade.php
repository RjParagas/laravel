@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Waste Recycled List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lists of Waste Recycled</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 @if($status = Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
      <strong>{{ $status }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

<section class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Waste Recycled Details</h3>
              </div>
            
                 <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                            <tr>
                                
                                
                                <th>Type of Waste</th>
                                <th>Weight (kg)</th>
                                <th>Date</th>
                                
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           @if($wasteRecycled)
                           @foreach($wasteRecycled as $key => $item)
                            <tr>
                               
                                
                                <td>{{ $item['wasteType'] }}</td>
                                <td>{{ $item['recycle'] }}</td>
                                 <td>{{ $item['date'] }}</td>
                               
                                <td><a href="{{ url('delete-wasteCollected/'.$key) }}" class="btn btn-sm btn-danger">DELETE</a></td>
                            </tr>
                           
                            @endforeach
                            @endif
                        <tbody>
                        
                        
                    </table>
                    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->

@endsection