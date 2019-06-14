{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    {{--<div class="row">--}}
        {{--<div class="col-12 bg-white">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                    {{--<h1>Dashboard</h1>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('pageTitle')
    <a class="navbar-brand" href="{{ route('admin.home') }}">Dashboard</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-display1"></i>Admins</h4>
                        </div>
                        <div class="content" style="font-weight:bold; font-size:25px;">
                            {{$admins}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-user"></i>Categories</h4>
                        </div>
                        <div class="content" style="font-weight:bold; font-size:25px;">
                            {{$categories}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-comment"></i>Products</h4>
                        </div>
                        <div class="content" style="font-weight:bold; font-size:25px;">
                            {{$products}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><i class="pe-7s-comment"></i>Users</h4>
                        </div>
                        <div class="content" style="font-weight:bold; font-size:25px;">
                            {{$users}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
