{{-- @extends('layouts.main')

@section('content')


<div class="container-fluid">
    <h3 class="mt-4">Welcome {{ Auth::user()->name }} </h3>
    
    <p><h2 class="well"> To Ctron Timer Web Application</h2></p>
    <h3 class="text-justify text-blue-600">please click any of the following to Begin</h3>

    <p>
        <a href="{{ route('user.index') }}" class="btn btn-primary">View Your Devices</a>
        <a href="{{ route('subuser.index') }}" class="btn btn-primary">View Your Site Engineers</a>

    </p>
  
    
</div>

@endsection --}}

{{-- 
@extends('layouts.master')

@section('content') --}}

{{-- <div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <img src="{{ asset('images/new/clock2.png') }}" class="card-img">
          <h3 class="card-title card-padding pb-0">Welcome{{ Auth::user()->name }}</h3>
          <div>
            <p><h2 class="well"> To Ctron Timer Web Application</h2></p>
             <h4 class="text-justify text-blue-600">please click any of the following to Begin</h4>
              <p>
                  <a href="{{ route('user.index') }}" class="card-link">View Your Devices</a>
                  <a href="{{ route('subuser.index') }}" class="card-link">View Your Site Engineers</a>

            </p>
          </div>
      </div>
    </div>
  </div>
</div> --}}

{{-- <div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <img src="https://s13.postimg.cc/5al19x0d3/media_img.jpg" class="card-media" />
      <div class="card-details">
        <h2 class="card-head">Kangaroo Valley Safari</h2>
        <p>Located two hours south of Sydney in the Southern Highlands of New South Wales, ...</p>
        <a href="#/" class="card-action-button">SHARE</a>
        <a href="#/" class="card-action-button">EXPLORE</a>
      </div>
    </div>
  </div>
</div> --}}
{{-- <div class="row flex-grow">
  <div class="col-12 grid-margin stretch-card">
    <div class="card card-rounded table-darkBGImg">
      <div class="card-body">
        <div class="col-sm-8">
          <h3 class="text-white upgrade-info mb-0">
            Welcome to <span class="fw-bold">Christek Control</span> 
          </h3>
          <p class="text-white"> the best web timer for office and home use</p>
          <a href="{{ route('user.index') }}" class="btn btn-info upgrade-btn">View Devices!</a>
        </div>
      </div>
    </div>
  </div>
</div> --}}

@extends('layouts.master')

@section('title', 'Homepage')

@section('content')
{{-- <div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
      
      <div class="tab-content tab-content-basic">
            <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <h3 class="card-title card-padding pb-0">Welcome{{ Auth::user()->name }}</h3>
                          <div>
                            <p><h2 class="well"> To Ctron Timer Web Application</h2></p>
                             <h4 class="text-justify text-blue-600">please click any of the following to Begin</h4>
                              <p>
                                  <a href="{{ route('user.index') }}" class="card-link">View Your Devices</a>
                                  <a href="{{ route('subuser.index') }}" class="card-link">View Your Site Engineers</a>
                
                            </p>
                          </div>
                          
                        </div>                               
                           
                      </div>
                    </div>
                  </div>
              </div>
        </div>
    </div>
  </div>
</div> --}}
{{-- <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> --}}
 

<div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
      
      <div class="tab-content tab-content-basic">
            <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        {{-- bs5 card start --}}
                        @push('css')
                          <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
                        @endpush
                        {{-- <div class="card" style="width: 18rem;">
                          <img src="{{asset('images/new/timebig.jpg')}}" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                          </ul>
                          <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                          </div>
                        </div>                                --}}
                           {{-- Bs 5 card ends --}}
                           
                            
                                <div class="card-header">
                                    <div class="card-photo">
                                        <img src="{{ asset('images/new/avatarbig.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-name">Welcome to <span class="fw-bold">Ctron Control</span> 
                                    </h3>
                                    <p class="card-description">The online timer controller <br/>please use the buttons below to view devices and manage subusers</p>
                                    <div class="card-button">
                                        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('user.index') }}'">Devices</button>
                                        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('subuser.index') }}'">Users</button>
                                    </div>
                                    <ul class="card-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                          
                        
                           
                      </div>
                      {{-- start of another div --}}
                      <div class="card">
                        
                      </div>
                      {{-- end of another div --}}
                    </div>
                  </div>
              </div>
        </div>
    </div>
  </div>
</div> 

@endsection

{{-- @endsection --}}


