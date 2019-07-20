@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <div class="col s6" style="padding-top: 15px">
                <span>
            <i class="material-icons" style="margin-top: 10px;font-size: 30px">add</i>
            </span>
                <span style="margin-left: 10px;font-size: 30px">Reach Items </span><span>> {{Auth::user()->shop->city}} </span>
            </div>
            <div class="col s6">
                <div class="input-field col s8">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Search</label>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <section class="" style="margin-top: 0px;margin-right: 10px">
            <div class="row">
                <div class="col s12 m5">
                    <div class="card">
                        <div class="card-content">
                            <form method="post">
                                @csrf
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    <div class="row valign-wrapper">
                                        <div class="col s4" id="image">
                                            <img src="{{asset('images/sample-1.jpeg')}}" alt="" class="circle responsive-img">
                                        </div>
                                        <div class="col s8">
                                          <span class="black-text">
                                              <span style="font-size: 20px" id="title"></span>
                                              <br>
                                            Category - <span id="cat"></span>
                                              <br>
                                              price - <span id="price"></span>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="" name="id" id="id">
                                <div class="input-field col s12">
                                    <input type="text" name="name" id="autocomplete-input" class="autocomplete">
                                    <label for="autocomplete-input">Autocomplete</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="qty" type="number" name="qty" value="1" class="validate">
                                    <label for="qty">Quantity</label>
                                </div>
                                <button class="btn waves-effect">Add<i class="material-icons right">add_circle</i> </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s12 m7">
                    <div class="card-panel">
                        <div class="row">
                            <div class="card-content">
                                <table class="responsive-table" >
                                    <thead>
                                    <tr class="grey-text text-darken-1">
                                        <th class="center-align">No</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>qty</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @stop


@section('script')
    <script>
        $(document).ready(function(){

            tbData()


            ///////////////////////////////////////////
            $('form').submit(function(e){
                e.preventDefault()
                $.ajax({
                    url:"/admin/dashboard/add/items",
                    type:"POST",
                    data:$('form').serialize(),
                    success:function (data) {
                        tbData();
                        $('form')[0].reset();
                    }

                });
            });

            function tbData() {
                $.ajax({
                    url:"/admin/get/table/items",
                    type:"GET",
                    success:function (data) {
                        $('tbody').html(null);
                        $.each(data.items,function (i,item) {
                            $('tbody').append('<tr>\n' +
                                '                                        <td>'+item['item']['id']+'</td>\n' +
                                '                                        <td>'+item['item']['name']+'</td>\n' +
                                '                                        <td>'+item['category']+'</td>\n' +
                                '                                        <td>'+item['item']['sale_price']+'</td>\n' +
                                '                                        <td>'+item['qty']+'</td>\n' +
                                '                                        <td>\n' +
                                '                                            <a><i class="material-icons blue-text text-darken-1">edit</i> </a>\n' +
                                '                                            <a><i class="material-icons red-text text-darken-1">delete</i></a>\n' +
                                '                                        </td>\n' +
                                '                                    </tr>')
                        })
                        // console.log(data.items)
                    }

                });
            }


            ///////////////////////////////////////////////////
            var items={};
            $.ajax({
                url:"/admin/get/all/items/add",
                type:"GET",
                success:function (data) {
                    //console.log(data)
                    $.each(data,function (i,item) {
                        items[item.name]=null;
                    });
                    $('input.autocomplete').autocomplete({
                        data: items,
                        onAutocomplete: function(val) {
                            $.each(data,function (i,item) {
                                if(item.name==val)
                                {
                                    $('#id').val(item.id);
                                    $('#title').html(item.name);
                                    $('#price').html(item.sale_price+" MMK");
                                    // $.ajax({
                                    //     url: "/items/image/get/"+item.image,
                                    //     type: "GET",
                                    //     success: function (data) {
                                    //         //console.log(data)
                                    //         //$('#image').html('<img src="'+data+'" alt="" class="circle responsive-img">');
                                    //
                                    //     }
                                    // });

                                    console.log($('#id').val())
                                }
                            });
                        }

                    });
                }
            });

        });

    </script>

    @stop