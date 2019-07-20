@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
             <span>
            <i class="material-icons" style="margin-top: 10px;">home</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Shop </span><small>> All</small>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section style="margin-top: 0px" class="">
            <div class="row">
                <div class="col m4">
                    <div class="card z-depth-3">
                        <div class="card-content">
                            <div class="row">
                                <form method="post" action="{{route('shop.add')}}" class="col s12">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" name="name" type="text" class="validate">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="phone" name="phone" type="tel" class="validate">
                                            <label for="phone">Phone</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="city">
                                                <option value="" disabled selected>Choose City</option>
                                                <option value="Yangon">Yangon</option>
                                                <option value="Mawlamyine">Mawlamyine</option>
                                                <option value="Mandalay">Mandalay</option>
                                                <option value="Thaton">Thaton</option>
                                                <option value="Naypyitaw">Naypyitaw</option>
                                            </select>
                                            <label>City Select</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="address" name="address" class="materialize-textarea"></textarea>
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-block waves-effect waves-light right">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m8">
                    <div class="card-panel">
                        <table>
                            <tr class="grey-text text-accent-2">
                                <th>NO</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>{{$shop->id}}</td>
                                    <td>{{$shop->name}}</td>
                                    <td>{{$shop->phone}}</td>
                                    <td>{{$shop->city}}</td>
                                    <td>{{$shop->location}}</td>
                                    <td>{{$shop->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#" class="btn btn-small waves-effect"><i class="material-icons">edit</i> </a>
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
        $(document).ready(function(){
            $('select').formSelect();
        });

    </script>
    @stop