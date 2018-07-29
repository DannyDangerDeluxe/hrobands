@extends('layouts.dashboard')

@section('dashcontent')
    <div class="dash dash-band">
        <div class="card-header title">
            Band
            <span class="badge right">
                @if($band_id !== null)
                    Band-ID: {{ $band_id }}
                @endif
            </span>
        </div>


        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if($band_id === null)
                <!-- REGISTER BAND -->
                <div class="form register-band container">
                    <h3>@lang('lang.dash_band_reg_title')</h3>
                    <form action="{{ url('dash/band/register') }}" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="form-group col-xs-12 col-md-6">
                            <label>@lang('lang.dash_band_reg_name')</label>
                            <input type="text" name="name">
                        </div>
                        
                        <div class="form-group col-xs-12 col-md-6">
                            <label>@lang('lang.dash_band_reg_website')</label>
                            <input type="text" name="website">
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <label>@lang('lang.dash_band_reg_founded')</label>
                            <select name="founded">
                                <option value="">{{__('lang.please_choose')}}</option>
                                @for($i = date('Y'); $i >= date('Y') - 50; $i--)
                                    <option value={{ $i }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="form-group col-xs-12 col-md-6">
                            <label>@lang('lang.dash_band_reg_genre')</label>
                            <select name="genre">
                                <option value="">{{__('lang.please_choose')}}</option>
                                @foreach($genres as $genre)
                                    <option value="{{$genre['id']}}">{{ $genre['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group margin-sm full-width input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea type="text" name="description" class="materialize-textarea"></textarea>
                            <label>@lang('lang.dash_band_reg_desc')</label>
                        </div>

                        <div class="form-group margin-sm full-width file-field input-field">
                            <div class="btn">
                                <span>@lang('lang.dash_band_reg_image')</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        
                        <div class="form-group margin-sm full-width">
                            <input type="submit" name="{{__('lang.dash_band_reg_submit')}}" class="btn btn-primary full-width"></textarea>
                        </div>
                    </form>
                </div>
            @else
                <div class="show-band container">
                    <div class="content-header">
                        <div class="title">
                            {{ $band['name'] }}
                        </div>
                    </div>
                    <div class="content-body">
                        <div class="inputs">
                            @if($band['website'])
                                <div class="website">
                                    {{ $band['website'] }}
                                </div>
                            @endif
                            @if($band['founded'])
                                <div class="founded">
                                    {{ $band['founded'] }}
                                </div>
                            @endif
                            @if($band['description'])
                                <div class="description">
                                    {{ $band['description'] }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
