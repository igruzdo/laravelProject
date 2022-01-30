@extends('layouts.admin')
@section('header')
    <h1 class="h2">Администратор</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
        Панель администратора
        <x-alert type="success" message="Новость добавлена"></x-alert>
        <x-alert type="danger" message="Новость не добавалена"></x-alert>
        <x-alert type="warning" message="Осторожно"></x-alert>
    </div>
@endsection