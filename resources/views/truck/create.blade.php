@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Truck Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Truck Information Form</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                  <a href="{{url('truck')}}" class="btn btn sm btn-danger float-end">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('add-truck') }}" method="POST">
              @csrf
                <div class="card-body">
                
                        <div class="form-group">
                            <label for="plateNo">Plate Number</label>
                            <input type="text" name="plateNo" class="form-control"  placeholder="Enter Plate Number:">
                             @if($errors->has('plateNo'))
                                <span class="text-danger">{{ $errors->first('plateNo') }}</span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" class="form-control"  placeholder="Enter Model:">
                             @if($errors->has('model'))
                                <span class="text-danger">{{ $errors->first('model') }}</span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" name="brand" class="form-control"  placeholder="Enter Brand:">
                             @if($errors->has('brand'))
                                <span class="text-danger">{{ $errors->first('brand') }}</span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" class="form-control"  placeholder="Enter Type:">
                             @if($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                        </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
       </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection