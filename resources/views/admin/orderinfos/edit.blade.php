@extends('layouts.admin')
@section('header')
    <h1 class="h2">Редактировать заказ</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <form method="POST" action="{{ route('admin.orderinfos.update', ['orderinfo' => $orderinfo]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $orderinfo->name }}">
        </div>
        <div class="form-group">
            <label for="name">Телефон</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $orderinfo->phone }}">
        </div>
        <div class="form-group">
            <label for="name">Почта</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $orderinfo->email }}">
        </div>
        <div class="form-group">
            <label for="description">Автор</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $orderinfo->description }}"> 
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection