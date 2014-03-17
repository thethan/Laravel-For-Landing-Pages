@extends('layouts.scaffold')

@section('main')

<h1>Show Bladetemp</h1>

<p>{{ link_to_route('bladetemps.index', 'Return to all bladetemps') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>T_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $bladetemp->name }}}</td>
					<td>{{{ $bladetemp->t_id }}}</td>
                    <td>{{ link_to_route('bladetemps.edit', 'Edit', array($bladetemp->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('bladetemps.destroy', $bladetemp->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
