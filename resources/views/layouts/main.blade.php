<!DOCTYPE html>
<html>
    <head>
        <title>
            {{ Globals::siteTitle() }}
        </title>
        <link rel="stylesheet" href="css/app.css"/>
        <link rel="stylesheet" href="css/index.css"/>
        <link href="https://fonts.googleapis.com/css?family=Abel|Josefin+Sans|Quicksand" rel="stylesheet"/> 
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
        <script src="js/app.js"></script>
        <script src="js/index.js"></script>
        @yield("header-content")
    </head>
    <body style="background:#ffffff">
        @yield("main-content")
    </body>
</html>
