@extends('layouts.app')

@section('styles')
    <link href="{{ asset('public/css/back/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/css/back/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
@endsection

@section('pageTitle')
    <a class="navbar-brand" href="{{ route('products.index') }}"><i class="pe-7s-drawer"></i>Products</a>
    <a href="{{ route('products.create') }}" class="navbar-brand"><i class="pe-7s-plus"></i>Add Product</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(!$products->isEmpty())
                        <table id="content" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Product Code</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Location</th>
                                    <th>Featured</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>Rs. {{ number_format($product->price) }}</td>
                                    <td>
                                        @if(!empty($product->discount))
                                        Rs. {{ number_format($product->discount) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($product->image))
                                            <img src="{{ url('public/images/'.$product->image) }}" class="img-fluid small" style="max-width: 80px;">
                                        @endif
                                    </td>
                                    <td>{{ $product->location }}</td>
                                    <td>{{ $product->featured }}</td>
                                    <td>{{ date('Y M d (l)',strtotime($product->created_at)) }}</td>
                                    <td>{{ date('Y M d (l)',strtotime($product->updated_at))}}</td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'route' => ['products.destroy', $product->product_code]]) }}
                                        <a href="{{ route('products.edit', $product->product_code) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <button class="btn btn-danger btn-sm delete" type="submit">Delete</button>
                                        {{ form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h5 class="text-center">No Product added</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ url('public/js/back/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/js/back/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#content').DataTable();
        } );
    </script>
@endsection

