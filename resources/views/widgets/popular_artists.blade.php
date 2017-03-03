<div class="popular-artist row normal-margin">
    <div class="col-sm-2">
        <img class="img-circle img-responsive" src="{{ $artist->image }}"/>
    </div>
    <div class="col-sm-7" style="text-align:left">
        <a href="{{ URL::route("search",array("_token"=>csrf_token(),"query"=>$artist->name )) }}" class="music-title link" style="display: block">{{ $artist->name }}</a>
        <span class="music-artist link link-light">View {{ $artist->name }}'s Songs</span>
    </div>
    <div class="col-sm-3">
        <a href="{{ URL::route("search",array("_token"=>csrf_token(),"query"=>$artist->name )) }}">
            <button class="btn btn-default btn-sm">More</button>
        </a>
    </div>
</div>