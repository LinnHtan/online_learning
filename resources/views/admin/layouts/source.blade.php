<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  {{-- {{ asset('Myfile/') }} --}}

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('Myfile/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Myfile/dist/css/adminlte.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin#homePage') }}" class="nav-link"><strong>Home</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block me-20">
        <a href="#" class="nav-link"><strong>About</strong></a>
      </li>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block me-20">
            <a href="{{ route('message#feedBack') }}" class="nav-link"><strong>FeedBack</strong></a>
          </li>
        <li class="nav-item d-none d-sm-inline-block me-20">
            <a href="{{ route('message#createPage') }}" class="nav-link"><strong>Send Message</strong></a>
          </li>
          <li class=" nav-item d-none d-sm-inline-block">
            <form action="{{ route('logout') }}" method="post"
            class="d-flex justify-content-center">
            @csrf
            <button class="nav-link">
               <strong>Logout</strong></button>
        </form>
          </li>
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <input type="text" class="form-control"><i class="fas fa-search"></i>
        </a>
        <div class="d-block">
            <input type="text" class="form-control">
        </div>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}
      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src= "{{ asset('myFile/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('myFile/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('myFile/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('myFile/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Online Course</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <a href="{{ route('profileAdmin#detailPage') }}">
                @if (Auth::user()->image == null)
                    <img
                       class=" img-thumbnail" style="height: 50px; width:50px"  src="{{ asset('image/' . (Auth::user()->gender == 'male' ? 'user.png' : 'girl.png')) }}" />
                @else
                    <img class=" img-thumbnail" style="height: 50px; width:50px" src="{{ asset('storage/' . Auth::user()->image) }}"
                         />
                @endif
            </a>
          {{-- <img src="{{ asset('myFile/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                All Courses OutLine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item my-2">
                <a href="{{ route('course#listPage') }}" class="nav-link active">
                    <i class=" me-2 text-primary fa-solid fa-book-open"></i>
                  <p>Opening Course</p>
                </a>
              </li>
              <li class="nav-item my-2">
                <a href="{{ route('UpComingCourse#listPage') }}" class="nav-link active">
                    <i class=" me-2 text-primary fa-solid fa-book-open"></i>
                  <p>UpComing Course</p>
                </a>
              </li>
              <li class="nav-item my-2">
                <a href="{{ route('popularCourse#listPage') }}" class="nav-link active">
                    <i class=" me-2 text-primary fa-solid fa-book-open"></i>
                  <p>Popular Course</p>
                </a>
              </li>
              <li class="nav-item" my-2>
                <a href="{{ route('freeCourse#listPage') }}" class="nav-link active">
                    <i class=" me-2 text-primary fa-solid fa-book-open"></i>
                  <p>Free Course</p>
                </a>
              </li>
            </ul>
          </li>
          <li class=" bg-primary rounded mt-3">
            <a href="{{ route('enrolled#listPage') }}" class="nav-link">
            <i class="fa-solid fa-list me-3"></i>
              Enrolled List
            </a>
          </li>
          <li class="nav-item bg-primary rounded mt-3">
            <a href="{{ route('user#userlistPage') }}" class="nav-link">
                <i class="fa-solid fa-users me-3 "></i>
              User List
            </a>
          </li>

          <li class="nav-item bg-primary rounded mt-3">
            <a href="{{ route('lesson#page') }}" class="nav-link">
                <i class="fa-solid fa-book me-3"></i>
              <p>
                Sample Lesson

              </p>
            </a>
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
        <a href="{{ route('profile#changePasswordPage') }}" class="text-decoration-none btn btn-outline-primary mb-2" >
            <h5>ChangePassword</h5>
        </a>
        <a href="{{ route('profileAdmin#editPage') }}" class="text-decoration-none btn btn-outline-primary mb-2" >
            <h5>Edit Profile</h5>
          </a>
      <a href="{{ route('profileAdmin#detailPage') }}" class="text-decoration-none btn btn-outline-primary mb-2" >
        <h5> My Detail</h5>
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
    <strong>Copyright &copy; 2014-2021 <a href="#">AdminLTE.io</a>.</strong> All rights reserved.
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
