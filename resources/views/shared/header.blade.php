<div id="header">
	<header class="navbar-fixed container">
	    <nav id="header-nav" class="nav-wrapper">
        	<a id="logo" class="nav brand-logo" href="{{ url('/') }}'">
        		{{ config('app.name', 'Laravel') }}
        	</a>
	        <ul class="nav right hide-on-med-and-down">
	            <li><a href="{{ url('/') }}">{{ __('lang.home') }}</a></li>
	            <li><a href="{{ url('/news') }}">{{ __('lang.news') }}</a></li>
	            <li><a href="{{ url('/bands') }}">{{ __('lang.bands') }}</a></li>
	            <li><a href="{{ url('/dates') }}">{{ __('lang.dates') }}</a></li>
	            <li><a href="{{ url('/dev') }}">{{ __('lang.dev') }}</a></li>
	            @auth
	                <li><a href="{{ url('/profile') }}">{{__('lang.profile')}}</a></li>
	                <li><a class="dropdown-item" href="{{ route('logout') }}"
	                 		onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('lang.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
	            @else
	                <li><a href="{{ route('login') }}">{{ __('lang.login') }}</a></li>
	                <li><a href="{{ url('register') }}">{{ __('lang.register') }}</a></li>
	            @endauth
	        </ul>
	    </nav>
	</header>
</div>

