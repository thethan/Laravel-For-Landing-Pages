@extends('layouts.scaffold')

@section('main')

<h1>Edit Stat</h1>
{{ Form::model($stat, array('method' => 'PATCH', 'route' => array('stats.update', $stat->id))) }}
	<ul>
        <li>
            {{ Form::label('vid', 'Vid:') }}
            {{ Form::input('number', 'vid') }}
        </li>

        <li>
            {{ Form::label('hit', 'Hit:') }}
            {{ Form::input('number', 'hit') }}
        </li>

        <li>
            {{ Form::label('convert', 'Convert:') }}
            {{ Form::input('number', 'convert') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('stats.show', 'Cancel', $stat->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
