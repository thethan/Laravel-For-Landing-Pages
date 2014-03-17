@extends('admin.layouts.default')

@section('main')

<h1>Show Landing_page</h1>

<p>{{ link_to_route('landing_pages.index', 'Return to all landing_pages') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_id</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Meta_title</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $landing_page->user_id }}}</td>
					<td>{{{ $landing_page->title }}}</td>
					<td>{{{ $landing_page->slug }}}</td>
					<td>{{{ $landing_page->meta_title }}}</td>
                    <td>{{ link_to_route('landing_pages.edit', 'Edit', array($landing_page->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('landing_pages.destroy', $landing_page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
