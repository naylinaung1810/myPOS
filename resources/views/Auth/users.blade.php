@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <div class="col s6" style="padding-top: 15px">
                <span>
            <i class="material-icons" style="margin-top: 10px;">account_box</i>
            </span>
                <span style="margin-left: 10px;font-size: 30px">User </span><small>> All </small>
            </div>
            <div class="col s6">
                <div class="input-field col s8">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Search</label>
                </div>
            </div>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{route('user.add')}}">
                <i class="large material-icons">add_circle</i>
            </a>
        </div>
        <section style="margin-top: 0px;margin-right: 10px">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <table class="responsive-table">
                            <tr class="grey-text lighten-2">
                                <th>Index</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Shop</th>
                                <th>Role</th>
                                <th>Date</th>
                                <th>Action</th> `
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td class="col s2"><img src="" class="circle responsive-img"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->shop_id}}</td>
                                    <td>{{$user->getRoleNames()[0]}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a class='dropdown-trigger btn' href='#' data-target='dropdown1'><i class="material-icons">settings</i><i class="material-icons">keyboard_arrow_down</i> </a>
                                        <ul id='dropdown1' class='dropdown-content'>
                                            <li><a href="#!"><i class="material-icons">edit</i> </a></li>
                                            <li><a href="#!"><i class="material-icons">delete</i> </a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
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
            $('.dropdown-trigger').dropdown();
        })
    </script>
    @stop