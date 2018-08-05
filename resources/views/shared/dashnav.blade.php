
<div class="dashnav col-md-3 nav-wrapper">
	<div class="dashnav-wrapper">
		<nav class="nav">
			<li>
				<a href="{{ url('/dash/home') }}" class="title {{ Request::is('dash/home') ? 'active' : '' }}">
					{{__('lang.dashnav_dashboard')}}
				</a>
			</li>
			<li>
				<a href="{{ url('/dash/profile') }}" class="title {{ Request::is('dash/profile') ? 'active' : '' }}">
					{{__('lang.dashnav_profile')}}
				</a>
			</li>
			<li>
				<a href="{{ url('/dash/band') }}" class="title {{ Request::is('dash/band') ? 'active' : '' }}">
					{{__('lang.dashnav_band')}}
				</a>
			</li>
			@if(isset(auth()->user()->band_id))
				<li>
					<a href="{{ url('/dash/gigs') }}" class="title {{ Request::is('dash/gigs') ? 'active' : '' }}">
						{{__('lang.gigs')}}
					</a>
				</li>
			@endif
			<li>
				<a href="{{ url('/dash/media') }}" class="title {{ Request::is('dash/media') ? 'active' : '' }}">
					{{__('lang.dashnav_media')}}
				</a>
			</li>
			<li>
				<a href="{{ url('/dash/settings') }}" class="title {{ Request::is('dash/settings') ? 'active' : '' }}">
					{{__('lang.dashnav_settings')}}
				</a>
			</li>
		</nav>
	</div>
</div>