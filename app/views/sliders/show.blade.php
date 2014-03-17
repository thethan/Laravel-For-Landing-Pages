@extends('layouts.scaffold')

@section('main')

<h1>Show Slider</h1>

<p>{{ link_to_route('sliders.index', 'Return to all sliders') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>T_id</th>
				<th>V_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $slider->name }}}</td>
					<td>{{{ $slider->t_id }}}</td>
					<td>{{{ $slider->v_id }}}</td>
                    <td>{{ link_to_route('sliders.edit', 'Edit', array($slider->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('sliders.destroy', $slider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
