@extends('layouts/common')

@section('content')
	<div class="content">
		<div class="row">
			@foreach($bands as $band)
				<div class="band-container padding-sm margin-sm-bottom">
					
					@if( $band->path === null )
						<div>
							<div class="section no-btm-padding">
								<h2 class="no-padding no-margin block">{{$band->name}}</h2>
							</div>

							<div class="divider margin-sm-top margin-sm-bottom"></div>

							<div class="section no-padding">
								<span class="padding-sm-right title">
									<b>Genre:</b> 
									{{$band->genre}}
								</span> 
								<span class="padding-sm-right title">
									<b>Gründungsjahr:</b> 
									{{$band->founded}}
								</span>
								<span class="no-padding title">
									<b>Website:</b>
									<a href="{{$band->website}}">{{$band->website}}</a>
								</span>
							</div> 
						</div>

						<div class="divider margin-sm-top margin-sm-bottom"></div>

						<div>
							{{$band->text}}
						</div>
					@else
						<div class="col s8">
							<div class="col s12">
								<div class="section no-btm-padding">
									<h2 class="no-padding no-margin block">{{$band->name}}</h2>
								</div>

								<div class="divider margin-sm-top margin-sm-bottom"></div>

								<div class="section no-padding">
									<span class="padding-sm-right title">
										<b>Genre:</b> 
										{{$band->genre}}
									</span> 
									<span class="padding-sm-right title">
										<b>Gründungsjahr:</b> 
										{{$band->founded}}
									</span>
									<span class="no-padding title">
										<b>Website:</b>
										<a href="{{$band->website}}">{{$band->website}}</a>
									</span>
								</div>
								
								<div class="divider margin-sm-top margin-sm-bottom"></div>	
							</div>


							<div class="col s12">
								{{$band->text}}
							</div> 
						</div>
						<div class="col s4">
							<img src="{{$band->path}}" alt="{{$band->alt}}" class="padding-sm">
						</div>
					@endif
				</div>
			@endforeach
		</div>

		<div class="row">
		    <h1 class="title">{{__('home.title')}}</h1>
		    <p>
		    	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
		    </p>
		</div>

		<div class="row">
		    <h2>{{__('home.title')}}</h2>
		    <p>
		    	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
		    </p>
		</div>

		<div class="row">
		    <h3>{{__('home.title')}}</h3>
		    <p>
		    	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
		    </p>
		</div>
		<div class="row">
		    <h4>{{__('home.title')}}</h4>
		    <p>
		    	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
		    </p>
		</div>

		<div class="row">
		    <h5>{{__('home.title')}}</h5>
		    <p>
		    	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
		    </p>
		</div>

		<div class="row">
		    <h6>{{__('home.title')}}</h6>
		    <p>
		    	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
		    </p>
		</div>
	</div>
@endsection