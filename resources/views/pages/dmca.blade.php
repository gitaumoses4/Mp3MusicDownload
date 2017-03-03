@extends ("layouts.interactive")
@section("content")
@parent
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 normal-padding">
        <p>Is there any listed search results that violate your copyrights? Please send us the full name of the result (artist + song name) or if you would
            like to block a youtube video please send us the YouTube video id (example: <b>KMUOtzLwhbE</b>). And we will block all the results as soon as possible.
            Usually we need 24-48 hours to answer your dmca request. <br/>
            Please understand we dont host any files displayed in this website. We are just a search engine like Google.</p>
        <form style="text-align: left">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="dmcaresults">Results:</label>
                <textarea class="form-control" id="dmcaresults" style="height: 100px"></textarea>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop