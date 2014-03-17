@extends('admin.layouts.default')

@section('content')

<h1>All Variables</h1>

<p>{{ link_to_route('templates.create', 'Add new template') }}</p>

@if ($templates->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($templates as $template)
				<tr>
					<td>{{{ $template->name }}}</td>
                    <td>{{-- link_to_route('templates.edit', 'Edit', array($template->id), array('class' => 'btn btn-info')) --}}</td>

				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no templates
@endif

@stop

