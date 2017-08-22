<div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title" >
        <strong>Cytonn Internship Programme</strong>
    </div>
</div>

<div class="top-bar" id="responsive-menu">
    <div class="top-bar-left">
        <!-- Authentication Links -->
        @if (Auth::check())

            <ul class="dropdown menu" data-dropdown-menu>
                <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/home">PF</a></li>
                <li class="{{ Request::is('institutions') ? 'active' : '' }}">
                    <a href="/institutions">Institution</a>
                    <ul class="menu vertical">
                        <li><a href="/institutions">Institutions</a></li>
                        <li><a href="/institutions/create">Add Institution</a></li>
                    </ul>
                </li>

                <li class="{{ Request::is('interactions') ? 'active' : '' }}">
                    <a href="/interactions">Interaction</a>
                    <ul class="menu vertical">
                        <li><a href="/interactions">Interactions</a></li>
                        <li><a href="/interactions/create">Add Interaction</a></li>
                    </ul>
                </li>

                <li class="{{ Request::is('deals') ? 'active' : '' }}">
                    <a href="/deals">Deals</a>
                    <ul class="menu vertical">
                        <li><a href="/deals">Deals</a></li>
                        <li><a href="/deals/create">Add a Deal</a></li>
                    </ul>
                </li>

                @else

                @endif
            </ul>

    </div>

    <div class="top-bar-right">

        <ul class="dropdown menu" data-dropdown-menu>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="is-dropdown-submenu-parent">
                    <a href="#">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="menu is-dropdown-submenu" role="menu">
                        <li role="menuitem">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
