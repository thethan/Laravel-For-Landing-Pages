@extends('layouts.scaffold')

@section('main')

<h1>Edit Variables_variant</h1>
{{ Form::model($variables_variant, array('method' => 'PATCH', 'route' => array('variables_variants.update', $variables_variant->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('variables_variants.show', 'Cancel', $variables_variant->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
