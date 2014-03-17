@extends('layouts.scaffold')

@section('main')

<h1>Create Stat</h1>

{{ Form::open(array('route' => 'stats.store')) }}
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


