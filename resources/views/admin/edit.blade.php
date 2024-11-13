{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    @include('inc.messages')
    <h1 class="mt-4">Edit Devices</h1>

    <form action="{{ route('admin.update',$device->id) }}" method="POST">
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- @csrf
        @method('PUT')
        <div class="form-group">
            <label for="device_name">Device Name:</label>
            <input type="text" name="device_name" class="form-control" value="{{ $device->device_name }}" placeholder="Enter device name">
        </div>
        <div class="form-group">
            <label for="device_serialnumber">Device SerialNumber:</label>
            <input type="text" name="device_serialnumber" class="form-control" value="{{ $device->device_serialnumber }}" placeholder="Enter device SerialNumber">
        </div>
        <div class="form-group">
            <label for="organization_name">Organization Name:</label>
            <input type="text" name="organization_name" class="form-control" value="{{ $device->organization_name }}" placeholder="Enter Organization Name">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" class="form-control" value="{{ $device->state }}" placeholder="Enter state">
        </div>
        <div class="form-group">
            <label for="lga">LGA:</label>
            <input type="text" name="lga" class="form-control" value="{{ $device->lga }}" placeholder="Enter LGA">
        </div>
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" value="{{ $device->user_id }}" placeholder="Enter User ID">
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>
    </form>
</div>

@endsection  --}}


{{-- @extends('layouts.master')

@section('content')

<div class="mdc-layout-grid">
    @include('inc.messages')
    <div class="mdc-layout-grid__inner">
      <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
          <h6 class="card-title">Register Edit Device</h6>
          <form action="{{ route('admin.update',$device->id) }}" method="POST">
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
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="organization_name" value="{{ $device->organization_name }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Organiation Name</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="device_serialnumber" value="{{ $device->device_serialnumber }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Serial Number</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="location" value="{{ $device->location }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">Location</label>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-text-field">
                  <input class="mdc-text-field__input" id="text-field-hero-input" name="user_id" value="{{ $device->user_id }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="text-field-hero-input" class="mdc-floating-label">User Id</label>
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


  @extends('layouts.admin')

  @section('content')

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Device</h4>
        <p class="card-description">
          Form for editing device 
        </p>
        <form class="forms-sample" action="{{ route('admin.update',$device->id) }}" method="POST">
          @csrf
           @method('PUT')
          <div class="form-group">
            <label for="exampleInputName1">Device Name</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="device_name">
          </div>
          <div class="form-group">
            <label for="exampleInputOrganization">Organization Name</label>
            <input type="text" class="form-control" id="exampleInputOrganization" placeholder="Organization name" name="organization_name">
          </div>
          <div class="form-group">
            <label for="exampleInputSerial">Device Serialnumber</label>
            <input type="text" class="form-control" id="exampleInputSerial" placeholder="Device Serialnumber" name="device_serialnumber">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Location</label>
            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" name="location">
          </div>
          <div class="form-group">
            <label for="exampleInputUserid">User ID</label>
            <input type="text" class="form-control" id="exampleInputUserid" placeholder="User ID" name="user_id">
          </div>
          <div class="form-group">
            <label for="exampleInputEngineerid">Engineer ID</label>
            <input type="text" class="form-control" id="exampleInputEngineerid" placeholder="Engineer ID" name="engineer_id">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection