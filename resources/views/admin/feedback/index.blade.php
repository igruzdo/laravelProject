@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('admin.feedback.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить отзыв</a>
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
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbackList as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->description }}</td>
                    <td>
                        <a href="{{ route('admin.feedback.edit', ['feedback' => $feedback]) }}">Edit</a>
                        <a href="#">Dell</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $feedbackList->links() }}
</div>
@endsection