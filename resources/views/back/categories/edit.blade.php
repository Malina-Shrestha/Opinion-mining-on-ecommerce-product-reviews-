@extends('layouts.app')

@section('pageTitle')
    <a class="navbar-brand" href="#">Edit Category</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::model($category, ['method' => 'patch', 'route' => ['categories.update', $category->slug]]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('slug', 'Slug') }}
                            {{ Form::text('slug', null, ['class' => 'form-control', 'required']) }}
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
