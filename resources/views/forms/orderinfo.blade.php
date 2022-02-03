@extends('layouts.main')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="POST" action="{{ route('orderinfos.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Введите ваше имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="phone">Введите номер телефона</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="email">Введите e-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="description">как можно детальнее опишите Ваш заказ</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
        </div>    
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection