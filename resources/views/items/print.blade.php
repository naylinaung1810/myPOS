<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Barcode</title>
    <link href="{{asset('material/materialize/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('material/materialize/css/myCss.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<a href="{{route('items.barcode')}}" class="waves-effect btn-floating" style="margin-top: 10px;margin-left: 15px"><i class="material-icons">arrow_left</i> </a>
<div class="container" style="margin-top: 0px">
    <div class="row "> <!--hide-on-med-and-down-->
        @for($i=0;$i<$qty;$i++)
        <div class="col m4 s6">
            <div class="card-panel hoverable center-align">
                <div class="row" >
                    <div class="col s12" style="margin-bottom: 10px ;margin-top: -10px">
                        <span style="font-size: 16px">{{$item->name}}</span>
                    </div>
                    <div class="col s12">
                        <span style="font-size: 18px">{{$item->serial}}</span>
                    </div>
                    <div class="col s12" style="margin-top: 5px;padding: 5px">
                        <span><?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($item->serial, "C39+",1,33) . '" alt="barcode"   />'; ?></span>
                    </div>
                </div>
            </div>
        </div>
            @endfor
    </div>

</div>


<script src="{{asset('material/materialize/js/jquery.js')}}"></script>
<script src="{{asset('material/materialize/js/materialize.js')}}"></script>
</body>
</html>