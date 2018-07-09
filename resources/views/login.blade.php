@extends('layouts/common')

@section('content')
	<div class="content row">
		<div id="login-form" class="col s6">
			<form method="POST" action="/login">
				<fieldset>
					@csrf
					<h1 class="title">{{__('home.login_title')}}</h1>

					<label for="email">{{__('home.login_email')}}</label>
					<input type="text" name="email" required>
					<span class="form-error">{{ $errors->first('email') }}</span>

					<label for="pass">{{__('home.login_password')}}</label>
					<input type="password" name="password" required>
					<span class="form-error">{{ $errors->first('password') }}</span>

					<input type="submit" value="{{__('home.login_submit')}}">
				</fieldset>
			</form>
		</div>

		<div id="register-form" class="col s6">
			<form method="POST" action="/register">
				<fieldset>
					@csrf
					<h1 class="title">{{__('home.register_title')}}</h1>

					<label for="name">{{__('home.register_name')}}</label>
					<input type="text" name="name" required>

					<label for="band">{{__('home.register_band')}}</label>
					<input type="text" name="band" required>

					<label for="email">{{__('home.register_email')}}</label>
					<input type="text" name="email" required>

					<label for="birthdate">{{__('home.register_birthdate')}}</label>
					<input type="date" name="birthdate" required>

					<label for="pass">{{__('home.register_password')}}</label>
					<input type="password" name="pass" required>

					<input type="submit" value="{{__('home.register_submit')}}">
				</fieldset>
			</form>
		</div>
	</div>
@endsection