<html>
<head>
    <title>@yield('title')</title>
    <style>
        .left {
            float: left;
        }
        .clear {
            clear: both;
        }
        .container {
            margin-top: 40px;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS --><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>@yield('header1')</h1>
            </div>
        </div>
    </div>
</div>

@yield('form')
<div class="container">
    @yield('phone-book')
</div>
</body>
</html>