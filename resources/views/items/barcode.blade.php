@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <div class="col s6" style="margin-top: 10px">
                <span>
                <i class="material-icons" style="margin-top: 10px;">storage</i>
                </span>
                <span style="margin-left: 10px;font-size: 30px">Items </span><span>> Barcode</span>
            </div>
            <div class="col s6">
                <div class="input-field col s12 right" style="margin-right: 40px">
                    <i class="material-icons prefix">search</i>
                    <input id="search" type="text" class="validate">
                    <label for="search">Search.......</label>
                </div>
            </div>

        </div>
        <div class="divider" style="margin-top: -20px;"></div>
        <section style="margin-top: 20px;margin-right: 10px">
            <div class="row" id="barcode">
                {{--<div class="col s12" >--}}
                    @foreach($items as $item)
                            <div class="col s12 m4" id="dd">
                                <a class="modal-trigger" href="#modal{{$item->id}}">
                                    <div class="card-panel hoverable center-align" id="">
                                        <div class="row" >
                                            <div class="col s12" style="margin-bottom: 10px ;margin-top: -10px">
                                                <span style="font-size: 16px">{{$item->name}}</span>
                                            </div>
                                            <div class="col s12">
                                                <span style="font-size: 18px">{{$item->serial}}</span>
                                            </div>
                                            <div class="col s12" style="margin-top: 5px">
                                                <span><?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($item->serial, "C39+",1,33) . '" alt="barcode"   />'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div id="modal{{$item->id}}" class="modal">
                                    <form method="post" action="{{route('items.barcode.print')}}">
                                        @csrf
                                    <div class="modal-content">
                                        <h4>Print {{$item->name}}</h4>
                                        <input type="hidden" value="{{$item->id}}" name="id">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input placeholder="Quantity" name="qty" id="qty" type="number" class="validate">
                                                    <label for="qty">Enter Quantity</label>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect red waves-red btn">Close</a>
                                        <button type="submit" class="modal-close waves-effect waves-green btn">Print</button>
                                    </div>
                                    </form>
                                </div>
                            </div>


                        @endforeach
                {{--</div>--}}
            </div>

        </section>
    </main>
@stop


@section('script')
    <script>
        $(function () {
            $('select').formSelect();
            $('.modal').modal();

            M.updateTextFields();

            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#barcode #dd").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

        })
    </script>

@stop