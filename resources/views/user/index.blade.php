{{-- @extends('layouts.main')

@section('content')


<div class="container-fluid">
   
    <h1 class="mt-4">{{ Auth::user()->name }} Devices</h1>
    <p>
        <a href="{{ url('add.index') }}" class="btn btn-primary">Add new Device</a>
    </p>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>DEVICE NAME</th>
            <th>SERIAL NUMBER</th>
            <th>ORGANIZATION NAME</th>
            <th>STATE</th>
            <th>LGA</th>
            <th>ENGINEER</th>
            <th>ACTION</th>
        </tr>
        @if(count($devices) > 0)
        @foreach ($devices as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td><a href = "user/{{$d->id}}">{{ $d->device_name }}</a></td>
                <td>{{ $d->device_serialnumber }}</td>
                <td>{{ $d->organization_name }}</td>
                <td>{{ $d->state }}</td>
                <td>{{ $d->lga }}</td>
                <td>{{ $d->engineer_id }}</td>
                <td><a href="{{ route('user.edit',$d->id) }}" class="btn btn-info">Edit</a> <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
                <form method="POST" action="{{ route('user.destroy',$d->id) }}">
                    @method('DELETE')
                    @csrf
                </form></td>
            </tr> 
        @endforeach
        
        @else
            <p>No Device Found</p>
        @endif
    </table>

        
    
</div>

@endsection --}}



{{-- @extends('layouts.master')

@section('content')

<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card p-0">
      <h6 class="card-title card-padding pb-0">{{ Auth::user()->name }} Devices</h6>
      <div class="template-demo">
          <div class="card-title card-padding pb-0">
        <button type="button" class="mdc-button mdc-button--raised" href="{{ route('subuser.index') }}">
            View subusers
        </button>
        
    
      <div class="table-responsive">
        <table class="table table-hoverable">
          <thead>
            <tr>
                <th>ID</th>
                <th>DEVICE NAME</th>
                <th>SERIAL NUMBER</th>
                <th>ORGANIZATION NAME</th>
                <th>LOCATION</th>
                <th>ENGINEER</th>
                <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @if(count($devices) > 0)
            @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td><a href = "user/{{$device->id}}">{{ $device->device_name }}</a></td>
                <td>{{ $device->device_serialnumber }}</td>
                <td>{{ $device->organization_name }}</td>
                <td>{{ $device->location }}</td>
                <td>{{ $device->engineer_id }}</td>
                <td><a href="{{ route('user.edit',$device->id) }}" class="btn btn-info">Edit</a> <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
                <form method="POST" action="{{ route('user.destroy',$device->id) }}">
                    @method('DELETE')
                    @csrf
                </form></td>
            </tr>
            @endforeach
          </tbody>
          @else
          <br>
            <p>No Device Found</p>
        @endif
        </table>
      </div>
      </div>
    </div>
    </div>
</div>

@endsection --}}



@extends('layouts.master')
@section('title', 'All devices users')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#devices" role="tab" aria-controls="overview" aria-selected="true">Devices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#users" role="tab" aria-selected="false">Users</a>
          </li>
        </ul>
      </div>
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="devices" role="tabpanel" aria-labelledby="devices"> 
          <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Devices</h4>
                         <p class="card-subtitle card-subtitle-dash">All devices on Ctron Timer</p>
                        </div>
                        <div>
                          <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick = "location.href='{{ route('user.create') }}'"><i class="mdi mdi-account-plus"></i>Add New Device</button>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
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
                        {{ $devices->links() }}
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show inactive" id="users" role="tabpanel" aria-labelledby="users"> 
          <div class="row flex-grow">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                      <div>
                        <h4 class="card-title card-title-dash">Users</h4>
                      <p class="card-subtitle card-subtitle-dash">All users</p>
                      </div>
                      <div>
                        <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick = "location.href='{{ route('subuser.create') }}'"><i class="mdi mdi-account-plus"></i>Add Site Engineer</button>
                      </div>
                    </div>
                    <div class="table-responsive  mt-1">
                      <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Last seen
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($subusers as $user)
                        <tr>
                          <td class="py-1">
                            <img src="{{ asset('images/new/avatar.png') }}" alt="user"> 
                          </td>          
                          <td>
                            <a href="{{ route('subuser.show', $user->id)}}">{{ $user->engineer_name }}</a>
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ \Carbon\Carbon::parse($user->lastseen)->diffForHumans() }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection