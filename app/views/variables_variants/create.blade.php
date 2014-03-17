@extends('layouts.scaffold')

@section('main')

<h1>Create Variables_variant</h1>

{{ Form::open(array('route' => 'variables_variants.store')) }}
	<ul>
        <li>
            {{ Form::label('variant_id', 'Variant_id:') }}
            {{ Form::input('number', 'variant_id') }}
        </li>

        <li>
            {{ Form::label('variable_id', 'Variable_id:') }}
            {{ Form::input('number', 'variable_id') }}
        </li>

        <li>
            {{ Form::label('type_id', 'Type_id:') }}
            {{ Form::input('number', 'type_id') }}
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


