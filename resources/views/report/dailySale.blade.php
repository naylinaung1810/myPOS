@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
             <span>
            <i class="material-icons" style="margin-top: 10px;">pie_chart</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Report </span><span>> Daily sale</span>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 0px">
        <div class="row" >
            <div class="col s12 m8" >
                <div class="row">
                    <div class="col s4">
                        <span style="font-size: 25px;margin-left: 10px">All Sale</span>
                        <br>
                        <a href="{{route('daily.sale')}}" style="margin-top: 20px;margin-left:10px" class="waves-effect z-depth-3 waves-light btn-floating"><i class="material-icons left">chevron_left</i></a>
                    </div>
                    <div class="col s8">
                        <div class="input-field col s8">
                            <i class="material-icons prefix">search</i>
                            <input id="search" type="text" class="validate">
                            <label for="search">Search</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col s12 m4 right" style="margin-right: 0px">
                <div class="card z-depth-3 center-align green darken-3 white-text" style="padding: 5px">
                    <p style="font-size: 16px">Total Sale : {{$total}} MMK</p>
                    <p style="font-size: 16px">Profit : {{$profit}} MMK</p>
                </div>
            </div>

        </div>
            <div class="row" style="margin-top: -20px">
            <div class="col s12">
                <div class="card-panel z-depth-3">
                    <table>
                        <thead>
                        <tr class="grey-text text-darken-1">
                            <th>Index</th>
                            <th>Voc_No</th>
                            <th>Amount</th>
                            <th>Qty</th>
                            <th>Shop</th>
                            <th>Profit</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <span class="hide">{{$count=1}}</span>
                        <tbody class="" id="myTable">
                        @foreach($voc as $v)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$v->no}}</td>
                                <td>{{$v->amount}} MMK</td>
                                <td>{{$v->qty}}</td>
                                <td>{{$v->shop->city}}</td>
                                <td>{{$v->amount-$v->buy_amount}} MMK</td>
                                <td>{{$v->created_at->diffForHumans()}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </section>
    </main>

    @stop
@section('script')
<script>
    $(function () {
        $('.collapsible').collapsible();

        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        // $('body').delegate('main #daily a','click',function(e){
        //     $( "section" ).fadeToggle("fast");
        // });
        ///////////////////////////////////////////////////
        // $('#back').click(function () {
        //     $( "section" ).fadeToggle("slow");
        // });
        /////////////////////////////////////////////
    })
</script>
    @stop