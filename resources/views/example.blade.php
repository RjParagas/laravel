@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Post Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Post Details Form</li>
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
                    <a href="{{url('post')}}" class="btn btn sm btn-danger float-end">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form action="{{ url('update-post/'.$key) }}" method="POST">
                        @csrf
                        @method ('PUT')
                <div class="card-body">

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{$editdata['description']}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" value="{{$editdata['url']}}" class="form-control">
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