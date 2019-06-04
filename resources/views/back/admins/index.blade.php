@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Admins</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admins.create') }}" class="btn btn-primary mt-2">Add Admin</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(!$admins->isEmpty())
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
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
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>{{ $admin->updated_at }}</td>
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
                <div class="col-12">
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
