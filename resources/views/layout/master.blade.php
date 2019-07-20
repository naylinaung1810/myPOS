<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('material/materialize/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('material/materialize/css/myCss.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>POS | @yield('title')</title>
</head>
<body>
@include('layout.nav')
@yield('content')




<script src="{{asset('material/materialize/js/jquery.js')}}"></script>
<script src="{{asset('material/materialize/js/materialize.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.collapsible').collapsible();

        // $('body').delegate('#sidenav-left li .collapsible li','click',function (e) {
        //     console.log(e.target.parentNode.parentNode.childNodes[1].childNodes[1]);
        // })
    });
</script>
@yield('script')
</body>
</html>