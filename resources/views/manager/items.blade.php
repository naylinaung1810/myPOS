@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <div class="col s6" style="padding-top: 15px">
                <span>
            <i class="material-icons" style="margin-top: 10px;">storage</i>
            </span>
                <span style="margin-left: 10px;font-size: 30px">Items </span><span>> {{Auth::user()->shop->city}} </span>
            </div>
            <div class="col s6">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" class="validate">
                        <label for="search">Search</label>
                    </div>
            </div>
        </div>
        <div class="divider"></div>
        <section style="margin-top: 1px;margin-right: 10px">
            <div class="row">
                <div class="col s12">
                    <div class="card z-depth-3">
                        <table>
                            <tr class="grey-text lighten-3">
                                <th class="center">Index</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="myTable">
                            <span class="hide">{{$count=1}}</span>
                            @foreach($items as $item)
                                <tr>
                                    <td class="center">{{$count++}}</td>
                                    <td>{{$item->item->name}}</td>
                                    <td>{{$item->item->category->name}}</td>
                                    <td>{{$item->item->sale_price}} MMK</td>
                                    <td>{{$item->qty}}</td>
                                    <td>
                                        <a href="#"><i class="material-icons">edit</i> </a>
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
        $(document).ready(function() {
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        </script>
        @stop