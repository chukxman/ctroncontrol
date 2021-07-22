@extends('layouts.main')

@section('content')


<div class="container-fluid">
    <h1 class="mt-4">{{ Auth::user()->name }} Devices</h1>
    
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

        @foreach ($devices as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td><a href = "user/{{$d->id}}">{{ $d->device_name }}</a></td>
                <td>{{ $d->device_serialnumber }}</td>
                <td>{{ $d->organization_name }}</td>
                <td>{{ $d->location }}</td>
                <td>   <a href="#" class="btn btn-danger">Delete</a></td>
            </tr> 
        @endforeach
        
        @else
            <p>No Device Found</p>
        @endif
    </table>

        
    
</div>

@endsection