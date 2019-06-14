@extends('layouts.app')

@section('styles')
    <link href="{{ asset('public/css/back/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/css/back/dataTables.bootstrap.min.css') }}" rel="stylesheet"/>
@endsection

@section('pageTitle')
    <a class="navbar-brand" href="{{ route('reviews.index') }}"><i class="pe-7s-comment"></i>Reviews</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(!$reviews->isEmpty())
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Comment</th>
                                <th>Rating</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->product->name }}</td>
                                    <td>{{ $review->comment }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ date('Y M d (l)',strtotime($review->created_at)) }}</td>
                                    <td>{{ date('Y M d (l)',strtotime($review->updated_at))}}</td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'route' => ['reviews.destroy', $review->id]]) }}
                                        <button class="btn btn-danger btn-sm delete" type="submit">Delete</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h6 class="text-center"><em>No review added.</em></h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('public/js/back/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/back/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endsection
