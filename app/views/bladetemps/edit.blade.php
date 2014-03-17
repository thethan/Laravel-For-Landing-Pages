@extends('layouts.scaffold')

@section('main')

<h1>Edit Bladetemp</h1>
{{ Form::model($bladetemp, array('method' => 'PATCH', 'route' => array('bladetemps.update', $bladetemp->id))) }}
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
			{{ link_to_route('bladetemps.show', 'Cancel', $bladetemp->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
