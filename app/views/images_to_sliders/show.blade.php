@extends('layouts.scaffold')

@section('main')

<h1>Show Images_to_slider</h1>

<p>{{ link_to_route('images_to_sliders.index', 'Return to all images_to_sliders') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>I_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $images_to_slider->i_id }}}</td>
                    <td>{{ link_to_route('images_to_sliders.edit', 'Edit', array($images_to_slider->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('images_to_sliders.destroy', $images_to_slider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
