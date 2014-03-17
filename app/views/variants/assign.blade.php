@extends('admin.layouts.default')

@section('content')

<h1>Assign templates</h1>

{{ Form::open(array('route' => 'variantsTemplate', 'files' => true)) }}
	{{ Form::hidden('vid', $vid) }}
	<div class="form-group">
   		 {{ Form::label('blade', 'Template PHP:') }}
        
         <select name="blade" class="image-picker show-html">
         	@foreach($templates as $temp)
            	<option data-img-src="{{ asset('assets/thumb/'. $temp->img) }}" value="{{ $temp->t_id}}">{{$temp->name}}</option>
            @endforeach
         </select>
	  
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

@section('scripts')
	<script src="{{{ asset('assets/js/image-picker.js') }}} "></script>
    <script>
    	$("select").imagepicker();
		$('select').show();
    </script>
@stop

@section('styles')
	<link rel="stylesheet" href="{{{ asset('assets/css/image-picker.css') }}}" >
@stop