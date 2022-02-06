@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('admin.news.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
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
                <th>Categories</th>
                <th>Author</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>
                        @foreach ($news->categories as $category)
                            {{ $category->title }},
                        @endforeach
                    </td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Edit</a>
                        <a href="{{ route('admin.news.destroy', ['news' => $news]) }}">Dell</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $newsList->links() }}
</div>
@endsection