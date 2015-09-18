

@extends('layout')


@section('title')
    Professional
@endsection

@section('subtitle')
    Professional
@endsection


@section('content')
    @foreach($bestcats as $bestcat)
        <bestcat data-title="{{ $bestcat->title }}" data-id="{{ $bestcat->categories_id }}"
                 data-janvier="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 1))->sum('movies.budget') }}"
                 data-fevrier="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 2))->sum('movies.budget') }}"
                 data-mars="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 3))->sum('movies.budget') }}"
                 data-avril="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 4))->sum('movies.budget') }}"
                 data-mai="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 5))->sum('movies.budget') }}"
                 data-juin="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 6))->sum('movies.budget') }}"
                 data-juillet="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 7))->sum('movies.budget') }}"
                 data-aout="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 8))->sum('movies.budget') }}"
                 data-septembre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 9))->sum('movies.budget') }}"
                 data-octobre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 10))->sum('movies.budget') }}"
                 data-novembre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 11))->sum('movies.budget') }}"
                 data-decembre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 12))->sum('movies.budget') }}"></bestcat>
    @endforeach
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    @foreach($commentscine as $cine)
        <bestcine data-title="{{ $cine->title }}" data-count="{{ $cine->totcom }}"></bestcine>
    @endforeach

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
@endsection


@section('breadscrumb')
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Professional</a></li>

    </ul>
@endsection