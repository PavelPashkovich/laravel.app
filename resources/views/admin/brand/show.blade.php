@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Brands</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.brand.index') }}" class="btn btn-sm btn-success">Back to Brands</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Brand Status</th>
                        <th>Creation year</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $brands->id }}</td>
                            <td>{{ $brands->name }}</td>
                            @if($brands->status == 1)
                            <td>{{ 'Active' }}</td>
                            @else
                            <td>{{ 'Not active' }}</td>
                            @endif
                            <th>{{ $brands->creation_year }}</th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
