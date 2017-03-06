$(document).ready(function () {
    $(function () {
        $(document).on("keyup", "#search-field", function () {
            var search = $("#search-field").val();
            $.ajax({
                url: "https://suggestqueries.google.com/complete/search?client=youtube&ds=yt&q=" + search,
                dataType: "jsonp",
                success: function (result) {
                    result = result.toString().split(",");
                    var availableTags = [];
                    $.each(result, function (result, e) {
                        if (!(e === "0" || e === "[object Object]")) {
                            availableTags.push(e);
                        }
                    });
                    $(".autocomplete").autocomplete({
                        source: availableTags
                    });
                }
            });
        });
    });

    $("#submit-sources").click(function () {
        $("#submit-sources").hide();
        $("#submit-sources-loading").show();

        var data = $("#edit-sources-form").serialize();
        $.ajax({
            type: 'POST',
            url: "/updateSources",
            data: data,
            success: function (data) {
                $("#submit-sources").show();
                $("#submit-sources-loading").hide();
            },
            error: function (data) {
            }
        });
    });

    $(".source-display").click(function () {
        //ischecked
        var checkBox = $(this).find("input");
        if (checkBox.is(":checked")) {
            $(this).removeClass("source-display-checked");
            $(this).addClass("source-display-not-checked");
            checkBox.removeAttr("checked");
        } else {
            $(this).addClass("source-display-checked");
            $(this).removeClass("source-display-not-checked");
            checkBox.prop("checked", "checked");
        }
    });
    $("#search-form").submit(function (eventObj) {
        $('#sources-form').find("input").hide().appendTo("#search-form");
        return true;
    });
    $("#search-button").click(function () {
        $("#search-form").submit();
    });


    $("#results").addClass("row");
    $(".result .buttons a").addClass("btn-sm btn-primary");
    $(".result .buttons a:last-child").removeClass("btn-primary");
    $(".result .buttons a:last-child").addClass("btn-default");
    $(".result .title").addClass("abel-header");
    $(".download .buttons a").addClass("btn btn-default");
    
});