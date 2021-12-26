@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Responsive Tables</div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.brand.create') }}" class="btn btn-sm btn-success">Создать</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Brand Name</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration + (($brands->currentPage() - 1) * $brands->perPage())}}</td>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">Показать</a>
                            <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}">Редактировать</a>
                            <form action="{{ route('admin.brand.destroy', compact('brand')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
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
