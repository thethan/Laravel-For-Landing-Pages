@extends('layouts.scaffold')

@section('main')

<h1>Show Variant</h1>

<p>{{ link_to_route('variants.index', 'Return to all variants') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_id</th>
				<th>Title</th>
				<th>Lp_id</th>
				<th>T_id</th>
				<th>Percent</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $variant->user_id }}}</td>
					<td>{{{ $variant->title }}}</td>
					<td>{{{ $variant->lp_id }}}</td>
					<td>{{{ $variant->t_id }}}</td>
					<td>{{{ $variant->percent }}}</td>
                    <td>{{ link_to_route('variants.edit', 'Edit', array($variant->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('variants.destroy', $variant->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
