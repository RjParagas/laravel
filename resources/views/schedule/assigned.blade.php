@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assigned to Hauler</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assigned Schedule Form</li>
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
                    <a href="{{url('schedule')}}" class="btn btn sm btn-danger float-end">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('store-schedule') }}" method="POST">
              @csrf
             
                <div class="card-body">

                    <div class="row">
                            <div class="col-4">
                                <label for="clientUser">Client User:</label>
                                <input type="text" name="clientUser" class="form-control"  value="{{$editdata2['userName']}}">
                            </div>

                            <div class="col-4">
                                <label for="contactNo">Contact Number</label>
                                <input type="text" name="contactNo" class="form-control"  value="{{$editdata2['contactNo']}}">
                            </div>

                            <div class="col-4">
                                <label for="date">Last Name</label>
                                <input type="text" name="date" class="form-control"   value="{{$editdata2['date']}}">
                            </div>
                    </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control"  value="{{$editdata2['location']}}">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control"  value="{{$editdata2['name']}}">
                        </div>

                     <div class="row">

                            <div class="col-4">
                                <label for="wasteType">Type of Waste</label>
                                <input type="text" name="wasteType" class="form-control"  value="{{$editdata2['wasteType']}}">
                            </div>

                            <div class="col-8">
                                <label for="wasteDesc">Waste Description</label>
                                <textarea class="form-control" row="3"  name="wasteDesc">{{$editdata2['wasteDesc']}}</textarea>
                            </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="payment">Availability:</label>
                                <select class="form-control" name="payment">
                                        <option value="Paid">Paid</option>
                                        <option value="NotPaid">Not yet Paid</option>
                                </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="time">Time</label>
                            <input type="text" name="time" class="form-control"  value="{{$editdata2['time']}}">
                        </div>

                        <div class="col-sm-3">
                            <label for="update">Update</label>
                            <input type="text" name="update" class="form-control"  value="{{$editdata2['update']}}">
                        </div>

                        <div class="col-sm-3">
                            <label for="userName">UserName</label>
                            <input type="text" name="userName" class="form-control"  value="{{$editdata2['driverUser']}}">
                        </div>

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