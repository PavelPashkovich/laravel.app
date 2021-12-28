@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Categories</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success">Create</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration + (($categories->currentPage() - 1) * $categories->perPage())}}</td>
                        <td>{{ $category->name }}</td>
                        @if($category->status == 1)
                        <td>{{ 'Active' }}</td>
                        @else
                        <td>{{ 'Not active' }}</td>
                        @endif
                        <td>
                            <a href="{{ route('admin.category.show', ['category' => $category->id]) }}">Show</a>
                            <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}">Edit</a>
                            <form action="{{ route('admin.category.destroy', compact('category')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
