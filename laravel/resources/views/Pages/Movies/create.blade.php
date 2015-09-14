@extends('layout')

@section('title')
Create Movies
@endsection

@section('subtitle')
Create Movies
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

    {!! Form::open(array('action' => 'MoviesController@post', 'method' => 'post', 'files' => true)) !!}
    <h6> Titre </h6>{!! Form::text('title') !!}
    @if ($errors->has('title')) <p class="help-block text-danger">{{ $errors->first('title') }}</p> @endif
    <h6> Type de film</h6>             {!! Form::select('type_film', [
                           0      => 'Selectionnez',
                            1       => 'Long-Metrage',
                            2         => 'Court-Metrage',
                            3        => 'Documentaire'
            ], null, [ 'class' =>  'form-control']) !!}
    @if ($errors->has('type_film')) <p class="help-block text-danger">{{ $errors->first('type_film') }}</p> @endif

    <h6> Upload d'image</h6> {!! Form::file('image',array('class'=>'')) !!}

    <h6> Catégorie du film</h6>
    <select class="categories_id">
        @foreach($categories as $categorie)
        <option value={{$categorie->id}}>{{$categorie->title}}</option>
        @endforeach
    </select>


    <h6> BO </h6>             {!! Form::select('bo', [
                           0      => 'Selectionnez',
                            1       => 'VO',
                            2         => 'VOST',
                            3        => 'VF'
            ], null, [ 'class' =>  'form-control']) !!}
    @if ($errors->has('bo')) <p class="help-block text-danger">{{ $errors->first('bo') }}</p> @endif

    <h6> Description</h6> {!! Form::textarea('description') !!}
    @if ($errors->has('description')) <p class="help-block text-danger">{{ $errors->first('description') }}</p> @endif

    <h6> Synopsis</h6> {!! Form::textarea('synopsis') !!}
    @if ($errors->has('synopsis')) <p class="help-block text-danger">{{ $errors->first('synopsis') }}</p> @endif

    <h6> Trailer </h6> {!! Form::text('trailer') !!}
    @if ($errors->has('trailer')) <p class="help-block text-danger">{{ $errors->first('trailer') }}</p> @endif

    <h6> Distributeur</h6> {!! Form::text('distributeur') !!}
    @if ($errors->has('distributeur')) <p class="help-block text-danger">{{ $errors->first('distributeur') }}</p> @endif

    <h6> Duree </h6>{!! Form::selectRange('duree', 0, 12)  !!}
    @if ($errors->has('duree')) <p class="help-block text-danger">{{ $errors->first('annee') }}</p> @endif

    <h6> Année </h6>{!! Form::selectYear('annee', 1950, 2020)  !!}
    @if ($errors->has('annee')) <p class="help-block text-danger">{{ $errors->first('annee') }}</p> @endif

    <h6> Note presse </h6>{!! Form::selectRange('note_presse', 0, 5)  !!}
    @if ($errors->has('note_presse')) <p class="help-block text-danger">{{ $errors->first('annee') }}</p> @endif



    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@endsection


@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Movies</a></li>
    <li class="active"><a href="#">Create</a></li>
</ul>
@endsection