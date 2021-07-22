@extends('layouts.main')

@section('content')
<div class="container-fluid">
    @include('inc.messages')
    <h1 class="mt-4">Create Devices</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="device_name">Device Name:</label>
            <input type="text" name="device_name" class="form-control" placeholder="Enter device name">
        </div>
        <div class="form-group">
            <label for="device_serialnumber">Device SerialNumber:</label>
            <input type="text" name="device_serialnumber" class="form-control" placeholder="Enter device SerialNumber">
        </div>
        <div class="form-group">
            <label for="organization_name">Organization Name:</label>
            <input type="text" name="organization_name" class="form-control" placeholder="Enter Organization Name">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" placeholder="Enter Location">
        </div>
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" placeholder="Enter User ID">
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </form>
</div>

@endsection