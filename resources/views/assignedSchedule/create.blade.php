@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Hauler Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hauler Information Form</li>
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
                 <a href="{{url('assignedSchedule')}}" class="btn btn sm btn-danger float-end">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('add-assignedSchedule') }}" method="POST">
              @csrf
                <div class="card-body">
                
                    <div class="row">
                            <div class="col-4">
                                <label for="plate">Client User:</label>
                                <select class="form-control" name="userName" >
                                            @if($schedule)
                                                @foreach($schedule as $key => $item)
                                                    <option>{{ $item['userName'] ?? 'Item not found' }}</option>
                                                @endforeach
                                            @endif
                                </select>
                            </div>

                            {{--<div class="col-4">
                                <label for="firstname">Middle Name</label>
                                <input type="text" name="middlename" class="form-control"  placeholder="Enter Middle Name">
                            </div>

                            <div class="col-4">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control"  placeholder="Enter Last Name">
                            </div>
                    </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control"  placeholder="Enter Address">
                        </div>

                    <div class="row">

                            <div class="col-4">
                                <label for="phoneNo">Phone Number</label>
                                <input type="text" name="phoneNo" class="form-control"  placeholder="Enter Phone Number">
                            </div>

                            <div class="col-4">
                                <label for="userName">Username</label>
                                <input type="text" name="userName" class="form-control"  placeholder="Enter Phone Number">
                            </div>

                            <div class="col-4">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control"  placeholder="Enter Password">
                            </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="availability">Availability:</label>
                                <select class="form-control" name="available">
                                        <option value="Vacant">Vacant</option>
                                        <option value="Occupied">Occupied</option>
                                </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="password">Plate Number:</label>
                                <select class="form-control" name="truck">
                                            @if($truck)
                                                @foreach($truck as $key => $item)
                                                    <option>{{ $item['plateNo'] ?? 'Item not found' }}</option>
                                                @endforeach
                                            @endif
                                </select>
                        </div>
                     </div>--}}


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