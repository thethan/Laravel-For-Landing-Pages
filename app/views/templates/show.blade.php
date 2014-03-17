@extends('layouts.scaffold')

@section('main')

<h1>Show Template</h1>

<p>{{ link_to_route('templates.index', 'Return to all templates') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $template->name }}}</td>
                    <td>{{ link_to_route('templates.edit', 'Edit', array($template->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('templates.destroy', $template->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
