<div class="navbar-fixed">
    <nav class="navbar grey lighten-1" style="">
        <div class="nav-wrapper"><a href="#!" class="brand-logo grey-text text-darken-4"><span >Home</span><span class="hide-on-med-and-down" style="margin-left: 180px">Home</span></a>
            {{--<div class="nav-wrapper hide"><a href="#!" class="brand-logo grey-text text-darken-4" style="margin-left: 255px">Home</a>--}}
            <ul id="nav-mobile" class="right">
                {{--<li class="hide-on-med-and-down"><a href="/products/admin">Buy Now!</a></li>--}}
                {{--<li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>--}}
                <li>{{Auth::user()->name}}</li>

                <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect" style="margin-right: 15px"><i class="material-icons">account_circle</i></a></li>
            </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
        </div>
    </nav>
</div>

<ul id="sidenav-left" class="sidenav sidenav-fixed blue lighten-5" style="width: 245px;padding-top: 10px">
    <li style=""><a href="{{route('dashboard.home')}}" class="logo-container">Nay Lin Aung<i class="material-icons left">spa</i></a></li>
    <li>
        <div class="divider"></div>
        <ul class="collapsible popout" style="margin-top: 10px">
            @if(Auth::User()->getRoleNames()[0]=='user'||Auth::User()->getRoleNames()[0]=='manager')
            <li class=" blue darken-1" style="border-radius: 5px">
                <a href="{{route('dashboard.sale.sale')}}" class="collapsible-header hoverable white-text darken-1"><i class="material-icons white-text darken-1">add_shopping_cart</i>For Sale</a>
            </li>
            <li class="orange darken-1" style="border-radius: 5px;margin-top: 5px">
                <a href="{{route('dashboard.add.item')}}" class="collapsible-header hoverable white-text darken-1"><i class="material-icons white-text darken-1">add_square</i>Income</a>
            </li>
            <li class="green lighten-1" style="border-radius: 5px;margin-top: 5px">
                <a href="{{route('dashboard.report')}}" class="collapsible-header hoverable white-text darken-1"><i class="material-icons white-text darken-1">equalizer</i>Daily Report</a>
            </li>
                @endif
                @if(Auth::User()->getRoleNames()[0]=='manager')
                <li class="grey darken-1" style="border-radius: 5px;margin-top: 5px">
                    <a href="{{route('dashboard.report.all')}}" class="collapsible-header hoverable white-text darken-1"><i class="material-icons white-text darken-1">dashboard</i>Reports</a>
                </li>
                <li class=" teal lighten-2" style="border-radius: 5px;margin-top: 5px">
                    <a href="{{route('dashboard.item.all')}}" class="collapsible-header hoverable white-text darken-1"><i class="material-icons white-text darken-1">storage</i>Items</a>
                </li>
                    @endif
                @if(Auth::User()->getRoleNames()[0]=='super-admin')
                <li class="orange lighten-1" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="#">
                        <i class="material-icons">dashboard</i>
                        <span class="menu-title" data-i18n="">Home</span>
                        <i class="material-icons right" style="padding-left: 25px">chevron_right</i>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsisettings_input_svideoble collapsible-sub" data-collapsible="accordion">
                            <li class="active"><a class="collapsible-body active" href="{{route('/')}}" data-i18n=""><i class="material-icons">home</i><span>Home</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class=" grey darken-3" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="#">
                        <i class="material-icons">pie_chart</i>
                        <span class="menu-title" data-i18n="">Report</span>
                        <i class="material-icons right" style="padding-left: 25px">chevron_right</i>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li class="active"><a class="collapsible-body active" href="{{route('daily.sale')}}" data-i18n=""><i class="material-icons">equalizer</i><span>Daily Sale</span></a>
                            </li>
                            <li><a class="collapsible-body" href="{{route('daily.item')}}" data-i18n=""><i class="material-icons">pie_chart</i><span>Daily Income</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="light-blue darken-3" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="#">
                        <i class="material-icons">storage</i>
                        <span class="menu-title" data-i18n="">Items</span>
                        <i class="material-icons right" style="padding-left: 25px">chevron_right</i>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li class="active"><a class="collapsible-body active" href="{{route('items.add')}}" data-i18n=""><i class="material-icons">add_box</i><span>Add Items</span></a>
                            </li>
                            <li><a class="collapsible-body" href="{{route('items')}}" data-i18n=""><i class="material-icons">apps</i><span>Items</span></a>
                            </li>
                            <li><a class="collapsible-body" href="{{route('items.barcode')}}" data-i18n=""><i class="material-icons">apps</i><span>Bar Code Gen</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="green darken-2" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="#">
                        <i class="material-icons">account_box</i>
                        <span class="menu-title" data-i18n="">Users</span>
                        <i class="material-icons right" style="padding-left: 25px">chevron_right</i>
                    </a>
                    <div class="collapsible-body">
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li class="active"><a class="collapsible-body active" href="{{route('user.add')}}" data-i18n=""><i class="material-icons">add_box</i><span>Add</span></a>
                            </li>
                            <li><a class="collapsible-body" href="{{route('user.all')}}" data-i18n=""><i class="material-icons">account_circle</i><span>Users</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                    <li class="teal lighten-2" style="border-radius: 5px;margin-top: 5px">
                        <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="{{route('income.home')}}">
                            <i class="material-icons">assignment</i>
                            <span class="menu-title" data-i18n="">Income</span>
                        </a>
                    </li>

                <li class="orange lighten-1" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="{{route('product.item.home')}}">
                        <i class="material-icons">dashboard</i>
                        <span class="menu-title" data-i18n="">Products</span>
                    </a>
                </li>
                <li class="grey darken-3" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="{{route('category')}}">
                        <i class="material-icons">settings_input_svideo</i>
                        <span class="menu-title" data-i18n="">Category</span>
                    </a>
                </li>

                <li class="indigo darken-2" style="border-radius: 5px;margin-top: 5px">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="{{route('shop.all')}}">
                        <i class="material-icons">home</i>
                        <span class="menu-title" data-i18n="">Shop</span>
                    </a>
                </li>


            @endif

                <li class="red lighten-1" style="border-radius: 5px;margin-top: 5px;">
                    <a class="collapsible-header waves-effect waves-cyan hoverable white-text darken-1" href="{{route('logout')}}">
                        <i class="material-icons">exit_to_app</i>
                        <span class="menu-title" data-i18n="">Logout</span>
                    </a>
                </li>
        </ul>


    </li>
</ul>



