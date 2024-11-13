@extends('layouts.master')

@section('title', 'Homepage')

@section('content')

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
                                      <h3 class="card-name">Welcome to <span class="fw-bold">{{$users->engineer_name}}</span> Homepage
                                      </h3>
                                      <p class="card-description">Please use the buttons below to view devices assigned to the subuser</p>
                                      <div class="card-button">
                                          <button type="button" class="btn btn-primary" onclick="location.href='{{ route('subuserdevices', $users->id) }}'">Devices</button>
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