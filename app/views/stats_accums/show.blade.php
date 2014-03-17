@extends('layouts.scaffold')

@section('main')

<h1>Show Stats_accum</h1>

<p>{{ link_to_route('stats_accums.index', 'Return to all stats_accums') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Vid</th>
				<th>Hit</th>
				<th>Convert</th>
				<th>Lp_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $stats_accum->vid }}}</td>
					<td>{{{ $stats_accum->hit }}}</td>
					<td>{{{ $stats_accum->convert }}}</td>
					<td>{{{ $stats_accum->lp_id }}}</td>
                    <td>{{ link_to_route('stats_accums.edit', 'Edit', array($stats_accum->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('stats_accums.destroy', $stats_accum->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
