@extends('layouts/common')

@section('content')
	<div class="band-detail">
		<div class="container">
			<div class="row">
				<div class="card col-xs-12 col-lg-12 no-padding">
					<div class="card-header col-xs-12 col-lg-12">
						<h4 class="no-padding no-margin">{{ $band->name }}</h4>
					</div>
					<div class="card-body col-xs-12 col-lg-12">
						@if($band->website)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $band->website }}</p>
							</div>
						@endif

						@if($band->founded)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $band->founded }}</p>
							</div>
						@endif

						@if($band->description)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $band->description }}</p>
							</div>
						@endif

						@if($genre)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $genre->name }}</p> 
							</div>
						@endif

						@if($image)
							<div class="info col-xs-12 col-sm-6 ">
								<p class="no-padding no-margin">{{ $image->path }} €</p>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection