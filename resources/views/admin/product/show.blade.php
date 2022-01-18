@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Products</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-success">Back to Products</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Content</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Product Brand</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><a href="{{ $product->img }}"><img src="{{ $product->img }}" width="40px" height="40px" alt="image" title="Click to see full image"></a></td>
                            <td>{{ $product->content }}</td>
                            <td>{{ $product->price }}</td>
                            @if($product->status == 1)
                            <td>{{ 'Active' }}</td>
                            @else
                            <td>{{ 'Not active' }}</td>
                            @endif
                            <td>{{ $product->brand_id }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
