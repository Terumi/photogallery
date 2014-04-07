@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Edit Photo</h1>
<div class="row">
    <div class="col-lg-3">
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
            {{ Form::label('tags', 'Tags:') }}<br/>
            {{ Form::text('tags', null, array('class'=> 'form-control','data-role'=> 'tagsinput', 'placeholder'=> 'Add tags')) }}
        </li>
        <li>
            <br/>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_action('Ffy\Photogallery\PhotosController@show', 'Cancel', $photo->id, array('class' => 'btn btn-warning')) }}
        </li>
    </ul>
    {{ Form::close() }}
</div>
    <div class="col-lg-6">
        <img src="{{asset(Config::get('photogallery::upload_folder').$photo->url)}}" class="img-rounded img-responsive" alt=""/>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-warning">
    <ul class="list-unstyled">
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif

@stop
