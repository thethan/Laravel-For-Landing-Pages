@extends('admin.layouts.default')

@section('content')

<h1>All Stats</h1>



@if ($stats->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Vid</th>
				<th>Hit</th>
				<th>Convert</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($stats as $stat)
            <?php print_r($stat);?>
				<tr>
					<td>{{{ $stat->vid }}}</td>
					<td>{{{ $stat->hit }}}</td>
					<td>{{{ $stat->convert }}}</td>
                    
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no stats
@endif

@stop
