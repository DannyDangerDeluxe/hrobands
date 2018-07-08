<div id="header">
	<header class="navbar-fixed">
	    <nav id="header-nav" class="nav-wrapper">
        	<a id="logo" class="nav brand-logo" href="{{ url('/') }}'">HRO Music</a>
	        <ul class="nav right hide-on-med-and-down">
	            <li><a href="{{ url('/') }}">Home</a></li>
	            <li><a href="{{ url('/bands') }}">Bands</a></li>
	            <li><a href="{{ url('/dates') }}">Dates</a></li>
	            <li><a href="{{ url('/blog') }}">Blog</a></li>
	            @auth
	                <li><a href="{{ url('/profile') }}">Profile</a></li>
	            @else
	                <li><a href="{{ url('login') }}">Login/Register</a></li>
	            @endauth
	        </ul>
	    </nav>
	</header>
</div>

