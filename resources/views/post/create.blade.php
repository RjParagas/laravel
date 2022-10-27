@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post Detail Form</li>
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
              <form action="{{ url('add-post') }}" method="POST">
              @csrf
                <div class="card-body">
                
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" row="10" class="form-control"  placeholder="Enter Description:"></textarea>
                        </div>

                        <div class="form-group" hidden>
                            <label for="url">URL</label>
                            <textarea type="text" name="url" class="form-control">gs://construk2waste-8d4a3.appspot.com/post/c2wlogo.png</textarea>
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