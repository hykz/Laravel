@extends('layout')

@section('title')
Index Movies
@endsection

@section('subtitle')
Index Movies
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-5">

            <!-- 5. $EXAMPLE_NOTIFICATIONS =====================================================================

                            Notifications example
            -->
            <div class="stat-panel">
                <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
                <a href="#" class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    <i class="fa fa-film"></i>&nbsp;&nbsp;<strong>{{\Illuminate\Support\Facades\DB::table('movies')->count()}}</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                                {{\Illuminate\Support\Facades\DB::table('movies')->where('cover', '=', 1)->count()}}
                                films en cover
                                <i class="fa fa-star pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                                {{\Illuminate\Support\Facades\DB::table('movies')->where('visible', '=', 0)->count()}}
                                films invisible
                                <i class="fa fa-star pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                                {{\Illuminate\Support\Facades\DB::table('movies')->where('date_release', '>',\Carbon\Carbon::now())->count()}}
                                films pas encore sorties
                                <i class="fa fa-star pull-right"></i>
                            </a>
                        </div>
                    </div> <!-- /.stat-rows -->
                </div> <!-- /.stat-cell -->
            </div> <!-- /.stat-panel -->
            <!-- /5. $EXAMPLE_NOTIFICATIONS -->

        </div>
        <div class="col-sm-4">

            <!-- 6. $EXAMPLE_COMMENTS_COUNT ====================================================================

                            Comments count example
            -->
            <div class="stat-panel">
                <!-- Success background. vertically centered text -->
                <div class="stat-cell bg-danger valign-middle">
                    <!-- Stat panel bg icon -->
                    <i class="fa fa-comments bg-icon"></i>
                    <!-- Extra large text -->
                    <span class="text-xlg"><strong> {{number_format(\Illuminate\Support\Facades\DB::table('movies')->sum('budget'))}} €</strong></span><br>
                    <!-- Big text -->
                    <span class="text-bg">Budgets</span><br>
                    <!-- Small text -->
                    <span class="text-sm"></span>
                </div> <!-- /.stat-cell -->
            </div> <!-- /.stat-panel -->
            <!-- /6. $EXAMPLE_COMMENTS_COUNT -->

        </div>
        </div>

    <div class="">
        <a href="{{ route('movies.create') }}" class="pull-right btn btn-success btn-medium"><i class="fa fa-plus"></i> Créer un acteur</a>
        <br />
    </div>

    {!! Form::open(array('action' => 'MoviesController@select', 'method' => 'get')) !!}
    <div class="row">
        <div>
            <a href="{{ route('movies.index', [ 'val' => 0 ] ) }}" class="btn btn-default"><i class="fa fa-globe"></i>Tous</a>
            <a href="{{ route('movies.index', [ 'val' => 1 ] ) }}" class="btn btn-default"><i class="fa fa-flag"></i> VO</a>
            <a href="{{ route('movies.index', [ 'val' => 2 ] ) }}" class="btn btn-default"><i class="fa fa-flag-o"></i> VF</a>
            <a href="{{ route('movies.index', [ 'val' => 3 ] ) }}" class="btn btn-default"><i class="fa fa-flag"></i> VOST</a>
            <a href="{{ route('movies.index', [ 'val' => 4 ] ) }}" class="btn btn-default"> <i class="fa fa-flag-o"></i> VOSTFR</a>
        </div>
        <div>

            <a href="{{ route('movies.index', ['val'=> 5 ] ) }}" class="btn btn-default"><i class="fa fa-eye"></i> Visible</a>
            <a href="{{ route('movies.index', ['val'=> 6 ] ) }}" class="btn btn-default"><i class="fa fa-eye-slash"></i> Invisible</a>
        </div>
        <div>

            <a href="{{ route('movies.index', ['val'=> 7 ] ) }}" class="btn btn-default"><i class="fa fa-share"></i> Warner Bros</a>
            <a href="{{ route('movies.index', ['val'=> 8 ] ) }}" class="btn btn-default"><i class="fa fa-share"></i> HBO</a>

        </div>

        <div class="panel-heading-controls" name="selectors">
            {!! Form::select('selectors', [
                           '0'      => 'Actions',
                            1       => 'Supprimer',
                            2         => 'Activer',
                            3        => 'Desactiver'
            ], null, [ 'class' =>  'form-control']) !!}
                        {!! Form::submit() !!}
        </div>
    </div>



    <div class="panel">
        <div class="panel-body">


            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Visible/Cover</th>
                        <th>Title</th>
                        <th>Categorie</th>
                        <th>Synopsis</th>
                        <th>Nb Actors</th>
                        <th>Date Release</th>
                        <th>Action DB</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($movies as $movie)
                        <tr>
                            <td class="col-lg-1"> {!! Form::checkbox('admin[]', $movie->id) !!}  {{ $movie->id }}</td>
                            <td style="max-width: 50%"><a href="{{ route('movies.read', [ 'id' => $movie->id ] ) }}"><img style="width: 100px; height: 100px;" src="{{ $movie->image }}" alt=""></a></td>
                            <td><a href="{{ route('movies.visible', [ 'id' => $movie->id, 'cover' => $movie->visible ] ) }}"> @if ($movie->visible == 1) <i class="fa fa-check-square"></i> @else <i class="fa fa-check-square-o"></i> @endif </a>
                                <a href="{{ route('movies.cover', [ 'id' => $movie->id, 'cover' => $movie->cover ] ) }}"> @if ($movie->cover == 1) <i class="fa fa-star"></i> @else <i class="fa fa-star-o"></i> @endif </a></td>
                            <td>{{$movie->title}}</td>
                            <td>{{  $movie->categories->title }} </td>
                            <td>{{ str_limit($movie->synopsis, $limit = 200, $end ='...') }}</td>
                            <td>{{\Illuminate\Support\Facades\DB::table('actors_movies')->where('movies_id', '=', $movie->id)->count()}} <i class="fa fa-users"></i></td>
                            <td>{{$movie->date_release}}</td>
                            <td><a href="{{ route('movies.delete', [ 'id' => $movie->id ] ) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('movies.update', [ 'id' => $movie->id ] ) }}" class="btn btn-warning">Update</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection


@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Movies</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection