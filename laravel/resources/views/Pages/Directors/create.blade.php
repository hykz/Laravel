@extends('layout')

@section('title')
Create Directors
@endsection

@section('subtitle')
Create Directors
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

    {!! Form::open(array('action' => 'DirectorsController@post', 'method' => 'post', 'files' => true)) !!}
    <h6> Nom </h6>{!! Form::text('lastname') !!}
    @if ($errors->has('lastname')) <p class="help-block text-danger">{{ $errors->first('lastname') }}</p> @endif
    <h6> Prenom </h6>{!! Form::text('firstname') !!}
    @if ($errors->has('firstname')) <p class="help-block text-danger">{{ $errors->first('firstname') }}</p> @endif
    <h6> Date de naissance </h6>{!! Form::text('dob') !!}
    @if ($errors->has('dob')) <p class="help-block text-danger">{{ $errors->first('dob') }}</p> @endif


    <h6> Upload d'image</h6> {!! Form::file('image',array('class'=>'')) !!}
    <h6> Biography</h6> {!! Form::textarea('biography') !!}
    @if ($errors->has('biography')) <p class="help-block text-danger">{{ $errors->first('biography') }}</p> @endif
    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@endsection


@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Directors</a></li>
    <li class="active"><a href="#">Create</a></li>
</ul>
@endsection