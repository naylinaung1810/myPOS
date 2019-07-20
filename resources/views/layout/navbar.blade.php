<div class="navbar-fixed">
    <nav class="navbar grey lighten-1" style="">
        <div class="nav-wrapper"><a href="#!" class="brand-logo grey-text text-darken-4">Home</a>
            <ul id="nav-mobile" class="right">
                {{--<li class="hide-on-med-and-down"><a href="/products/admin">Buy Now!</a></li>--}}
                {{--<li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>--}}
                <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">account_circle</i></a></li>

            </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
        </div>
    </nav>
</div>


<ul id="sidenav-left" class="sidenav sidenav-fixed brown lighten-4" style="width: 230px">
    <li style="height: 57px"><a href="/pages/admin-dashboard" class="logo-container">Admin<i class="material-icons left">spa</i></a></li>
    <li>
        <div class="divider"></div>
        <ul class="collapsible">
            <li>
                <a class="collapsible-header waves-effect waves-cyan " href="#">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li class="active"><a class="collapsible-body active" href="{{route('dashboard.home')}}" data-i18n=""><i class="material-icons">home</i><span>Home</span></a>
                        </li>
                        <li><a class="collapsible-body" href="dashboard-ecommerce.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>eCommerce</span></a>
                        </li>
                        <li><a class="collapsible-body" href="dashboard-analytics.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Analytics</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a class="collapsible-header waves-effect waves-cyan " href="#">
                    <i class="material-icons">pie_chart</i>
                    <span class="menu-title" data-i18n="">Report</span>
                </a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li class="active"><a class="collapsible-body active" href="{{route('daily.sale')}}" data-i18n=""><i class="material-icons">equalizer</i><span>Daily Sale</span></a>
                        </li>
                        <li><a class="collapsible-body" href="{{route('daily.sale')}}" data-i18n=""><i class="material-icons">equalizer</i><span>Daily Income</span></a>
                        </li>
                        <li><a class="collapsible-body" href="dashboard-ecommerce.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Rent</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a class="collapsible-header waves-effect waves-cyan " href="#">
                    <i class="material-icons">storage</i>
                    <span class="menu-title" data-i18n="">Items</span>
                </a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li class="active"><a class="collapsible-body active" href="{{route('items.add')}}" data-i18n=""><i class="material-icons">add_box</i><span>Add Items</span></a>
                        </li>
                        <li><a class="collapsible-body" href="{{route('items')}}" data-i18n=""><i class="material-icons">apps</i><span>Items</span></a>
                        </li>
                        <li><a class="collapsible-body" href="{{route('items')}}" data-i18n=""><i class="material-icons">apps</i><span>Bar Code Gen</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a class="collapsible-header waves-effect waves-cyan " href="#">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="">Category</span>

                </a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li class="active"><a class="collapsible-body active" href="{{route('category')}}" data-i18n=""><i class="material-icons">add_box</i><span>Add</span></a>
                        </li>
                        <li><a class="collapsible-body" href="dashboard-ecommerce.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Categories</span></a>
                        </li>
                        <li><a class="collapsible-body" href="dashboard-analytics.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Analytics</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a class="collapsible-header waves-effect waves-cyan " href="#">
                    <i class="material-icons">account_box</i>
                    <span class="menu-title" data-i18n="">User</span>

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
            <li style="margin-top: 20px">
                <a class="collapsible-header waves-effect waves-cyan " href="{{route('logout')}}">
                    <i class="material-icons">exit_to_app</i>
                    <span class="menu-title" data-i18n="">Logout</span>

                </a>
            </li>

        </ul>
    </li>
</ul>



