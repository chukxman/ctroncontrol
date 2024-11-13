{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    @include('inc.messages')
    <h1 class="mt-4">Edit Devices Details</h1>

    <form action="{{ route('updateDevice', $devices->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="device_name">Device Name:</label>
            <input type="text" name="device_name" class="form-control" value="{{ $devices->device_name }}" placeholder="Enter device name">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" value="{{ $devices->address }}" placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" class="form-control" value="{{ $devices->state }}" placeholder="Enter state">
        </div>
        <div class="form-group">
            <label for="lga">LGA:</label>
            <input type="text" name="lga" class="form-control" value="{{ $devices->lga }}" placeholder="Enter LGA">
        </div>
        <div class="form-group">
            <label for="user_id">Site Engineer ID:</label>
            <input type="text" name="engineer_id" class="form-control" value="{{ $devices->engineer_id }}" placeholder="Enter Engineer ID">
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>
    </form>
</div>

@endsection --}}

{{-- @extends('layouts.master')

@section('content')

<div class="mdc-layout-grid">
    @include('inc.messages')
    <div class="mdc-layout-grid__inner">
      <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
          <h6 class="card-title">Edit Device details</h6>
          <form action="{{ route('UpdateDevice',$device->id) }}" method="POST">
            @csrf
        @method('PUT')
          <div class="template-demo">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="device_name" value="{{ $device->device_name }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Device Name</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="address" value="{{ $device->address }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Address</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="device_state" value="{{ $device->device_state }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">State</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="lga" value="{{ $device->lga }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Local Government Area</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="engineer_id" value="{{ $device->engineer_id }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Engineer Id</label>
                </div>
              </div>
            </div>
            <button type="submit" class="mdc-button mdc-button--raised">
              Update Device
          </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection --}}

  @extends('layouts.master')

  @section('content')

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Device </h4>
        <p class="card-description">
          Form for editing device details
        </p>
        <form class="forms-sample" action="{{ route('updateDevice',$devices->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleInputName">Device Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="device_name" value="{{ $devices->device_name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputKey">Device Pin</label>
            <input type="password" size="5" class="form-control" id="exampleInputKey" name="devicekey" maxlength="5" value="{{ $devices->devicekey }}">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Location</label>
            <input type="text" class="form-control" id="exampleInputCity1" name="location" value="{{ $devices->location }}">
          </div>
          <div class="form-group">
            <label for="exampleSelectEngineer">Site Engineer</label>
              <select class="form-control" id="exampleSelectEngineer" name="engineer_id" placeholder="Please select site engneer" value="{{ $devices->engineer_id}}">
                <option value="{{$devices->engineer_id}}">Select site engineer</option>
                @if (count($engineerslist)) 
                @foreach ($engineerslist as $engineer)
                <option value="{{ $engineer->id }}">{{ $engineer->engineer_name }}</option>
                @endforeach
                @else
                <option value="0">No Site Engineer</option>
                @endif
              </select>
          </div>
          <div class="form-group">
            <label for="exampleSelectTimeZone">TimeZone</label>
              <select class="form-control" id="exampleSelectTimeZone" name="timezone" value="{{$devices->timezone}}">
                <option value="{{$devices->timezone}}">Select TimeZone</option>
                <option value="0">Greenwish Mean Time (GMT +00:00)</option>
                <option value="0">Universal Coordinated Time (UTC +00:00)</option>
                <option value="60">European Central Time (ECT +01:00)</option>
                <option value="120">Eastern European Time (EET +02:00)</option>
                <option value="120">(Arabic) Egypt African Time (ART +02:00)</option>
                <option value="180">Eastern African Time (EAT +03:00)</option>
                <option value="210">Middle East Time (MET +03:30)</option>
                <option value="240">Near East Time (NET +04:00)</option>
                <option value="300">Pakistan Lahore Time (PLT +05:00)</option>
                <option value="330">India Standard Time (IST +05:30)</option>
                <option value="360">Bangladesh Standard Time (BST +06:00)</option>
                <option value="420">Vietnam Standard Time (VST +07:00)</option>
                <option value="480">China Taiwan Time (CTT +08:00)</option>
                <option value="540">Japan Standard Time (JST +09:00)</option>
                <option value="570">Australia Central Time (ACT +09:30)</option>
                <option value="600">Australia Eastern Time (AET +10:00)</option>
                <option value="660">Solomon Standard Time (SST +11:00)</option>
                <option value="720">New Zealand Standard Time (NST +12:00)</option>
                <option value="-660">Midway Island Time (MIT -11:00)</option>
                <option value="-600">Hawaii Standard Time (HST -10:00)</option>
                <option value="-540">Alaska Standard Time (AST -09:00)</option>
                <option value="-480">Pacific Standard Time (PST -08:00)</option>
                <option value="-420">Phoenix Standard Time (PNT -07:00)</option>
                <option value="-420">Mountain Standard Time (MST -07:00)</option>
                <option value="-360">Central Standard Time (CST -06:00)</option>
                <option value="-300">Eastern Standard Time (EST -05:00)</option>
                <option value="-300">Indian Eastern Standard Time (IET -05:00)</option>
                <option value="-240">Puerto Rico and US Virgin Island Time (PRT -04:00)</option>
                <option value="-210">Canada Newfoundland Time (CNT -03:30)</option>
                <option value="-180">Argentina Standard Time (AGT -03:00)</option>
                <option value="-180">Brazil Eastern Time (BET -03:00)</option>
                <option value="-60">Central African Time (CAT -01:00)</option>
              </select>
          </div>
          <div class="form-group">
            <label for="ManualOverride">Manual Button Override</label>
              <select class="form-control" id="ManualOverride" name="manualoverride" placeholder="Please select manual override options" value="{{ $devices->manualoverride}}">
                <option value="{{$devices->manualoverride}}">Select Manual Override option</option>
                <option value="0">Always Off</option>
                <option value="1">Always On</option>
                <option value="2">On When network is unavailable</option>
              </select>
          </div>
          <div class="form-group">
            <label for="PowerOnState">Power On State</label>
              <select class="form-control" id="PowerOnState" name="poweronstate" placeholder="Please Select Power ON Options" value="{{ $devices->poweronoption}}">
                <option value="{{$devices->poweronstate}}">Select Power On Options</option>
                <option value="0">Time Schedule</option>
                <option value="1">Last State on Web </option>
                <option value="2">Power On</option>
                <option value="3">Power Off</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleInputChannel1">Channel1</label>
            <input type="text" class="form-control" id="exampleInputChannel1" name="channel1" value="{{ $devices->channel1 }}" size="15">
          </div>
          <div class="form-group">
            <label for="exampleInputChannel2">Channel2</label>
            <input type="text" class="form-control" id="exampleInputChannel2" name="channel2" value="{{ $devices->channel2 }}"  size="15">
          </div>
          <div class="form-group">
            <label for="exampleInputChannel3">Channel3</label>
            <input type="text" class="form-control" id="exampleInputChannel3" name="channel3" value="{{ $devices->channel3 }}"  size="15">
          </div>
          <div class="form-group">
            <label for="exampleInputChannel4">Channel4</label>
            <input type="text" class="form-control" id="exampleInputChannel4" name="channel4" value="{{ $devices->channel4 }}" size="15">
          </div>
          <button type="submit" class="btn btn-primary me-2">Save</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection