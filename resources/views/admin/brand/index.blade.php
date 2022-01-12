@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Brands</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.brand.create') }}" class="btn btn-sm btn-success">Create</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Brand Status</th>
                        <th>Creation year</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration + (($brands->currentPage() - 1) * $brands->perPage())}}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ \Illuminate\Support\Facades\Storage::disk('public')->url($brand->logo) }}</td>
                        @if($brand->status == 1)
                        <td>{{ 'Active' }}</td>
                        @else
                        <td>{{ 'Not active' }}</td>
                        @endif
                        <th>{{ $brand->creation_year }}</th>
                        <td>
                            <a href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">Show</a>
                            <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}">Edit</a>
                            <form action="{{ route('admin.brand.destroy', compact('brand')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $brands->links() !!}
            </div>
        </div>
    </div>
@endsection
