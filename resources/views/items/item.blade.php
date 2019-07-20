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
                <span style="margin-left: 10px;font-size: 30px">Items </span><small>> Items</small>
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
            <div class="fixed-action-btn">
                <a href="{{route('items.add')}}" class="btn-floating btn-large waves-effect waves-block waves-light red">
                    <i class="large material-icons">add</i>
                </a>
            </div>
            <div class="card">
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
                        <tr class="grey-text text-darken-1">
                            <th>Index</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Buy Price</th>
                            <th>Sale Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->buy_price}} MMK</td>
                            <td>{{$item->sale_price}} MMk</td>
                            <td>{{$item->qty}}</td>
                            <td>
                                <a class="blue-text text-darken-4" href="{{route('item.edit',['id'=>$item->id])}}"><i class="material-icons ">edit</i> </a>
                                <a class=" red-text text-accent-4"><i class="material-icons">delete</i> </a>
                            </td>

                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="divider"></div>
                </div>
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
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

        })
    </script>

    @stop