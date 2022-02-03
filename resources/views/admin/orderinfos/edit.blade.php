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
            @error('name')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $orderinfo->phone }}">
            @error('phone')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $orderinfo->email }}">
            @error('email')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>
        <div class="form-group">
            <label for="description">Автор</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $orderinfo->description }}"> 
            @error('description')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection