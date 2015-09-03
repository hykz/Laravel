@extends('layout')

@section('title')
Index Movies
@endsection

@section('subtitle')
Index Movies
@endsection


@section('content')
    <div class="regroupbtn">
        <div>
            <a href="{{ route('movies.index', [ 'val' => 1 ] ) }}" class="btn btn-default"><i class="fa fa-globe"></i>Tous</a>
            <a href="{{ route('movies.index', [ 'val' => 2 ] ) }}" class="btn btn-default"><i class="fa fa-flag"></i> VO</a>
            <a href="{{ route('movies.index', [ 'val' => 3 ] ) }}" class="btn btn-default"><i class="fa fa-flag-o"></i> VF</a>
            <a href="{{ route('movies.index', [ 'val' => 4 ] ) }}" class="btn btn-default"><i class="fa fa-flag"></i> VOST</a>
            <a href="{{ route('movies.index', [ 'val' => 5 ] ) }}" class="btn btn-default"> <i class="fa fa-flag-o"></i> VOSTFR</a>
        </div>
        <div>

            <a href="{{ route('movies.index', ['val'=> 6 ] ) }}" class="btn btn-default"><i class="fa fa-eye"></i> Visible</a>
            <a href="{{ route('movies.index', ['val'=> 7 ] ) }}" class="btn btn-default"><i class="fa fa-eye-slash"></i> Invisible</a>
        </div>
        <div>

            <a href="{{ route('movies.index', ['val'=> 8 ] ) }}" class="btn btn-default"><i class="fa fa-share"></i> Warner Bros</a>
            <a href="{{ route('movies.index', ['val'=> 9 ] ) }}" class="btn btn-default"><i class="fa fa-share"></i> HBO</a>

        </div>
    </div>
    <div class="panel">
        <div class="panel-body">

            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Visible/Cover</th>
                        <th>Title</th>
                        <th>Synopsis</th>
                        <th>Nb Actors</th>
                        <th>Date Release</th>
                        <th>Action DB</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($movies as $movie)
                        <tr>
                            <td style="max-width: 50%"><a href="{{ route('movies.read', [ 'id' => $movie->id ] ) }}"><img style="width: 100px; height: 100px;" src="{{ $movie->image }}" alt=""></a></td>
                            <td><a href="{{ route('movies.visible', [ 'id' => $movie->id, 'cover' => $movie->visible ] ) }}"> @if ($movie->visible == 1) <i class="fa fa-check-square"></i> @else <i class="fa fa-check-square-o"></i> @endif </a>
                                <a href="{{ route('movies.cover', [ 'id' => $movie->id, 'cover' => $movie->cover ] ) }}"> @if ($movie->cover == 1) <i class="fa fa-star"></i> @else <i class="fa fa-star-o"></i> @endif </a></td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ str_limit($movie->synopsis, $limit = 200, $end ='...') }}</td>
                            <td>{{\Illuminate\Support\Facades\DB::table('actors_movies')->where('movies_id', '=', $movie->id)->count()}} <i class="fa fa-users"></i></td>
                            <td>{{$movie->date_release}}</td>
                            <td><a href="{{ route('movies.delete', [ 'id' => $movie->id ] ) }}"><button class="btn btn-danger">Delete</button></a>
                                <a href="{{ route('movies.update', [ 'id' => $movie->id ] ) }}"><button class="btn btn-warning">Update</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Movies</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection