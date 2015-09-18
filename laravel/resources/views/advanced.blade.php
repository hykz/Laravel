

@extends('layout')


@section('title')
    Advanced
@endsection

@section('subtitle')
    Advanced
@endsection


@section('content')
    <div class="row">
        <div id="carte" style="width: 100%; height: 300px"></div>


        @foreach( $cinemas as $cinema)
            <marker class="cinemap" style="display: none" data-adresse="{{$cinema->ville}}" data-content="{{$cinema->movcompt}}" data-title="{{ $cinema->title }}" data-id="{{ $cinema->id }}" id="{{ $cinema->id }}"></marker>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- 11. $THREADS ==================================================================================

				Threads
-->
            <div class="panel widget-threads">
                <div class="panel-heading">
                    <span class="panel-title"><i class="panel-title-icon fa fa-comments-o"></i>Derniers commentaires des cinémas</span>
                </div> <!-- / .panel-heading -->
                <div class="panel-body">
                @foreach($commentscine as $cine)
                    <div class="thread">
                        <img src="{{$cine->image}}" alt="" class="thread-avatar">
                        <div class="thread-body">
                            <span class="thread-time"></span>
                            <a href="#" class="thread-title"> {{$cine->accroche}}</a>
                            <div> {{ $cine->comments }}</div>
                            <div class="thread-info">Ecris par<a href="#" title="">{{$cine->cinetitle}}</a> pour le film <a href="#" title="">{{$cine->title}}</a></div>
                        </div> <!-- / .thread-body -->
                    </div> <!-- / .thread -->
                @endforeach
                </div> <!-- / .panel-body -->
            </div> <!-- / .panel -->
            <!-- /11. $THREADS -->
        </div>


        <div class="col-md-6">
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('.widget-tasks .panel-body').pixelTasks().sortable({
                        axis: "y",
                        handle: ".task-sort-icon",
                        stop: function( event, ui ) {
                            // IE doesn't register the blur when sorting
                            // so trigger focusout handlers to remove .ui-state-focus
                            ui.item.children( ".task-sort-icon" ).triggerHandler( "focusout" );
                        }
                    });
                    $('#clear-completed-tasks').click(function () {
                        $('.widget-tasks .panel-body').pixelTasks('clearCompletedTasks');
                    });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel widget-tasks">
                <div class="panel-heading">
                    <span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Tâches à accomplir</span>
                </div> <!-- / .panel-heading -->
                <div class="panel-body">
                    {!! Form::open(array('action' => 'AdvancedController@taskaction', 'method' => 'get')) !!}
                    @foreach($tasks as $task)
                    <div class="task">
                        <span class="label @if($task->level == 3) label-warning pull-right">High @elseif($task->level == 2) label-danger pull-right">Medium @elseif($task->level == 1) label-success pull-right">Low @endif</span>
                        <div class="fa fa-arrows-v task-sort-icon"></div>
                        <div class="action-checkbox">
                            <label class="px-single">{!! Form::checkbox('taskouz[]', $task->id) !!}<span class="lbl"></span></label>
                        </div>
                        <a href="#" class="task-title">{{ $task->task }}<span>@if($task->taskmov == 0)   @else {{ $task->title }} @endif</span></a>
                    </div> <!-- / .task -->
                    @endforeach


                </div> <!-- / .panel-body -->
                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        <button class="btn btn-xs" id="clear-completed-tasks" type="submit"><i class="fa fa-eraser text-success"></i> Clear completed tasks</button>
                    </div>
                </div> <!-- / .panel-body -->
                {!! Form::close() !!}
            </div> <!-- / .panel -->
            <!-- /14. $TASKS -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- 7. $MORRISJS_BARS =============================================================================

				Morris.js Bars
-->
            @foreach( $graphact as $act)
                <marker class="graphact" style="display: none" data-count="{{$act->county}}" data-content="{{$act->city}}" ></marker>
            @endforeach

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Nombre d'acteurs par ville :</span>
                </div>
                <div class="panel-body">


                    <div class="graph-container">
                        <div id="hero-bar" class="graph"></div>
                    </div>
                </div>
            </div>
            <!-- /7. $MORRISJS_BARS -->
        </div>

        <div class="col-md-4">
            <!-- 8. $MORRISJS_DONUT ============================================================================

				Morris.js Donut
-->

            @foreach( $actages as $actage)
                <marker class="actche" style="display: none" data-content="{{$actage->Coucou}}" ></marker>
            @endforeach

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Acteurs par tranche d'âge</span>
                </div>
                <div class="panel-body">

                    <div class="graph-container">
                        <div id="hero-donut" class="graph"></div>
                    </div>
                </div>
            </div>
            <!-- /8. $MORRISJS_DONUT -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- 6. $MORRISJS_AREA =============================================================================

				Morris.js Area
-->
            <!-- Javascript -->
            @foreach($bestreal as $bestr)


                    <bestreal data-id="" data-firstname="{{$bestr->firstname}}" data-lastname="{{$bestr->lastname}}" data-firstpoint="{{ \App\Model\Movies::Bestreal1($bestr->id)->count() }}"
                              data-secondpoint="{{ \App\Model\Movies::Bestreal2($bestr->id)->count() }}"
                              data-thirdpoint="{{ \App\Model\Movies::Bestreal3($bestr->id)->count()  }}"
                              data-fourpoint="{{ \App\Model\Movies::Bestreal4($bestr->id)->count() }}"
                              data-fivepoint="{{ \App\Model\Movies::Bestreal5($bestr->id)->count() }}"></bestreal>
            @endforeach
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Sortie des films des 4 réalisateurs les plus actifs</span>
                </div>
                <div class="panel-body">
0

                    <div class="graph-container">
                        <div id="hero-area" class="graph"></div>
                    </div>
                </div>
            </div>
            <!-- /6. $MORRISJS_AREA -->
        </div>
    </div>

@endsection


        @section('breadscrumb')
            <ul class="breadcrumb breadcrumb-page">
                <div class="breadcrumb-label text-light-gray">You are here: </div>
                <li><a href="#">Advanced</a></li>

            </ul>
@endsection