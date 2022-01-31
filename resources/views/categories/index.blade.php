@extends('layouts.main')
@section('content')
@foreach($categories as $category)
<div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
        role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
    </svg>
    <h2> {{ $category->title }}</h2>
    {{-- <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
        column.</p> --}}
    <p><a class="btn btn-secondary" href="{{ route('all_news/showCategoryNews', ['category' => $category->id, 'categoryforDD' => $category]) }}">Перейти &raquo;</a></p>
</div>
@endforeach
@endsection
