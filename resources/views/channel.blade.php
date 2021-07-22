@extends('layouts.main')

@section('content')

<main>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">StanbicIBTC</li>
        <li class="breadcrumb-item active">StanbicIBTC-Ikotun</li>
        <li class="breadcrumb-item active">Channel 1</li>
    </ol>
       
    
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Set Schedule for Channel 1</h3></div>
            <div class="card-body">
                <form action="POST" class="POST">
                    
                        <label class="switch">
                            <input type="checkbox">
                             <span class="slider"></span>
                        </label>
                   
                    <div class="form-group row">
                        <label for="monday_on" class="col-md-4 col-form-label text-md-right">Monday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="monday_on" placeholder="Monday ON">
                        
                            <input type="time" class="form-control" id="monday_off" placeholder="Monday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tuesday_on" class="col-md-4 col-form-label text-md-right">Tuesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="tuesday_on" placeholder="Tuesday ON">
                        
                            <input type="time" class="form-control" id="tuesday_off" placeholder="Tuesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wednesday_on" class="col-md-4 col-form-label text-md-right">Wednesday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="wednesday_on" placeholder="Wednesday ON">
                        
                            <input type="time" class="form-control" id="wednesday_off" placeholder="Wednesday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thursday_on" class="col-md-4 col-form-label text-md-right">Thursday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="thursday_on" placeholder="Thursday ON">
                        
                            <input type="time" class="form-control" id="thursday_off" placeholder="Thursday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="friday_on" class="col-md-4 col-form-label text-md-right">Friday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="friday_on" placeholder="Friday ON">
                        
                            <input type="time" class="form-control" id="friday_off" placeholder="Friday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="saturday_on" class="col-md-4 col-form-label text-md-right">Saturday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="saturday_on" placeholder="Saturday ON">
                        
                            <input type="time" class="form-control" id="saturday_off" placeholder="Saturday OFF">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sunday_on" class="col-md-4 col-form-label text-md-right">Sunday</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="sunday_on" placeholder="Sunday ON">
                        
                            <input type="time" class="form-control" id="sunday_off" placeholder="Sunday OFF">
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                   
                </form>
            </div>
        </div>
</main>

@endsection
