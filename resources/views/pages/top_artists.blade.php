@extends ("layouts.interactive")

@section("content")
<div class="row normal-margin clearfix">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <header>
            <h3 class="abel-header accent">
                Top Artists
            </h3>
        </header>
        <div id="artists" class="clearfix row normal-padding">
            @foreach($popular_artists as $artist)
            @include("widgets.popular_artists")
            @endforeach
        </div>
        <script>
            $("#artists").find(".btn").removeClass("btn-default");
            $("#artists").find(".btn").addClass("btn-primary");
        </script>
    </div>
</div>
@stop