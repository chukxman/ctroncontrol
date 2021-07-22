@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">All Devices</h1>
    <p>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Register new Device</a>
    </p>
    
    <table class="table">
        <tr>
            <th>ID</th>
            <th>DEVICE NAME</th>
            <th>SERIAL NUMBER</th>
            <th>ORGANIZATION NAME</th>
            <th>LOCATION</th>
            <th>ACTION</th>
        </tr>
        @if(count($devices) > 0)
        @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td><a href = "/devices/{{$device->id}}">{{ $device->device_name }}</a></td>
                <td>{{ $device->device_serialnumber }}</td>
                <td>{{ $device->organization_name }}</td>
                <td>{{ $device->location }}</td>
                <td><a href="{{ route('admin.edit',$device->id) }}" class="btn btn-info">Edit</a>   <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
                    <form method="POST" action="{{ route('admin.destroy',$device->id) }}">
                        @method('DELETE')
                        @csrf
                        {{-- <input type="hidden" name="_token" value="csrf_token"> --}}
                    </form></td>
            </tr>
        @endforeach
        
        @else
            <p>No Device Found</p>
        @endif
    </table>

        
    
</div>

@endsection