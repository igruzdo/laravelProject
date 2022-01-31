@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('admin.orderinfos.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить заказ</a>
        </div>
    </div>
@endsection
@section('content')
<div class="table-responsive">
    @include('inc.message')
    <table class="table table bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderinfos as $orderinfo)
                <tr>
                    <td>{{ $orderinfo->id }}</td>
                    <td>{{ $orderinfo->name }}</td>
                    <td>{{ $orderinfo->phone }}</td>
                    <td>{{ $orderinfo->email }}</td>
                    <td>{{ $orderinfo->description }}</td>
                    <td>
                        <a href="{{ route('admin.orderinfos.edit', ['orderinfo' => $orderinfo]) }}">Edit</a>
                        <a href="#">Dell</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orderinfos->links() }}
</div>
@endsection