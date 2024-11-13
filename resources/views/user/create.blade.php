

@extends('layouts.admin')

@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Register new device</h4>
      <p class="card-description">
        Device registration form
      </p>
      <form class="forms-sample" action="{{ route('updateDevice', "device_id") }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @method('PUT')
        <div class="form-group">
          <label for="exampleInputName1">Device Serialnumber</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Device Serialnumber" name="device_serialnumber">
        </div>
        <div class="form-group">
          <label for="exampleInputMac">Device Name</label>
          <input type="text" class="form-control" id="exampleInputMac" placeholder="Device Name" name="device_name">
        </div>
        <div class="form-group">
            <label for="exampleInputMac">Device Phone Number</label>
            <input type="text" class="form-control" id="exampleInputMac" placeholder="Device Phone Number" name="mac_address">
          </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button type="button" class="btn btn-light" onclick="location.href='{{route('user.index')}}'">Cancel</button>
      </form>
    </div>
  </div>
</div>

@endsection