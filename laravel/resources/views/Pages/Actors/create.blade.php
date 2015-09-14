@extends('layout')

@section('title')
Create Actors
@endsection

@section('subtitle')
Create Actors
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

    {!! Form::open(array('action' => 'ActorsController@post', 'method' => 'post', 'files' => true)) !!}
    <h6> Nom </h6>{!! Form::text('lastname') !!}
    @if ($errors->has('lastname')) <p class="help-block text-danger">{{ $errors->first('lastname') }}</p> @endif
    <h6> Prenom </h6>{!! Form::text('firstname') !!}
    @if ($errors->has('firstname')) <p class="help-block text-danger">{{ $errors->first('firstname') }}</p> @endif
    <h6> Date de naissance </h6>{!! Form::text('dob') !!}
    @if ($errors->has('dob')) <p class="help-block text-danger">{{ $errors->first('dob') }}</p> @endif
        <h6> Nationalite </h6>
    <ul>
        <li>Français {!! Form::radio('nationality', 'FR') !!}</li>
        <li>Anglais  {!! Form::radio('nationality', 'EN') !!}</li>
        <li>Espagnol {!! Form::radio('nationality', 'ES') !!}</li>
        <li>Allemand {!! Form::radio('nationality', 'DE') !!}</li>
    </ul>
    @if ($errors->has('nationality')) <p class="help-block text-danger">{{ $errors->first('nationality') }}</p> @endif

    <h6> Role</h6>             {!! Form::select('roles', [
                           0      => 'Selectionnez',
                            1       => 'Acteur',
                            2         => 'Realisateur',
                            3        => 'Doublure'
            ], null, [ 'class' =>  'form-control']) !!}
    @if ($errors->has('roles')) <p class="help-block text-danger">{{ $errors->first('roles') }}</p> @endif
    <h6> Upload d'image</h6> {!! Form::file('image',array('class'=>'')) !!}
    <h6> Récompenses</h6> {!! Form::textarea('recompenses') !!}
    @if ($errors->has('recompenses')) <p class="help-block text-danger">{{ $errors->first('recompenses') }}</p> @endif
    <h6> Biography</h6> {!! Form::textarea('biography') !!}
    @if ($errors->has('biography')) <p class="help-block text-danger">{{ $errors->first('biography') }}</p> @endif
    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@endsection

@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Actors</a></li>
    <li class="active"><a href="#">Create</a></li>
</ul>
@endsection