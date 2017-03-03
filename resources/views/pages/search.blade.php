@extends ("layouts.interactive")
@section("content")
@parent
<div id="results-container" class="normal-margin clearfix" style="display:block">
    @if(count($results) == 0)
    <header>
        <h3 class="abel-header">
            <center>
                No Results for {{ $query }}
            </center>
        </h3>
    </header>
    @else
    <header>
        <h3 class="abel-header">
            <center>
                Search Results - {{ $query }}
            </center>
        </h3>
    </header>
    <div class="row" id="results">
        <?php echo $results ?>
    </div>
    @endif
</div>
@stop