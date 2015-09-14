@extends('layout')

@section('title')
    Index Comments
@endsection

@section('subtitle')
    Index Comments
@endsection



@section('content')
    {!! Form::open(array('action' => 'CommentsController@select', 'method' => 'get')) !!}
    {!! Form::select('selectors', [
                0      => 'Actions',
                1       => 'Supprimer',
                2         => 'Actif',
                3        => 'Inactif'
], null, [ 'class' =>  'form-control']) !!}
    {!! Form::submit() !!}
    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Comments</th>
                        <th>Film</th>
                        <th>Utilisateur</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Création</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr @if($comment->state == 2)class="bg-success"@elseif($comment->state == 1)class="bg-warning" @else class="bg-danger" @endif>
                            <td> {!! Form::checkbox('coucou[]', $comment->id) !!}  {{ $comment->id }}</td>
                            <td>{{ $comment->content }}</td>
                            <td> {{ DB::table('movies')->select('movies.title')->where( 'movies.id', $comment->movies_id )->value('title') }}</td>
                            <td>{{ DB::table('user')->select('user.username')->where( 'user.id', $comment->user_id )->value('username') }} </td>
                            <td>{{ $comment->note }} </td>
                            <td>{{ $comment->state }}</td>
                            <td>{{ $comment->date_created }}</td>

                        </tr>
                    @endforeach
                    {!! Form::close() !!}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('breadscrumb')
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Comments</a></li>
        <li class="active"><a href="#">Index</a></li>
    </ul>
@endsection