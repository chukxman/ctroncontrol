@extends('layouts.master')

@section('content')

<div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Devices</a>
                    </li>
                    
                  </ul>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Devices</h4>
                  <p class="card-description">
                    All devices on <code>{{ Auth::user()->name }} </code> Account
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>`
                          <th>
                            S/N
                          </th>
                          <th>
                            Device
                          </th>
                          <th>
                            Device Name
                          </th>
                          <th>
                            Location
                          </th>
                          <th>
                            Last seen
                          </th>
                          <th>
                            Tamper mode
                          </th>
                          <th>
                            Channels
                          </th>
                          <th>
                            View log
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($devices as $device)
                      <tr>
                        <td>
                        <h6>{{ $loop->iteration }}</h6>                              
                        </td>
                        <td>
                          <a href="{{ route('user.show', $device->id)}}"><img src="{{ asset('images/new/time.jpg') }}" alt="device"></a>          
                        </td>          
                        <td>
                          <h6><a href="{{ route('user.show', $device->id)}}">{{ $device->device_name }}</a></h6>
                        </td>
                        <td>
                          <h6>{{ $device->location }}</h6>
                        </td>
                        <td>
                          @if ($device->lastseen == NULL)
                          <h6>Offline</h6>
                          @else
                          <h6>{{ \Carbon\Carbon::parse($device->lastseen)->diffForHumans() }}</h6>
                          @endif
                        </td>
                        <td>
                          @if ($device->tamper_mode == 1)
                          <h6>Tampered</h6>
                          @else
                          <h6>Cleared</h6>
                          @endif
                        </td>
                        <td>
                          <h6>{{ $device->channel1state == 1 ? "On" : "Off"}}  | {{ $device->channel2state == 1 ? "On" : "Off"}}  | {{ $device->channel3state == 1 ? "On" : "Off"}}  | {{ $device->channel4state == 1 ? "On" : "Off"}} </h6>
                        </td>
                        <td>
                          <h6><a href="{{ route('eventlog', $device->id)}}">View Log</a></h6>
                        </td>
                      </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection