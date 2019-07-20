<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('material/materialize/css/materialize.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>

<div class="" style="margin-top: 80px">
    <div class="row">
    <div class="col m4 s12 offset-m4">
        <div class="card">
            <div class="card-content">
                <div class="card-title center-align">
                    <i class="material-icons medium" >account_circle</i>
                    <br>
                    <small class="center-align">Login</small></div>


                <div class="row">
                    <form action="{{route('login')}}" method="post" class="col s12">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" name="name" type="text" class="validate">
                                    <label for="icon_prefix">Name</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="pass" name="password" type="password" class="validate">
                                    <label for="pass">Password</label>
                                </div>
                                <div class="center-align">
                                    <button type="submit" class="btn waves-effect">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<script src="{{asset('material/materialize/js/jquery.js')}}"></script>

<script src="{{asset('material/materialize/js/materialize.js')}}"></script>
</body>
</html>