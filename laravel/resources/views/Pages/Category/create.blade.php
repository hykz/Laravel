@extends('layout')

@section('title')
Create Category
@endsection

@section('subtitle')
Create Category
@endsection


@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('action' => 'CategoryController@postPost', 'method' => 'post', 'files' => true)) !!}
    <h6> Titre </h6>{!! Form::text('title') !!}
    @if ($errors->has('title')) <p class="help-block text-danger">{{ $errors->first('title') }}</p> @endif
    <h6> Abréviation </h6>{!! Form::text('slug') !!}
    @if ($errors->has('slug')) <p class="help-block text-danger">{{ $errors->first('slug') }}</p> @endif

    <h6> Upload d'image</h6> {!! Form::file('image',array('class'=>'')) !!}
    <h6> Description</h6> {!! Form::textarea('description') !!}
    @if ($errors->has('description')) <p class="help-block text-danger">{{ $errors->first('description') }}</p> @endif
    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@endsection

@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Category</a></li>
    <li class="active"><a href="#">create</a></li>
</ul>
@endsection