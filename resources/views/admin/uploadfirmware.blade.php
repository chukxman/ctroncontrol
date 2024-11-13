@extends('layouts.admin')

  @section('content')

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Register new device</h4>
        <p class="card-description">
          Device registration form
        </p>
        <form class="forms-sample" action="{{ route('uploadfirmware') }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleversion">Firmware Version</label>
            <input type="text" class="form-control" id="exampleversion" placeholder="Firmware version Number" name="version_number">
          </div>
          <div class="form-group">
            <label for="examplefile">Upload Firmware</label>
            <input type="file" class="form-control" id="examplefile" placeholder="Firmware" name="firmware">
          </div>
          <button type="submit" class="btn btn-primary me-2">Upload</button>
          <button type="button" class="btn btn-light" onclick="location.href='{{route('admin.index')}}'">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection