@extends('layouts.scaffold')

@section('main')

<h1>Edit Slider</h1>
{{ Form::model($slider, array('method' => 'PATCH', 'route' => array('sliders.update', $slider->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('t_id', 'T_id:') }}
            {{ Form::input('number', 't_id') }}
        </li>

        <li>
            {{ Form::label('v_id', 'V_id:') }}
            {{ Form::input('number', 'v_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('sliders.show', 'Cancel', $slider->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
