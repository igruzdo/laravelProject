@extends('layouts.admin')
@section('header')
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.feedback.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>    
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection