@extends('layouts.scaffold')

@section('main')

<h1>Edit Blade</h1>
{{ Form::model($blade, array('method' => 'PATCH', 'route' => array('blades.update', $blade->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('blades.show', 'Cancel', $blade->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
