@extends('layouts.scaffold')

@section('main')

<h1>All Sliders</h1>

<p>{{ link_to_route('sliders.create', 'Add new slider') }}</p>

@if ($sliders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>T_id</th>
				<th>V_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($sliders as $slider)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no sliders
@endif

@stop
