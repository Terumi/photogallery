@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Create Album</h1>
{{ Form::open(array('action' => 'Ffy\Photogallery\AlbumsController@store')) }}
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
            {{ Form::label('tags', 'Tags:') }}<br/>
            {{ Form::text('tags', null, array('class'=> 'form-control' ,'data-role'=> 'tagsinput', 'placeholder'=> 'Add tags')) }}
        </li>

		<li>
            <br/>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_action('Ffy\Photogallery\AlbumsController@index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
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


