@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Rating Detail Lists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lists of Rating Details</li>
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
                 <h3 class="card-title">User's Rating</h3>
              </div>
                 <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                            <tr>
                                <th>Comment</th>
                                <th>Hauler Name</th>
                                <th>Rate</th>
                                 <th>Date and Time</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           @if($ratings)
                           @foreach($ratings as $key => $item)
                            <tr>
                                <td>{{ $item['comment'] }}</td>
                                <td>{{ $item['haulerName'] }}</td>
                                <td>{{ $item['ratingReview'] }}</td>
                                <td>{{ $item['date_created'] }}</td>


                                <td><a href="{{ url('delete-ratings/'.$key) }}" class="btn btn-sm btn-danger">DELETE</a></td>
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