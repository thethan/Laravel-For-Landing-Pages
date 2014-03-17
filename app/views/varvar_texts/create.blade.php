@extends('layouts.scaffold')

@section('main')

<h1>Create Varvar_text</h1>

{{ Form::open(array('route' => 'varvar_texts.store')) }}
	<ul>
        <li>
            {{ Form::label('varvar_id', 'Varvar_id:') }}
            {{ Form::input('number', 'varvar_id') }}
        </li>

        <li>
            {{ Form::label('type_id', 'Type_id:') }}
            {{ Form::input('number', 'type_id') }}
        </li>

        <li>
            {{ Form::label('vartext', 'Vartext:') }}
            {{ Form::textarea('vartext') }}
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


