@extends('layouts.app')

@section('pageTitle')
    <a class="navbar-brand" href="{{ route('admins.index') }}"><i class="pe-7s-add-user"></i>Admins</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::open(['method' => 'post', 'route' => 'admins.store']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
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
