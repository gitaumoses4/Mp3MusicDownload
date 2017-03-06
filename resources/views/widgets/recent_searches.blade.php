<div  style="float:left" class="small-margin">
    <a href="{{ URL::route("search",array("query"=>$recent->query)) }}">
        <span class="label label-default recent-search">{{ $recent->query }}</span>
    </a>
</div>