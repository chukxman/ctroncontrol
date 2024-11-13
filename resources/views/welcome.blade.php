<!doctype html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A growing collection of ready to use components for the CSS framework Bootstrap 5">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
  <meta name="author" content="ctroncontrol">
  <meta name="generator" content="christek energy">
  <meta name="HandheldFriendly" content="true">
  <title>ctron control - Now you are in control</title>
  <link rel="stylesheet" href="{{ asset('css/theme.min.css')}}">
  {{-- <link rel="stylesheet" href="{{ asset('css/my.css')}}"> --}}
  <style>
    /* Add your custom font styles here */
  </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navScroll">

  <!-- Navigation -->
  <nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top" tabindex="0">
    <div class="container">
      <a class="navbar-brand pe-4 fs-4" href="{{url('/')}}">
        <img src="{{asset('images/favicon.png')}}" alt="logo" height="32" width="32">
        <span class="ms-1 fw-bolder">Ctroncontrol</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#services" aria-label="Brings you to the frontpage">
              Contact
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#aboutus">About us</a>
          </li>
        </ul>

        <!-- Login and Register Buttons from the first code -->
        <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
          </div>
          @endif
        </ul>

      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <div class="w-100 overflow-hidden bg-gray-100" id="top">
      <div class="container position-relative">
        <div class="col-12 col-lg-8 mt-0 h-100 position-absolute top-0 end-0 bg-cover" data-aos="fade-left" style="background-image: url(images/ctronimage2.jpg);">
        </div>
        <div class="row">
          <div class="col-lg-7 py-vh-6 position-relative" data-aos="fade-right">
            <h1 class="display-1 fw-bold mt-5">Control devices remotely from anywhere</h1>
            <p class="lead">Remote monitoring has never been more interesting and simple.</p>
            <a href="{{ url('/home') }}" class="btn btn-dark btn-xl shadow me-3 rounded-0 my-5">Get started</a>
          </div>
        </div>
      </div>
    </div>

    <!-- About Us Section -->
    <div class="py-vh-4 bg-gray-100 w-100 overflow-hidden" id="aboutus">
      <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-lg-6">
            <div class="row gx-5 d-flex">
              <div class="col-md-11">
                <div class="shadow ratio ratio-16x9 rounded bg-cover bp-center align-self-end" data-aos="fade-right" style="background-image: url(images/ctronimage.jpg);--bs-aspect-ratio: 50%;"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h3 class="py-5 border-top border-dark" data-aos="fade-left">Simplify your power management with our remote control timer.</h3>
            <p data-aos="fade-left" data-aos-delay="200">Take charge of your energy use with ease.</p>
            <p><a href="{{ url('/home') }}" class="link-fancy link-dark" data-aos="fade-left" data-aos-delay="400">Learn more</a></p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container small border-top">
      <div class="row py-5 d-flex justify-content-between">
        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <img src="{{asset('images/favicon.png')}}" alt="logo" height="32" width="32">
          <address class="text-secondary mt-3">
            <strong>Ctroncontrol</strong><br>
            <a class="nav-link link-secondary ps-0" href="http://christekenergy.com" target="_blank" rel="noopener noreferrer">christekenergy.com</a><br>
            {{-- Ikotun Lagos, Nigeria<br> --}}
            {{-- <abbr title="Phone">P:</abbr> 08085463162 --}}
          </address>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <h3 class="h6 mb-3">Products</h3>
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link link-secondary ps-0" href="{{url('/')}}">Ctrontimer</a></li>
            <li class="nav-item"><a class="nav-link link-secondary ps-0" href="{{url('/')}}">Ctron power manager</a></li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 p-5">
          <h3 class="h6 mb-3">Pages</h3>
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link link-secondary ps-0" href="{{url('/')}}">About us</a></li>
            <li class="nav-item"><a class="nav-link link-secondary ps-0" href="{{url('/')}}">Services</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('js/aos.js')}}"></script>
  <script src="{{ asset('js/app.js')}}"></script>
  <script>
    AOS.init({
      duration: 800,
      easing: "slide",
      once: true
    });
  </script>
</body>

</html>
