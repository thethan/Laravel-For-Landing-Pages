@extends('layouts.scaffold')

@section('main')

<h1>Show Field</h1>

<p>{{ link_to_route('fields.index', 'Return to all fields') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>T_id</th>
				<th>Type</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $field->name }}}</td>
					<td>{{{ $field->t_id }}}</td>
					<td>{{{ $field->type }}}</td>
                    <td>{{ link_to_route('fields.edit', 'Edit', array($field->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('fields.destroy', $field->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
