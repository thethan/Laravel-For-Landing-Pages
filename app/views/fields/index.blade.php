@extends('admin.layouts.default')

@section('scripts')
		<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/require.js"></script>
		<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/vendor/jquery-1.7.2.js"></script>
 
		<!-- here we have our Aloha Editor config -->
		<script src="{{ asset('assets/js/aloha/aloha-config.js') }}"></script>
 
		<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js" 
			data-aloha-plugins="common/ui,
								common/format,
								common/table,
								common/list,
								common/link,
								common/highlighteditables,
								common/block,
								common/undo,
								common/contenthandler,
								common/paste,
								common/commands,
								common/abbr,
								common/image"></script>
 
		<link rel="stylesheet" href="http://cdn.aloha-editor.org/latest/css/aloha.css" type="text/css">
 
		<!-- save the content of the page -->
		<script src="{{ asset('asset/js/aloha/aloha-save.js') }}"></script>
 
		<script type="text/javascript">
			Aloha.ready( function() {
				var $ = Aloha.jQuery;
				// Make all elements with class=".editable" editable once Aloha is loaded and ready.
				$('.editable').aloha();
			});
		</script>


@stop

@section('styles')
	
@stop
	
	

@section('content')

<h1>All Fields</h1>

<p>{{ link_to_route('fields.create', 'Add new field') }}</p>

@if ($fields->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>T_id</th>
				<th>Type</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($fields as $field)
				<tr>
					<td>{{{ $field->name }}}</td>
					<td>{{{ $field->t_id }}}</td>
					<td>{{{ $field->type }}}</td>
                    <td>{{ link_to_route('fields.edit', 'Edit', array($field->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('fields.destroy', $field->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no fields
@endif

@stop
