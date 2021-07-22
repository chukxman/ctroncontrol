@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <h1>Set up {{$devices->device_name}} </h1>

        
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Channel 1</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#channel1" data-toggle="collapse" aria-expanded="link to set schedule">Set Schedule</a>
                    <div class="small text-white"><i class="fas fa-angle-down"></i></div>
                </div>
            </div>
            <div class="collapse" id="channel1">
                
                {{-- <form action="{{ route('user.update',$device->id) }}" method="POST">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    {{-- @csrf
                    @method('PUT') --}} 
                    <livewire:toggle-switch
                    :model="$device_states"
                    field="channel1state"
                    key="{{ $device_states->id }}" />
                    {{-- </form> --}}
                <form action="POST" method="POST">
                    <div class="form-group row">
                        <label for="monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="monday_on" name="c1Mon_On" placeholder="Monday ON">
                        
                            <input type="time" class="form-control" id="monday_off" name="c1Mon_Off" placeholder="Monday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="tuesday_on" name="c1Tue_On" placeholder="Tuesday ON">
                        
                            <input type="time" class="form-control" id="tuesday_off" name="c1Tue_Off" placeholder="Tuesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="wednesday_on" name="c1Wed_On" placeholder="Wednesday ON">
                        
                            <input type="time" class="form-control" id="wednesday_off" name="c1Wed_Off" placeholder="Wednesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="thursday_on" name="c1Thur_On" placeholder="Thursday ON">
                        
                            <input type="time" class="form-control" id="thursday_off" name="c1Thur_Off" placeholder="Thursday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="friday_on" name="c1Fri_On" placeholder="Friday ON">
                        
                            <input type="time" class="form-control" id="friday_off" name="c1Fri_Off" placeholder="Friday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="saturday_on" name="c1Sat_Off" placeholder="Saturday ON">
                        
                            <input type="time" class="form-control" id="saturday_off" name="c1Sat_On" placeholder="Saturday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="sunday_on" name="c1Sun_On" placeholder="Sunday ON">
                        
                            <input type="time" class="form-control" id="sunday_off" name="c1Sun_Off" placeholder="Sunday OFF">
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                   
                </form>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Channel 2</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#channel2" data-toggle="collapse" aria-expanded="link to set schedule">Set Schedules</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
            <div class="collapse" id="channel2">
                <form action="POST" class="POST">
                    
                        <label class="switch">
                            <input type="checkbox" name="channel2state">
                             <span class="slider"></span>
                        </label>
                   
                    <div class="form-group row">
                        <label for="monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="monday_on" name="c2Mon_On" placeholder="Monday ON">
                        
                            <input type="time" class="form-control" id="monday_off" name="c2Mon_Off" placeholder="Monday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="tuesday_on" name="c2Tue_On" placeholder="Tuesday ON">
                        
                            <input type="time" class="form-control" id="tuesday_off" name="c2Tue_Off" placeholder="Tuesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="wednesday_on" name="c2Wed_On" placeholder="Wednesday ON">
                        
                            <input type="time" class="form-control" id="wednesday_off" name="c2Wed_Off" placeholder="Wednesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="thursday_on" name="c2Thur_On" placeholder="Thursday ON">
                        
                            <input type="time" class="form-control" id="thursday_off" name="c2Thur_Off" placeholder="Thursday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="friday_on" name="c2Fri_On" placeholder="Friday ON">
                        
                            <input type="time" class="form-control" id="friday_off" name="c2Fri_Off" placeholder="Friday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="saturday_on" name="c2Sat_On" placeholder="Saturday ON">
                        
                            <input type="time" class="form-control" id="saturday_off" name="c2Sat_Off" placeholder="Saturday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="sunday_on" name="c2Sun_On" placeholder="Sunday ON">
                        
                            <input type="time" class="form-control" id="sunday_off" name="c2Sun_Off" placeholder="Sunday OFF">
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                   
                </form>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Channel 3</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#channel3" data-toggle="collapse" aria-expanded="link to set schedule">Set Schedule</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
            <div class="collapse" id="channel3">
                <form action="POST" class="POST">
                    
                        <label class="switch">
                            <input type="checkbox" name="channel3state" >
                             <span class="slider"></span>
                        </label>
                   
                    <div class="form-group row">
                        <label for="monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="monday_on" name="c3Mon_On" placeholder="Monday ON">
                        
                            <input type="time" class="form-control" id="monday_off" name="c3Mon_Off" placeholder="Monday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="tuesday_on" name="c3Tue_On" placeholder="Tuesday ON">
                        
                            <input type="time" class="form-control" id="tuesday_off" name="c3Tue_Off" placeholder="Tuesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="wednesday_on" name="c3Wed_On" placeholder="Wednesday ON">
                        
                            <input type="time" class="form-control" id="wednesday_off" name="c3Wed_Off" placeholder="Wednesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="thursday_on" name="c3Thur_On" placeholder="Thursday ON">
                        
                            <input type="time" class="form-control" id="thursday_off" name="c3Thur_Off" placeholder="Thursday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="friday_on" name="c3Fri_On" placeholder="Friday ON">
                        
                            <input type="time" class="form-control" id="friday_off" name="c3Fri_Off" placeholder="Friday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="saturday_on" name="c3Sat_On" placeholder="Saturday ON">
                        
                            <input type="time" class="form-control" id="saturday_off" name="c3Sat_Off" placeholder="Saturday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="sunday_on" name="c3Sun_On" placeholder="Sunday ON">
                        
                            <input type="time" class="form-control" id="sunday_off" name="c3Sun_Off" placeholder="Sunday OFF">
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                   
                </form>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Channel 4</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#channel4" data-toggle="collapse" aria-expanded="link to set schedule">Set Schedule</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
            <div class="collapse" id="channel4">
                <form action="POST" class="POST">
                    
                        <label class="switch">
                            <input type="checkbox" name="channel4state" >
                             <span class="slider"></span>
                        </label>
                   
                    <div class="form-group row">
                        <label for="monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="monday_on" name="c4Mon_On" placeholder="Monday ON">
                        
                            <input type="time" class="form-control" id="monday_off" name="c4Mon_Off" placeholder="Monday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="tuesday_on" name="c4Tue_On" placeholder="Tuesday ON">
                        
                            <input type="time" class="form-control" id="tuesday_off" name="c4Tue_Off" placeholder="Tuesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="wednesday_on" name="c4Wed_On" placeholder="Wednesday ON">
                        
                            <input type="time" class="form-control" id="wednesday_off" name="c4Wed_On" placeholder="Wednesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="thursday_on" name="c4Thur_On" placeholder="Thursday ON">
                        
                            <input type="time" class="form-control" id="thursday_off" name="c4Thur_Off" placeholder="Thursday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="friday_on" name="c4Fri_On" placeholder="Friday ON">
                        
                            <input type="time" class="form-control" id="friday_off" name="c4Fri_Off" placeholder="Friday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="saturday_on" name="c4Sat_On" placeholder="Saturday ON">
                        
                            <input type="time" class="form-control" id="saturday_off" name="c4Sat_Off" placeholder="Saturday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="sunday_on" name="c4Sun_On" placeholder="Sunday ON">
                        
                            <input type="time" class="form-control" id="sunday_off" name="c4Sun_On" placeholder="Sunday OFF">
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                   
                </form>
            </div>
        </div>
    </div>


@endsection