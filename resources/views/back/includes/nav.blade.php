<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12 mb-3">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if(auth('admin')->user()->type == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admins.index') }}">Admins</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth('admin')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{ route('admin.profile.edit') }}">Edit Profile</a>
                        <a href="{{ route('admin.password.edit') }}">Change Password</a>
                        <div class="dropdown-divider"></div>
                        {{ Form::open(['method' => 'post', 'route' => 'admin.logout']) }}
                        <button class="btn btn-link dropdown-item" type="submit">Logout</button>
                        {{ Form::close() }}
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
