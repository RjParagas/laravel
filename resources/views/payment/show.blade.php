<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('layouts.partials._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.partials._navbar')
  @include('layouts.partials._sidebar')

  <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $user['firstname'] ?? 'User' }}'s Monthly Payment Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Home</a></li>
              <li class="breadcrumb-item active"><a href = "#">Monthly Payment Request</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    <div class="container-fluid">

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <!-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> -->
        <div class="col-12">
          <img src="{{$payment['receipt']}}" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 product-image-thumbs">
          <div class="product-image-thumb active"><img src="{{$personal['ID_front']}}" alt="Product Image"></div>
          <div class="product-image-thumb" ><img src="{{$personal['ID_back']}}" alt="Product Image"></div>
          <div class="product-image-thumb" ><img src="{{$parking['ID_parkingspace']}}" alt="Product Image"></div>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">Monthly Payment Application - {{ $user['firstname'] ?? '' }} {{ $user['lastname'] ?? '' }}
        </h3>

        @if( $user['notificationStatus'] == '0' ) 
        <p><i class="fa fa-check-circle" style="color:#5cb85c"></i> <strong class = "float-end" style="color:#5cb85c">Authorized Account</strong> </p>
        @elseif( $user['notificationStatus'] == '1' ) 
        <p><i class="fa fa-times-circle" style="color:#d9534f"></i> <strong class = "float-end" style="color:#d9534f">Account Locked</strong> </p>
        @endif 

        <div class="row mt-6">
        <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Payment Application</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Personal Information</a>
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <table class="table table-bordered datatable" >
                    <tr>
                        <th>Full Name</th>
                        <td>{{ $payment['fullname'] ?? 'Item Not Found' }}</td>
                        <th>Reference Number</th>
                        <td>{{ $payment['reference_number'] ?? 'Item Not Found' }}</td>
                    </tr>
                    <tr>
                        <th>GCash Number</th>
                        <td>{{ $payment['gcash_number'] ?? 'Item Not Found' }}</td>
                        <th>Amount Paid</th>
                        <td>{{ $payment['amount_paid'] ?? 'Item Not Found' }}</td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
            <table class="table table-bordered datatable" >
                    <tr>
                        <th>First Name</th>
                        <td>{{ $user['firstname'] ?? 'Item Not Found' }}</td>
                        <th>Birthday</th>
                        <td>{{ $user['birthday'] ?? 'Item Not Found' }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $user['lastname'] ?? 'Item Not Found' }}</td>
                        <th>User Type</th>
                        <td>{{ $user['userType'] ?? 'Item Not Found' }}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{ $user['email'] ?? 'Item Not Found' }}</td>
                        <th>Government ID Type</th>
                        <td>{{ $personal['personal_govIdType'] ?? 'Item Not Found' }}</td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td>{{ $personal['personal_contactno'] ?? 'Item Not Found' }}</td>
                        <th>Government ID No.</th>
                        <td>{{ $personal['personal_govIdNo'] ?? 'Item Not Found' }}</td>
                    </tr> 
                    <tr>
                        <th>House Address</th>
                        <td>{{ $personal['personal_house_address'] ?? 'Item Not Found' }}</td>
                        <th>Expiration Date</th>
                        <td>{{ $personal['personal_exp_date'] ?? 'Item Not Found' }}</td>
                    </tr> 
                </table>
            </div>
        </div>
        </div>

        <hr>

        <div class="mt-4">

            @if( $user['paymentRequest'] == '1' )
            <form action="{{ url('approve-payment/'.$key) }}" method="POST" class="float-left mr-2">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-check-circle fa-lg mr-2"></i>
                    Approve
                </button>

            </form> 

            <form action="{{ url('reject-payment/'.$key) }}" method="POST" class="float-left mr-2">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-danger btn-lg">
                    <i class="fas fa-times-circle fa-lg mr-2"></i>
                    Reject
                </button>

            </form> 

            @elseif( $user['paymentRequest'] == '0' ) 
            <div class="btn btn-success btn-lg disabled">
                <i class="fas fa-check-circle fa-lg mr-2"></i>
                Approve
            </div>

            <div class="btn btn-danger btn-lg disabled">
                <i class="fas fa-times-circle fa-lg mr-2"></i>
                Deny
            </div>
            @endif 
          
        </div>

      </div>
    </div>
    
  </div>
</div>
  <!-- /.card-body -->
  </div>
  </div>

@include('layouts.partials._footer')

</div>

<script src="{{ asset('js/app.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>

    $('.printTable').DataTable({
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })

</script>

</body>
</html>