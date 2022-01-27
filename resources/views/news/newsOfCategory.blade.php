@extends('layouts.newses')
@section('newses')
@foreach($allNews as $news)
<div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">{{ $news->title }}</h2>
      <p class="lead">{{ $news->description }}</p>
      <p><a class="btn btn-secondary" href="{{ route('news/showNews', ['id' => $news->id]) }}">Прочитать новость &raquo;</a></p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
    </div>
  </div>
  <hr class="featurette-divider">
@endforeach
@endsection

