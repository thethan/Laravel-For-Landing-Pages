@extends('layouts.scaffold')

@section('main')

<h1>Edit Image_thumbnail</h1>
{{ Form::model($image_thumbnail, array('method' => 'PATCH', 'route' => array('image_thumbnails.update', $image_thumbnail->id))) }}
	<ul>
        <li>
            {{ Form::label('t_id', 'T_id:') }}
            {{ Form::input('number', 't_id') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('img', 'Img:') }}
            {{ Form::text('img') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('image_thumbnails.show', 'Cancel', $image_thumbnail->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
