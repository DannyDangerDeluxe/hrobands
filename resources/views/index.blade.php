@extends('layouts/common')

@section('content')
	<div id="app" class="content">
		<div id="latest-bands" class="row">
			<latest-bands 
				:bands="{{ json_encode( $bands ) }}"
				:lang="{{ json_encode( __('lang') ) }}"
				headline="Latest bands in town"
			></latest-bands>


		</div>
	</div>
@endsection