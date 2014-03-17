@extends('layouts.scaffold')

@section('main')

<h1>Show Image_thumbnail</h1>

<p>{{ link_to_route('image_thumbnails.index', 'Return to all image_thumbnails') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>T_id</th>
				<th>Title</th>
				<th>Img</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $image_thumbnail->t_id }}}</td>
					<td>{{{ $image_thumbnail->title }}}</td>
					<td>{{{ $image_thumbnail->img }}}</td>
                    <td>{{ link_to_route('image_thumbnails.edit', 'Edit', array($image_thumbnail->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('image_thumbnails.destroy', $image_thumbnail->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
