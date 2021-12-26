@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.brand.update', ['brand' => $brand]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{ $brand->name }}">
        <br>
        <input type="file" name="logo">
        <br>
        <textarea name="description" id="" cols="30" rows="10" value="{{ $brand->description }}"></textarea>
        <br>
        <input type="checkbox" name="status" value="1" checked="{{ $brand->status }}">
        <br>
        <input type="text" name="creation_year" value="{{ $brand->creation_year }}">
        <br>
        <button type="submit" class="btn-success btn btn-sm">Send</button>
    </form>
@endsection
