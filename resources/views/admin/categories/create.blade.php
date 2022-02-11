@extends('layouts.admin')
@section('header')
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
        </div>
        <div class="form-group">
            <label for="title">Название категории</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание категории</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>    
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection