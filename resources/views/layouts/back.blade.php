<!doctype html>
<html lang="en">
<head>
    <base href="{{ route('admin.home') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ url('public/css/back/app.css') }}">
</head>
<body>
<div class="container-fluid">
    @include('back.includes.nav')

    <div class="row">
        @include('back.includes.messages')
    </div>
    @include('flash::message')

    @yield('content')

</div>
<script type="text/javascript" src="{{ url('public/js/back/app.js') }}"></script>
</body>
</html>
