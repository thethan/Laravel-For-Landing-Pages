@extends('site.layouts.default')

@section('content')

<h1>Create Blade</h1>

<?php echo app_path();?>

{{ Form::open(array('route' => 'uploadBladetemps', 'files' => true)) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
	<li>
	    <?php echo Form::file('image'); ?>
	</li>
		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


