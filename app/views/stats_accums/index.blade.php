@extends('layouts.scaffold')

@section('main')

<h1>All Stats_accums</h1>

<p>{{ link_to_route('stats_accums.create', 'Add new stats_accum') }}</p>

@if ($stats_accums->count())
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
			@foreach ($stats_accums as $stats_accum)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no stats_accums
@endif

@stop
