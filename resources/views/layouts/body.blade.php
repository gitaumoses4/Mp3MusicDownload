<div class="row">
    <div class="col-sm-3"></div>
    <center>
        @include("widgets.searchForm")
    </center>
</div>
<hr style="margin:0px">
<div id="main" class="row" style="padding:0px;margin:0px">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        @yield("content")
    </div>
    <div class="col-sm-2"></div>
</div>
<hr style="margin:0px">
<div  class="row" style="padding:0px;margin: 0px">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        @include("widgets.recent")
    </div>
    <div class="col-sm-2"></div>
</div>
<hr style="margin:0px">
<footer style="height: 50px">

</footer>