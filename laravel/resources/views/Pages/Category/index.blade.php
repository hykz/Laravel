@extends('layout')

@section('title')
Index Category
@endsection

@section('subtitle')
Index Category
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-success panel-dark widget-profile">
                <div class="panel-heading">
                    <div class="widget-profile-bg-icon"><i class="fa fa-flask"></i></div>
                    <img src="http://www.gordoncastle.co.uk/wp-content/uploads/2011/01/Film-and-TV-locations-2.jpg" alt="" class="widget-profile-avatar">
                    <div class="widget-profile-header">
                        <span>Divers informations</span>
                    </div>
                </div> <!-- / .panel-heading -->
                <div class="list-group">
                    <a href="#" class="list-group-item"><i class="fa fa-exclamation list-group-icon"></i> Nombre de catégorie ayant 0 film<span class="badge badge-info">{{ $nomov }}</span></a>


                    <a href="#" class="list-group-item"><i class="fa fa-exclamation-circle list-group-icon"></i>La catégorie ayant le plus de film<span class="badge badge-warning"> {{ $bestcat->title }} </span></a>
                    <a href="#" class="list-group-item"><i class="fa fa-exclamation-triangle list-group-icon"></i>La catégorie ayant le plus gros budget<span class="badge badge-danger">{{ $bestbudg->title }}</span></a>
                </div>
            </div> <!-- / .panel -->
        </div>


        <div class="col-md-6">

            <!-- 6. $PROFILE_WIDGET_COUNTERS_EXAMPLE ===========================================================

                            Profile widget - Counters example
            -->

            <div class="panel panel-info panel-dark widget-profile">
                <div class="panel-heading">
                    <div class="widget-profile-bg-icon"><i class="fa fa-film"></i></div>
                    <img src="{{ $randomz->image }}" alt="" class="widget-profile-avatar">
                    <div class="widget-profile-header">
                        <span>{{ $randomz->title }}</span><br>
                    </div>
                </div> <!-- / .panel-heading -->
                <div class="widget-profile-counters">
                    <div class="col-xs-4"><span>{{ DB::table('movies')->where( 'movies.categories_id' , $randomz->id )->count() }}</span><br>Nombre de films</div>
                    <div class="col-xs-4"><span>{{ DB::table('movies')->join('categories','movies.categories_id', '=' , 'categories.id')->join('actors_movies' ,'actors_movies.movies_id', '=' , 'movies.id')->where('movies.categories_id' , $randomz->id)->count() }}</span><br>Nombre d'acteurs</div>
                    <div class="col-xs-4"><span>{{ DB::table('movies')->join('categories','movies.categories_id', '=' , 'categories.id')->join('comments' ,'comments.movies_id', '=' , 'movies.id')->where('movies.categories_id' , $randomz->id)->count() }}</span><br>Nombre de commentaires</div>
                </div>
            </div> <!-- / .panel -->
            <!-- /6. $PROFILE_WIDGET_COUNTERS_EXAMPLE -->

        </div>
    </div>


    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Nb Film</th>
                        <th>Action DB</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $categorie)
                        <tr>
                            <td style="max-width: 50%"><a href="{{ route('category.read', [ 'id' => $categorie->id ] ) }}"><img style="width: 100px; height: 100px;" src="{{ $categorie->image }}" alt=""></a></td>
                            <td>{{ $categorie->id }}</td>
                            <td>{{ $categorie->title }}</td>
                            <td>{{ $categorie->description }}</td>
                            <td>{{ $categorie->movies->count() }}</td>
                            <td><a href="{{ route('category.delete', [ 'id' => $categorie->id ] ) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('category.update', [ 'id' => $categorie->id ] ) }}" class="btn btn-warning">Update</a>
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
    <li><a href="#">Category</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection