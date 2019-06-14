<div class="sidebar" data-color="white" data-image="{{ url('public/images/sidebar-2.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text">
                Ecommerce
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{ route('admin.home')}}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                @if(auth('admin')->user()->type == 'admin')
                <a href="{{ route('admins.index')}}">
                    <i class="pe-7s-user"></i>
                    <p>Admins</p>
                </a>
                @endif
            </li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="pe-7s-albums"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    <i class="pe-7s-drawer"></i>
                    <p>Products</p>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="pe-7s-add-user"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="{{ route('reviews.index') }}">
                    <i class="pe-7s-comment"></i>
                    <p>Reviews</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="pe-7s-angle-left"></i>
                    <p>Orders</p>
                </a>
            </li>
        </ul>
    </div>
</div>
