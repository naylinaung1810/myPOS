@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <div class="col s6" style="padding-top: 15px">
                <span>
                    <i class="material-icons" style="margin-top: 10px;">dashboard</i>
                </span>
                <span style="margin-left: 10px;font-size: 30px">Reports </span><span>> {{Auth::user()->shop->city}} </span>
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
        <section style="margin-top: 0px;margin-right: 10px">

            <div class="row">
                <div class="col s12">

                </div>
            </div>
                <div class="row">
                    <div class="col s2 m3" id="menu" >
                        <ul class="collapsible popout">
                            <li class="active">
                                <div class="collapsible-header" id="all"><i class="material-icons" id="all">filter_drama</i>All</div>
                            </li>
                            @foreach($day as $d)
                                <li>
                                    <div class="collapsible-header" id="{{$d}}"><i class="material-icons" id="{{$d}}">filter_drama</i>{{$d}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col s10 m9" style="border-left: 1px solid gainsboro">
                        <div class="" >
                            <ul class="collapsible popout" id="show">
                            @foreach($voc as $v)
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

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

        </section>
    </main>
    @stop


@section('script')
    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible();

            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#show li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

/////////////////////////////////////////////////////////////////////////////
           $('body').delegate('.row #menu li','click',function (e) {
               //console.log(e.target.id);
               $.ajax({
                   url:"/admin/API/report/all",
                   type:"get",
                   data:{day:e.target.id},
                   success:function (data) {
                       //console.log(data);
                       $('#show').html(null);
                       $.each(data,function (i,item) {
                           var created_date= item.created_at.toString('dd-MM-yy');
                           var str=
                               '<li>\n' +
                               '<div class="collapsible-header" id="'+item.id+'">\n' +
                               '                                            <div class="row col s12" id="'+item.id+'" style="padding-top: 10px">\n' +
                               '                                                <div class="col s1"  id="'+item.id+'">\n' +
                               '                                                    <i class="material-icons right">assignment</i>\n' +
                               '                                                </div>\n' +
                               '                                                <div class="col s3"  id="'+item.id+'" style="font-weight: bold;font-size: 18px">\n' +item.no+
                               '                                                </div>\n' +
                               '                                                <div class="col s4"  id="'+item.id+'">\n' +item.amount+
                               '                                                    MMK\n' +
                               '                                                </div>\n' +
                               '                                                <div class="col s4"  id="'+item.id+'">\n' +
                               '                                                    <div class="right" id="'+item.id+'">'+created_date+'</div>\n' +
                               '                                                </div>\n' +
                               '                                            </div>\n' +
                               '                                        </div>\n' +
                               '                                        <div class="collapsible-body blue lighten-5">' +
                               '                                           <div class="row">\n' +
                               '                                                <table class="" id="b'+item.id+'"> </table>\n' +
                               '                                            </div></div>\n' +
                               '                                    </li>\n';

                           $('#show').append(str);
                       })

                   }
               })
           })
            /////////////////////////////////////

            $('body').delegate('.row #show li .collapsible-header','click',function (e) {
                //console.log(e.target.id);
                $.ajax({
                    url:"/admin/API/report/"+e.target.id,
                    type:"get",
                    success:function (data) {
                           console.log(data);
                        $('#b'+e.target.id).html(null);
                        $.each(data.items,function (i,item) {
                            var str='<tr>\n' +
                                '                                                        <td>'+(i+1)+'.</td>\n' +
                                '                                                        <td>'+item.item.name+'</td>\n' +
                                '                                                        <td>'+item.category.name+'</td>\n' +
                                '                                                        <td>'+item.item.buy_price+' MMK</td>\n' +
                                '                                                        <td>'+item.voc.qty+'</td>\n' +
                                '                                                        <td>'+item.voc.amount+' MMK</td>\n' +
                                '\n' +
                                '                                                    </tr>';
                            $('#b'+e.target.id).append(str);
                        })
                    }

                    })
            })
            //////////////////////////////////////////
        });
    </script>

    @stop