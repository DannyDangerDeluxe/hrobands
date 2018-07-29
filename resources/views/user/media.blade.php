@extends('layouts.dashboard')

@section('dashcontent')
<div class="dash dash-media">
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
                    <div><span class="name">Name: </span>{{ $image['name'] }}</div>
                    <div><span class="alt">Alternative Text: </span>{{ $image['alt'] }}</div>
                    <div><span class="undertitle">Untertitel: </span>{{ $image['undertitle'] }}</div>
                </div>
            </div>

            <div class="divider margin-md-bottom margin-md-top"></div>
            @endif

            <form action="{{ url('userimageupload') }}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <input type="hidden" name="bandId" value="{{ $band_id }}">

                <div class="form-group col-xs-12 col-md-6">
                    <label>@lang('lang.dash_media_name')</label>
                    <input type="text" name="name">
                </div>

                <div class="form-group col-xs-12 col-md-6">
                    <label>@lang('lang.dash_media_alt')</label>
                    <input type="text" name="alt">
                </div>

                <div class="form-group col-xs-12 col-md-6">
                    <label>@lang('lang.dash_media_undertitle')</label>
                    <input type="text" name="undertitle">
                </div>
                
                <div class="form-group margin-sm full-width file-field input-field">
                    <div class="btn btn-secondary">
                        <span>@lang('lang.dash_media_image')</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <div class="form-group margin-sm full-width">
                    <input type="submit" value="{{ __('lang.dash_media_submit') }}" class="btn btn-primary full-width">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection