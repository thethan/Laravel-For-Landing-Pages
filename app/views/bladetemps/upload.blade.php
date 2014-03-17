@extends('admin.layouts.default')

@section('content')

<h1>Upload Blade Template</h1>

<?php echo app_path();?>

{{ Form::open(array('route' => 'uploadBladetemps', 'files' => true)) }}
	<input type="hidden" value="{{$id}}" name="t_id"/>
    <div class="form-group">
          {{ Form::label('name', 'Name:') }}   
         <input class="form-control" name='name' type='text' />
     </div>
	<div class="form-group">
   		 {{ Form::label('image', 'Blade PHP:') }}
	    <?php echo Form::file('image'); ?>
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


