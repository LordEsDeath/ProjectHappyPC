@extends('layouts.app')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Users manage - Add user</strong></h3>
	<div class="add">
	<a href="users" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-backward"></i> Back to list</a>
	</div>
</div>

<div class="box-body">
	<div class="container">
        <div class="col-lg-9 margin-tb">
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
            <!-- Display Validation Errors -->
            @include('common.errors') 
            <form action="{{ url('adduser') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="Enter your name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="email" class="form-control" value="" placeholder="Enter your email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Role: </label>
                    <div class="col-sm-6">
                        <select class="form-control input-sm" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role}}"
                                    @if($role=='user') selected @endif
                                >{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" id="password" class="form-control" value="" placeholder="Enter your password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" placeholder="Password confirmation">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				    <button type="submit" class="btn btn-primary">Save user</button>
			    </div>	

            </form>
        </div>
    </div>
</div>

@endsection