@extends('layouts/common')

@section('content')
	<div id="app" class="content">
	    <band-list
            :lang="{{ json_encode( __('lang') ) }}"
            title="Band Liste"
            :bands="{{ json_encode($bands) }}"
            :images="{{ json_encode($images) }}"
        ></band-list>
	</div>
@endsection