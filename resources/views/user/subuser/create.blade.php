{{-- @extends('layouts.master')

@section('content')
<div class="container-fluid">
    @include('inc.messages')
    <h1 class="mt-4">Create Site Engineer</h1>

    <div class="card-body">
        <form method="POST" action="{{ route('subuser.store') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name of Site Engineer') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address of Site Engineer') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection --}}

@extends('layouts.master')

  @section('content')

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create User</h4>
        <p class="card-description">
          Form for creating subuser
        </p>
        <form class="forms-sample" action="{{ route('subuser.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputName">Name of site Engineer</label>
            <input type="text" class="form-control" id="exampleInputName" @error('engineer_name') is-invalid @enderror name="engineer_name" value="{{ old('engineer_name') }}" required autocomplete="engineer_name" autofocus>
            
            @error('engineer_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail">Email Address</label>
            <input type="text" class="form-control" id="exampleInputEmail" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword" @error('password') is-invalid @enderror name="password" required autocomplete="new-password">
            @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
          <div class="form-group">
            <label for="exampleInputCpassword">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputCpassword" name="password_confirmation" required autocomplete="new-password">
          </div>
          <button type="submit" class="btn btn-primary me-2">Register</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

@endsection