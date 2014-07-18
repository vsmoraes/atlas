<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project Atlas</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                @if ( Auth::check() )
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('signOut') }}">Sign out</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{ URL::route('signIn') }}">{{ Lang::get('navbar.links.signIn') }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>