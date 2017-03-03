@extends ("layouts.interactive")

@section("content")
<div class="normal-margin clearfix">
    <div id="popular-music" class="col-sm-12">
        <header>
            <h3 class="abel-header">
                Popular Songs
            </h3>
        </header>
        <div class="clearfix row normal-padding">
            @foreach($popular_music as $popular)
            @include("widgets.popular_music_mp3")
            @endforeach
        </div>
    </div>
</div>
@stop