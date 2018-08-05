@extends('layouts.dashboard')

@section('dashcontent')
    <div id="app" class="dash dash-gigs">
        <div class="card">
            <div class="card-header title">
                @lang('lang.new_gig')
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
                <form action="/registergig" method="POST" enctype="multipart/form-data" class="gig-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="band_one_id" value="{{ $bandId }}">

                    <div class="form-group col s12 col-md-6 float-left">
                        <label>Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Location</label>
                        <input type="text" name="location">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Straße</label>
                        <input type="text" name="street">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Hausnummer</label>
                        <input type="text" name="number">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Postleitzahl</label>
                        <input type="text" name="zip">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Stadt</label>
                        <input type="text" name="city">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Datum</label>
                        <input type="date" name="date">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Einlass</label>
                        <input type="time" name="open_doors">
                    </div>
                    <div class="form-group col-xs-12 padding-sm-left padding-sm-right">
                        <label>Beschreibung</label>
                        <textarea name="description" rows="10"></textarea>
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Preis</label>
                        <input type="number" min="1" step="any" name="price">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Link</label>
                        <input type="url" name="link">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Band 2</label>
                        <input type="number" name="band_two_id">
                    </div>
                    <div class="form-group col-xs-12 col-md-6 float-left">
                        <label>Band 3</label>
                        <input type="number" name="band_three_id">
                    </div>

                    <div class="form-group col-xs-12 margin-sm file-field input-field">
                        <div class="btn btn-secondary">
                            <span>Foto hochladen</span>
                            <input type="file" name="image">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <div class="form-group margin-sm full-width">
                        <input type="submit" value="speichern" class="btn btn-primary full-width">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
