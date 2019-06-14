@extends('layouts.app')

@section('styles')
    <link href="{{ asset('public/css/back/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/css/back/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
@endsection

@section('pageTitle')
    <a class="navbar-brand" href="{{ route('admins.index') }}"><i class="pe-7s-user"></i>Admins</a>
    <a href="{{ route('admins.create') }}" class="navbar-brand"><i class="pe-7s-plus"></i>Add Admin</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(!$admins->isEmpty())
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ date('Y M d (l)',strtotime($admin->created_at)) }}</td>
                                    <td>{{ date('Y M d (l)',strtotime($admin->updated_at))}}</td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'route' => ['admins.destroy', $admin->id]]) }}
                                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <button class="btn btn-danger btn-sm delete" type="submit">Delete</button>
                                        {{ form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h5 class="text-center">No Admin added</h5>
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
