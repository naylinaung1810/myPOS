@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <span>
            <i class="material-icons" style="margin-top: 10px;">storage</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Items </span><small>> Add Items</small>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 20px">
            <div class="fixed-action-btn">
                <a href="{{route('items')}}" class="btn-floating btn-large waves-effect waves-block waves-light red">
                    <i class="large material-icons">apps</i>
                </a>
            </div>
            <div class="row">
                <div class="col m5 offset-m2 s12">
                    <div class="card-panel grey lighten-5 z-depth-1">

                        <div class="card-content">
                            <div class="row grey-text text-darken-1" style="margin-left: 5px">
                                <span><i class="small material-icons">add_circle</i> </span>
                                <span class="card-title" style="font-size: 30px"> Add</span>
                            </div>
                            <form action="{{route('items.add')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input name="image" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" placeholder="File name" type="text">
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <input id="last_name" name="name" type="text" class="validate">
                                    <label for="last_name">Last Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="sale_price" name="sale_price" type="number" class="validate">
                                    <label for="sale_price">Sale Price</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="buy_price" name="buy_price" type="number" class="validate">
                                    <label for="buy_price">Buy Price</label>
                                </div>
                                <div class="input-field col s12">
                                    <select name="category" class="icons">
                                        <option value="" disabled selected>Choose your option</option>
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}" data-icon="{{route('category.image',['img_name'=>$cat->image])}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="input-field right-align">
                                    <button class="btn waves-effect" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col m4 s12" id="img_show">
                    <div class="card  z-depth-1">
                        <div class="card-image">
                            <img class="materialboxed responsive-img" width="320" src="{{asset('images/sample-1.jpeg')}}" style="margin-top: 5px">
                        </div>
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

            //////////////////////////////////////////
/*
            setTimeout(function(){
              $('#img_show').html('<div class="preloader-wrapper big active">\n' +
                  '    <div class="spinner-layer spinner-blue-only">\n' +
                  '      <div class="circle-clipper left">\n' +
                  '        <div class="circle"></div>\n' +
                  '      </div><div class="gap-patch">\n' +
                  '        <div class="circle"></div>\n' +
                  '      </div><div class="circle-clipper right">\n' +
                  '        <div class="circle"></div>\n' +
                  '      </div>\n' +
                  '    </div>\n' +
                  '  </div>')
           }, 2000);*/
        })
    </script>
    @stop