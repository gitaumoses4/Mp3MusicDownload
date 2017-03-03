<div class="row">
    <div class="row normal-padding">
        <form id="edit-sources-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }} "/>
            <?php $i = 1; ?>
            @foreach($sources as $source)
            <div class="clearfix col-sm-3">
                <div class="small-margin">
                    <div id="source-display{{ $i }}" data-source="{{ $source->name }}" class="source-display @if( $source->active) {{ 'source-display-checked' }} @else {{ 'source-display-not-checked' }} @endif">
                        <center>
                            <h5 style="color:black">{{ $source->name }} </h5>
                            <img src="images/{{ $source->name }}.png" class="img-responsive"/>
                            <input type="checkbox" name="{{ $source->name }}" @if( $source->active == 1) {{ "checked=checked" }} @endif/>
                        </center>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach
        </form>
    </div>
    <div class="large-margin">
        <center>
            <button id="submit-sources" class="btn btn-primary">Save Sources</button>
            <button id="submit-sources-loading" class="btn btn-primary" style="display: none">
                <span class="glyphicon"><img src="images/ajax-loader.gif"/></span> Saving ...</button>
        </center>
    </div>
</div>