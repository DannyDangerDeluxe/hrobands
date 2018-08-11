@extends('layouts/common')

@section('content')
	<div id="app" class="content">
	    <gig-list
            :lang="{{ json_encode( __('lang') ) }}"
            title="Gig Liste"
            :gigs="{{ json_encode($gigs) }}"
            :images="{{ json_encode($images) }}"
        ></gig-list>
	</div>
@endsection