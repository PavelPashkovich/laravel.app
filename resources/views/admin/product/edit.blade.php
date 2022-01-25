@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h4>Product Edit</h4>
        <label for="name">Product Name</label>
        <input type="text" name="name" value="{{ $product->name }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="img">Product Image</label>
        <input type="file" name="img">
        @error('img')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="content">Product Content</label>
        <textarea name="content" id="" cols="30" rows="10">{{ $product->content }}</textarea>
        <br>
        <label for="price">Product Price</label>
        <input type="number" name="price" value="{{ $product->price }}">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="status">Product Status</label>
        <input type="checkbox" name="status" value="1" checked="{{ $product->status }}">
        <br>
        <label for="brand_id">Product Brand</label>
        <input type="number" name="brand_id" value="{{ $product->brand_id }}">
        <br>
        @error('brand_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn-success btn btn-sm">Confirm</button>
    </form>
@endsection
