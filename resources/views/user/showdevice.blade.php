
@extends('layouts.auth')

@section('content')

<div class="mdc-layout-grid">
  <div class="mdc-layout-grid__inner">
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
      <div class="mdc-card info-card info-card--success">
        <div class="card-inner">
          <h5 class="card-title">{{$devices->channel1}}</h5>
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel1counter" data-bs-toggle="modal" class="small-box-footer"><h6>Set counter</h6></a></h5>
          {{-- Modal for counter --}}
          <div class="modal fade" id="channel1counter">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Set Counter for channel 1</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('updateChannel1Counter', [$devices->id]) }}" method="POST" id="modal-details[5]">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <span class="form-label">Select Operation</span>
                        <select class="form-control" id="ch1cs" name="c1counter_setting" placeholder="Please select counter settings">
                          <option>Select Option</option>
                          <option value="0">Switch Off</option>
                          <option value="1">Switch On</option>
                        </select> 
                      </div>
                      </div>

                      <div class="col-md-6">
                        <span class="form-label">Enter Time</span>
                        <input type="text" class="form-control" name="c1counter" value="{{$devices->c1counter}}" placeholder="HH:MM:SS" @error('c1counter') is-invalid @enderror>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary swalDefaultSuccess" form="modal-details[5]">Start</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switch: @if($devices->channel1controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel1controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel1controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel1controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted"> <span>by: </span> {{ $devices->channel1statesetby }} <br>
            @if ($devices->lastchannel1state == NULL)
            Long time ago
          @else
              {{ \Carbon\Carbon::parse($devices->lastchannel1state)->diffForHumans() }}
          @endif
            </p>
          <div class="card-icon-wrapper">
            <div class="mdc-switch mdc-switch--light" data-mdc-auto-init="MDCSwitch">
              <div class="mdc-switch__track"></div>
              <div class="mdc-switch__thumb-underlay">
                <div class="mdc-switch__thumb">
                  <form method="POST" action="{{ route('updateChannel1State', [$devices->id]) }}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control swalDefaultSuccess" role="switch" name="channel1state" onchange="this.form.submit()" {{ $devices->channel1state ? 'checked' : '' }}>
                  </form>
                </div>
              </div>
            </div>                    
          </div>
        </div>
      </div>
    </div>
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
      <div class="mdc-card info-card info-card--danger">
        <div class="card-inner">
          <h5 class="card-title">{{$devices->channel2}}</h5>
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel2counter" data-bs-toggle="modal" class="small-box-footer"><h6>Set counter</h6></a></h5>
          {{-- Modal for counter --}}
          <div class="modal fade" id="channel2counter">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Set Counter for channel 2</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('updateChannel2Counter', [$devices->id]) }}" method="POST" id="modal-details[6]">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <span class="form-label">Select Operation</span>
                        <select class="form-control" id="ch2cs" name="c2counter_setting" placeholder="Please select counter settings">
                          <option>Select Option</option>
                          <option value="0">Switch Off</option>
                          <option value="1">Switch On</option>
                        </select> 
                      </div>
                      </div>

                      <div class="col-md-6">
                        <span class="form-label">Enter Time</span>
                        <input type="text" class="form-control" name="c2counter" value="{{$devices->c2counter}}" placeholder="HH:MM:SS" @error('c2counter') is-invalid @enderror>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary swalDefaultSuccess" form="modal-details[6]">Start</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switch:@if($devices->channel2controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel2controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel2controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel2controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted"> <span>by: </span> {{ $devices->channel2statesetby }} <br>
            @if ($devices->lastchannel2state == NULL)
            Long time ago
          @else
              {{ \Carbon\Carbon::parse($devices->lastchannel2state)->diffForHumans() }}
          @endif
            </p>
          <div class="card-icon-wrapper">
            <div class="mdc-switch mdc-switch--light" data-mdc-auto-init="MDCSwitch">
              <div class="mdc-switch__track"></div>
              <div class="mdc-switch__thumb-underlay">
                <div class="mdc-switch__thumb">
                  <form method="POST" action="{{ route('updateChannel2State', [$devices->id]) }}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" name="channel2state" onchange="this.form.submit()" {{ $devices->channel2state ? 'checked' : '' }}>
                  </form>
                </div>
              </div>
            </div>                    
          </div>
        </div>
      </div>
    </div>
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
      <div class="mdc-card info-card info-card--primary">
        <div class="card-inner">
          <h5 class="card-title">{{$devices->channel3}}</h5>
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel3counter" data-bs-toggle="modal" class="small-box-footer"><h6>Set counter</h6></a></h5>
          {{-- Modal for counter --}}
          <div class="modal fade" id="channel3counter">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Set Counter for channel 3</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('updateChannel3Counter', [$devices->id]) }}" method="POST" id="modal-details[7]">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <span class="form-label">Select Operation</span>
                        <select class="form-control" id="ch3cs" name="c3counter_setting" placeholder="Please select counter settings">
                          <option>Select Option</option>
                          <option value="0">Switch Off</option>
                          <option value="1">Switch On</option>
                        </select> 
                      </div>
                      </div>

                      <div class="col-md-6">
                        <span class="form-label">Enter Time</span>
                        <input type="text" class="form-control" name="c3counter" value="{{$devices->c3counter}}" placeholder="HH:MM:SS" @error('c3counter') is-invalid @enderror>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary swalDefaultSuccess" form="modal-details[7]">Start</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switch:@if($devices->channel3controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel3controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel3controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel3controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted"> <span>by: </span> {{ $devices->channel3statesetby }} <br>
            @if ($devices->lastchannel3state == NULL)
              A long time ago
            @else
                {{ \Carbon\Carbon::parse($devices->lastchannel3state)->diffForHumans() }}
            @endif
          </p>
          <div class="card-icon-wrapper">
            <div class="mdc-switch mdc-switch--light" data-mdc-auto-init="MDCSwitch">
              <div class="mdc-switch__track"></div>
              <div class="mdc-switch__thumb-underlay">
                <div class="mdc-switch__thumb">
                  <form method="POST" action="{{ route('updateChannel3State', [$devices->id]) }}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" name="channel3state" onchange="this.form.submit()" {{ $devices->channel3state ? 'checked' : '' }}>
                  </form>
                </div>
              </div>
            </div>                    
          </div>
        </div>
      </div>
    </div>
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
      <div class="mdc-card info-card info-card--info">
        <div class="card-inner">
          <h5 class="card-title">{{$devices->channel4}}</h5>
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel4counter" data-bs-toggle="modal" class="small-box-footer"><h6>Set counter</h6></a></h5>
          {{-- Modal for counter --}}
          <div class="modal fade" id="channel4counter">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Set Counter for channel 4</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('updateChannel4Counter', [$devices->id]) }}" method="POST" id="modal-details[8]">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <span class="form-label">Select Operation</span>
                        <select class="form-control" id="ch1cs" name="c4counter_setting" placeholder="Please select counter settings">
                          <option>Select Option</option>
                          <option value="0">Switch Off</option>
                          <option value="1">Switch On</option>
                        </select> 
                      </div>
                      </div>

                      <div class="col-md-6">
                        <span class="form-label">Enter Time</span>
                        <input type="text" class="form-control" name="c4counter" value="{{$devices->c4counter}}" placeholder="HH:MM:SS" @error('c4counter') is-invalid @enderror>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary swalDefaultSuccess" form="modal-details[8]">Start</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switch:@if($devices->channel4controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel4controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel4controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel4controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted"> <span>by: </span> {{ $devices->channel4statesetby }} <br>  
            @if ($devices->lastchannel4state == NULL)
            A long time ago
            @else
                {{ \Carbon\Carbon::parse($devices->lastchannel4state)->diffForHumans() }}
            @endif
          </p>
          <div class="card-icon-wrapper">
            <div class="mdc-switch mdc-switch--light" data-mdc-auto-init="MDCSwitch">
              <div class="mdc-switch__track"></div>
              <div class="mdc-switch__thumb-underlay">
                <div class="mdc-switch__thumb">
                  <form method="POST" action="{{ route('updateChannel4State', [$devices->id]) }}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" name="channel4state" onchange="this.form.submit()" {{ $devices->channel4state ? 'checked' : '' }}>
                  </form> 
                </div>
              </div>
            </div>                    
          </div>
        </div>
      </div>
    </div>
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
      <div class="mdc-card">
        <div class="d-flex justify-content-between">
          <h4 class="card-title mb-0"><a id="set-schedule" data-bs-toggle="tab" href="#schedule-div" role="tab" aria-controls="overview" aria-selected="true">Set Schedule</a> | <a id="view-location" data-bs-toggle="tab" href="#location-div" role="tab" aria-controls="overview" aria-selected="false">View Location</a></h4>
          <p>Temperature: {{$devices->temperature}}</p>
          <div class="d-block d-sm-flex justify-content-between align-items-center">
            <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button mdc-button--raised button-box-shadow tx-12 text-dark bg-white font-weight-light">
                  Clear Tamper
                <i class="material-icons">arrow_drop_down</i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  
                  <li class="mdc-list-item" role="menuitem">
                    <form method="POST" action="{{ route('cleartamper', [$devices->id]) }}">
                      @method('PUT')
                      @csrf
                      <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" name="channel2state" onchange="this.form.submit()" {{ $devices->channel2state ? 'checked' : '' }}>
                      <h6 class="item-subject font-weight-normal"><a href="{{ route('cleartamper', $devices->id) }}" onchange="this.form.submit()">Clear</a></h6>
                    </form>
                  </li>
              
                </ul>
              </div>
            </div>
        </div>
        </div>
        <div class="d-block d-sm-flex justify-content-between align-items-center">
            <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button mdc-button--raised button-box-shadow tx-12 text-dark bg-white font-weight-light">
                @if ($devices->lastseen == NULL)
                Last Seen: Offline
                @else
                Last Seen: {{ \Carbon\Carbon::parse($devices->lastseen)->diffForHumans() }}
                @endif  
                
                <i class="material-icons">arrow_drop_down</i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  
                  <li class="mdc-list-item" role="menuitem">
                    <h6 class="item-subject font-weight-normal"><a href="javascript:void(0)" onclick="location.reload();" class="">Refresh</a></h6>
                  </li>
              
                </ul>
              </div>
            </div>
        </div> 
        <div class="mdc-layout-grid__inner mt-2 show active" id="schedule-div" aria-labelledby="set-schedule">
          <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
            <div class="table-responsive">
              <table class="table select-table">
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel1schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
                      </button>
                      <br>
                      <br>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#viewchannel1schedule">
                        View Schedule
                      </button>
                      <div class="modal fade" id="channel1schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel1schedule" aria-bs-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$devices->channel1}} Schedule</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('updateChannel1Schedule', [$devices->id]) }}" method="POST" id="modal-details[1]">
                              @csrf
                              @method('PUT')
                              <input type="hidden" class="form-control" id="newRequestC1" name="newRequestC1" value="1">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <span class="form-label">Select Operation</span>
                                    <select class="form-control" id="ch1ss" name="schedule_setting" placeholder="Please select manual override options" value="{{ $devices->manualoverride}}">
                                      <option>Select Option</option>
                                      <option value="0">Switch Off</option>
                                      <option value="1">Switch On</option>
                                    </select> 
                                  </div>
                                  <div class="form-group">
                                    <span class="form-label">Select Time</span>
                                    <input class="form-control" type="time" name="schedule_time" required>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-check form-check-flat form-check-primary" style="align: right;">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="monday">
                                      Monday
                                    </label>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="tuesday">
                                      Tuesday
                                    </label>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="wednesday">
                                      Wednesday
                                    </label>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="thursday">
                                      Thursday
                                    </label>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="friday">
                                      Friday
                                    </label>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="saturday">
                                      Saturday
                                    </label>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="sunday">
                                      Sunday
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" form="modal-details[1]">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="viewchannel1schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel1schedule" aria-bs-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$devices->channel1}} Schedule</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('updateChannel1Schedule', [$devices->id]) }}" method="POST" id="modal-details[1]">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" id="newRequestC1" name="newRequestC1" value="1">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Monday On</span>
                                      <input class="form-control" type="time" name="c1Mon_On" value="{{ $devices->c1Mon_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Monday Off</span>
                                      <input class="form-control" type="time" name="c1Mon_Off" value="{{ $devices->c1Mon_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Tuesday On</span>
                                      <input class="form-control" type="time" name="c1Tue_On" value="{{ $devices->c1Tue_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Tuesday Off</span>
                                      <input class="form-control" type="time" name="c1Tue_Off" value="{{ $devices->c1Tue_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Wednesday On</span>
                                      <input class="form-control" type="time" name="c1Wed_On" value="{{ $devices->c1Wed_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Wednesday Off</span>
                                      <input class="form-control" type="time" name="c1Wed_Off" value="{{ $devices->c1Wed_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Thursday On</span>
                                      <input class="form-control" type="time" name="c1Thur_On" value="{{ $devices->c1Thur_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Thurday Off</span>
                                      <input class="form-control" type="time" name="c1Thur_Off" value="{{ $devices->c1Thur_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Friday On</span>
                                      <input class="form-control" type="time" name="c1Fri_On" value="{{ $devices->c1Fri_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Friday Off</span>
                                      <input class="form-control" type="time" name="c1Fri_Off" value="{{ $devices->c1Fri_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Saturday On</span>
                                      <input class="form-control" type="time" name="c1Sat_On" value="{{ $devices->c1Sat_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Saturday Off</span>
                                      <input class="form-control" type="time" name="c1Sat_Off" value="{{ $devices->c1Sat_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Sunday On</span>
                                      <input class="form-control" type="time" name="c1Sun_On" value="{{ $devices->c1Sun_On }}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Sunday Off</span>
                                      <input class="form-control" type="time" name="c1Sun_Off" value="{{ $devices->c1Sun_Off }}" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                            </div>
                          </div>
                        </div>
                    </td>
                    <td>
                      <h6>{{$devices->channel1}}</h6>
                      <p>By: {{$devices->channel1schedulesetby}} </p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      @if ($devices->lastchannel1schedule == NULL)
                          <p>A long time ago</p>
                      @else
                      <p>{{ \Carbon\Carbon::parse($devices->lastchannel1schedule)->diffForHumans() }}</p>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel2schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
                      </button>
                      <br>
                      <br>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#viewchannel2schedule">
                        View Schedule
                      </button>
                      <div class="modal fade" id="channel2schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel2schedule" aria-bs-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">{{$devices->channel2}} Schedule</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('updateChannel2Schedule', [$devices->id]) }}" method="POST" id="modal-details[2]">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" id="newRequestC2" name="newRequestC2" value="1">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Select Operation</span>
                                      <select class="form-control" id="ch2ss" name="schedule_setting" placeholder="Please select manual override options" value="{{ $devices->manualoverride}}">
                                        <option>Select Option</option>
                                        <option value="0">Switch Off</option>
                                        <option value="1">Switch On</option>
                                      </select> 
                                    </div>
                                    <div class="form-group">
                                      <span class="form-label">Select Time</span>
                                      <input class="form-control" type="time" name="schedule_time" required>
                                    </div>
                                  </div>
  
                                  <div class="col-md-6">
                                    <div class="form-check form-check-flat form-check-primary" style="align: right;">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="monday">
                                        Monday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="tuesday">
                                        Tuesday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="wednesday">
                                        Wednesday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="thursday">
                                        Thursday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="friday">
                                        Friday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="saturday">
                                        Saturday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="sunday">
                                        Sunday
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" form="modal-details[2]">Save changes</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="viewchannel2schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel1schedule" aria-bs-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$devices->channel2}} Schedule</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('updateChannel1Schedule', [$devices->id]) }}" method="POST" id="modal-details[1]">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" class="form-control" id="newRequestC1" name="newRequestC1" value="1">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Monday On</span>
                                        <input class="form-control" type="time" name="c1Mon_On" value="{{ $devices->c2Mon_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Monday Off</span>
                                        <input class="form-control" type="time" name="c1Mon_Off" value="{{ $devices->c2Mon_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Tuesday On</span>
                                        <input class="form-control" type="time" name="c1Tue_On" value="{{ $devices->c2Tue_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Tuesday Off</span>
                                        <input class="form-control" type="time" name="c1Tue_Off" value="{{ $devices->c2Tue_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Wednesday On</span>
                                        <input class="form-control" type="time" name="c1Wed_On" value="{{ $devices->c2Wed_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Wednesday Off</span>
                                        <input class="form-control" type="time" name="c1Wed_Off" value="{{ $devices->c2Wed_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Thursday On</span>
                                        <input class="form-control" type="time" name="c1Thur_On" value="{{ $devices->c2Thur_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Thurday Off</span>
                                        <input class="form-control" type="time" name="c1Thur_Off" value="{{ $devices->c2Thur_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Friday On</span>
                                        <input class="form-control" type="time" name="c1Fri_On" value="{{ $devices->c2Fri_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Friday Off</span>
                                        <input class="form-control" type="time" name="c1Fri_Off" value="{{ $devices->c2Fri_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Saturday On</span>
                                        <input class="form-control" type="time" name="c1Sat_On" value="{{ $devices->c2Sat_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Saturday Off</span>
                                        <input class="form-control" type="time" name="c1Sat_Off" value="{{ $devices->c2Sat_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Sunday On</span>
                                        <input class="form-control" type="time" name="c1Sun_On" value="{{ $devices->c2Sun_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Sunday Off</span>
                                        <input class="form-control" type="time" name="c1Sun_Off" value="{{ $devices->c2Sun_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </form>
                              </div>
                              </div>
                            </div>
                          </div>
                  
                      </td>
                    <td>
                      <h6>{{$devices->channel2}}</h6>
                      <p>By: {{$devices->channel2schedulesetby}} </p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      @if ($devices->lastchannel2schedule == NULL)
                      <p>A long time ago</p>
                        @else
                        <p>{{ \Carbon\Carbon::parse($devices->lastchannel2schedule)->diffForHumans() }}</p>
                        @endif                    
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel3schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
                      </button>
                      <br>
                      <br>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#viewchannel3schedule">
                        View Schedule
                      </button>
                      <div class="modal fade" id="channel3schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel3schedule" aria-bs-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabe3">{{$devices->channel3}} Schedule</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('updateChannel3Schedule', [$devices->id]) }}" method="POST" id="modal-details[3]">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" id="newRequestC3" name="newRequestC3" value="1">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Select Operation</span>
                                      <select class="form-control" id="ch3ss" name="schedule_setting" placeholder="Please select manual override options" value="{{ $devices->manualoverride}}">
                                        <option>Select Option</option>
                                        <option value="0">Switch Off</option>
                                        <option value="1">Switch On</option>
                                      </select> 
                                    </div>
                                    <div class="form-group">
                                      <span class="form-label">Select Time</span>
                                      <input class="form-control" type="time" name="schedule_time" required>
                                    </div>
                                  </div>
  
                                  <div class="col-md-6">
                                    <div class="form-check form-check-flat form-check-primary" style="align: right;">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="monday">
                                        Monday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="tuesday">
                                        Tuesday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="wednesday">
                                        Wednesday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="thursday">
                                        Thursday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="friday">
                                        Friday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="saturday">
                                        Saturday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="sunday">
                                        Sunday
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" form="modal-details[3]">Save changes</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="viewchannel3schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel1schedule" aria-bs-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$devices->channel3}} Schedule</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('updateChannel1Schedule', [$devices->id]) }}" method="POST" id="modal-details[1]">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" class="form-control" id="newRequestC1" name="newRequestC1" value="1">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Monday On</span>
                                        <input class="form-control" type="time" name="c3Mon_On" value="{{ $devices->c3Mon_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Monday Off</span>
                                        <input class="form-control" type="time" name="c3Mon_Off" value="{{ $devices->c3Mon_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Tuesday On</span>
                                        <input class="form-control" type="time" name="c1Tue_On" value="{{ $devices->c3Tue_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Tuesday Off</span>
                                        <input class="form-control" type="time" name="c1Tue_Off" value="{{ $devices->c3Tue_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Wednesday On</span>
                                        <input class="form-control" type="time" name="c1Wed_On" value="{{ $devices->c3Wed_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Wednesday Off</span>
                                        <input class="form-control" type="time" name="c1Wed_Off" value="{{ $devices->c3Wed_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Thursday On</span>
                                        <input class="form-control" type="time" name="c1Thur_On" value="{{ $devices->c3Thur_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Thurday Off</span>
                                        <input class="form-control" type="time" name="c1Thur_Off" value="{{ $devices->c3Thur_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Friday On</span>
                                        <input class="form-control" type="time" name="c1Fri_On" value="{{ $devices->c3Fri_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Friday Off</span>
                                        <input class="form-control" type="time" name="c1Fri_Off" value="{{ $devices->c3Fri_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Saturday On</span>
                                        <input class="form-control" type="time" name="c1Sat_On" value="{{ $devices->c3Sat_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Saturday Off</span>
                                        <input class="form-control" type="time" name="c1Sat_Off" value="{{ $devices->c3Sat_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Sunday On</span>
                                        <input class="form-control" type="time" name="c1Sun_On" value="{{ $devices->c3Sun_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Sunday Off</span>
                                        <input class="form-control" type="time" name="c1Sun_Off" value="{{ $devices->c3Sun_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </form>
                              </div>
                              </div>
                            </div>
                          </div>
                     
                      </td>
                    <td>
                      <h6>{{$devices->channel3}}</h6>
                      <p>By: {{$devices->channel3schedulesetby}} </p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      @if ($devices->lastchannel3schedule == NULL)
                      <p>A long time ago</p>
                        @else
                        <p>{{ \Carbon\Carbon::parse($devices->lastchannel3schedule)->diffForHumans() }}</p>
                        @endif                    
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel4schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
                      </button>
                      <br>
                      <br>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#viewchannel4schedule">
                        View Schedule
                      </button>
                      <div class="modal fade" id="channel4schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel4schedule" aria-bs-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="card modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel4">{{$devices->channel4}} Schedule</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('updateChannel4Schedule', [$devices->id]) }}" method="POST" id="modal-details[4]">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" id="newRequestC4" name="newRequestC4" value="1">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <span class="form-label">Select Operation</span>
                                      <select class="form-control" id="ch4ss" name="schedule_setting" placeholder="Please select manual override options" value="{{ $devices->manualoverride}}">
                                        <option>Select Option</option>
                                        <option value="0">Switch Off</option>
                                        <option value="1">Switch On</option>
                                      </select> 
                                    </div>
                                    <div class="form-group">
                                      <span class="form-label">Select Time</span>
                                      <input class="form-control" type="time" name="schedule_time" required>
                                    </div>
                                  </div>
  
                                  <div class="col-md-6">
                                    <div class="form-check form-check-flat form-check-primary" style="align: right;">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="monday">
                                        Monday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="tuesday">
                                        Tuesday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="wednesday">
                                        Wednesday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="thursday">
                                        Thursday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="friday">
                                        Friday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="saturday">
                                        Saturday
                                      </label>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="sunday">
                                        Sunday
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" form="modal-details[4]">Save changes</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="viewchannel4schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel1schedule" aria-bs-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$devices->channel4}} Schedule</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('updateChannel1Schedule', [$devices->id]) }}" method="POST" id="modal-details[1]">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" class="form-control" id="newRequestC1" name="newRequestC1" value="1">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Monday On</span>
                                        <input class="form-control" type="time" name="c1Mon_On" value="{{ $devices->c4Mon_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Monday Off</span>
                                        <input class="form-control" type="time" name="c1Mon_Off" value="{{ $devices->c4Mon_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Tuesday On</span>
                                        <input class="form-control" type="time" name="c1Tue_On" value="{{ $devices->c4Tue_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Tuesday Off</span>
                                        <input class="form-control" type="time" name="c1Tue_Off" value="{{ $devices->c4Tue_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Wednesday On</span>
                                        <input class="form-control" type="time" name="c1Wed_On" value="{{ $devices->c4Wed_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Wednesday Off</span>
                                        <input class="form-control" type="time" name="c1Wed_Off" value="{{ $devices->c4Wed_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Thursday On</span>
                                        <input class="form-control" type="time" name="c1Thur_On" value="{{ $devices->c4Thur_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Thurday Off</span>
                                        <input class="form-control" type="time" name="c1Thur_Off" value="{{ $devices->c4Thur_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Friday On</span>
                                        <input class="form-control" type="time" name="c1Fri_On" value="{{ $devices->c4Fri_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Friday Off</span>
                                        <input class="form-control" type="time" name="c1Fri_Off" value="{{ $devices->c4Fri_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Saturday On</span>
                                        <input class="form-control" type="time" name="c1Sat_On" value="{{ $devices->c4Sat_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Saturday Off</span>
                                        <input class="form-control" type="time" name="c1Sat_Off" value="{{ $devices->c4Sat_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Sunday On</span>
                                        <input class="form-control" type="time" name="c1Sun_On" value="{{ $devices->c4Sun_On }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <span class="form-label">Sunday Off</span>
                                        <input class="form-control" type="time" name="c1Sun_Off" value="{{ $devices->c4Sun_Off }}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </form>
                              </div>
                              </div>
                            </div>
                          </div>
                        
                      </td>
                    <td>
                      <h6>{{$devices->channel4}}</h6>
                      <p>By: {{$devices->channel4schedulesetby}} </p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      @if ($devices->lastchannel4schedule == NULL)
                          <p>A long time ago</p>
                      @else
                      <p>{{ \Carbon\Carbon::parse($devices->lastchannel4schedule)->diffForHumans() }}</p>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet"> 
            <!--clock-->
            <div class="clockbox">
              <svg id="clock" xmlns="http://www.w3.org/2000/svg" width="600" height="300" viewBox="0 0 600 600">
                  <g id="face">
                      <circle class="circle" cx="300" cy="300" r="253.9"/>
                      <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"/>
                      <circle class="mid-circle" cx="300" cy="300" r="16.2"/>
                  </g>
                  <g id="hour">
                      <path class="hour-hand" d="M300.5 298V142"/>
                      <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                  </g>
                  <g id="minute">
                      <path class="minute-hand" d="M300.5 298V67"/>
                      <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                  </g>
                  <g id="second">
                      <path class="second-hand" d="M300.5 350V55"/>
                      <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                  </g>
              </svg>
            </div>
            <!--end clock-->
            {{-- beginng of send time --}}
                {{-- <div class="menu-button-container align-items-right">
                  <button class="mdc-button mdc-menu-button mdc-button--raised button-box-shadow tx-12 text-dark bg-white font-weight-light">
                      Update time
                    <i class="material-icons">arrow_drop_down</i>
                  </button>
                  <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                      
                      <li class="mdc-list-item" role="menuitem">
                        <form method="POST" action="{{ route('cleartamper', [$devices->id]) }}">
                          @method('PUT')
                          @csrf
                          <input type="checkbox" id="update_time" class="mdc-switch__native-control" role="switch" name="channel2state" onchange="this.form.submit()" {{ $devices->channel2state ? 'checked' : '' }}>
                          <h6 class="item-subject font-weight-normal"><a href="{{ route('updatetime', $devices->id) }}" onchange="this.form.submit()">Update</a></h6>
                        </form>
                      </li>
                  
                    </ul>
                  </div>
                </div> --}}
            {{-- end of send time --}}
          </div>
        </div>
        <div class="show inactive" id="location-div" aria-labelledby="view-location">
          <iframe class="position-relative rounded w-100 h-100"
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCrkKIJSziNhRQIZFjmznl8wfS31aKjSc&callback=initMap"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
        </div>
      </div> 
    </div>
  </div>
</div>

@endsection