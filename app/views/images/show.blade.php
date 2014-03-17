@extends('layouts.scaffold')

@section('main')

<h1>Show Image</h1>

<p>{{ link_to_route('images.index', 'Return to all images') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Alt</th>
				<th>Path</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $image->name }}}</td>
					<td>{{{ $image->alt }}}</td>
					<td>{{{ $image->path }}}</td>
                    <td>{{ link_to_route('images.edit', 'Edit', array($image->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('images.destroy', $image->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
