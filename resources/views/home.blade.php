@extends('layouts.main')

@section('content')


<div class="container-fluid">
    <h3 class="mt-4">Welcome {{ Auth::user()->name }} </h3>
    
    <p><h2 class="well"> To TimmerX Web Application</h2></p>
    <h3>please click any of the following to Begin</h3>

    <p>
        <a href="{{ route('user.index') }}" class="btn btn-primary">View Your Devices</a>
    </p>


        
    
</div>

@endsection