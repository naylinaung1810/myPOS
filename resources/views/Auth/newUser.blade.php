@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <span>
            <i class="material-icons" style="margin-top: 10px;">account_box</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">User </span><small>> Add</small>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{route('user.all')}}">
                <i class="large material-icons">account_box</i>
            </a>
        </div>
        <section style="margin-top: 20px;margin-right: 10px">
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <form action="{{route('user.add')}}" method="post" class="col s12">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="name" type="text" name="name" class="validate">
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="email" type="email" name="email" class="validate">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">home</i>
                                                <select name="shop">
                                                    <option value="" disabled selected>Choose shop</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                                <label>Position Select</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">R</i>
                                                <select name="role">
                                                    <option value="" disabled selected>Choose Role</option>
                                                    @foreach($role as $r)
                                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                                        @endforeach
                                                </select>
                                                <label>Role Select</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="password" type="password" name="password" class="validate">
                                                <label for="password">password</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">*</i>
                                                <input id="confirm" type="password" name="confirm" class="validate">
                                                <label for="confirm">Confirm Password</label>
                                            </div>
                                            <button type="submit" class="btn waves-effect waves-light right">Save</button>
                                        </div>
                                    </div>
                                </form>
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
            $('select').formSelect();
        });
    </script>
    @stop