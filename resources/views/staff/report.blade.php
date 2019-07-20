@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <div class="col s6" style="padding-top: 15px">
                <span>
            <i class="material-icons" style="margin-top: 10px;">equalizer</i>
            </span>
                <span style="margin-left: 10px;font-size: 30px">Daily Report </span><span>> {{Auth::user()->shop->city}} </span>
            </div>
            <div class="col s6">
                <div class="input-field col s8">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Search</label>
                </div>
            </div>
        </div>
        <div class="divider" ></div>
        <section style="margin-top: 0px;margin-right: 10px">
            <div class="row">

                <div class="col s12">
                    {{--<a class="btn waves-effect" href="{{route('dashboard.home')}}" style="margin-left: 24px"><i class="material-icons">reply_all</i> Back</a>--}}
                    {{--<div class="card-panel">--}}
                        @foreach($voc as $v)
                                <ul class="collapsible popout">
                                    <li>
                                        <div class="collapsible-header">
                                            <div class="row col s12" style="padding-top: 10px">
                                                <div class="col s1">
                                                    <i class="material-icons right">assignment</i>
                                                </div>
                                                <div class="col s3" style="font-weight: bold;font-size: 18px">
                                                    {{$v->no}}
                                                </div>
                                                <div class="col s4">
                                                    {{$v->amount}} MMK
                                                </div>
                                                <div class="col s4">
                                                    <div class="right">{{$v->created_at->diffForHumans()}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapsible-body blue lighten-5">
                                            <div class="row">
                                                <table class="">
                                                    <span class="hide">{{$count=1}}</span>
                                                    @foreach($v->saleItem as $i)
                                                        <tr>
                                                            <td>{{$count++}} .</td>
                                                            <td>{{$i->item->name}}</td>
                                                            <td>{{$i->item->category->name}}</td>
                                                            <td>{{$i->item->sale_price}} MMK</td>
                                                            <td>{{$i->qty}}</td>
                                                            <td>{{$i->amount}} MMK</td>

                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        @endforeach
                        {{--<table>--}}
                            {{--<thead>--}}
                            {{--<tr class="grey-text text-darken-1">--}}
                                {{--<th>No</th>--}}
                                {{--<th>Voc_no</th>--}}
                                {{--<th>Qty</th>--}}
                                {{--<th>Price</th>--}}
                                {{--<th>Time</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($voc as $v)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$v->id}}</td>--}}
                                    {{--<td>{{$v->no}}</td>--}}
                                    {{--<td>{{$v->qty}}</td>--}}
                                    {{--<td>{{$v->amount}}</td>--}}
                                    {{--<td>{{$v->created_at->diffForHumans()}}</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                </div>
            </div>

        </section>
    </main>
    @stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
    </script>

    @stop