<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ctron Timer - @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('/css/vertical-layout-light/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/clock.css') }}">
  <!-- endinject -->
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('/vendors/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('/assets/css/demo/style.css') }}">
  <!-- End layout styles -->
  <link rel="stylesheet" href="{{ asset('/vendors/toastr/toastr.min.css') }}">
  <script src="{{ asset('/vendors/toastr/toastr.min.js') }}"></script>
  @stack('css')
</head>
<body>
  <script src="{{ asset('/assets/js/preloader.js') }}"></script>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="{{route('home')}}">
            {{-- <img src="{{ asset('images/new/qxlogomain.png') }}" alt="logo" /> --}}
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
            {{-- <img src="{{ asset('images/new/qxlogomall.png') }}" alt="logo" /> --}}
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        @auth
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text"><span id="greetings">@if(\Carbon\Carbon::now()->format("H:i") < "12:00")
              {{"Good Morning"}}
              @elseif(\Carbon\Carbon::now()->format("H:i") < "18:00")
              {{"Good Afternoon"}}
              @else
              {{"Good Evening"}}
            @endif,</span> <span class="text-black fw-bold">{{ucfirst(Auth::user()->name)}}</span></h1>
            <h3 class="welcome-sub-text" id="greetings">Now you are in control </h3>
          </li>
        </ul>
         @else 
         <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text"><span id="greetings">Good Day,</span> <span class="text-black fw-bold">Guest</span></h1>
            <h3 class="welcome-sub-text" id="greetings">Soon you'll be in control </h3>
          </li>
        </ul> 
        @endauth
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item dropdown user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{ asset('images/new/avatar.png') }}" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="{{ asset('images/new/avatar.png') }}" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                <p class="fw-light text-muted mb-0">{{ Auth::user()->email}}</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        @auth
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
        @endauth
      </div>
    </nav>
    <!-- partial -->
    @auth
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
    
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Devices</li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.index')}}">
              <i class="menu-icon mdi mdi-numeric-0-box-multiple-outline"></i>
              <span class="menu-title">All devices</span> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admineditlist') }}">              
              <i class="menu-icon mdi mdi-view-headline"></i>
              <span class="menu-title">Edit devices</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admindeletelist')}}">              
              <i class="menu-icon mdi mdi-minus-circle"></i>
              <span class="menu-title">Delete devices</span>
            </a>
          </li>
          <li class="nav-item nav-category">Users</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('alluserslist') }}">              
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title">All Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users.create')}}">              
              <i class="menu-icon mdi mdi-account-plus"></i>
              <span class="menu-title">Create User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('deleteuserslist')}}">              
              <i class="menu-icon mdi mdi-account-minus"></i>
              <span class="menu-title">Delete User</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">Action</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('upload') }}">
              <i class="menu-icon mdi mdi-upload-outline"></i>
              <span class="menu-title">Upload</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#sign-out" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Sign-Out</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sign-out">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> Login out </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
     
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @include('inc.messages')
          @yield('content')

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><a href="https://www.christekenergy.com/" target="_blank">Christek Control</a> from Christek Energy.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    @else
    @yield('content')
    @endauth
    <!-- page-body-wrapper ends -->
  </div>
    


  <!-- container-scroller -->

  
  <!-- plugins:js -->
  <script src="{{ asset('/vendors/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('/vendors/progressbar.js/progressbar.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('/js/off-canvas.js') }}"></script>
  <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('/js/template.js') }}"></script>
  <script src="{{ asset('/js/settings.js') }}"></script>
  <script src="{{ asset('/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('/js/dashboard.js') }}"></script>
  <script src="{{ asset('/js/Chart.roundedBarCharts.js') }}"></script>
  <script src="{{ asset('/js/modal-demo.js') }}"></script>
  <!-- End custom js for this page-->

  <!-- plugins:js -->
  <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('/assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('/assets/js/material.js') }}"></script>
  <script src="{{ asset('/assets/js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('/assets/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>

