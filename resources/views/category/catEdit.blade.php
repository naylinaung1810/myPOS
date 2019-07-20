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
            <a href="{{route('category')}}" class="btn-floating waves-effect left hoverable" style="margin-top: 20px;margin-left: 10px"><i class="material-icons">arrow_back</i> </a>
            {{--</div>--}}
            <div class="row">
                <div class="col s12 m6 offset-m2" style=''>
                    <div class="card-panel">
                        <form enctype="multipart/form-data" method="post" action="{{route('category.edits')}}">
                            @csrf
                            <div class="row">
                                <div class="col s12">
                                    <h4>Edit {{$category->name}}</h4>
                                    <input value="{{$category->id}}" name="id" id="id" type="hidden">
                                    <div class="row">
                                        <div class="file-field input-field col s6" style="margin-top: 100px">
                                            <div class="btn">
                                                <span>File</span>
                                                <input type="file" id="image" name="image">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <img class="materialboxed responsive-img" width="250" height="250" src="{{route('category.image',['img_name'=>$category->image])}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{$category->name}}" name="name" id="name" type="text" class="validate">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{$category->symbol}}" name="symbol" id="symbol" type="text" class="validate">
                                            <label for="symbol">Symbol</label>
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
            $('.materialboxed').materialbox();
            $('select').formSelect();
            M.updateTextFields();


        })
    </script>

@stop