
@extends('layout.master')

@section('title')
    @stop

@section('content')
    <main>
        <section class="">
            <h5 style="margin-left: 10px">Category</h5>
        </section>
        <div class="row">
            <div class="col m4 s12">
                <div class="card z-depth-3">
                    <div class="card-content">
                        <div class="card-title"><p>Add Category</p></div>
                        <div class="divider"></div>
                            <form action="{{route('category.add')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="input-field">
                                    <input name="name" id="first_name" type="text" class="validate">
                                    <label for="first_name">Category Name</label>
                                </div>
                                <div class="input-field">
                                    <input name="symbol" id="symbol" type="text" class="validate">
                                    <label for="symbol">Symbol</label>
                                </div>
                                <div class="input-field right-align">
                                    <button class="btn waves-effect" type="submit">Save</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="card-panel col m8 s12">
                <table class="">
                    <thead>
                    <tr class="grey-text text-darken-1">
                        <th>Index</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Symbol</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td><img src="{{route('category.image',['img_name'=>$cat->image])}}" class="materialboxed" width="150" height="150" > </td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->symbol}}</td>
                        <td>{{$cat->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('category.edit',['id'=>$cat->id])}}" class="btn waves-effect waves-light blue lighten-2 btn-small"><i class="material-icons">edit</i> </a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </main>
    @stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
    </script>
    @stop