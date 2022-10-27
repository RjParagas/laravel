@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update User Schedule Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Schedule Details</li>
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

    <div class="container-fluid fade show m-3" >
       <a href="{{url('schedule')}}" class="btn btn sm btn-danger float-end">Back</a>
      
    </div>

    

<!-- Main content -->

              
<section class="content">

<div class="row">

      <div class="col-md-6">
      
             <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><b>Schedule Details</b></h3>
                   <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                <form action="{{ url('update-schedule/'.$key) }}" method="POST">
              @csrf
              @method ('PUT')

              

                    <div class="row">

                    <div class="col-4">
                                <label for="userName">Username</label>
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-user-alt"></i>
                                  </span>
                                <input type="text" name="userName" class="form-control"   value="{{$editdata['userName']}}"disabled>
                            </div>
                            </div>

                            <div class="col-4">
                                <label for="date">Date</label>
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-calendar-day"></i>
                                  </span>
                                <input type="text" name="date" class="form-control"  value="{{$editdata['date']}}"disabled>
                            </div>
                            </div>

                            <div class="col-4">
                                <label for="time">Time</label>
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                       <i class="fas fa-clock"></i>
                                  </span>
                                <input type="text" name="time" class="form-control"  value="{{$editdata['time']}}"disabled>
                            </div>
                            </div>

                            
                    </div>


                      <label for="location">Location:</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-map-marked-alt"></i>
                    </span>
                  </div>
                            <input type="text" name="location" class="form-control"  value="{{$editdata2['location']}}"disabled>
                        </div>

                    <div class="row">

                            <div class="col-4">
                                <label for="wasteType">Type of Waste</label>
                                <input type="text" name="wasteType" class="form-control"  value="{{$editdata['wasteType']}}"disabled>
                            </div>

                            <div class="col-8">
                                <label for="wasteDesc">Waste Description</label>
                                <textarea class="form-control" row="3"  name="wasteDesc"disabled>{{$editdata['wasteDesc']}}</textarea>
                            </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-3">
                            <label for="driver">Hauler Name:</label>
                                <select class="form-control" name="driver" value="{{ $editdata['driver'] }}">
                                <option> {{$editdata['driver']}} </option>
                              
                                            @if($hauler)
                                                @foreach($hauler as $key => $item)
                                                    <option >{{ $item['firstname'] ?? 'Item not found' }} {{ $item['lastname'] ?? 'Item not found' }}</option>
                                                @endforeach
                                            @endif
                                </select>
                        </div>

                         <div class="col-sm-3">
                            <label for="driverUser">Hauler UserName:</label>
                                <select class="form-control" name="driverUser" value="{{ $editdata['driverUser'] }}">
                                
                                            @if($hauler)
                                                @foreach($hauler as $key => $item)
                                                    <option value="{{$item['userName']}}" {{ $item['userName'] == $editdata['driverUser'] ? 'selected' :'' }}>{{ $item['userName'] ?? 'Item not found' }}</option>
                                                @endforeach
                                            @endif
                                </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="plate">Hauler Plate Number:</label>
                                <select class="form-control" name="plate" value="{{ $editdata['plate'] }}">
                               
                                
                                            @if($truck)
                                                @foreach($truck as $key => $item)
                                                    <option value="{{ $item['plateNo']}}" {{ $item['plateNo'] == $editdata['plate'] ? 'selected' :'' }}>{{ $item['plateNo'] ?? 'Item not found' }}</option>
                                                @endforeach
                                            @endif
                                </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="update">Status:</label>
                                <select class="form-control" name="update" value="{{$editdata['update']}}">
                                
                                <option> {{$editdata['update']}} </option>
                               
                                        <option value="Pending">Pending</option>
                                        <option value="Dispatch Hauler">Dispatch Hauler</option>
                                        <option value="Waste Collected">Waste Collected</option>
                                        <option value="Waste being transport to MRF">Waste being transport to MRF</option>
                                        <option value="Vacant">Waste arrived at MRF</option>
                                        <option value="Waste Segregation Processing">Waste Segregation Processing</option>
                                        <option value="Waste Recycling Process">Waste Recycling Process</option>
                                      
                                        <option value="Finished">Finished</option>    
                                </select>
                        </div>

                     </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Update</button>
                  
                </div>
              </form>
            </div>
            <!-- /.card -->
       
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->



      <div class="col-md-6">
      
                 <div class="card card-danger collapsed-card">
              <div class="card-header" >
                  <h3 class="card-title"><b>Assign To:</b></h3>
                   <div class="card-tools" >
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
              <!-- /.card-header -->
              <!-- form start -->
              
             
                <div class="card-body">
                <form action="{{ url('store-schedule') }}" method="POST">
              @csrf

              <div class="form-group">
                            <label for="name">Name:</label>
                             <div class="input-group">
                        <div class="input-group-prepend">
                    <span class="input-group-text">
                     <i class="fas fa-user-alt"></i>
                    </span>
                  </div>
                            <input type="text" name="name" class="form-control"  value="{{$editdata2['name']}}">
                            
                        </div>
                        @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                        </div>



                    <div class="row">

                     <div class="col-6">
                                <label for="contactNo">Contact Number:</label>
                               
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-calendar-day"></i>
                                  </span>
                                <input type="text" name="contactNo" class="form-control"  value="{{$editdata2['contactNo']}}">
                               
                            </div>
                             @if($errors->has('contactNo'))
                                <span class="text-danger">{{ $errors->first('contactNo') }}</span>
                                @endif
                            </div>

                            <div class="col-6">
                                <label for="clientUser">Client Username:</label>
                                
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                        <i class="fas fa-user-alt"></i>
                                  </span>
                                <input type="text" name="clientUser" class="form-control"  value="{{$editdata2['userName']}}">
                               
                            </div>
                             @if($errors->has('clientUser'))
                                <span class="text-danger">{{ $errors->first('clientUser') }}</span>
                                @endif
                            </div>

                          
                    </div>


                      <label for="location">Location:</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-map-marked-alt"></i>
                    </span>
                  </div>
                            <input type="text" name="location" class="form-control"  value="{{$editdata2['location']}}">
                           
                        </div>
                         @if($errors->has('location'))
                                <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif


                      <div class="row">
                        <div class="col-6">
                       <label for="date">Date:</label>
                          <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-calendar-day"></i>
                                  </span>
                                  <input type="text" name="date" class="form-control"   value="{{$editdata2['date']}}">
                                  
                          </div>
                          @if($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                          
                        </div>
                        <div class="col-6">
                       <label for="date">Time:</label>
                          <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-clock"></i>
                                  </span>
                                  <input type="text" name="time" class="form-control"  value="{{$editdata2['time']}}">
                                  
                          </div>
                          @if($errors->has('time'))
                                <span class="text-danger">{{ $errors->first('time') }}</span>
                                @endif
                          
                        </div>
                      </div>
                    
                  

                     <div class="row">

                            <div class="col-4">
                                <label for="wasteType">Type of Waste:</label>
                                <input type="text" name="wasteType" class="form-control"  value="{{$editdata2['wasteType']}}">
                                @if($errors->has('wasteType'))
                                <span class="text-danger">{{ $errors->first('wasteType') }}</span>
                                @endif
                            </div>

                            <div class="col-8">
                                <label for="wasteDesc">Waste Description:</label>
                                <textarea class="form-control" row="3"  name="wasteDesc">{{$editdata2['wasteDesc']}}</textarea>
                                @if($errors->has('wasteDesc'))
                                <span class="text-danger">{{ $errors->first('wasteDesc') }}</span>
                                @endif
                            </div>

                    </div>

                    <div class="row">
                 <div class="col-6">
                            <label for="userName">Hauler UserName:</label>
                            <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-user-alt"></i>
                                  </span>
                            <input type="text" name="userName" class="form-control"  value="{{$editdata2['driverUser']}}">
                           
                        </div>
                         @if($errors->has('userName'))
                                <span class="text-danger">{{ $errors->first('userName') }}</span>
                                @endif
                        </div>
            
                        <div class="col-6">
                            <label for="update">Status:</label>
                            <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fas fa-sticky-note"></i>
                                  </span>
                            <input type="text" name="update" class="form-control"  value="{{$editdata2['update']}}">
                           
                        </div>
                         @if($errors->has('update'))
                                <span class="text-danger">{{ $errors->first('update') }}</span>
                                @endif
                        </div>

                       

                     </div>

                     <div class="form-group">

                            <label for="payment">Payment Status:</label>
                            <div class="input-group">
                        <div class="input-group-prepend">
                    <span class="input-group-text">
                     <i class="fas fa-receipt"></i>
                    </span>
                  </div>
                                <select class="form-control" name="payment">
                                <option value="Not yet Paid">Not yet Paid</option>
                                        <option value="Paid">Paid</option>
                                        
                                </select>
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
        <!-- /.row -->
      </div>




      </div>
    </section>
    <!-- /.content -->
@endsection