@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Edit Photo</h1>
{{ Form::model($photo, array('method' => 'PATCH', 'action' => array('Ffy\Photogallery\PhotosController@update', $photo->id), 'files'=>true)) }}
	<ul class="list-unstyled">
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::label('url', 'Url:') }}
            {{ Form::file('url') }}
        </li>

        <li>
            {{ Form::label('alt', 'Alt:') }}
            {{ Form::text('alt', null, array('class'=> 'form-control')) }}
        </li>

		<li>
            <br/>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_action('Ffy\Photogallery\PhotosController@show', 'Cancel', $photo->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
