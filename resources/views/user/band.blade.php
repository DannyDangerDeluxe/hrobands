@extends('layouts.dashboard')

@section('dashcontent')
    <div class="dash dash-band">
        <div class="card-header title">
            Band
            <span class="badge right">
                Band-ID: 
                @if($band_id === null)
                    nicht vorhanden
                @else
                    {{ $band_id }}
                @endif
            </span>
        </div>


        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if($band_id !== null)
                Keine Band
            @else
                Band vorhanden    
            @endif
        </div>
    </div>
@endsection
