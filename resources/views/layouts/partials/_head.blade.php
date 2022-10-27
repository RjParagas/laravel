<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> C2W </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

  <link rel="shortcut icon" href="https://i.ibb.co/h9pZSGz/logo.png" type="image/x-icon">
  <link rel="icon" href="https://i.ibb.co/h9pZSGz/logo.png" type="image/x-icon">

  <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('https://cdn.dribbble.com/users/60166/screenshots/9658993/media/1ff9a0bfb400a51230372141c24b5b0a.jpeg?compress=1&resize=1000x750') }}"/>
  <link rel="icon" href="{{ URL::to('https://cdn.dribbble.com/users/60166/screenshots/9658993/media/1ff9a0bfb400a51230372141c24b5b0a.jpeg?compress=1&resize=1000x750') }}" type="image/x-icon"> -->

  <style>

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: rgba(255, 255, 255, .9);
      color: #343a40;
    }

    /* .mt-1, .my-1 {
      margin-top: 0rem!important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #444;
      height: 30px;
      line-height: 30px ! important;
    }

    .form-control {
      display: block;
      width: 100%;
      height: calc(2.25rem + 7px) ! important;
      padding: .375rem 1rem .375rem .75rem ! important;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      box-shadow: inset 0 0 0 transparent;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .select2-container .select2-selection--single {
      box-sizing: border-box;
      cursor: pointer;
      display: block;
      height: 40px ! important;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 26px;
      position: absolute;
      top: 6px ! important;
      right: 1px;
      width: 20px;
    } */
</style>

  @stack('css')
