@extends('admin.layouts.default')

@section('content')

<h1>All Landing Pages</h1>

<?php print_r($source);?>

<p>{{ link_to_route('landingpages.create', 'Add new Landing Page') }}</p>

@if ($landingpages->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User_id</th>
				<th>Title</th>
				<th>Slug</th>
				
			</tr>
		</thead>

		<tbody>
			@foreach ($landingpages as $landingpage)
				<tr>
					<td>{{{ $landingpage->user_id }}}</td>
					<td>{{{ $landingpage->title }}}</td>
					<td>{{{ $landingpage->slug }}}</td>

                    <td>{{ link_to_route('getVariants', 'Variants', array($landingpage->id), array('class' => 'btn btn-success')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('landingpages.destroy', $landingpage->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-disabled')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Landing Pages
@endif

@stop


@section('scripts')
	<script>
	$(document).ready(function() {
        
	   
		$('.btn-danger').addClass('disabled'); // Disables visually
		$('.btn-danger').prop('disabled', true); // Disables visually + functionally
	
	 });
	</script>
@stop