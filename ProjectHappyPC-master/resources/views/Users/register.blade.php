@extends('layouts.appMain')

@section('content')

<h1>Register User</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> 
        <ul>
            @foreach ($errors->all() as $error)
                <li></li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('register') }}" method="POST" class="form-horizontal">
    @csrf

    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name <i class="fa fa-user icon"></i></label>
        <div class="col-sm-6">
            <input type="text" name="name" id="name" class="form-control" value="" placeholder="Enter your name">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email <i class="fa fa-envelope icon"></i></label>
        <div class="col-sm-6">
            <input type="email" name="email" id="email" class="form-control" value="" placeholder="Enter your email">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password <i class="fa fa-key icon"></i></label>
        <div class="col-sm-6">
            <input type="password" name="password" id="password" class="form-control" value="" placeholder="Enter your password">
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-sm-3 control-label">Confirm password <i class="fa fa-key icon"></i></label>
        <div class="col-sm-6">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" placeholder="Password confirmation">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Confirm Registration</button>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <p>Already have an account? <a href="{{ url('/login') }}">Login</a>.</p>
    </div>

</form>

@endsection