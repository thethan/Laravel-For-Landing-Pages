@extends('admin.layouts.default')

@section('content')

<h1>Create Template</h1>

<?php echo app_path();?>

{{ Form::open(array('route' => 'uploadTemplate', 'files' => true)) }}
	<div class="form-group">
          {{ Form::label('name', 'Name:') }}   
         <input class="form-control" name='name' type='text' />
     </div>
	<div class="form-group">
   		 {{ Form::label('image', 'Template PHP:') }}
	    <?php echo Form::file('image'); ?>
	</div>

    <div class="form-group">
    	{{ Form::label('css', 'Css:') }}
        <?php echo Form::file('css'); ?>
    </div>
	<div cla    
    <div class="form-group">
    	{{ Form::label('thumbnail', 'Thumbnail:') }}
        <?php echo Form::file('thumbnail'); ?>
    </div>
	<div class="form-group">
		{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
	</div>
	
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


