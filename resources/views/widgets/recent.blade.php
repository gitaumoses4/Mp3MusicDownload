<div class="normal-margin large-padding">
    <header>
        <h3 class="abel-header" style="text-align: left">
            Recent Searches
        </h3>
        <line>
        <hr/>
        <hr/>
        </line>
    </header>
    <div class="clearfix normal-padding" style="clear:both">
        @foreach($recent_searches as $recent)
        @include("widgets.recent_searches")
        @endforeach
    </div>
</div>