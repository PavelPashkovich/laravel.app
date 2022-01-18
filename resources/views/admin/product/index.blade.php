@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Products</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success">Add new product</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Content</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration + (($products->currentPage() - 1) * $products->perPage())}}</td>
                        <td>{{ $product->name }}</td>
                        <td><a href="{{ $product->img }}" target="_blank"><img src="{{ $product->img }}" width="40px" height="40px" alt="image" title="Click to see full image"></a></td>
                        <td>{{ $product->content }}</td>
                        <td>{{ $product->price }}</td>
                        @if($product->status == 1)
                        <td>{{ 'Active' }}</td>
                        @else
                        <td>{{ 'Not active' }}</td>
                        @endif
                        <td>
                            <a href="{{ route('admin.product.show', ['product' => $product->id]) }}">Show</a>
                            <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}">Edit</a>
                            <form action="{{ route('admin.product.destroy', compact('product')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
