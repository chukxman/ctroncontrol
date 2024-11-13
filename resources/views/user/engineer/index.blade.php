{{-- @extends('layouts.main')

@section('content')


<div class="container-fluid">
    <h1 class="mt-4">{{ Auth::user()->name }} Devices</h1>
    
    <table class="table">
        <tr>
            <th>ID</th>
            <th>DEVICE NAME</th>
            <th>SERIAL NUMBER</th>
            <th>ORGANIZATION NAME</th>
            <th>LOCATION</th>
        </tr>
        @if(count($devices) > 0)
        @foreach ($devices as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td><a href = "engineer/{{$d->id}}">{{ $d->device_name }}</a></td>
                <td>{{ $d->device_serialnumber }}</td>
                <td>{{ $d->organization_name }}</td>
                <td>{{ $d->location }}</td>
            </tr> 
        @endforeach
        
        @else
            <p>No Device Found</p>
        @endif
    </table>

        
    
</div>

@endsection --}}



{{-- New Template --}}

{{-- @extends('layouts.master')

@section('content')

<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card p-0">
      <h6 class="card-title card-padding pb-0">{{ Auth::user()->name }} Devices</h6>
      <div class="template-demo">
    
      <div class="table-responsive">
        <table class="table table-hoverable">
          <thead>
            <tr>
                <th>DEVICE NAME</th>
                <th>SERIAL NUMBER</th>
                <th>ORGANIZATION NAME</th>
                <th>LOCATION</th>
            </tr>
          </thead>
          <tbody>
            @if(count($devices) > 0)
            @foreach ($devices as $device)
            <tr>
                <td><a href = "engineer/{{$device->id}}">{{ $device->device_name }}</a></td>
                <td>{{ $device->device_serialnumber }}</td>
                <td>{{ $device->organization_name }}</td>
                <td>{{ $device->location }}</td>
            </tr>
            @endforeach
          </tbody>
          @else
            <p>No Device Found</p>
        @endif
        </table>
      </div>
      </div>
    </div>
</div>

@endsection --}}

@extends('layouts.master')

@section('content')

<div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Devices</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Sub Users</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Devices</h4>
                  <p class="card-description">
                    All devices on <code>{{ Auth::user()->name }}</code> Account
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