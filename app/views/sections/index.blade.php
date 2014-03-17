@extends('layouts.scaffold')

@section('main')

<h1>All Sections</h1>

<p>{{ link_to_route('sections.create', 'Add new section') }}</p>

@if ($sections->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>T_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($sections as $section)
				<tr>
					<td>{{{ $section->title }}}</td>
					<td>{{{ $section->t_id }}}</td>
                    <td>{{ link_to_route('sections.edit', 'Edit', array($section->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('sections.destroy', $section->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no sections
@endif

@stop
