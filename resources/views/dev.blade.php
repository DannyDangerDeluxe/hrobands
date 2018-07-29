@extends('layouts/common')

@section('content')
	<div id="app" class="content">
		<div class="section row col s12">
			<h1 class="col s12">{{__('lang.dev_title')}}</h1>
		</div>

		<div class="row">
			<div class="col s12 l6">
				<h2 class="col">{{__('lang.dev_gig_headline')}}</h2>
				<form action="/dev/gig" method="POST" class="col">
					<fieldset>
						<div>
							<label for="name">{{__('lang.dev_gig_name')}}:</label>
							<input type="text" name="name">
						</div>

						<div>
							<label for="organizer">{{__('lang.dev_gig_organizer')}}:</label>
							<input type="text" name="organizer">
						</div>

						<div>
							<label for="location">{{__('lang.dev_gig_location')}}:</label>
							<input type="text" name="location">
						</div>

						<div>
							<label for="date">{{__('lang.dev_gig_date')}}:</label>
							<input type="date" name="date">
						</div>

						<div>
							<label for="time">{{__('lang.dev_gig_time')}}:</label>
							<input type="time" name="time">
						</div>

						<div>
							<label for="price">{{__('lang.dev_gig_price')}}:</label>
							<input type="number" name="price">
						</div>

						<div>
							<label for="website">{{__('lang.dev_gig_website')}}:</label>
							<input type="text" name="website">
						</div>

						<div>
							<label for="description">{{__('lang.dev_gig_desc')}}:</label>
							<textarea type="text" name="description"></textarea>
						</div>

						<div>
							<select name="band_id">
								<option value="-1">{{__('lang.dev_gig_choose_band')}}</option>
								@foreach($bands as $band)
									<option value="{{$band->id}}">
										{{$band->name}}
									</option>
								@endforeach
							</select>
						</div>

						<div>
							<label for="img_path">{{__('lang.dev_gig_img_path')}}:</label>
							<input type="file" name="img_path">
						</div>

						<div>
							<label for="img_alt">{{__('lang.dev_gig_img_alt')}}:</label>
							<input type="text" name="img_alt">
						</div>

						<div>
							<input type="submit" value="{{__('lang.dev_gig_submit')}}">
						</div>

						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</fieldset>
				</form>
			</div>

			<div class="col s12 l6">
				<h2 class="col">{{__('lang.dev_band_headline')}}</h2>
				<form action="/dev/band" method="POST" class="col">
					<fieldset>
						<div>
							<label for="name">{{__('lang.dev_band_name')}}:</label>
							<input type="text" name="name">
						</div>

						<div>
							<select name="founded">
								<option value="">{{__('lang.dev_band_choose_founded')}}</option>
								@for($i = date('Y'); $i > (date('Y') - 100); $i--)
									<option value="{{$i}}">
										{{$i}}
									</option>
								@endfor
							</select>
						</div>

						<div>
							<select name="genre">
								<option value="">{{__('lang.dev_band_choose_genre')}}</option>
								@foreach($genres as $genre)
									<option value="{{$genre->genre_id}}">
										{{$genre->genre_name}}
									</option>
								@endforeach
							</select>							
						</div>

						<div>
							<label for="website">{{__('lang.dev_band_website')}}:</label>
							<input type="text" name="website">
						</div>

						<div>
							<label for="desc">{{__('lang.dev_band_desc')}}:</label>
							<input type="text" name="desc">
						</div>

						<div>
							<input type="submit" value="{{__('lang.dev_band_submit')}}">
						</div>

						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection