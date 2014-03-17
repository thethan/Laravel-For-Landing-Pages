@extends('layouts.scaffold')

@section('main')

<h1>All Forms</h1>

<p>{{ link_to_route('forms.create', 'Add new form') }}</p>

@if ($forms->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Program</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Zip</th>
				<th>Agency</th>
				<th>Leadsource</th>
				<th>Format</th>
				<th>Country</th>
				<th>Ipaddress</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($forms as $form)
				<tr>
					<td>{{{ $form->program }}}</td>
					<td>{{{ $form->firstname }}}</td>
					<td>{{{ $form->lastname }}}</td>
					<td>{{{ $form->email }}}</td>
					<td>{{{ $form->phone }}}</td>
					<td>{{{ $form->zip }}}</td>
					<td>{{{ $form->agency }}}</td>
					<td>{{{ $form->leadsource }}}</td>
					<td>{{{ $form->format }}}</td>
					<td>{{{ $form->country }}}</td>
					<td>{{{ $form->ipaddress }}}</td>
                    <td>{{ link_to_route('forms.edit', 'Edit', array($form->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('forms.destroy', $form->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no forms
@endif

@stop
