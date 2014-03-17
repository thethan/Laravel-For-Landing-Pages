@extends('admin.layouts.default')

@section('content')

<h1>Edit Landing_page</h1>
{{ Form::model($landing_page, array('method' => 'PATCH', 'route' => array('landing_pages.update', $landing_page->id))) }}
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
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug') }}
        </li>

        <li>
            {{ Form::label('meta_title', 'Meta_title:') }}
            {{ Form::text('meta_title') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('landing_pages.show', 'Cancel', $landing_page->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

@section('script')

@stop

@section('style')
@stop
