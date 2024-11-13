{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create TimmerX Account</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Organization Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="btn btn-link"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
        <html lang="en">
        
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <title>CTron Timer - Register</title>
          <!-- plugins:css -->
          <link rel="stylesheet" href="{{ asset('/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />
    </head>
        
        <body>
          <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
              <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                  <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                      <div class="brand-logo">
                        {{-- Logo placement --}}
                      </div>
                      <h4>Hello! let's get started</h4>
                      <h6 class="fw-light">Sign up to Continue</h6>
                      <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                          <input type="name" placeholder="name" class="form-control py-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                      <div class="form-group">
                          <input type="email" placeholder="email" class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="form-group">
                          <input type="password" placeholder="password" class="form-control py-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="Confirm password" class="form-control py-4" name="password_confirmation" required autocomplete="new-password">
                        </div>  

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>                        
                        </div>
                        
                        <div class="text-center mt-4 fw-light">
                          Do you have an account? if yes <a href="{{ route('login') }}" class="text-primary"> Sign in</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
          </div>
          <!-- plugins:js -->
          <script src="{{asset('/assets/vendors/js/vendor.bundle.base.js')}}"></script>
          <!-- endinject -->
          <!-- Plugin js for this page-->
          <script src="{{asset('/assets/vendors/chartjs/Chart.min.js')}}"></script>
          <script src="{{asset('/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
          <script src="{{asset('/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
          <!-- End plugin js for this page-->
          <!-- inject:js -->
          <script src="{{asset('/assets/js/material.js')}}"></script>
          <script src="{{asset('/assets/js/misc.js')}}"></script>
          <!-- endinject -->
          <!-- Custom js for this page-->
          <script src="{{asset('/assets/js/dashboard.js')}}"></script>
          <!-- End custom js for this page-->
        </body>
        
</html>