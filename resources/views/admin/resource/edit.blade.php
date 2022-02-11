@extends('layouts.admin')
@section('header')
    <h1 class="h2">Редактировать источник</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.resource.update', ['resource' => $resource]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Ссылка на источник</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $resource->name }}">
        </div>  
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection
@stack('js')