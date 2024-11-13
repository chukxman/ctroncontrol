

  @extends('layouts.admin')

  @section('content')

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Register new device</h4>
        <p class="card-description">
          Device registration form
        </p>
        <form class="forms-sample" action="{{ route('admin.store') }}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInputName1">Device SerialNumber</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Serial Number" name="device_serialnumber">
          </div>
          <div class="form-group">
            <label for="exampleInputMac">Mac Address</label>
            <input type="text" class="form-control" id="exampleInputMac" placeholder="Mac Address" name="mac_address">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button type="button" class="btn btn-light" onclick="location.href='{{route('admin.index')}}'">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection