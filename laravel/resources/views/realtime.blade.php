<div class="panel panel-success widget-support-tickets" id="dashboard-support-tickets">
    <div class="panel-heading">
        <span class="panel-title"><i class="panel-title-icon fa fa-bullhorn"></i>Prochaines séances</span>
        <div class="panel-heading-controls">
            <div class="panel-heading-text"></div>
        </div>
    </div> <!-- / .panel-heading -->
    <div class="panel-body tab-content-padding">
        <!-- Panel padding, without vertical padding -->
        <div class="panel-padding no-padding-vr">

            @foreach($nextmovie as $movz)
                <div class="ticket">
                    <span class="label @if($movz->bibi > 7) label-danger @elseif( $movz->bibi < 3) label-info @else label-success @endif ticket-label">{{ $movz->bibi }} jours avant la prochaine séance.</span>
                    <a href="#" title="" class="ticket-title">{{ $movz->title }}<span>[#{{ $movz->id }}]</span></a>
								<span class="ticket-info">
									Diffusé à <a href="#" title="">{{ $movz->sukablat }}</a>
								</span>
                </div> <!-- / .ticket -->
            @endforeach



        </div>
    </div> <!-- / .panel-body -->
</div> <!-- / .panel -->
</div>
</div>