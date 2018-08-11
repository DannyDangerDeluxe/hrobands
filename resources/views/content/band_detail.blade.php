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
						@if($gig->website)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->website }}</p>
							</div>
						@endif

						@if($gig->website)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->website }}</p>
							</div>
						@endif

						@if($gig->description)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">am {{ $gig->description }}</p>
							</div>
						@endif

						@if($gig->genre)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $gig->genre }} Uhr</p> 
							</div>
						@endif

						@if($genre)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $genre->path }} €</p>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection