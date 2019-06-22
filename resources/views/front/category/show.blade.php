@extends('layouts.front')

@section('content')
    <!-- Main Content -->
    <main class="row">

        <!-- Category Products -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>{{ $category->name }}</h2>
                        </div>
                    </div>
                    <div class="row">

                        @foreach($products as $product)
                        <!-- Product -->
                        <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
                            <div class="col-12 bg-white text-center h-100 product-item">
                                <div class="row h-100">
                                    <div class="col-12 p-0 mb-3">
                                        <a href="{{ route('front.product', $product->product_code) }}">
                                            @if(!empty($product->image))
                                                <div class="product-image tiny" style="background-image: url('{{ url('public/images/'.$product->image) }}')"></div>
                                            @else
                                                <div class="product-image tiny" style="background-image: url('{{ url('public/images/no-image.png') }}')"></div>
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
        <!-- Category Products -->

        <div class="col-12">

            {{  $products->links('front.includes.pagination') }}

        </div>

    </main>
    <!-- Main Content -->

@endsection
