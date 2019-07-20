@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <span>
            <i class="material-icons" style="margin-top: 10px;">settings_input_svideo</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Dashboard </span><span>> home</span>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 20px;margin-right: 10px">

            <div class="row">
                {{--<div class="col m4 s6">--}}
                    <div class="col s12 m4">
                        <a href="{{route('dashboard.sale.sale')}}">
                        <div class="card hoverable light-blue darken-3 white-text text-darken-4" style="height: 155px">
                            <div class="row" style="padding: 10px">
                                <div class="col s6 m6" style="margin-top: 15px;">
                                    <i class="material-icons large" style="padding-left: 20px">add_shopping_cart</i>
                                </div>
                                <div class="col s6 m6 left-align">
                                    <h5 class="">For Sale</h5>
                                    <p class="">Items</p>
                                    <p>6,00,00</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                <div class="col s12 m4">
                    <a href="{{route('dashboard.add.item')}}">
                        <div class="card hoverable amber darken-4 white-text text-darken-4" style="height: 155px">
                            <div class="row" style="padding: 10px">
                                <div class="col s6 m6" style="margin-top: 15px;">
                                    <i class="material-icons large" style="padding-left: 20px">add_square</i>
                                </div>
                                <div class="col s6 m6 left-align">
                                    <h5 class="">Income</h5>
                                    <p class="">Items</p>
                                    <p>6,00,00</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m4">
                    <a href="{{route('dashboard.report')}}">
                    <div class="card hoverable blue darken-3 white-text text-darken-4" style="height: 155px">
                        <div class="row" style="padding: 10px">
                            <div class="col s6 m6" style="margin-top: 15px;">
                                <i class="material-icons large" style="padding-left: 20px">equalizer</i>
                            </div>
                            <div class="col s6 m6 left-align">
                                <h5 class="">For Daily Report</h5>
                                <p>6,00,00</p>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col s12 m4">
                    <a href="{{route('dashboard.report.all')}}">
                        <div class="card hoverable blue darken-3 white-text text-darken-4" style="height: 155px">
                            <div class="row" style="padding: 10px">
                                <div class="col s6 m6" style="margin-top: 15px;">
                                    <i class="material-icons large" style="padding-left: 20px">equalizer</i>
                                </div>
                                <div class="col s6 m6 left-align">
                                    <h5 class="">For Report</h5>
                                    <p>6,00,00</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{--</div>--}}
            </div>

        </section>
    </main>
    @stop
