@extends('layouts.admin')
@section('header')
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="categories">Выбрать категории</label>
            <select class="form-control" multiple name="categories[]" id="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('categories')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('categories')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select id="status" class="form-control" name="status">
                <option 
                @if (old('status') === 'DRAFT')
                    selected
                @endif 
                value="draft" >DRAFT</option>
                <option 
                @if (old('status') === 'ACTIVE')
                    selected
                @endif 
                value="active" >ACTIVE</option>
                <option 
                @if (old('status') === 'BLOCKED')
                    selected
                @endif 
                value="blocked">BLOCKED</option>
            </select>
        </div> 
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                 <strong style="style:red"> {{ $message }} </strong>
             @enderror
        </div>    
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection