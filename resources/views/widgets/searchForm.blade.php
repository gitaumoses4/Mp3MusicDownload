<div class="container col-sm-6 large-margin">
    <div class="clearfix">
        <h4>Search for Music, Mp3 songs and Artists</h4>
        <h6 class="light">Download music for free</h6>
    </div>
    <form id="search-form" class="search-form" method="get" action="{{ URL::route("search") }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }} "/>
        <div class="input-group ui-widget">
            <input id="search-field" type="text" class="form-control autocomplete" name="query" placeholder="Search for mp3">
            <span type="submit" class="input-group-addon btn btn-primary" id="search-button"><i class="glyphicon glyphicon-search"></i></span>
        </div>
    </form>
</div>