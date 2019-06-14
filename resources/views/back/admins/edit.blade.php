@extends('layouts.app')

@section('pageTitle')
    <a class="navbar-brand" href="#">Edit Admin</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::model($admin, ['method' => 'patch', 'route' => ['admins.update', $admin->id]]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'readonly']) }}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-fill">Save</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
