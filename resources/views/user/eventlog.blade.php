@extends('layouts.master')

  @section('content')

  <div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="devices" role="tabpanel" aria-labelledby="devices"> 
          <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Eventlog</h4>
                         <p class="card-subtitle card-subtitle-dash">All eventlog {{ $devices->device_name }}</p>
                        </div>
                        <div>
                          <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick = "location.href='{{ route('exporteventlog',$devices->id) }}'"><i class="mdi mdi-export"></i>Export</button>
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
                                Device Name
                              </th>
                              <th>
                                Operation
                              </th>
                              <th>
                                Done by
                              </th>
                              <th>
                                Time
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                           
                          @if (count($eventlogs) > 0) 
                          @foreach($eventlogs as $eventlog)
                            <tr>
                              <td class="py-1">
                                <h6>{{ $loop->iteration }}</h6>
                              </td>          
                              <td>
                                <h6>{{ $eventlog->device->device_name }}</h6>
                              </td>
                              <td>
                                <h6>{{ $eventlog->datalog }}</h6>
                              </td>
                              <td>
                                @if ($eventlog->user_id == 0)
                                <h6>Device</h6>
                                @elseif (strlen($eventlog->user_id) > 10)
                                <h6>{{ $eventlog->user_id }}</h6>
                                @else
                                <h6>{{ $eventlog->user->name }}</h6>
                                @endif
                              </td>
                              <td>
                                <h6>{{ \Carbon\Carbon::parse($eventlog->created_at)->addMinutes($devices->timezone) }}</h6>
                              </td>
                            </tr>
                            @endforeach
                            @else
                            <h6>No log found</h6>
                          @endif
                          </tbody>
                        </table>
                        {{ $total_event }}
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