@extends('admin.layouts.default')

@section('content')

<h1>Upload Blade Template</h1>

<?php echo app_path();?>

<?php

?>
<section class="row">
	<div class="form">
	{{ Form::open(array('route' => 'assignvar'), array('class' => 'col-md-6')) }}
	
		@foreach($variables as $var)
	
		{{ Form::label('type_'.$var->id , $var->name.':') }}
		{{-- $select --}}        
		{{ Form::select('var['.$var->id.']' ,$select , $var->type, array('class'=>'form-control') ) }} 
		
		{{-- Form::select('type_'.$var->id , $select, $var->type ) --}} 
		
		@endforeach
        
		    <?php  Form::file('image'); ?>
	
		{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
	
	</div>
	{{ Form::close() }}

</section>
	
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	


@stop

