@extends('layouts.app')

@section('pageTitle')
    <a class="navbar-brand" href="#">Change Password</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::open(['method' => 'patch', 'route' => 'admin.password.update']) }}
                        <div class="form-group">
                            {{ Form::label('old_password', 'Old Password') }}
                            {{ Form::password('old_password', ['class' => 'form-control', 'required']) }}
                        </div>
                    <div class="form-group">
                        {{ Form::label('password', 'New Password') }}
                        {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Confirm Password') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
