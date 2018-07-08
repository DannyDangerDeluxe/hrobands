<header class="container">
	<div class="navbar row">
	    <nav id="header-nav" class="navbar-inner">
	        <a id="logo" href="{{ url('/') }}'">HRO Music</a>
	        <ul class="nav">
	            <li><a href="{{ url('/') }}">Home</a></li>
	            <li><a href="{{ url('/bands') }}">Bands</a></li>
	            <li><a href="{{ url('/dates') }}">Dates</a></li>
	            <li><a href="{{ url('/blog') }}">Blog</a></li>
	        </ul>
	    </nav>
	    @guest
		    @if (Route::has('login'))
		        <div class="top-right links">
		            @auth
		                <a href="{{ url('/home') }}">Home</a>
		            @else
		                <a href="{{ route('login') }}">Login</a>
		                <a href="{{ route('register') }}">Register</a>
		            @endauth
		        </div>
		    @endif
		@endguest
	</div>
</header>

