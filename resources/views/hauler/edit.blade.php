@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Hauler Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Hauler Information Form</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <strong>Error!</strong> 
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
      </button>
        </div>
    @endif

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                    <a href="{{url('hauler')}}" class="btn btn sm btn-danger float-end">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('update-hauler/'.$key) }}" method="POST">
              @csrf
              @method ('PUT')
                <div class="card-body">

                    <div class="row">
                            <div class="col-4">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" class="form-control"  value="{{$editdata['firstname']}}">
                                @if($errors->has('firstname'))
                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>

                            <div class="col-4">
                                <label for="firstname">Middle Name</label>
                                <input type="text" name="middlename" class="form-control"  value="{{$editdata['middlename']}}">
                                @if($errors->has('middlename'))
                                <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                @endif
                            </div>

                            <div class="col-4">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control"   value="{{$editdata['lastname']}}">
                                @if($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                    </div>
                    
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control"  value="{{$editdata['address']}}">
                            @if($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                        </div>

                    <div class="row">

                            <div class="col-4">
                                <label for="phoneNo">Phone Number</label>
                                <input type="text" name="phoneNo" class="form-control"  value="{{$editdata['phoneNo']}}">
                                @if($errors->has('phoneNo'))
                                <span class="text-danger">{{ $errors->first('phoneNo') }}</span>
                                @endif
                            </div>

                            <div class="col-4">
                                <label for="userName">Username</label>
                                <input type="text" name="userName" class="form-control"  value="{{$editdata['userName']}}">
                                @if($errors->has('userName'))
                                <span class="text-danger">{{ $errors->first('userName') }}</span>
                                @endif
                            </div>

                            <div class="col-4">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control"  value="{{$editdata['password']}}">
                                @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                    </div>

                    <div class="row">
                    
                        <div class="col-sm-4">
                            <label for="gender">Gender:</label>
                                <select class="form-control" name="gender" value="{{$editdata['gender']}}">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                </select>
                                
                        </div>

                        <div class="col-sm-4">
                            <label for="available">Availability:</label>
                                <select class="form-control" name="available" value="{{$editdata['available']}}">
                                        <option value="Vacant">Vacant</option>
                                        <option value="Occupied">Occupied</option>
                                </select>
                              
                        </div>

                        {{-- <div class="col-sm-4">
                            <label for="password">Plate Number:</label>
                                <select class="form-control" name="truck" value="{{ $editdata['truck'] }}">
                                            @if($truck)
                                                @foreach($truck as $key => $item)
                                                    <option>{{ $item['plateNo'] ?? 'Item not found' }}</option>
                                                @endforeach
                                            @endif
                                </select>
                              
                        </div> --}}
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