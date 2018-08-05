@extends('layouts.dashboard')

@section('dashcontent')
<div id="app" class="dash dash-media">
    <div class="card">
        <div class="card-header">
            <h3>@lang('lang.dash_media_title')</h3>
        </div>
        <div class="card-body">
            <div class="form upload-media container">
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

                @if($image)
                    <div class="row">
                        <div class="user-image col-xs-12 col-md-4">
                            <img src="{{ asset($image['path']) }}" alt="{{ $image['alt'] }}">
                        </div>
                        <div class="user-image-info col-xs-12 col-md-8">
                            <div><span class="name">@lang('lang.image_upload_name'): </span>{{ $image['name'] }}</div>
                            <div><span class="alt">@lang('lang.image_upload_alt'): </span>{{ $image['alt'] }}</div>
                            <div><span class="undertitle">@lang('lang.image_upload_undertitle'): </span>{{ $image['undertitle'] }}</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <image-upload 
            id_label="user_id"
            :id="{{ $user_id }}"
            url="userimageupload"
            :lang="{{ json_encode( __('lang') ) }}"
            title="Profilbild Upload"
        ></image-upload>
    </div>
    @if(isset($band_id))
        <div class="card">
            <image-view 
                :images="{{ json_encode($images) }}"
                :lang="{{ json_encode( __('lang') ) }}"
                title="Band Bilder"
            ></image-view>
        </div>
        <div class="card">
            <image-upload
                id_label="band_id"
                :id="{{ $band_id }}"
                url="{{ url('bandimageupload') }}"
                :lang="{{ json_encode( __('lang') ) }}"
                title="Band Bilder Upload"
            ></image-upload>
        </div>
    @endif
    @if(isset($gig_id))
        <div class="card">
            <image-view 
                images=null
                :lang="{{ json_encode( __('lang') ) }}"
                title="Gig Bilder"
            ></image-view>
        </div>
        <div class="card">
            <image-upload 
                id_label="gig_id"
                :id="{{ $gig_id }}"
                url="gigimageupload"
                :lang="{{ json_encode( __('lang') ) }}"
                title="Gig Bilder Upload"
            ></image-upload>
        </div>
    @endif
</div>
@endsection