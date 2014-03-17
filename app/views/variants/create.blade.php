@extends('admin.layouts.default')

@section('content')
<style>
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 360px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>


{{ Form::open(array('route' => 'variants.store', 'class' => 'form-signin', 'role'=>'form')) }}
	
	
	<h2 class="form-signin-heading">Create New Variant</h2>
	
    
{{-- t_id --}}
            {{ Form::hidden('user_id', Auth::user()->id) }}
	    {{ Form::hidden('lp_id', $lp_id) }}


        <section class="form-horizontal">
	<div class="form-group">
            {{ Form::label('title', 'Title:', array('class'=>'col-sm-3 control-label')) }}
            {{ Form::text('title') }}
        </div>

        <div class="form-group">
            {{ Form::label('percent', 'Percent:', array('class'=>'col-sm-3 control-label')) }}
            {{ Form::input('number', 'percent') }}
        
	</div>



		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-info col-sm-offset-3')) }}
		</div>
	</section>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif


@stop

@section('scripts')
    <script>
   $(document).ready(function(){
	$( "#title" ).on('input', function(){
	    var value = $('#title').val();
	     var slug = value.replace(/\s+/g, '-').toLowerCase();
	    $('#slug').val(slug);
	});
    });	
    
</script>    
@stop





