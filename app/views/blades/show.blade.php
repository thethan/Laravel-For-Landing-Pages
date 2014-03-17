@extends('layouts.scaffold')

@section('main')

<h1>Show Blade</h1>

<p>{{ link_to_route('blades.index', 'Return to all blades') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>T_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $blade->name }}}</td>
					<td>{{{ $blade->t_id }}}</td>
                    <td>{{ link_to_route('blades.edit', 'Edit', array($blade->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('blades.destroy', $blade->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
