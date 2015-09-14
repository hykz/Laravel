@extends('layout')

@section('title')
Home
@endsection

@section('subtitle')
Home
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-6">

            <!-- 5. NOTIFICATION ACTORS =====================================================================

                            Notifications example
            -->
            <div class="stat-panel">
                <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
                <a href="#" class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    Moyenne d'age des acteurs &nbsp;&nbsp;<br><strong>{{ $actorsavg->Coucou }} ans</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                                {{ $fromlyon }} Lyon
                                <i class="fa fa-bug pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                                {{ $fromparis }} Paris
                                <i class="fa fa-bug pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                                {{ $frommarseille }} Marseille
                                <i class="fa fa-bug pull-right"></i>
                            </a>
                        </div>
                    </div> <!-- /.stat-rows -->
                </div> <!-- /.stat-cell -->
            </div> <!-- /.stat-panel -->
            <!-- /5. $EXAMPLE_NOTIFICATIONS -->

        </div>

        <div class="col-sm-6">


            <!-- 5. NOTIFICATIONS USERS =====================================================================

                            Notifications example
            -->
            <div class="stat-panel">
                <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
                <a href="#" class="stat-cell col-xs-5 bg-danger bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    Nombres de commentaires &nbsp;&nbsp;<br><strong>{{ $allcomment }}</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-danger padding-sm valign-middle">
                                {{ $actifcomm }} commentaires actifs
                                <i class="fa fa-envelope-o pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-danger darken padding-sm valign-middle">
                                {{ $queuecomm }} commentaires en attente
                                <i class="fa fa-envelope-o pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-danger darker padding-sm valign-middle">
                                {{ $inactifcomm }} commentaires inactifs
                                <i class="fa fa-envelope pull-right"></i>
                            </a>
                        </div>
                    </div> <!-- /.stat-rows -->
                </div> <!-- /.stat-cell -->
            </div> <!-- /.stat-panel -->
            <!-- /5. $EXAMPLE_NOTIFICATIONS -->
            </div>


            <!-- 6. $EASY_PIE_CHARTS ===========================================================================

                            Easy Pie charts
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    // Easy Pie Charts
                    var easyPieChartDefaults = {
                        animate: 2000,
                        scaleColor: false,
                        lineWidth: 6,
                        lineCap: 'square',
                        size: 90,
                        trackColor: '#e5e5e5'
                    }
                    $('#easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
                        barColor: PixelAdmin.settings.consts.COLORS[1]
                    }));
                    $('#easy-pie-chart-2').easyPieChart($.extend({}, easyPieChartDefaults, {
                        barColor: PixelAdmin.settings.consts.COLORS[1]
                    }));
                    $('#easy-pie-chart-3').easyPieChart($.extend({}, easyPieChartDefaults, {
                        barColor: PixelAdmin.settings.consts.COLORS[1]
                    }));
                });
            </script>
            <!-- / Javascript -->

        <div class="row">
                <div class="col-sm-4">
                    <!-- Centered text -->
                    <div class="stat-panel text-center">
                        <div class="stat-row">
                            <!-- Dark gray background, small padding, extra small text, semibold text -->
                            <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                                <i class="fa fa-globe"></i>&nbsp;&nbsp;Tous les commentaires actifs
                            </div>
                        </div> <!-- /.stat-row -->
                        <div class="stat-row">
                            <!-- Bordered, without top border, without horizontal padding -->
                            <div class="stat-cell bordered no-border-t no-padding-hr">
                                <div class="pie-chart" data-percent="{{ $actifcommpour }}" id="easy-pie-chart-1">
                                    <div class="pie-chart-label">{{ $actifcommpour }}%</div>
                                </div>
                            </div>
                        </div> <!-- /.stat-row -->
                    </div> <!-- /.stat-panel -->
                </div>


                <div class="col-sm-4">
                    <!-- Centered text -->
                    <div class="stat-panel text-center">
                        <div class="stat-row">
                            <!-- Dark gray background, small padding, extra small text, semibold text -->
                            <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                                <i class="fa fa-globe"></i>&nbsp;&nbsp;Tous les films en favoris
                            </div>
                        </div> <!-- /.stat-row -->
                        <div class="stat-row">
                            <!-- Bordered, without top border, without horizontal padding -->
                            <div class="stat-cell bordered no-border-t no-padding-hr">
                                <div class="pie-chart" data-percent="{{ $moviesfavo }}" id="easy-pie-chart-2">
                                    <div class="pie-chart-label"> {{ $moviesfavo }}% </div>
                                </div>
                            </div>
                        </div> <!-- /.stat-row -->
                    </div> <!-- /.stat-panel -->
                </div>

                <div class="col-sm-4">
                    <!-- Centered text -->
                    <div class="stat-panel text-center">
                        <div class="stat-row">
                            <!-- Dark gray background, small padding, extra small text, semibold text -->
                            <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                                <i class="fa fa-globe"></i>&nbsp;&nbsp;Taux de films diffusés
                            </div>
                        </div> <!-- /.stat-row -->
                        <div class="stat-row">
                            <!-- Bordered, without top border, without horizontal padding -->
                            <div class="stat-cell bordered no-border-t no-padding-hr">
                                <div class="pie-chart" data-percent="{{ $moviesdiffu }}" id="easy-pie-chart-3">
                                    <div class="pie-chart-label"> {{ $moviesdiffu }}% </div>
                                </div>
                            </div>
                        </div> <!-- /.stat-row -->
                    </div> <!-- /.stat-panel -->
                </div>


        </div>




        <div class="row">

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">Création de film</div>
                    <div class="panel-body">
                        <form id="addMovie" action="{{ route('movies.postfast') }}" method="post">
                            {{ csrf_field() }}
                            <div class="group">
                                <label>Titre</label>
                                <input name="title" class="form-control" type="text" placeholder="Nom de mon film" />
                            </div>

                            <div class="group">
                                <label>Catégorie</label>
                                <select name="categories_id" class="form-control">
                                    @foreach(DB::select('SELECT id,title FROM categories') as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->title }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="group">
                                <label>Synopsis</label>
                                <textarea class="form-control" name="synopsis"  placeholder="Synopsis de mon film"></textarea>
                            </div>


                            <button class="btn btn-default" type="submit">Enregistrer un film</button>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-success widget-support-tickets" id="dashboard-support-tickets">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="panel-title-icon fa fa-bullhorn"></i>Prochaines séances</span>
                        <div class="panel-heading-controls">
                            <div class="panel-heading-text"><a href="#">15 new tickets</a></div>
                        </div>
                    </div> <!-- / .panel-heading -->
                    <div class="panel-body tab-content-padding">
                        <!-- Panel padding, without vertical padding -->
                        <div class="panel-padding no-padding-vr">

                            @foreach($nextmovie as $movz)
                            <div class="ticket">
                                <span class="label label-success ticket-label">Completed</span>
                                <a href="#" title="" class="ticket-title">{{ $movz->title }}<span>[#{{ $movz->id }}]</span></a>
								<span class="ticket-info">
									Opened by <a href="#" title="">Timothy Owens</a> today
								</span>
                            </div> <!-- / .ticket -->
                            @endforeach



                        </div>
                    </div> <!-- / .panel-body -->
                </div> <!-- / .panel -->
            </div>
        </div>








@endsection


@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Home</a></li>

</ul>
@endsection