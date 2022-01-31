@extends('layouts.admin')
@section('header')
    <h1 class="h2">Редактировать отзыв</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.feedback.update', ['feedback' => $feedback]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $feedback->name }}">
        </div>
        <div class="form-group">
            <label for="description">Автор</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $feedback->description }}"> 
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection