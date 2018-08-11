@extends('layouts/common')

@section('content')
	<div class="gig-detail">
		<div class="container">
			<div class="row">
				<div class="card col-xs-12 col-lg-12 no-padding">
					<div class="card-header col-xs-12 col-lg-12">
						<h4 class="no-padding no-margin">{{ $gig->name }}</h4>
					</div>
					<div class="card-body col-xs-12 col-lg-12">
						@if($gig->location)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->location }}</p>
							</div>
						@endif

						@if($gig->street)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->street .' ' .$gig->number }}</p>
								<p class="no-padding no-margin">{{ $gig->zip .' ' .$gig->city }}</p>
							</div>
						@endif

						@if($gig->date)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">am {{ $gig->date }}</p>
							</div>
						@endif

						@if($gig->open_doors)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->open_doors }} Uhr</p> 
							</div>
						@endif

						@if($gig->price)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->price }} €</p>
							</div>
						@endif

						@if($gig->description)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->description }}</p>
							</div>
						@endif

						@if($gig->link)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->link }}</p>
							</div>
						@endif

						@if($band1)
							<div class="info band col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $band1->name }}</p>
								<a href="{{ url('/bands') .'/' .$band1->id }}" class="btn btn-primary">@lang('lang.link')</a>
							</div>
						@endif

						@if($band2)
							<div class="info band col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $band2->name }}</p>
								<a href="{{ url('/bands') .'/' .$band2->id }}" class="btn btn-primary">@lang('lang.link')</a>
							</div>
						@endif

						@if($band3)
							<div class="band col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $band3->name }}</p>
								<a href="{{ url('/bands') .'/' .$band3->id }}" class="btn btn-primary">@lang('lang.link')</a>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection