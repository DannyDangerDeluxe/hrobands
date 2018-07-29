@extends('layouts/common')

@section('content')
	<div id="app" class="content">
		<div class="row head_img">
			<img src="{{ $header_image }}">	
			<h1 class="header-image-title">{{ $title }}</h1>
		</div>
		<div class="row">
			<p>{{ $welcome }}</p>
		</div>
		<div id="latest-bands" class="row">
			<latest-bands 
				:bands="{{ json_encode( $bands ) }}"
				:lang="{{ json_encode( __('lang') ) }}"
				headline="Latest bands in town"
			></latest-bands>
		</div>
	</div>
@endsection