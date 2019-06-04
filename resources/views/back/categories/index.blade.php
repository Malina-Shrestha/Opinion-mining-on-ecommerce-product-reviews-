@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Categories</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mt-2">Add Category</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(!$categories->isEmpty())
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'route' => ['categories.destroy', $category->id]]) }}
                                        <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <button class="btn btn-danger btn-sm delete" type="submit">Delete</button>
                                        {{ form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h5 class="text-center">No Category added</h5>
                    @endif
                </div>
                <div class="col-12">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
