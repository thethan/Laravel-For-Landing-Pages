@extends('layouts.scaffold')

@section('main')

<h1>Edit Varvar_text</h1>
{{ Form::model($varvar_text, array('method' => 'PATCH', 'route' => array('varvar_texts.update', $varvar_text->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('varvar_texts.show', 'Cancel', $varvar_text->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
