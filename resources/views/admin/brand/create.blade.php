@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
        @dump($errors)
        @csrf
        <input type="text" name="name" required value="{{ old('name') }}">
        <br>
        <input type="file" name="logo">
        <br>
        <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <input type="text" name="creation_year" value="{{ old('creation_year') }}">
        <br>
        <button type="submit" class="btn-success btn btn-sm">Send</button>
    </form>
@endsection
