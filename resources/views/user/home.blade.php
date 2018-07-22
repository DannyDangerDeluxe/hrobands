@extends('layouts.dashboard')

@section('dashcontent')
    <div class="dash dash-home">
        <div class="card-header title">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            Test
        </div>
    </div>
@endsection
