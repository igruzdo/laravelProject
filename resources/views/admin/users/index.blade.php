@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
<div class="table-responsive">
    @include('inc.message')
    <table class="table table bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created_at</th>
                <th>Is_admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
