<div class="row" style="padding:5px">
    <div class="glyphicon glyphicon-music col-sm-1" style="padding: 10px"></div>
    <div class="col-sm-7" style="text-align: left">
        <a href="{{ URL::route("search",array("query"=>$popular->name )) }}" class="music-title link">{{ $popular->name }}</a>
        <br/>
        <a href="{{ URL::route("search",array("query"=>$popular->artistName )) }}" class="music-artist link link-light">{{ $popular->artistName}}</a>
    </div>
    <div class="col-sm-4">
        <a href="{{ URL::route("search",array()"query"=>$popular->name )) }}">
            <button class="btn btn-primary btn-sm">Download</button>
        </a>
    </div>
</div>