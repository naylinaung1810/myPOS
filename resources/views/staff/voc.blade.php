<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('material/materialize/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('material/materialize/css/myCss.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 5px">
        <a href="{{route('dashboard.sale.sale')}}" class="btn-floating waves-effect"><i class="material-icons">P</i> </a>
    </div>
    <div class="row">
        <div class="col m6 s12 offset-m3" style="margin-top: 0px">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 center-align">
                        <span class="center" style="font-size: 25px">Bar Bar</span>
                    </div>
                    <div class="col s12">
                        <span>Voc_No : </span><span>{{$voc->no}}</span>
                    </div>
                </div>
                <div class="row">
                    <span class="hide">{{$count=1}}</span>
                    <table>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$item->item->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->amount}} MMK</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" class="center-align">TOTAL</td>
                            <td>{{$voc->amount}} MMK</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="center-align">Tax</td>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="center-align">Net TOTAL</td>
                            <td>{{($voc->amount*0.05)+$voc->amount}} MMK</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row center-align">
                    <span class="center">Thank you for selling</span>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{asset('material/materialize/js/jquery.js')}}"></script>
<script src="{{asset('material/materialize/js/materialize.js')}}"></script>
</body>
</html>