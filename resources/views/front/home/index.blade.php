@extends('layouts.front')

@section('content')
    <!-- Main Content -->
    <main class="row">

        <!-- Slider -->
        <div class="col-12 px-0">
            <div id="slider" class="carousel slide w-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{ url('public/images/1.jpg') }}" class="slider-img">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('public/images/women.jpg') }}" class="slider-img">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('public/images/slider-3.jpg') }}" class="slider-img">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- Slider -->

        @if(!empty($featuredProducts))
        <!-- Featured Products -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($featuredProducts as $product)
                        <!-- Product -->
                        <div class="col-lg-3 col-sm-6 my-3">
                            <div class="col-12 bg-white text-center h-100 product-item">
                                <div class="row h-100">
                                    <div class="col-12 p-0 mb-3">
                                        <a href="{{ route('front.product', $product->product_code) }}">
                                            @if(!empty($product->image))
                                            <div class="product-image" style="background-image: url('{{ url('public/images/'.$product->image) }}')"></div>
                                            @else
                                                <div class="product-image" style="background-image: url('{{ url('public/images/no-image.png') }}')"></div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <a href="{{ route('front.product', $product->product_code) }}" class="product-name">{{ $product->name }}</a>
                                    </div>
                                    <div class="col-12 mb-3">
                                        @if(!empty($product->discount))
                                            <span class="product-price-old">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                        <br>
                                        <span class="product-price">
                                                Rs. {{ number_format($product->discount) }}
                                            </span>
                                        @else
                                            <span class="product-price">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-12 mb-3 align-self-end">
                                        <button class="btn btn-outline-dark add-to-cart" data-code="{{ $product->product_code }}" data-price="{{ !empty($product->discount) ? $product->discount : $product->price }}" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                        <input type="hidden" id="qty-{{ $product->product_code }}" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Products -->
        @endif

        <div class="col-12">
            <hr>
        </div>

        <!-- Latest Product -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                    <div class="row">
                    @foreach($latestProducts as $product)
                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">New</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="{{ route('front.product', $product->product_code) }}">
                                                @if(!empty($product->image))
                                                    <div class="product-image" style="background-image: url('{{ url('public/images/'.$product->image) }}')"></div>
                                                @else
                                                    <div class="product-image" style="background-image: url('{{ url('public/images/no-image.png') }}')"></div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="{{ route('front.product', $product->product_code) }}" class="product-name">{{ $product->name }}</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            @if(!empty($product->discount))
                                                <span class="product-price-old">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                                <br>
                                                <span class="product-price">
                                                Rs. {{ number_format($product->discount) }}
                                            </span>
                                            @else
                                                <span class="product-price">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark add-to-cart" data-code="{{ $product->product_code }}" data-price="{{ !empty($product->discount) ? $product->discount : $product->price }}" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                            <input type="hidden" id="qty-{{ $product->product_code }}" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Products -->

        <div class="col-12">
            <hr>
        </div>

        <!-- Top Selling Products -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Top Selling Products</h2>
                        </div>
                    </div>
                    <div class="row">

                    @foreach($topProducts as $product)
                        <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="{{ route('front.product', $product->product_code) }}">
                                                @if(!empty($product->image))
                                                    <div class="product-image" style="background-image: url('{{ url('public/images/'.$product->image) }}')"></div>
                                                @else
                                                    <div class="product-image" style="background-image: url('{{ url('public/images/no-image.png') }}')"></div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="{{ route('front.product', $product->product_code) }}" class="product-name">{{ $product->name }}</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            @if(!empty($product->discount))
                                                <span class="product-price-old">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                                <br>
                                                <span class="product-price">
                                                Rs. {{ number_format($product->discount) }}
                                            </span>
                                            @else
                                                <span class="product-price">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark add-to-cart" data-code="{{ $product->product_code }}" data-price="{{ !empty($product->discount) ? $product->discount : $product->price }}" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                            <input type="hidden" id="qty-{{ $product->product_code }}" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- Top Selling Products -->

        <div class="col-12 py-3 bg-light d-sm-block d-none">
            <div class="row">
                <div class="col-lg-3 col ml-auto large-holder">
                    <div class="row">
                        <div class="col-auto ml-auto large-icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <div class="col-auto mr-auto large-text">
                            Best Price
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col large-holder">
                    <div class="row">
                        <div class="col-auto ml-auto large-icon">

                            <i class="fas fa-truck-moving"></i>
                        </div>
                        <div class="col-auto mr-auto large-text">
                            Fast Delivery
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col mr-auto large-holder">
                    <div class="row">
                        <div class="col-auto ml-auto large-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="col-auto mr-auto large-text">
                            Genuine Products
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content -->
@endsection
