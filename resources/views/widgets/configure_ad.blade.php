@if(!Auth::guest())
<button class="btn btn-primary show-configure-ad-dialog" data-modal="modal-{{ $advert->adId }}"><span class="glyphicon glyphicon-edit"></span> Configure Ad</button>
@endif
<div class="advertisement">
    @if(Auth::guest())
    @if($advert->visible == 1)
    <?php echo html_entity_decode($advert->code) ?>
    @endif
    @else
    <?php echo html_entity_decode($advert->code) ?>
    @endif
</div>
@if(!Auth::guest())
<div class="modal" id="modal-{{ $advert->adId }}">
    <span class="close-modal">&times;</span>
    <div class="modal-content">
        <form class="edit-advert-form" id="advert-form-{{ $advert->adId }}">
            <input type="hidden" name="id" value="{{ $advert->adId }}"/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="small-padding">
                        <div class="form-group">
                            <div class="material-switch pull-right">
                                <input id="{{ $advert->adId }}-check" name="visibility" value="1" type="checkbox" @if($advert->visible == 1) {{ "checked" }} @endif >
                                       <label for="{{ $advert->adId }}-check" class="label-primary"></label>
                            </div>
                        </div>
                        <h6 style="text-align: center">Configure Advertisement ( {{ $advert->size }} )</h6>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input  type="text" class="form-control autocomplete" name="code" placeholder='Enter Advert Code'>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary submit-advertisement-form" data-form="advert-form-{{ $advert->adId }}" value="Submit"/>
                        <button  style="display:none" class="loading btn btn-primary"><span class="glyphicon"><img src="images/ajax-loader.gif"/></span> Saving</button>
                        <div style="display:none" class="success panel panel-success normal-margin">
                            <div class="panel-heading">Changes saved</div>
                            <div class="panel-body">The advertisement changes have been updated successfully</div>
                        </div>
                        <div style="display:none" class="error panel panel-danger normal-margin">
                            <div class="panel-heading">Something Went Wrong</div>
                            <div class="panel-body">Unable to update your changes. Please try again.</div>
                        </div>
                        <div style="display:none" class="warning panel panel-warning normal-margin">
                            <div class="panel-heading">Something Went Wrong</div>
                            <div class="panel-body">Advertisement Code not specified</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <p><b>Current Code: </b><pre>{{ $advert->code }}</pre></p>
                </div>
            </div> 
        </form>
    </div>
</div>
@endif