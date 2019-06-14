<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @yield('pageTitle')
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>
                            {{ auth('admin')->user()->name }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.password.edit') }}">Change Password</a></li>
                        <li class="divider"></li>
                        <li>
                            {{ Form::open(['method' => 'post', 'route' => 'admin.logout']) }}
                            <button class="btn btn-link dropdown-item" type="submit">Logout</button>
                            {{ Form::close() }}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
        {{--<div class="collapse navbar-collapse">--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li>--}}
                    {{--<a href="{{ route('dashboard.logout') }}">--}}
                        {{--<p>Log out</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="separator hidden-lg"></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
