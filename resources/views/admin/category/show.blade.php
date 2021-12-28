@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Categories</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-success">Back to Categories</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        @if($category->status == 1)
                            <td>{{ 'Active' }}</td>
                        @else
                            <td>{{ 'Not active' }}</td>
                        @endif
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
