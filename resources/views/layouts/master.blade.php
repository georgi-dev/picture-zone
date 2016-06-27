<html>
<head>
    <title>@yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">
        <style>
        

        </style>
</head>
<body class="background">
    <div class="wrapper container-fluid">
        @yield('h1')
        @include('includes.header')
        @include('includes.subheader')
        @yield('content')
        <div class="clearfix"></div>
        <footer>© 2016 Video-site. All Rights Reserved. Powered by <i style="color:red;">Ogromniq87</i>.</footer>
    </div>
    
<div class="clearfix"></div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>