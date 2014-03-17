@extends('layouts.scaffold')

@section('main')

<h1>Edit Stats_accum</h1>
{{ Form::model($stats_accum, array('method' => 'PATCH', 'route' => array('stats_accums.update', $stats_accum->id))) }}
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
            {{ Form::label('lp_id', 'Lp_id:') }}
            {{ Form::input('number', 'lp_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('stats_accums.show', 'Cancel', $stats_accum->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
