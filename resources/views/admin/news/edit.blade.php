@extends('layouts.admin')
@section('header')
    <h1 class="h2">Редактировать новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categories">Выбрать категории</label>
            <select class="form-control" multiple name="categories[]" id="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if (in_array($category->id, $selectCategories))
                            selected
                        @endif
                        >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            @error('title')
               <strong style="color:red"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
            @error('author')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        
        <div class="form-group">
            <label for="status">Статус</label>
            <select id="status" class="form-control" name="status">
                <option 
                @if ($news->status === 'DRAFT')
                    selected
                @endif 
                value="draft" >DRAFT</option>
                <option 
                @if ($news->status === 'ACTIVE')
                    selected
                @endif 
                value="active" >ACTIVE</option>
                <option 
                @if ($news->status === 'BLOCKED')
                    selected
                @endif 
                value="blocked">BLOCKED</option>
            </select>
        </div> 
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $news->description }}</textarea>
        </div>    
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection