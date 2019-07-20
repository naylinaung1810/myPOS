@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
             <span>
            <i class="material-icons" style="margin-top: 10px;">pie_chart</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Products </span><span>> {{$shop->city}}</span>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 0px" class="">

            <div class="row">
                <a href="{{route('product.item.home')}}" class="btn-floating waves-effect waves-light" style="margin-left: 15px;margin-top: 10px"><i class="material-icons">arrow_back</i></a>
                <div class="input-field col s4 right" style="margin-right: 40px">
                    <i class="material-icons prefix">search</i>
                    <input id="search" type="text" class="validate">
                    <label for="search">Search.......</label>
                </div>
            </div>
            <div class="row" style="margin-top: -25px">
                <div class="col m12 s12">
                    <div class="card-panel">
                        <table class="responsive-table">
                            <tr class="grey-text darken-3">
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Shop</th>
                                <th>City</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            <span class="hide">{{$count=1}}</span>
                            <tbody id="myTable">
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->item->name}}</td>
                                    <td>{{$item->item->category->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->shop->name}}</td>
                                    <td>{{$item->shop->city}}</td>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href=""><i class="material-icons">edit</i> </a>
                                    </td>
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
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@stop