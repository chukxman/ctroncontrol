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
            <input type="password" size="5" class="form-control" id="exampleInputKey" name="devicekey" value="{{ $devices->devicekey }}">
          </div>
          <div class="form-group">
            <label for="exampleInputOrg">Organization Name</label>
            <input type="text" class="form-control" id="exampleInputOrg" name="organization_name" value="{{ $devices->organization_name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Location</label>
            <input type="text" class="form-control" id="exampleInputCity1" name="location" value="{{ $devices->location }}">
          </div>
          <div class="form-group">
            <label for="ManualOverride">Tamper Activation</label>
              <select class="form-control" id="ManualOverride" name="manualoverride" placeholder="Please select manual override options" value="{{ $devices->manualoverride}}">
                <option value="{{$devices->manualoverride}}" selected disabled>@if ($devices->manualoverride == 1)
                On 
                @else Off
                @endif</option>
                <option value="0">Off</option>
                <option value="1">On</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleSelectEngineer">Site Engineer</label>
              <select class="form-control" id="exampleSelectEngineer" name="engineer_id" placeholder="Please select site engneer" value="{{ $devices->engineer_id}}">
                <option value="{{$devices->engineer_id}}" selected>Select Site Engineer</option>
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
            <label for="mac_address">Device Phone Number</label>
            <input type="text" class="form-control" id="mac_address" name="mac_address" value="{{ $devices->mac_address }}">
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
          <div class="form-group">
            <label for="reportto">Report to</label>
            <input type="text" class="form-control" id="reportto" name="reportto" value="{{ $devices->reportto }}">
          </div>
          <div class="form-group">
            <label for="reportto">Report email</label>
            <input type="text" class="form-control" id="reportemail" name="reportemail" value="{{ $devices->reportemail }}">
          </div>
          <button type="submit" class="btn btn-primary me-2">Save</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection