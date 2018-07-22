@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('shared.dashnav')

        <div class="col-md-9">
            <div class="card">

            	@yield('dashcontent')

            </div>
        </div>
    </div>
</div>
@endsection
