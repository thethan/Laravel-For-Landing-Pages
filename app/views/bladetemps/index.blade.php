@extends('admin.layouts.default')

@section('content')

<h1>All Blade Templates</h1>

<p>{{ link_to_route('bladetemps.create', 'Add new template') }}</p>

@if ($bladetemps->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($bladetemps as $bladetemp)
				<tr>
					<td>{{{ $bladetemp->name }}}</td>
                    <td>{{-- link_to_route('templates.edit', 'Edit', array($template->id), array('class' => 'btn btn-info')) --}}</td>
                    <td>
                        {{-- Form::open(array('method' => 'DELETE', 'route' => array('templates.destroy', $template->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() --}}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no templates
@endif

@stop
