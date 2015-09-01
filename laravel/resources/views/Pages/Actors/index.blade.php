@extends('layout')

@section('title')
Index Actors
@endsection

@section('subtitle')
Index Actors
@endsection


@section('content')

@foreach($actors as $actor)
<p>{{ $actor->firstname }}</p>
@endforeach
@endsection

@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Actors</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection