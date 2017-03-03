@extends("layouts.main")

@section("main-content")
@include("widgets.navigation")
<div class="container card large-margin">
    <h2>Manage</h2>
    <ul class="nav nav-tabs">
        <li><a data-toggle="tab" href="#menu1">Mp3 Sources</a></li>
        <li class="active"><a data-toggle="tab" href="#menu2">Advertisements</a></li>
        <li><a data-toggle="tab" href="#menu3">Account</a></li>
    </ul>

    <div class="tab-content">
        <div id="menu1" class="tab-pane fade clearfix">
            <h3 class="abel-header">Manage Sources</h3>
            @include('widgets.manage_sources')
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
    </div>
</div>
@stop