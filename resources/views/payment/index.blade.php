@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Landholders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lists of Landholders</li>
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
                  <h5 class="d-inline">List of Landholders</h5>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered datatable" >
                  <thead>
                    <tr>
                    <th class="text-center">ID</th>
                        <th>Full Name</th>
                        <th>Last Name</th>
                        <th>Payment Date</th>
                        <th>Account Status</th>
                        <th>Payment Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                        <tbody>

                            @if($users)
                            @php $i = 1; @endphp
                                @foreach($users as $key => $item)
                                @if(($item['userType'] == 'Landholder') && ($item['isVerified'] != '3'))
                                @if($item['verification_status'] == 'approved')
                                    <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $item['firstname'] ?? 'Item Not Found' }}</td>
                                        <td>{{ $item['lastname'] ?? 'Item Not Found' }}</td>
                                        <td>{{ $item['paymentDate'] ?? 'Item Not Found' }}</td>
                                        <td>
                                            @if($item['notificationStatus'] == '1')
                                                <strong style="color:#d9534f">Locked Account</strong>
                                            @elseif($item['notificationStatus'] == '0')
                                                <strong style="color:#5cb85c">Authorized Account</strong>
                                            @else
                                            {{ $item['notificationStatus'] ?? 'Item Not Found' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($item['notification'] == '1')
                                              @if($item['paymentRequest'] == '0')
                                                <strong style="color:#d9534f">Needs to Resubmit</strong>
                                              @endif
                                            @elseif($item['paymentRequest'] == '0')
                                                <strong style="color:#5cb85c">No Application Yet</strong>
                                            @elseif($item['paymentRequest'] == '1')
                                                <strong style="color:#f0ad4e">Application Submitted</strong>
                                            @else
                                            {{ $item['paymentRequest'] ?? 'Item Not Found' }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('show-payment/'.$key) }}" class="btn btn-sm btn-primary"><i class="fa fa-desktop"></i> &nbsp; Show</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
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