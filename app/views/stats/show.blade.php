@extends('layouts.scaffold')

@section('main')

<h1>Show Stat</h1>

<p>{{ link_to_route('stats.index', 'Return to all stats') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Vid</th>
				<th>Hit</th>
				<th>Convert</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $stat->vid }}}</td>
					<td>{{{ $stat->hit }}}</td>
					<td>{{{ $stat->convert }}}</td>
                    <td>{{ link_to_route('stats.edit', 'Edit', array($stat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('stats.destroy', $stat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
