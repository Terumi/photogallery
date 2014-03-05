@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Edit Album</h1>
{{ Form::model($album, array('method' => 'PATCH', 'action' => array('Ffy\Photogallery\AlbumsController@update', $album->id))) }}
	<ul class="list-unstyled">
        <li>
            {{ Form::label('name', 'Album name:') }}
            {{ Form::text('name', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::text('tags', null, array('class'=> 'form-control')) }}
        </li>

		<li>
            <br/>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_action('Ffy\Photogallery\AlbumsController@show', 'Cancel', $album->id, array('class' => 'btn btn-warning')) }}
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
