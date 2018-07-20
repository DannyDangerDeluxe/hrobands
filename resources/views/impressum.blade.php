@extends('layouts/common')

@section('content')
	<div id="app" class="imprint content">
		<div class="row">
			<div class="col s12">
				<h1>{{ $faq_title }}</h1>
			</div>
		</div>
		@foreach($faq_content as $entry)
			<div class="row full-brdr">
				<div class="col s12">
					<div class="col s12 padding-sm btm-brdr">
						<h4 class="no-margin">{{ $entry['question-text'] }}</h4>
					</div>
					<div class="col s12 padding-sm">
						<h5 class="no-margin">{{ $entry['answer-text'] }}</h5>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection