@extends('layouts.scaffold')

@section('main')

<h1>All Variantes</h1>

<p>{{ link_to_route('variantes.create', 'Add new variante') }}</p>

@if ($variantes->count())
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
			@foreach ($variantes as $variante)
				<tr>
					<td>{{{ $variante->user_id }}}</td>
					<td>{{{ $variante->title }}}</td>
					<td>{{{ $variante->lp_id }}}</td>
					<td>{{{ $variante->t_id }}}</td>
					<td>{{{ $variante->percent }}}</td>
                    <td>{{ link_to_route('variantes.edit', 'Edit', array($variante->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('variantes.destroy', $variante->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no variantes
@endif

@stop
