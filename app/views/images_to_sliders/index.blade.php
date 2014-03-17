@extends('layouts.scaffold')

@section('main')

<h1>All Images_to_sliders</h1>

<p>{{ link_to_route('images_to_sliders.create', 'Add new images_to_slider') }}</p>

@if ($images_to_sliders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>I_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($images_to_sliders as $images_to_slider)
				<tr>
					<td>{{{ $images_to_slider->i_id }}}</td>
                    <td>{{ link_to_route('images_to_sliders.edit', 'Edit', array($images_to_slider->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('images_to_sliders.destroy', $images_to_slider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no images_to_sliders
@endif

@stop
