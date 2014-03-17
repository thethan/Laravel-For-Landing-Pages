@extends('layouts.scaffold')

@section('main')

<h1>Edit Images_to_slider</h1>
{{ Form::model($images_to_slider, array('method' => 'PATCH', 'route' => array('images_to_sliders.update', $images_to_slider->id))) }}
	<ul>
        <li>
            {{ Form::label('i_id', 'I_id:') }}
            {{ Form::text('i_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('images_to_sliders.show', 'Cancel', $images_to_slider->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
