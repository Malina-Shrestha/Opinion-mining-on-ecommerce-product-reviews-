<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ url('public/css/back/app.css') }}">
</head>
<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-4 mx-auto mt-4 bg-white">
            <div class="row">
                <div class="col-12">
                    <h1>Login</h1>
                </div>
                @include('back.includes.messages')
                <div class="col-12">
                    {{ Form::open(['method' => 'post', 'action' => 'Back\LoginController@login']) }}
                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, ['claSS'=> 'form-control', 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" value="yes" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    {{{ Form::close() }}}
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="{{ url('public/js/back/app.js') }}"></script>
</body>
</html>
