@extends('admin.layouts.default')

@section('content')

<h1>Edit Variant</h1>
{{ Form::model($variant, array('method' => 'PATCH', 'route' => array('variants.update', $variant->id))) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('lp_id', 'Lp_id:') }}
            {{ Form::input('number', 'lp_id') }}
        </li>

        <li>
            {{ Form::label('t_id', 'T_id:') }}
            {{ Form::input('number', 't_id') }}
        </li>

        <li>
            {{ Form::label('percent', 'Percent:') }}
            {{ Form::input('number', 'percent') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('variants.show', 'Cancel', $variant->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

@section('styles')
	<link rel="stylesheet" href="{{{ asset('assets/css/image-picker.css') }}}">
@stop

@section('scripts')
	<script src="{{{ asset('assets/js/image-picker.min.js') }}}"></script>
    <script>
    	$("select").imagepicker();
    </script>
@stop
