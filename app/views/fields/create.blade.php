@extends('admin.layouts.default')

@section('content')

<h1>Create Field</h1>

{{ Form::open(array('route' => 'fields.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
	    <textarea class="editable" name="name"></textarea>
        </li>

        <li>
            {{ Form::label('t_id', 'T_id:') }}
            {{ Form::input('number', 't_id') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::input('number', 'type') }}
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

@section('scripts')
		<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/require.js"></script>
		<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/vendor/jquery-1.7.2.js"></script>
 
		<!-- here we have our Aloha Editor config -->
		<script src="{{ asset('assets/js/aloha/aloha-config.js') }}"></script>
 
		<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js" 
			data-aloha-plugins="common/ui,
								common/format,
								common/table,
								common/list,
								common/link,
								common/highlighteditables,
								common/block,
								common/undo,
								common/contenthandler,
								common/paste,
								common/commands,
								common/abbr,
								common/image"></script>
 
		<link rel="stylesheet" href="http://cdn.aloha-editor.org/latest/css/aloha.css" type="text/css">
 
		<!-- save the content of the page -->
		<script src="{{ asset('asset/js/aloha/aloha-save.js') }}"></script>
 
		<script type="text/javascript">
			Aloha.ready( function() {
				var $ = Aloha.jQuery;
				// Make all elements with class=".editable" editable once Aloha is loaded and ready.
				$('.editable').aloha();
			});
		</script>


@stop

@section('styles')
	
@stop


