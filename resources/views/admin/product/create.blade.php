@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @dump($errors->messages)
        @csrf
        <h4>Add new product</h4>
        <label for="name">Product Name</label>
        <input type="text" name="name" required value="{{ old('name') }}">
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
        <textarea name="content" id="" cols="30" rows="10">{{ old('content') }}</textarea>
        <br>
        <label for="price">Product Price</label>
        <input type="number" name="price" value="{{ old('price') }}">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="status">Product Status</label>
        <input type="checkbox" name="status" value="1">
        <br>
        <label for="brand_id">Product Brand</label>
        <input type="number" name="brand_id" value="{{ old('brand_id') }}">
        @error('brand_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit" class="btn-success btn btn-sm">Add</button>
    </form>
@endsection
