@extends ("layouts.interactive")
@section("content")
@parent
<div class="normal-margin clearfix" style="display:block">
    <div class="clearfix">
        <h3 class="abel-header">Manage Sources</h3>
        @include('widgets.manage_sources')
    </div>
</div>
@stop