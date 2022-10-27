@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Drivers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lists of Drivers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            @if(session('status'))
                <div class="alert alert-warning" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="card card-primary card-outline">
              
              <div class="card-body" style="padding-bottom:0;">
                  <h5 class="d-inline">List of Drivers</h5>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered datatable" >
                  <thead>
                    <tr>
                        <th> title </th>
                    </tr>
                  </thead>
                        <tbody>

                            @if($hauler)
                            @php $i = 1; @endphp
                                @foreach($hauler as $key => $item)
                                    <tr>
                                        <td> content </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                </table>
                </div>
            </div><!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->
  
@endsection