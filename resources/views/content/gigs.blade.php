@extends('layouts/common')

@section('content')
	<div id="app" class="content">
	    <gig-list
            :lang="{{ json_encode( __('lang') ) }}"
            title="Kommende Gigs"
            :gigs="{{ json_encode($gigs) }}"
            :images="{{ json_encode($images) }}"
            show="upcomming"
        ></gig-list>
	</div>
@endsection