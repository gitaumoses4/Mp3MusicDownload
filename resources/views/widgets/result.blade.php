<div class="col-sm-12">
    <div class="card small-padding small-margin"  style="height: 150px;">
        <img src="images/audio.png" width="150px" style="float:left;margin-right: 10px"/>
        <div class="normal-padding">
            <h5 class="abel-header" style="margin:0px"> {{ $result->title }}</h5>
            <h6 style="margin:0px">
                <b>Duration: </b> {{ $result->duration }}
            </h6>
            <div class="row">
                <button class="btn btn-primary">Play</button>
                <a href="{{ $result->downloadURL }}" class="y2m"><button class="btn btn-primary">Download</button></a>
            </div>
        </div>
    </div>
</div>