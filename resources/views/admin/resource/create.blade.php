@extends('layouts.admin')
@section('header')
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.resource.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Ссылка на источник</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div> 
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection