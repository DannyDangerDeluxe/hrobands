@extends('layouts.dashboard')

@section('dashcontent')
    <div id="app" class="dash dash-profile">
        <div class="card">
            <div class="card-header title">
                @lang('lang.profile')
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <div class="user-info col s7">
                    <div class="output">
                        <div class="title">@lang('lang.name')</div> 
                        {{ $user->name }}
                    </div>
                    <div class="output">
                        <div class="title">@lang('lang.email')</div> 
                        {{ $user->email }}
                    </div>
                    @if(isset($band))
                        <div class="output">
                            <div class="title">@lang('lang.band')</div> 
                            {{ $band->name }}
                        </div>
                    @endif
                </div>
                <div class="user-image col s4">
                    @if(isset($image))
                        <div class="output col-xs-4 pull-right">
                            <img src="/{{ $image->path }}" alt="{{ $image->alt }}"> 
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if(isset($images))
            <div class="card">
                <image-view 
                    :images="{{ json_encode($images) }}"
                    :lang="{{ json_encode( __('lang') ) }}"
                    title="Deine Bilder"
                ></image-view>
            </div>
        @endif
        <div class="card">
            <image-upload
                id_label="user_id"
                :id="{{ $user->id }}"
                url="{{ url('profileimageupload') }}"
                :lang="{{ json_encode( __('lang') ) }}"
                title="Neues Bild hochladen?"
            ></image-upload>
        </div>
    </div>
@endsection
