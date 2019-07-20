@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
             <span>
            <i class="material-icons" style="margin-top: 10px;">dashboard</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Products </span><small>> All</small>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 20px" class="">

            <div class="row">
                <div class="col m12 s12">
                    {{--<div class="card-panel">--}}
                    {{--<div class="row">--}}
                    <div class="col m4 s12 center-align">
                        <div class="card hoverable z-depth-2  light-green darken-2" style="padding-top: 20px">
                            <div class="row">
                                <div class="col s8">
                                    <span style="font-size: 25px;font-weight: 500">All </span><br><span style="font-size: 25px">Products</span>
                                </div>
                                <div class="col s4">
                                    <i class="material-icons light-green-text text-darken-4" style="font-size: 80px">home</i>
                                </div>

                            </div>
                            <div class="divider" style="border-color: grey"></div>
                            <div class="row" style="padding: 5px">
                                <a class="white-text text-darken-4" href="{{route('product.item.all')}}">
                                    <div class="col s6 right-align"><span style="margin-bottom: 10px">More </span></div>
                                    <div class="col s6 left-align"><i class="material-icons">keyboard_arrow_right</i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}
                    {{--</div>--}}
                    @foreach($shops as $shop)
                        <div class="col m4 s12 center-align">
                            <div class="card hoverable z-depth-2 @if($shop->id%2==0) orange darken-1 @else blue darken-2 @endif" style="padding-top: 20px">
                                <div class="row">
                                    <div class="col s8">
                                        <span class="hide">{{$total=0}}</span>
                                        <span style="font-size: 25px;font-weight: 500">{{$shop->city}} </span><br><span style="font-size: 25px">Products
                                    {{--@foreach ($voc as $v)--}}
                                            {{--@if($shop->id==$v->shop_id)--}}
                                            {{--<span class="hide">{{$total+=$v->amount}}</span>--}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}
                                            {{--{{$total}} MMK--}}
                                    </span>
                                    </div>
                                    <div class="col s4">
                                        <i class="material-icons light-green-text text-darken-4" style="font-size: 80px">home</i>
                                    </div>

                                </div>
                                <div class="divider" style="border-color: grey"></div>
                                <div class="row" style="padding: 5px">
                                    <a class="white-text text-darken-4" href="{{route('product.item.one',['shop_id'=>$shop->id])}}">
                                        <div class="col s6 right-align"><span style="margin-bottom: 10px">More </span></div>
                                        <div class="col s6 left-align"><i class="material-icons">keyboard_arrow_right</i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@stop