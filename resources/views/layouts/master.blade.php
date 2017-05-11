<html>
<head>
    <title>@yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::asset('css/master.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/jquery.modal.css" type="text/css" media="screen" />
        
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
        <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-image-gallery.min.css')}}">
        <style>
        .border-image{border: 10px solid transparent;-webkit-border-image:url('/images/test.png') 30 round;}

        </style>
</head>
<body class="background">
     @include('includes.gallery')
    <div class="wrapper container-fluid">
        @yield('h1')
        @include('includes.header')
        @include('includes.subheader')
        @yield('content')
        <div class="clearfix"></div>
        <footer>© 2016 Video-site. All Rights Reserved. Powered by <i style="color:red;">Ogromniq87</i>.</footer>
    </div>
    
<div class="clearfix"></div>
<script src="/js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="js/jquery.modal.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<script src="js/bootstrap-image-gallery.min.js"></script>
<script type="text/javascript" src="/js/my.js"></script>
</body>
</html>