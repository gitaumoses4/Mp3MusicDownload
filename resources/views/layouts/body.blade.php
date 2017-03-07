<div class="row">
    <div class="general-content col-sm-10">
        <div class="row">
            <div class="col-sm-3"></div>
            <center>
                @include("widgets.searchForm")
            </center>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                $advert = $advertisements["top"];
                ?>
                @include("widgets.configure_ad")
            </div>
        </div>
        <hr style="margin:0px"> 
        <div id="main" class="row" style="padding:0px;margin:0px">
            <div class="col-sm-2">
                <?php
                $advert = $advertisements["left"];
                ?>
                @include("widgets.configure_ad")
            </div>
            <div class="col-sm-8">
                @yield("content")
            </div>
            <div class="col-sm-2">
                <?php
                $advert = $advertisements["right"];
                ?>
                @include("widgets.configure_ad")
            </div>
        </div>
        <hr style="margin:0px">
        <div  class="row" style="padding:0px;margin: 0px">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                @include("widgets.recent")
                <?php
                $advert = $advertisements["bottom"];
                ?>
                @include("widgets.configure_ad")
            </div>
            <div class="col-sm-2"></div>
        </div>
        <hr style="margin:0px">
        <footer style="height: 50px">

        </footer>
    </div>
    <div class="col-sm-2 right-panel">
        <?php
        $advert = $advertisements["extremeRight"];
        ?>
        @include("widgets.configure_ad")
    </div>
</div>
