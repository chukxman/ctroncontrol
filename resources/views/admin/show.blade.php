@extends('layouts.admin')

@section('content')

<div class="mdc-layout-grid">
  <div class="mdc-layout-grid__inner">
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
      <div class="mdc-card info-card info-card--success">
        <div class="card-inner">
          <h5 class="card-title">{{$devices->channel1}}</h5>
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#" data-bs-toggle="modal" class="small-box-footer">Set counter</a></h5>
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
                        <label for="c1counter" class="col-md-4 col-form-label text-md-right">Counter</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker" name="c1counter" placeholder="hh:mm:ss" value="{{ $devices->c1counter }}">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" form="modal-details[5]">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switched by: @if($devices->channel1controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel1controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel1controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel1controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted">{{ \Carbon\Carbon::parse($devices->lastchannel1state)->diffForHumans() }}</p>
          <div class="card-icon-wrapper">
            <div class="mdc-switch mdc-switch--light" data-mdc-auto-init="MDCSwitch">
              <div class="mdc-switch__track"></div>
              <div class="mdc-switch__thumb-underlay">
                <div class="mdc-switch__thumb">
                  <form method="POST" action="{{ route('updateChannel1State', [$devices->id]) }}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" name="channel1state" onchange="this.form.submit()" {{ $devices->channel1state ? 'checked' : '' }} disabled>
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
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel2counter" data-bs-toggle="modal" class="small-box-footer">Set counter</a></h5>
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
                        <label for="c2counter" class="col-md-4 col-form-label text-md-right">Counter</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="c2counter" placeholder="channel2ounter" value="{{ $devices->c2counter }}">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" form="modal-details[6]">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switched by:@if($devices->channel2controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel2controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel2controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel2controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted">{{ \Carbon\Carbon::parse($devices->lastchannel2state)->diffForHumans() }}</p>
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
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel3counter" data-bs-toggle="modal" class="small-box-footer">Set counter</a></h5>
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
                        <label for="c3counter" class="col-md-4 col-form-label text-md-right">Counter</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="timmer" name="c3counter" placeholder="channel3counter" value="{{ $devices->c3counter }}">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" form="modal-details[7]">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switched by:@if($devices->channel3controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel3controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel3controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel3controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted">{{ \Carbon\Carbon::parse($devices->lastchannel3state)->diffForHumans() }}</p>
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
          <h5 class="font-weight-light pb-2 mb-1 border-bottom"><a href="#channel4counter" data-bs-toggle="modal" class="small-box-footer">Set counter</a></h5>
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
                        <label for="c4counter" class="col-md-4 col-form-label text-md-right">Counter</label>
                        <div class="col-md-6">
                            <input type="text" name="c4counter" class="form-control" id="timepicker" placeholder="channel4counter" value="{{ $devices->c4counter }}">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" form="modal-details[8]">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>  
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <h6 class="font-weight-light pb-2 mb-1 border-bottom">Switched by:@if($devices->channel4controlsource == 1)
            {{"Manual"}}
              @elseif($devices->channel4controlsource == 2)
              {{"Online"}}
              @elseif($devices->channel4controlsource == 3)
              {{"Online"}}
              @elseif($devices->channel4controlsource == 0)
              {{"Schedule"}}
          @endif</h5>
          <p class="tx-12 text-muted">{{ \Carbon\Carbon::parse($devices->lastchannel4state)->diffForHumans() }}</p>
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
          <h4 class="card-title mb-0">Set Schedule for various Channels</h4>
          <p>Temperature: {{$devices->temperature}}</p>
          <div>
              <i class="material-icons refresh-icon">refresh</i>
          </div>
        </div>
        <div class="d-block d-sm-flex justify-content-between align-items-center">
            <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button mdc-button--raised button-box-shadow tx-12 text-dark bg-white font-weight-light">
                  Last Seen: {{ \Carbon\Carbon::parse($devices->lastseen)->diffForHumans() }}
                <i class="material-icons">arrow_drop_down</i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  
                  <li class="mdc-list-item" role="menuitem">
                    <h6 class="item-subject font-weight-normal">Refresh</h6>
                  </li>
              
                </ul>
              </div>
            </div>
        </div>
        <div class="mdc-layout-grid__inner mt-2">
          <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
            <div class="table-responsive">
              <table class="table select-table">
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel1schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
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
                                  <div class="form-group row">
                                    <input type="hidden" class="form-control" id="newRequestC1" name="newRequestC1" value="1">
                                      <label for="c1monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Mon_On" placeholder="Monday ON" value="{{ $devices->c1Mon_On }}">
                                          <input type="time" class="form-control" name="c1Mon_Off" placeholder="Monday OFF" value="{{ $devices->c1Mon_Off }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="c1tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Tue_On" placeholder="Tuesday ON" value="{{ $devices->c1Tue_On }}">
                                      
                                          <input type="time" class="form-control" name="c1Tue_Off" placeholder="Tuesday OFF" value="{{ $devices->c1Tue_Off }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="c1wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Wed_On" placeholder="Wednesday ON" value="{{ $devices->c1Wed_On }}">
                                      
                                          <input type="time" class="form-control" name="c1Wed_Off" placeholder="Wednesday OFF" value="{{ $devices->c1Wed_Off }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="c1thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Thur_On" placeholder="Thursday ON" value="{{ $devices->c1Thur_On }}">
                                      
                                          <input type="time" class="form-control" name="c1Thur_Off" placeholder="Thursday OFF" value="{{ $devices->c1Thur_Off }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="c1friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Fri_On" placeholder="Friday ON" value="{{ $devices->c1Fri_On }}">
                                      
                                          <input type="time" class="form-control" name="c1Fri_Off" placeholder="Friday OFF" value="{{ $devices->c1Fri_Off }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="c1saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Sat_On" placeholder="Saturday ON" value="{{ $devices->c1Sat_On }}">
                                      
                                          <input type="time" class="form-control" name="c1Sat_Off" placeholder="Saturday OFF" value="{{ $devices->c1Sat_Off }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="c1sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                                      <div class="col-md-6">
                                          <input type="time" class="form-control" name="c1Sun_On" placeholder="Sunday ON" value="{{ $devices->c1Sun_On }}">
                                      
                                          <input type="time" class="form-control" name="c1Sun_Off" placeholder="Sunday OFF" value="{{ $devices->c1Sun_Off }}">
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
                    </td>
                    <td>
                      <h6>{{$devices->channel1}}</h6>
                      <p>Description</p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      <p>{{ \Carbon\Carbon::parse($devices->lastchannel1schedule)->diffForHumans() }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel2schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
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
                                    <div class="form-group row">
                                      <input type="hidden" class="form-control" id="newRequestC2" name="newRequestC2" value="1">
                                        <label for="c2monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Mon_On" placeholder="Monday ON" value="{{ $devices->c2Mon_On }}">
                                            <input type="time" class="form-control" name="c2Mon_Off" placeholder="Monday OFF" value="{{ $devices->c2Mon_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c2tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Tue_On" placeholder="Tuesday ON" value="{{ $devices->c2Tue_On }}">
                                        
                                            <input type="time" class="form-control" name="c2Tue_Off" placeholder="Tuesday OFF" value="{{ $devices->c2Tue_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c2wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Wed_On" placeholder="Wednesday ON" value="{{ $devices->c2Wed_On }}">
                                        
                                            <input type="time" class="form-control" name="c2Wed_Off" placeholder="Wednesday OFF" value="{{ $devices->c2Wed_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c2thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Thur_On" placeholder="Thursday ON" value="{{ $devices->c2Thur_On }}">
                                        
                                            <input type="time" class="form-control" name="c2Thur_Off" placeholder="Thursday OFF" value="{{ $devices->c2Thur_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c2friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Fri_On" placeholder="Friday ON" value="{{ $devices->c2Fri_On }}">
                                        
                                            <input type="time" class="form-control" name="c2Fri_Off" placeholder="Friday OFF" value="{{ $devices->c2Fri_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c2saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Sat_On" placeholder="Saturday ON" value="{{ $devices->c2Sat_On }}">
                                        
                                            <input type="time" class="form-control" name="c2Sat_Off" placeholder="Saturday OFF" value="{{ $devices->c2Sat_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c2sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c2Sun_On" placeholder="Sunday ON" value="{{ $devices->c2Sun_On }}">
                                        
                                            <input type="time" class="form-control" name="c2Sun_Off" placeholder="Sunday OFF" value="{{ $devices->c2Sun_Off }}">
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
                    </td>
                    <td>
                      <h6>{{$devices->channel2}}</h6>
                      <p>Description</p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      <p>{{ \Carbon\Carbon::parse($devices->lastchannel2schedule)->diffForHumans() }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel3schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
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
                                    <div class="form-group row">
                                      <input type="hidden" class="form-control" id="newRequestC3" name="newRequestC3" value="1">
                                        <label for="c3monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Mon_On" placeholder="Monday ON" value="{{ $devices->c3Mon_On }}">
                                            <input type="time" class="form-control" name="c3Mon_Off" placeholder="Monday OFF" value="{{ $devices->c3Mon_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c3tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Tue_On" placeholder="Tuesday ON" value="{{ $devices->c3Tue_On }}">
                                        
                                            <input type="time" class="form-control" name="c3Tue_Off" placeholder="Tuesday OFF" value="{{ $devices->c3Tue_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c3wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Wed_On" placeholder="Wednesday ON" value="{{ $devices->c3Wed_On }}">
                                        
                                            <input type="time" class="form-control" name="c3Wed_Off" placeholder="Wednesday OFF" value="{{ $devices->c3Wed_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c3thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Thur_On" placeholder="Thursday ON" value="{{ $devices->c3Thur_On }}">
                                        
                                            <input type="time" class="form-control" name="c3Thur_Off" placeholder="Thursday OFF" value="{{ $devices->c3Thur_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c3friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Fri_On" placeholder="Friday ON" value="{{ $devices->c3Fri_On }}">
                                        
                                            <input type="time" class="form-control" name="c3Fri_Off" placeholder="Friday OFF" value="{{ $devices->c3Fri_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c3saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Sat_On" placeholder="Saturday ON" value="{{ $devices->c3Sat_On }}">
                                        
                                            <input type="time" class="form-control" name="c3Sat_Off" placeholder="Saturday OFF" value="{{ $devices->c3Sat_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c3sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c3Sun_On" placeholder="Sunday ON" value="{{ $devices->c3Sun_On }}">
                                        
                                            <input type="time" class="form-control" name="c3Sun_Off" placeholder="Sunday OFF" value="{{ $devices->c3Sun_Off }}">
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
                    </td>
                    <td>
                      <h6>{{$devices->channel3}}</h6>
                      <p>Description</p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      <p>{{ \Carbon\Carbon::parse($devices->lastchannel3schedule)->diffForHumans() }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="mdc-button mdc-button--raised icon-button filled-button--light" data-bs-toggle="modal" data-bs-target="#channel4schedule">
                        <i class="material-icons mdc-button__icon">event_available</i>Set schedule
                      </button>
                      <div class="modal fade" id="channel4schedule" tabindex="-1" role="dialog" aria-bs-labelledby="channel4schedule" aria-bs-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
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
                                    <div class="form-group row">
                                      <input type="hidden" class="form-control" id="newRequestC4" name="newRequestC4" value="1">
                                        <label for="c4monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Mon_On" placeholder="Monday ON" value="{{ $devices->c4Mon_On }}">
                                            <input type="time" class="form-control" name="c4Mon_Off" placeholder="Monday OFF" value="{{ $devices->c4Mon_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c4tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Tue_On" placeholder="Tuesday ON" value="{{ $devices->c4Tue_On }}">
                                        
                                            <input type="time" class="form-control" name="c4Tue_Off" placeholder="Tuesday OFF" value="{{ $devices->c4Tue_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c4wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Wed_On" placeholder="Wednesday ON" value="{{ $devices->c4Wed_On }}">
                                        
                                            <input type="time" class="form-control" name="c4Wed_Off" placeholder="Wednesday OFF" value="{{ $devices->c4Wed_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c4thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Thur_On" placeholder="Thursday ON" value="{{ $devices->c4Thur_On }}">
                                        
                                            <input type="time" class="form-control" name="c4Thur_Off" placeholder="Thursday OFF" value="{{ $devices->c4Thur_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c4friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Fri_On" placeholder="Friday ON" value="{{ $devices->c4Fri_On }}">
                                        
                                            <input type="time" class="form-control" name="c4Fri_Off" placeholder="Friday OFF" value="{{ $devices->c4Fri_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c4saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Sat_On" placeholder="Saturday ON" value="{{ $devices->c4Sat_On }}">
                                        
                                            <input type="time" class="form-control" name="c4Sat_Off" placeholder="Saturday OFF" value="{{ $devices->c4Sat_Off }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c4sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="c4Sun_On" placeholder="Sunday ON" value="{{ $devices->c4Sun_On }}">
                                        
                                            <input type="time" class="form-control" name="c4Sun_Off" placeholder="Sunday OFF" value="{{ $devices->c4Sun_Off }}">
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
                    </td>
                    <td>
                      <h6>{{$devices->channel4}}</h6>
                      <p>Description</p>
                    </td>
                    <td>
                      <h6>Last schedule</h6>
                      <p>{{ \Carbon\Carbon::parse($devices->lastchannel4schedule)->diffForHumans() }}</p>
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
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>

@endsection