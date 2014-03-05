@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Create Photo</h1>
{{ Form::open(array('action' => 'Ffy\Photogallery\PhotosController@store', 'files'=> true)) }}
	<ul class="list-unstyled">
        <li>
            {{ Form::label('name', 'Photo name:') }}
            {{ Form::text('name', null, array('class'=> 'form-control')) }}
        </li>
        <li>
            {{ Form::label('url', 'Image:') }}
            {{ Form::file('url') }}
        </li>

        <li>
            {{ Form::label('alt', 'Alt text:') }}
            {{ Form::text('alt', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::text('tags', null, array('class'=> 'form-control')) }}
        </li>

		<li>
            <br/>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_action('Ffy\Photogallery\PhotosController@index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
<div class="alert alert-warning">
	<ul class="list-unstyled">
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
</div>
@endif

@stop


