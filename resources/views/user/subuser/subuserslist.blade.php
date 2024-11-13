@extends('layouts.master')
@section('title', 'All devices users')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link ps-0" id="home-tab" data-bs-toggle="tab" href="#devices" role="tab" aria-controls="overview" aria-selected="true">Devices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#users" role="tab" aria-selected="false">Users</a>
          </li>
        </ul>
      </div>
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show inactive" id="devices" role="tabpanel" aria-labelledby="devices"> 
          <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Devices</h4>
                         <p class="card-subtitle card-subtitle-dash">All devices on {{ Auth::user()->name}} 's <span> Profile </span></p>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>
                                Device
                              </th>
                              <th>
                                Device Name
                              </th>
                              <th>
                                Organization
                              </th>
                              <th>
                                Location
                              </th>
                              <th>
                                Last seen
                              </th>
                              <th>
                                Action
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($devices as $device)
                            <tr>
                              <td class="py-1">
                                <a href="{{ route('user.show', $device->id)}}"><img src="{{ asset('images/new/time.jpg') }}" alt="device"></a>          
                              </td>          
                              <td>
                                <a href="{{ route('user.show', $device->id)}}">{{ $device->device_name }}</a>
                              </td>
                              <td>
                                {{ $device->organization_name }}
                              </td>
                              <td>
                                {{ $device->location }}
                              </td>
                              <td>
                                {{ $device->lastseen }}
                              </td>
                              <td>
                                <form method="POST" action="{{ route('user.destroy',$device->id) }}">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-icon-text">Delete</button>
                                </form>                              
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
        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users"> 
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
                          <th>
                              Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($subusers as $user)
                        <tr>
                          <td class="py-1">
                            <a href="{{ route('subuser.show', $user->id)}}"><img src="{{ asset('images/new/avatar.png') }}" alt="device"></a>          
                          </td>          
                          <td>
                            <a href="{{ route('subuser.show', $user->id)}}">{{ $user->engineer_name }}</a>
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->lastseen }}
                          </td>
                          <td>
                            <form method="POST" action="{{ route('subuser.destroy',$user->id) }}">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger btn-icon-text">Delete</button>
                            </form>                          
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