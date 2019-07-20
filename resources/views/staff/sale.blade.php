@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <span>
            <i class="material-icons" style="margin-top: 10px;">add_shopping_cart</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">For Sale </span><span>> {{Auth::user()->shop->city}}</span>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section class="" style="margin-top: 20px;margin-right: 10px">
            <div class="row">
                <div class="col m4 s12">
                    <div class="card">
                        <div class="card-content">
                            <form>
                                @csrf
                                <div class="input-field col s12">
                                    <input type="text" id="name" name="name" class="autocomplete" autofocus>
                                    <label for="name">Name</label>
                                </div>
                                {{--<div class="input-field col s12">--}}
                                    {{--<input id="qty" name="qty" type="number" value="1" class="validate">--}}
                                    {{--<label for="qty">Quantity</label>--}}
                                {{--</div>--}}
                                <button type="submit" class="btn waves-effect">Save</button>
                            </form>
                        </div>
                    </div>
                    <a href="{{route('dashboard.sale.checkout')}}" class="btn waves-effect waves-light green darken-1 right hoverable">Check out<i class="material-icons right">payment</i> </a>
                    <a href="{{route('dashboard.sale.checkout.cancel')}}" class="btn waves-effect waves-light red darken-1  hoverable">Cancel<i class="material-icons right">payment</i> </a>
                </div>
                <div class="col m8 s12">
                    <div class="card-panel">
                        <table class="responsive-table">
                            <thead>
                            <tr class="grey-text text-darken-1">
                                <th>No</th>
                                <th>Items</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4"></th>
                                <td>Sub Total</td>
                                <td id="total">0 MMK</td>
                            </tr>
                            <tr>
                                <th colspan="4"></th>
                                <td>Service Tax</td>
                                <td>5%</td>
                            </tr>
                            <tr>
                                <th colspan="4"></th>
                                <td>Grand Total</td>
                                <td id="grand">0 MMK</td>
                            </tr>
                            </tfoot>
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
            var items={};
            $.ajax({
                url:"/admin/get/all/items",
                type:"GET",
                success:function (data) {
                    $.each(data,function (i,item) {
                        items[item]=null;
                    });
                    $('input.autocomplete').autocomplete({
                        data: items

                    });
                }
            });
            /////////////////////////////////////////
            $('form').submit(function(e){
                var count=1;
                var total=0;
                var grand=0;
                e.preventDefault();
                $.ajax({
                    url:"/admin/dashboard/sale/add",
                    type:"POST",
                    data:$('form').serialize(),
                    success:function (data) {
                       //console.log(data.items)
                        $('tbody').html(null);
                        $.each(data.items,function (i,item) {
                            $('tbody').append('<tr>\n' +
                                '                                        <td>'+count+++'</td>\n' +
                                '                                        <td>'+item['item']['name']+'</td>\n' +
                                '                                        <td>'+item['category']+'</td>\n' +
                                '                                        <td>'+item['item']['sale_price']+' MMK</td>\n' +
                                '                                        <td>'+item['qty']+'</td>\n' +
                                '                                        <td>'+item['amount']+' MMK</td>\n' +
                                '                                    </tr>');
                            total+=item['amount'];
                            $('form')[0].reset();

                        });
                        grand=total+total*0.05
                        $('#total').html(total+" MMK");
                        $('#grand').html(grand+" MMK");
                    }

                });
            });

            });
    </script>
    @stop