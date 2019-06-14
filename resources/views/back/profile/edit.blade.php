@extends('layouts.app')

@section('pageTitle')
    <a class="navbar-brand" href="#">Edit Profile</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::open(['method' => 'patch', 'route' => 'admin.profile.update']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'readonly']) }}
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
