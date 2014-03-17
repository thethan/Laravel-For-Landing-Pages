@extends('layouts.scaffold')

@section('main')

<h1>All Images</h1>

<p>{{ link_to_route('images.create', 'Add new image') }}</p>

@if ($images->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Alt</th>
				<th>Path</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($images as $image)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no images
@endif

@stop
