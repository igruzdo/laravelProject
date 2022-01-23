@extends('layouts.newses')
@section('newses')
<div>
    <h2>
        {{$news['title']}}
    </h2>

    <p>Новость: {{$news['description']}}</p>
</div>
<x-feedback></x-feedback>
@endsection

