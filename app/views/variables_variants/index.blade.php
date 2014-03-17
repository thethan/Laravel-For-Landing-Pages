@extends('layouts.scaffold')

@section('main')

<h1>All Variables_variants</h1>

<p>{{ link_to_route('variables_variants.create', 'Add new variables_variant') }}</p>

@if ($variables_variants->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Variant_id</th>
				<th>Variable_id</th>
				<th>Type_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($variables_variants as $variables_variant)
				<tr>
					<td>{{{ $variables_variant->variant_id }}}</td>
					<td>{{{ $variables_variant->variable_id }}}</td>
					<td>{{{ $variables_variant->type_id }}}</td>
                    <td>{{ link_to_route('variables_variants.edit', 'Edit', array($variables_variant->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('variables_variants.destroy', $variables_variant->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no variables_variants
@endif

@stop
