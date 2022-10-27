@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->

{{-- <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}
  
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hauler Information List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lists of Registered Hauler Details</li>
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
                <a href="{{url('add-hauler')}}" class="btn btn sm btn-primary float-end">Register a Hauler</a>
              </div>
              
              <!-- /.card-header -->
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Adress</th>
                                <th>Phone Number</th>
                                <th>Username</th>
                                {{-- <th>Password</th> --}}
                                <th>Availability</th>
                                {{-- <th>Truck Plate Number</th> --}}
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                       </thead>
                       
                        <tbody>
                             @if($hauler)
                             @foreach($hauler as $key => $item)
                            <tr>
                                <td>{{ $item['firstname'] }}</td>
                                <td>{{ $item['lastname'] }}</td>
                                <td>{{ $item['gender'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td>{{ $item['phoneNo'] }}</td>
                                <td>{{ $item['userName'] }}</td>
                                {{-- <td>{{ $item['password'] }}</td> --}}
                                <td>{{ $item['available'] }}</td>
                                {{-- <td>{{ $item['truck'] }}</td> --}}

                                 <td><a href="{{ url('edit-hauler/'.$key) }}" class="btn btn-sm btn-success">EDIT</a></td>
                                 <td><a href="{{ url('delete-hauler/'.$key) }}" class="btn btn-sm btn-danger">DELETE</a></td>
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