@extends('layouts.scaffold')

@section('main')

<h1>Create Images_to_slider</h1>

{{ Form::open(array('route' => 'images_to_sliders.store')) }}
	<ul>
        <li>
            {{ Form::label('i_id', 'I_id:') }}
            {{ Form::text('i_id') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


