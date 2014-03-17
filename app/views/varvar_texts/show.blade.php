@extends('layouts.scaffold')

@section('main')

<h1>Show Varvar_text</h1>

<p>{{ link_to_route('varvar_texts.index', 'Return to all varvar_texts') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Varvar_id</th>
				<th>Type_id</th>
				<th>Vartext</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $varvar_text->varvar_id }}}</td>
					<td>{{{ $varvar_text->type_id }}}</td>
					<td>{{{ $varvar_text->vartext }}}</td>
                    <td>{{ link_to_route('varvar_texts.edit', 'Edit', array($varvar_text->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('varvar_texts.destroy', $varvar_text->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
