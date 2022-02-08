@extends('layouts.admin')
@section('header')
    <h1 class="h2">Редактировать пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
@include('inc.message')
    <div>{{ $user->name }}</div>
    <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            @error('name')
                 <strong style="color:red"> {{ $message }} </strong>
             @enderror
        </div>     
        <div class="form-group">
            <label for="is_admin">Назначить администратором</label>
            <select id="is_admin" class="form-control" name="is_admin">
                <option 
                @if ($user->is_admin == 0)
                    selected
                @endif 
                value=0 >False</option>
                <option 
                @if ($user->is_admin == 1)
                    selected
                @endif 
                value=1 >True</option>
            </select>
        </div>   
        <button type="submit" class="btn btn-success" style="float: right; margin-top:10px">Сохранить</button>    
    </form>
@endsection