<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Panel</title>
  {{-- {{ asset('Myfile/') }} --}}


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('Myfile/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Myfile/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('user#homePage') }}" class="nav-link"><strong>Home</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block me-20">
        <a href="{{ route('feedback#page') }}" class="nav-link"><strong>Contact</strong></a>
      </li>


    </ul>

    <!-- Right navbar links -->
    <ul class="ml-auto navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('user#message') }}" class="nav-link"><strong>Inbox</strong></a>
          </li>
          <li class=" nav-item d-none d-sm-inline-block">
            <form action="{{ route('logout') }}" method="post"
            class="d-flex justify-content-center">
            @csrf
            <button class="nav-link">
              <strong> Logout</strong></button>
        </form>
          </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <span> <strong>Account</strong> </span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('myFile/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Online Course</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="image">
            @if (Auth::user()->image == null)
            <img
               class=" img-thumbnail" style="height: 50px; width:50px"  src="{{ asset('image/' . (Auth::user()->gender == 'male' ? 'user.png' : 'girl.png')) }}" />
        @else
            <img class=" img-thumbnail" style="height: 50px; width:50px" src="{{ asset('storage/' . Auth::user()->image) }}"
                 />
        @endif
          {{-- <img src="{{ asset('myFile/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Course Outline
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('enrollCourse#page') }}" class="nav-link active">
                    <i class="fa-solid fa-list-check me-2"></i>
                  <p>Enrolled Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('myPayment#page') }}" class="nav-link active">
                    <i class="fa-solid fa-cart-shopping me-2"></i>
                  <p>Payment Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('myClass#page') }}" class="nav-link active">
                    <i class="fa-solid fa-book-open me-2"></i>
                  <p>My Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('myFree#page') }}" class="nav-link active">
                    <i class="fa-solid fa-book-bookmark me-2"></i>
                  <p>My Free Class</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('source')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <a href="{{ route('profile#changePage') }}">
            <button class="m-2 text-white btn btn-dark"> <h5>ChangePassword</h5></button>

        </a>
      <a href="{{ route('profile#editPage') }}">
        <button class="m-2 text-white btn btn-dark"><h5>Edit profile</h5></button>

      </a>
     <a href="{{ route('profile#detailPage') }}">
        <button class="m-2 text-white btn btn-dark"><h5>Detail</h5></button>
     </a>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('Myfile/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('Myfile/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Myfile/dist/js/adminlte.min.js') }}"></script>
@yield('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
