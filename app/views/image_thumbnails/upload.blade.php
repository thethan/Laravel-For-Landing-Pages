@extends('site.layouts.default')

@section('content')

<h1>Upload Template Image</h1>

<?php echo app_path();?>

{{ Form::open(array('route' => 'uploadBladetemps', 'files' => true)) }}
	<ul>
	{{ Form::hidden('t_id', $id)}}
	{{ form::hidden('title', $title)}}
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


