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
        <section style="margin-top: 0px;margin-right: 10px">
            {{--<div class="row">--}}
                <a href="{{route('items')}}" class="btn-floating waves-effect left hoverable" style="margin-top: 20px;margin-left: 10px"><i class="material-icons">arrow_back</i> </a>
            {{--</div>--}}
            <div class="row">
                <div class="col s12 m6 offset-m2" style=''>
                    <div class="card-panel">
                        <form enctype="multipart/form-data" method="post" action="{{route('items.edit')}}">
                            @csrf
                            <div class="row">
                                <div class="col s12">
                                    <h4>Edit {{$item->name}}</h4>
                                    <input value="{{$item->id}}" name="id" id="id" type="hidden">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{$item->name}}" name="name" id="name" type="text" class="validate">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="category" class="icons">
                                                <option value="" disabled selected>Choose your option</option>
                                                @foreach($category as $cat)
                                                    <option value="{{$cat->id}}" data-icon="{{route('category.image',['img_name'=>$cat->image])}}" @if($cat->id==$item->category_id) selected @endif>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{$item->buy_price}}" name="buy_price" id="buy_price" type="number" class="validate">
                                            <label for="buy_price">Buy Price</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{$item->sale_price}}" name="sale_price" id="sale_price" type="number" class="validate">
                                            <label for="buy_price">Sale Price</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="waves-effect green accent-2 btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @stop
@section('script')
    <script>
        $(function () {
            $('select').formSelect();
            M.updateTextFields();


        })
    </script>

@stop