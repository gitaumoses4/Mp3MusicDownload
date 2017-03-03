@extends ("layouts.interactive")

@section("content")
@parent
<div class="clearfix" style="margin-top: 0px">
    <div id="popular-music" class="col-sm-6">
        <header>
            <h3 class="abel-header abel-header-underline" style="text-align: left;">
                Popular Music
            </h3>
            <line>
            <hr/>
            <hr/>
            </line>
        </header>
        <div class="normal-padding" style="clear:both">
            @foreach($popular_music as $popular)
            @include("widgets.popular_music_mp3")
            @endforeach
        </div>
    </div>
    <div id="popular-artists" class="clearfix col-sm-6">
        <header>
            <h3 class="abel-header abel-header-underline" style="text-align: left;">
                Popular Artists
            </h3>
        </header>
        <line>
        <hr/>
        <hr/>
        </line>
        <div class="normal-padding" style="clear:both">
            @foreach($popular_artists as $artist)
            @include("widgets.popular_artists")
            @endforeach
        </div>
    </div>
</div>
@stop