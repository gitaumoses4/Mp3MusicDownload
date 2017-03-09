var pageUrl = "http://www.mp3musicdownload.hol.es/search?";

function setPageUrl(page) {
    pageUrl = page;
}
$(document).ready(function () {
    function l(a, b) {
        $(a + " .cloud_progress").html(b)
    }

    function p(a) {
        $("#suggestions #s_" + a).css("background-color", "#f0f0f0")
    }

    function q(a) {
        $("#suggestions #s_" + a).css("background-color", "#ffffff")
    }

    function r(a) {
        $("#input").val(a)
    }

    function s(a) {
        $(a + " .check-progress").html('An error has occured. Please try to convert a different video or try to download it <a href="http://adserver.adreactor.com/servlet/view/window/url/zone?zid=40&pid=372" rel="nofollow" target="_blank">here</a>.')
    }

    function t(a, b, c) {
        var link = "http://" + i[c] + ".yt-downloader.org/download.php?id=" + b;
        $.ajax({
            type: "GET",
            url: "checkDownload",
            data: {
                link: link
            },
            success: function (response) {
                response = eval('(' + response + ')');
                if (response.status === "error") {
                    a.hide();
                } else {
                    if (response.responseText.fileSize > 500) {
                        var title = $(a + " .buttons .link_facebook").data("title");
                        $(a + " .check-progress").html("The file is ready. Please click the download button to start the download."), $(a + " .buttons .link_download").attr("href", "http://" + i[c] + ".yt-downloader.org/download.php?id=" + b), $(a + " .buttons").show(), $(a + " .buttons .link_facebook").attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + window.location.href + "&" + title);
                    } else {
                        $(a + " .check-progress").html("This file does not have a download link. Kindly check the results for similar mp3's");
                    }
                }
            }
        });


    }

    function u(a, b, c) {
        return "undefined" != typeof d[c] && void $.ajax({
            url: "https://d.yt-downloader.org/progress.php",
            dataType: "jsonp",
            data: {
                id: b
            },
            success: function (e) {
                if ($.each(e, function (a, b) {
                    b = $.trim(b), e[a] = $.isNumeric(b) ? parseInt(b) : b
                }), 0 < e.error)
                    return s(a), !1;
                var f = ["checking", "loading", "converting"];
                switch (e.check - progress) {
                    case 0:
                    case 1:
                    case 2:
                        $(a + " .check-progress").html(f[e.check - progress] + ' video <img src="images/ajax-loader.gif" alt="" class="loading-img">');
                        break;
                    case 3:
                        d[c] = !0, t(a, b, e.sid)
                }
                d[c] || window.setTimeout(function () {
                    u(a, b, c)
                }, 3e3)
            }
        })
    }

    function v(a, b, c) {
        d[c] = !1, a && ($("#text").before(e), $("html, body").animate({
            scrollTop: $(b).offset().top
        }, 300)), $.ajax({
            url: "https://d.yt-downloader.org/check.php",
            dataType: "jsonp",
            data: {
                v: c,
                f: "mp3"
            },
            success: function (a) {
                return $.each(a, function (b, c) {
                    c = $.trim(c), a[b] = $.isNumeric(c) ? parseInt(c) : c
                }), 0 < a.error ? (s(b), !1) : (-1 < $(b + " .title").html().indexOf("loading title") && 0 < a.title.length && $(b + " .title").html(a.title), void(a.ce && a.sid ? t(b, a.hash, a.sid) : u(b, a.hash, c)))
            }
        })
    }

    function w(a) {
        if (-1 < a.indexOf("youtube.com")) {
            var b = /v\=[a-zA-Z0-9\-\_]{11}/.exec(a);
            if (null != b)
                var c = b.toString().substr(2)
        } else if (-1 < a.indexOf("youtu.be")) {
            var b = /\/[a-zA-Z0-9\-\_]{11}/.exec(a);
            if (null != b.length)
                var c = b.toString().substr(1)
        }
        return "undefined" != typeof c && c
    }

    function x(a, b) {
        if (d = {}, h = "", f = "", "none" != $("#suggestions").css("display") && $("#suggestions").hide(), 0 < $("#conversion_wrapper").length && $("#conversion_wrapper").remove(), 0 < $("#results").length && $("#results").remove(), $("#input").val().length < 1)
            return $("#input").val("Please enter a valid artist name or song name"), !1;
        var c = $("#input").val(),
                e = w(c);
        return e ? v(1, "#conversion", e) : ($("#loading").show(), c = $.trim(c.replace(/[\s]{2,}/g, " ")).replace(/[\s]{1}/g, "_"), $.ajax({
            url: "search.php",
            dataType: "jsonp",
            data: {
                q: c,
                captcha_code: a,
                captcha_sid: b
            },
            success: function (a) {
                $("#loading").hide(), $("#text").before(a), $("html, body").animate({
                    scrollTop: $("#results").offset().top
                }, 300)
            }
        })), !1
    }

    function y() {
        0 < $("#captcha_code").val().length && 0 < $("#captcha_sid").val().length && x($("#captcha_code").val(), $("#captcha_sid").val())
    }
    if (new RegExp("android|windows phone|iphone|blackberry|nokia|samsung|opera mini|mobile").test(navigator.userAgent.toLowerCase()))
        var a = '';
    else
        var a = '';
    var b = '',
            c = {},
            d = "",
            e = '<div id="conversion_wrapper"><div id="conversion"><p class="title">loading title <img src="images/ajax-loader.gif" alt="" class="loading-img"></p><p class="check-progress">checking video <img src="images/ajax-loader.gif" alt="" class="loading-img"></p><div class="buttons"><a href="" rel="nofollow" class="link_download">Download</a><a href="" class="link_cloud_menu conversion">Save to cloud</a><a class="link_facebook" href="" rel="nofollow" target="_blank">Share on Facebook</a></div><div class="cloud_menu"><div class="cloud_buttons"><p>Choose a cloud:</p><a href="" class="d conversion">Dropbox</a><a href="" class="g conversion">Google Drive</a><a href="" class="m conversion">Microsoft OneDrive</a></div><p class="cloud_progress"></p><div class="cloud_ready"><a id="upload_conversion" href="" class="conversion">Save</a></div></div><div class="ad">' + a + '</div></div><div class="h_rule"></div></div>',
            f = "",
            g = "",
            h = "",
            i = {
                1: "fzaqn",
                2: "agobe",
                3: "topsa",
                4: "hcqwb",
                5: "gdasz",
                6: "iooab",
                7: "idvmg",
                8: "bjtpp",
                9: "sbist",
                10: "gxgkr",
                11: "njmvd",
                12: "trciw",
                13: "sjjec",
                14: "puust",
                15: "ocnuq",
                16: "qxqnh",
                17: "jureo",
                18: "obdzo",
                19: "wavgy",
                20: "qlmqh",
                21: "avatv",
                22: "upajk",
                23: "tvqmt",
                24: "xqqqh",
                25: "xrmrw",
                26: "fjhlv",
                27: "ejtbn",
                28: "urynq",
                29: "tjljs",
                30: "ywjkg"
            },
    j = "1.0",
            k = '<div id="notification">You have an old version of javascript file cached. Please delete your browser cache and refresh the page.</div><div class="h_rule"></div>';
    if ($("#content").css("min-height", $(window).height() - 105 + "px"), $(window).resize(function () {
        $("#content").css("min-height", $(window).height() - 105 + "px")
    }), $.ajax({
        url: "version.php",
        async: !1,
        cache: !1,
        success: function (a) {
            j != a && $("form").before(k)
        }
    }), "undefined" == typeof ads && ($.ajax({
        url: "pa_control.php",
        async: !1,
        cache: !1
    }), $("form").before(b)), $("#sources_control").click(function () {
        return "none" == $("#sources").css("display") ? $("#sources").slideDown(300) : $("#sources").slideUp(300), !1
    }), $(document).on("click", "#sources a", function () {
        var a = parseInt($("#sources_control span").html());
        return "enabled" == $(this).attr("class") ? ($("#sources_control span").html(a - 1), $(this).attr("class", "disabled"), $.ajax({
            url: "sources.php",
            async: !1,
            cache: !1,
            type: "POST",
            data: {
                s: $(this).attr("id"),
                p: 0
            }
        })) : "disabled" == $(this).attr("class") && ($("#sources_control span").html(a + 1), $(this).attr("class", "enabled"), $.ajax({
            url: "sources.php",
            async: !1,
            cache: !1,
            type: "POST",
            data: {
                s: $(this).attr("id"),
                p: 1
            }
        })), !1
    }), $(document).on("click", "#text_control", function () {
        return "none" == $(".hide").css("display") ? ($(".hide").slideDown(300), $(this).text("read less")) : ($(".hide").slideUp(300), $(this).text("read more")), !1
    }), $(document).on("click", ".cloud_ready a", function () {
        var a = $(this).attr("href"),
                b = $(this).attr("class").split(" ")[0];
        b = "conversion" == b ? "#conversion_wrapper" : "#download_" + b;
        var c = {
            cancel: "Upload aborted.",
            error: "A error occured - mp3 can not be uploaded to CLOUD_PROVIDER.",
            progress: 'Uploading mp3 to CLOUD_PROVIDER <img src="images/ajax-loader.gif" alt="" class="loading-gif">',
            success: "Upload to CLOUD_PROVIDER complete."
        };
        switch (a) {
            case "d":
                var d = {
                    cancel: function () {
                        $(b + " .cloud_progress").html(c.cancel)
                    },
                    error: function (a) {
                        $(b + " .cloud_progress").html(c.error.replace(/CLOUD_PROVIDER/, "Dropbox"))
                    },
                    progress: function (a) {
                        $(b + " .cloud_progress").html(c.check - progress.replace(/CLOUD_PROVIDER/, "Dropbox")), $(b + " .cloud_ready").hide()
                    },
                    success: function () {
                        $(b + " .cloud_progress").html(c.success.replace(/CLOUD_PROVIDER/, "Dropbox")), $(b + " .cloud_ready").hide()
                    }
                };
                $(b + " .cloud_progress").html('Preparing an upload to Dropbox <img src="images/ajax-loader.gif" alt="" class="loading-gif">').show(), Dropbox.save($(b + " .link_download").attr("href"), $.trim($(b + " .title").html()) + ".mp3", d);
                break;
            case "m":
                var e = $.trim($(b + " .title").html()) + ".mp3";
                e = e.replace(/[\?\""\'\+]/g, "").replace(/[\s]{2,}/g, " ");
                var d = {
                    file: $(b + " .link_download").attr("href"),
                    fileName: e,
                    openInNewWindow: !0,
                    cancel: function () {
                        $(b + " .cloud_progress").html(c.cancel)
                    },
                    error: function (a) {
                        $(b + " .cloud_progress").html(c.error.replace(/CLOUD_PROVIDER/, "Microsoft OneDrive"))
                    },
                    progress: function (a) {
                        $(b + " .cloud_progress").html(c.check - progress.replace(/CLOUD_PROVIDER/, "Microsoft OneDrive")), $(b + " .cloud_ready").hide()
                    },
                    success: function () {
                        $(b + " .cloud_progress").html(c.success.replace(/CLOUD_PROVIDER/, "Microsoft OneDrive")), $(b + " .cloud_ready").hide()
                    }
                };
                $(b + " .cloud_progress").html('Preparing an upload to Microsoft OneDrive <img src="images/ajax-loader.gif" alt="" class="loading-gif">').show(), OneDrive.save(d)
        }
        return !1
    }), $(document).on("click", ".cloud_buttons a", function () {
        var a = $(this).attr("class").split(" "),
                b = a[0],
                d = a[1];
        if (d = "conversion" == d ? "#conversion_wrapper" : "#download_" + d, "undefined" == typeof c[b])
            var e = !0;
        else
            var e = !1;
        switch ($(d + " .cloud_buttons").hide(), e && $(d + " .cloud_progress").html('loading cloud script <img src="images/ajax-loader.gif" alt="" class="loading-gif">').show(), b) {
            case "d":
                if (e) {
                    var f = document.createElement("script");
                    f.setAttribute("type", "text/javascript"), f.setAttribute("src", "https://www.dropbox.com/static/api/2/dropins.js"), f.setAttribute("id", "dropboxjs"), f.setAttribute("data-app-key", "yu4d7vdtk3ivycu"), f.onload = function () {
                        return "undefined" == typeof Dropbox ? (l(d, "Unable to load the script of Dropbox."), !1) : Dropbox.isBrowserSupported() ? ($(d + " .cloud_progress").html("Cloud script was successfully loaded. Please click the save button to save the file to Dropbox."), $(d + " .cloud_ready").show(), $(d + " .cloud_ready a").attr("href", "d"), void(c.d = !0)) : (l(d, "Your browser is not supported by Dropbox."), !1)
                    }
                } else
                    $(d + " .cloud_progress").html("Cloud script was successfully loaded. Please click the save button to save the file to Dropbox."), $(d + " .cloud_ready").show(), $(d + " .cloud_ready a").attr("href", "d");
                break;
            case "g":
                if (e) {
                    var f = document.createElement("script");
                    f.setAttribute("src", "https://apis.google.com/js/platform.js"), f.onload = function () {
                        return "undefined" == typeof gapi ? (l(d, "Unable to load the script of Google Drive."), !1) : (c.g = !0, void gapi.savetodrive.render("upload_" + a[1], {
                            src: $(d + " .link_download").attr("href"),
                            filename: $.trim($(d + " .title").html()) + ".mp3",
                            sitename: "Mp3Juices.cc"
                        }))
                    }
                } else {
                    var g = "conversion" == d ? "#conversion" : "#download_" + d;
                    gapi.savetodrive.render("upload_" + a[2], {
                        src: $(d + " .link_download").attr("href"),
                        filename: $.trim($(d + " .title").html()) + ".mp3",
                        sitename: "Mp3Juices.cc"
                    })
                }
                $(d + " .cloud_progress").html("Cloud script was successfully loaded. Please click the save button to save the file to Google Drive."), $(d + " .cloud_ready").show();
                break;
            case "m":
                if (e) {
                    var f = document.createElement("script");
                    f.setAttribute("type", "text/javascript"), f.setAttribute("src", "https://js.live.net/v6.0/OneDrive.js"), f.setAttribute("id", "onedrive-js"), f.setAttribute("client-id", "000000004417D686"), f.onload = function () {
                        return "undefined" == typeof OneDrive ? (l("Unable to load the script of Microsoft OneDrive."), !1) : ($(d + " .cloud_progress").html("Cloud script was successfully loaded. Please click the save button to save the file to Microsoft One Drive."), $(d + " .cloud_ready").show(), $(d + " .cloud_ready a").attr("href", "m"), void(c.m = !0))
                    }
                } else
                    $(d + " .cloud_progress").html("Cloud script was successfully loaded. Please click the save button to save the file to Microsoft Drive."), $(d + " .cloud_ready").show(), $(d + " .cloud_ready a").attr("href", "m")
        }
        if (e && f) {
            var g = document.createElement("div");
            g.setAttribute("class", "cloud_script"), g.appendChild(f), document.body.appendChild(g)
        }
        return !1
    }), $(document).on("click", ".link_cloud_menu", function () {
        var a = $(this).attr("class").split(" ")[1];
        return a = "conversion" == a ? "#conversion_wrapper" : "#download_" + a, "block" == $(a + " .cloud_menu").css("display") ? $(a + " .cloud_menu").slideUp() : $(a + " .cloud_menu").slideDown(), !1
    }), -1 < document.URL.indexOf("#")) {
        var m = document.URL.split("#")[1];
        if (-1 < m.indexOf("access_token")) {
            var n = document.createElement("script");
            n.setAttribute("type", "text/javascript"), n.setAttribute("src", "https://js.live.net/v6.0/OneDrive.js"), n.setAttribute("id", "onedrive-js"), n.setAttribute("client-id", "000000004417D686");
            var o = document.createElement("div");
            o.setAttribute("class", "cloud_script"), o.appendChild(n), document.body.appendChild(o)
        }
    }
    $(document).on("keyup", "#input", function (a) {
        var b = a.keyCode || a.which;
        if (13 == b)
            return !1;
        var c = [],
                d = $.trim($(this).val());
        return d.length < 1 || -1 < d.indexOf("youtube.com/") || -1 < d.indexOf("youtu.be/") ? ("none" != $("#suggestions").css("display") && $("#suggestions").hide(), !1) : (38 != b && 40 != b && $.ajax({
            url: "https://suggestqueries.google.com/complete/search?client=youtube&ds=yt&q=" + d,
            dataType: "jsonp",
            success: function (a) {
                a = a.toString().split(",");
                var b = 1;
                $.each(a, function (a, e) {
                    e = $.trim(e), e == d || $.isNumeric(e) || $.inArray(e, c) != -1 || "[object object]" == e.toLowerCase() || (c.push('<a id="s_' + b + '" href="">' + e + "</a>"), b++)
                }), 0 < c.length ? $("#suggestions").html(c).show() : $("#suggestions").html("").hide()
            }
        }), void window.setTimeout(function () {
            var a = $("#suggestions a").length;
            40 == b ? (h < 1 ? h = 1 : (q(h), h < a ? h++ : h = 0), 0 < h ? (p(h), r($("#suggestions #s_" + h).text())) : r(f)) : 38 == b ? (h < 1 ? h = a : (q(h), 0 < h && h--), 0 < h ? (p(h), r($("#suggestions #s_" + h).text())) : r(f)) : f = d
        }, 100))
    }), $(document).on("keypress", "#input", function (a) {
        var b = a.which || a.keyCode;
        8 != b && 32 != b || (h = ""), 13 == b && (0 < h ? (r($("#suggestions #s_" + h).text()), f = $("#suggestions #s_" + h).text()) : f = $("#input").val(), "none" != $("#suggestions").css("display") && $("#suggestions").html("").hide(), h = "")
    }), $(document).on("click", "#suggestions a", function () {
        $(this).attr("id").split("_")[1];
        return r($("#suggestions #s_" + h).text()), f = $("#suggestions #s_" + h).text(), $("#suggestions").html("").hide(), $("#input").focus(), !1
    }), $(document).on("mouseover", "#suggestions a", function () {
        var a = $(this).attr("id").split("_")[1];
        0 < h && (q(h), $("#suggestions #s_" + h).css("background-color", "#ffffff")), p(a), h = a
    }), $("#input").focus(), $(document).on("click", ".link_download", function () {
        return $.ajax({
            url: "http://www.mp3juices.cc/p.php",
            async: !1,
            cache: !1,
            type: "POST",
            data: {
                c: 1
            },
            success: function (a) {
                a && window.open("http://www.mp3juices.cc/p.php?r=1")
            }
        }), !0
    }), $("form").submit(function () {
    }), $(document).on("click", ".link_preview", function () {
        if ("_blank" == $(this).attr("target"))
            return $.ajax({
                url: "http://www.mp3juices.cc/p.php",
                async: !1,
                cache: !1,
                type: "POST",
                data: {
                    c: 1
                },
                success: function (a) {
                    a && window.open("http://www.mp3juices.cc/p.php?r=1")
                }
            }), !0;
        var b = parseInt($(this).attr("class").split(" ")[1]),
                c = $(this).attr("id").split("|");
        if ($.each(c, function (a, b) {
            b = $.trim(b), c[a] = $.isNumeric(b) ? parseInt(b) : b
        }), "Close" == $(this).text())
            return 1 == c[0] && delete d[c[1]], $("#download_" + b).remove(), $(this).text("Download"), !1;
        $(this).text("Close");
        var myParams = 'title=' + escape($("#result_" + b + " .title").html()) + "&description=http://www.mp3musicdownload.hol.es/";
        var e = '<div id="download_' + b + '" class="download"><p class="title">TITLE</p><p class="check-progress">PROGRESS_TEXT</p><div class="buttons" style="CSS_BUTTONS"><a href="LINK_DOWNLOAD" rel="nofollow" class="link_download ' + b + '">Download</a><a href="" class="link_cloud_menu ' + b + '">Save to Cloud</a><a class="link_facebook" data-title=' + myParams + ' href="https://www.facebook.com/sharer.php?u=' + pageUrl + '" rel="nofollow" target="_blank">Share on Facebook</a></div><div class="cloud_menu"><div class="cloud_buttons"><p>Choose a cloud:</p><a href="" class="d ' + b + '">Dropbox</a><a href="" class="g ' + b + '">Google Drive</a><a href="" class="m ' + b + '">Microsoft OneDrive</a></div><p class="cloud_progress"></p><div class="cloud_ready"><a id="upload_' + b + '" href="" class="' + b + '">Save</a></div></div><div class="ad">' + a + "</div></div>  ";
        switch (c[0]) {
            case 1:
                e = e.replace(/TITLE/, $("#result_" + b + " .title").html()).replace(/PROGRESS_TEXT/, 'checking video <img src="images/ajax-loader.gif" alt="" class="loading-img">').replace(/CSS_BUTTONS/, "display:none;").replace(/LINK_DOWNLOAD/, "");
                break;
            default:
                e = e.replace(/TITLE/, $("#result_" + b + " .title").html()).replace(/PROGRESS_TEXT/, "The song is available for download - by clicking on the download button you'll start the download.").replace(/CSS_BUTTONS/, "").replace(/LINK_DOWNLOAD/, "http://mjcdn.cc/" + c[0] + "/" + c[1] + "/" + c[2] + "/")
        }
        return $("#result_" + b).after(e), 1 == c[0] && v(0, "#download_" + b, c[1]), !1
    }), $(document).on("click", ".link_play", function () {
        var b = parseInt($(this).attr("class").split(" ")[1]);
        if (g) {
            if ($("#player").remove(), $("#result_" + g + " .link_play").text("Play"), g == b)
                return g = "", !1;
            g = ""
        }
        $(this).text("Stop");
        var c = $(".link_preview." + b).attr("id").split("|");
        switch ($.each(c, function (a, b) {
                b = $.trim(b), c[a] = $.isNumeric(b) ? parseInt(b) : b
            }), c[0]) {
            case 1:
                var d = '<iframe src="http://www.yt-downloader.org/p.php?v=' + c[1] + '" width="100%" height="315" scrolling="no"></iframe>';
                break;
            case 2:
                var d = '<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/' + c[1] + '&amp;color=ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false" width="100%" height="166" scrolling="no"></iframe>';
                break;
            case 9:
                var d = '<iframe src="http://promodj.com/embed/' + c[1] + '/small" width="100%" height="25" crolling="no" style="min-width:450px;max-width:900px;"></iframe>'
        }
        try {
            if (0 < $("#download_" + b).length)
                var e = "#download_" + b;
            else
                var e = "#result_" + b;
            $(e).after('<div id="player">' + d + '<div id="pa">' + a + "</div></div>")
        } catch (c) {
            if (0 < $("#download_" + b).length)
                var e = "#download_" + b;
            else
                var e = "#result_" + b;
            $("#result_" + b).after('<div id="player">An error occured. Please try again.<div id="pa">' + a + "</div></div>")
        }
        return g = b, !1
    }), $(document).on("keyup", "#captcha_code", function () {
        4 == $("#captcha_code").val().length && $("#captcha_button").show()
    }), $(document).on("submit", "#captcha_form", function () {
        return y(), !1
    })
});