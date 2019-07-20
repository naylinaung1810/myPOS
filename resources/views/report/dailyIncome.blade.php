@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
             <span>
            <i class="material-icons" style="margin-top: 10px;">pie_chart</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Report </span><small>> Daily Items</small>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 20px" class="rotate-scale-up-diag-1">

            <div class="row">
                <div class="col m12 s12">
                    {{--<div class="card-panel">--}}
                        {{--<div class="row">--}}
                            <div class="col m4 s12 center-align">
                                <div class="card hoverable z-depth-2  light-green darken-2" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="col s8">
                                            <span style="font-size: 25px;font-weight: 500">All </span><br><span style="font-size: 25px">100000000 MMK</span>
                                        </div>
                                        <div class="col s4">
                                            <i class="material-icons light-green-text text-darken-4" style="font-size: 80px">home</i>
                                        </div>

                                    </div>
                                    <div class="divider" style="border-color: grey"></div>
                                    <div class="row" style="padding: 5px">
                                        <a class="white-text text-darken-4" href="{{route('daily.item.all')}}">
                                            <div class="col s6 right-align"><span style="margin-bottom: 10px">More </span></div>
                                            <div class="col s6 left-align"><i class="material-icons">keyboard_arrow_right</i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>
    </main>
    @stop