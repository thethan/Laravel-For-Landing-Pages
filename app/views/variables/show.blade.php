@extends('layouts.scaffold')

@section('main')

<h1>Show Variable</h1>

<p>{{ link_to_route('variables.index', 'Return to all variables') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>S_id</th>
				<th>T_id</th>
				<th>Type</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $variable->name }}}</td>
					<td>{{{ $variable->s_id }}}</td>
					<td>{{{ $variable->t_id }}}</td>
					<td>{{{ $variable->type }}}</td>
                    <td>{{ link_to_route('variables.edit', 'Edit', array($variable->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('variables.destroy', $variable->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
